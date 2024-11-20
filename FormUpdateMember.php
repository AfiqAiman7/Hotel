<!--
MUHAMMAD AFIQ AIMAN BIN RUSLAN
2023376393
CDCS230B
-->
<?php
	session_start();
	$dbc = mysqli_connect ("localhost","root","","hotel");

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: ".mysqli_connect_error();
    }

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$Name = $_POST['Name'];
		$Birth = $_POST['Birth'];
		$Gender = $_POST['Gender'];
		$Phone = $_POST['Phone'];
		$Address = $_POST['Address'];

		$ID = $_GET['ID'];
		$update = "update member set `Member_ID` = '$ID' , `Member_Name` = '$Name', `Member_Gender` = '$Gender', `Member_PhoneNum` = '$Phone', `Member_Address` = '$Address' where `Member_ID` = '$ID'";

		$chksql = mysqli_query($dbc,$update);
		if ($chksql)
		{
			Print '<script>alert("Record had been updated");</script>';
			Print '<script>window.location.assign("FormMemberList.php");</script>';
		}
		else
		{
			Print '<script>alert("Record feiled to be updated");</script>';
			Print '<script>window.location.assign("FormUpdateMember.php");</script>';
		}
	}
?>

<?php
    $ID = $_GET['ID'];

    $dbc = mysqli_connect ("localhost","root","","hotel");

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: ".mysqli_connect_error();
    }

    $find = "select * from member where `Member_ID` = '$ID'";
    $result = mysqli_query($dbc,$find);
    $row = mysqli_fetch_assoc($result);
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
		<header>
			<!--Navigation//-->
			<a href="#" class="logo">Hotel Booking SYSTEM</a>
			<div class="toggle" onclick="toggleMenu();"></div>
			<ul class="menu">
				<li><a href="#" onclick="toggleMenu();"><font color="black">Update Member</font></a></li>
				<li><a href="FormMemberList.php" onclick="toggleMenu();">Back To Previous Page</a></li>
			</ul>
		</header>

		<div class="contactUs">
			<div class="title">
				<h2>Member Hotel Database</h2>
			</div>
			<div class="box">
				<!-- Register Form -->
				<div class="contact form">
					<h3>Update <span class="typing"></span></h3>

					<form name="update_member" method="POST" action="#">
						<div class="formBox">
							<div class="row50">
								<div class="inputBox">
									<span>Member Name</span>
									<input type="text" name="Name" value="<?=$row['Member_Name'];?>" placeholder="Enter Member Name" autocomplete="off">
								</div>
								<div class="row25">
									<div class="inputBox">
										<span>Member ID</span>
										<input type="text" name="ID" value="<?=$row['Member_ID'];?>" disabled>
									</div>
									<div class="inputBox">
										<span>Member Birth</span>
										<input type="date" name="Birth" value="<?=$row['Member_Birth'];?>" id="start" min="1900-01-01" max="2022-07-02" placeholder="Choose Member Age" autocomplete="off">
									</div>
								</div>
							</div>

							<div class="row50">
								<div class="inputBox">
									<span>Member Gender</span>
									<input type="text" name="Gender" value="<?=$row['Member_Gender'];?>" placeholder="Enter Member Gender" autocomplete="off">
								</div>
								<div class="inputBox">
									<span>Phone Number</span>
									<input type="tel" name="Phone" value="<?=$row['Member_PhoneNum'];?>" placeholder="Enter Phone Number" autocomplete="off" minlength="10" maxlength="12" title="Minimum 10 to 12 Number" pattern="[0-9]{10,12}">
								</div>
							</div>

							<div class="row100">
								<div class="inputBox">
									<span>Member Address</span>
									<input  type="text" name="Address" value="<?=$row['Member_Address'];?>" placeholder="Enter Member Address" autocomplete="off"></input>
								</div>
							</div>

							<div class="row100">
								<div class="inputBox">
									<input type="submit" value="Save">
								</div>
							</div>
						</div>
					</form>

				</div>

				<!-- Contact Form -->
				<div class="contact info">
					<h3>Hotel Info</h3>
					<div class="infoBox">
						<div>
							<p>Shah Alam, Selangor <br>MALAYSIA</p><br>
							<h3>Website Page</h3>
							<button>Change</button>
						</div>
						<label>How To Use? <a href="StoryBoard.pdf" class="label">Manual </a></label><p>
					</div>
				</div>

				<!-- Map Form -->
				<div class="contact map">
					<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD1VnYC6EugmolDY9RjsZ77TeXstyj0288&q=Hotel UiTM Shah Alam&center=3.0674508,101.5050583&zoom=11" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
				strings: ["Name","Gender","Birth","Phone Number","Address"],
				typeSpeed: 100,
				backSpeed: 60,
				loop: true
			});


			var background = ["linear-gradient(90deg, #0e3959 0%, #0e3959 30%, #03a9f5 30%,#03a9f5 100%)","linear-gradient(-30deg, #03a9f4 0%, #3a78b7 50%, #262626 50%, #607d8b 100%)","linear-gradient(30deg, #03a9f4 0%, #3a78b7 50%, #262626 50%, #607d8b 100%)","#222f3e","#f368e0","#ee5253","#0abde3","#10ac84","#222f3e","#5f27cd","orange","grey"]; 
		    	/**Used To Change Font Colour**/
		        var i = 0; 
		        document.querySelector("button").addEventListener("click",function(){ 
		        i = i < background.length ? ++i : 0; 
		        document.querySelector("body").style.background = background[i] 
	        }) 

		</script>
	</body>
</html>