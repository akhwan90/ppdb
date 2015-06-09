<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta content='text/html; charset=iso-8859-1' http-equiv='Content-type' />
<meta content='width=330, height=400, initial-scale=1' name='viewport' />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>:: Login Administrator ::</title>
<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$.validator.setDefaults({
		submitHandler: function() { login(); },
	});
	
	$().ready(function() {
		// validate the comment form when it is submitted
		$("#loginF").validate();
	});
	
	function login(){  
		$("#loading").html('loading...');  
		
		$.post('loginAksi.php', $("form").serialize(), function(hasil){  
		$('form input[type="text"],form input[type="password"],form select,form textarea').val('');
		$("#loading").html(hasil);
    });  
} 
</script>
<link href="css/login.css" media="screen" rel="stylesheet" type="text/css" />
</head>

<body style='min-height:380px'>

<div class='layout' id='page'>
<div class='centered'>
<div class='column' style='margin-top:-174px'>
<div class='login_page preserve_links'>
<div class='login_frame flexible'>
<div class='top'></div>

<div class='middle'>
<div id="loading" style="text-align: center"></div>
<form class="onboard_form" id="loginF" action="" method="post">

<div style="margin:0;padding:0"></div>

<div class='field text_field'>
<label for="email">Username</label>
</div>
<div class='another_row'>
<input id="username" name="username" autofocus tabindex="1" type="text" class="required ui-widget-content"/>
</div>

<div class='field text_field'>
<label for="password">Password</label>
</div>
<div class='one_more_row'>
<input id="password" name="password" tabindex="2" type="password" value="" class="required ui-widget-content"/>
</div>


<div class='actions'>
<div class="right gistsubmit"><input name="commit" type="submit" value="Sign In" /></div>
</div>

<div class="clear"></div>
</form>
</div>
<div class='bottom'></div>
<div style="text-align: center">Aplikasi PSB 3.0 &copy; akhwanSOFT</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
