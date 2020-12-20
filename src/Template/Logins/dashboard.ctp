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
						<li><?php if($user_type == 'admin')
								echo $this->Hmtl->link('Users',['url'=>'/users']); ?>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li style="padding-top: 10px;"><?= $this->Html->image('uploads/users/'.$image,['height'=>'80px','width'=>'65px','alt'=>'Profile Picture'])?></li>
						<li><?php echo $this->Html->link('Logout' , ['controller' => 'Logins', 'action' => 'logout', '_full' => true]); ?></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	
	<main>
		<!-- Actual page content -->

		<div class="slideshow-container">

		<div class="mySlides fade">
		  <div class="numbertext">1 / 3</div>
		  <img src="/img/1.jpg" style="width:100%">
		  <div class="text">Caption Text</div>
		</div>

		<div class="mySlides fade">
		  <div class="numbertext">2 / 3</div>
		  <img src="/img/2.jpg" style="width:100%">
		  <div class="text">Caption Two</div>
		</div>

		<div class="mySlides fade">
		  <div class="numbertext">3 / 3</div>
		  <img src="/img/3.jpg" style="width:100%">
		  <div class="text">Caption Three</div>
		</div>

		</div>
		<br>

		<div style="text-align:center">
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		</div>


		<div class="video-btn">
			<span><img src="/img/body-parts.jpg" alt="body-parts" width="400" height="600" class="body-parts"></span>
			<span><button class="full-btn" onclick="showVideo('full')"> &#9745 Full Body</button></span>
			<span><button class="upper-btn" onclick="showVideo('upper')">&#9745 Upper Body</button></span>
			<span><button class="arms-btn" onclick="showVideo('arms')"> &#9745 Arms   </button></span>
			<span><button class="abs-btn" onclick="showVideo('abs')"> &#9745 Abs & Core</button></span>
			<span><button class="legs-btn" onclick="showVideo('legs')"> &#9745  Legs </button></span>
			<span><button class="butt-btn" onclick="showVideo('butt')"> &#9745 Butt</button></span>

		</div>
		<div>
			<div class="video" id="abs"> ABS <br>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/2pLT-olgUJs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/m5DJMRYDSc0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/bD61Mss2qx8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<br>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/-1wOKgtrT-w" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/lr5oEBVUevs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/3p8EBPVZ2Iw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video" id="arms"> ARMS <br>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/j64BBgBGNIU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/UyTR2EjTAXU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/Y346900i9qE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<br>
				<iframe width="49.5%" height="300" src="https://www.youtube.com/embed/puLJaNv9m18" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe width="49.5%" height="300" src="https://www.youtube.com/embed/uNILu4KSHQM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video" id="butt"> BUTT <br>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/cIuiQyfKBTg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/el1Cpk5B6OU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/j0rgbfeRFVA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><iframe width="49.5%" height="300" src="https://www.youtube.com/embed/9SuTAxJGQuY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe width="49.5%" height="300" src="https://www.youtube.com/embed/36aBAcVc7Es" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video" id="upper"> UPPER BODY <br>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/Y346900i9qE?list=PLSCcAGyv98icWAjrUD29TYLhJtRAGABp2" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/lEvL80oCJQY?list=PLSCcAGyv98icWAjrUD29TYLhJtRAGABp2" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/x6eyr0wxlmk?list=PLSCcAGyv98icWAjrUD29TYLhJtRAGABp2" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video" id="legs"> LEGS <br>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/Jbvb_MMGc8s" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/Smim7-qG8Ls" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/yU5uWAMed7k" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<br>
				<iframe width="49.5%" height="300" src="https://www.youtube.com/embed/3Vti3KctPe4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe width="49.5%" height="300" src="https://www.youtube.com/embed/mO7jBtyl9XE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video" id="full"> FULL BODY <br>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/ph1NjaXvOvg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/aE4j3KR5m54" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe width="33%" height="200" src="https://www.youtube.com/embed/Y2eOW7XYWxc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<br>
				<iframe width="49.5%" height="300" src="https://www.youtube.com/embed/-YpRYNREDV8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe width="49.5%" height="300" src="https://www.youtube.com/embed/UBMk30rjy0o" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
		
		<section id="dashboard">
			<div class="container">
				
			</div>
		</section>
		
		<div class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="10" data-image-src="img/pic4.jpg" data-natural-width="1600" data-natural-height="1067"></div>
	</main>
	
	<footer>
		<div class="container">
			<!-- Sculpex &copy; 2015 released under <a href="https://github.com/pixelcog/parallax.js/blob/master/LICENSE">MIT license</a><br /> -->
			<a href="http://www.facebook.com" target="_blank"><img src="/img/facebook.png" width="32px" height="32px" /></a>
			<a href="http://www.twitter.com" target="_blank"><img src="/img/twitter.png" width="32px" height="32px" /></a>
			<a href="http://www.instagram.com" target="_blank"><img src="/img/instagram.png" width="32px" height="32px" /></a>
			<a href="http://www.youtube.com" target="_blank"><img src="/img/youtube.png" width="32px" height="32px" /></a>
		</div>
	</footer>

	<script>
		function showVideo(id) {
			var y = document.getElementsByClassName("video");
			console.log(y);
			console.log(y.length);
			for(let i=0;i<y.length;i++) {
				console.log(i,y[i]);
				try {
					y[i].style.display = "none";
				} catch(err) {
					console.log(err);
				}
			}
			var x = document.getElementById(id);
			console.log(x);
			x.style.display = "block";
		}
	</script>

	<script>
		var slideIndex = 0;
		showSlides();

		function showSlides() {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  var dots = document.getElementsByClassName("dot");
		  for (i = 0; i < slides.length; i++) {
		    slides[i].style.display = "none";  
		  }
		  slideIndex++;
		  if (slideIndex > slides.length) {slideIndex = 1}    
		  for (i = 0; i < dots.length; i++) {
		    dots[i].className = dots[i].className.replace(" active", "");
		  }
		  slides[slideIndex-1].style.display = "block";  
		  dots[slideIndex-1].className += " active";
		  setTimeout(showSlides, 2000); // Change image every 2 seconds
		}
	</script>

</body>
</html>