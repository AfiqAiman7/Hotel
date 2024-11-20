<!--
MUHAMAD AFIQ AIMAN BIN RUSLAN
CDCS230B
-->
<?php
    $s_ID=$_POST['ID'];
    $s_Name=$_POST['Name'];
    $s_PhoneNum=$_POST['Phone'];
    $sBuilding_ID=$_POST['Building_ID'];
    $s_Pass=$_POST['password'];
    $s_AID=("123");
    $sJob_Title=$_POST['Job_Title'];

    $dbc=mysqli_connect("localhost","root","","hotel");
        if(mysqli_connect_errno())
        {
            echo"Failed to connect to MYSQL: ".mysqli_connect_error();
        }

    $sql="insert into `staff`(`Staff_ID`,`Staff_Name`,`Staff_PhoneNum`,`Building_ID`,`staff_pass`,`admin_ID`,`Job_Title`) values ('$s_ID','$s_Name','$s_PhoneNum','$sBuilding_ID','$s_Pass','$s_AID','$sJob_Title')";
    $results= mysqli_query($dbc,$sql);
    if ($results)
    {
        mysqli_commit($dbc);
        //display message box Record Been Added
        print '<script>alert("Record Had Been Added");</script>';
        //go to frmcustomer.php page
        print '<script>window.location.assign("StaffListForm(2).php");</script>';
    }
    else
    { 
        mysqli_rollback($dbc);
        //display error message box
        print '<script>alert("Data Is Invalid , No Record Been Added");</script>';
        //go to frmcustomer.php page
        print '<script>window.location.assign("StaffListForm(2).php");</script>';
    }
?>