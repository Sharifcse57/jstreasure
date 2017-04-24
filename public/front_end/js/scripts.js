function startOwlCarousel(id){
	$('#'+id).owlCarousel({
		loop:true,
		margin:30,
		responsiveClass:true,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		nav: true,
		dots: false,
		slideSpeed:1000,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:2
			},
			1000:{
				items:3,
			}
		}
	});

}
$(document).ready(function(e) {
	startOwlCarousel('product-carousel-featured');
	 $('.fancybox').fancybox({
	  helpers: {
		title : {
		  type : 'over'
			},
		overlay: {
		  locked: false
		}
	  }
	});	
	
$('.products-carousel-big').owlCarousel({
    thumbs: true,
	items:1,
    thumbsPrerendered: true,
	dots: false,
	nav: true
  });  


});



$('body').css('padding-top', $('header').innerHeight());
//$('.mini-cart-inner').css('height', $('body').height() - $('.procced-btn').height() );

$('.navbar-site .custom-nav ul.navbar-right li:last-child').on('click', function(e) {
	  $(this).toggleClass("remove");
    $('.big-search').slideToggle(500);
	 e.preventDefault();
});
$('.show-size,.close-size').on('click', function(e) {
    $('.size-box').toggle();
	 e.preventDefault();
});

$('.navbar-site .custom-nav ul.navbar-right li:nth-last-child(2),.cart-head ,.page-overlay').on('click', function(e) {
	$(".mini-cart").toggleClass('cart-show');
	$(".page-overlay").toggleClass('show');
});
$('.owl-thumbs a').on('click', function(e) {
    $('.owl-thumbs a').removeClass('active');
    $(this).addClass('active');
});

/*----------------- TAB -------------------*/
function productItem(selector) {

	var tis=$(selector);
	var id=tis.data('name');
	
	$('.featured-product ul li a').removeClass('active');
    tis.addClass('active');
	
    $('.slide-content').each(function(index) {
        if ($(this).attr("id") == id) {
            $(this).slideDown(400);
        } else {
            $(this).slideUp(400);
        }
    });
	
	startOwlCarousel('product-carousel-'+id);
}
$('.big-search').css('height', $('header').height());
$(window).on("scroll touchmove", function () {
	var header = $('header').height();	
	if($(document).scrollTop() > header){
		$('.navbar-site').toggleClass('tiny', $(document).scrollTop() > header + 50 );
		}
	else{
		
		}
});

  $('.css-label').tooltip();
  
  function increamentQty()
{
var increament = document.getElementById('inc').value;
var plus = ++increament;

document.getElementById('inc').value= plus;
}

function decreamentQty()
{
var decrease = document.getElementById('inc').value;
var minus = --decrease;
if(minus < 1){
	minus = 1;
}
document.getElementById('inc').value= minus;
}

function increamentQty_cart(id)
{
  var cart_btn=document.getElementById('update_cart_btn');


  if(cart_btn != null)
  {
    cart_btn.classList.remove("disabled");
  }


   document.getElementById('inc_'+id).value++;
}


function decreamentQty_cart(id)
{

var cart_btn=document.getElementById('update_cart_btn');
  if(cart_btn != null)
  {
  cart_btn.classList.remove("disabled");
  }

var decrease = document.getElementById('inc_'+id).value;
var minus = --decrease;
if(minus < 1){
  minus = 1;
}

document.getElementById('inc_'+id).value= minus;
}



(function(e) {
    e.fn.visible = function(t, n, r) {
        var i = e(this).eq(0),s = i.get(0),o = e(window),u = o.scrollTop(),a = u + o.height(),f = o.scrollLeft(),l = f + o.width(),c = i.offset().top,
            h = c + i.height(),p = i.offset().left,d = p + i.width(),v = t === true ? h : c,m = t === true ? c : h,g = t === true ? d : p,y = t === true ? p : d,
            b = n === true ? s.offsetWidth * s.offsetHeight : true,r = r ? r : "both";
        if (r === "both") return !!b && m <= a && v >= u && y <= l && g >= f;
        else if (r === "vertical") return !!b && m <= a && v >= u;
        else if (r === "horizontal") return !!b && y <= l && g >= f
    }
})(jQuery)


// Variables
var wholeWindow = $(window);
var box = $('.figure-img');
// If it is then add a class
wholeWindow.scroll(function() {
	box.each(function(i, obj) {
		if ($(obj).visible(true)) {
			$(obj).addClass('active');
		}  		
	}); 
});
