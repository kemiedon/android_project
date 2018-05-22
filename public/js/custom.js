(function($) {    
  if ($.fn.style) {
    return;
  }

  // Escape regex chars with \
  var escape = function(text) {
    return text.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&");
  };

  // For those who need them (< IE 9), add support for CSS functions
  var isStyleFuncSupported = !!CSSStyleDeclaration.prototype.getPropertyValue;
  if (!isStyleFuncSupported) {
    CSSStyleDeclaration.prototype.getPropertyValue = function(a) {
      return this.getAttribute(a);
    };
    CSSStyleDeclaration.prototype.setProperty = function(styleName, value, priority) {
      this.setAttribute(styleName, value);
      var priority = typeof priority != 'undefined' ? priority : '';
      if (priority != '') {
        // Add priority manually
        var rule = new RegExp(escape(styleName) + '\\s*:\\s*' + escape(value) +
            '(\\s*;)?', 'gmi');
        this.cssText =
            this.cssText.replace(rule, styleName + ': ' + value + ' !' + priority + ';');
      }
    };
    CSSStyleDeclaration.prototype.removeProperty = function(a) {
      return this.removeAttribute(a);
    };
    CSSStyleDeclaration.prototype.getPropertyPriority = function(styleName) {
      var rule = new RegExp(escape(styleName) + '\\s*:\\s*[^\\s]*\\s*!important(\\s*;)?',
          'gmi');
      return rule.test(this.cssText) ? 'important' : '';
    }
  }

  // The style function
  $.fn.style = function(styleName, value, priority) {
    // DOM node
    var node = this.get(0);
    // Ensure we have a DOM node
    if (typeof node == 'undefined') {
      return this;
    }
    // CSSStyleDeclaration
    var style = this.get(0).style;
    // Getter/Setter
    if (typeof styleName != 'undefined') {
      if (typeof value != 'undefined') {
        // Set style property
        priority = typeof priority != 'undefined' ? priority : '';
        style.setProperty(styleName, value, priority);
        return this;
      } else {
        // Get style property
        return style.getPropertyValue(styleName);
      }
    } else {
      // Get CSSStyleDeclaration
      return style;
    }
  };
})(jQuery);

    new WOW().init();

    var viewport_height = $(window).height();
    var now_top = $(window).scrollTop();

    console.log(viewport_height);
    $(window).scroll(function () {
      now_top = $(window).scrollTop();
      console.log(now_top);

      if (now_top > 300) {
        // console.log('true');
        $('.cover .navbar').style('background-color', 'rgba(0,0,0,0.65)', 'important');
      } else {
        $('.cover .navbar').style('background-color', 'transparent', 'important');
      }
    });

    $('.parent-relative').hover(function () {
      $(this).find('img').css({
        'opacity': '0'
      });
      $(this).find('.children-absolute a').css({
        'opacity': '100'
      });
    }, function () {
      $(this).find('img').css({
        'opacity': '100'
      });
      $(this).find('.children-absolute a').css({
        'opacity': '0'
      });
    });

    //index banner slide
    $('.service-item').slick({
      vertical: true,
      autoplay: true,
      autoplaySpeed: 1500,
      dots: false,
      arrows: false,
    });
    //common page slide
    $('.slider').slick({
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      autoplay: true,
      
      autoplaySpeed: 3000,
      adaptiveHeight: true
    },
    {
      breakpoint: 600,
      settings: {
        arrows: false,
        adaptiveHeight: true

      }
    }
    );

    google.maps.event.addDomListener(window, 'load', init);
    function init() {
      var mapOptions = {
        zoom: 17,
        center: new google.maps.LatLng(24.1628419, 120.6659929), 
        styles: [{
            "stylers": [{
                "hue": "#ff1a00"
              },
              {
                "invert_lightness": true
              },
              {
                "saturation": -100
              },
              {
                "lightness": 33
              },
              {
                "gamma": 0.5
              }
            ]
          },
          {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
              "color": "#2D333C"
            }]
          }
        ]
      };
      var mapElement = document.getElementById('map');
      var map = new google.maps.Map(mapElement, mapOptions);
      var image = 'images/marker.png';
      var marker = new google.maps.Marker({
        position: new google.maps.LatLng(24.1628419, 120.6659929),
        map: map,
        icon: image,
      });
    }
 
    $('.side-list-img>img').height($('.side-list-img').width());

    $('.side-list').hover(function () {
      $(this).find('img').stop().animate({
        'margin-left': '-10px',
        'opacity': '0.5'
      }, 300);
      $(this).find('a').css({
        'color': 'lightgray'
      });

    }, function () {
      $(this).find('img').stop().animate({
        'margin-left': '0px',
        'opacity': '1'
      }, 300);
      $(this).find('a').css({
        'color': 'white'
      });

    });