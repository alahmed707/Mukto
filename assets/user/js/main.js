$(function ($) {
    "use strict";

    if ($("#datepicker").length > 0) {
        $("#datepicker").datepicker();
    }
    $(function () {

        var url = window.location.pathname,
            urlRegExp = new RegExp(url.replace(/\/$/, '') + "$"); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there

        // now grab every link from the navigation
        $('li.user-item a').each(function () {
            // and test its normalized href against the url pathname regexp
            if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
                $(this).addClass('active');
            }
        });
    });
    if ($('#example').length > 0) {
        $('#example').DataTable();
    }

    // USER NOTIFICATION


    $('#notf').on('click', function () {
        $('#notf-show').load($("#notf-show").data('href'));
        $('.main-menu #main-menu .navbar-nav .nav-item.dropdown #notf-show').removeClass('hidden');
    });

    $('#notf').on('mouseover', function () {
        $('#notf-show').load($("#notf-show").data('href'));
        $('.main-menu #main-menu .navbar-nav .nav-item.dropdown #notf-show').removeClass('hidden');
    });

    $(document).on('click', '#notf-clear', function (event) {
        $('.main-menu #main-menu .navbar-nav .nav-item.dropdown #notf-show').addClass('hidden');
        $.get($('#notf-clear').data('href'));
    });

    // USER NOTIFICATION ENDS


});