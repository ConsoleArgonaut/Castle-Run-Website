<?php
/**
 * Created by PhpStorm.
 * User: Drake
 * Date: 24.09.2017
 * Time: 14:44
 */

@session_start();

function connectDB(){
    $connection = mysqli_connect("localhost", "root", "", "castlerun"); // Establishing connection with server..
    return $connection;
}

function getTitles (){
    $query = mysqli_query(connectDB(), "select id, title from `pages`");
    mysqli_close(connectDB()); // Closing Connection
}

function getPage (){
    $query = mysqli_query(connectDB(), "select text from `pages` where Id like ".GET[siteId]);
    echo $query;
    mysqli_close(connectDB()); // Closing Connection
}

function login() {
    // Define $username and $password
    $name=$_POST['name'];
    $password=sha512($_POST['password']);
    // Establishing Connection with Server by passing server_name, user_id, password and database as a parameter
    $name = stripslashes($name);
    $password = stripslashes($password);
    $password = mysqli_real_escape_string(connectDB(), $password);
    // SQL query to fetch information of registerd users and finds user match.
    $query = mysqli_query(connectDB(), "select * from user where pw like '".$password."' AND mail like '".$name."'");
    $rows = mysqli_num_rows($query);
    if ($rows == 1) {
        $_SESSION['login_user'] = $name; // Initializing Session
    } else {
        $error = "Username or Password is invalid";
        echo $error;
        $_SESSION['login_failure'] = 'true';
    }
    mysqli_close(connectDB()); // Closing Connection
}

function createUser() {
    $name=$_POST['name'];
    $password=sha512($_POST['password']);
    $name = stripslashes($name);
    $password = stripslashes($password);
    $password = mysqli_real_escape_string(connectDB(), $password);
    $query = mysqli_query(connectDB(), "insert into `users` (`Name`, Password, IsAdmin) VALUES ('".$name."', '".$password."', '".POST['IsAdmin']."')");
    mysqli_close(connectDB()); // Closing Connection
}

function registration() {
    $query = mysqli_query(connectDB(), "insert into `registration`(FirstName, LastName, Street, City, PLZ, EMail, Team, Country, Languages) 
                                               values ('".POST['FirstName']."', '".POST['LastName']."', '".POST['Street']."', '".POST['City']."', '".POST['PLZ']."', '".POST['EMail']."', '".POST['Team']."', '".POST['Country']."', '".POST['Language']."')");
    if ($query) {
        echo "Participant Successfully added.....";
    } else {
        echo "Error....!!";
    }
    mysqli_close(connectDB());
}
