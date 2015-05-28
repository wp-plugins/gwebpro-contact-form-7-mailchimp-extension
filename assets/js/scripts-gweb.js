jQuery(document).ready(function() {
	try {
		
		if (! jQuery('#wpcf7-mailchimp-cf-active').is(':checked'))
			jQuery('.mailchimp-custom-fields').hide();

		jQuery('#wpcf7-mailchimp-cf-active').click(function() {
			if (jQuery('.mailchimp-custom-fields').is(':hidden')
			&& jQuery('#wpcf7-mailchimp-cf-active').is(':checked')) {
				jQuery('.mailchimp-custom-fields').slideDown('fast');
			} else if (jQuery('.mailchimp-custom-fields').is(':visible')
			&& jQuery('#wpcf7-mailchimp-cf-active').not(':checked')) {
				jQuery('.mailchimp-custom-fields').slideUp('fast');
			}
		});

	} catch (e) {
	}
});