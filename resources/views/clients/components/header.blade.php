<header id="header" class="header style-04 header-dark">
    <div class="header-top">
        <div class="container">
            <div class="header-top-inner">
                <ul id="menu-top-left-menu" class="kobolg-nav top-bar-menu">
                    <li id="menu-item-864"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-864"><a
                            class="kobolg-menu-item-title" title="Store Direction"
                            href="#"><span class="icon flaticon-placeholder"></span>Store
                        Direction</a></li>
                    <li id="menu-item-865"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-865"><a
                            class="kobolg-menu-item-title" title="Order Tracking"
                            href="#"><span class="icon flaticon-box"></span>Order
                        Tracking</a></li>
                </ul>
                <div class="kobolg-nav top-bar-menu right">
                    <ul class="wpml-menu">
                        <li class="menu-item kobolg-dropdown block-language">
                            <a href="#" data-kobolg="kobolg-dropdown">
                                <img src="assets/images/en.png"
                                     alt="en" width="18" height="12">
                                English
                            </a>
                            <span class="toggle-submenu"></span>
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a href="#">
                                        <img src="assets/images/it.png"
                                             alt="it" width="18" height="12">
                                        Italiano
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item">
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
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="header-middle-inner">
                <div class="header-logo-menu">
                    <div class="block-menu-bar">
                        <a class="menu-bar menu-toggle" href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                    <div class="header-logo">
                        <a href="index.html"><img alt="Kobolg" src="assets/images/logo.png"
                                                  class="logo"></a></div>
                </div>
                <div class="header-search-mid">
                    <div class="header-search">
                        <div class="block-search">
                            <form role="search" method="get"
                                  class="form-search block-search-form kobolg-live-search-form">
                                <div class="form-content search-box results-search">
                                    <div class="inner">
                                        <input autocomplete="off" class="searchfield txt-livesearch input" name="s"
                                               value="" placeholder="Search here..." type="text">
                                    </div>
                                </div>
                                <input name="post_type" value="product" type="hidden">
                                <input name="taxonomy" value="product_cat" type="hidden">
                                <div class="category">
                                    <select title="product_cat" name="product_cat" id="1771262470"
                                            class="category-search-option"
                                            tabindex="-1" style="display: none;">
                                        <option value="0">Danh Mục</option>
                                        @foreach ($listDanhMuc as $key => $value)
                                        <option class="level-0" value="{{$value->id}}">{{$value->ten_danh_muc}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn-submit">
                                    <span class="flaticon-search"></span>
                                </button>
                            </form><!-- block search -->
                        </div>
                    </div>
                </div>
                <div class="header-control">
                    <div class="header-control-inner">
                        <div class="meta-dreaming">
                            <div class="menu-item block-user block-dreaming kobolg-dropdown">
                                    @if (Auth::check())
                                    <a class="" href="my-account.html" style="display: flex; flex-direction: column; align-items: center">
                                    <div>
                                        <img style="width: 30px; aspect-ratio: 1/1; object-fit: cover; border-radius: 50%"
                                    src="{{Auth::user()->anh_dai_dien === NULL ? "./storage/uploads/khachhang/avatar.png" : ".".Storage::url(Auth::user()->anh_dai_dien)}}" alt="">
                                    </div>
                                    <p style="font-size: 10px; margin-bottom: 0">{{Auth::user()->name}}</p>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--dashboard is-active">
                                            <a href="{{route('client.info.user')}}">Thông tin cá nhân</a>
                                        </li>
                                        <li class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--orders">
                                            <a href="{{route('client.order')}}">Đơn hàng của tôi</a>
                                        </li>
                                        <li class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--customer-logout">
                                            <a href="{{route('client.logout')}}">Đăng xuất</a>
                                        </li>
                                    </ul>
                                @else
                                <a href="{{route('client.form.login')}}" class="block-link"><span class="flaticon-profile"></span></a>
                                @endif
                            </div>
                            <div class="block-minicart block-dreaming kobolg-mini-cart kobolg-dropdown">
                                <div class="shopcart-dropdown  @if(Auth::id()) 'block-cart-link' @endif}}" data-kobolg="kobolg-dropdown">
                                    <a class="block-link link-dropdown" style="cursor: pointer" @if(!Auth::id()) onclick="alert('Vui lòng đăng nhập')" @endif>
                                        <span class="flaticon-online-shopping-cart"></span>
                                        @if(Auth::id())
                                        <span class="count">{{Auth::id() ? count($listCart) : ''}}</span>
                                        @endif
                                    </a>
                                </div>
                                @if(Auth::id())
                                <div class="widget kobolg widget_shopping_cart">
                                    <div class="widget_shopping_cart_content">
                                        <h3 class="minicart-title">Giỏ Hàng<span class="minicart-number-items">{{count($listCart)}}</span>
                                        </h3>
                                        <ul class="kobolg-mini-cart cart_list product_list_widget">
                                            <?php $tongTien = 0 ?>
                                            @forelse ($listCart as $key => $value)
                                            <li class="kobolg-mini-cart-item mini_cart_item">
                                                <a href="{{route('client.remove.cart', $value->id_ctgh)}}" class="remove remove_from_cart_button">×</a>
                                                <a href="{{route('client.show', $value->id)}}">
                                                    <img src="{{'.'.Storage::url($value->anh_san_pham)}}"
                                                         class="attachment-kobolg_thumbnail size-kobolg_thumbnail"
                                                         alt="img" style="width: 90px; aspect-ratio: 1/1; object-fit: cover">{{$value->ten_san_pham}}{{($value->ten_gia_tri_thuoc_tinh_bt!==NULL) ? ' ('.$value->ten_gia_tri_thuoc_tinh_bt.')' : "" }}&nbsp;
                                                </a>
                                                <span class="quantity">{{$value->so_luong}} × <span
                                                        class="kobolg-Price-amount amount">{{number_format($value->gia, 0, '', '.')}} vnđ</span></span>
                                            </li>
                                            <?php
                                            $tongTien += $value->gia * $value->so_luong 
                                            ?>
                                            @empty
                                            <li class="kobolg-mini-cart-item mini_cart_item">
                                                Bạn chưa có sản phẩm nào trong giỏ hàng
                                            </li>
                                            @endforelse
                                        </ul>
                                        <p class="kobolg-mini-cart__total total"><strong>Tổng tiền:</strong>
                                            <span class="kobolg-Price-amount amount">{{number_format($tongTien, 0, '', '.')}} vnđ</span>
                                        </p>
                                        <p class="kobolg-mini-cart__buttons buttons">
                                            <a href="{{route('client.cart')}}" class="button kobolg-forward">Xem giỏ hàng</a>
                                            <a href="{{route('client.checkout')}}" class="button checkout kobolg-forward">Thanh toán</a>
                                        </p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-wrap-stick">
        <div class="header-position">
            <div class="header-nav">
                <div class="container">
                    <div class="kobolg-menu-wapper"></div>
                    <div class="header-nav-inner">
                        <div data-items="8"
                             class="vertical-wrapper block-nav-category has-vertical-menu show-button-all">
                            <div class="block-title">
                    <span class="before">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                                <span class="text-title">Danh Mục</span>
                            </div>
                            <div class="block-content verticalmenu-content">
                                <ul id="menu-vertical-menu" class="azeroth-nav vertical-menu default">
                                    @foreach ($listDanhMuc as $key => $value)
                                    <li
                                    class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                        class="azeroth-menu-item-title" title="Camera" href="#">{{$value->ten_danh_muc}}</a></li>
                                    @endforeach
                                </ul>
                                <div class="view-all-category">
                                    <a href="#" data-closetext="Đóng" data-alltext="Tất cả danh mục"
                                       class="btn-view-all open-cate">Tất cả danh mục</a>
                                </div>
                            </div>
                        </div><!-- block category -->
                        <div class="box-header-nav menu-nocenter">
                            <ul id="menu-primary-menu"
                                class="clone-main-menu kobolg-clone-mobile-menu kobolg-nav main-menu">
                                <li id="menu-item-230"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-230 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="kobolg-menu-item-title" title="Trang Chủ" href="{{route('client.index')}}">Trang Chủ</a>
                                </li>
                                <li id="menu-item-228"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-228 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="kobolg-menu-item-title" title="Cửa Hàng"
                                       href="{{route('client.shop')}}">Cửa Hàng</a>
                                </li>
                                <li id="menu-item-229"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-229 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="kobolg-menu-item-title" title="Elements" href="#">Về Chúng Tôi</a>
                                </li>
                                <li id="menu-item-996"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-996 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="kobolg-menu-item-title" title="Blog"
                                       href="blog.html">Liên Hệ</a>
                                </li>
                                <li id="menu-item-238"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-238">
                                    <a class="kobolg-menu-item-title" title="Free Shipping on Orders $100" href="#">Free
                                        Shipping on Orders $100</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-mobile">
        <div class="header-mobile-left">
            <div class="block-menu-bar">
                <a class="menu-bar menu-toggle" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
            <div class="header-search kobolg-dropdown">
                <div class="header-search-inner" data-kobolg="kobolg-dropdown">
                    <a href="#" class="link-dropdown block-link">
                        <span class="flaticon-search"></span>
                    </a>
                </div>
                <div class="block-search">
                    <form role="search" method="get"
                          class="form-search block-search-form kobolg-live-search-form">
                        <div class="form-content search-box results-search">
                            <div class="inner">
                                <input autocomplete="off" class="searchfield txt-livesearch input" name="s" value=""
                                       placeholder="Search here..." type="text">
                            </div>
                        </div>
                        <input name="post_type" value="product" type="hidden">
                        <input name="taxonomy" value="product_cat" type="hidden">
                        <div class="category">
                            <select title="product_cat" name="product_cat" id="1770352541"
                                    class="category-search-option" tabindex="-1"
                                    style="display: none;">
                                <option value="0">Danh Mục</option>
                                @foreach ($listDanhMuc as $key => $value)
                                <option class="level-0" value="{{$value}}">{{$value->ten_danh_muc}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn-submit">
                            <span class="flaticon-search"></span>
                        </button>
                    </form><!-- block search -->
                </div>
            </div>
            <ul class="wpml-menu">
                <li class="menu-item kobolg-dropdown block-language">
                    <a href="#" data-kobolg="kobolg-dropdown">
                        <img src="assets/images/en.png"
                             alt="en" width="18" height="12">
                        English
                    </a>
                    <span class="toggle-submenu"></span>
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="#">
                                <img src="assets/images/it.png"
                                     alt="it" width="18" height="12">
                                Italiano
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
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
                </li>
            </ul>
        </div>
        <div class="header-mobile-mid">
            <div class="header-logo">
                <a href="index.html"><img alt="Kobolg"
                                          src="assets/images/logo.png"
                                          class="logo"></a></div>
        </div>
        <div class="header-mobile-right">
            <div class="header-control-inner">
                <div class="meta-dreaming">
                    <div class="menu-item block-user block-dreaming kobolg-dropdown">
                        <a class="block-link" href="my-account.html">
                            <span class="flaticon-profile"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--dashboard is-active">
                                <a href="#">Thông tin cá nhân</a>
                            </li>
                            <li class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--orders">
                                <a href="#">Đơn hàng của tôi</a>
                            </li>
                            <li class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--customer-logout">
                                <a href="#">Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
                    <div class="block-minicart block-dreaming kobolg-mini-cart kobolg-dropdown">
                        <div class="shopcart-dropdown block-cart-link" data-kobolg="kobolg-dropdown">
                            <a class="block-link link-dropdown" href="cart.html">
                                <span class="flaticon-online-shopping-cart"></span>
                                <span class="count">3</span>
                            </a>
                        </div>
                        <div class="widget kobolg widget_shopping_cart">
                            <div class="widget_shopping_cart_content">
                                <h3 class="minicart-title">Giỏ Hàng<span class="minicart-number-items">3</span></h3>
                                <ul class="kobolg-mini-cart cart_list product_list_widget">
                                    <li class="kobolg-mini-cart-item mini_cart_item">
                                        <a href="#" class="remove remove_from_cart_button">×</a>
                                        <a href="#">
                                            <img src="assets/images/apro134-1-600x778.jpg"
                                                 class="attachment-kobolg_thumbnail size-kobolg_thumbnail"
                                                 alt="img" width="600" height="778">T-shirt with skirt – Pink&nbsp;
                                        </a>
                                        <span class="quantity">1 × <span
                                                class="kobolg-Price-amount amount"><span
                                                class="kobolg-Price-currencySymbol">$</span>150.00</span></span>
                                    </li>
                                    <li class="kobolg-mini-cart-item mini_cart_item">
                                        <a href="#" class="remove remove_from_cart_button">×</a>
                                        <a href="#">
                                            <img src="assets/images/apro1113-600x778.jpg"
                                                 class="attachment-kobolg_thumbnail size-kobolg_thumbnail"
                                                 alt="img" width="600" height="778">Red Consoles&nbsp;
                                        </a>
                                        <span class="quantity">1 × <span
                                                class="kobolg-Price-amount amount"><span
                                                class="kobolg-Price-currencySymbol">$</span>129.00</span></span>
                                    </li>
                                    <li class="kobolg-mini-cart-item mini_cart_item">
                                        <a href="#" class="remove remove_from_cart_button">×</a>
                                        <a href="#">
                                            <img src="assets/images/apro201-1-600x778.jpg"
                                                 class="attachment-kobolg_thumbnail size-kobolg_thumbnail"
                                                 alt="img" width="600" height="778">Smart Monitor&nbsp;
                                        </a>
                                        <span class="quantity">1 × <span
                                                class="kobolg-Price-amount amount"><span
                                                class="kobolg-Price-currencySymbol">$</span>139.00</span></span>
                                    </li>
                                </ul>
                                <p class="kobolg-mini-cart__total total"><strong>Subtotal:</strong>
                                    <span class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>418.00</span>
                                </p>
                                <p class="kobolg-mini-cart__buttons buttons">
                                    <a href="cart.html" class="button kobolg-forward">Xem Giỏ Hàng</a>
                                    <a href="checkout.html" class="button checkout kobolg-forward">Thanh Toán</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>