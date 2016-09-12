jQuery(document).ready(function($) {
	
	// .update-nag dismiss
	$('.bx-updater-hide').click(function( event ) {
        var ask = confirm(
            'This notification will be hidden for the next 72 hours.\n\n' +
            'You can disable it forever from Customizer > Settings > Notifications\n' +
            'by checking "Disable Update Notification".'
        );

        if ( ! ask ) return;

        $('.bx-theme-updater').remove();

        var data = {
            type: 'theme-notification-hide',
            action: 'businessx_updater',
            value: 'businessx_update_theme_hide'
        };

        $.post( ajaxurl, data );
		
		event.preventDefault();
    });
	
	
	// close inactive widgets panel
	$('.orphan-sidebar, .inactive-sidebar').addClass('closed');
	
});