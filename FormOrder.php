<!--
MUHAMMAD AFIQ AIMAN BIN RUSLAN
2023376393
CDCS230B
-->
<?php
    session_start();
    $dbc = mysqli_connect("localhost", "root", "", "hotel");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['reserveID']) && !empty($_POST['mID']) && !empty($_POST['rID']) && !empty($_POST['cIn']) && !empty($_POST['cOut'])) {
            $reserveID = $_POST['reserveID'];
            $mID = $_POST['mID'];
            $rID = $_POST['rID'];
            $cIn = $_POST['cIn'];
            $cOut = $_POST['cOut'];

            $sql = "INSERT INTO reservation (Reservation_ID, Member_ID, Room_ID, Check_In, Check_Out) VALUES ('$reserveID', '$mID', '$rID', '$cIn', '$cOut')";
            $result = mysqli_query($dbc, $sql);

            if ($result) {
                echo '<script>alert("Record has been added.");</script>';
                echo '<script>window.location.assign("FormOrder.php");</script>';
            } else {
                echo '<script>alert("Record could not be added.");</script>';
                echo '<script>window.location.assign("FormOrder.php");</script>';
            }
        } else {
            echo '<script>alert("Please enter all data.");</script>';
            header("location:FormOrder.php");
        }
    }

    // Generate the next Reservation ID
    $query = "SELECT MAX(CAST(SUBSTRING(Reservation_ID, 3) AS UNSIGNED)) AS max_id FROM reservation WHERE Reservation_ID LIKE 're%'";
    $result = mysqli_query($dbc, $query);
    $row = mysqli_fetch_assoc($result);
    $lastID = $row['max_id'];
    $nextID = '';

    if ($lastID === null) {
        $nextID = 're001'; // Start from re001 if no previous reservations found
    } else {
        $nextNum = intval($lastID) + 1;
        $nextID = 're' . str_pad($nextNum, 3, "0", STR_PAD_LEFT);
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="MyCss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Search</title>
</head>
<body>
    <style type="text/css">
        .container {
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 align="center">RESERVE BOOKING SYSTEM</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <table>
                                <td>
                                <tr>
                                    <form action="" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="text" autocomplete="off" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search Room Title">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </tr>
                                </td>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <form action="" method="POST">
                                <div class="formBox">
                                    <div class="row100">
                                        <div class="inputBox">
                                            <span>RESERVE ID</span>
                                            <input type="text" name="reserveID" disabled placeholder="Enter Reserve ID" autocomplete="off" value="<?php echo $nextID; ?>">
                                        </div>
                                    </div>
                                    <div class="row100">
                                        <div class="inputBox">
                                            <span>MEMBER ID</span>
                                            <input type="text" name="mID" required placeholder="Enter Member ID" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row100">
                                        <div class="inputBox">
                                            <span>ROOM ID</span>
                                            <input type="text" name="rID" required placeholder="Enter Room ID" autocomplete="off" pattern="ro00[1-4]" title="Please enter a valid Room ID between ro001 and ro004">
                                        </div>
                                    </div>
									<div class="row100">
										<div class="inputBox">
											<span>Date Check In</span>
											<input type="date" name="cIn" id="cIn" value="MM/DD/YYY" min="1900-01-01" max="2050-07-02" required>
										</div>
									</div>
		                            <div class="row100">
										<div class="inputBox">
											<span>Date Check Out</span>
											<input type="date" name="cOut" id="cOut" value="MM/DD/YYY" min="1900-01-01" max="2050-07-02" required>
										</div>
									</div>

									<div class="row100">
										<div class="inputBox">
											<input type="submit" value="Save">
										</div>
									</div>
								</div>
							</form>
	                    </table>
	                    <button><a href="#" class="form-control" onClick="window.print()">Print Orders</a></button>
	                    <button><a href="Payment.php" class="form-control">Payment</a></button>
	                    <button><a href="RoomKeeperPage.php" class="form-control">Back</a></button>
	                    <button><a href="Login.php" class="form-control">Log Out</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>