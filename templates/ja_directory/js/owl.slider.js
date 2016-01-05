(function($){
    $.fn.owlSlider = function(options) {
      return this.each( function() {
        var $slider = $(this);
        // detect options
        var data = $slider.data(),
            dataOptions = {};
        for (var option in data) {
          if ((matches = option.match(/^option(.*)$/))) {
            dataOptions[matches[1].toLowerCase()] = data[option];
          }
        }
        var settings = $.extend(options, dataOptions, {
            items: 1,
            autoWidth: true,
            loop: false,
            onRefreshed: function () {
              this.$stage.width(this.$stage.width() + this.$element.width());
            }
          });

        $slider.owlCarousel(settings).on('change.owl.carousel', function (event) {
          // check and move one page each time, auto align the position of the next first item
          if (event.property.name != 'position') return;
          var $owl = $(this).data('owlCarousel'),
            position = event.property.value,
            current = $owl.current(),
            direction = position > current,
            width = $owl.$element.width(),
            i = current, _width = 0, max = $owl.maximum(true);
          if (position > current) {
            // move next
            while (i <= max && _width <= width) {
              _width += $owl.items(i++).width();
            }
            if (_width > width) {
              // update new position
              if (i-1 > position) {
                event.data = i - 1;
              }
            } else {
              // no items available
              event.data = current;
            }
          } else {
            while (i > 0 && _width <= width) {
              _width += $owl.items(--i).width();
            }
            if (i < position) {
              event.data = _width > width ? i+1 : i;
            }
          }
        });
      });
    };

    // auto init
    $(document).ready(function () {
      $('.owl-slider').owlSlider();
    });
})(jQuery);
