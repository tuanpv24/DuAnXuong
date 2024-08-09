<main class="site-main  main-container no-sidebar">
    <div class="container">
        <div class="row">
            <div class="main-content col-md-12">
                <div class="page-main-content">
                    <div class="kobolg">
                        <div class="kobolg-notices-wrapper"></div>
                        <div class="checkout-before-top">
                            <div class="kobolg-checkout-login">
                                <div class="kobolg-form-login-toggle">
                                    <div class="kobolg-info">
                                        Returning customer? <a href="#" class="showlogin">Click here to login</a></div>
                                </div>
                                <form class="kobolg-form kobolg-form-login login" method="post"
                                      style="display:none;">
                                    <p>If you have shopped with us before, please enter your details below. If you are a
                                        new customer, please proceed to the Billing &amp; Shipping section.</p>
                                    <p class="form-row form-row-first">
                                        <label for="username">Username or email&nbsp;<span
                                                class="required">*</span></label>
                                        <input type="text" class="input-text" name="username" id="username"
                                               autocomplete="username">
                                    </p>
                                    <p class="form-row form-row-last">
                                        <label for="password">Password&nbsp;<span class="required">*</span></label>
                                        <input class="input-text" type="password" name="password" id="password"
                                               autocomplete="current-password">
                                    </p>
                                    <div class="clear"></div>
                                    <p class="form-row">
                                        <input type="hidden" id="kobolg-login-nonce" name="kobolg-login-nonce"
                                               value="832993cb93"><input type="hidden" name="_wp_http_referer"
                                                                         value="/kobolg/checkout/">
                                        <button type="submit" class="button" name="login" value="Login">Login</button>
                                        <label class="kobolg-form__label kobolg-form__label-for-checkbox inline">
                                            <input class="kobolg-form__input kobolg-form__input-checkbox"
                                                   name="rememberme" type="checkbox" id="rememberme" value="forever">
                                            <span>Remember me</span>
                                        </label>
                                    </p>
                                    <p class="lost_password">
                                        <a href="#">Lost your
                                            password?</a>
                                    </p>
                                    <div class="clear"></div>
                                </form>
                            </div>
                            <div class="kobolg-checkout-coupon">
                                <div class="kobolg-notices-wrapper"></div>
                                <div class="kobolg-form-coupon-toggle">
                                    <div class="kobolg-info">
                                        Have a coupon? <a href="#" class="showcoupon">Click here to enter your code</a>
                                    </div>
                                </div>
                                <form class="checkout_coupon kobolg-form-coupon" method="post"
                                      style="display:none">
                                    <p>If you have a coupon code, please apply it below.</p>
                                    <p class="form-row form-row-first">
                                        <input type="text" name="coupon_code" class="input-text"
                                               placeholder="Coupon code" id="coupon_code" value="">
                                    </p>
                                    <p class="form-row form-row-last">
                                        <button type="submit" class="button" name="apply_coupon" value="Apply coupon">
                                            Apply coupon
                                        </button>
                                    </p>
                                    <div class="clear"></div>
                                </form>
                            </div>
                        </div>
                        <form method="post" class="checkout kobolg-checkout"
                              action="{{route('client.checkout.post')}}"
                              novalidate="novalidate">
                              @csrf
                            <div class="col2-set" id="customer_details">
                                <div class="col-1">
                                    <div class="kobolg-billing-fields">
                                        <h3>Chi tiết thanh toán</h3>
                                        <div class="kobolg-billing-fields__field-wrapper">
                                            <p class="form-row validate-required"
                                               id="billing_first_name_field" data-priority="10"><label
                                                    for="billing_first_name" class="">Họ và tên&nbsp;<abbr
                                                    class="required" title="required">*</abbr></label><span
                                                    class="kobolg-input-wrapper"><input type="text"
                                                                                             class="input-text"
                                                                                             style="color: black"
                                                                                             name="name"
                                                                                             id="billing_first_name"
                                                                                             placeholder="" value="{{Auth::user()->name}}"
                                                                                             autocomplete="given-name"></span>
                                            </p>
                                            <p class="form-row form-row-wide validate-required validate-phone"
                                               id="billing_phone_field" data-priority="100"><label for="billing_phone"
                                                                                                   class="">Số điện thoại&nbsp;<abbr
                                                    class="required" title="required">*</abbr></label><span
                                                    class="kobolg-input-wrapper"><input type="tel"
                                                                                             class="input-text"
                                                                                             style="color: black"
                                                                                             name="phone"
                                                                                             id="phone"
                                                                                             placeholder="" value="{{Auth::user()->so_dien_thoai}}"
                                                                                             autocomplete="tel"></span>
                                            </p>
                                            <p class="form-row form-row-wide validate-required validate-email"
                                               id="billing_email_field" data-priority="110"><label for="billing_email"
                                                                                                   class="">Email
                                                addresses&nbsp;<abbr class="required"
                                                                   title="required">*</abbr></label><span
                                                    class="kobolg-input-wrapper"><input type="email"
                                                                                             class="input-text"
                                                                                             style="color: black"
                                                                                             name="email"
                                                                                             id="billing_email"
                                                                                             placeholder="" value="{{Auth::user()->email}}"
                                                                                             autocomplete="email username"></span>
                                            </p>
                                            <p class="form-row form-row-wide addresses-field validate-required"
                                               id="billing_addresses_1_field" data-priority="50"><label
                                                    for="billing_addresses_1" class="">Địa chỉ&nbsp;<abbr
                                                    class="required" title="required">*</abbr></label><span
                                                    class="kobolg-input-wrapper"><input type="text"
                                                                                             class="input-text"
                                                                                             style="color: black"
                                                                                             name="address"
                                                                                             placeholder="Nhập địa chỉ nhận hàng"
                                                                                             value="{{Auth::user()->dia_chi}}"
                                                                                             autocomplete="addresses-line1"
                                                                                             data-placeholder=""></span>
                                            </p>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="kobolg-shipping-fields">
                                    </div>
                                    <div class="kobolg-additional-fields">
                                        <h3>Ghi chú</h3>
                                        <div class="kobolg-additional-fields__field-wrapper">
                                            <p class="form-row notes" id="order_comments_field" data-priority=""><span
                                                    class="kobolg-input-wrapper"><textarea name="order_comments"
                                                                                                class="input-text "
                                                                                                id="order_comments"
                                                                                                placeholder="Notes about your order, e.g. special notes for delivery."
                                                                                                rows="2"
                                                                                                cols="5"></textarea></span>
                                            </p></div>
                                    </div>
                                </div>
                            </div>
                            <h3 id="order_review_heading">Đơn hàng của bạn</h3>
                            <div id="order_review" class="kobolg-checkout-review-order">
                                <table class="shop_table kobolg-checkout-review-order-table">
                                    <thead>
                                    <tr>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-total">Tổng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $tongTien = 0;
                                            ?>
                                        @foreach ($listCart as $key => $value)
                                        <tr class="cart_item">
                                            <td class="product-name" style="padding-right: 0; white-space: nowrap">
                                                {{$value->ten_san_pham}}{{($value->ten_gia_tri_thuoc_tinh_bt!==NULL) ? ' ('.$value->ten_gia_tri_thuoc_tinh_bt.')' : "" }}<strong class="product-quantity"> ×
                                                {{$value->so_luong}}</strong></td>
                                            <td class="product-total" style="padding-left: 0">
                                                <span class="kobolg-Price-amount amount">{{number_format($value->gia, 0, '', '.')}} vnđ</span></td>
                                        </tr>
                                        <?php
                                        $tongTien += $value->so_luong * $value->gia
                                        ?>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Thành tiền</th>
                                        <td><span class="kobolg-Price-amount amount">{{number_format($tongTien, 0, '', '.')}} vnđ</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Tổng cộng</th>
                                        <td style="white-space: nowrap"><strong><span class="kobolg-Price-amount amount"></span>{{number_format($tongTien, 0, '', '.')}} vnđ</span></strong>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div id="payment" class="kobolg-checkout-payment">
                                    <ul class="wc_payment_methods payment_methods methods">
                                        @php
                                            $listPTTT = DB::table('phuong_thuc_thanh_toans')->orderByDesc('id')->get()
                                        @endphp
                                        @foreach ($listPTTT as $key => $value)
                                        <li class="wc_payment_method payment_method_bacs">
                                            <input type="radio"
                                                   {{$loop->first ? 'checked' : ''}}
                                                   value="{{$value->id}}"
                                                   name="pttt">
                                            <label for="payment_method_bacs">
                                                {{$value->ten_phuong_thuc_thanh_toan}} </label>
                                        </li>
                                        @endforeach
                                        <input type="hidden" value="{{$tongTien}}" name="tong_tien">
                                    </ul>
                                    <div class="form-row place-order">
                                        <button type="submit" class="button alt"
                                                id="place_order">Place
                                            order
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>