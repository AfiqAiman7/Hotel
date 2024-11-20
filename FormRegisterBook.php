<!--
MUHAMMAD AFIQ AIMAN BIN RUSLAN
2023376393
CDCS230B
-->
<?php
	session_start();
	$dbc=mysqli_connect("localhost","root","","hotel");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
	}

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(!empty($_POST['rID']) && !empty($_POST['rType'])  && !empty($_POST['rPrice']))
		{
			$rID = $_POST['rID'];
			$rType = $_POST['rType'];
			$rPrice = $_POST['rPrice'];

			$sql="INSERT INTO `room`(`Room_ID`, `Room_Type`, `Room_Price`) values ('$rID','$rType','$rPrice')";
			$result= mysqli_query($dbc,$sql);

			if ($result)
			{
				print '<script>alert("Record Had Been Added");</script>';
				print '<script>window.location.assign("FormBookList.php");</script>';
			}
			else
			{
				print '<script>alert("Record Not Been Added");</script>';
				print '<script>window.location.assign("FormRegisterBook.php");</script>';
			}
		}
		else
		{
			print '<script>alert("Please Enter All Data");</script>';
			header("location:FormRegisterBook.php");
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="form.css">
		<link rel="stylesheet" href="MyCss.css">
		<title></title>
	</head>
	<body>
		<style type="text/css">
			.contactUs
			{
				background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(menu.png);
				background-size: cover;
				background-position: center;
			}
			.box
			{
				left: 15%;
			}
		</style>
		<header>
			<!--Navigation//-->
			<a href="#" class="logo">HOTEL BOOKING SYSTEM</a>
			<div class="toggle" onclick="toggleMenu();"></div>
			<ul class="menu">
				<li><a href="FormAddReservation.php" onclick="toggleMenu();">Reserve Room</font></a></li>
				<li><a href="FormReservationList.php" onclick="toggleMenu();">Reservation List</font></a></li>
				<li><a href="FormRegisterBook.php" onclick="toggleMenu();"><font color="cloudflare">Add Room</font></a></li>
				<li><a href="FormBookList.php" onclick="toggleMenu();">Room List</a></li>
				<li><a href="Login.php" onclick="toggleMenu();">Log Out</a></li>
			</ul>
		</header>

		<div class="contactUs">
			<div class="title">
				<h2>Book Room System</h2>
			</div>
			<div class="box">
				<!-- Register Form -->
				<div class="contact form">
					<h3>Register <span class="typing"></span></h3>
					<form action="" method="POST">
						<div class="formBox">
							<div class="row100">
								<div class="inputBox">
									<span>Room ID</span>
									<input type="text" name="rID" required placeholder="Enter Room ID" autocomplete="off" minlength="5" maxlength="5" title="Must 5 characters">
								</div>
							</div>
							<div class="row50">
								<div class="inputBox">
									<span>Room Type</span>
									<input type="text" name="rType" placeholder="Enter Room Type" autocomplete="off" title="SINGLE/DOUBLE/KING"required>
								</div>
								<div class="inputBox">
									<span>Room Price</span>
									<input type="text" name="rPrice" placeholder="Enter Room Price" autocomplete="off" required>
								</div>
							</div>
							<div class="row100">
								<div class="inputBox">
									<input type="submit" value="Save">
								</div>
							</div>
						</div>
					</form>


				<!-- Contact Form -->
				<div class="contact info">
					<h3>Hotel Info</h3>
					<div class="infoBox">
						<div>
							<p>Shah Alam, Selangor <br>MALAYSIA</p><br>
						</div>
						
						<h3>How To Use?</h3>
						<a href="StoryBoard.pdf" class="label">Manual </a></label><p>
						<br><font color="white">GROUP ASSIGNMENT HOTEL SYSTEM.</font>
					</div>
				</div>
			</div>
		</div>

		<script>
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
				strings: ["Room ID","Room Type","Room Price"],
				typeSpeed: 100,
				backSpeed: 60,
				loop: true
			});

		</script>
	</body>
</html>