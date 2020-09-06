jQuery(document).ready(function($){
    $('#image-gallery').lightSlider({
        gallery:true,
        item:1,
        thumbItem:6,
        slideMargin: 0,
        speed:500,
        auto:false,
        loop:true,
        onSliderLoad: function() {
            $('#image-gallery').removeClass('cS-hidden');
        }  
    });
            
    $('#vertical').lightSlider({
      gallery:true,
      item:1,
      vertical:true,
      verticalHeight:500,
       adaptiveHeight:true,
      thumbItem:6,
      thumbMargin:4,
      slideMargin:0
    }); 
    
    $('#without-thumb').lightSlider({
      gallery:false,
      item:1,
      slideMargin:0,
      pager:false,
    }); 
    
    $('.without-thumb').lightSlider({
      gallery:false,
      item:1,
      slideMargin:0,
      pager:false,
    }); 
    
    $('#carousel-gallery').lightSlider({
      gallery:false,
      item:4,
      slideMargin:10,
      pager:true,
    });
    
     $('#grid-cat-edd').lightSlider({
      gallery:false,
      item:7,
      slideMargin:10,
      pager:false,
      
    });
    
    var slider = $("#carousel-testimonial").lightSlider({
       onBeforeStart: function (el) {
    var maxHeight = 0,
        container = $(el),
        children = container.children();

    children.each(function () {
        var childHeight = $(this).height();
        if (childHeight > maxHeight) {
            maxHeight = childHeight;
        }
    });
    container.height(maxHeight);
},
 onSliderLoad: function (el) {
    var maxHeight = 0,
        container = $(el),
        children = container.children();

    children.each(function () {
        var childHeight = $(this).height();
        if (childHeight > maxHeight) {
            maxHeight = childHeight;
        }
    });
    container.height(maxHeight);
},

  onAfterSlide: function (el) {
    var maxHeight = 0,
        container = $(el),
        children = container.children();

    children.each(function () {
        var childHeight = $(this).height();
        if (childHeight > maxHeight) {
            maxHeight = childHeight;
        }
    });
    container.height(maxHeight);
},

  onBeforeSlide: function (el) {
    var maxHeight = 0,
        container = $(el),
        children = container.children();

    children.each(function () {
        var childHeight = $(this).height();
        if (childHeight > maxHeight) {
            maxHeight = childHeight;
        }
    });
    container.height(maxHeight);
},
adaptiveHeight:true,
          controls: false,
          gallery:false,
            item:3,
            loop:true,
            slideMove:1,
            easing: "cubic-bezier(0.25, 0, 0.25, 1)",
            responsive : [
            {
                breakpoint:800,
                settings: {
                    item:2,

                  }
            },
            {
                breakpoint:480,
                settings: {
                    item:1,
                  }
            }
        ]
        });
        $('.slideControls .slidePrev').click(function() {
            slider.goToPrevSlide();
        });

        $('.slideControls .slideNext').click(function() {
            slider.goToNextSlide();
        });
});