import * as bootstrap from "bootstrap";

const myModal = document.getElementById("staticBackdrop");
const totalCart = document.querySelector(".total-cart");

const getCartItems = () => {
    return JSON.parse(localStorage.getItem("cartItems")) || [];
};

const render = () => {
    totalCart.innerHTML = getCartItems().reduce(
        (acc, curr) => acc + curr.quantity,
        0
    );
};

myModal.addEventListener("shown.bs.modal", async function () {
    const productDetailContent = document.querySelector(
        ".product-detail-content"
    );

    const currentURL = window.location.href;
    if (currentURL.includes("pizza")) {
        productDetailContent.classList.remove("none");
    }

    const increaseBtn = document.querySelector(".modal-btn_increase");
    const decreaseBtn = document.querySelector(".modal-btn_decrease");
    const quantity = document.querySelector(".modal-quantity");
    const addToCartBtn = document.querySelector(".modal-btn-add");
    const toast = document.getElementById("toastNotify");
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast);
    const item = JSON.parse(sessionStorage.getItem("item")).item;
    const previewPrice = document.querySelector(".modal-btn-add span");

    let options,
        sizeCheckBox,
        crustCheckBox,
        cheeseCheckbox,
        sizeValue,
        cheeseValue,
        crustValue,
        price;

    const getPrice = (size, cheese) => {
        let sizePrice, cheesePrice;
        if (size === "7 inches") sizePrice = item.info.price * 0.8;
        else if (size === "9 inches") sizePrice = item.info.price;
        else sizePrice = item.info.price * 1.2;

        if (!cheese) return sizePrice;
        if (cheese === "9” cheese") cheesePrice = 24500;
        else if (cheese === "Double 9” cheese") cheesePrice = 44500;
        else if (cheese === "No extras cheese") cheesePrice = 0;
        else cheesePrice = 64000;

        return (sizePrice + cheesePrice);
    };

    const getSelectedValue = (options) => {
        let value;
        options.forEach((option) => {
            if (option.checked) {
                value = option.value;
            }
        });
        return value;
    };

    const checkCategory = () => {
        if (item.category === "pizza") {
            options = document.querySelectorAll(".form-check-input");
            sizeCheckBox = document.querySelectorAll('input[name="size"]');
            crustCheckBox = document.querySelectorAll('input[name="crust"]');
            cheeseCheckbox = document.querySelectorAll('input[name="extras"]');

            sizeValue = document.querySelector(
                'input[name="size"]:checked'
            ).value;
            crustValue = document.querySelector(
                'input[name="crust"]:checked'
            ).value;

            if (document.querySelector('input[name="extras"]:checked')) {
                cheeseValue = document.querySelector(
                    'input[name="extras"]:checked'
                ).value;
            } else cheeseValue = 0;

            price = getPrice(sizeValue, cheeseValue);

            return 1;
        } else return 0;
    };

    const updateCart = () => {
        if (item.category === "pizza") {
            sizeValue = getSelectedValue(sizeCheckBox);
            cheeseValue = getSelectedValue(cheeseCheckbox);
            crustValue = getSelectedValue(crustCheckBox);
            price = getPrice(sizeValue, cheeseValue);
        } else {
            price = item.info.price;
        }

        previewPrice.innerHTML = (price * quantity.value)
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    };

    if (checkCategory()) {
        options.forEach((option) => {
            option.addEventListener("click", () => {
                updateCart();
            });
        });
    }

    let totalCartValue = 1;
    const cartItems = getCartItems();

    const increaseQuantity = () => {
        increaseBtn.onclick = () => {
            totalCartValue = quantity.value++;
            updateCart();
        };
    };

    const decreaseQuantity = () => {
        decreaseBtn.onclick = () => {
            if (quantity.value <= 1) {
                return;
            }
            quantity.value--;
            totalCartValue = quantity.value;
            updateCart();
        };
    };

    const addToCart = () => {
        const newItem = {
            ...item.info,
            quantity: Number(quantity.value),
        };

        if (item.category === "pizza") {
            newItem.price = price;
            newItem.crust = crustValue;
            newItem.size = sizeValue;
            newItem.cheese = cheeseValue;
        }

        const existingCartItem = cartItems.find(
            (cartItem) => cartItem._id === newItem._id
        );

        if (!existingCartItem) {
            return [...cartItems, newItem];
        } else {
            return cartItems.map((cartItem) => {
                return cartItem._id === item.info._id ? newItem : cartItem;
            });
        }
    };

    addToCartBtn.addEventListener("click", () => {
        localStorage.setItem("cartItems", JSON.stringify(addToCart()));
        render();
        toastBootstrap.show();
        document.cookie = `cartItems=${localStorage.getItem(
            "cartItems"
        )}; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/;SameSite=None;Secure`;
    });

    checkCategory();
    increaseQuantity();
    decreaseQuantity();
});

render();
