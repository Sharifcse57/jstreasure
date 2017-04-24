var myApp = angular.module('jstreasure', []);

myApp.run(function($http,$rootScope){	
	$rootScope.modalData={};
	$rootScope.modal_data= function(id)
    {
    
    $rootScope.loading=true;
     $http({
		  method: 'post',
		  url: '/get_product_to_modal',
		  data: { id: id, _token: Laravel.csrfToken},
	}).then(function successCallback(response) {
	   var responseData=response.data;
	   $rootScope.modalData=responseData;
	   console.log($rootScope.modalData);
	   $rootScope.loading=false;
	  }, function errorCallback(response) {
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	  });
    }
});

myApp.controller('CartController', function($scope,$http,$rootScope) {
    $scope.name = "shairf";
$rootScope.minicart={};

$rootScope.minicart_product= function(){
	$http.get('/minicart').success(function(response){
			$rootScope.mini_cart_value = response;
		});   
}
 

$scope.decreamentQty_cart = function(id)
	{
		var decrease = document.getElementById('inc_'+id).value;
		var minus = --decrease;
		if(minus < 1)
		{
		  minus = 1;
		}
		document.getElementById('inc_'+id).value= minus;
	}

$scope.increamentQty_cart= function(id)
	{
	   document.getElementById('inc_'+id).value++;
	}	

$scope.change_cart =function(id)
	{
	  Laravel.cart[id]['quantity']=$('#inc_'+id).val();
	}

$scope.update_to_cart = function()
	{
		

		$.ajax({
		  url: "/update_cart_processing",
		  method: 'post',
		  data: { cart: Laravel.cart, _token: Laravel.csrfToken},
		  dataType: "json",
		  success: function (data) {
		    console.log(data);
		    var count=0;
		    for (key in data)
		      {
		          count+=parseInt(data[key]['quantity']);
		      }
		      $('#cart_count').text('('+count+')');
		      Laravel.cart=data;
		      $('#update_cart_btn').addClass('disabled');
		  }
		});
	}		

$scope.remove_product_cart = function(id)
{
  
  delete Laravel.cart[id];
  $("#cart_row_"+id).remove();


}

$scope.remove_product_cart_mini = function(id)
{
  delete Laravel.cart[id];
  $("#mini_cart_row_"+id).remove();
  $("#cart_row_"+id).remove();
}


$rootScope.add_to_cart = function( product)
    {
      var quantity=$('#inc').val();
      $.ajax({
        url: "/add_cart_processing",
        method: 'post',
        data: { cart: product, quantity: quantity, _token: Laravel.csrfToken},
        dataType: "json",
        success: function (data) {
         // console.log(data);
           var count=0;

           for (key in data) {
             count+=parseInt(data[key]['quantity']);
           }

           $('#cart_count').text('('+count+')');
           Laravel.cart=data;
        }
      });
    }

	$scope.showModal= function(selector){
		$('#'+selector).modal('show'); 
		//$rootScope.modalData.title="xyz";
	}

});
