var virheViesti = null;
var viesti = null;


$(document).ready(function() {

	if(viesti !== null){
		$("body").append("<div id='loggedout'><p><i class='fa-margin fa fa-check fa-2x'></i>"+viesti+"</p></div>");
		window.setTimeout(function() {
			$("#loggedout").addClass("show");
		}, 200);		
	}
	if(virheViesti !== null){
		$("body").append("<div id='virhe'><p><i class='fa-margin fa fa-times fa-2x'></i>"+virheViesti+"</p></div>");
		window.setTimeout(function() {
			$("#virhe").addClass("show");
		}, 200);
	}	
	
});

$(document).ready(function() {
	$(".ratas").click(function() {
		$(this).toggleClass("rotate");
		$("#user-menu").slideToggle("slow", function() {
		});		
		
	});
	$("#user-menu").mouseleave(function() {
		$(this).slideToggle();
		$(".ratas").removeClass("rotate");
	});


	$(".menu-container li").mouseenter(function() {
		$(this).find("a").css("text-decoration", "underline");
	});
	$(".menu-container li").mouseleave(function() {
		$(this).find("a").css("text-decoration", "none");
	});

});



$(document).ready(function() {		
		$(".menu1, .menu2, .menu3, .menu4, .menu5, .menu6").click(function(e) {

			if($(e.target).closest('span').length){
				var paikka = $(this);
			paikka.find("ol").slideToggle("slow", function() {
				
			});
			paikka.find(".miinus2").toggleClass("rotatemiinus");
			}else{};
	});
	
});

$(document).ready(function() {
	$(".menu1, .menu2, .menu3, .menu4, .menu5, .menu6").mouseenter(function() {
		$(this).find("span").addClass("a-color-white");
	});
	$(".menu1, .menu2, .menu3, .menu4, .menu5, .menu6").mouseleave(function() {
		$(this).find("span").removeClass("a-color-white");
	});

});

$(document).ready(function() {  
var stickyNavTop = $('.menu-container').offset().top;  
  
var stickyNav = function(){  
	var scrollTop = $(window).scrollTop();  
	       
	if (scrollTop > stickyNavTop) {   
	    $('.menu-container').addClass('sticky'); 
	    $('.menu-container').addClass('scroll'); 
	} else {  
	    $('.menu-container').removeClass('sticky');   
	    $('.menu-container').removeClass('scroll');  
}  
};  
  

if ($(window).width() >= 800){	
		stickyNav();  
	
  
$(window).scroll(function() {  
    stickyNav();  
});  
};
});  


$(document).ready(function() {
	var kertaa = 1;

	$(document).on("click", ".tlisays", function() {	
		var addFile =  $(".addfile").last().clone(true).data($(".tdlisays").remove());
		$(addFile).insertAfter($(".addfile").last());

		var addTlisays = $(".tdlisays").clone();

		$(".tdlisays").first().remove();
		$(addTlisays).insertAfter($(".addfile").last().find("td").last());

});

	$(".poista").click(function() {
		var addTlisays = $(".tdlisays").clone();
			kertaa = $(".addfile").length;
		if(kertaa>1){
			$(".addfile").last().remove();
			$(addTlisays).insertAfter($(".addfile").last().find("td").last());
		};			
	});
});