<div class=address-container>
    <h1>Address</h1>
    <div class="addr-detail" data-bs-toggle="modal" data-bs-target="#addressModal">
        <i class="fa-regular fa-location-pin"></i>
        <div>
            <p class="fs-1 fw-semibold"><span class="name">Your name</span> - <span
                    class="phone">Your phone number</span></p>
            <p class="address">Address here</p>
        </div>
    </div>
</div>
<div class="delivery-container">
    <div class="delivery-opt-container">
        <h1>Delivery Options</h1>
        <div class="row-opt">
            <div class="option-cell">
                <div class="radio-btn">
                    <label for="priority"></label>
                    <input class="delivery-check-input form-check-input" name="pickup" id="priority" type="radio"
                           value="priority">
                </div>
                <div class="shipping-info">
                    <p class="shipping">15,000đ</p>
                    <p class="shipping">Priority Delivery</p>
                </div>
            </div>
            <div class="option-cell">
                <div class="radio-btn">
                    <label for="standard"></label>
                    <input class="delivery-check-input form-check-input" name="pickup" id="standard" type="radio"
                           value="standard" checked>
                </div>
                <div class="shipping-info">
                    <p class="shipping">0đ</p>
                    <p class="shipping">Standard Delivery</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-1" id="addressModalLabel">Your Address</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="was-validated">
                    <label>
                        <input hidden type="text" id="id" name="id"
                               value="{{auth()->user() ? auth()->user()->_id : ''}}">
                    </label>
                    <div class="form-floating fs-3 mb-3">
                        <input
                            type="text"
                            class="form-control @error('phone') is-invalid @enderror"
                            id="fullname"
                            name="fullname"
                            placeholder="Enter your fullname"
                            value="{{auth()->user() ? auth()->user()->name : ''}}"
                            required
                        >
                        <label for="fullname">Fullname</label>
                        @error('fullname')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-floating fs-3 mb-3">
                        <input
                            type="text"
                            class="form-control @error('phone') is-invalid @enderror"
                            id="phone"
                            name="phone"
                            value="{{auth()->user() ? auth()->user()->phone : ''}}"
                            placeholder="Enter your phone number"
                            required
                        >
                        <label for="phone">Phone</label>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-floating fs-3">
                        <input
                            type="text"
                            class="form-control @error('address') is-invalid @enderror"
                            id="address"
                            name="address"
                            placeholder="Enter your address"
                            value=""
                            required
                        >
                        <label for="address">Address</label>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary fs-3 btn-submit-address">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
