<?php

function page_writeSideBar()
{
    //Replace with actual login process
    $isLoggedIn = false;

    if ($isLoggedIn == true) {
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
    //Replace with actual login process
    $isLoggedIn = false;

    if ($isLoggedIn == true) {
        echo '<h1>Title</h1><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>';
    } else {
        echo file_get_contents('./assets/include/loginPage.php');
    }
}
?>