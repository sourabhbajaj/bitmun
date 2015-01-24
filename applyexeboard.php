<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Welcome to BIT MUN 2014</title>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jqueryui.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/form.js"></script>
<link rel="stylesheet" href="css/countdown.css" type="text/css"/>
<script type="text/javascript" src="js/jquery.plugin.js"></script>
<script type="text/javascript" src="js/jquery.countdown.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var date=new Date();
	date.setFullYear(2014, 2, 29);
	date.setHours(10, 0, 0, 0);
	$("#footer").countdown({until:date});
});
</script>

</head>
<body>
<div id="header-container">
<div id="header">
<div id="title">BIT MUN 2014</div>
<div id="sub-title">&nbsp;29TH-30TH MARCH, 2014</div>

<div style="clear:left;"></div>
<ul id="nav">
	<li><a href="/">HOME</a></li>
	<li><a href="/about.php">ABOUT</a></li>
	<li><a href="#">COMMITTEE</a>
	<ul class="sub-nav">
	<li><a href="/unhrc.php">UNHRC</a></li>
	<li><a href="/nato.php">NATO</a></li>
	</ul>
	</li>
	<li><a href="#" class="active">APPLY</a>
	<ul class="sub-nav">
	<li><a href="/applydelegate.php">DELEGATE</a></li>
	<li><a href="/applyip.php">INTERNATIONAL PRESS</a></li>
	</ul>
	</li>
	<li><a href="/secretariat.php">SECRETARIAT</a></li>
	<li><a href="/gallery.php">GALLERY</a></li>
	<li><a href="/contact.php">CONTACT US</a></li>
</ul>
<div style="clear:left;"></div>
</div>
</div>
<div class="content-wrappper black">
	<div class="content-left" style="min-height:500px;">
	<h2>Applications for executive board are closed.</h2>
<!--	<form name="eb-application-form" id="eb-application-form" class="application-form" action="#" method="post">
	<input type="hidden" name="type" value="eb"/>
	<table id="application-form-table">
	<tr><th>Name : </th><td><input type="text" name="name" class="input-box"/></td></tr>
	<tr><th>&nbsp;</th><td><input type="radio" name="gender" value="0" style="display:inline;"/><label for="male"  style="display:inline;">Male</label><input type="radio" name="gender" value="1" style="display:inline;"/><label for="female" style="display:inline;">Female</label></td></tr>
	<tr><th>Institute Full Name : </th><td><input type="text" name="institute" class="input-box"/><br/>
	(Example: Birla Institute of Technology, Jaipur)
	</td></tr>
	<tr><th>Committee Preference :</th><td><input type="radio" name="committee" value="nato" style="display:inline;"/><label for="nato"  style="display:inline;">NATO</label><input type="radio" name="committee" value="unhrc" style="display:inline;"/><label for="unhrc" style="display:inline;">UNHRC</label></td></tr>
	<tr><th>Contact Number : </th><td><input type="text" name="number" class="input-box"/></td></tr>
	<tr><th>Email : </th><td><input type="text" name="email" class="input-box"/><br/>(Example: name@example.com)</td></tr>
	<tr><th>No. of MUNs Attended : </th><td><input type="text" name="muncount" class="input-box"/></td></tr>
	<tr><th>MUN Experience : <br/>
	(Please state council, <br/>country and awards won, if any.)
	</th><td><textarea name="exp" class="input-box">Elaborate in max 600 characters. </textarea></td></tr>
	<tr><td>&nbsp;</td><td><input type="submit" name="submit" value="Submit" class="input-box"/></td></tr>
	</table>
	</form>-->
	</div>
	<div class="content-right"></div>
	<div style="clear:left;"></div>
	<div style="clear:right;"></div>
</div>
<div id="footer-container">
<div id="footer">
</div>
</div>

</body>
</html>