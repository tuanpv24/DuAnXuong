<div class="single-thumb-vertical main-container shop-page no-sidebar">
    <div class="container">
        <div class="row">
            <div class="main-content col-md-12">
                <div class="kobolg-notices-wrapper"></div>
                <div id="product-27"
                     class="post-27 product type-product status-publish has-post-thumbnail product_cat-table product_cat-new-arrivals product_cat-lamp product_tag-table product_tag-sock first instock shipping-taxable purchasable product-type-variable has-default-attributes">
                    <div class="main-contain-summary">
                        <div class="contain-left has-gallery">
                            <div class="single-left">
                                <div class="kobolg-product-gallery kobolg-product-gallery--with-images kobolg-product-gallery--columns-4 images">
                                    <a href="#" class="kobolg-product-gallery__trigger">
                                        <img draggable="false" class="emoji" alt="🔍"
                                             src="https://s.w.org/images/core/emoji/11/svg/1f50d.svg"></a>
                                    <div class="flex-viewport">
                                        <figure class="kobolg-product-gallery__wrapper">
                                            <div class="kobolg-product-gallery__image">
                                                <img alt="img"
                                                    style="width: 100%;"
                                                     src="{{'.'.Storage::url($sanPhamDetail[0]->anh_san_pham)}}">
                                            </div>
                                            @foreach ($alBumAnh as $key => $value)
                                            <div class="kobolg-product-gallery__image">
                                                <img alt="img"
                                                style="width: 100%;"
                                                     src="{{'.'.Storage::url($value->duong_dan_anh)}}">
                                            </div>
                                            @endforeach
                                            @foreach ($alBumAnhBienThe as $key => $value)
                                            @if($value->anh_bien_the_san_pham !== NULL)
                                            <div class="kobolg-product-gallery__image">
                                                <img alt="img"
                                                style="width: 100%;"
                                                     src="{{'.'.Storage::url($value->anh_bien_the_san_pham)}}">
                                            </div>
                                            @endif
                                            @endforeach
                                            {{-- <div class="kobolg-product-gallery__image">
                                                <img alt="img"
                                                     src="assets/images/apro131-2.jpg">
                                            </div>
                                            <div class="kobolg-product-gallery__image">
                                                <img src="assets/images/apro134-1.jpg"
                                                     alt="img">
                                            </div>
                                            <div class="kobolg-product-gallery__image">
                                                <img src="assets/images/apro132-1.jpg"
                                                     class="" alt="img">
                                            </div>
                                            <div class="kobolg-product-gallery__image">
                                                <img src="assets/images/apro133-1.jpg"
                                                     class="" alt="img">
                                            </div> --}}
                                        </figure>
                                    </div>
                                    <ol class="flex-control-nav flex-control-thumbs">
                                        <li><img
                                            src="{{'.'.Storage::url($sanPhamDetail[0]->anh_san_pham)}}"
                                            alt="img">
                                        </li>
                                        @foreach ($alBumAnh as $key => $value)
                                        <li><img
                                            src="{{'.'.Storage::url($value->duong_dan_anh)}}"
                                            alt="img">
                                        </li>
                                        @endforeach
                                        @foreach ($alBumAnhBienThe as $key => $value)
                                        @if($value->anh_bien_the_san_pham !== NULL)
                                        <li><img
                                            src="{{'.'.Storage::url($value->anh_bien_the_san_pham)}}"
                                            alt="img">
                                        </li>
                                        @endif
                                        @endforeach
                                        {{-- <li><img
                                                src="assets/images/apro131-2-100x100.jpg"
                                                alt="img">
                                        </li>
                                        <li><img
                                                src="assets/images/apro134-1-100x100.jpg"
                                                alt="img">
                                        </li>
                                        <li><img
                                                src="assets/images/apro132-1-100x100.jpg"
                                                alt="img">
                                        </li>
                                        <li><img
                                                src="assets/images/apro133-1-100x100.jpg"
                                                alt="img">
                                        </li> --}}
                                    </ol>
                                </div>
                            </div>
                            <div class="summary entry-summary">
                                <div class="flash">
                                    <span class="onnew"><span class="text">New</span></span></div>
                                <h1 class="product_title entry-title">{{$sanPhamDetail[0]->ten_san_pham}}</h1>
                                <p class="price">
                                    <span class="kobolg-Price-amount amount">
                                        @if($sanPhamDetail[0]->kieu_san_pham == 2)
                                        {{number_format($minPrice, 0, '', '.')}} vnđ - {{number_format($maxPrice, 0, '', '.')}} vnđ
                                        @else
                                        {{number_format($sanPhamDetail[0]->gia, 0, '', '.')}} vnđ
                                        @endif
                                       </span>
                                    {{-- <span class="kobolg-Price-amount amount">
                                    <span class="kobolg-Price-currencySymbol">$</span>
                                    146.00
                                   </span> – 
                                    <span class="kobolg-Price-amount amount"><span class="kobolg-Price-currencySymbol">$</span>185.00</span> --}}
                                </p>
                                <p class="stock in-stock">
                                    Còn: <span>@if($sanPhamDetail[0]->kieu_san_pham == 2)
                                        {{$sumSoLuong}}
                                        @else
                                        {{$sanPhamDetail[0]->so_luong}}
                                        @endif</span>
                                </p>
                                <div class="kobolg-product-details__short-description">
                                    {!!$sanPhamDetail[0]->mo_ta_ngan === NULL ? "Sản phẩm chưa có mô tả ngắn" : $sanPhamDetail[0]->mo_ta_ngan!!}
                                </div>
                                <form action="{{route('client.addtocart')}}" method="post" class="variations_form cart">
                                    @csrf
                                    @if($sanPhamDetail[0]->kieu_san_pham == 2)
                                    <table class="variations">
                                        <tbody>
                                            @foreach ($result as $key => $values)
                                            <tr>
                                                <td class="label"><label>{{ $key }}</label></td>
                                                <input type="hidden" name="atrributes[]" value="{{$key}}">
                                                <td class="value">
                                                    <select name="values[]" style="width: 100%;">
                                                        <option value="0">Chọn một tùy chọn</option>
                                                        @foreach ($values as $value)
                                                        <option value="{{ $value }}">{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                    <div class="single_variation_wrap">
                                        <div class="kobolg-variation single_variation"></div>
                                        <div class="kobolg-variation-add-to-cart variations_button d-flex align-items-center mb-4">
                                            <input type="number" style="width: 100px;" name="quantity" value="0" class="mr-3">
                                            <input type="hidden" name="kieu_san_pham" value="{{$sanPhamDetail[0]->kieu_san_pham}}" id="">
                                            <input type="hidden" name="id_san_pham" value="{{$sanPhamDetail[0]->id}}">
                                            <button type="submit"
                                                    class="single_add_to_cart_button button alt kobolg-variation-selection-needed mb-0">
                                                Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="product_meta">
                                    <div class="wcml-dropdown product wcml_currency_switcher">
                                        <ul>
                                            <li class="wcml-cs-active-currency">
                                                <a class="wcml-cs-item-toggle">USD</a>
                                                <ul class="wcml-cs-submenu">
                                                    <li>
                                                        <a>EUR</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="sku_wrapper">Mã Sản Phẩm: <span class="sku">{{$sanPhamDetail[0]->ma_san_pham}}</span></span>
                                    <span class="posted_in">Danh Mục: <a
                                            href="#">
                                        </a>{{$sanPhamDetail[0]->ten_danh_muc}}</span>
                                </div>
                                <div class="kobolg-share-socials">
                                    <h5 class="social-heading">Share: </h5>
                                    <a target="_blank" class="facebook" href="#">
                                        <i class="fa fa-facebook-f"></i>
                                    </a>
                                    <a target="_blank" class="twitter"
                                       href="#"><i class="fa fa-twitter"></i>
                                    </a>
                                    <a target="_blank" class="pinterest"
                                       href="#"> <i class="fa fa-pinterest"></i>
                                    </a>
                                    <a target="_blank" class="googleplus"
                                       href="#"><i class="fa fa-google-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kobolg-tabs kobolg-tabs-wrapper">
                        <ul class="tabs dreaming-tabs" role="tablist">
                            <li class="description_tab active" id="tab-title-description" role="tab"
                                aria-controls="tab-description">
                                <a href="#tab-description">Mô Tả Sản Phẩm</a>
                            </li>
                            <li class="additional_information_tab" id="tab-title-additional_information" role="tab"
                                aria-controls="tab-additional_information">
                                <a href="#tab-additional_information">Bình Luận ({{count($listBinhLuan)}})</a>
                            </li>
                            <li class="reviews_tab" id="tab-title-reviews" role="tab" aria-controls="tab-reviews">
                                <a href="#tab-reviews">Đánh Giá ({{count($listDanhGia)}})</a>
                            </li>
                        </ul>
                        <div class="kobolg-Tabs-panel kobolg-Tabs-panel--description panel entry-content kobolg-tab"
                             id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">
                            <h2>Mô Tả Sản Phẩm</h2>
                            <div class="container-table">
                                <div class="container-cell">
                                    {!! $sanPhamDetail[0]->mo_ta === NULL ? 'Sản phẩm này chưa có mô tả chi tiết' : $sanPhamDetail[0]->mo_ta !!}
                                </div>
                            </div>
                        </div>
                        <div class="kobolg-Tabs-panel kobolg-Tabs-panel--additional_information panel entry-content kobolg-tab"
                             id="tab-additional_information" role="tabpanel"
                             aria-labelledby="tab-title-additional_information">
                            <h2>Bình Luận</h2>
                            @forelse ($listBinhLuan as $key => $value)
                            <div style="display: flex; align-items: center; margin-bottom: 10px">
                                <a href="" style="margin-right: 10px">
                                    <img src="{{$value->anh_dai_dien === NULL ? "./storage/uploads/khachhang/avatar.png" : ".".Storage::url($value->anh_dai_dien)}}" style="width: 60px; border-radius: 50%" alt="">
                                    </a>
                                    <div>
                                        <strong>{{(Auth::id() && $value->id === Auth::id()) ? 'Bạn' : $value->name}}</strong><span> đã bình luận cho </span><strong>{{$sanPhamDetail[0]->ten_san_pham}}</strong><br>
                                        <small>{{date('H:i - d.m.Y', strtotime($value->thoi_gian))}}</small>
                                    </div>
                            </div>
                           <div class="message-box" style="margin-bottom: 25px; margin-left: 25px; border: 1px solid #e7eaec; padding: 10px 20px; border-radius: 4px; width: 50%; align-items: center; background-color: #f5f5f5; position: relative"><p style="font-size: 13px">{{$value->noi_dung}}</p></div>
                            @empty
                            Sản phầm này chưa có bình luận nào
                            @endforelse
                           <form id="commentform" method="post" action="{{route('client.comment', $sanPhamDetail[0]->id)}}" class="comment-form" style="margin-top: 40px">
                            @csrf
                            <p class="comment-form-comment"><label for="comment">Nội Dung&nbsp;<span class="required">*</span></label><textarea
                                    id="comment" name="comment" cols="45" rows="8"
                                    placeholder="Nhập nội dung bình luận..."
                                    required=""></textarea></p>
                                   <p class="form-submit"><input name="submit" id="submit" class="submit"
                                   value="Gửi" type="submit" style="cursor: pointer">
                                   </p>
                            </form>
                           <style>
                            .message-box::before {
                            content: '';
                            position: absolute;
                            top: 8px; /* Điều chỉnh vị trí mũi nhọn theo trục y */
                            left: 0;
                            transform: translateX(-100%); /* Điều chỉnh vị trí mũi nhọn theo trục x */
                            border-width: 10px;
                            border-style: solid;
                            border-color: transparent #e7eaec transparent transparent;
                            }
                            .message-box::after {
                            content: '';
                            position: absolute;
                            top: 10px; /* Điều chỉnh vị trí mũi nhọn theo trục y */
                            left: 0;
                            transform: translateX(-100%); /* Điều chỉnh vị trí mũi nhọn theo trục x */
                            border-width: 8px;
                            border-style: solid;
                            border-color: transparent #f5f5f5 transparent transparent;
                            }
                           </style>
                           </div>
                        <div class="kobolg-Tabs-panel kobolg-Tabs-panel--reviews panel entry-content kobolg-tab"
                             id="tab-reviews" role="tabpanel" aria-labelledby="tab-title-reviews">
                            <div id="reviews" class="kobolg-Reviews">
                                <div id="comments">
                                    <h2 class="kobolg-Reviews-title">Reviews</h2>
                                </div>
                                <div id="review_form_wrapper">
                                    <div style="display: flex; margin-bottom: 30px">
                                                <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 25%; border: 1px solid rgba(0, 0, 0, 0.1); border-top-left-radius: 3px; border-bottom-left-radius: 3px">
                                                  <strong>{{round($listDanhGia->avg('sao') * 2) / 2}}/5</strong>
                                                  <div>
                                                    <?php
                                                            $danhGia = $listDanhGia->avg('sao');
                                                            // Làm tròn giá trị $danhGia lên 0.5
                                                            $danhGia = round($danhGia * 2) / 2;
                                            
                                                            // Khởi tạo số lượng sao đầy, sao rưỡi, và sao trống
                                                            $fullStars = floor($danhGia);
                                                            $halfStar = ($danhGia - $fullStars >= 0.5) ? 1 : 0;
                                                            $emptyStars = 5 - $fullStars - $halfStar;
                                            
                                                            // In sao đầy
                                                            for ($i = 0; $i < $fullStars; $i++) {
                                                                echo '<i class="fa fa-star text-warning"></i> ';
                                                            }
                                            
                                                            // In sao rưỡi
                                                            if ($halfStar) {
                                                                echo '<i class="fa fa-star-half-o text-warning"></i> ';
                                                            }
                                            
                                                            // In sao trống
                                                            for ($i = 0; $i < $emptyStars; $i++) {
                                                                echo '<i class="fa fa-star-o text-warning"></i> ';
                                                            }
                                                        ?>
                                                  </div>
                                                </div>
                                              <div style="flex: 1; border: 1px solid rgba(0, 0, 0, 0.1); border-left: none; border-top-right-radius: 3px; border-bottom-right-radius: 3px"><div>
                                                <div style="border-bottom: 1px solid rgba(0, 0, 0, 0.1); text-align: center; padding-top: 3px; padding-bottom: 3px">{{$listDanhGia->where('sao', 1)->count()}} đánh giá 1 <i class="fa fa-star text-warning"></i></div>
                                                   <div style="border-bottom: 1px solid rgba(0, 0, 0, 0.1); text-align: center; padding-top: 3px; padding-bottom: 3px">{{$listDanhGia->where('sao', 2)->count()}} đánh giá 2 <i class="fa fa-star text-warning"></i></div>
                                                   <div style="border-bottom: 1px solid rgba(0, 0, 0, 0.1); text-align: center; padding-top: 3px; padding-bottom: 3px">{{$listDanhGia->where('sao', 3)->count()}} đánh giá 3 <i class="fa fa-star text-warning"></i></div>
                                                   <div style="border-bottom: 1px solid rgba(0, 0, 0, 0.1); text-align: center; padding-top: 3px; padding-bottom: 3px">{{$listDanhGia->where('sao', 4)->count()}} đánh giá 4 <i class="fa fa-star text-warning"></i></div>
                                                   <div style="text-align: center; padding-top: 3px; padding-bottom: 3px">{{$listDanhGia->where('sao', 5)->count()}} đánh giá 5 <i class="fa fa-star text-warning"></i></div>
                                              </div>
                                                </div>
                                            </div>
                                    <div id="review_form">
                                        <div id="respond" class="comment-respond">
                                            @forelse ($listDanhGia as $key => $value)
                                            <div style="display: flex; align-items: center; margin-bottom: 10px">
                                                <a href="" style="margin-right: 10px">
                                                    <img src="{{$value->anh_dai_dien === NULL ? "./storage/uploads/khachhang/avatar.png" : ".".Storage::url($value->anh_dai_dien)}}" style="width: 60px; border-radius: 50%" alt="">
                                                    </a>
                                                    <div>
                                                        <strong>{{(Auth::id() && $value->id === Auth::id()) ? 'Bạn' : $value->name}}</strong><span> đã đánh giá </span><strong>{{$value->sao}} sao</strong><br>
                                                        <small style="margin-right: 5px"><?php
                                                            $danhGia = $value->sao;
                                                            // Làm tròn giá trị $danhGia lên 0.5
                                                            $danhGia = round($danhGia * 2) / 2;
                                            
                                                            // Khởi tạo số lượng sao đầy, sao rưỡi, và sao trống
                                                            $fullStars = floor($danhGia);
                                                            $halfStar = ($danhGia - $fullStars >= 0.5) ? 1 : 0;
                                                            $emptyStars = 5 - $fullStars - $halfStar;
                                            
                                                            // In sao đầy
                                                            for ($i = 0; $i < $fullStars; $i++) {
                                                                echo '<i class="fa fa-star text-warning"></i> ';
                                                            }
                                            
                                                            // In sao rưỡi
                                                            if ($halfStar) {
                                                                echo '<i class="fa fa-star-half-o text-warning"></i> ';
                                                            }
                                            
                                                            // In sao trống
                                                            for ($i = 0; $i < $emptyStars; $i++) {
                                                                echo '<i class="fa fa-star-o text-warning"></i> ';
                                                            }
                                                        ?></small>
                                                        <small>{{date('d.m.Y', strtotime($value->ngay_danh_gia))}}</small>
                                                    </div>
                                            </div>
                                           <div class="message-box" style="margin-bottom: 25px; margin-left: 25px; border: 1px solid #e7eaec; padding: 10px 20px; border-radius: 4px; width: 30%; align-items: center; background-color: #f5f5f5; position: relative"><p style="font-size: 13px">{{$value->noi_dung}}</p></div>
                                           @empty
                                           <p style="margin-bottom: 0" class="kobolg-noreviews">Hiện chưa có đánh giá nào.</p>
                                            <span id="reply-title" class="comment-reply-title" style="margin-bottom: 0">Hãy là người đầu tiên đánh giá cho “{{$sanPhamDetail[0]->ten_san_pham}}”</span>
                                            @endforelse
                                            <form id="commentform" class="comment-form" style="margin-top: 30px" method="post" action="{{route('client.review', $sanPhamDetail[0]->id)}}">
                                                @csrf
                                                <div class="comment-form-rating">
                                                    <label for="rating">Your rating</label>
                                                    <p class="stars" style="margin-bottom: 0">
                                                        <i class="fa fa-star-o text-warning" style="font-size: 16px; cursor: pointer" data-value="1"></i> 
                                                        <i class="fa fa-star-o text-warning" style="font-size: 16px; cursor: pointer" data-value="2"></i> 
                                                        <i class="fa fa-star-o text-warning" style="font-size: 16px; cursor: pointer" data-value="3"></i> 
                                                        <i class="fa fa-star-o text-warning" style="font-size: 16px; cursor: pointer" data-value="4"></i> 
                                                        <i class="fa fa-star-o text-warning" style="font-size: 16px; cursor: pointer" data-value="5"></i>
                                                    </p>
                                                    <input type="hidden" id="rating" name="rating" value="0">
                                                </div>
                                                <p class="comment-form-comment">
                                                    <label for="comment">Your review&nbsp;<span class="required">*</span></label>
                                                    <textarea id="comment" name="comment" cols="45" rows="8" required=""></textarea>
                                                </p>
                                                <p class="form-submit">
                                                    <input id="submit" class="submit" style="cursor: pointer" value="Đánh giá" type="submit">
                                                </p>
                                            </form>
                                        </div><!-- #respond -->
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 dreaming_related-product">
                <div class="block-title">
                    <h2 class="product-grid-title">
                        <span>Sản Phẩm Cùng Loại</span>
                    </h2>
                </div>
                <div class="owl-slick owl-products equal-container better-height"
                     data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:30,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4}"
                     data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;30&quot;}}]">
                     @foreach ($sanPhamCungLoai as $key => $value)
                     <div class="product-item style-01 post-27 product type-product status-publish has-post-thumbnail product_cat-table product_cat-new-arrivals product_cat-lamp product_tag-table product_tag-sock  instock shipping-taxable purchasable product-type-variable has-default-attributes ">
                        <div class="product-inner tooltip-left">
                            <div class="product-thumb">
                                <a class="thumb-link" style="display: flex; justify-content: center; align-items: center; width: 100%; aspect-ratio: 1/1; overflow: hidden;" href="javascript:void(0)">
                                    <div>
                                  <img
                                    class="img-responsive"
                                    src="{{'.'.Storage::url($value->anh_san_pham)}}"
                                    alt="Ảnh Sản Phẩm"
                                    style="width: 100%;"
                                  />
                                </div>
                                </a>
                                <div class="flash"><span class="onnew"><span class="text">New</span></span></div>
                                @if($value->kieu_san_pham == 2)
                                    <div class="variations_form cart">
                                        <table class="variations">
                                        <tbody>
                                            <tr>
                                            <td class="value">
                                                <select
                                                title="box_style"
                                                data-attributetype="box_style"
                                                data-id="pa_color"
                                                class="attribute-select"
                                                name="attribute_pa_color"
                                                data-attribute_name="attribute_pa_color"
                                                data-show_option_none="yes"
                                                tabindex="-1"
                                                >
                                                <option data-type="" data-pa_color="" value="">
                                                    Choose an option
                                                </option>
                                                <option
                                                    data-width="30"
                                                    data-height="30"
                                                    data-type="color"
                                                    data-pa_color="#3155e2"
                                                    value="blue"
                                                >
                                                    Blue
                                                </option>
                                                <option
                                                    data-width="30"
                                                    data-height="30"
                                                    data-type="color"
                                                    data-pa_color="#49aa51"
                                                    value="green"
                                                >
                                                    Green
                                                </option>
                                                <option
                                                    data-width="30"
                                                    data-height="30"
                                                    data-type="color"
                                                    data-pa_color="#ff63cb"
                                                    value="pink"
                                                >
                                                    Pink
                                                </option>
                                                </select>
                                                <div
                                                class="data-val attribute-pa_color"
                                                data-attributetype="box_style"
                                                >
                                                <a
                                                    class="change-value color"
                                                    href="#"
                                                    style="background: #3155e2"
                                                    data-value="blue"
                                                ></a
                                                ><a
                                                    class="change-value color"
                                                    href="#"
                                                    style="background: #49aa51"
                                                    data-value="green"
                                                ></a
                                                ><a
                                                    class="change-value color"
                                                    href="#"
                                                    style="background: #ff63cb"
                                                    data-value="pink"
                                                ></a>
                                                </div>
                                                <a class="reset_variations" href="#" tabindex="-1"
                                                >Clear</a
                                                >
                                            </td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                    @endif
                                <div class="group-button">
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button show">
                                            <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                        </div>
                                    </div>
                                    <a href="{{route('client.show', $value->id)}}" class="button yith-wcqv-button">Quick View</a>
                                    <div class="add-to-cart">
                                        <a href="#" class="button product_type_variable add_to_cart_button">Add to
                                            cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info equal-elem">
                                <h3 class="product-name product_title">
                                    <a href="#"
                                       tabindex="0">{{$value->ten_san_pham}}</a>
                                </h3>
                                <div class="rating-wapper">
                                    <div>
                                        <?php
                                        $danhGia = $value->trungBinhSao;
                                        // Làm tròn giá trị $danhGia lên 0.5
                                        $danhGia = round($danhGia * 2) / 2;
                        
                                        // Khởi tạo số lượng sao đầy, sao rưỡi, và sao trống
                                        $fullStars = floor($danhGia);
                                        $halfStar = ($danhGia - $fullStars >= 0.5) ? 1 : 0;
                                        $emptyStars = 5 - $fullStars - $halfStar;
                        
                                        // In sao đầy
                                        for ($i = 0; $i < $fullStars; $i++) {
                                            echo '<i class="fa fa-star text-warning"></i> ';
                                        }
                        
                                        // In sao rưỡi
                                        if ($halfStar) {
                                            echo '<i class="fa fa-star-half-o text-warning"></i> ';
                                        }
                        
                                        // In sao trống
                                        for ($i = 0; $i < $emptyStars; $i++) {
                                            echo '<i class="fa fa-star-o text-warning"></i> ';
                                        }
                                    ?>
                                      </div>
                                </div>
                                <span class="price"><span class="kobolg-Price-amount amount"><span
                                    class="kobolg-Price-currencySymbol">@if($value->kieu_san_pham == 2)
                                    {{number_format($value->gia_min, 0, '', '.')}} vnđ - {{number_format($value->gia_max, 0, '', '.')}} vnđ
                                    @else
                                    {{number_format($value->gia, 0, '', '.')}} vnđ
                                    @endif</span>
                            </div>
                        </div>
                    </div>
                     @endforeach
                    {{-- <div class="product-item style-01 post-27 product type-product status-publish has-post-thumbnail product_cat-table product_cat-new-arrivals product_cat-lamp product_tag-table product_tag-sock  instock shipping-taxable purchasable product-type-variable has-default-attributes ">
                        <div class="product-inner tooltip-left">
                            <div class="product-thumb">
                                <a class="thumb-link"
                                   href="#" tabindex="0">
                                    <img class="img-responsive"
                                         src="assets/images/apro101-1-600x778.jpg"
                                         alt="Mac 27 Inch" width="600" height="778">
                                </a>
                                <div class="flash"><span class="onnew"><span class="text">New</span></span></div>
                                <div class="group-button">
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button show">
                                            <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="kobolg product compare-button">
                                        <a href="#" class="compare button">Compare</a>
                                    </div>
                                    <a href="#" class="button yith-wcqv-button">Quick View</a>
                                    <div class="add-to-cart">
                                        <a href="#" class="button product_type_variable add_to_cart_button">Add to
                                            cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info equal-elem">
                                <h3 class="product-name product_title">
                                    <a href="#"
                                       tabindex="0">Mac 27 Inch</a>
                                </h3>
                                <div class="rating-wapper nostar">
                                    <div class="star-rating"><span style="width:0%">Rated <strong
                                            class="rating">0</strong> out of 5</span></div>
                                    <span class="review">(0)</span></div>
                                <span class="price"><span class="kobolg-Price-amount amount"><span
                                        class="kobolg-Price-currencySymbol">$</span>60.00</span></span>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="product-item style-01 post-30 product type-product status-publish has-post-thumbnail product_cat-light product_cat-bed product_cat-specials product_tag-light product_tag-table product_tag-sock last instock featured downloadable shipping-taxable purchasable product-type-simple  ">
                        <div class="product-inner tooltip-left">
                            <div class="product-thumb">
                                <a class="thumb-link" href="#"
                                   tabindex="0">
                                    <img class="img-responsive"
                                         src="assets/images/apro41-1-600x778.jpg"
                                         alt="White Watches" width="600" height="778">
                                </a>
                                <div class="flash">
                                    <span class="onnew"><span class="text">New</span></span></div>
                                <div class="group-button">
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button show">
                                            <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="kobolg product compare-button">
                                        <a href="#" class="compare button">Compare</a>
                                    </div>
                                    <a href="#" class="button yith-wcqv-button">Quick View</a>
                                    <div class="add-to-cart">
                                        <a href="#" class="button product_type_variable add_to_cart_button">Add to
                                            cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info equal-elem">
                                <h3 class="product-name product_title">
                                    <a href="#" tabindex="0">White Watches</a>
                                </h3>
                                <div class="rating-wapper nostar">
                                    <div class="star-rating"><span style="width:0%">Rated <strong
                                            class="rating">0</strong> out of 5</span></div>
                                    <span class="review">(0)</span></div>
                                <span class="price"><span class="kobolg-Price-amount amount"><span
                                        class="kobolg-Price-currencySymbol">$</span>134.00</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="product-item style-01 post-35 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-new-arrivals product_cat-lamp product_tag-light product_tag-hat product_tag-sock first instock shipping-taxable purchasable product-type-simple  ">
                        <div class="product-inner tooltip-left">
                            <div class="product-thumb">
                                <a class="thumb-link"
                                   href="#" tabindex="0">
                                    <img class="img-responsive"
                                         src="assets/images/apro151-1-600x778.jpg"
                                         alt="Cellphone Factory" width="600" height="778">
                                </a>
                                <div class="flash">
                                    <span class="onsale"><span class="number">-11%</span></span>
                                    <span class="onnew"><span class="text">New</span></span></div>
                                <div class="group-button">
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button show">
                                            <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="kobolg product compare-button">
                                        <a href="#" class="compare button">Compare</a>
                                    </div>
                                    <a href="#" class="button yith-wcqv-button">Quick View</a>
                                    <div class="add-to-cart">
                                        <a href="#" class="button product_type_variable add_to_cart_button">Add to
                                            cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info equal-elem">
                                <h3 class="product-name product_title">
                                    <a href="#" tabindex="0">Cellphone Factory</a>
                                </h3>
                                <div class="rating-wapper nostar">
                                    <div class="star-rating"><span style="width:0%">Rated <strong
                                            class="rating">0</strong> out of 5</span></div>
                                    <span class="review">(0)</span></div>
                                <span class="price"><del><span class="kobolg-Price-amount amount"><span
                                        class="kobolg-Price-currencySymbol">$</span>89.00</span></del> <ins><span
                                        class="kobolg-Price-amount amount"><span
                                        class="kobolg-Price-currencySymbol">$</span>79.00</span></ins></span>
                            </div>
                        </div>
                    </div>
                    <div class="product-item style-01 post-25 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-specials product_tag-light product_tag-sock  instock sale featured shipping-taxable purchasable product-type-simple ">
                        <div class="product-inner tooltip-left">
                            <div class="product-thumb">
                                <a class="thumb-link"
                                   href="#" tabindex="-1">
                                    <img class="img-responsive"
                                         src="assets/images/apro13-1-600x778.jpg"
                                         alt="Meta Watches                                                " width="600" height="778">
                                </a>
                                <div class="flash">
                                    <span class="onnew"><span class="text">New</span></span></div>
                                <div class="group-button">
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button show">
                                            <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="kobolg product compare-button">
                                        <a href="#" class="compare button">Compare</a>
                                    </div>
                                    <a href="#" class="button yith-wcqv-button">Quick View</a>
                                    <div class="add-to-cart">
                                        <a href="#" class="button product_type_variable add_to_cart_button">Add to
                                            cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info equal-elem">
                                <h3 class="product-name product_title">
                                    <a href="#"
                                       tabindex="-1">Meta Watches                                                </a>
                                </h3>
                                <div class="rating-wapper nostar">
                                    <div class="star-rating"><span style="width:0%">Rated <strong
                                            class="rating">0</strong> out of 5</span></div>
                                    <span class="review">(0)</span></div>
                                <span class="price"><span class="kobolg-Price-amount amount"><span
                                        class="kobolg-Price-currencySymbol">$</span>109.00</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="product-item style-01 post-93 product type-product status-publish has-post-thumbnail product_cat-light product_cat-table product_cat-new-arrivals product_tag-table product_tag-sock last instock shipping-taxable purchasable product-type-simple ">
                        <div class="product-inner tooltip-left">
                            <div class="product-thumb">
                                <a class="thumb-link" href="#"
                                   tabindex="-1">
                                    <img class="img-responsive"
                                         src="assets/images/apro181-2-600x778.jpg"
                                         alt="Red Mouse" width="600" height="778">
                                </a>
                                <div class="flash">
                                    <span class="onnew"><span class="text">New</span></span></div>
                                <div class="group-button">
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button show">
                                            <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="kobolg product compare-button">
                                        <a href="#" class="compare button">Compare</a>
                                    </div>
                                    <a href="#" class="button yith-wcqv-button">Quick View</a>
                                    <div class="add-to-cart">
                                        <a href="#" class="button product_type_variable add_to_cart_button">Add to
                                            cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info equal-elem">
                                <h3 class="product-name product_title">
                                    <a href="#" tabindex="-1">City
                                        life jumpers</a>
                                </h3>
                                <div class="rating-wapper nostar">
                                    <div class="star-rating"><span style="width:0%">Rated <strong
                                            class="rating">0</strong> out of 5</span></div>
                                    <span class="review">(0)</span></div>
                                <span class="price"><span class="kobolg-Price-amount amount"><span
                                        class="kobolg-Price-currencySymbol">$</span>98.00</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="product-item style-01 post-22 product type-product status-publish has-post-thumbnail product_cat-table product_cat-bed product_cat-lamp product_tag-table product_tag-hat product_tag-sock first instock featured downloadable shipping-taxable purchasable product-type-simple ">
                        <div class="product-inner tooltip-left">
                            <div class="product-thumb">
                                <a class="thumb-link" href="#"
                                   tabindex="-1">
                                    <img class="img-responsive"
                                         src="assets/images/apro171-1-600x778.jpg"
                                         alt="Photo Camera" width="600" height="778">
                                </a>
                                <div class="flash">
                                    <span class="onnew"><span class="text">New</span></span></div>
                                <form class="variations_form cart">
                                    <table class="variations">
                                        <tbody>
                                        <tr>
                                            <td class="value">
                                                <select title="box_style" data-attributetype="box_style"
                                                        data-id="pa_color"
                                                        class="attribute-select " name="attribute_pa_color"
                                                        data-attribute_name="attribute_pa_color"
                                                        data-show_option_none="yes" tabindex="-1">
                                                    <option data-type="" data-pa_color="" value="">Choose an
                                                        option
                                                    </option>
                                                    <option data-width="30" data-height="30" data-type="color"
                                                            data-pa_color="#ff63cb" value="pink"
                                                            class="attached enabled">Pink
                                                    </option>
                                                    <option data-width="30" data-height="30" data-type="color"
                                                            data-pa_color="#a825ea" value="purple"
                                                            class="attached enabled">Purple
                                                    </option>
                                                    <option data-width="30" data-height="30" data-type="color"
                                                            data-pa_color="#db2b00" value="red"
                                                            class="attached enabled">Red
                                                    </option>
                                                </select>
                                                <div class="data-val attribute-pa_color"
                                                     data-attributetype="box_style"><a
                                                        class="change-value color" href="#"
                                                        style="background: #ff63cb;" data-value="pink"></a><a
                                                        class="change-value color" href="#"
                                                        style="background: #a825ea;" data-value="purple"></a><a
                                                        class="change-value color" href="#"
                                                        style="background: #db2b00;" data-value="red"></a></div>
                                                <a class="reset_variations" href="#" tabindex="-1"
                                                   style="visibility: hidden;">Clear</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </form>
                                <div class="group-button">
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button show">
                                            <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="kobolg product compare-button">
                                        <a href="#" class="compare button">Compare</a>
                                    </div>
                                    <a href="#" class="button yith-wcqv-button">Quick View</a>
                                    <div class="add-to-cart">
                                        <a href="#" class="button product_type_variable add_to_cart_button">Select
                                            options</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info equal-elem">
                                <h3 class="product-name product_title">
                                    <a href="#" tabindex="-1">Photo Camera</a>
                                </h3>
                                <div class="rating-wapper nostar">
                                    <div class="star-rating"><span style="width:0%">Rated <strong
                                            class="rating">0</strong> out of 5</span></div>
                                    <span class="review">(0)</span></div>
                                <span class="price"><span class="kobolg-Price-amount amount"><span
                                        class="kobolg-Price-currencySymbol">$</span>105.00</span> – <span
                                        class="kobolg-Price-amount amount"><span
                                        class="kobolg-Price-currencySymbol">$</span>110.00</span></span>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.stars i');
    const ratingInput = document.getElementById('rating');

    stars.forEach(star => {
        star.addEventListener('click', function() {
            const rating = this.getAttribute('data-value');
            ratingInput.value = rating;

            stars.forEach(s => {
                if (s.getAttribute('data-value') <= rating) {
                    s.classList.remove('fa-star-o');
                    s.classList.add('fa-star');
                } else {
                    s.classList.remove('fa-star');
                    s.classList.add('fa-star-o');
                }
            });
        });
    });
});
</script>