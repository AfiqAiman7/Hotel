<?php
	$Member_Name = $_POST['Member_Name'];
	$Member_Birth = $_POST['Member_Birth'];
	$Member_Gender = $_POST['Member_Gender'];
	$Member_PhoneNum = $_POST['Member_PhoneNum'];
	$Member_Address = $_POST['Member_Address'];

	$dbc = mysqli_connect ("localhost","root","","hotel");

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: ".mysqli_connect_error();
    }

	$mid = $_GET['fid'];
	$update = "update member set `Member_ID` = '$mid' , `Member_Name` = '$Member_Name', `Member_Birth` = '$Member_Birth', `Member_Gender` = '$Member_Gender', `Member_PhoneNum` = '$Member_PhoneNum', `Member_Address` = '$Member_Address' where `Member_ID` = '$mid'";

	$chksql = mysqli_query($dbc,$update);
	if ($chksql)
	{
		Print '<script>alert("Record had been updated");</script>';
		Print '<script>window.location.assign("systemlist.php");</script>';
	}
	else
	{
		Print '<script>alert("Record feiled to be updated");</script>';
		Print '<script>window.location.assign("systemlist.php");</script>';
	}
?>