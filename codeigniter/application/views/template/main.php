<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>ResumeDB</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
	<script type="text/javascript">
		function updateLabel() {
			var el = document.getElementById('lblUser');
			
			if(document.login_form.user[0].checked) {
				el.innerHTML = "NetID:";
			} else {
				el.innerHTML = "Username:";
			}
		}
	</script>
</head>

<body onload="updateLabel()">
	<div id="wrapper">
		<div id="header"><h1>ResumeDB<span class="beta">beta</span></h1></div>

		<div id="menu">
			<?php echo $menu_content; ?>
		</div>
		
		<div id="main">
			<?php echo $main_content; ?>
		</div>
		
		<div id="footer">
			<p><small>&copy; <?php echo date('Y'); ?> Oliver Cai</small></p>
		</div>
	</div>
</body>
</html>