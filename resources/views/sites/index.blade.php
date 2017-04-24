@extends('layouts.front_end')
@section('title') Js Treasure @stop
@section('content')
<section class="home-category" data-ng-controller="CartController">
  <div class="container">
    <div class="row">
     @foreach ($category as $categoryData)
      <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="category-box"> <a href="category/{{ $categoryData->slug }}">
          <div class="category-box-content">
            <h2>{{ $categoryData->title }}</h2>
            <p>We are excited about our  new exclusive collection</p>
            <span class="discover-btn">Discover</span>
          </div>
          <img class="img-responsive" src="{{ asset('front_end/images/shirt.jpg') }}" alt="shirt"/> </a>
        </div>
      </div>
     @endforeach
    </div>
  </div>
</section>
<section class="featured-product" data-ng-controller="CartController">
  <div class="container">
    <div class="heading">
      <p>Shop The</p>
      <h2>Goods</h2>
    </div>
    <ul class="list-inline text-center">
      <li><a class="active" href="javascript:void(0);" data-name="featured" onClick="productItem(this);">Featured</a></li>
      <li><a href="javascript:void(0);" data-name="exclusives" onClick="productItem(this);">Exclusives</a></li>
      <li><a href="javascript:void(0);" data-name="popular" onClick="productItem(this);">popular</a></li>
      <li><a href="javascript:void(0);" data-name="men" onClick="productItem(this);">Men</a></li>
    </ul>
    <div class="row" id="productFeatured">
      <div class="col-xs-12 col-sm-12 col-sm-offset-0 col-md-10 col-md-offset-1">
        <div class="slide-content" id="featured">
          <div class="product-carousel" id="product-carousel-featured">
            @foreach ($products as $product)
            <div class="item">
              <div class="product-box">
                <div class="product-img"> <a href="/product_details/{{ $product->product_slug }}">
                @if($product->image)
                   {{HTML::image('images/sites/products/'.$product->image->id.'.'.$product->image->img,null,array('class'=>'img-responsive'))}}
                @endif

                </a>
                </div>
                <div class="product-content">
                   <a class="wish-btn" href="#"></a>
                  <h3 class="product-title"><a href="product-details.html">{{ $product->title }}</a></h3>
                  <p class="product-price"><span class="old-price"> ৳ {{ $product->price }} </span> <span>৳ {{ $product->price }}</span></p>
                  <a class="quick-view" ng-click="showModal('productModal'); modal_data({{$product->id}})" href="javascript:void(0)">Show More</a>
                </div>
              </div>
            </div>
          @endforeach
          </div>
        </div>
        <div class="slide-content" id="exclusives" style="display:none">
          <div class="product-carousel" id="product-carousel-exclusives">
            <div class="item">
              <div class="product-box">
                <div class="product-img"> <a href="product-details.html"><img src="{{ asset('front_end/images/products/product-01.jpg') }}" class="img-responsive" alt="product"/></a> </div>
                <div class="product-content"> <a class="wish-btn" href="#"></a>
                  <h3 class="product-title"><a href="product-details.html">New Style High Collar Parisryle Shirt</a></h3>
                  <p class="product-price"><span class="old-price"> ৳ 1,400 </span> <span>৳ 1,090</span></p>
                  <a class="quick-view" onClick="showModal('productModal')" href="javascript:void(0)">Show More</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="product-box">
                <div class="product-img"> <a href="product-details.html"><img src="{{ asset('front_end/images/products/product-02.jpg') }}" class="img-responsive" alt="product"/></a> </div>
                <div class="product-content"> <a class="wish-btn" href="#"></a>
                  <h3 class="product-title"><a href="product-details.html">Stand Collar Sky Blue Stylish Paristyle Shirt</a></h3>
                  <p class="product-price"><span class="old-price"> ৳ 1,350</span> <span>৳ 1,080</span></p>
                  <a class="quick-view" onClick="showModal('productModal')" href="javascript:void(0)">Show More</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="product-box">
                <div class="product-img"> <a href="product-details.html"><img src="{{ asset('front_end/images/products/product-03.jpg') }}" class="img-responsive" alt="product"/></a> </div>
                <div class="product-content"> <a class="wish-btn" href="#"></a>
                  <h3 class="product-title"><a href="product-details.html">High Quality Long Sleeve Men White Paristyle shirt</a></h3>
                  <p class="product-price"><span class="old-price"> ৳ 1,200 </span> <span>৳ 900</span></p>
                  <a class="quick-view" onClick="showModal('productModal')" href="javascript:void(0)">Show More</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="product-box">
                <div class="product-img"> <a href="product-details.html"><img src="{{ asset('front_end/images/products/product-04.jpg') }}" class="img-responsive" alt="product"/></a> </div>
                <div class="product-content"> <a class="wish-btn" href="#"></a>
                  <h3 class="product-title"><a href="product-details.html">Casual Long Sleeved Striped White Paristyle Shirt</a></h3>
                  <p class="product-price"><span class="old-price"> ৳ 1,400 </span> <span>৳ 1,090</span></p>
                  <a class="quick-view" onClick="showModal('productModal')" href="javascript:void(0)">Show More</a> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="slide-content" id="popular" style="display:none">
          <div class="product-carousel" id="product-carousel-popular">
            <div class="item">
              <div class="product-box">
                <div class="product-img"> <a href="product-details.html"><img src="{{ asset('front_end/images/products/product-01.jpg') }}" class="img-responsive" alt="product"/></a> </div>
                <div class="product-content"> <a class="wish-btn" href="#"></a>
                  <h3 class="product-title"><a href="product-details.html">New Style High Collar Parisryle Shirt</a></h3>
                  <p class="product-price"><span class="old-price"> ৳ 1,400 </span> <span>৳ 1,090</span></p>
                  <a class="quick-view" onClick="showModal('productModal')" href="javascript:void(0)">Show More</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="product-box">
                <div class="product-img"> <a href="product-details.html"><img src="{{ asset('front_end/images/products/product-02.jpg') }}" class="img-responsive" alt="product"/></a> </div>
                <div class="product-content"> <a class="wish-btn" href="#"></a>
                  <h3 class="product-title"><a href="product-details.html">Stand Collar Sky Blue Stylish Paristyle Shirt</a></h3>
                  <p class="product-price"><span class="old-price"> ৳ 1,350</span> <span>৳ 1,080</span></p>
                  <a class="quick-view" onClick="showModal('productModal')" href="javascript:void(0)">Show More</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="product-box">
                <div class="product-img"> <a href="product-details.html"><img src="{{ asset('front_end/images/products/product-03.jpg') }}" class="img-responsive" alt="product"/></a> </div>
                <div class="product-content"> <a class="wish-btn" href="#"></a>
                  <h3 class="product-title"><a href="product-details.html">High Quality Long Sleeve Men White Paristyle shirt</a></h3>
                  <p class="product-price"><span class="old-price"> ৳ 1,200 </span> <span>৳ 900</span></p>
                  <a class="quick-view" onClick="showModal('productModal')" href="javascript:void(0)">Show More</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="product-box">
                <div class="product-img"> <a href="product-details.html"><img src="{{ asset('front_end/images/products/product-04.jpg') }}" class="img-responsive" alt="product"/></a> </div>
                <div class="product-content"> <a class="wish-btn" href="#"></a>
                  <h3 class="product-title"><a href="product-details.html">Casual Long Sleeved Striped White Paristyle Shirt</a></h3>
                  <p class="product-price"><span class="old-price"> ৳ 1,400 </span> <span>৳ 1,090</span></p>
                  <a class="quick-view" onClick="showModal('productModal')" href="javascript:void(0)">Show More</a> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="slide-content" id="men" style="display:none">
          <div class="product-carousel" id="product-carousel-men">
            <div class="item">
              <div class="product-box">
                <div class="product-img"> <a href="product-details.html"><img src="{{ asset('front_end/images/products/product-01.jpg') }}" class="img-responsive" alt="product"/></a> </div>
                <div class="product-content"> <a class="wish-btn" href="#"></a>
                  <h3 class="product-title"><a href="product-details.html">New Style High Collar Parisryle Shirt</a></h3>
                  <p class="product-price"><span class="old-price"> ৳ 1,400 </span> <span>৳ 1,090</span></p>
                  <a class="quick-view" onClick="showModal('productModal')" href="javascript:void(0)">Show More</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="product-box">
                <div class="product-img"> <a href="product-details.html"><img src="{{ asset('front_end/images/products/product-02.jpg') }}" class="img-responsive" alt="product"/></a> </div>
                <div class="product-content"> <a class="wish-btn" href="#"></a>
                  <h3 class="product-title"><a href="product-details.html">Stand Collar Sky Blue Stylish Paristyle Shirt</a></h3>
                  <p class="product-price"><span class="old-price"> ৳ 1,350</span> <span>৳ 1,080</span></p>
                  <a class="quick-view" onClick="showModal('productModal')" href="javascript:void(0)">Show More</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="product-box">
                <div class="product-img"> <a href="product-details.html"><img src="{{ asset('front_end/images/products/product-03.jpg') }}" class="img-responsive" alt="product"/></a> </div>
                <div class="product-content"> <a class="wish-btn" href="#"></a>
                  <h3 class="product-title"><a href="product-details.html">High Quality Long Sleeve Men White Paristyle shirt</a></h3>
                  <p class="product-price"><span class="old-price"> ৳ 1,200 </span> <span>৳ 900</span></p>
                  <a class="quick-view" onClick="showModal('productModal')" href="javascript:void(0)">Show More</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="product-box">
                <div class="product-img"> <a href="product-details.html"><img src="{{ asset('front_end/images/products/product-04.jpg') }}" class="img-responsive" alt="product"/></a> </div>
                <div class="product-content"> <a class="wish-btn" href="#"></a>
                  <h3 class="product-title"><a href="product-details.html">Casual Long Sleeved Striped White Paristyle Shirt</a></h3>
                  <p class="product-price"><span class="old-price"> ৳ 1,400 </span> <span>৳ 1,090</span></p>
                  <a class="quick-view" onClick="showModal('productModal')" href="javascript:void(0)">Show More</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="featured-product support">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="heading">
          <p>Say</p>
          <h2>hello</h2>
        </div>
        <div class="hotline">
          <p>Call to order(10AM - 10PM)</p>
          <h2>+8809679222663</h2>
        </div>
        <div class="relatedTo">
          <h4>Ecommerce Related Inquiry</h4>
          <p>MONDAY - SATURDAY<br>
            9AM - 12AM EST<br>
            SUNDAY<br>
            11am - 11pm EST</p>
          <a href="mailto:info@jstreasurebd.com">info@jstreasurebd.com</a> </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-8">
        <figure class="figure-img"> <img src="front_end/images/contact.jpg" class="img-responsive" alt="contact"/> </figure>
      </div>
    </div>
  </div>
</section>
@stop