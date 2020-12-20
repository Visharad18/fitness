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
					<a class="navbar-brand">Sculpex</a>
				</div>
				<div class="navbar-collapse collapse" id="navbar" >
					<ul class="nav navbar-nav" id="menu">
						<li><a href="#welcome">Welcome</a></li>
						<li><a href="#features">Features</a></li>
						<li><a href="#join">Join</a></li>
						<li><a href="#contact">Contact</a></li>
						<li><a onclick="show()">Calculate BMI</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a id="dialog" href="#login">Login</a></li>
					</ul>
				</div>
			</div>

			<div>
		<form id="bmi-form" style="display: none; width: 300px">
		
		<p>
			<label style="margin: 0">HEIGHT   </label>
			<input type="number" name="feet" id="feet" min="0" value="5"  style="max-width: 20%; margin: 0;" required> <label style="margin: 0"> feet  </label>
			<input type="number" name="inch" id="inches" min="0" value="6" style="max-width: 20% margin: 0;" required> <label style="margin: 0"> inches</label>
		</p>
		<p>
			<label>WEIGHT</label>
			<input type="number" name="kg" id="weight" min="0" max="150" step="0.01" value="60" required>
			<label> Kg</label>
		</p>
		<p>
			<button style="width: 100%" onclick="calcBMI(); return false;">Calculate BMI</button>
		</p>
		<label style="left: 40%">BMI: </label><label id="bmi">21.35</label>
	</form></div>

		</nav>
	</header>
	
	<main>
		<!-- Login dialog box -->
		<section class="container" id="login">
				<h1>Login</h1>
				<?php
					echo $this->Form->create($user,[
						'url' => [
							'controller' => 'Logins',
							'action' => 'login'
						],
						'type' => 'POST',
						'id' => 'login-form',
					]);
			
					echo '<div class="field">'.$this->Form->control('email',['maxlength' => 50, 'required']).'</div><div class="field">';
					echo $this->Form->control('pass_word',['type' => 'password', 'label' => 'Password', 'maxlength' => 50, 'required']);
					echo $this->Form->button('Login',['type'=>"submit", 'class'=>"button button-block"]);
					echo $this->Form->end();
				?>
		</section>
		
		<!-- Actual page content -->
		<div class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="10" data-image-src="img/pic1.jpg" data-natural-width="2500" data-natural-height="1668"></div>
		
		<section id="welcome">
			<div class="container">
				<h2>Welcome</h2>
				<p>Welcome to Sculpex, the best way to track your exercise
				and compete with your friends. With Sculpex, you'll be 
				given the ability to record your workout time and compare
				those with your friends. Challenge yourself and those 
				around you to get fit, in a fun and interactive way.</p>
			</div>
		</section>
		
		<div class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="10" data-image-src="img/pic2.jpg" data-natural-width="1300" data-natural-height="866"></div>
		
		<section id="features">
			<div class="container">
				<h2>Features</h2>
				<p>When you sign up for a Sculpex account, you'll be given access to all of these features.
				<ul>
					<li>Personalize dashboard</li>
					<li>Track your workout times</li>
					<li>Compete with your friends and strangers</li>
					<li>Track your own progress</li>
					<li>Companion app!</li>
				</ul></p>
			</div>
		</section>
		
		<div class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="10" data-image-src="img/pic3.jpg" data-natural-width="2000" data-natural-height="1043"></div>		
		
		<section id="join">
			<div class="container">
				<h2>Join now!</h2>
				<p>Joining Sculpex is, and will always be, <strong>100% FREE!</strong>
				What are you waiting for? Join now and get fit by competing.</p>
				
				<!-- Register form -->
				<?php 
				echo $this->Form->create($user,['url' => [
						'action' => 'register',
						'type' => 'post',
						'id' => 'register-form',
						'class' => 'container'
						]
					]
				);
				echo '<div class="top-row"><div class="field">'.
					$this->Form->control('firstname',['maxlength' => 20, 'required']).
				'</div><div class="field">'.
					$this->Form->control('lastname',['maxlength' => 20, 'required']).
				'</div></div>';

				
				echo '<div class="clearfix"></div><div class="field">'.$this->Form->control('email');
				echo '<div class="field">'.$this->Form->control('pass_word',['type' =>'password', 'label' => 'Password' , 'maxlength' => 50, 'autocomplete' => 'off', 'required']).'</div>';
				echo '<div class="field">'.$this->Form->control('confirm_password', ['type' => 'password', 'label' => 'Confirm Password', 'maxlength' => 50, 'autocomplete' => 'off', 'required']).'</div>';
				echo $this->Form->button('GET STARTED',['type'=>"submit", 'class'=>"button button-block"]);
				echo $this->Form->end();
				?>
			</div>
			
		</section>
		
		<div class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="10" data-image-src="img/pic4.jpg" data-natural-width="1600" data-natural-height="1067"></div>
		
		<section id="contact">
			<div class="container">
				<h2>Contact</h2>
				<p>Got any questions? Having some problems signing up? Email us at <a href="mailto:support@Sculpex.com">support@Sculpex.com</a> for help.</p>
				
				<!-- Dummy email form -->
				<?php
					echo $this->Form->create($user,[
						'url' => [
							'controller' => 'Logins',
							'action' => 'contact'
						],
						'type' => 'POST',
						'id' => 'contact-form',
					]);
			
					echo '<div class="field">'.$this->Form->control('questioner_name',['label'=>'Name', 'maxlength' => 40, 'required']).'</div><div class="field">';
					echo '<div class="field">'.$this->Form->control('email',['maxlength' => 50, 'required']).'</div><div class="field">';
					echo $this->Form->control('question',['type' => 'text', 'label' => 'Message', 'maxlength' => 300, 'placeholder' => 'Write your message here', 'required']);
					echo $this->Form->button('Send Message',['type'=>"submit", 'class'=>"button button-block"]);
					echo $this->Form->end();
				?>
			</div>
		</section>
		
		<div class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="10" data-image-src="img/pic5.jpg" data-natural-width="1600" data-natural-height="1067"></div>
	</main>
	
	<footer>
		<div class="container">
			<!--Sculpex &copy; 2015 released under <a href="https://github.com/pixelcog/parallax.js/blob/master/LICENSE">MIT license</a><br /> </li-->
			<a href="http://www.facebook.com" target="_blank"><img src="img/facebook.png" width="32px" height="32px" /></a>
			<a href="http://www.twitter.com" target="_blank"><img src="img/twitter.png" width="32px" height="32px" /></a>
			<a href="http://www.instagram.com" target="_blank"><img src="img/instagram.png" width="32px" height="32px" /></a>
			<a href="http://www.youtube.com" target="_blank"><img src="img/youtube.png" width="32px" height="32px" /></a>
		</div>
	</footer>
	<script type="text/javascript">
		function calcBMI() {
			var ft = parseInt(document.getElementById("feet").value);
			var inch = parseInt(document.getElementById("inches").value);
			var weight = parseInt(document.getElementById("weight").value);
			var bmi = (ft*12+inch)*2.54/100;
			bmi *= bmi;
			bmi = weight/bmi;
			document.getElementById("bmi").innerHTML = bmi.toFixed(2);
		}

		function show() {
			var f = document.getElementById("bmi-form");
			if(f.style.display == "none")
				f.style.display = "block";
			else
				f.style.display = "none";
		}
	</script>
</body>
</html>