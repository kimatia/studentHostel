$(document).ready(function(){
	$('#user_check').blur(function(){
		var query_string = $(this).val();
		if(query_string.length>3)
		{
			$.ajax({
				type: "POST",
				url: "user_valid.php",
				data: { name:query_string },
				success: function(data)
				{
					if(data=='exist')
					{
						$('#result_user').html('Username already exist');
						$('#login-submit').attr('disabled', 'disabled');
					}
					else
					{
						$('#result_user').html(query_string+' is valid username');
					}				
				}
			});
		}
	});
	
	$('#email_check').blur(function(){
		var query_string = $(this).val();
		if(query_string.length>6)
		{
			var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			if (!(filter.test(query_string))) {
				$('#result_email').html('Email Invalid');
				return false;
			}
			
			$.ajax({
				type: "POST",
				url: "email_valid.php",
				data: { name:query_string },
				success: function(data)
				{
					if(data=='exist')
					{
						$('#result_email').html('Email already exist');
						$('#login-submit').attr('disabled', 'disabled');
					}
					else
					{
						$('#result_email').html(query_string+' is valid email');
						$('#login-submit').removeAttr('disabled');
					}				
				}
			});
		}
	});
});