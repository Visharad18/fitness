<!doctype html>
<html lang="en">
<head>
	<!-- Meta data -->
	<meta charset="utf=8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<!-- Title -->
	<title>Outrun</title>
	
	<!-- CSS -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' />
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="css/leanModal.css" rel='stylesheet' type='text/css' />
	
	<link href="css/styles.css" rel='stylesheet' type='text/css' />
	
	<link href="css/forms.css" rel='stylesheet' type='text/css' />
	
	<!-- JS -->
	<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	
	<script src="js/leanModal.min.js" type="text/javascript"></script>
	<script src="js/parallax.js" type="text/javascript"></script>
	
	<script src="js/navbar.js" type="text/javascript"></script>
	<script src="js/forms.js" type="text/javascript"></script>
	
	<!-- Script for parallax effect -->
	<script type="text/javascript">
      $(function(){
        if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {
          $('#ios-notice').removeClass('hidden');
          $('.parallax-container').height( $(window).height() * 0.5 | 0 );
        } else {
          $(window).resize(function(){
            var parallaxHeight = Math.max($(window).height() * 0.7, 200) | 0;
            $('.parallax-container').height(parallaxHeight);
          }).trigger('resize');
        }
      });
    </script>
	
	<!-- Scroll to top when page loads -->
	<script type="text/javascript">
	$(window).load(function()
	{
		$("html, body").animate({scrollTop: 0}, 1000);
	});
	</script>
	
</head>
<body>
	<header>
		<!-- Navbar -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand">Outrun</a>
				</div>
				<div class="navbar-collapse collapse" id="navbar" >
					<ul class="nav navbar-nav" id="menu">
						<li><a href="#welcome">Welcome</a></li>
						<li><a href="#features">Features</a></li>
						<li><a href="#join">Join</a></li>
						<li><a href="#contact">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a id="dialog" href="#login">Login</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
</body>
</html>