<!--
MUHAMMAD AFIQ AIMAN BIN RUSLAN
2023376393
CDCS230B
FORM Login
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

	//Memastikan Admin (fixed for now) Sahaja yang dapat login ke page Admin//
		if(!empty($_POST['admin_ID']) && !empty($_POST['admin_pass']))
		{

			$admin_ID=$_POST["admin_ID"];
			$admin_pass=$_POST["admin_pass"];

			$sql="select * from admin where admin_ID= '".$admin_ID."' AND admin_pass='".$admin_pass."'";

			$result=mysqli_query($dbc,$sql);
			$row=mysqli_fetch_array($result);

			if($row["admin_ID"]=="123")
			{
				$_SESSION["user_ID"]=$admin_ID;
				header("location:AdminRegister.php");
			}
			else
			{
			header("location:error.php");
			}
		}

    //Memastikan Usertype = Head Department Sahaja yang dapat login ke page HD//
		// elseif(!empty($_POST['Staff_ID']) && !empty($_POST['Staff_Pass']))
		// {

		// 	$Staff_ID=$_POST["Staff_ID"];
		// 	$Staff_Pass=$_POST["Staff_Pass"];

		// 	$sql="select * from staff where Staff_ID= '".$Staff_ID."' AND Staff_Pass='".$Staff_Pass."'";

		// 	$result=mysqli_query($dbc,$sql);
		// 	$row=mysqli_fetch_array($result);

		// 	if($row["Job_Title"]=="Room Keeper")
		// 	{
		// 		header("location:RoomKeeperPage.php");
		// 	}
		// 	else
		// 	{
		// 		header("location:error.php");
		// 	}
		// }

	//Memastikan Usertype = Staff Sahaja yang dapat login ke page staff//
		elseif(!empty($_POST['Staff_ID']) && !empty($_POST['Staff_Pass']))
		{

			$Staff_ID=$_POST["Staff_ID"];
			$Staff_Pass=$_POST["Staff_Pass"];

			$sql="select * from staff where Staff_ID= '".$Staff_ID."' AND Staff_Pass='".$Staff_Pass."'";

			$result=mysqli_query($dbc,$sql);
			$row=mysqli_fetch_array($result);

			if($row["Job_Title"]=="Maintenance Staff")
			{
				header("location:FormMemberList.php");
			}
			else if($row["Job_Title"]=="Room Keeper")
			{
				header("location:FormBookList.php");
			}
			else
			{
				header("location:error.php");
			}
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!----======== CSS ======== -->
		<link rel="stylesheet" type="text/css" href="login.css">
		<link rel="stylesheet" type="text/css" href="Popup.css">
		<title>Register And Login</title>
	</head>
	<body>
		<div class="text">
			<marquee><b>WELCOME TO HOTEL UiTM SHAH ALAM SYSTEM, PLEASE SELECT USER ADMIN | STAFF TO CONTINUE TO OUR HOTEL BOOKING SYSTEM.</b></marquee>
		</div>

		<!----======== Button Option ======== -->
		<section>
			<a class="btn" onclick="popupToggle();">ADMIN</a>
			<!-- <a class="btn" onclick="popup2Toggle();">HEAD DEPARTMENT</a> -->
			<a class="btn" onclick="popup1Toggle();">STAFF</a>
		</section>

		<!----======== Admin Form ======== -->
		<div id="popup">
			<div class="content">
				<img src="image/login.png">
				<h2>WELCOME TO HOTEL UiTM SHAH ALAM!</h2>
				<p>ADMINISTRATION LOGIN PAGE <b>| ADMIN |</b></p>
				<form action="#" method="POST">
					<div class="inputBox">
						<input type="text" name="admin_ID" placeholder="Enter User ID" autocomplete="off" required>
					</div>
					<div class="inputBox">
						<input type="password" name="admin_pass" placeholder="Enter User Password" required>
					</div>
					<div class="inputBox">
						<input type="submit" value="Log In" class="btn">
					</div>
				</form>
			</div>
			<a class="close" onclick="popupToggle();">Exit</a>
		</div>

		<!----======== MAINTENANCE Staff Form ======== -->
		<div id="popup1">
			<div class="content">
				<img src="image/staff.png">
				<h2>WELCOME TO HOTEL UiTM SHAH ALAM!</h2>
				<p>STAFF LOGIN PAGE <b>| STAFF |</b></p>
				<form action="#" method="POST">
					<div class="inputBox">
						<input type="text" name="Staff_ID" placeholder="Enter User ID" autocomplete="off" required> 
					</div>
					<div class="inputBox">
						<input type="password" name="Staff_Pass" placeholder="Enter User Password" autocomplete="off" required>
					</div>
					<div class="inputBox">
						<input type="submit" value="Log In" class="btn">
					</div>
				</form>
			</div>
			<a class="close" onclick="popup1Toggle();">Exit</a>
		</div>

		<!----======== ROOM KEEPER Form ======== -->
<!-- 		<div id="popup2">
			<div class="content">
				<img src="image/staff.png">
				<h2>WELCOME TO HOTEL UiTM SHAH ALAM!</h2>
				<p>DEPARTMENT LOGIN PAGE <b>| HEAD DEPARTMENT|</b></p>
				<form action="#" method="POST">
					<div class="inputBox">
						<input type="text" name="Staff_ID" placeholder="Enter User ID" autocomplete="off" required>
					</div>
					<div class="inputBox">
						<input type="password" name="Staff_Pass" placeholder="Enter User Password" autocomplete="off" required>
					</div>
					<div class="inputBox">
						<input type="submit" value="Log In" class="btn">
					</div>
				</form>
			</div>
			<a class="close" onclick="popup2Toggle();">Exit</a>
		</div> -->

		<!----======== No Copyright ======== -->
		<div class="text">
			<b>Copyright 2023 UiTM SHAH ALAM. HOTEL BOOKING SYSTEM GROUP 2023.</b>
		</div>

		<!----======== Exit Button Form ======== -->
		<script>
			function popupToggle(){
				const popup = document.getElementById('popup');
				popup.classList.toggle('active')
			}

			function popup1Toggle(){
				const popup1 = document.getElementById('popup1');
				popup1.classList.toggle('active')
			}

			function popup2Toggle(){
				const popup2 = document.getElementById('popup2');
				popup2.classList.toggle('active')
			}
		</script>
	</body>
</html>