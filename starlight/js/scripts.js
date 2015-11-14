/**
 * scripts.js
 *
 * Handles random functions on site.
 */
 
var devices = {

    iPad: {
        landscape: {
            width: 1024,
            height: 690,
        },
        portrait: {
            width: 768,
            height: 946,
        }
    },
    phone: {
        landscape: {
            width: 0,
            height: 0,
        },
        portrait: {
            width: 560,
            height: 0,
        }
    },
};
 
(function($) {
    

    /*
    Flexslider front page
    */
    $.fn.initiateModelSlider = function() { 
        
        var $elem = null;
        if($(this).hasClass("flexslider"))
            $elem = $(this);
        else
            $elem = $(this).find('.flexslider');

        $elem.flexslider({
            animation: "slide", 
            nextText: ">",
            prevText: "<",  
            controlNav: false,
            directionNav: false,

            nextText: ">",
            prevText: "<",
            controlsContainer: ".flexslider-nav",
            manualControls: ".flexslider-nav .arrow",

            start: function(){
                 
                $(".shadow-wrap").addClass('angle-shadow');  

                $(".spinner").hide(); 
            },
        });

        $elem.find('.prev').on('click', function(){
            $elem.flexslider('prev'); 
        });

        $elem.find('.next').on('click', function(){
            $elem.flexslider('next'); 
        });

        // $elem.elevateZoom({
        //     zoomType: "inner",
        //     cursor: "crosshair",
        //     zoomWindowFadeIn: 500,
        //     zoomWindowFadeOut: 750
        // }); 
    }

    /*
    Quote parameters

    Input:
    #land
    #land/some-home-type
    #land/some-home-type/some-landtype
    #land/some-home-type/some-landtype/some-facade
    */
    $.getQuoteParameters = function() {

        var delimiter = "#";
        var vars = [];  
        vars['quote'] = null;
        vars['land'] = null;
        vars['model'] = null;
        vars['facade'] = null;
        vars['settings'] = null;
        var href = window.location.href;
        var isQuote = href.split(delimiter).length > 1;

        if(!isQuote)
            return null; 

        var parameters = href.slice(href.indexOf(delimiter) + delimiter.length); 
        var hashes = parameters.split("/"); 

        var i = 0;
        for(var key in vars){
            
            if(hashes.length > i)
                vars[key] = hashes[i];
            i++; 
        }
        i = 0;
        for(var key in vars){
            if(vars[key] === undefined || vars[key] === null)
                delete vars[key]; 
            else
                i++;
        }  

        if(i==1 || i==2){ 
            vars["quote"] = "land";
        }else if(i==3){
            vars["quote"] = "model";
        }else if(i==4){
            vars["quote"] = "facade";
        }else if(i==5){
            vars["quote"] = "settings";
        }
        return vars;
    };

    /*
    Build url from Quote parameters

    Input:
    #land
    #land/some-home-type
    #land/some-home-type/some-landtype
    #land/some-home-type/some-landtype/some-facade
    */
    $.getQuoteUrl = function(q) {

        console.log(q);

        var url = location.host+location.pathname+"#";
        for(var i in q){
            url += q[i]+"/"
        }  
        return url;
    };

    $.spinner = function(){
        return $('<div class="spinner"></div>');
    }
    $.spinnerWhite = function(){
        return $('<div class="spinner spinner-white"></div>');
    }
    
    $.fn.hideBlock = function() {
        this.css({
            'display': 'none'
        });
        return this;
    };
    $.fn.showBlock = function() {
        this.css({
            'display': 'inline'
        });
        return this;
    }; 
    $.fn.toggleClick = function() {
        var methods = arguments; // Store the passed arguments for future reference
        var count = methods.length; // Cache the number of methods 

        // Use return this to maintain jQuery chainability
        // For each element you bind to
        return this.each(function(i, item) {
            // Create a local counter for that element
            var index = 0;

            // Bind a click handler to that element
            $(item).on('click', function() {
                // That when called will apply the 'index'th method to that element
                // the index % count means that we constrain our iterator between 0
                // and (count-1)
                return methods[index++ % count].apply(this, arguments);
            });
        });
    }; 
    /*
    Get width of window, exact
    */
    $.getWidth = function() {
        return Math.max($(window).width(), window.innerWidth);
    }

    /*
    Hilight navigation
    */
    $.fn.navigationHilight = function() {

        if(!$(".current-menu-item").length)
            $(".submenu").addClass("current-menu-item");
        
        var $el, leftPos, newWidth,
            $mainNav = this;
        var time = 500;

        if(!$('.line').length){
            var $magicLine = $("<div class='line'></div>");
            $mainNav.append($magicLine);
        }else
            var $magicLine = $(".line");

        $magicLine
            .width($(".current-menu-item").width())
            .css({
                "left": $(".current-menu-item a").position().left,
            })
            .data("origLeft", $magicLine.position().left)
            .data("origWidth", $magicLine.width());

        if ($mainNav.find(".current-menu-item").length)
            $magicLine.fadeIn(time);
        else
            $magicLine.fadeOut(time);

        $mainNav.find("li a").hover(function() {

            if($(this).parent().hasClass("logo"))
                return;

            $el = $(this); 
            leftPos = $el.position().left;

            newWidth = $el.parent().width();
            $magicLine.stop().animate({
                left: leftPos,
                width: newWidth
            });
        }, function() {
            $magicLine.stop().animate({
                left: $magicLine.data("origLeft"),
                width: $magicLine.data("origWidth")
            });
        });
    };


    /*
    Make navigation offset
    */  
    $.fn.navigationTransparent = function() {

        var nav = this;
        var admin = 0;
        if ($("#wpadminbar").length)
            admin = parseInt($("#wpadminbar").css('height'), 10);

        var content = $('#content');
        var origOffsetY =  admin;

        var top = nav.css("top");

        if($.getWidth() < devices.iPad.landscape.width)
            nav.removeClass("transparent")
                .css({"top":admin});
                
        function resizeNavbar(input) {
            
            if (input || $.getWidth() < devices.iPad.landscape.width) {
                nav.removeClass("transparent")
                    .css({"top":admin});
            } else if(home){
                nav.addClass("transparent")
                    .css({"top":top});
            } 
        }
        //resizer on scroll
        function scroll() {  
            var fix = $(window).scrollTop() > origOffsetY;
            resizeNavbar(fix);
        }
        document.onscroll = scroll;

        //resizer on screen resize
        $(window).resize(function() {
            var fix = $.getWidth() < devices.iPad.landscape.width;
            resizeNavbar(fix); 
        }); 
    };



})(jQuery);


$(window).load(function() {

      

    /*
    Mobile Menu
    */

    $("#mmenu").mmenu({
        "extensions": [
            "iconbar",
            "pageshadow",
            "theme-dark"
        ],
        "autoHeight": true,
        "counters": true,
        "navbar": {
            "title": sitename
        },
        "searchfield": {
            "add": true,
            "placeholder": "Search"
        },
        "navbars": [{
            "position": "top",
            "content": [
                "searchfield"
            ]
        }, {
            "position": "top"
        }, {
            "position": "bottom",
            "content": [
                 
            ]
        }]
    });
    $("#mmenu").show(); //display menu after scripts are loaded

    var API = $("#mmenu").data("mmenu");
    $("#menu-mobile-button").click(function() {

        API.open();
    });

    /*
    Masonry products
    */
    var $container = $('#js-masonry');
    $container.imagesLoaded(function() {
        $container.masonry({
            isFitWidth: true,
            columnWidth: 250,
            gutter: 10,
            itemSelector: "article"
        });
    });
   
    /*
    Contact form
    */
    $(".page-template-contact-us .wpcf7 p,.woocommerce-cart .wpcf7 p").each(function() {
        var value = $(this).find("input[type=hidden]").val();
        var element = $(this).find("input,textarea");
        element.attr("placeholder", value);
    });
 

    /*
    Flexslider front page
    */
    $('#home-slider').flexslider({
        animation: "slide",
        directionNav: true,
        nextText: ">",
        prevText: "<", 
        start: function(){

            $(".shadow-wrap").addClass('angle-shadow');  

            $(".spinner").hide(); 
        },
    });



    /*
    Hilight and make transparent navigation
    */
    $("#hilight").navigationHilight();
    $("#navbar").navigationTransparent();
    $(window).resize(function() {
        $("#hilight").navigationHilight();
        $("#navbar").navigationTransparent();
    });




    /*
    Map resizing for cells to match height
    */ 
    function resizeMap(){

        setTimeout(function(){

            var h = $('#map-img').height(); 
            var h = h/20; 
            $('#map .box-wrap .cell').each(function(){

                $(this).css({'height':h});  
            });
        },2000);

    } 
    
    //takes too long
    // $(window).resize(function() {
    //     resizeMap();
    // });

    
    /*
    Map popups
    */

    function searchLands(id){
 
        for(var i in lands){
            if(lands[i].title==id)
                return lands[i];
        } 
        return null;
    }

    currentLand = null;
    function mapPopups(){

        $("body").click(function(){
            if(!$('#map .box-wrap').is(":hover"))
                $("#map-popup").remove();
        });

        var switcherNew = "";
        var switcherOld = "";
        var start = false;
        $("#map .cell").click(function(){
  
            var id = $(this).attr("id");
 
            if(id !== undefined){

                $("#map-popup").remove();
 
                var left = $(this).offset().left-250;
                var top  = $(this).offset().top-220; 
                currentLand = searchLands(id);
                var str = [];

                str+='<div class="map-popup" id="map-popup">';
                    str+='<div class="left">';
                        str+='<img src="http://starlight.com/wp-content/themes/starlight/images/slider/1.jpeg">';
                    str+='</div>';
                    str+='<div class="right">';
                        str+='<h6>Property Name: '+currentLand.title+'</h6>';
                        if(currentLand.price!='') 
                            str+='<span class="price">'+currentLand.price+'$</span>';
                        if(currentLand.excerpt!='') 
                            str+='<p>'+currentLand.excerpt+'</p>';
                        str+='<span class="pick" id="pick">pick</span>';
                    str+='</div>';
                    str+='<div class="triangle-with-shadow"></div>';
                str+='</div>';
      
                $("#map").after(str); 
                $("#map-popup").css({
                    left:left,
                    top:top
                });

                $("#map #land-name").html('Property Name: '+currentLand.title);
                $("#map #land-price").html(currentLand.price);
                $("#map #land-text").html(currentLand.excerpt);
                $("#map #land-button").css({display:"block"});
                // $("#map #land-img").attr("src","");

                $("#pick, #map #land-button").click(function(e){

                    e.preventDefault();
                    // location.href="/"+currentLand.title 

                    var q = $.getQuoteParameters();
                    q.land = currentLand.title;
                    q.quote = "model";
                    var url = $.getQuoteUrl(q);
                    location.href = url; 
                });
            }  
        });
  
    }mapPopups();

    

    /*
    Picks for model page
    */ 
    function initiateModelPicks(){

        $("#picks-wrap > div").first().addClass("picks-wrap-pick").initiateModelSlider();;
        $("#picks > div").first().addClass("picked");
          
        var model = null; 

        $("#picks .pick").each(function(){
 
            $(this).click(function(){
    
                for(i in models){ 
                    if(models[i].ID==$(this).attr("id")){
                        model = models[i];  
                    }
                }

                if(model!=null){

                    $("#picks .pick").removeClass("picked");
                    $(this).addClass("picked");

                    $("#picks-wrap > div").each(function(){
                          
                        if($(this).attr("id")==model.ID)
                            $(this).addClass("picks-wrap-pick").initiateModelSlider();
                        else
                            $(this).removeClass("picks-wrap-pick");

                    }); 
                }
            });
        }); 
    }
    /*
    Picks for facade page
    */ 
    function initiateFacadePicks(){

        $("#picks-wrap > div").first().addClass("picks-wrap-pick").initiateModelSlider();;
        $("#picks > div").first().addClass("picked");
          
        var model = null; 

        $("#picks .pick").each(function(){
 
            $(this).click(function(){
    
                for(i in models){ 
                    if(models[i].ID==$(this).attr("id")){
                        model = models[i];  
                    }
                }

                if(model!=null){

                    $("#picks .pick").removeClass("picked");
                    $(this).addClass("picked");

                    $("#picks-wrap > div").each(function(){
                          
                        if($(this).attr("id")==model.ID)
                            $(this).addClass("picks-wrap-pick").initiateModelSlider();
                        else
                            $(this).removeClass("picks-wrap-pick");

                    }); 
                }
            });
        }); 
    }



    /*
    Quote button - initiate land page
    */ 

    function initQuotePage(loc){
        
        $("#start-quote").hide();

        $(".quote-breadcrumb").css({"display":"block"}).animate({
            opacity:1
        },1000); 

        $("#quote-icons").html($.spinnerWhite());
        
        var q = $.getQuoteParameters();
        var p = "";

        if(q!=null)
            if(q.quote=="model")
                p = q.land;
            else if(q.quote=="facade")
                p = q.model;
            else if(q.quote=="settings")
                p = q.settings;

        console.log(p);  
        $.ajax({  
            type: 'POST',  
            url: admin,  
            data: { action : loc, parameter : p },  
            success: function(data){   
                $("#quote-icons").removeClass("quote-icons").html(data);
                mapPopups();
                resizeMap();

                if(q.quote == "model"){
                    initiateModelPicks();
                    // initiateModelSlider();
                }else if(q.quote == "facade"){
                    initiateFacadePicks();

                }
            },
            error: function(MLHttpRequest, textStatus, errorThrown){  
                alert(errorThrown);  
            }  
        }); 
    }



    /*
    If we click on the quote or land on the page 
    with #land hash present, load up the map
    */ 
    $("#start-quote").click(function(){

        initQuotePage("land"); 
    }); 

    var q = $.getQuoteParameters();
 
    if(q != null){
  
        $(".quote-breadcrumb").find(".current").removeClass("current");
        $(".quote-breadcrumb").find("."+q.quote).addClass("current"); 

        if(q.quote=="land")  
            initQuotePage("land");  
        else if(q.quote=="model")  
            initQuotePage("model");   
        else if(q.quote=="facade")  
            initQuotePage("facade");  
        else if(q.quote=="settings")  
            initQuotePage("settings");  
    }    
});
