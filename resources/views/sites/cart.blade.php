@extends('layouts.front_end')
@section('title') Cart @stop
@section('content')
<section class="category cart-section" data-ng-controller="CartController">
  <div class="container" >
    <div class="inner-heading text-center">
      <h3>Shopping Cart</h3>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-8">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>&nbsp; </th>
              </tr>
            </thead>
            <tbody>
          <?php $total = 0;?>
          @foreach( session('cart',[]) as $product_id => $cart_product)
              <tr id="cart_row_{{$product_id}}">
                <td>
                  <div class="media">
                      <div class="media-left"> <a href="#"> <img src="{{ asset('front_end/images/products/product-01.jpg') }}" width="70" alt="product"/> </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">{{ $cart_product['title'] }}</h4>
                        <p>Color: Blue</p>
                      </div>
                  </div>
                </td>
                <td>৳ {{ $cart_product['price'] }}</td>
                <td>
                  <div class="productQuantity">
                  <a href="javascript:void(0)" class="decrease"
                    ng-click="decreamentQty_cart({{ $product_id }});change_cart({{$product_id}}); update_to_cart()">-</a>

                     <input type="text" value="{{$cart_product['quantity']}}" min="1" name="quantity" id="inc_{{$product_id}}" readonly>


                      <a href="javascript:void(0)" class="increase" ng-click="increamentQty_cart({{$product_id}});change_cart({{$product_id}}); update_to_cart() ">+</a>
                  </div>
                </td>
                <td>{{ $cart_product['price']*$cart_product['quantity'] }}
                </td>
                <td><a href="#"><img src="{{ asset('front_end/images/remove.svg') }}" ng-click="remove_product_cart({{ $product_id }}); update_to_cart()" alt="remove"/></a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        {{-- <div class="cart-btn-group">
          <a onclick="update_to_cart(event)" href="javascript:void(0)" class="update-cart center-block disabled" id="update_cart_btn">Update Cart
          </a>
        </div> --}}
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="purchase-info">
          <h3>Your purchase</h3>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach( session('cart',[]) as $product_id => $cart_product)
                <tr>
                  <td><h4>{{ $cart_product['title'] }}</h4>
                    <p>Color: Blue</p></td>
                  <td>৳ {{ $cart_product['price'] }}</td>
                </tr>

                <tr>
                  <td><strong>Subtotal</strong><br>
                    <strong>Shipping</strong></td>

                    <?php $total += $cart_product['price'] * $cart_product['quantity'];?>

                  <td><strong>৳ {{ $cart_product['price']*$cart_product['quantity'] }}.00</strong><br>
                    Free</td>
                </tr>
                 @endforeach


                <tr>
                  <td colspan="2"><div class="pament-way">
                      <ul>
                        <li>
                          <input type="radio" name="pament" class="css-radiobox" id="pament-one">
                          <label class="css-label" for="pament-one">Cheque Payment</label>
                        </li>
                        <li>
                          <input type="radio" name="pament" class="css-radiobox" id="pament-two">
                          <label class="css-label" for="pament-two">Cash on Delivery</label>
                        </li>
                        <li>
                          <input type="radio" name="pament" class="css-radiobox" id="pament-three">
                          <label class="css-label" for="pament-three">PayPal,Visa card, Master card</label>
                        </li>
                      </ul>
                    </div></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="cart-btn-group text-center"> <a href="checkout.html" class="procee-checkout btn-block">Proceed to Checkout <i class="fa fa-long-arrow-right"></i></a> </div>
        </div>
      </div>
    </div>
  </div>


  <p>Name : <input type="text" data-ng-model="name"></p>
  <h1>Hello @{{name}}</h1>
  <h1>Hello @{{myData}}</h1>


</section>

@stop
@section('script')
<script>

// function remove_product_cart(id, event)
// {
//   event.preventDefault();
//   delete Laravel.cart[id];
//   $("#cart_row_"+id).remove();
// }

function remove_product_cart_mini(id)
{

  delete Laravel.cart[id];
  $("#mini_cart_row_"+id).remove();
  $("#cart_row_"+id).remove();
}

// function change_cart (id )
// {
//   Laravel.cart[id]['quantity']=$('#inc_'+id).val();
// }

// function update_to_cart(event)
// {
// event.preventDefault();
// $.ajax({
//   url: "/update_cart_processing",
//   method: 'post',
//   data: { cart: Laravel.cart, _token: Laravel.csrfToken},
//   dataType: "json",
//   success: function (data) {
//     console.log(data);
//     var count=0;
//     for (key in data)
//       {
//           count+=parseInt(data[key]['quantity']);
//       }
//       $('#cart_count').text('('+count+')');
//       Laravel.cart=data;
//       $('#update_cart_btn').addClass('disabled');
//   }
// });

//  }


</script>


@stop