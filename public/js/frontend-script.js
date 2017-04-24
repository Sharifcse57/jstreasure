function openNav() {
    document.getElementById("search-overlay").style.width = "100%";
}

function closeNav() {
    document.getElementById("search-overlay").style.width = "0%";
}

$(window).on("scroll touchmove", function () {
	var chatNav = $('header').height()+ $('.banner').height();
    $('.float-nav').toggleClass('float-nav-sticky', $(document).scrollTop() > $('.common-content').height());
	
	if($(document).scrollTop() > chatNav){
		$('.nav-chat').css('top', chatNav-$('.nav-chat').height());
		$('.nav-chat-mobile').css('top', chatNav-$('.nav-chat-mobile').height());
		}
	else{
		$('.nav-chat').css('top', chatNav);
		$('.nav-chat-mobile').css('top', chatNav);
		}
});

/*$('.float-nav ul li').click(function(){
	$('.float-nav ul li').removeClass("active")
   $(this).addClass("active")
});
*/



$(document).ready(function(e) {
//footer
if ($(window).width() > 768) {
         $(".footer-bottom").css({'height':($(".footer-overlay").height()+'px')});

     }
	 
$(".hide-footer").click(function(){
   $(".footer-overlay").fadeOut(300);
   $(".footer-bottom").addClass("footer-bottom-static");
});

	 $('.nav-chat').css('top', $('header').height()+ $('.banner').height());
});

 $('.top-up').click(function(e) { 
   if($(this.hash).length > 0){
	      $(this).closest('li').addClass("active").siblings().removeClass('active');;
          $('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1200);
         return false;
          e.preventDefault();
		   
		  
  }
     });

/*-------Active-------*/
 $(document).on("scroll", onScroll);
    
    //smoothscroll
    $('.float-nav ul li a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");
        
        $('.float-nav ul li a').each(function () {
            $(this).removeClass('active');
        });
        $(this).addClass('active');
      
        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top+2
        }, 1000, 'swing', function () {
            window.location.hash = target;
            $(document).on("scroll", onScroll);
        });
    });

function onScroll(event){
    var scrollPos = $(document).scrollTop();
    $('.float-nav a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('.float-nav ul li a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}
/*-------Active End ------------*/   

function callPopUpModal(){
  var data = localStorage.getItem('hurtigruten_popup');
  if(data === null){
    localStorage.setItem('hurtigruten_popup', 'hurtigruten_popup_val');
        setTimeout(function(){
          var d=document.getElementById('oval-thought');
            d.className += "  oval-thought-in";         
      },6000);
    }else{
      localStorage.removeItem('hurtigruten_popup');
      //console.log('sessiong yes');
    }
  
}

document.body.onclick = function(event) { 
     document.getElementById("oval-thought").className = "oval-thought";     
};



// window.onbeforeunload = function (event) {   
//     if (typeof event == 'undefined') {
//         event = window.event;
//     }
//     if (event) { 
//       //console.log(event);
//    // console.log(event.eventPhase);     
//        if(event.eventPhase !== 2){
//         console.log('asdf');
//         localStorage.removeItem('hurtigruten_popup');
//        }
//         event.returnValue = 'abc';
       
//     }   
// };

// window.onunload = function(e) {
// // Firefox || IE
// e = e || window.event;
// var y = e.pageY || e.clientY;
//   if(y < 0){
//      localStorage.removeItem('hurtigruten_popup');
//     console.log("Window closed");
//   }else{
//     console.log("Window refreshed");
//   }  

// }



 nice = $(".highligts-para").niceScroll();
 $('p.alert').not('.alert-important').delay(3000).slideUp(300);
 
