<!--
PROJECT : LIBRARY SYSTEM
COURSE : ISP250
//-->

<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Link to src for Java Script, Css And Renponsive//-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
		<title> HOTEL Menu Page </title>
		<link rel="stylesheet" href="MyCss.css">
	</head>
	<body>
		<header>
			<!--Navigation//-->
			<a href="#" class="logo">ONLINE HOTEL BOOKING SYSTEM</a>
			<div class="toggle" onclick="toggleMenu();"></div>
			<ul class="menu">
				<li><a href="#" onclick="toggleMenu();">Home</a></li>
				<li><a href="#About" onclick="toggleMenu();">List</a></li>
				<li><a href="#" onclick="toggleMenu();">Add</a></li>
				<li><a href="#" onclick="toggleMenu();">Update</a></li>
				<li><a href="#" onclick="toggleMenu();">Log Out</a></li>
			</ul>
		</header>
		<!--Main Page//-->
		<section class="banner" id="home">
			<div class="textBx">
				<h2>WELCOME<br><span> UITM SHAH ALAM HOTEL </span></h2>
				<h3><i><span class="typing"></span></i></h3><!--Auto typing//-->
				<a href="#about" class="btn">ABOUT</a><!--Button//-->
			</div>
		</section>

		<!--Content About Me//-->
		<section class="About" id="about">
			<div class="heading">
				<h2><u>ABOUT</u></h2>
			</div>
			<div class="content">
				<div class="contentBx w50">

				</div>
			</div>
		</section>

		<div class="copyright">
			<p>Copyright 2023 UITM SHAH ALAM. Hotel Booking System.</p>
		</div>

		<script type="text/javascript">
			/**Used For Navigation Animate**/
			window.addEventListener('scroll',function(){
				var header = document.querySelector('header');
				header.classList.toggle('sticky',window.scrollY > 0);
			});

			function toggleMenu(){
				/**Used For Responsive Website Phone**/
				var menuToggle = document.querySelector('.toggle');
				var menu = document.querySelector('.menu');
				menuToggle.classList.toggle('active');
				menu.classList.toggle('active');
			}

			var typed = new Typed(".typing", {
				/**Used For Auto Typing In Home Page**/
				strings: ["Welcome","Hotel Booking System","Please Register Account To Continue"],
				typeSpeed: 100,
				backSpeed: 60,
				loop: true
			});

		</script>
	</body>

</html>