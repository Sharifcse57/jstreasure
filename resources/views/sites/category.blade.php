@extends('layouts.front_end')
@section('title') Category @stop
@section('content')

<section class="category" data-ng-controller="CartController">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-9">
        <div class="form-select pull-right">
          <form action="" method="get">
            {{-- <input type="hidden" name="action" value="sort"> --}}
            <select class="productSort job_contract" name="orderby" onchange="this.form.submit()">
              <option selected="" value="popular">Sort By: Popularity </option>
              <option value="id:desc">Sort By: New Arrival</option>
              <option value="price:desc">Sort By: Price : High to Low </option>
              <option value="price:asc">Sort By: Price : Low to High</option>
              <option value="name:asc">Sort By: Name </option>
            </select>
          </form>
        </div>
      </div>
    </div>

    <div class="row">
      @foreach ($category as $categories)
        @foreach($categories->products as $product)
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="product-box">
              <div class="product-img">
                <a href="/product_details/{{$product->product_slug}}">
                 @if($product->images)
                    {{HTML::image('images/sites/products/'.$product->images[0]->id.'.'.$product->images[0]->img,null,array('class'=>'img-responsive'))}}
                 @endif
                </a>
              </div>
              <div class="product-content">
                  <a class="wish-btn" href="#"></a>
                  <h3 class="product-title">
                  <a href="#">{{$product->title}}</a>
                  </h3>
                  <p class="product-price">
                  <span class="old-price"> ৳ {{$product->price}} </span> <span>৳ {{$product->price}}</span>
                  </p>
                  <a class="quick-view" ng-click="showModal('productModal'); modal_data({{$product->id}})" href="javascript:void(0)">Show More</a>
              </div>
            </div>
          </div>
        @endforeach
      @endforeach
    </div>
    <div class="product-pagination">
    <ul class="list-inline text-center">
     <li>{{$category->render()}}</li>
    </ul>

      <ul class="list-inline text-center">
        <li><a href="#">←</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">→</a></li>
      </ul>
    </div>
  </div>
</section>

@stop

@section('script')
<script>

function getItem(){
     var itemBy = document.getElementById("myItem").value;
         $.ajax({
            url: "/get_product_by_choice",
            method: 'post',
            data: { item: itemBy, _token: Laravel.csrfToken},
            dataType: "json",
            success: function(data){
              console.log(data);
              //$("#item").html(data);
            }
        })
}

  </script>
@stop