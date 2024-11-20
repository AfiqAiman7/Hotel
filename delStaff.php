<!--
AFIQ
M3CS1104C
-->
<?php
	$Staff_ID=$_GET['sid'];
	$dbc=mysqli_connect("localhost","root","","hotel");
		if(mysqli_connect_errno())
		{
			echo"Failed to connect to MYSQL: ".mysqli_connect_error();
		}

			$delete="delete from `staff` where `Staff_ID`='$Staff_ID'";
	$chksql=mysqli_query($dbc,$delete);
	if ($chksql) 
	{
		Print '<script>alert("Record had been Deleted");</script>';
		Print '<script>window.location.assign("StaffListForm(2).php");</script>';

	}
	else
	{
		Print '<script>alert("Record Failed to be Deleted");</script>';
		Print '<script>window.location.assign("StaffListForm(2).php");</script>';

	}
?>