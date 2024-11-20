<!--
MUHAMAD AFIQ AIMAN BIN RUSLAN
CDCS230B
-->
<?php
	$cStaff_ID=$_GET['sid'];
	$cStaff_Name=$_POST['fStaff_Name'];
	$cStaff_PhoneNum=$_POST['fStaff_PhoneNum'];
	$cBuilding_ID=$_POST['fBuilding_ID'];
	$cStaff_Pass=$_POST['fstaff_pass'];
	$cJob_Title=$_POST['Job_Title'];
	$dbc=mysqli_connect("localhost","root","","hotel");
		if(mysqli_connect_errno())
		{
			echo"Failed to connect to MYSQL: ".mysqli_connect_error();
		}
	$update="update staff set `Staff_ID`='$cStaff_ID',`Staff_Name`='$cStaff_Name',`Staff_PhoneNum`='$cStaff_PhoneNum',
	`Building_ID`='$cBuilding_ID', `Staff_Pass`='$cStaff_Pass', `Job_Title`='$cJob_Title' where `Staff_ID`='$cStaff_ID'";
	$chksql=mysqli_query($dbc,$update);
	if ($chksql) 
	{
		Print '<script>alert("Record had been Updated");</script>';
		Print '<script>window.location.assign("StaffListForm(2).php");</script>';

	}
	else
	{
		Print '<script>alert("Record Failed to be Updated");</script>';
		Print '<script>window.location.assign("StaffListForm(2).php");</script>';

	}
?>