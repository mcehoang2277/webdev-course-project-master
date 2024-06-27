const location = window.location.href;
const points = document.querySelectorAll(".progress-point") || null;
const totalCart = document.querySelector(".total-cart");
const cartQuantity = document.querySelectorAll(".cart-quantity") || null;
const incrementBtns = document.querySelectorAll(".increment-btn") || null;
const decrementBtns = document.querySelectorAll(".decrement-btn") || null;
const deleteBtns = document.querySelectorAll(".btn-delete") || null;
const deliveryOptions = document.querySelectorAll(".delivery-check-input") || null;
const itemsPrice = document.querySelectorAll(".total-item-price") || null;

if (points) {
    switch (location) {
        case "http://127.0.0.1:8000/cart/payment":
            points.forEach((item) => item.classList.remove("progress-active"));
            points[1]?.classList.add("progress-active");
            break;
        case "http://127.0.0.1:8000/cart/thank-you":
            points.forEach((item) => item.classList.remove("progress-active"));
            points[2]?.classList.add("progress-active");
            break;
        default:
            points.forEach((item) => item.classList.remove("progress-active"));
            points[0]?.classList.add("progress-active");
    }
}

const getCartItems = () => {
    return JSON.parse(localStorage.getItem("cartItems")) || [];
};

const setCookie = () => {
    document.cookie = `cartItems=${localStorage.getItem(
        "cartItems"
    )}; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/;SameSite=None;Secure`;
};

const subPrice = (deliveryFee = 0) => {
    const cartItems = getCartItems();

    const subPrices = document.querySelectorAll('.sub-price') || null;

    subPrices.forEach(item => {
        item.innerHTML = (cartItems?.reduce(
            (total, item) => total + item.quantity * item.price,
            0
        ) + deliveryFee).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
}

const totalPrice = (deliveryFee = 0) => {
    subPrice();
    const cartItems = getCartItems();

    const totalPrice = document.querySelector('.total-price') || null;

    if (!totalPrice) {
        return;
    }

    totalPrice.innerHTML = (cartItems?.reduce(
        (total, item) => total + item.quantity * item.price,
        0
    ) + deliveryFee).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

const totalItemPrice = () => {
    const cartItems = getCartItems();
    itemsPrice?.forEach((itemPrice, index) => {
        itemPrice.innerHTML = (cartItems[index]?.quantity * cartItems[index]?.price).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
}

const render = (quantity, index) => {
    const cartItems = getCartItems();
    totalCart.innerHTML = cartItems.reduce(
        (total, item) => total + item.quantity,
        0
    );

    if (quantity > 0) {
        if (quantity === 1) {
            cartQuantity[index].value = 1;
        }
        cartQuantity[index].value = quantity;
    }

    totalItemPrice();
    totalPrice();
};

incrementBtns?.forEach((incrementBtn, index) => {
    incrementBtn.addEventListener("click", () => {
        const temId = incrementBtn.getAttribute("data-id");
        const cartItems = getCartItems();
        const item = cartItems.find((item) => item._id === temId);
        item.quantity++;
        localStorage.setItem("cartItems", JSON.stringify(cartItems));
        render(item.quantity, index);
        setCookie();
    });
});

decrementBtns?.forEach((decrementBtn, index) => {
    decrementBtn.addEventListener("click", () => {
        const itemId = decrementBtn.getAttribute("data-id");
        const cartItems = getCartItems();
        const item = cartItems.find((item) => item._id === itemId);

        if (item.quantity > 1) {
            item.quantity--;
            localStorage.setItem("cartItems", JSON.stringify(cartItems));
            render(item.quantity, index);
            setCookie();
        }
    });
});

deleteBtns?.forEach((deleteBtn) => {
    deleteBtn.addEventListener("click", async () => {
        const id = deleteBtn.getAttribute("data-id");
        const url = deleteBtn.getAttribute("data-url");

        const cartItems = getCartItems();
        const newCartItems = cartItems.filter((item) => item._id !== id);

        localStorage.setItem("cartItems", JSON.stringify(newCartItems));
        setCookie();
        render();

        window.location.href = url;
    });
});

deliveryOptions?.forEach((deliveryOption) => {
    deliveryOption.addEventListener("click", () => {
        if (deliveryOption.checked) {
            if (deliveryOption.value === 'priority') {
                const deliveryFee = 15000;
                document.querySelector('.delivery-fee').innerHTML = deliveryFee.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                totalPrice(deliveryFee);
            } else {
                const deliveryFee = 0;
                document.querySelector('.delivery-fee').innerHTML = deliveryFee.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                totalPrice(deliveryFee);
            }
        }
    });
});

totalItemPrice();
totalPrice();

