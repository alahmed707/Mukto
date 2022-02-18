(function ($) {
	"use strict";

	$(document).ready(function () {


		// Drop Down Section

		$('.dropdown-toggle-1').on('click', function () {
			$(this).parent().siblings().find('.dropdown-menu').hide();
			$(this).next('.dropdown-menu').toggle();
		});

		$(document).on('click', function (e) {
			var container = $(".dropdown-toggle-1");

			// if the target of the click isn't the container nor a descendant of the container
			if (!container.is(e.target) && container.has(e.target).length === 0) {
				container.next('.dropdown-menu').hide();
			}
		});

	});

	// Drop Down Section Ends 

	// Side Bar Area Js
	$('#sidebarCollapse').on('click', function () {
		$('#sidebar').toggleClass('active');
	});
	Waves.init();
	Waves.attach('.wave-effect', ['waves-button']);
	Waves.attach('.wave-effect-float', ['waves-button', 'waves-float']);
	$('.slimescroll-id').slimScroll({
		height: 'auto'
	});
	$("#sidebar a").each(function () {
		var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) {
			$(this).addClass("active");
			$(this).parent().addClass("active"); // add active to li of the current link
			$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().prev().click(); // click the item to make it drop
		}
	});

	// Side Bar Area Js Ends

	// Nice Select Active js
	$('.select').niceSelect();
	//  Nice Select Ends    



	// Withdraw Bank Selection Js//
	$("#withmethod").change(function () {
		var method = $(this).val();
		if (method == "Bank") {

			$("#bank").show();
			$("#bank").find('input, select').attr('required', true);

			$("#paypal").hide();
			$("#paypal").find('input').attr('required', false);

		}
		if (method != "Bank") {
			$("#bank").hide();
			$("#bank").find('input, select').attr('required', false);

			$("#paypal").show();
			$("#paypal").find('input').attr('required', true);
		}
		if (method == "") {
			$("#bank").hide();
			$("#paypal").hide();
		}

	})
	// Withdraw Bank Selection Js End//


	// Campaign Create DatePicker and tagify js
	$("#preloaded_amount").tagit({
		fieldName: "preloaded_amount[]",
		allowSpaces: true
	});

	$("#tags").tagit({
		fieldName: "tags[]",
		allowSpaces: true
	});

	var dateToday = new Date();
	var dates = $("#end_date").datepicker({
		changeMonth: true,
		changeYear: true,
		minDate: dateToday,
	});
	// Campaign Create DatePicker and tagify js end 



})(jQuery);