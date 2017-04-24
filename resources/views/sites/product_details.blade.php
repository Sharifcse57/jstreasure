@extends('layouts.front_end')
@section('title') Product Details @stop
@section('css')
<link href="{{ asset('front_end/css/jquery.fancybox.css') }}" rel="stylesheet">
@stop
@section('content')
<section class="category single-product" data-ng-controller="CartController">
  <div class="container">
    <div class="row">
     @foreach ($product_details as $product_details)
      <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="zoom-front_end/images">
          <div class="products-carousel-big" data-slider-id="owl1">
            @foreach ($product_details->images as $val)
               <div>
                 <a class="fancybox" href="{{ asset('images/sites/products/'.$val->id.'.'.$val->img) }}" data-fancybox-group="gallery">
                   {{HTML::image('images/sites/products/'.$val->id.'.'.$val->img,null,array('class'=>'img-responsive'))}}
                  </a>
               </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="col-xs-12 col-sm-1 col-md-1">
          <div class="owl-thumbs" data-slider-id="owl1">
          @foreach ($product_details->images as $val)
            <a class="owl-thumb-item">
              <img src="{{ asset('images/sites/products/'.$val->id.'.'.$val->img) }}" alt="products-thumb"/>
            </a>
          @endforeach
          </div>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-5">
        <div class="product-details">
          <div class="size-box table-responsive" style="display:none;"> <span class="close-size">Close Size Guide</span>
            <table class="table">
              <thead>
                <tr>
                  <th>Size</th>
                  <th>Chest</th>
                  <th>Length</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Medium</td>
                  <td>38</td>
                  <td>29</td>
                </tr>
                <tr>
                  <td>Large</td>
                  <td>40</td>
                  <td>30</td>
                </tr>
                <tr>
                  <td>X-Large</td>
                  <td>43</td>
                  <td>31</td>
                </tr>
              </tbody>
            </table>
          </div>
          <h2 class="product-title">{{$product_details->title}} </h2>

          <p class="product-price"><span class="old-price"> ৳ {{$product_details->price}} </span> <span>৳ {{$product_details->price}}</span></p>
          <span> SHIRT CODE: SH94</span>
          <form class="form order-form">
            <h3>এখানে অর্ডার করুন</h3>
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="আপনার নাম">
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="ই-মেইল (যদি থাকে)">
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="ফোন নং">
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <div class="form-select">
                    <select>
                      <option selected="">শার্ট সাইজ</option>
                      <option value="Medium - Chest - 38, Length - 29">Medium - Chest - 38, Length - 29</option>
                      <option value="Large - Chest - 40 , Length - 30">Large - Chest - 40 , Length - 30</option>
                      <option value="X-Large - Chest - 43 , Length - 31">X-Large - Chest - 43 , Length - 31</option>
                    </select>
                  </div>
                  <span class="show-size">Size guide</span>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <textarea rows="2" class="form-control" placeholder="ঠিকানা/এড্রেস"></textarea>
                </div>
              </div>
            </div>
            <div class="delivery">
              <h4>ডেলিভারি গন্তব্য</h4>
              <ul class="list-inline">
                <li>
                  <input type="radio" name="delivery" class="css-radiobox" id="delivery-one">
                  <label class="css-label" for="delivery-one" data-toggle="tooltip" data-placement="top" title="ঢাকায় ডেলিভারি চার্জ ৪০ টাকা। ">ঢাকা </label>
                </li>
                <li>
                  <input type="radio" name="delivery" class="css-radiobox" id="delivery-two">
                  <label class="css-label" for="delivery-two" data-toggle="tooltip" data-placement="top" title="ঢাকার বাহিরে ডেলিভারি চার্জ  ৮০ টাকা এবং অগ্রিম প্রযোজ্য।">ঢাকার বাহিরে</label>
              </ul>
              <p class="delivery-dhaka">ঢাকার বাহিরে ডেলিভারি চার্জ &nbsp;<b>৮০ টাকা</b>&nbsp;এবং অগ্রিম প্রযোজ্য। &nbsp;<br>
                বিকাশ নংঃ ০১৬১১৯০৮৯০৮, ০১৯১১০১৭৭৩২, ০১৬৮৩১৬০৬০১। (পারসোনাল)<br>
                বিকাশ করে দয়া করে এই নাম্বারে জানিয়ে দিতে হবেঃ <br>
                ০১৬১১ ৯০৮ ৯০৮&nbsp;</p>
              <div class="hotline">
                <p>Call to order(10AM - 10PM)</p>
                <h2>+8809679222663</h2>
              </div>
              <button type="submit" class="btn btn-order">অর্ডার করুণ</button>
              <button type="submit" class="btn btn-order btn-wish">Wishlist</button>
            </div>
          </form>

          <form class="secure-order form-horizontal">
            <h3>SECURE ORDER</h3>
            <div class="form-group">
              <label class="col-sm-4 col-md-2 control-label quantity-lebel">quantity</label>
              <div class="col-sm-8 col-md-10">
                <div class="productQuantity"> <a href="javascript:void(0)" class="decrease" onclick="decreamentQty()">-</a>
                  <input value="{{ session('cart.'.$product_details->id.'.quantity',1) }}" min="1" name="quantity" id="inc" readonly type="text">
                  <a href="javascript:void(0)" class="increase" onclick="increamentQty()">+</a> </div>
              </div>
            </div>
            <button id="add_cart_btn" type="submit"
              ng-click="add_to_cart({
              id : '{{  $product_details->id }}' ,
              title : '{{  $product_details->title }}' ,
              price : '{{  $product_details->price }}',});minicart_product()" class="btn btn-buy">
               Buy Now
            </button>
            <ul class="list-inline">
              <li><a href="#"><img src="{{ asset('front_end/images/facebook.svg') }}" alt="facebook"/></a></li>
              <li><a href="#"><img src="{{ asset('front_end/images/twitter.svg') }}" alt="twitter"/></a></li>
              <li><a href="#"><img src="{{ asset('front_end/images/instagram.svg') }}" alt="instagram"/></a></li>
            </ul>
          </form>
        @endforeach
        </div>
      </div>
    </div>
    <div class="product-description">

      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#moreInfo" aria-controls="home" role="tab" data-toggle="tab">More info</a></li>
        <li role="presentation"><a href="#productReviews" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="moreInfo"> <img src="{{ asset('front_end/images/shirt-measure.png') }}" class="img-responsive pull-right" alt=""/>
          <ol>
            <li> Color: Sky Blue</li>
            <li>Gender: Men</li>
            <li>Item type: Casual Shirts</li>
            <li>Material : Cotton</li>
            <li>Sleeve Length : Full</li>
            <li>Collar : Turn-down collar</li>
            <li>Model number: SH94</li>
            <li>Fitting type: Slim fit, Normal fit, Customize Size</li>
            <li>Weight : 0.2KG</li>
          </ol>
        </div>
        <div role="tabpanel" class="tab-pane" id="productReviews">
          <div class="review-form">
            <div class="row">
              <div class="col-md-6">
                 <form action="{{ url('contact') }}" method="POST">
                    {{ csrf_field() }}
                  <input type="hidden" name="subject" value="product review" class="form-control">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" name="message" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn btn-submit">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="related-product">
      <div class="heading">
        <h2>Related Products</h2>
      </div>
      <div class="row">
        @if (!empty($product_details->category))
          @foreach($product_details->category->products as $related_products)
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="product-box">
              <div class="product-img">
              <a href="/product_details/{{$related_products->product_slug}}">
                @if(count($related_products->images))
                      {{HTML::image('../images/sites/products/'.$related_products->images[0]->id.'.'.$related_products->images[0]->img,null,array('class'=>'img-responsive'))}}
                @endif
              </a>
              </div>
              <div class="product-content"> <a class="wish-btn" href="#"></a>
                <h3 class="product-title"><a href="#">{{$related_products->title}}</a></h3>
                <p class="product-price"><span class="old-price"> ৳ 1,400 </span> <span>৳ {{$related_products->price}}</span></p>
                <a class="quick-view" ng-click="showModal('productModal'); modal_data({{$related_products->id}})" href="javascript:void(0)">Show More</a> </div>
            </div>
          </div>
         @endforeach
        @endif
      </div>
    </div>
  </div>
</section>

@stop

@section('script')
<script src="{{ asset('front_end/js/owl.carousel2.thumbs.min.js') }}"></script>
<script src="{{ asset('front_end/js/jquery.fancybox.js') }}"></script>

<script>


    // function add_to_cart( product , event)
    // {
    //   event.preventDefault();

    //   var quantity=$('#inc').val();

    //   $.ajax({
    //     url: "/add_cart_processing",
    //     method: 'post',
    //     data: { cart: product, quantity: quantity, _token: Laravel.csrfToken},
    //     dataType: "json",
    //     success: function (data) {
    //       console.log(data);
    //        var count=0;

    //        for (key in data) {
    //          count+=parseInt(data[key]['quantity']);
    //        }

    //        $('#cart_count').text('('+count+')');
    //        Laravel.cart=data;

    //       // $('#add_cart_btn').addClass('disabled');
    //         //console.log(data);
    //     }

    //   });

    // }



  </script>
@stop