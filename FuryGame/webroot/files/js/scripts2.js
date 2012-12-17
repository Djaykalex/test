$(document).ready(function(){
	
	var menu = $(".rows input");
	
	
	menu.hover
		(function() {
		//$(this).next("em").css("display","block");//version A
		$(this).next("em").fadeIn(), "slow";//version B
		//$(this).next("em").slideDown(), "slow"; //version C
		//$(this).next("em").animate({opacity: "show", "top": "-75"}, "slow"); //version D
		
		},	
		function() {
		$(this).next("em").css("display","none");//version A
		//$(this).next("em").fadeOut();//Version B
		//$(this).next("em").slideUp(), "fast";//version C
		//$(this).next("em").animate({opacity: "hide", "top": "-85"}, "fast"); //version D
		}
	);

	
	var menus = $(".rowright select");
	
	
	menus.hover
		(function() {
		//$(this).next("em").css("display","block");//version A
		$(this).next("em").fadeIn(), "slow";//version B
		//$(this).next("em").slideDown(), "slow"; //version C
		//$(this).next("em").animate({opacity: "show", "top": "-75"}, "slow"); //version D
		
		},	
		function() {
		$(this).next("em").css("display","none");//version A
		//$(this).next("em").fadeOut();//Version B
		//$(this).next("em").slideUp(), "fast";//version C
		//$(this).next("em").animate({opacity: "hide", "top": "-85"}, "fast"); //version D
		}
	);
	
	var menus = $(".rowright textarea");
	
	
	menus.hover
		(function() {
		//$(this).next("em").css("display","block");//version A
		$(this).next("em").fadeIn(), "slow";//version B
		//$(this).next("em").slideDown(), "slow"; //version C
		//$(this).next("em").animate({opacity: "show", "top": "-75"}, "slow"); //version D
		
		},	
		function() {
		$(this).next("em").css("display","none");//version A
		//$(this).next("em").fadeOut();//Version B
		//$(this).next("em").slideUp(), "fast";//version C
		//$(this).next("em").animate({opacity: "hide", "top": "-85"}, "fast"); //version D
		}
	);
});