<div class="section-001">
    <div class="container">
      <div class="kobolg-heading style-01">
        <div class="heading-inner">
          <h3 class="title">Sản Phẩm Mới Nhất</h3>
          <div class="subtitle">
            Made with care for your little ones, our products are perfect
            for every occasion. Check it out.
          </div>
        </div>
      </div>
      <div class="kobolg-products style-01">
        <div
          class="response-product product-list-owl owl-slick equal-container better-height"
          data-slick='{"arrows":true,"slidesMargin":30,"dots":true,"infinite":false,"speed":300,"slidesToShow":4,"rows":1}'
          data-responsive='[{"breakpoint":480,"settings":{"slidesToShow":2,"slidesMargin":"10"}},{"breakpoint":768,"settings":{"slidesToShow":2,"slidesMargin":"10"}},{"breakpoint":992,"settings":{"slidesToShow":3,"slidesMargin":"20"}},{"breakpoint":1200,"settings":{"slidesToShow":3,"slidesMargin":"20"}},{"breakpoint":1500,"settings":{"slidesToShow":4,"slidesMargin":"30"}}]'
        >
        @foreach ($topSanPhamMoiNhat as $key => $value)
        <form action="">
          <div
            class="product-item recent-product style-01 rows-space-0 post-36 product type-product status-publish has-post-thumbnail product_cat-table product_cat-bed product_tag-light product_tag-table product_tag-sock instock sale shipping-taxable purchasable product-type-simple"
          >
            <div class="product-inner tooltip-left">
              <div class="product-thumb">
                <a class="thumb-link" href="javascript:void(0)" tabindex="-1" style="display: flex; align-items: center; justify-content: center; aspect-ratio: 1/1; overflow: hidden;">
                  <div>
                    <img
                    class="img-responsive"
                    src="{{'.'.Storage::url($value->anh_san_pham)}}"
                    alt="Ảnh Sản Phẩm"
                    style="width: 100%"
                  />
                  </div>
                </a>
                <div class="flash">
                  {{-- <span class="onsale"
                    ><span class="number">-21%</span></span
                  > --}}
                  <span class="onnew"><span class="text">New</span></span>
                </div>
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
                      <a href="#" class="add_to_wishlist"
                        >Add to Wishlist</a
                      >
                    </div>
                  </div>
                  {{-- <div class="kobolg product compare-button">
                    <a href="#" class="compare button">Compare</a>
                  </div> --}}
                  <a href="{{route('client.show', $value->id)}}" class="button yith-wcqv-button">Quick View</a>
                  <div class="add-to-cart">
                    <a
                      href="#"
                      class="button product_type_simple add_to_cart_button"
                      >Add to cart</a
                    >
                  </div>
                </div>
              </div>
              <div class="product-info equal-elem">
                <h3 class="product-name product_title">
                  <a href="#" tabindex="-1">{{$value->ten_san_pham}}</a>
                </h3>
                <div class="rating-wapper">
                  <div>
                    <?php
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
            ?>
                  </div>
                </div>
                <span class="price">
                    <span class="kobolg-Price-amount amount"
                >{{$value->gia == NULL ? number_format($value->gia_min, 0, '', '.').' vnđ - '. number_format($value->gia_max, 0, '', '.') : number_format($value->gia, 0, '', '.')}} vnđ</span
              >
                    {{-- <del>
                        <span class="kobolg-Price-amount amount">
                            <span class="kobolg-Price-currencySymbol">$</span>
                            125.00</span>
                    </del> --}}
                  {{-- <ins
                    ><span class="kobolg-Price-amount amount"
                      ><span class="kobolg-Price-currencySymbol">$</span
                      >99.00</span
                    ></ins
                  > --}}
                </span
                >
              </div>
            </div>
          </div>
        </form>
        @endforeach
          {{-- <div
            class="product-item recent-product style-01 rows-space-0 post-93 product type-product status-publish has-post-thumbnail product_cat-light product_cat-table product_cat-new-arrivals product_tag-table product_tag-sock first instock shipping-taxable purchasable product-type-simple"
          >
            <div class="product-inner tooltip-left">
              <div class="product-thumb">
                <a class="thumb-link" href="#" tabindex="0">
                  <img
                    class="img-responsive"
                    src="assets/images/apro13-1-270x350.jpg"
                    alt="Meta Watches                                                "
                    width="270"
                    height="350"
                  />
                </a>
                <div class="flash">
                  <span class="onnew"><span class="text">New</span></span>
                </div>
                <div class="group-button">
                  <div class="yith-wcwl-add-to-wishlist">
                    <div class="yith-wcwl-add-button show">
                      <a href="#" class="add_to_wishlist"
                        >Add to Wishlist</a
                      >
                    </div>
                  </div>
                  <div class="kobolg product compare-button">
                    <a href="#" class="compare button">Compare</a>
                  </div>
                  <a href="#" class="button yith-wcqv-button">Quick View</a>
                  <div class="add-to-cart">
                    <a
                      href="#"
                      class="button product_type_simple add_to_cart_button"
                      >Add to cart</a
                    >
                  </div>
                </div>
              </div>
              <div class="product-info equal-elem">
                <h3 class="product-name product_title">
                  <a href="#" tabindex="0">Meta Watches </a>
                </h3>
                <div class="rating-wapper nostar">
                  <div class="star-rating">
                    <span style="width: 0%"
                      >Rated <strong class="rating">0</strong> out of
                      5</span
                    >
                  </div>
                  <span class="review">(0)</span>
                </div>
                <span class="price"
                  ><span class="kobolg-Price-amount amount"
                    ><span class="kobolg-Price-currencySymbol">$</span
                    >109.00</span
                  ></span
                >
              </div>
            </div>
          </div>
          <div
            class="product-item recent-product style-01 rows-space-0 post-49 product type-product status-publish has-post-thumbnail product_cat-light product_cat-bed product_cat-sofas product_tag-multi product_tag-lamp instock shipping-taxable purchasable product-type-simple"
          >
            <div class="product-inner tooltip-left">
              <div class="product-thumb">
                <a class="thumb-link" href="#" tabindex="0">
                  <img
                    class="img-responsive"
                    src="assets/images/apro302-270x350.jpg"
                    alt="Circle Watches"
                    width="270"
                    height="350"
                  />
                </a>
                <div class="flash">
                  <span class="onnew"><span class="text">New</span></span>
                </div>
                <div class="group-button">
                  <div class="yith-wcwl-add-to-wishlist">
                    <div class="yith-wcwl-add-button show">
                      <a href="#" class="add_to_wishlist"
                        >Add to Wishlist</a
                      >
                    </div>
                  </div>
                  <div class="kobolg product compare-button">
                    <a href="#" class="compare button">Compare</a>
                  </div>
                  <a href="#" class="button yith-wcqv-button">Quick View</a>
                  <div class="add-to-cart">
                    <a
                      href="#"
                      class="button product_type_simple add_to_cart_button"
                      >Add to cart</a
                    >
                  </div>
                </div>
              </div>
              <div class="product-info equal-elem">
                <h3 class="product-name product_title">
                  <a href="#" tabindex="0">Circle Watches</a>
                </h3>
                <div class="rating-wapper nostar">
                  <div class="star-rating">
                    <span style="width: 0%"
                      >Rated <strong class="rating">0</strong> out of
                      5</span
                    >
                  </div>
                  <span class="review">(0)</span>
                </div>
                <span class="price"
                  ><span class="kobolg-Price-amount amount"
                    ><span class="kobolg-Price-currencySymbol">$</span
                    >79.00</span
                  ></span
                >
              </div>
            </div>
          </div>
          <div
            class="product-item recent-product style-01 rows-space-0 post-37 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-bed product_tag-light product_tag-hat product_tag-sock last instock shipping-taxable purchasable product-type-simple"
          >
            <div class="product-inner tooltip-left">
              <div class="product-thumb">
                <a class="thumb-link" href="#" tabindex="0">
                  <img
                    class="img-responsive"
                    src="assets/images/apro31-1-270x350.jpg"
                    alt="Blue Smartphone"
                    width="270"
                    height="350"
                  />
                </a>
                <div class="flash">
                  <span class="onnew"><span class="text">New</span></span>
                </div>
                <div class="group-button">
                  <div class="yith-wcwl-add-to-wishlist">
                    <div class="yith-wcwl-add-button show">
                      <a href="#" class="add_to_wishlist"
                        >Add to Wishlist</a
                      >
                    </div>
                  </div>
                  <div class="kobolg product compare-button">
                    <a href="#" class="compare button">Compare</a>
                  </div>
                  <a href="#" class="button yith-wcqv-button">Quick View</a>
                  <div class="add-to-cart">
                    <a
                      href="#"
                      class="button product_type_simple add_to_cart_button"
                      >Add to cart</a
                    >
                  </div>
                </div>
              </div>
              <div class="product-info equal-elem">
                <h3 class="product-name product_title">
                  <a href="#" tabindex="0">Blue Smartphone</a>
                </h3>
                <div class="rating-wapper nostar">
                  <div class="star-rating">
                    <span style="width: 0%"
                      >Rated <strong class="rating">0</strong> out of
                      5</span
                    >
                  </div>
                  <span class="review">(0)</span>
                </div>
                <span class="price"
                  ><span class="kobolg-Price-amount amount"
                    ><span class="kobolg-Price-currencySymbol">$</span
                    >120.00</span
                  ></span
                >
              </div>
            </div>
          </div>
          <div
            class="product-item recent-product style-01 rows-space-0 post-35 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-new-arrivals product_cat-lamp product_tag-light product_tag-hat product_tag-sock first instock shipping-taxable purchasable product-type-simple"
          >
            <div class="product-inner tooltip-left">
              <div class="product-thumb">
                <a class="thumb-link" href="#" tabindex="0">
                  <img
                    class="img-responsive"
                    src="assets/images/apro41-1-270x350.jpg"
                    alt="White Watches"
                    width="270"
                    height="350"
                  />
                </a>
                <div class="flash">
                  <span class="onnew"><span class="text">New</span></span>
                </div>
                <div class="group-button">
                  <div class="yith-wcwl-add-to-wishlist">
                    <div class="yith-wcwl-add-button show">
                      <a href="#" class="add_to_wishlist"
                        >Add to Wishlist</a
                      >
                    </div>
                  </div>
                  <div class="kobolg product compare-button">
                    <a href="#" class="compare button">Compare</a>
                  </div>
                  <a href="#" class="button yith-wcqv-button">Quick View</a>
                  <div class="add-to-cart">
                    <a
                      href="#"
                      class="button product_type_simple add_to_cart_button"
                      >Add to cart</a
                    >
                  </div>
                </div>
              </div>
              <div class="product-info equal-elem">
                <h3 class="product-name product_title">
                  <a href="#" tabindex="0">White Watches</a>
                </h3>
                <div class="rating-wapper nostar">
                  <div class="star-rating">
                    <span style="width: 0%"
                      >Rated <strong class="rating">0</strong> out of
                      5</span
                    >
                  </div>
                  <span class="review">(0)</span>
                </div>
                <span class="price"
                  ><span class="kobolg-Price-amount amount"
                    ><span class="kobolg-Price-currencySymbol">$</span
                    >134.00</span
                  ></span
                >
              </div>
            </div>
          </div>
          <div
            class="product-item recent-product style-01 rows-space-0 post-36 product type-product status-publish has-post-thumbnail product_cat-table product_cat-bed product_tag-light product_tag-table product_tag-sock instock sale shipping-taxable purchasable product-type-simple"
          >
            <div class="product-inner tooltip-left">
              <div class="product-thumb">
                <a class="thumb-link" href="#" tabindex="-1">
                  <img
                    class="img-responsive"
                    src="assets/images/apro51012-1-270x350.jpg"
                    alt="Multi Cellphone"
                    width="270"
                    height="350"
                  />
                </a>
                <div class="flash">
                  <span class="onsale"
                    ><span class="number">-21%</span></span
                  >
                  <span class="onnew"><span class="text">New</span></span>
                </div>
                <div class="group-button">
                  <div class="yith-wcwl-add-to-wishlist">
                    <div class="yith-wcwl-add-button show">
                      <a href="#" class="add_to_wishlist"
                        >Add to Wishlist</a
                      >
                    </div>
                  </div>
                  <div class="kobolg product compare-button">
                    <a href="#" class="compare button">Compare</a>
                  </div>
                  <a href="#" class="button yith-wcqv-button">Quick View</a>
                  <div class="add-to-cart">
                    <a
                      href="#"
                      class="button product_type_simple add_to_cart_button"
                      >Add to cart</a
                    >
                  </div>
                </div>
              </div>
              <div class="product-info equal-elem">
                <h3 class="product-name product_title">
                  <a href="#" tabindex="-1">Multi Cellphone</a>
                </h3>
                <div class="rating-wapper nostar">
                  <div class="star-rating">
                    <span style="width: 0%"
                      >Rated <strong class="rating">0</strong> out of
                      5</span
                    >
                  </div>
                  <span class="review">(0)</span>
                </div>
                <span class="price"
                  ><del
                    ><span class="kobolg-Price-amount amount"
                      ><span class="kobolg-Price-currencySymbol">$</span
                      >125.00</span
                    ></del
                  >
                  <ins
                    ><span class="kobolg-Price-amount amount"
                      ><span class="kobolg-Price-currencySymbol">$</span
                      >99.00</span
                    ></ins
                  ></span
                >
              </div>
            </div>
          </div>
          <div
            class="product-item recent-product style-01 rows-space-0 post-34 product type-product status-publish has-post-thumbnail product_cat-light product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock last instock sale featured shipping-taxable product-type-grouped"
          >
            <div class="product-inner tooltip-left">
              <div class="product-thumb">
                <a class="thumb-link" href="#" tabindex="-1">
                  <img
                    class="img-responsive"
                    src="assets/images/apro61-1-270x350.jpg"
                    alt="Black Watches"
                    width="270"
                    height="350"
                  />
                </a>
                <div class="flash">
                  <span class="onnew"><span class="text">New</span></span>
                </div>
                <div class="group-button">
                  <div class="yith-wcwl-add-to-wishlist">
                    <div class="yith-wcwl-add-button show">
                      <a href="#" class="add_to_wishlist"
                        >Add to Wishlist</a
                      >
                    </div>
                  </div>
                  <div class="kobolg product compare-button">
                    <a href="#" class="compare button">Compare</a>
                  </div>
                  <a href="#" class="button yith-wcqv-button">Quick View</a>
                  <div class="add-to-cart">
                    <a
                      href="#"
                      class="button product_type_simple add_to_cart_button"
                      >Viewproducts</a
                    >
                  </div>
                </div>
              </div>
              <div class="product-info equal-elem">
                <h3 class="product-name product_title">
                  <a href="#" tabindex="-1">Black Watches</a>
                </h3>
                <div class="rating-wapper nostar">
                  <div class="star-rating">
                    <span style="width: 0%"
                      >Rated <strong class="rating">0</strong> out of
                      5</span
                    >
                  </div>
                  <span class="review">(0)</span>
                </div>
                <span class="price"
                  ><span class="kobolg-Price-amount amount"
                    ><span class="kobolg-Price-currencySymbol">$</span
                    >79.00</span
                  >
                  –
                  <span class="kobolg-Price-amount amount"
                    ><span class="kobolg-Price-currencySymbol">$</span
                    >139.00</span
                  ></span
                >
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>