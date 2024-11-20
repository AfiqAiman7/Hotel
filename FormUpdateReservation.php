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
        $reserveID = $_GET['ID'];
        $mID = $_POST['mID'];
        $rID = $_POST['rID'];
        $cIn = $_POST['cIn'];
        $cOut = $_POST['cOut'];
        $reserveStatus = $_POST['reserveStatus'];

        $update = "UPDATE reservation SET `Member_ID`='$mID', `Room_ID`='$rID', `Check_In`='$cIn', `Check_Out`='$cOut', `Reservation_Status`='$reserveStatus' WHERE `Reservation_ID`='$reserveID'";

        $chksql = mysqli_query($dbc, $update);
        if ($chksql) {
            Print '<script>alert("Record has been updated.");</script>';
            Print '<script>window.location.assign("FormReservationList.php");</script>';
        } else {
            Print '<script>alert("Record failed to be updated.");</script>';
            Print '<script>window.location.assign("FormUpdateReservation.php");</script>';
        }
    }
?>

<?php
    $reserveID = $_GET['ID'];

    $dbc = mysqli_connect("localhost", "root", "", "hotel");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $find = "SELECT * FROM reservation WHERE `Reservation_ID`='$reserveID'";
    $result = mysqli_query($dbc, $find);
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
            <a href="#" class="logo">HOTEL BOOKING SYSTEM</a>
            <div class="toggle" onclick="toggleMenu();"></div>
            <ul class="menu">
                <li><a href="#" onclick="toggleMenu();"><font color="black">Update Reservation</font></a></li>
                <li><a href="FormReservationList.php" onclick="toggleMenu();">Back To Previous Page</a></li>
            </ul>
        </header>

        <div class="contactUs">
            <div class="title">
                <h2>Reservation Database</h2>
            </div>
            <div class="box">
                <!-- Register Form -->
                <div class="contact form">
                    <h3>Update <span class="typing"></span></h3>

                    <form name="update reservation" method="POST" action="#">
                        <div class="formBox">
                            <div class="row50">
                                <div class="inputBox">
                                    <span>Reservation ID</span>
                                    <input type="text" name="reserveID" value="<?=$row['Reservation_ID'];?>" autocomplete="off" disabled>
                                </div>
                                <div class="inputBox">
                                    <span>Member ID</span>
                                    <input type="text" name="mID" value="<?=$row['Member_ID'];?>" autocomplete="off" disabled>
                                    <input type="hidden" name="mID" value="<?=$row['Member_ID'];?>">
                                </div>
                                <div class="inputBox">
                                    <span>Room ID</span>
                                    <input type="text" name="rID" value="<?=$row['Room_ID'];?>" autocomplete="off" placeholder="Enter New Room ID">
                                </div>  
                            </div>
                            <div class="row50">
                                <div class="inputBox">
                                    <span>Check In</span>
                                    <input type="date" name="cIn" value="<?=$row['Check_In'];?>" placeholder="Enter Check In">
                                </div>
                                <div class="inputBox">
                                    <span>Check Out</span>
                                    <input type="date" name="cOut" value="<?=$row['Check_Out'];?>" placeholder="Enter Check Out">
                                 </div>
                            </div>
                            <div class="row50">
                                <div class="inputBox">
                                    <span>Reservation Status</span>
                                    <select name="reserveStatus" class="option" placeholder="Reservation" style="width: 100%;padding: 10px 0;font-size: 16px;color: cornflowerblue;" required>
                                        <option value="Paid" <?=($row['Reservation_Status'] == 'Paid') ? 'selected' : ''?>>Paid</option>
                                        <option value="Unpaid" <?=($row['Reservation_Status'] == 'Unpaid') ? 'selected' : ''?>>Unpaid</option>
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
                    <iframe src="https://www.google.com/maps/embed/v1/place?key=YOUR_API_KEY&q=Hotel UiTM Shah Alam&center=3.0674508,101.5050583&zoom=11" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                strings: ["Reservation_ID", "Member_ID", "Room ID","Check In","Check Out", "Reservation Status"],
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