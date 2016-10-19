/////////////////////////////////////// Document Ready ///////////////////////////////////////


jQuery(document).ready(function(){

	"use strict";

	
	/////////////////////////////////////// Lightbox ///////////////////////////////////////


	jQuery("div.gallery-item .gallery-icon a").attr("rel", "prettyPhoto[gallery]");

	jQuery("a[rel^='prettyPhoto']").prettyPhoto({
		theme: 'dark_square',
		deeplinking: false,
		social_tools: ''
	});


	/////////////////////////////////////// Transform Select Drop Down Forms ///////////////////////////////////////


	jQuery("#dropdown-filter").show();
	jQuery(".order-by-form").jqTransform();
	jQuery(".order-form").jqTransform();

	jQuery(".order-by-form .jqTransformSelectWrapper ul li a").click(function(){
		var index = jQuery(this).attr('index');
		var value = jQuery('.order-by-form select.jqTransformHidden option:eq('+index+')').attr('value');
		window.location.href=value;
	});

	jQuery(".order-form .jqTransformSelectWrapper ul li a").click(function(){
		var index = jQuery(this).attr('index');
		var value = jQuery('.order-form select.jqTransformHidden option:eq('+index+')').attr('value');
		window.location.href=value;
	});


	/////////////////////////////////////// Back To Top ///////////////////////////////////////


	jQuery(".back-to-top").click(function() {
		jQuery("html, body").animate({ scrollTop: 0 }, 'slow');
	});


	/////////////////////////////////////// Tabs ///////////////////////////////////////


	jQuery(".sc-tabs").tabs({
		fx: {
			height: 'toggle',
			opacity: 'toggle',
			duration: 'normal'
		}
	});	

	jQuery("li.no-tab-link a").unbind('click').each(function() {
		jQuery.data('href.tabs', '');
	});

	jQuery('.layout-3 #review-links').appendTo('#review-container');


	/////////////////////////////////////// Prevent Empty Search - Thomas Scholz http://toscho.de ///////////////////////////////////////


	(function($) {
		$.fn.preventEmptySubmit = function(options) {
			var settings = {
				inputselector: "#searchbar",
				msg          : gp_script.emptySearchText
			};
			if (options) {
				$.extend(settings, options);
			}
			this.submit(function() {
				var s = $(this).find(settings.inputselector);
				if(!s.val()) {
					alert(settings.msg);
					s.focus();
					return false;
				}
				return true;
			});
			return this;
		};
	})(jQuery);

	jQuery('#searchform').preventEmptySubmit();


});