<main class="site-main main-container no-sidebar">
    <div class="container">
        <div class="row">
            <div class="main-content col-md-12">
                <div class="page-main-content">
                    <div class="kobolg">
                        <div class="kobolg-notices-wrapper"></div>
                        <div class="kobolg-cart-form">
                            <table class="shop_table shop_table_responsive cart kobolg-cart-form__contents"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th class="product-name text-center">Mã Đơn Hàng</th>
                                    <th class="product-price">Tổng Tiền</th>
                                    <th class="product-quantity">Ngày Đặt</th>
                                    <th class="product-quantity">Hình Thức Thanh Toán</th>
                                    <th class="product-quantity">Trạng Thái Đơn Hàng</th>
                                    <th class="product-subtotal">Chi Tiết</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($listDonHang as $key => $value)
                                    <tr class="kobolg-cart-form__cart-item cart_item">
                                        <td class="product-name text-center" data-title="Product">{{$value->ma_don_hang}}</td>
                                        <td class="product-price" data-title="Price">
                                            <span class="kobolg-Price-amount amount">{{number_format($value->tong_tien, 0, '', '.')}} vnđ</span></td>
                                        <td class="product-quantity" data-title="Quantity">
                                            {{date('d/m/Y', strtotime($value->ngay_dat))}}
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            {{$value->ten_phuong_thuc_thanh_toan}}
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            {{$value->ten_trang_thai_don_hang}}
                                        </td>
                                        <td class="product-subtotal" data-title="Total">
                                            <a href="{{route('client.order.detail', $value->id)}}"><button class="btn btn-info">Xem</button></a></td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Bạn chưa có đơn hàng nào</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>