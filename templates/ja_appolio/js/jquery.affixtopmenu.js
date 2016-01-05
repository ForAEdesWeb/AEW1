/** 
 *------------------------------------------------------------------------------
 * @package       T3 Framework for Joomla!
 *------------------------------------------------------------------------------
 * @copyright     Copyright (C) 2004-2013 JoomlArt.com. All Rights Reserved.
 * @license       GNU General Public License version 2 or later; see LICENSE.txt
 * @authors       JoomlArt, JoomlaBamboo, (contribute to this project at github 
 *                & Google group to become co-author)
 * @Google group: https://groups.google.com/forum/#!forum/t3fw
 * @Link:         http://t3-framework.org 
 *------------------------------------------------------------------------------
 */ 
;(function( $ ){
	
	$.fn.affixmenu = function() {
		return this.each(function(){
			var $this = $(this),
				lastpos = $(window).scrollTop(),
				update = function(){
				
				//ignore when offcanvas open => leave unchanged
				if($(document.body).hasClass('off-canvas-right') || $(document.body).hasClass('off-canvas-left')){
					return false;
				}

				var top = ($this.hasClass('affix') && $this.prev('.hplace').length > 0) ? $this.prev('.hplace').offset().top : $this.offset().top,
					scrolltop = $(window).scrollTop(),
					elmheight = $this.outerHeight(true);

				if(scrolltop < lastpos && lastpos > top + elmheight){
					
					if(!$this.hasClass('affix')){
						$(document.body).addClass('affixmenu-show');
						$this.addClass('affix');

						$this.before($('<div class="hplace clearfix"></div>').css('height', elmheight));
					}

				} else if(scrolltop > lastpos || scrolltop < top) {
					$this.removeClass('affix').prevAll('.hplace').remove();
					$(document.body).removeClass('affixmenu-show');
				}

				lastpos = scrolltop;
			}
			
			$(window).on('scroll resize', update);
			update();
		})
	}

})(jQuery);