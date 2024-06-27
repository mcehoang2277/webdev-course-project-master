const fullNameInput = document.getElementById('fullname') || null;
const addressInput = document.getElementById('address') || null;
const phoneInput = document.getElementById('phone') || null;
const idInput = document.getElementById('id') || null;
const btnSubmit = document.querySelector('.btn-submit-address') || null;
const address = document.querySelector('.address') || null;
const name = document.querySelector('.name') || null;
const phone = document.querySelector('.phone') || null;

const render = () => {
    const data = JSON.parse(localStorage.getItem('address'));

    if (fullNameInput === null || addressInput === null || phoneInput === null || btnSubmit === null || idInput === null || !data) return;

    address.innerHTML = data.address;
    name.innerHTML = data.fullName;
    phone.innerHTML = data.phone;
}

btnSubmit?.addEventListener('click', function (e) {
    const id = idInput.value;
    const fullName = fullNameInput.value;
    const address = addressInput.value;
    const phone = phoneInput.value;
    const data = {
        _id: id,
        fullName,
        address,
        phone,
    };
    // save to localStorage
    localStorage.setItem('address', JSON.stringify(data));
    console.log(JSON.parse(localStorage.getItem('address')))
});

render();
