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

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
        if (!empty($_POST['reserveID']) && !empty($_POST['mID']) && !empty($_POST['rID']) && !empty($_POST['cIn']) && !empty($_POST['cOut']) && !empty($_POST['reserveStatus'])) {
            $reserveID = $_POST['reserveID'];
            $mID = $_POST['mID'];
            $rID = $_POST['rID'];
            $cIn = $_POST['cIn'];
            $cOut = $_POST['cOut'];
            $reserveStatus = $_POST['reserveStatus'];

            $sql = "INSERT INTO `reservation` (`Reservation_ID`, `Member_ID`, `Room_ID`, `Check_In`, `Check_Out`, `Reservation_Status`) VALUES ('$reserveID', '$mID', '$rID', '$cIn', '$cOut', '$reserveStatus')";
            $result = mysqli_query($dbc, $sql);

            if ($result) {
                echo '<script>alert("Record has been added.");</script>';
                echo '<script>window.location.assign("FormReservationList.php");</script>';
            } else {
                echo '<script>alert("Record could not be added.");</script>';
                echo '<script>window.location.assign("FormAddReservation.php");</script>';
            }
        } else {
            echo '<script>alert("Please enter all data.");</script>';
            header("location:FormAddReservation.php");
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
				<li><a href="FormAddReservation.php" onclick="toggleMenu();"><font color="cloudflare">Reserve Room</font></a></li>
				<li><a href="FormReservationList.php" onclick="toggleMenu();">Reservation List</font></a></li>
				<li><a href="FormRegisterBook.php" onclick="toggleMenu();">Add Room</font></a></li>
				<li><a href="FormBookList.php" onclick="toggleMenu();">Room List</a></li>
				<li><a href="Login.php" onclick="toggleMenu();">Log Out</a></li>
			</ul>
		</header>

		<div class="contactUs">
			<div class="title">
				<h2>Reservation System</h2>
			</div>
			<div class="box">
				<!-- Contact Form -->
				<div class="contact form">
				    <h3>Register <span class="typing"></span></h3>
				    <form action="" method="POST">
				        <div class="formBox">
				            <div class="row50">
				                <div class="inputBox">
				                    <span>Reservation ID</span>
				                    <input type="text" name="reserveID" required placeholder="Enter Reservation ID" autocomplete="off" minlength="4" maxlength="6" title="Must be 4-6 characters">
				                </div>
				                <div class="inputBox">
				                    <span>Member ID</span>
				                    <input type="text" name="mID" required placeholder="Enter Member ID" autocomplete="off" minlength="4" maxlength="6" title="Must be 4-6 characters">
				                </div>
				                <div class="inputBox">
				                    <span>Room ID</span>
				                    <input type="text" name="rID" required placeholder="Enter Room ID" autocomplete="off" minlength="4" maxlength="6" title="Must be 4-6 characters">
				                </div>
				            </div>
				            <div class="row50">
				                <div class="inputBox">
				                    <span>Check In</span>
				                    <input type="date" name="cIn" placeholder="Enter Check In Date" autocomplete="off" title="Date Check-In" required>
				                </div>
				                <div class="inputBox">
				                    <span>Check Out</span>
				                    <input type="date" name="cOut" placeholder="Enter Check Out Date" autocomplete="off" title="Date Check-Out" required>
				                </div>
				            </div>
				            <div class="row50">
				                <div class="inputBox">
				                    <span>Reservation Status</span>
				                    <select name="reserveStatus" class="option" placeholder="Reservation" style="width: 100%;padding: 10px 0;font-size: 16px;color: cornflowerblue;" required>
				                        <option name="reserveStatus" value="Paid">Paid</option>
				                        <option name="reserveStatus" value="Unpaid">Unpaid</option>
				                    </select>
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
				strings: ["Reservation ID", "Member ID", "Room ID","Check In","Check Out","Reservation Status"],
				typeSpeed: 100,
				backSpeed: 60,
				loop: true
			});

		</script>
	</body>
</html>