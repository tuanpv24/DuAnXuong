<main class="site-main main-container no-sidebar">
    <div class="container">
      <div class="row">
        <div class="main-content col-md-12">
          <div class="page-main-content">
            <div class="kobolg">
              <div class="kobolg-notices-wrapper"></div>
              <form action="{{route('client.update.cart')}}" method="post" class="kobolg-cart-form">
                @csrf
                <table
                  class="shop_table shop_table_responsive cart kobolg-cart-form__contents"
                  cellspacing="0"
                >
                  <thead>
                    <tr>
                      <th class="product-name">Tên Sản Phẩm</th>
                      <th class="product-price">Ảnh</th>
                      <th class="product-quantity text-center">Giá</th>
                      <th class="product-quantity">Số Lượng</th>
                      <th class="product-subtotal">Thành Tiền</th>
                      <th class="product-subtotal">Xóa</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $tongTien = 0 ?>
                    @forelse ($listCart as $key => $value)
                    <tr class="kobolg-cart-form__cart-item cart_item">
                      <td class="product-name" data-title="Product">
                        <a href="#">{{$value->ten_san_pham}}{{($value->ten_gia_tri_thuoc_tinh_bt!==NULL) ? ' ('.$value->ten_gia_tri_thuoc_tinh_bt.')' : "" }}</a>
                      </td>
                      <td class="product-thumbnail" style="width: 90px;">
                        <a href="{{route('client.show', $value->id)}}"
                          ><img
                            src="{{'.'.Storage::url($value->anh_san_pham)}}"
                            class="attachment-kobolg_thumbnail size-kobolg_thumbnail"
                            alt="img"
                            style="width: 100%; aspect-ratio: 1/1; object-fit: cover;"
                        /></a>
                      </td>
                      <td class="product-price" data-title="Price">
                        <span class="kobolg-Price-amount amount"
                          >{{number_format($value->gia, 0, '', '.')}} vnđ</span
                        >
                      </td>
                      <td class="product-quantity" data-title="Quantity">
                        <input type="number" name="quantity[{{$value->id_ctgh}}]" value="{{$value->so_luong}}" style="width: 100px;">
                        <input type="hidden" name="kieu_san_pham[{{$value->id_ctgh}}]" value="{{$value->kieu_san_pham}}">
                        <input type="hidden" name="id_alt[{{$value->id_ctgh}}]" value="{{$value->id_alt}}">
                        </div>
                      </td>
                      <td class="product-subtotal" data-title="Total">
                        <span class="kobolg-Price-amount amount"
                          >{{number_format($value->gia * $value->so_luong, 0, '', '.')}} vnđ</span
                        >
                      </td>
                      <td class="text-center">
                        <a href="{{route('client.remove.cart', $value->id_ctgh)}}" class="text-danger" style="font-size: 30px">×</a></td>
                    </tr>
                    <?php
                      $tongTien += $value->gia * $value->so_luong;
                    ?>
                    @empty
                    <tr>
                      <td class="text-center" colspan="6">Bạn chưa có sản phẩm nào trong giỏ hàng</td>
                    </tr>
                    @endforelse
                    <tr>
                      <td colspan="4"></td>
                      <td colspan="2" class="text-center"><button type="submit" style="width: 50%;" class="btn btn-danger">Update</button></td>
                    </tr>
                  </tbody>
                </table>
              </form>
              <div class="cart-collaterals">
                <div class="cart_totals">
                  <h2>Cart totals</h2>
                  <table
                    class="shop_table shop_table_responsive"
                    cellspacing="0"
                  >
                    <tbody>
                      <tr class="cart-subtotal">
                        <th>Subtotal</th>
                        <td data-title="Subtotal">
                          <span class="kobolg-Price-amount amount"
                            >{{number_format($tongTien, 0, '', '.')}} vnđ</span
                          >
                        </td>
                      </tr>
                      <tr class="order-total">
                        <th>Total</th>
                        <td data-title="Total">
                          <strong
                            ><span class="kobolg-Price-amount amount"
                              >{{number_format($tongTien, 0, '', '.')}} vnđ</span
                            ></strong
                          >
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="kobolg-proceed-to-checkout">
                    <a
                      href="{{route('client.checkout')}}"
                      class="checkout-button button alt kobolg-forward"
                    >
                      Proceed to checkout</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>