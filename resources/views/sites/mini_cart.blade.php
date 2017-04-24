<div class="mini-cart" data-ng-controller="CartController">
  <div class="cart-head clearfix">
    <h2 class="pull-left">4 item</h2>
    <h3 class="pull-right">৳2800.69</h3>
  </div>
  <div class="mini-cart-inner" ng-init='minicart_product()'>
    <?php $product_id = 0;?>
    <div ng-if="mini_cart_value">
      <div ng-repeat="(product_id, cart_product) in mini_cart_value">
        <div id="mini_cart_row_@{{product_id}}" class="media product-box">
          <div class="media-left"> <a href="#"> <img class="cart-img" src="{{ asset('front_end/images/products/product-01.jpg') }}" alt="Cart Image"> </a> </div>
          <div class="media-body"> <img src="{{ asset('front_end/images/remove.svg') }}" ng-click="remove_product_cart_mini(product_id); update_to_cart()" class="remove-item" alt="remove"/>
            <h3 class="product-title"><a href="#" >@{{cart_product['title']}} </a></h3>
            <p class="product-price"><span class="old-price"> ৳ @{{cart_product['price']}} </span> <span>৳ @{{cart_product['price']}}</span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a class="procced-btn" href="{{route('cart')}}">Proceed to Checkout</a>
</div>