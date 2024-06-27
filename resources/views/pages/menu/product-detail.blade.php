<div>
    <div class="product-detail-container">
        <div class="product-detail-header">
            <img src="{{ $item->imgURL }}" alt="{{ $item->name }}">
            <p>{{ $item->name }}</p>
        </div>
        <p class="product-detail-desc">{{ $item->desc }}</p>
        <div class="product-detail-content none">
            <div class="product-detail-body">
                <div class="base">
                    <p>Base</p>
                    <div class="form-check form-check-custom">
                        <input class="form-check-input" type="radio" name="crust" id="thin-and-crispy"
                               checked value="Thin and Crispy">
                        <label class="form-check-label" for="thin-and-crispy">
                            Thin and Crispy
                        </label>
                    </div>
                    <div class="form-check form-check-custom">
                        <input class="form-check-input" type="radio" name="crust" id="thick-and-spongy"
                               value="Thick and Spongy">
                        <label class="form-check-label" for="thick-and-spongy">
                            Thick and Spongy
                        </label>
                    </div>
                    <div class="form-check form-check-custom">
                        <input class="form-check-input" type="radio" name="crust" id="medium" value="Medium">
                        <label class="form-check-label" for="medium">
                            Medium
                        </label>
                    </div>
                </div>
                <div class="size">
                    <p>Size</p>
                    <div class="form-check form-check-custom">
                        <label for="7inches"></label><input class="form-check-input" type="radio" name="size"
                                                            id="7inches"
                                                            value="7 inches">
                        <label class="form-check-label" for="7inches">
                            7 inches = {{number_format($item->price * 0.8, 0, ',', ',')}}đ
                        </label>
                    </div>
                    <div class="form-check form-check-custom">
                        <input class="form-check-input" type="radio" name="size" id="9inches" checked
                               value="9 inches">
                        <label class="form-check-label" for="9inches">
                            9 inches = {{number_format($item->price, 0, ',', ',')}}đ
                        </label>
                    </div>
                    <div class="form-check form-check-custom">
                        <input class="form-check-input" type="radio" name="size" id="12inches"
                               value="12 inches"
                        >
                        <label class="form-check-label" for="12inches">
                            12 inches = {{number_format($item->price * 1.2, 0, ',', ',')}}đ
                        </label>
                    </div>
                </div>
            </div>
            <div class="product-detail-footer">
                <p>More options:</p>
                <div class="form-check form-check-custom">
                    <input class="form-check-input" type="radio" name="extras" id="no-extras"
                           value="No extras cheese" checked>
                    <label class="form-check-label" for="no-extras">
                        None
                    </label>
                </div>
                <div class="form-check form-check-custom">
                    <input class="form-check-input" type="radio" name="extras" id="9inches-cheese"
                           value="9” cheese">
                    <label class="form-check-label" for="9inches-cheese">
                        9” cheese = 24,500đ
                    </label>
                </div>
                <div class="form-check form-check-custom">
                    <input class="form-check-input" type="radio" name="extras" id="double-9inches-cheese"
                           value="Double 9” cheese">
                    <label class="form-check-label" for="double-9inches-cheese">
                        Double 9” cheese = 44,500đ
                    </label>
                </div>
                <div class="form-check form-check-custom">
                    <input class="form-check-input" type="radio" name="extras" id="triple-9inches-cheese"
                           value="Triple 9” cheese">
                    <label class="form-check-label" for="triple-9inches-cheese">
                        Triple 9” cheese = 64,000đ
                    </label>
                </div>
            </div>
        </div>
        <div class="modal-footer modal-footer-custom">
            <div class="modal-btn">
                <button type="button" class="btn btn-secondary btn-secondary-custom modal-btn_decrease">
                    -
                </button>
                <label>
                    <input type="text" class="modal-quantity" value="1" min="1">
                </label>
                <button type="button" class="btn btn-secondary btn-secondary-custom modal-btn_increase">
                    +
                </button>
            </div>
            <button type="button" class="btn btn-primary btn-primary-custom modal-btn-add">ADD TO
                CART <span>{{number_format($item->price, 0, ',', ',')}}</span>đ
            </button>
        </div>
    </div>
</div>
