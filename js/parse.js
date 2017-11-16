'use strict'

$('#google_click').bind('click', function() {
	$.ajax({
		'url':'ajax_google.php',
		'beforeSend': function() {
			$('#empty').html('text');
		},
		'success': function(data) {
			$('#empty').html(data);
		},
		'error': function(data) {
			$('#empty').html(data);
		}

	})
})