
$(document).ready(function() 
{
	$('#login').click(function()
	{
		var username=$("#username").val();
		var password=$("#password").val();
		var response = grecaptcha.getResponse();
		var dataString = 'username='+username+'&password='+password+'&response='+response;
		
		if($.trim(username).length>0 && $.trim(password).length>0)
		{
			$.ajax({
			type: "POST",
			url: "id/login.php",
			data: dataString,
			cache: false,
			beforeSend: function(){ $("#login").val('Logowanie...');},
			success: function(data){
				if(data)
				{
					console.log( data );
					$("#tiny li:eq(0) a").text("Menu");
					if(data == 3)
					{
						if($('.log').length == 0)
							$("#tiny").append("<li class='log right'><a href='?id=id&strona=logout'>Wyloguj</a></li>");
					}
					window.location.href = "/";
				}
				else
				{
					//efekt trzęsienia się strony przy błędnych danych
					$('#box').effect( "shake" );
					$("#login").val('Login')
					$("#error").html("<span style='color:#cc0000'>Błąd:</span> Złe dane logowania. ");
				}
			}
		});

		}
		return false;
	});
});
