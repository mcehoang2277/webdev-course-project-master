const customerInfo = localStorage.getItem("address")
    ? JSON.parse(localStorage.getItem("address"))
    : null;
const cartItems = localStorage.getItem("cartItems")
    ? JSON.parse(localStorage.getItem("cartItems"))
    : [];
const note = document.querySelector("#note") || null;
const btnCreateOrder = document.querySelector(".btn-create-order") || null;
const addressModal = document.getElementById('addressModal') || null;
const confirmModal = document.getElementById('exampleModal') || null;

const totalPrice = () => {
    const deliveryChecked =
        document.querySelector(".delivery-check-input:checked") || null;
    let deliveryFee;
    if (deliveryChecked.value === "priority") {
        deliveryFee = 15000;
    } else {
        deliveryFee = 0;
    }

    return (
        cartItems?.reduce(
            (total, item) => total + item.quantity * item.price,
            0
        ) + deliveryFee
    );
};

btnCreateOrder?.addEventListener("click", async function (e) {
    e.preventDefault();

    if (cartItems.length === 0) {
        alert("Giỏ hàng trống");
        return;
    }

    if (customerInfo === null) {
        const myAddressModal = new bootstrap.Modal(addressModal, {
            keyboard: false,
            backdrop: "static",
        });

        const myConfirmModal = new bootstrap.Modal(confirmModal, {
            keyboard: false,
            backdrop: "static",
        });

        myConfirmModal.hide();
        myAddressModal.show();
        return;
    }

    const paymentMethod =
        document.querySelector(".payment-method:checked") || null;

    const order = {
        customer: {
            id: customerInfo?._id || "",
            name: customerInfo?.fullName,
            phone: customerInfo?.phone,
        },
        total_price: totalPrice(),
        items: cartItems,
        note: note.value || "",
        address: customerInfo?.address,
        payment_method: paymentMethod?.value || "",
    };

    const response = await axios
        .post("/orders", order, {
            headers: {
                "Content-Type": "application/json",
            },
        })
        .then(function (response) {
            return response.data;
        })
        .catch(function (error) {
            console.error(error);
            return error.response.data;
        });

    // clear cart
    localStorage.removeItem("cartItems");

    // set cookies cartItems
    const cartItemsCookie = JSON.stringify([]);
    document.cookie = `cartItems=${cartItemsCookie}; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/;SameSite=None;Secure`;

    document.open();
    window.location.replace("http://127.0.0.1:8000/cart/thank-you");
    document.write(response);
    document.close();
});
