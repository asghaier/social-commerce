(function ($) {

  /**
   * The recommended way for producing HTML markup through JavaScript is to write
   * theming functions. These are similiar to the theming functions that you might
   * know from 'phptemplate' (the default PHP templating engine used by most
   * Drupal themes including Omega). JavaScript theme functions accept arguments
   * and can be overriden by sub-themes.
   *
   * In most cases, there is no good reason to NOT wrap your markup producing
   * JavaScript in a theme function.
   */
  Drupal.theme.prototype.beardedExampleButton = function (path, title) {
    // Create an anchor element with jQuery.
    return $('<a href="' + path + '" title="' + title + '">' + title + '</a>');
  };

  /**
   * Behaviors are Drupal's way of applying JavaScript to a page. In short, the
   * advantage of Behaviors over a simple 'document.ready()' lies in how it
   * interacts with content loaded through Ajax. Opposed to the
   * 'document.ready()' event which is only fired once when the page is
   * initially loaded, behaviors get re-executed whenever something is added to
   * the page through Ajax.
   *
   * You can attach as many behaviors as you wish. In fact, instead of overloading
   * a single behavior with multiple, completely unrelated tasks you should create
   * a separate behavior for every separate task.
   *
   * In most cases, there is no good reason to NOT wrap your JavaScript code in a
   * behavior.
   *
   * @param context
   *   The context for which the behavior is being executed. This is either the
   *   full page or a piece of HTML that was just added through Ajax.
   * @param settings
   *   An array of settings (added through drupal_add_js()). Instead of accessing
   *   Drupal.settings directly you should use this because of potential
   *   modifications made by the Ajax callback that also produced 'context'.
   */
  Drupal.behaviors.beardedExampleBehavior = {
    attach: function (context, settings) {

      $.fn.rotateRight = function(angle, duration, easing, complete) {
        return this.each(function() {
          var $elem = $(this);
          $({deg: 0}).animate({deg: 90}, {
            duration: 10,
            easing: easing,
            step: function(now) {
              $elem.css({
                transform: 'rotate(' + now + 'deg)'
              });
            },
            complete: complete || $.noop
          });
        });
      };
      $.fn.rotateLeft = function(angle, duration, easing, complete) {
        return this.each(function() {
          var $elem = $(this);
          $({deg: 90}).animate({deg: 0}, {
            duration: 10,
            easing: easing,
            step: function(now) {
              $elem.css({
                transform: 'rotate(' + now + 'deg)'
              });
            },
            complete: complete || $.noop
          });
        });
      };
      $("#menu-toggle").click(function() {
        if ($('.menu-items').hasClass('active')) {
          $('#menu-toggle').rotateLeft();
          $('.menu-items').removeClass("active");
        } else {
          $('#menu-toggle').rotateRight();
          $('.menu-items').addClass("active");
        }
      });
      var navbarpos = $('.l-region--navigation').offset();
      $(window).scroll(function(){
        if($(window).scrollTop() > navbarpos.top){
          $('.l-region--navigation').addClass("navbar-sticky");
        } else {
          $('.l-region--navigation').removeClass("navbar-sticky");
        }
      });
    }
  };

  Drupal.behaviors.cartBlockPositioning = {
    attach: function (context, settings) {
      $(window).load(function () {
        $( "#cart-block-contents" ).position({
          my: "right top",
          at: "right bottom",
          of: ".cart-block--summary"
        });
        $('#cart-block-contents').hide();
        $("#cart-block-contents").css({"visibility": "visible"});
      });
    }
  };

})(jQuery);
