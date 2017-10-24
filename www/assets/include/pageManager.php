<?php

if (isset($_POST['anmeldung']) && $_POST['anmeldung'] === "Absenden"){
    include_once "conectionDatabase.php";
    anmeldung();
    header('Location: ../../index.php');
}
if (isset($_POST['register'])){
    include_once "conectionDatabase.php";
    createUser();
    header('Location: ../../index.php');
}
    function page_writeSideBar()
    {
        $isLoggedIn = isLoggedIn();

        if ($isLoggedIn == true) {

            foreach (getTitles() as $title) {
                /*echo print_r($title);*/
                echo '<a href="?siteId=';
                echo  $title['id'];
                echo '" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">';
                echo $title['title'];
                echo '</a>';
            }
        } else {
            echo '<a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Login</a>';
        }
    }

    function page_writeContent(){
        $isLoggedIn = isLoggedin();

        if ($isLoggedIn == true) {
            foreach (getPage() as $page) {
                echo $page;
            }
            //echo '<h1>Title</h1><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>';

        } else {
            echo file_get_contents('./assets/include/loginPage.php');

        }
    }

function isLoggedIn() {
        if(isset($_POST['submit'])) {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $verify = $_POST["password"];
                login($verify);
            }
        }

    $loggedin = false;

        if (isset($_SESSION['login_user'])) {
            $loggedin = true;
        }
    return $loggedin;
}

function logout() {
    header('Location: index.php');
    session_unset();
    session_destroy();
}
?>