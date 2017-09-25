<?php

    function page_writeSideBar()
    {
        //Replace with actual login process
        session_start();
        $isLoggedIn = loginCheck();

        if ($isLoggedIn == true) {
            //Header('Location:'."?siteId=1");
            echo '<a href="?siteId=1" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>';
            echo '<a href="?siteId=2" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Vorwort</a>';
            echo '<a href="?siteId=3" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Eigenschaften</a>';
            echo '<a href="?siteId=4" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Aufgaben</a>';
            echo '<a href="?siteId=5" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Anmeldung Schlosslauf</a>';
            echo '<a href="?siteId=6" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Logout</a>';
        } else {
            echo '<a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Login</a>';
        }
    }

    function page_writeContent(){

        $isLoggedIn = loginCheck();

        if ($isLoggedIn == true) {
            echo '<h1>Title</h1><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>';

        } else {
            echo file_get_contents('./assets/include/loginPage.php');
            $error = "<div class='failedLogin'>Username or Password is invalid</div>";
            echo $error;
        }
    }

function loginCheck() {
        $isLoggedIn = false;


    if (!empty($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $error = "Username or Password is invalid";
        } else {
            // Define $username and $password
            $user=$_POST['username'];
            $password=sha1($_POST['password']);
            // Establishing Connection with Server by passing server_name, user_id, password and database as a parameter
            $connection = mysqli_connect("localhost", "root", "", "castlerun");
            // To protect MySQL injection for Security purpose
            $user = stripslashes($user);
            $password = stripslashes($password);
            //$mail = mysqli_real_escape_string($connection, $mail);
            $password = mysqli_real_escape_string($connection, $password);
            // SQL query to fetch information of registerd users and finds user match.
            $query = mysqli_query($connection, "select * from users where Password like '".$password."' AND Name like '".$user."'");
            $rows = mysqli_num_rows($query);
            if ($rows == 1) {
                $_SESSION['login_user']=$user; // Initializing Session
                $isLoggedIn = true;
            } else {
                //$error = "<div class='failedLogin'>Username or Password is invalid</div>";
                //echo $error;
                $_SESSION['login_failure'] = 'true';
                $isLoggedIn = false;
            }
            mysqli_close($connection); // Closing Connection
        }
    }
    return $isLoggedIn;
}

?>