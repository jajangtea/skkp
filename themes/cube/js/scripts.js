jQuery(function(jQuery) {
	setTimeout(function() {
		jQuery('#content-wrapper > .row').css({
			opacity: 1
		});
	}, 200);
	
	jQuery('#sidebar-nav,#nav-col-submenu').on('click', '.dropdown-toggle', function (e) {
		e.preventDefault();
		
		var $item = jQuery(this).parent();

		if (!$item.hasClass('open')) {
			$item.parent().find('.open .submenu').slideUp('fast');
			$item.parent().find('.open').toggleClass('open');
		}
		
		$item.toggleClass('open');
		
		if ($item.hasClass('open')) {
			$item.children('.submenu').slideDown('fast');
		} 
		else {
			$item.children('.submenu').slideUp('fast');
		}
	});
	
	jQuery('body').on('mouseenter', '#page-wrapper.nav-small #sidebar-nav .dropdown-toggle', function (e) {
		if (jQuery( document ).width() >= 992) {
			var $item = jQuery(this).parent();

			if (jQuery('body').hasClass('fixed-leftmenu')) {
				var topPosition = $item.position().top;

				if ((topPosition + 4*jQuery(this).outerHeight()) >= jQuery(window).height()) {
					topPosition -= 6*jQuery(this).outerHeight();
				}

				jQuery('#nav-col-submenu').html($item.children('.submenu').clone());
				jQuery('#nav-col-submenu > .submenu').css({'top' : topPosition});
			}

			$item.addClass('open');
			$item.children('.submenu').slideDown('fast');
		}
	});
	
	jQuery('body').on('mouseleave', '#page-wrapper.nav-small #sidebar-nav > .nav-pills > li', function (e) {
		if (jQuery( document ).width() >= 992) {
			var $item = jQuery(this);
	
			if ($item.hasClass('open')) {
				$item.find('.open .submenu').slideUp('fast');
				$item.find('.open').removeClass('open');
				$item.children('.submenu').slideUp('fast');
			}
			
			$item.removeClass('open');
		}
	});
	jQuery('body').on('mouseenter', '#page-wrapper.nav-small #sidebar-nav a:not(.dropdown-toggle)', function (e) {
		if (jQuery('body').hasClass('fixed-leftmenu')) {
			jQuery('#nav-col-submenu').html('');
		}
	});
	jQuery('body').on('mouseleave', '#page-wrapper.nav-small #nav-col', function (e) {
		if (jQuery('body').hasClass('fixed-leftmenu')) {
			jQuery('#nav-col-submenu').html('');
		}
	});
	
	jQuery('#make-small-nav').click(function (e) {
		jQuery('#page-wrapper').toggleClass('nav-small');
	});
	
	jQuery(window).smartresize(function(){
		if (jQuery( document ).width() <= 991) {
			jQuery('#page-wrapper').removeClass('nav-small');
		}
	});
	
	jQuery('.mobile-search').click(function(e) {
		e.preventDefault();
		
		jQuery('.mobile-search').addClass('active');
		jQuery('.mobile-search form input.form-control').focus();
	});
	jQuery(document).mouseup(function (e) {
		var container = jQuery('.mobile-search');

		if (!container.is(e.target) // if the target of the click isn't the container...
			&& container.has(e.target).length === 0) // ... nor a descendant of the container
		{
			container.removeClass('active');
		}
	});
	
	jQuery('.fixed-leftmenu #col-left').nanoScroller({
    	alwaysVisible: false,
    	iOSNativeScrolling: false,
    	preventPageScrolling: true,
    	contentClass: 'col-left-nano-content'
    });
	
	// build all tooltips from data-attributes
	jQuery("[data-toggle='tooltip']").each(function (index, el) {
		jQuery(el).tooltip({
			placement: jQuery(this).data("placement") || 'top'
		});
	});
});

jQuery.fn.removeClassPrefix = function(prefix) {
    this.each(function(i, el) {
        var classes = el.className.split(" ").filter(function(c) {
            return c.lastIndexOf(prefix, 0) !== 0;
        });
        el.className = classes.join(" ");
    });
    return this;
};

(function(jQuery,sr){
	// debouncing function from John Hann
	// http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
	var debounce = function (func, threshold, execAsap) {
		var timeout;

		return function debounced () {
			var obj = this, args = arguments;
			function delayed () {
				if (!execAsap)
					func.apply(obj, args);
				timeout = null;
			};

			if (timeout)
				clearTimeout(timeout);
			else if (execAsap)
				func.apply(obj, args);

			timeout = setTimeout(delayed, threshold || 100);
		};
	}
	// smartresize 
	jQuery.fn[sr] = function(fn){	return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

})(jQuery.noConflict(),'smartresize');