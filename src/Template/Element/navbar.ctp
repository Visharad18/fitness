<!doctype html>
<html lang="en">
<head>
	<!-- Meta data -->
	<meta charset="utf=8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<!-- Title -->
	<title>Sculpex</title>
	
	<!-- CSS -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' />
	<link href="/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	
	<link href="/css/leanModal.css" rel='stylesheet' type='text/css' />
	
	<link href="/css/circle-progress.css" rel='stylesheet' type='text/css' />	
	
	<link href="/css/styles.css" rel='stylesheet' type='text/css' />
	<link href="/css/dashboard.css" rel='stylesheet' type='text/css' />
	<link href="/css/forms.css" rel='stylesheet' type='text/css' />
	
	<!-- JS -->
	<script src="/js/jquery-2.1.4.min.js" type="text/javascript"></script>
	<script src="/js/bootstrap.min.js" type="text/javascript"></script>
	
	<script src="/js/leanModal.min.js" type="text/javascript"></script>
	<script src="/js/parallax.js" type="text/javascript"></script>
	
	<script src="/js/circle-progress.js" type="text/javascript"></script>
	<script src="/js/modules.js" type="text/javascript"></script>
	
	<script src="/js/navbar.js" type="text/javascript"></script>
	<script src="/js/forms.js" type="text/javascript"></script>
	
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

	<style>
		* {box-sizing: border-box;}
		body {font-family: Verdana, sans-serif;}
		.mySlides {display: none;}
		img {vertical-align: middle;}

		/* Slideshow container */
		.slideshow-container {
		  max-width: 1000px;
		  position: relative;
		  margin: auto;
		}

		/* Caption text */
		.text {
		  color: #f2f2f2;
		  font-size: 15px;
		  padding: 8px 12px;
		  position: absolute;
		  bottom: 8px;
		  width: 100%;
		  text-align: center;
		}

		/* Number text (1/3 etc) */
		.numbertext {
		  color: #f2f2f2;
		  font-size: 12px;
		  padding: 8px 12px;
		  position: absolute;
		  top: 0;
		}

		/* The dots/bullets/indicators */
		.dot {
		  height: 15px;
		  width: 15px;
		  margin: 0 2px;
		  background-color: #bbb;
		  border-radius: 50%;
		  display: inline-block;
		  transition: background-color 0.6s ease;
		}

		.active {
		  background-color: #717171;
		}

		/* Fading animation */
		.fade {
		  -webkit-animation-name: fade;
		  -webkit-animation-duration: 1.5s;
		  animation-name: fade;
		  animation-duration: 1.5s;
		}

		@-webkit-keyframes fade {
		  from {opacity: .4} 
		  to {opacity: 1}
		}

		@keyframes fade {
		  from {opacity: .4} 
		  to {opacity: 1}
		}

		/* On smaller screens, decrease text size */
		@media only screen and (max-width: 300px) {
		  .text {font-size: 11px}
		}
		</style>
	
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
					<a class="navbar-brand">Sculpex</a>
				</div>
				<div class="navbar-collapse collapse" id="navbar" >
					<ul class="nav navbar-nav" id="menu">
						<li><a href="/edit">Edit Profile</a></li>
						<li><a href="/sessions/add">Book a Session</a></li>
						<li><a href="/sessions/">My Sessions</a></li>
						<li><a href="/recipes/">Recipes</a></li>
						<li><a href="/products/">Products</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li style="padding-top: 10px;"><?= $this->Html->image('uploads/users/'.$image,['height'=>'80px','width'=>'65px','alt'=>'Profile Picture'])?></li>
						<li><?php echo $this->Html->link('Logout' , ['controller' => 'Logins', 'action' => 'logout', '_full' => true]); ?> Logout</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	
		
</body>
</html>