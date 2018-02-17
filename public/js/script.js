$(document).ready(function() {
	"use strict";
	$("#countdown").countdown({
		date: "12 june 2018 12:00:00", /** Enter new date here **/
		format: "on"
	},
	function() {
		// callback function
	});
});

$(document).ready(function(){
    var owl = $("#testimonial-slider");
    owl.owlCarousel({
        items:1,
        itemsDesktop:[1000,1],
        itemsDesktopSmall:[979,1],
        itemsTablet:[768,1],
        pagination:false,
        navigation:true,
        navigationText:["",""],
        slideSpeed:1000,
        singleItem:true,
        autoPlay:true,
        info: true,
        afterAction : afterAction,
        afterInit: afterInit,
    });

    function afterAction(){
        $("#nav-pos").html( ( parseInt(this.owl.currentItem) + 1) + ' / ' + this.owl.owlItems.length );
    }
    
    function afterInit(){
        $(".owl-buttons .owl-prev").after( "<span id='nav-pos'>"  + 1 + ' / ' + this.owl.owlItems.length + "</span>" );
    }

});
