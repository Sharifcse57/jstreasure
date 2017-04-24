<!-- Modal -->
<div class="modal fade product-modal" id="productModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-ng-controller="CartController">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"> <a href="#" class="close" data-dismiss="modal" aria-label="Close"><img src="{{ asset('front_end/images/remove.svg') }}" alt="close"></a> </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-5" data-ng-if="!loading">
            <div id="products-carousel-modal" class="carousel slide" data-ride="carousel">
              <!-- Wrapper for slides -->

              <div class="carousel-inner" role="listbox">
                <div class="item" ng-repeat="image in modalData.images" data-ng-class="$index==0?'active':''">
                    <img src="../images/sites/products/@{{image.id}}.@{{image.img}}" alt="products" />
                </div>
              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#products-carousel-modal" role="button" data-slide="prev"> <img src="{{ asset('front_end/images/prev-item.svg') }}"  alt=""/> </a> <a class="right carousel-control" href="#products-carousel-modal" role="button" data-slide="next"> <img src="{{ asset('front_end/images/next-item.svg') }}"  alt=""/> </a>
              </div>

            <div class="zoom-front_end/images">
              <div class="products-carousel-modal"> </div>
            </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-7">
            <div class="product-details">
              <div class="size-box table-responsive" style="display:none;"> <span class="close-size">Close</span>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Size</th>
                      <th>Collar</th>
                      <th>Length</th>
                      <th>Chest</th>
                      <th>Sleeve</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Medium</td>
                      <td>14.5</td>
                      <td>27</td>
                      <td>38</td>
                      <td>23</td>
                    </tr>
                    <tr>
                      <td>Large</td>
                      <td>14.5</td>
                      <td>27</td>
                      <td>38</td>
                      <td>23</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div>
              <h2 id="product-title" class="product_title">@{{modalData.title}}</h2>
              </div>
              <p id="product-price"><span class="old-price"> ৳ @{{modalData.price}} </span> <span>৳ @{{modalData.price}}</span></p>
              <span> SHIRT CODE: SH94</span>
              <form class="form order-form">
                <h3>এখানে অর্ডার করুন </h3>
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
                      <span class="show-size">Size guide</span> </div>
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
                  <label class="col-sm-2 control-label quantity-lebel">quantity</label>
                  <div class="col-sm-10">
                    <div class="col-sm-8 col-md-10">
                      <div class="productQuantity"> <a href="javascript:void(0)" class="decrease" onclick="decreamentQty()">-</a>
                        <input value="1" min="1" name="quantity" id="inc" readonly type="text">
                        <a href="javascript:void(0)" class="increase" onclick="increamentQty()">+</a> </div>
                    </div>
                  </div>
                </div>

                <button id="add_cart_btn"  class="btn btn-buy" type="submit"
                      ng-click="add_to_cart({
                      id : '@{{  modalData.id }}' ,
                      title : '@{{  modalData.title }}' ,
                      price : '@{{  modalData.price }}',}); minicart_product()" class="btn btn-buy">
                       Buy Now
                </button>

                <ul class="list-inline">
                  <li><a href="#"><img src="{{ asset('front_end/images/facebook.svg') }}" alt="facebook"/></a></li>
                  <li><a href="#"><img src="{{ asset('front_end/images/twitter.svg') }}" alt="twitter"/></a></li>
                  <li><a href="#"><img src="{{ asset('front_end/images/instagram.svg') }}" alt="instagram"/></a></li>
                </ul>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>