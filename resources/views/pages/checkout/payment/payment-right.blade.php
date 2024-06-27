<p class="payment-title">Payment method</p>
<div class="payment-option-list">
    <x-payment-option
        :imgURL="'https://img.dominos.vn/icon-payment-method-mo-mo.png'"
        :methodName="'Ví MoMo'"
        :value="'momo'"
    />
    <x-payment-option
        :imgURL="'https://img.dominos.vn/icon-payment-method-atm.png'"
        :methodName="'ATM'"
        :value="'atm'"
    />
    <x-payment-option
        :imgURL="'https://img.dominos.vn/icon-payment-method-credit.png'"
        :methodName="'Thẻ tín dụng / ghi nợ'"
        :value="'credit'"
    />
    <x-payment-option
        :imgURL="'https://img.dominos.vn/cash.png'"
        :methodName="'Tiền mặt'"
        :value="'cash'"
    />
</div>