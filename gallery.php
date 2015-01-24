<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Welcome to BIT MUN 2014</title>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" href="slider/gallery.css" type="text/css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jqueryui.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="slider/gallery.js"></script>
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
	<li><a href="#">APPLY</a>
	<ul class="sub-nav">
	<li><a href="/applydelegate.php">DELEGATE</a></li>
	<li><a href="/applyip.php">INTERNATIONAL PRESS</a></li>
	</ul>
	</li>
	<li><a href="/secretariat.php">SECRETARIAT</a></li>
	<li><a href="/gallery.php" class="active">GALLERY</a></li>
	<li><a href="/contact.php">CONTACT US</a></li>
</ul>
<div style="clear:left;"></div>
</div>
</div>
<div id="slider-container">
<div id="slider">
<img src="img/1.JPG"/>
<img src="img/2.JPG"/>
<img src="img/4.JPG"/>
<img src="img/5.JPG"/>
<img src="img/6.JPG"/>
<img src="img/7.JPG"/>
</div>

<div id="thumbs">
	<div class="thumb"><img src="img/thumb1.jpg" /></div>
	<div class="thumb"><img src="img/thumb2.jpg" /></div>
	<div class="thumb"><img src="img/thumb4.jpg" /></div>
	<div class="thumb"><img src="img/thumb5.jpg" /></div>
	<div class="thumb"><img src="img/thumb1.jpg" /></div>
	<div class="thumb"><img src="img/thumb2.jpg" /></div>
	<div class="thumb"><img src="img/thumb3.jpg" /></div>
</div>

</div>
<div id="footer-container">
<div id="footer">
</div>
</div>

</body>
</html>