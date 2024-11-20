<!--
MUHAMMAD AFIQ AIMAN BIN RUSLAN
2023376393
CDCS230B
-->
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
		.container
		{
		}
	</style>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 align="center">SEARCH ROOM SYSTEM</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <table>
                                <td>
                                <tr><form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" autocomplete="off" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search Room ID">
                                        <button type="submit" onclick="toggleTable()" class="btn btn-primary">Search</button>
                                        
                                    </div>
                                </form></tr>
                                </td></table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <form>
                            <table id="myTable" class="table table-bordered">
                                <thead>
                                    <tr display: none;>
                                        <td bgcolor="grey" align="center" width="15%"><b>ROOM ID</b></td>
                                        <td bgcolor="grey" align="center" width="30%"><b>Room Type</b></td>
                                        <td bgcolor="grey" align="center" width="25%"><b>Room Price</b></td>
                                        <td colspan="2" bgcolor="grey" align="center" width="4.8%"><b>ACTION</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $con = mysqli_connect("localhost","root","","hotel");

                                        if(isset($_GET['search']))
                                        {
                                            $filtervalues = $_GET['search'];
                                            $query = "SELECT * FROM room WHERE CONCAT(Room_ID,Room_Type,Room_Price) LIKE '%$filtervalues%' ";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $items)
                                                {
                                                    ?>
                                                    <tr>
                                                        <td class="font" align="center"><?= $items['Room_ID']; ?></td>
                                                        <td class="font" align="center"><?= $items['Room_Type']; ?></td>
                                                        <td class="font" align="center"><?= $items['Room_Price']; ?></td>
                                                        <td colspan="2">
                                                            <a class="btn1" href="FormOrder.php?ID='.$list['Room_ID'].'">Reserve</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    <tr>
                                                        <td colspan="5">No Record Found</td>
                                                    </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tr>
                                    <td bgcolor="grey" align="center" width="15%"><b>ROOM ID</b></td>
                                    <td bgcolor="grey" align="center" width="30%"><b>Room Type</b></td>
                                    <td bgcolor="grey" align="center" width="25%"><b>Room Price</b></td>
                                    <td colspan="2" bgcolor="grey" align="center" width="4.8%"><b>ACTION</b></td>
                                </tr>
                                

                                <?php
                                    $dbc = mysqli_connect("localhost","root","","hotel");
                                    if (mysqli_connect_errno())
                                    {
                                        echo "Failed to connect to MySQL : ".mysqli_connect_error();
                                    }

                                    $sql = "select * from room";
                                    $result = mysqli_query($dbc, $sql);
                                    if ($result = mysqli_query($dbc, $sql)) 
                                    {
          
                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows( $result );
                                          
                                        // Display result
                                        printf("Total Room In Database : %d\n", $rowcount);
                                    }

                                    while($list = mysqli_fetch_assoc($result))
                                    {
                                        Print '<tr>
                                        <td class="font" align="center">'.$list['Room_ID'].'</td>
                                        <td class="font" align="center">'.$list['Room_Type'].'</td>
                                        <td class="font" align="center">'.$list['Room_Price'].'</td>
                                        <td colspan="2">
                                            <a class="btn1" href="FormOrder.php?ID='.$list['Room_ID'].'">Reserve</a>
                                        </td>';
                                    }
                                ?>

                            </table>
                        </form>
                        <!-- <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Room ID</th>
                                    <th>Room Type</th>
                                    <th>Room Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","hotel");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM room WHERE CONCAT(Room_ID,Room_Type,Room_Price) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['Room_ID']; ?></td>
                                                    <td><?= $items['Room_Type']; ?></td>
                                                    <td><?= $items['Room_Price']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="5">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table> -->
                        <button><a href="#" class="form-control" onClick="window.print()">Print Search</a></button>
                        <button><a href="FormOrder.php" class="form-control">Reserve Room</a></button>
                        <button><a href="FormBookList.php" class="form-control">Back</a></button>
                        <button><a href="Login.php" class="form-control">Log Out</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //JavaScript toggle table kalau nak buat search table disappear yang panjang//
         function toggleTable() {
            var table = document.getElementById("myTable");
            if (table.style.display === "none") {
                // table.style.display = "table";
            } else {
                table.style.display = "none";
            }
        }
        </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
