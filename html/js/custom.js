//  ========== 
//  = Custom Javascript = 
//  ========== 

var timer = 1;
	
	setInterval(function(){
		$('.ll img:first').toggle(),
		$('.rl img:first').toggle();
}, timer * 1000);

$(window).load(function() {
    show();
});

function show() {
    $('#loading').hide();
    $('#container').fadeIn();
};

$(document).ready(function(){
	$('a[href^="#"]').on('click',function(e){
    $target = $(this).attr('href');
    e.preventDefault();

    if($(this).attr('href') == '#') {

    $('html, body').stop().animate({
        scrollTop: $('body').offset().top
    }, 400, function(){location.hash = $target;});
    } else {
        $('html, body').stop().animate({
			scrollTop: $($target).offset().top + 0 - $('.navbar-inverse').height() 
        }, 400,function(){location.hash = $target});

    }
		return false;
	});
	
	
	
	
	
	
	// Cache selectors
	var lastId,
		topMenu = $("#nav"),
		topMenuHeight = topMenu.outerHeight(),
		// All list items
		menuItems = topMenu.find("a"),
		// Anchors corresponding to menu items
		scrollItems = menuItems.map(function(){
		  var item = $($(this).attr("href"));
		  if (item.length) { return item; }
		});

	// Bind click handler to menu items
	// so we can get a fancy scroll animation
	menuItems.click(function(e){
	  var href = $(this).attr("href"),
		  offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
	  $('html, body').stop().animate({ 
		  scrollTop: offsetTop
	  }, 300);
	  e.preventDefault();
	});

	// Bind to scroll
	$(window).scroll(function(){
	   // Get container scroll position
	   var fromTop = $(this).scrollTop()+topMenuHeight;
	   
	   // Get id of current scroll item
	   var cur = scrollItems.map(function(){
		 if ($(this).offset().top < fromTop)
		   return this;
	   });
	   // Get the id of the current element
	   cur = cur[cur.length-1];
	   var id = cur && cur.length ? cur[0].id : "";
	   
	   if (lastId !== id) {
		   lastId = id;
		   // Set/remove active class
		   menuItems
			 .parent().removeClass("active")
			 .end().filter("[href=#"+id+"]").parent().addClass("active");
	   }                   
	});
	
    $(".dropdown img.flag").addClass("flagvisibility");

    $(".dropdown dt a").click(function() {
         $(".dropdown dd ul").toggle();
    });

	$(".dropdown dd ul li a").click(function() {
        var text = $(this).html();
        $(".dropdown dt a span").html(text);
        $(".dropdown dd ul").hide();
	});
                        
    function getSelectedValue(id) {
        return $("#" + id).find("dt a span.value").html();
    }

    $(document).bind('click', function(e) {
		var $clicked = $(e.target);
			if (! $clicked.parents().hasClass("dropdown"))
				$(".dropdown dd ul").hide();
	});


	$("#flagSwitcher").click(function() {
		$(".dropdown img.flag").toggleClass("flagvisibility");
	});
	
 	$('#myfile').change(function() {
		$('#path').val($(this).val());
	});
 
	$('a.order').on('click', function(){
		var $that = $(this);
		var orderID = $that.attr('id');
		$('input[name="packet"]').val(orderID);
		$('dl#sample dt').html($('li.' + orderID).html());
	});
 
	
	
	var loader = "<?php echo $loader; ?>";

	$('.dropdown li').on('click', function() {
		var $that = $(this);
		var selectValue = $that.attr('id');
		$('input#packet').val(selectValue);
	});


});

/*kdmi*/



   