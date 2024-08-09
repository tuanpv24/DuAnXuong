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
                                        <th>Tên Sản Phẩm</th>
                                        <th>Ảnh</th>
                                        <th class="product-name text-center">Giá</th>
                                        <th class="product-price">Số Lượng</th>
                                        <th class="product-quantity">Thành Tiền</th>
                                        <th class="product-subtotal">Tổng Tiền</th>
                                        <th class="product-subtotal">Hình Thức Thanh Toán</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donHangShow as $key => $value)
                                    <tr class="kobolg-cart-form__cart-item cart_item">
                                        <td class="product-name" data-title="Product">
                                            <a style="color: inherit" href="{{route('client.show', $value->id_san_pham)}}">{{$value->ten_san_pham}}{{($value->ten_gia_tri_thuoc_tinh_bt!==NULL) ? ' ('.$value->ten_gia_tri_thuoc_tinh_bt.')' : "" }}</a>
                                        </td>
                                        <td class="product-thumbnail" style="width: 90px;">
                                            <a href="{{route('client.show', $value->id_san_pham)}}"><img src="{{".".Storage::url($value->anh_san_pham)}}" style="width: 100%;object-fit: cover; aspect-ratio: 1/1;" alt="Ảnh sản phẩm"></a>
                                        </td>
                                        <td>
                                            <span class="kobolg-Price-amount amount">{{number_format($value->gia, 0, '', '.')}} vnđ</span>
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">             
                                                {{$value->so_luong}}
                                        </td>
                                        <td class="product-price" data-title="Total">
                                            <span class="kobolg-Price-amount amount">{{number_format($value->thanh_tien, 0, '', '.')}} vnđ</span>
                                        </td>
                                        @if($loop->first)
                                        <td rowspan="{{ $loop->count }}" class="product-subtotal">{{number_format($value->tong_tien, 0, '', '.')}} vnđ</td>
                                        <td rowspan="{{ $loop->count }}" >{{$value->ten_phuong_thuc_thanh_toan}}</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5"><strong>Ghi chú: </strong>{{$value->ghi_chu === NULL ? 'Không có ghi chú' : $value->ghi_chu}}</td>
                                        <td><strong>Ngày đặt: </strong>{{date('d/m/Y', strtotime($value->ngay_dat))}}</td>
                                        <td><strong>Trạng thái: </strong>{{$value->ten_trang_thai_don_hang}}</td>
                                    </tr>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>