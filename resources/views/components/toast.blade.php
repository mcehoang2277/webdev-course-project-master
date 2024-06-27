@props(['message'])

<div class="toast-container position-fixed bottom-0 end-0 p-3 py-3">
    <div id="toastNotify" class="toast toast-custom align-items-center border-0" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="d-flex p-3">
            <div class="toast-body">
                <span class="fs-3 fw-semibold">
                    {{ $message }}
                </span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
