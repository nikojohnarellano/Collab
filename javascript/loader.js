//João Pereira
(function ($) {

    $.fn.fakeLoader = function(options) {

        //Defaults
        var settings = $.extend({
            timeToHide:5000, // Default Time to hide fakeLoader
            pos:'fixed',// Default Position
            top:'0px',  // Default Top value
            left:'0px', // Default Left value
            width:'100%', // Default width
            height:'100%', // Default Height
            zIndex: '999',  // Default zIndex
            bgColor: 'black', // Default background color
            spinner:'spinner7', // Default Spinner
            imagePath:'' // Default Path custom image
        }, options);

        //The target
        var el = $(this);

        //Init styles
        var initStyles = {
            'position':settings.pos,
            'width':settings.width,
            'height':settings.height,
            'top':settings.top,
            'left':settings.left
        };

        //Apply styles
        el.css(initStyles);
        el.html('<div id="loader-transition" class="col-md-4 col-md-offset-4"><h1 class="text-center">Loading</h1><img class="spinner center-block" src="./images/spinner1.gif"></div>');
        centerLoader();

        //Time to hide fakeLoader
        setTimeout(function(){
            $(el).fadeOut();
            $('#wrapper').show();
        }, settings.timeToHide);

        //Return Styles
        return this.css({
            'backgroundColor':settings.bgColor,
            'zIndex':settings.zIndex
        });


    }; // End Fake Loader

        //Center Spinner
        function centerLoader() {
            $('#wrapper').hide();
            var winW = $(window).width();
            var winH = $(window).height();

            var spinnerW = $('.fl').outerWidth();
            var spinnerH = $('.fl').outerHeight();

            $('.spinner').css({
              'width' : '200px',
              'height': '200px'
            });
        }

        $(window).load(function(){
                centerLoader();
              $(window).resize(function(){
                centerLoader();
              });
        });


}(jQuery));
