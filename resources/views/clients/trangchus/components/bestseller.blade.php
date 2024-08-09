<div class="section-001">
    <div class="container">
      <div class="kobolg-heading style-01">
        <div class="heading-inner">
          <h3 class="title">Bán Chạy Nhất</h3>
          <div class="subtitle">
            Made with care for your little ones, our products are perfect
            for every occasion. Check it out.
          </div>
        </div>
      </div>
      <div class="kobolg-products style-02">
        <div
          class="response-product product-list-owl owl-slick equal-container better-height"
          data-slick='{"arrows":false,"slidesMargin":30,"dots":true,"infinite":false,"speed":300,"slidesToShow":4,"rows":2}'
          data-responsive='[{"breakpoint":480,"settings":{"slidesToShow":2,"slidesMargin":"10"}},{"breakpoint":768,"settings":{"slidesToShow":2,"slidesMargin":"10"}},{"breakpoint":992,"settings":{"slidesToShow":3,"slidesMargin":"20"}},{"breakpoint":1200,"settings":{"slidesToShow":3,"slidesMargin":"20"}},{"breakpoint":1500,"settings":{"slidesToShow":4,"slidesMargin":"30"}}]'
        >
        @foreach ($sanPhamBanChay as $key => $value)
        <form action="{{route('client.addtocart')}}" method="post">
          @csrf
          <div
        class="product-item featured_products style-02 rows-space-30 post-34 product type-product status-publish has-post-thumbnail product_cat-light product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock first instock sale featured shipping-taxable product-type-grouped"
      >
        <div class="product-inner tooltip-top">
          <div class="product-thumb">
            <a class="thumb-link" style="display: flex; justify-content: center; align-items: center; width: 100%; aspect-ratio: 1/1; overflow: hidden;" href="javascript:void(0)">
                <div>
              <img
                class="img-responsive"
                src="{{'.'.Storage::url($value->anh_san_pham)}}"
                alt="Ảnh Sản Phẩm"
                style="width: 100%;"
              />
              <input type="hidden" name="id_san_pham" value="{{$value->id}}" id="">
              <input type="hidden" name="kieu_san_pham" value="{{$value->kieu_san_pham}}" id="">
            </div>
            </a>
            <div class="flash">
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
            <a href="{{route('client.show', $value->id)}}" class="button yith-wcqv-button">Quick View</a>
          </div>
          <div class="product-info">
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
            <h3 class="product-name product_title">
              <a href="#" tabindex="0">{{$value->ten_san_pham}}</a>
            </h3>
            <span class="price"
              ><span class="kobolg-Price-amount amount"
                >{{$value->gia == NULL ? number_format($value->gia_min, 0, '', '.').' vnđ - '. number_format($value->gia_max, 0, '', '.') : number_format($value->gia, 0, '', '.')}} vnđ</span
              >
              {{-- –
              <span class="kobolg-Price-amount amount"
                ><span class="kobolg-Price-currencySymbol">$</span
                >139.00</span
              ></span
            > --}}
          </div>
          <div class="group-button clearfix">
            <div class="yith-wcwl-add-to-wishlist">
              <div class="yith-wcwl-add-button show">
                <a href="#" class="add_to_wishlist">Add to Wishlist</a>
              </div>
            </div>
            @if($value->kieu_san_pham == 1)
            <div class="add-to-cart">
              <button type="submit" style="background-color: #000000; cursor: pointer;">
              <a class="button product_type_grouped">
                </a
              ></button>
            </div>
            @else
            <div class="add-to-cart">
              <button type="submit" style="background-color: #000000; cursor: pointer;" disabled>
              <a class="button product_type_grouped">
                </a
              ></button>
            </div>
            @endif
            <div class="kobolg product compare-button">
              <a href="#" class="compare button">Compare</a>
            </div>
          </div>
        </div>
      </div>
        </form>
        @endforeach
          {{-- <div
            class="product-item featured_products style-02 rows-space-30 post-34 product type-product status-publish has-post-thumbnail product_cat-light product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock first instock sale featured shipping-taxable product-type-grouped"
          >
            <div class="product-inner tooltip-top">
              <div class="product-thumb">
                <a class="thumb-link" href="#" tabindex="0">
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
                <a href="#" class="button yith-wcqv-button">Quick View</a>
              </div>
              <div class="product-info">
                <div class="rating-wapper nostar">
                  <div class="star-rating">
                    <span style="width: 0%"
                      >Rated <strong class="rating">0</strong> out of
                      5</span
                    >
                  </div>
                  <span class="review">(0)</span>
                </div>
                <h3 class="product-name product_title">
                  <a href="#" tabindex="0">Black Watches</a>
                </h3>
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
              <div class="group-button clearfix">
                <div class="yith-wcwl-add-to-wishlist">
                  <div class="yith-wcwl-add-button show">
                    <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                  </div>
                </div>
                <div class="add-to-cart">
                  <a href="#" class="button product_type_grouped">
                    View products</a
                  >
                </div>
                <div class="kobolg product compare-button">
                  <a href="#" class="compare button">Compare</a>
                </div>
              </div>
            </div>
          </div> --}}
          {{-- <div
            class="product-item featured_products style-02 rows-space-30 post-32 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-hat product_tag-sock instock sale featured shipping-taxable purchasable product-type-simple"
          >
            <div class="product-inner tooltip-top">
              <div class="product-thumb">
                <a class="thumb-link" href="#" tabindex="0">
                  <img
                    class="img-responsive"
                    src="assets/images/apro71-1-270x350.jpg"
                    alt="Gaming Mouse"
                    width="270"
                    height="350"
                  />
                </a>
                <div class="flash">
                  <span class="onsale"
                    ><span class="number">-18%</span></span
                  >
                  <span class="onnew"><span class="text">New</span></span>
                </div>
                <a href="#" class="button yith-wcqv-button">Quick View</a>
              </div>
              <div class="product-info">
                <div class="rating-wapper nostar">
                  <div class="star-rating">
                    <span style="width: 0%"
                      >Rated <strong class="rating">0</strong> out of
                      5</span
                    >
                  </div>
                  <span class="review">(0)</span>
                </div>
                <h3 class="product-name product_title">
                  <a href="#" tabindex="0">Gaming Mouse</a>
                </h3>
                <span class="price"
                  ><del
                    ><span class="kobolg-Price-amount amount"
                      ><span class="kobolg-Price-currencySymbol">$</span
                      >109.00</span
                    ></del
                  >
                  <ins
                    ><span class="kobolg-Price-amount amount"
                      ><span class="kobolg-Price-currencySymbol">$</span
                      >89.00</span
                    ></ins
                  ></span
                >
              </div>
              <div class="group-button clearfix">
                <div class="yith-wcwl-add-to-wishlist">
                  <div class="yith-wcwl-add-button show">
                    <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                  </div>
                </div>
                <div class="add-to-cart">
                  <a href="#" class="button product_type_grouped"
                    >Add to cart</a
                  >
                </div>
                <div class="kobolg product compare-button">
                  <a href="#" class="compare button">Compare</a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="product-item featured_products style-02 rows-space-30 post-30 product type-product status-publish has-post-thumbnail product_cat-light product_cat-bed product_cat-specials product_tag-light product_tag-table product_tag-sock last instock featured downloadable shipping-taxable purchasable product-type-simple"
          >
            <div class="product-inner tooltip-top">
              <div class="product-thumb">
                <a class="thumb-link" href="#" tabindex="0">
                  <img
                    class="img-responsive"
                    src="assets/images/apro101-1-270x350.jpg"
                    alt="Mac 27 Inch"
                    width="270"
                    height="350"
                  />
                </a>
                <div class="flash">
                  <span class="onnew"><span class="text">New</span></span>
                </div>
                <a
                  href="#"
                  class="button yith-wcqv-button"
                  data-product_id="30"
                  tabindex="0"
                  >Quick View</a
                >
              </div>
              <div class="product-info">
                <div class="rating-wapper nostar">
                  <div class="star-rating">
                    <span style="width: 0%"
                      >Rated <strong class="rating">0</strong> out of
                      5</span
                    >
                  </div>
                  <span class="review">(0)</span>
                </div>
                <h3 class="product-name product_title">
                  <a href="#" tabindex="0">Mac 27 Inch</a>
                </h3>
                <span class="price"
                  ><span class="kobolg-Price-amount amount"
                    ><span class="kobolg-Price-currencySymbol">$</span
                    >60.00</span
                  ></span
                >
              </div>
              <div class="group-button clearfix">
                <div class="yith-wcwl-add-to-wishlist">
                  <div class="yith-wcwl-add-button show">
                    <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                  </div>
                </div>
                <div class="add-to-cart">
                  <a href="#" class="button product_type_grouped">
                    Add to cart</a
                  >
                </div>
                <div class="kobolg product compare-button">
                  <a href="#" class="compare button">Compare</a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="product-item featured_products style-02 rows-space-30 post-31 product type-product status-publish has-post-thumbnail product_cat-light product_cat-sofas product_tag-hat first instock sale featured shipping-taxable product-type-grouped"
          >
            <div class="product-inner tooltip-top">
              <div class="product-thumb">
                <a class="thumb-link" href="#" tabindex="0">
                  <img
                    class="img-responsive"
                    src="assets/images/apro91-1-270x350.jpg"
                    alt="Classic Watches"
                    width="270"
                    height="350"
                  />
                </a>
                <div class="flash">
                  <span class="onnew"><span class="text">New</span></span>
                </div>
                <a href="#" class="button yith-wcqv-button">Quick View</a>
              </div>
              <div class="product-info">
                <div class="rating-wapper nostar">
                  <div class="star-rating">
                    <span style="width: 0%"
                      >Rated <strong class="rating">0</strong> out of
                      5</span
                    >
                  </div>
                  <span class="review">(0)</span>
                </div>
                <h3 class="product-name product_title">
                  <a href="#" tabindex="0">Classic Watches</a>
                </h3>
                <span class="price"
                  ><span class="kobolg-Price-amount amount"
                    ><span class="kobolg-Price-currencySymbol">$</span
                    >89.00</span
                  >
                  –
                  <span class="kobolg-Price-amount amount"
                    ><span class="kobolg-Price-currencySymbol">$</span
                    >139.00</span
                  ></span
                >
              </div>
              <div class="group-button clearfix">
                <div class="yith-wcwl-add-to-wishlist">
                  <div class="yith-wcwl-add-button show">
                    <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                  </div>
                </div>
                <div class="add-to-cart">
                  <a href="#" class="button product_type_grouped">
                    View products</a
                  >
                </div>
                <div class="kobolg product compare-button">
                  <a href="#" class="compare button">Compare</a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="product-item featured_products style-02 rows-space-30 post-29 product type-product status-publish has-post-thumbnail product_cat-new-arrivals product_cat-specials product_tag-light product_tag-sock instock featured downloadable shipping-taxable purchasable product-type-simple"
          >
            <div class="product-inner tooltip-top">
              <div class="product-thumb">
                <a class="thumb-link" href="#" tabindex="0">
                  <img
                    class="img-responsive"
                    src="assets/images/apro1113-270x350.jpg"
                    alt="Red Consoles"
                    width="270"
                    height="350"
                  />
                </a>
                <div class="flash">
                  <span class="onnew"><span class="text">New</span></span>
                </div>
                <a href="#" class="button yith-wcqv-button">Quick View</a>
              </div>
              <div class="product-info">
                <div class="rating-wapper nostar">
                  <div class="star-rating">
                    <span style="width: 0%"
                      >Rated <strong class="rating">0</strong> out of
                      5</span
                    >
                  </div>
                  <span class="review">(0)</span>
                </div>
                <h3 class="product-name product_title">
                  <a href="#" tabindex="0">Red Consoles</a>
                </h3>
                <span class="price"
                  ><span class="kobolg-Price-amount amount"
                    ><span class="kobolg-Price-currencySymbol">$</span
                    >129.00</span
                  ></span
                >
              </div>
              <div class="group-button clearfix">
                <div class="yith-wcwl-add-to-wishlist">
                  <div class="yith-wcwl-add-button show">
                    <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                  </div>
                </div>
                <div class="add-to-cart">
                  <a href="#" class="button product_type_grouped">
                    Add to cart</a
                  >
                </div>
                <div class="kobolg product compare-button">
                  <a href="#" class="compare button">Compare</a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="product-item featured_products style-02 rows-space-30 post-28 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-light product_tag-sock last instock sale featured shipping-taxable purchasable product-type-simple"
          >
            <div class="product-inner tooltip-top">
              <div class="product-thumb">
                <a class="thumb-link" href="#" tabindex="0">
                  <img
                    class="img-responsive"
                    src="assets/images/apro1211-2-270x350.jpg"
                    alt="Modern Watches"
                    width="270"
                    height="350"
                  />
                </a>
                <div class="flash">
                  <span class="onsale"
                    ><span class="number">-14%</span></span
                  >
                  <span class="onnew"><span class="text">New</span></span>
                </div>
                <a href="#" class="button yith-wcqv-button">Quick View</a>
              </div>
              <div class="product-info">
                <div class="rating-wapper">
                  <div class="star-rating">
                    <span style="width: 100%"
                      >Rated <strong class="rating">5.00</strong> out of
                      5</span
                    >
                  </div>
                  <span class="review">(1)</span>
                </div>
                <h3 class="product-name product_title">
                  <a href="#" tabindex="0">Modern Watches</a>
                </h3>
                <span class="price"
                  ><del
                    ><span class="kobolg-Price-amount amount"
                      ><span class="kobolg-Price-currencySymbol">$</span
                      >138.00</span
                    ></del
                  >
                  <ins
                    ><span class="kobolg-Price-amount amount"
                      ><span class="kobolg-Price-currencySymbol">$</span
                      >119.00</span
                    ></ins
                  ></span
                >
              </div>
              <div class="group-button clearfix">
                <div class="yith-wcwl-add-to-wishlist">
                  <div class="yith-wcwl-add-button show">
                    <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                  </div>
                </div>
                <div class="add-to-cart">
                  <a href="#" class="button product_type_grouped">
                    Add to cart</a
                  >
                </div>
                <div class="kobolg product compare-button">
                  <a href="#" class="compare button">Compare</a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="product-item featured_products style-02 rows-space-30 post-26 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-light product_tag-hat first instock featured shipping-taxable product-type-external"
          >
            <div class="product-inner tooltip-top">
              <div class="product-thumb">
                <a class="thumb-link" href="#" tabindex="0">
                  <img
                    class="img-responsive"
                    src="assets/images/apro141-1-270x350.jpg"
                    alt="Smart Monitor"
                    width="270"
                    height="350"
                  />
                </a>
                <div class="flash">
                  <span class="onnew"><span class="text">New</span></span>
                </div>
                <a href="#" class="button yith-wcqv-button">Quick View</a>
              </div>
              <div class="product-info">
                <div class="rating-wapper">
                  <div class="star-rating">
                    <span style="width: 100%"
                      >Rated <strong class="rating">5.00</strong> out of
                      5</span
                    >
                  </div>
                  <span class="review">(1)</span>
                </div>
                <h3 class="product-name product_title">
                  <a href="#" tabindex="0">Smart Monitor</a>
                </h3>
                <span class="price"
                  ><span class="kobolg-Price-amount amount"
                    ><span class="kobolg-Price-currencySymbol">$</span
                    >207.00</span
                  ></span
                >
              </div>
              <div class="group-button clearfix">
                <div class="yith-wcwl-add-to-wishlist">
                  <div class="yith-wcwl-add-button show">
                    <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                  </div>
                </div>
                <div class="add-to-cart">
                  <a href="#" class="button product_type_grouped">
                    Buy it on Amazon</a
                  >
                </div>
                <div class="kobolg product compare-button">
                  <a href="#" class="compare button">Compare</a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="product-item featured_products style-02 rows-space-30 post-25 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-specials product_tag-light product_tag-sock instock sale featured shipping-taxable purchasable product-type-simple"
          >
            <div class="product-inner tooltip-top">
              <div class="product-thumb">
                <a class="thumb-link" href="#" tabindex="0">
                  <img
                    class="img-responsive"
                    src="assets/images/apro151-1-270x350.jpg"
                    alt="Cellphone Factory"
                    width="270"
                    height="350"
                  />
                </a>
                <div class="flash">
                  <span class="onsale"
                    ><span class="number">-11%</span></span
                  >
                  <span class="onnew"><span class="text">New</span></span>
                </div>
                <a
                  href="#"
                  class="button yith-wcqv-button"
                  data-product_id="25"
                  tabindex="0"
                  >Quick View</a
                >
              </div>
              <div class="product-info">
                <div class="rating-wapper nostar">
                  <div class="star-rating">
                    <span style="width: 0%"
                      >Rated <strong class="rating">0</strong> out of
                      5</span
                    >
                  </div>
                  <span class="review">(0)</span>
                </div>
                <h3 class="product-name product_title">
                  <a href="#" tabindex="0">Cellphone Factory</a>
                </h3>
                <span class="price"
                  ><del
                    ><span class="kobolg-Price-amount amount"
                      ><span class="kobolg-Price-currencySymbol">$</span
                      >89.00</span
                    ></del
                  >
                  <ins
                    ><span class="kobolg-Price-amount amount"
                      ><span class="kobolg-Price-currencySymbol">$</span
                      >79.00</span
                    ></ins
                  ></span
                >
              </div>
              <div class="group-button clearfix">
                <div class="yith-wcwl-add-to-wishlist">
                  <div class="yith-wcwl-add-button show">
                    <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                  </div>
                </div>
                <div class="add-to-cart">
                  <a href="#" class="button product_type_grouped">
                    Add to cart</a
                  >
                </div>
                <div class="kobolg product compare-button">
                  <a href="#" class="compare button">Compare</a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="product-item featured_products style-02 rows-space-30 post-24 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-table product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock last instock featured shipping-taxable purchasable product-type-variable has-default-attributes"
          >
            <div class="product-inner tooltip-top">
              <div class="product-thumb">
                <a class="thumb-link" href="#" tabindex="-1">
                  <img
                    class="img-responsive"
                    src="assets/images/apro161-1-270x350.jpg"
                    alt="Gaming Mouse"
                    width="270"
                    height="350"
                  />
                </a>
                <div class="flash">
                  <span class="onnew"><span class="text">New</span></span>
                </div>
                <form class="variations_form cart">
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
                </form>
                <a href="#" class="button yith-wcqv-button">Quick View</a>
              </div>
              <div class="product-info">
                <div class="rating-wapper nostar">
                  <div class="star-rating">
                    <span style="width: 0%"
                      >Rated <strong class="rating">0</strong> out of
                      5</span
                    >
                  </div>
                  <span class="review">(0)</span>
                </div>
                <h3 class="product-name product_title">
                  <a href="#" tabindex="-1">Gaming Mouse</a>
                </h3>
                <span class="price"
                  ><span class="kobolg-Price-amount amount"
                    ><span class="kobolg-Price-currencySymbol">$</span
                    >45.00</span
                  >
                  –
                  <span class="kobolg-Price-amount amount"
                    ><span class="kobolg-Price-currencySymbol">$</span
                    >54.00</span
                  ></span
                >
              </div>
              <div class="group-button clearfix">
                <div class="yith-wcwl-add-to-wishlist">
                  <div class="yith-wcwl-add-button show">
                    <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                  </div>
                </div>
                <div class="add-to-cart">
                  <a href="#" class="button product_type_grouped">
                    Select options</a
                  >
                </div>
                <div class="kobolg product compare-button">
                  <a href="#" class="compare button">Compare</a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="product-item featured_products style-02 rows-space-30 post-22 product type-product status-publish has-post-thumbnail product_cat-table product_cat-bed product_cat-lamp product_tag-table product_tag-hat product_tag-sock first instock featured downloadable shipping-taxable purchasable product-type-simple"
          >
            <div class="product-inner tooltip-top">
              <div class="product-thumb">
                <a class="thumb-link" href="#" tabindex="-1">
                  <img
                    class="img-responsive"
                    src="assets/images/apro181-2-270x350.jpg"
                    alt="Red Mouse"
                    width="270"
                    height="350"
                  />
                </a>
                <div class="flash">
                  <span class="onnew"><span class="text">New</span></span>
                </div>
                <a
                  href="#"
                  class="button yith-wcqv-button"
                  data-product_id="22"
                  tabindex="-1"
                  >Quick View</a
                >
              </div>
              <div class="product-info">
                <div class="rating-wapper nostar">
                  <div class="star-rating">
                    <span style="width: 0%"
                      >Rated <strong class="rating">0</strong> out of
                      5</span
                    >
                  </div>
                  <span class="review">(0)</span>
                </div>
                <h3 class="product-name product_title">
                  <a href="#" tabindex="-1">Red Mouse</a>
                </h3>
                <span class="price"
                  ><span class="kobolg-Price-amount amount"
                    ><span class="kobolg-Price-currencySymbol">$</span
                    >98.00</span
                  ></span
                >
              </div>
              <div class="group-button clearfix">
                <div class="yith-wcwl-add-to-wishlist">
                  <div class="yith-wcwl-add-button show">
                    <a href="#" class="add_to_wishlist">Add to cart</a>
                  </div>
                </div>
                <div class="add-to-cart">
                  <a href="#" class="button product_type_grouped">
                    Add to cart</a
                  >
                </div>
                <div class="kobolg product compare-button">
                  <a href="#" class="compare button">Compare</a>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>