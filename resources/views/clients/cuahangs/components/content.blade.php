<div class="main-container shop-page left-sidebar">
    <div class="container">
        <div class="row">
            <div class="main-content col-xl-9 col-lg-8 col-md-8 col-sm-12 has-sidebar">
                <form id="form_filter" action="{{route('client.shop')}}" method="get">
                    <div class="shop-control shop-before-control">
                        <div class="grid-view-mode">
                            <div>
                                <a href="shop.html" data-toggle="tooltip" data-placement="top"
                                        class="modes-mode mode-grid display-mode active" value="grid">
                                    <span class="button-inner">
                                        Shop Grid
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </span>
                                </a>
                                <a href="shop-list.html" data-toggle="tooltip" data-placement="top"
                                        class="modes-mode mode-list display-mode " value="list">
                                    <span class="button-inner">
                                        Shop List
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="kobolg-ordering">
                            <select title="product_cat" name="orderby" onchange="submitForm()" class="orderby">
                                <option value="0">Sắp xếp theo</option>
                                <option value="oldest" {{$orderBy=="oldest" ? "selected" : ""}}>Cũ Nhất</option>
                                <option value="rating" {{$orderBy=="rating" ? "selected" : ""}}>Đánh giá</option>
                                <option value="sellerest" {{$orderBy=="sellerest" ? "selected" : ""}}>Bán chạy nhất</option>
                                <option value="price" {{$orderBy=="price" ? "selected" : ""}}>Giá: thấp - cao</option>
                                <option value="price-desc" {{$orderBy=="price-desc" ? "selected" : ""}}>Giá: cao - thấp</option>
                            </select>
                        </div>
                        <div class="per-page-form">
                            <label>
                                <select class="option-perpage" name="perpage" onchange="submitForm()">
                                    <option value="9" {{$perPage==9 ? "selected" : ""}}>
                                        9 sản phẩm
                                    </option>
                                    <option value="12" {{$perPage==12 ? "selected" : ""}}>
                                        12 sản phẩm
                                    </option>
                                    <option value="15" {{$perPage==15 ? "selected" : ""}}>
                                        15 sản phẩm
                                    </option>
                                    <option value="18" {{$perPage==18 ? "selected" : ""}}>
                                        18 sản phẩm
                                    </option>
                                </select>
                            </label>
                        </div>
                    </div>
                </form>
                <div class=" auto-clear equal-container better-height kobolg-products">
                    <ul class="row products columns-3">
                        {{-- <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-ts-6 style-01 post-24 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-table product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock first instock featured shipping-taxable purchasable product-type-variable has-default-attributes"
                            data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#">
                                        <img class="img-responsive"
                                             src="assets/images/apro161-1-600x778.jpg"
                                             alt="Gaming Mouse" width="600" height="778">
                                    </a>
                                    <div class="flash">
                                        <span class="onnew"><span class="text">New</span></span></div>
                                    <form class="variations_form cart">
                                        <table class="variations">
                                            <tbody>
                                            <tr>
                                                <td class="value">
                                                    <select title="box_style" data-attributetype="box_style" data-id="pa_color"
                                                            class="attribute-select " name="attribute_pa_color"
                                                            data-attribute_name="attribute_pa_color"
                                                            data-show_option_none="yes">
                                                        <option data-type="" data-pa_color="" value="">Choose an
                                                            option
                                                        </option>
                                                        <option data-width="30" data-height="30" data-type="color"
                                                                data-pa_color="#3155e2" value="blue"
                                                                class="attached enabled">Blue
                                                        </option>
                                                        <option data-width="30" data-height="30" data-type="color"
                                                                data-pa_color="#49aa51" value="green"
                                                                class="attached enabled">Green
                                                        </option>
                                                        <option data-width="30" data-height="30" data-type="color"
                                                                data-pa_color="#ff63cb" value="pink"
                                                                class="attached enabled">Pink
                                                        </option>
                                                    </select>
                                                    <div class="data-val attribute-pa_color"
                                                         data-attributetype="box_style"><a class="change-value color"
                                                                                           href="#"
                                                                                           style="background: #3155e2;"
                                                                                           data-value="blue"></a><a
                                                            class="change-value color" href="#"
                                                            style="background: #49aa51;" data-value="green"></a><a
                                                            class="change-value color" href="#"
                                                            style="background: #ff63cb;" data-value="pink"></a></div>
                                                    <a class="reset_variations" href="#" style="visibility: hidden;">Clear</a>
                                                </td>
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
                                        <a href="#">Gaming Mouse</a>
                                    </h3>
                                    <div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span></div>
                                    <span class="price"><span class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>45.00</span> – <span
                                            class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>54.00</span></span>
                                </div>
                            </div>
                        </li> --}}
                        {{-- <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-ts-6 style-01 post-28 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-light product_tag-sock  instock sale featured shipping-taxable purchasable product-type-simple"
                            data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#">
                                        <img class="img-responsive"
                                             src="assets/images/apro1211-2-600x778.jpg"
                                             alt="Modern Watches" width="600" height="778">
                                    </a>
                                    <div class="flash">
                                        <span class="onsale"><span class="number">-14%</span></span>
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
                                            <a href="#" class="button product_type_simple add_to_cart_button">Add to
                                                cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info equal-elem">
                                    <h3 class="product-name product_title">
                                        <a href="#">Modern Watches</a>
                                    </h3>
                                    <div class="rating-wapper ">
                                        <div class="star-rating"><span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5</span>
                                        </div>
                                        <span class="review">(1)</span></div>
                                    <span class="price"><del><span class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>138.00</span></del> <ins><span
                                            class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>119.00</span></ins></span>
                                </div>
                            </div>
                        </li> --}}
                        @foreach ($allSanPham as $key => $value)
                        <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-ts-6 style-01 post-30 product type-product status-publish has-post-thumbnail product_cat-light product_cat-bed product_cat-specials product_tag-light product_tag-table product_tag-sock last instock featured downloadable shipping-taxable purchasable product-type-simple"
                        data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
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
                                <div class="flash">
                                    <span class="onnew"><span class="text">New</span></span></div>
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
                                    {{-- <div class="kobolg product compare-button">
                                        <a href="#" class="compare button">Compare</a>
                                    </div> --}}
                                    <a href="{{route('client.show', $value->id)}}" class="button yith-wcqv-button">Quick View</a>
                                    <div class="add-to-cart">
                                        <a href="#" class="button product_type_simple add_to_cart_button">Add to
                                            cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info equal-elem">
                                <h3 class="product-name product_title">
                                    <a href="#">{{$value->ten_san_pham}}</a>
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
                    </li>
                        @endforeach
                        {{-- <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-ts-6 style-01 post-30 product type-product status-publish has-post-thumbnail product_cat-light product_cat-bed product_cat-specials product_tag-light product_tag-table product_tag-sock last instock featured downloadable shipping-taxable purchasable product-type-simple"
                            data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#">
                                        <img class="img-responsive"
                                             src="assets/images/apro101-1-600x778.jpg"
                                             alt="Mac 27 Inch" width="600" height="778">
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
                                            <a href="#" class="button product_type_simple add_to_cart_button">Add to
                                                cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info equal-elem">
                                    <h3 class="product-name product_title">
                                        <a href="#">Mac 27 Inch</a>
                                    </h3>
                                    <div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span></div>
                                    <span class="price"><span class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>60.00</span></span>
                                </div>
                            </div>
                        </li> --}}
                        {{-- <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-ts-6 style-01 post-23 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-lamp product_cat-sofas product_tag-hat first instock shipping-taxable purchasable product-type-variable has-default-attributes"
                            data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#">
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
                                                    <select title="box_style" data-attributetype="box_style" data-id="pa_color"
                                                            class="attribute-select " name="attribute_pa_color"
                                                            data-attribute_name="attribute_pa_color"
                                                            data-show_option_none="yes">
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
                                                         data-attributetype="box_style"><a class="change-value color"
                                                                                           href="#"
                                                                                           style="background: #ff63cb;"
                                                                                           data-value="pink"></a><a
                                                            class="change-value color" href="#"
                                                            style="background: #a825ea;" data-value="purple"></a><a
                                                            class="change-value color" href="#"
                                                            style="background: #db2b00;" data-value="red"></a></div>
                                                    <a class="reset_variations" href="#" style="visibility: hidden;">Clear</a>
                                                </td>
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
                                        <a href="#">Photo Camera</a>
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
                        </li>
                        <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-ts-6 style-01 post-35 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-new-arrivals product_cat-lamp product_tag-light product_tag-hat product_tag-sock  instock shipping-taxable purchasable product-type-simple"
                            data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#">
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
                                            <a href="#" class="button product_type_simple add_to_cart_button">Add to
                                                cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info equal-elem">
                                    <h3 class="product-name product_title">
                                        <a href="#">White Watches</a>
                                    </h3>
                                    <div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span></div>
                                    <span class="price"><span class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>134.00</span></span>
                                </div>
                            </div>
                        </li>
                        <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-ts-6 style-01 post-22 product type-product status-publish has-post-thumbnail product_cat-table product_cat-bed product_cat-lamp product_tag-table product_tag-hat product_tag-sock last instock featured downloadable shipping-taxable purchasable product-type-simple"
                            data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#">
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
                                            <a href="#" class="button product_type_simple add_to_cart_button">Add to
                                                cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info equal-elem">
                                    <h3 class="product-name product_title">
                                        <a href="#">Red Mouse</a>
                                    </h3>
                                    <div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span></div>
                                    <span class="price"><span class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>98.00</span></span>
                                </div>
                            </div>
                        </li>
                        <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-ts-6 style-01 post-33 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-table product_cat-lamp product_tag-light product_tag-table product_tag-hat first instock shipping-taxable purchasable product-type-variable has-default-attributes"
                            data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#">
                                        <img class="img-responsive"
                                             src="assets/images/apro83-1-600x778.jpg"
                                             alt="Glasses" width="600" height="778">
                                    </a>
                                    <div class="flash">
                                        <span class="onnew"><span class="text">New</span></span></div>
                                    <form class="variations_form cart">
                                        <table class="variations">
                                            <tbody>
                                            <tr>
                                                <td class="value">
                                                    <select title="box_style" data-attributetype="box_style" data-id="pa_color"
                                                            class="attribute-select " name="attribute_pa_color"
                                                            data-attribute_name="attribute_pa_color"
                                                            data-show_option_none="yes">
                                                        <option data-type="" data-pa_color="" value="">Choose an
                                                            option
                                                        </option>
                                                        <option data-width="30" data-height="30" data-type="color"
                                                                data-pa_color="#000000" value="black"
                                                                class="attached enabled">Black
                                                        </option>
                                                        <option data-width="30" data-height="30" data-type="color"
                                                                data-pa_color="#db2b00" value="red"
                                                                class="attached enabled">Red
                                                        </option>
                                                    </select>
                                                    <div class="data-val attribute-pa_color"
                                                         data-attributetype="box_style"><a class="change-value color"
                                                                                           href="#"
                                                                                           style="background: #000000;"
                                                                                           data-value="black"></a><a
                                                            class="change-value color" href="#"
                                                            style="background: #db2b00;" data-value="red"></a></div>
                                                    <a class="reset_variations" href="#" style="visibility: hidden;">Clear</a>
                                                </td>
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
                                        <a href="#">Modern Headphone</a>
                                    </h3>
                                    <div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span></div>
                                    <span class="price"><span class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>56.00</span> – <span
                                            class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>60.00</span></span>
                                </div>
                            </div>
                        </li>
                        <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-ts-6 style-01 post-26 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-light product_tag-hat  instock featured shipping-taxable product-type-external"
                            data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#">
                                        <img class="img-responsive"
                                             src="assets/images/apro141-1-600x778.jpg"
                                             alt="Smart Monitor" width="600" height="778">
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
                                            <a href="#" class="button product_type_external add_to_cart_button">Buy it
                                                on Amazon</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info equal-elem">
                                    <h3 class="product-name product_title">
                                        <a href="#">Smart Monitor</a>
                                    </h3>
                                    <div class="rating-wapper ">
                                        <div class="star-rating"><span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5</span>
                                        </div>
                                        <span class="review">(1)</span></div>
                                    <span class="price"><span class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>207.00</span></span>
                                </div>
                            </div>
                        </li>
                        <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-ts-6 style-01 post-34 product type-product status-publish has-post-thumbnail product_cat-light product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock last instock sale featured shipping-taxable product-type-grouped"
                            data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#">
                                        <img class="img-responsive"
                                             src="assets/images/apro61-1-600x778.jpg"
                                             alt="Black Watches" width="600" height="778">
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
                                            <a href="#" class="button product_type_grouped add_to_cart_button">View
                                                products</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info equal-elem">
                                    <h3 class="product-name product_title">
                                        <a href="#">Black Watches</a>
                                    </h3>
                                    <div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span></div>
                                    <span class="price"><span class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>79.00</span> – <span
                                            class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>139.00</span></span>
                                </div>
                            </div>
                        </li>
                        <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-ts-6 style-01 post-32 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-hat product_tag-sock first instock sale featured shipping-taxable purchasable product-type-simple"
                            data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#">
                                        <img class="img-responsive"
                                             src="assets/images/apro71-1-600x778.jpg"
                                             alt="Gaming Mouse" width="600" height="778">
                                    </a>
                                    <div class="flash">
                                        <span class="onsale"><span class="number">-18%</span></span>
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
                                            <a href="#" class="button product_type_simple add_to_cart_button">Add to
                                                cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info equal-elem">
                                    <h3 class="product-name product_title">
                                        <a href="#">Gaming Mouse</a>
                                    </h3>
                                    <div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span></div>
                                    <span class="price"><del><span class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>109.00</span></del> <ins><span
                                            class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>89.00</span></ins></span>
                                </div>
                            </div>
                        </li>
                        <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-ts-6 style-01 post-21 product type-product status-publish has-post-thumbnail product_cat-light product_cat-bed product_cat-lamp product_tag-light product_tag-sock  outofstock featured shipping-taxable purchasable product-type-simple"
                            data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#">
                                        <img class="img-responsive"
                                             src="assets/images/apro191-1-600x778.jpg"
                                             alt="Pink Headphone                                                  " width="600" height="778">
                                    </a>
                                    <div class="flash">
                                        <span class="sold-out"><span>Sold out</span></span>
                                    </div>
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
                                            <a href="#" class="button product_type_simple add_to_cart_button">Read
                                                more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info equal-elem">
                                    <h3 class="product-name product_title">
                                        <a href="#">Pink Headphone                                                  </a>
                                    </h3>
                                    <div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span></div>
                                    <span class="price"><span class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>35.00</span></span>
                                </div>
                            </div>
                        </li>
                        <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-ts-6 style-01 post-93 product type-product status-publish has-post-thumbnail product_cat-light product_cat-table product_cat-new-arrivals product_tag-table product_tag-sock last instock shipping-taxable purchasable product-type-simple"
                            data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#">
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
                                            <a href="#" class="button product_type_simple add_to_cart_button">Add to
                                                cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info equal-elem">
                                    <h3 class="product-name product_title">
                                        <a href="#">Meta Watches                                                </a>
                                    </h3>
                                    <div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span></div>
                                    <span class="price"><span class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>109.00</span></span>
                                </div>
                            </div>
                        </li> --}}
                    </ul>
                </div>
                <div class="shop-control shop-after-control">
                    <nav class="kobolg-pagination">
                        {{ $allSanPham->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </nav>
                    <style>
                        .kobolg-pagination .active .page-link{
                            background-color: #e52e06;
                            border-color: #e52e06;
                        }
                        .page-link{
                            color: #e52e06;
                        }
                        .page-link:hover{
                            color: #e52e06;
                        }
                        .page-link:active{
                            box-shadow: none
                        }
                    </style>
                    <p class="kobolg-result-count">Hiển thị – {{$perPage}} trên {{$count}} sản phẩm</p>
                </div>
            </div>
            <div class="sidebar col-xl-3 col-lg-4 col-md-4 col-sm-12">
                <div id="widget-area" class="widget-area shop-sidebar">
                    <div id="kobolg_product_search-2" class="widget kobolg widget_product_search">
                        <form class="kobolg-product-search" method="get" action="{{route('client.shop')}}">
                            <input id="kobolg-product-search-field-0" class="search-field"
                                   placeholder="Tìm kiếm..." value="" name="s" type="search">
                            <button type="submit" value="Search">Search</button>
                        </form>
                    </div>
                    <div id="kobolg_price_filter-2" class="widget kobolg widget_price_filter"><h2
                            class="widgettitle">Lọc theo giá<span class="arrow"></span></h2>
                        <form method="get" action="{{route('client.shop')}}">
                            <div class="price_slider_wrapper">
                             <div style="display: flex; margin-bottom: 10px; align-items: center"><input type="radio" value="1-5" {{$price == '1-5' ? 'checked' : ''}} name="price_filter" style="margin-right: 5px" id=""> 1 Triệu - 5 Triệu</div>
                             <div style="display: flex; margin-bottom: 10px; align-items: center"><input type="radio" value="5-10" {{$price == '5-10' ? 'checked' : ''}} name="price_filter" style="margin-right: 5px" id=""> 5 Triệu - 10 Triệu</div>
                             <div style="display: flex; margin-bottom: 10px; align-items: center"><input type="radio" value="10-20" {{$price == '10-20' ? 'checked' : ''}} name="price_filter" style="margin-right: 5px" id=""> 10 Triệu - 20 Triệu</div>
                             <div style="display: flex; margin-bottom: 10px; align-items: center"><input type="radio" value="20-30" {{$price == '20-30' ? 'checked' : ''}} name="price_filter" style="margin-right: 5px" id=""> 20 Triệu - 30 Triệu</div>
                             <div style="display: flex; margin-bottom: 10px; align-items: center"><input type="radio" value="30-40" {{$price == '30-40' ? 'checked' : ''}} name="price_filter" style="margin-right: 5px" id=""> 30 Triệu - 40 Triệu</div>
                             <div style="display: flex; margin-bottom: 10px; align-items: center"><input type="radio" value="40-50" {{$price == '40-50' ? 'checked' : ''}} name="price_filter" style="margin-right: 5px" id=""> 40 Triệu - 50 Triệu</div>
                             <div style="display: flex; margin-bottom: 10px; align-items: center"><input type="radio" value=">50" {{$price == '>50' ? 'checked' : ''}} name="price_filter" style="margin-right: 5px" id=""> Trên 50 Triệu</div>
                             <div class="price_slider_amount" style="display: flex; justify-content: start">
                                <button type="submit" class="button">Filter</button>
                            </div>
                            </div>
                        </form>
                        
                    </div>
                </div><!-- .widget-area -->
            </div>
        </div>
    </div>
</div>
<script>
    function submitForm() {
      document.getElementById('form_filter').submit();
      }
      function validateAndSubmit() {
        var keyword = document.getElementById('keyword-input').value;
        if (keyword.trim() === "") {
            alert("Vui lòng nhập tên sản phẩm trước khi tìm kiếm.");
            return false;
        }
        document.getElementById('form_filter').submit();
    }
  </script>