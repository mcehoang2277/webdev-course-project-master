const trackingForm = document.querySelector('#tracking-form') || null;

trackingForm?.addEventListener('submit', async (e) => {
    e.preventDefault();

    const trackingCode = document.querySelector('#order_code').value;
    const trackingResult = document.querySelector('#tracking-order');

    trackingResult.innerHTML = `
        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    `

    if (!trackingCode || !trackingResult) return;

    const response = await axios.get(`/track-order/${trackingCode}`);
    trackingResult.innerHTML = response.data.html;
});
