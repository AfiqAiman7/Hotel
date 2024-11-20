<!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="StaffPage.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <!--<title>Dashboard Sidebar Menu</title>--> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="image/staff.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Staff</span>
                    <span class="profession">Hotel Booking System</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="StaffPage.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Registration</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">System List</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="frmupdmember.php">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Member Update</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Add Book</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Book Update</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="Login.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text" onclick="return confirm('Are You Sure Want To Log Out?')">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">
        <div class="text">Member List Details
            <form>
                <table align="center" border="1">
                    <tr>
                        <th>MEMBER ID</th>
                        <td>MEMBER NAME</td>
                        <td>GENDER</td>
                        <td>PHONE NUMBER</td>
                        <td>ADDRESS</td>
                        <td colspan="2">ACTION</td>
                    </tr>
                    
                    <?php
                        $dbc = mysqli_connect("localhost","root","","hotel");

                        if (mysqli_connect_errno())
                        {
                            echo "Failed to connect to MySQL : ".mysqli_connect_error();
                        }

                        $sql = "select * from member";
                        $result = mysqli_query($dbc, $sql);
                        while($list = mysqli_fetch_assoc($result))
                        {
                            Print '<tr>
                            <td>'.$list['Member_ID'].'</td>
                            <td>'.$list['Member_Name'].'</td>
                            <td>'.$list['Member_Gender'].'</td>
                            <td>'.$list['Member_Birth'].'</td>
                            <td>'.$list['Member_PhoneNum'].'</td>
                            <td>'.$list['Member_Address'].'</td>
                            <td>
                                <a href="FormUpdateMember.php?ID='.$list['Member_ID'].'">Update</a>
                            </td>
                            <td>
                                <a href="FormUpdateMember.php?ID='.$list['Member_ID'].'">Delete</a>
                            </td>
                            </tr>';
                        }
                    ?>
                </table>
        </form>
        </div>
    </section>

    <script>
        const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});
    </script>

</body>
</html>