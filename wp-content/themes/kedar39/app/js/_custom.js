jQuery(document).ready(function($){


/*---------------> Variabels <--------------------*/
var choosen = $('.menu-nav .choose');
var choosenItems = $('.menu-nav .choose-items');


//Modal for Contact form
var body = document.querySelector("body");
var closeButton = document.querySelector(".close-button");

/*---------------> IIFI <--------------------*/

    $(function() {
        //BEGIN
        $(".accordion__title").on("click", function(e) {
    
            e.preventDefault();
            var $this = $(this);
    
            if (!$this.hasClass("accordion-active")) {
                $(".accordion__content").slideUp(400);
                $(".accordion__title").removeClass("accordion-active");
                $('.accordion__arrow').removeClass('accordion__rotate');
            }
    
            $this.toggleClass("accordion-active");
            $this.next().slideToggle();
            $('.accordion__arrow',this).toggleClass('accordion__rotate');
        });
        //END
    });

/*---------------> Functions <--------------------*/
    function toggleModal(modalOpen) {
        modalOpen.classList.toggle("show-modal");
        body.classList.toggle("owf-body");
    }

    function windowOnClick(event) {
        var modal = document.querySelector(".aero-modal.show-modal");
        if (event.target === modal) {
            toggleModal( modal );
        }
    }

    function processButtonData(event){

        // Present fields values
        var target = $( event.target );
        var type = target.attr('data-type');
        var first = target.attr('data-first');
        var second = target.attr('data-second');

        var types = {
            'none': {
                fist: 0,
                second: 0
            },
            'tandem': {
                fist: [3000,4000,5000],
                second: [1,2,3,4]
            },
            'static-line': {
                fist: [1200,1600,5000],
                second: [1,2,3]
            },
            'aff': {
                fist: 0,
                second: 0
            },
            'observing': {
                fist: [15,30,60]
            },
        };

        var typeIndex = Object.keys(types).map(function(key, index) {
          return key;
        }).indexOf(type);

        //Disable 'Select' field
        $('.aero-extended-form .select-type select option').first().attr("disabled","disabled");

        //Set firs field
        $('.aero-extended-form .select-type select :nth-child('+ (typeIndex + 1) +')').prop('selected', true).change();

        //Empaty Fields
        if( typeIndex === 0){
           
        }

        //Tandem Fields
        if( typeIndex === 1){
            typeIndex = types[type].fist.indexOf(parseInt(first)) + 1;
            $('.aero-extended-form .tandem-1 select :nth-child('+typeIndex+')').prop('selected', true);
            typeIndex = types[type].second.indexOf(parseInt(second)) + 1;
            $('.aero-extended-form .tandem-2 select :nth-child('+typeIndex+')').prop('selected', true);
        }

        //Static-line Fields
        if( typeIndex === 2){
            typeIndex = types[type].fist.indexOf(parseInt(first)) + 1;
            $('.aero-extended-form .static-1 select :nth-child('+typeIndex+')').prop('selected', true);
            typeIndex = types[type].second.indexOf(parseInt(second)) + 1;
            $('.aero-extended-form .static-2 select :nth-child('+typeIndex+')').prop('selected', true);
        }

        //Aff Fields
        if( typeIndex === 3){
        }

        //Observing Fields
        if( typeIndex === 4){
            typeIndex = types[type].fist.indexOf(parseInt(first)) + 1;
            $('.aero-extended-form .observing-1 select :nth-child('+typeIndex+')').prop('selected', true);
        }

        // Call Popup
        var modal = document.querySelector(".aero-extended-form");
        toggleModal( modal );
    }

    function drawLineInfo() {
        var mainOff,fitstOffset,secondOffset,thrdOffset;
        var line1,line2,line3;
        var of1,of2,of3;

        mainOff      = $('.infographic').offset();
        fitstOffset  = $('.item-1').offset();
        secondOffset = $('.item-3').offset();
        if($('.static-line-inforgraphic').length){
            thrdOffset   = $('.item-5').offset();
        }
        if($('.tandem-infographic').length){
            thrdOffset   = $('.item-6').offset();
        }

        line1 = $('.infographic .line-1');
        line2 = $('.infographic .line-2');
        line3 = $('.infographic .line-3');

        svg1 = $('.infographic .item-1 svg').offset();
        svg2 = $('.infographic .item-3 svg').offset();

        if($('.static-line-inforgraphic').length){
            svg3 = $('.infographic .item-5 svg').offset();
        }
        if($('.tandem-infographic').length){
            svg3 = $('.infographic .item-6 svg').offset();
        }
        

        line1.css({
            "top": fitstOffset.top - mainOff.top,
            "right": 0,
            "width": "calc( 100% - " + (svg1.left + 2) + "px )"
        });

        line2.css({
            "top": secondOffset.top - mainOff.top,
            "width": "100%"
        });

        line3.css({
            "top": thrdOffset.top - mainOff.top,
            "left": 0,
            "width": svg3.left + 2
        });
    }

    function drawTimeLine(){
        jQuery('.price-cart__content .timeline').each(function( index ) {
            var firstOff = jQuery(this).find('.timeline-item').first().offset().top;
            var secondOff =  jQuery(this).find('.timeline-item').last().offset().top;
            jQuery(this).find('.line-time').css({
                "height": secondOff - firstOff + 'px',
            })
        });
    }

    function dropdownReinit(){
        if ( $('#burger_toggle').is(":visible") && $('.menu-nav .choose').length !== 0 ){
            $('.choose').remove();
            $('.menu-nav-ul').prepend(choosenItems.html());
        }
        if( $('#burger_toggle').is(":hidden") && $('.menu-nav .choose').length === 0 ){
            $('.menu-nav .choose-item').each(function(){
                $(this).remove();
            });
            $('.menu-nav-ul').prepend(choosen);
        }
    }

/*---------------> Libraries Call <--------------------*/

    $('.quotes-slider__wrapper').slick({
        fade: true,
        dots: true,
        arrows: true,
        autoplay: false,
        autoplaySpeed: 6000,
        pauseOnHover: false,
        pauseOnFocus: false,
        nextArrow: '.arr-next',
        prevArrow: '.arr-prev',
    });

    $('.static-line-crossale .crossale__row').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        arrows:false,
        responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 1
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1
              }
            },
        ]
    });

    $('.tandem-crossale .crossale__row').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        arrows:false,
        responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 2
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1
              }
            },
        ]
    });

    new ModalVideo('.vid-play');

/*---------------> DOM events <--------------------*/

    $('.orange-form input').attr('autocomplete','off');
    $('.aero-extended-form input').attr('autocomplete','off');
    $('.aero-simple-form input').attr('autocomplete','off');
    $( ".orange-form form" ).on( "wpformsAjaxSubmitSuccess", function() {
        var modalOpen = document.querySelector(".modal-blf");
        toggleModal( modalOpen );
        $('.wpforms-ajax-form').trigger("reset");
    });
    $( ".aero-extended-form form" ).on( "wpformsAjaxSubmitSuccess", function() {
        var modalOpen = document.querySelector(".aero-extended-form");
        toggleModal( modalOpen );
        var modalOpen = document.querySelector(".modal-blf");
        toggleModal( modalOpen );
        $('.wpforms-ajax-form').trigger("reset");
    });
    $( ".aero-simple-form form" ).on( "wpformsAjaxSubmitSuccess", function() {
        var modalOpen = document.querySelector(".aero-simple-form");
        toggleModal( modalOpen );
        var modalOpen = document.querySelector(".modal-blf");
        toggleModal( modalOpen );
        $('.wpforms-ajax-form').trigger("reset");
    });

    $('.open-extended-form').on('click', function(e){
        e.preventDefault();
        processButtonData(e);
    });
    $('.open-simple-form').on('click', function(e){
        e.preventDefault();
        // Call Popup
        var modal = document.querySelector(".aero-simple-form");
        toggleModal( modal );
    });

    $('.close-button').on('click', function(e){
        var modal = document.querySelector(".show-modal");
        toggleModal( modal );
    });

    $(window).load(function() {
        if( $('.infographic').length ){
            drawLineInfo();
        }
        if( $('.observing-price').length ){
            drawTimeLine();
        }
        dropdownReinit();
    });

    /*BURGER NAVIGATION*/
    $('#burger_toggle').click(function() {
        $('.overlay').html($('.menu-right').html());
        $(this).toggleClass('active');
        $('#overlay').toggleClass('open');
        $('body').toggleClass('fixed_b');
        $('.logo__wrapper').toggle();
    });

    //On Resize Function
    $(window).on('resize', function () {
        if($('#burger_toggle').hasClass('active') && $('.hide_down_md').css('display') !== 'none' ){
            $('#burger_toggle').click();
        }
        if( $('.infographic').length ){
            drawLineInfo();            
        }
        dropdownReinit();
    });

    window.addEventListener("click", windowOnClick);

    $( '.wpforms-datepicker' ).each( function() {
        var calendar = this._flatpickr;

        if ( 'object' === typeof calendar ) {
            calendar.set( 'locale', 'ru' );
        }
    } );

});