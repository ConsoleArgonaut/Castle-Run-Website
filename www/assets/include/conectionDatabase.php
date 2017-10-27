<?php
/**
 * Created by PhpStorm.
 * User: Drake
 * Date: 24.09.2017
 * Time: 14:44
 */

@session_start();
include_once "pageManager.php";

function connectDB(){
    $connection = mysqli_connect("localhost", "root", "", "castlerun"); // Establishing connection with server..
    /*$stmt = mysqli_prepare($connection, "select text from `pages` where Id =  ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);*/
    if($connection){
        //mysqli_query($connection, "SET NAMES utf8;");
        $stmt = mysqli_prepare($connection, "SET NAMES utf8;");
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    return $connection;
}

function getTitles (){
    GLOBAL $titles;
    $titles = array();
    $conn = connectDB();
    $notAdmin = userAdminCheck();
    if ($notAdmin == false){
        $stmt = mysqli_prepare($conn, "select id, title from `pages` WHERE OnlyAdmin LIKE FALSE");
        mysqli_stmt_execute($stmt);
        $text = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($text)) {
            array_push($titles, $row);
        }
        mysqli_stmt_close($stmt);
        mysqli_close(connectDB()); // Closing Connection
    } else {
        $stmt = mysqli_prepare($conn, "select id, title from `pages`");
        mysqli_stmt_execute($stmt);
        $text = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($text)) {
            array_push($titles, $row);
        }
        mysqli_stmt_close($stmt);
        mysqli_close(connectDB()); // Closing Connection
    }
    return $titles;
}

function getPage (){
    GLOBAL $titles;
    $conn = connectDB();
    $adminCheck = userAdminCheck();
    if ($adminCheck == false) {
        if (!isset($_GET['siteId'])) {
            $id = 1;
            //$query = mysqli_query(connectDB(), "select text from `pages` where Id like ". $id);
            $stmt = mysqli_prepare($conn, "select text from `pages` where Id =  ? AND OnlyAdmin LIKE FALSE");
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
        } else {
            if (stripos($titles[$_GET['siteId'] - 3]['title'], "Logout", 0) !== FALSE) {
                logout();
            }
            //$stmt = mysqli_query(connectDB(), "select text from `pages` where Id like ". $_GET['siteId']);
            $stmt = mysqli_prepare($conn, "select text from `pages` where Id = ? AND OnlyAdmin LIKE FALSE");
            $id = $_GET['siteId'];
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
        }
        //mysqli_stmt_bind_result($stmt, $text);
        $text = mysqli_stmt_get_result($stmt);
        $page = mysqli_fetch_object($text);
        mysqli_stmt_close($stmt);
        mysqli_close(connectDB()); // Closing Connection
    } else {
        if (!isset($_GET['siteId'])) {
            $id = 1;
            //$query = mysqli_query(connectDB(), "select text from `pages` where Id like ". $id);
            $stmt = mysqli_prepare($conn, "select text from `pages` where Id =  ?");
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
        } else {
            if (stripos($titles[$_GET['siteId'] - 1]['title'], "Logout", 0) !== FALSE) {
                logout();
            }
            //$stmt = mysqli_query(connectDB(), "select text from `pages` where Id like ". $_GET['siteId']);
            $stmt = mysqli_prepare($conn, "select text from `pages` where Id = ?");
            $id = $_GET['siteId'];
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
        }
        //mysqli_stmt_bind_result($stmt, $text);
        $text = mysqli_stmt_get_result($stmt);
        $page = mysqli_fetch_object($text);
        mysqli_stmt_close($stmt);
        mysqli_close(connectDB()); // Closing Connection
    }
    return $page;
}

function login($verify) {
    // Define $username and $password
    $conn = connectDB();
    $name = $_POST['username'];
    $password = $_POST['password'];
    if ($verify === $password) {
        $password = hash('sha512', $password);
        // Establishing Connection with Server by passing server_name, user_id, password and database as a parameter
        $name = stripslashes($name);
        $password = stripslashes($password);
        $password = mysqli_real_escape_string(connectDB(), $password);
        // SQL query to fetch information of registered users and finds user match.
        //$query = mysqli_query(connectDB(), "select * from users where `Name` like '" . $name . "' AND Password like '" . $password . "'");
        $stmt = mysqli_prepare($conn, "select * from users where `Name` like ? AND Password like ?");
        mysqli_stmt_bind_param($stmt, 'ss', $name, $password);
        mysqli_stmt_execute($stmt);
        $query = mysqli_stmt_get_result($stmt);

        $rows = mysqli_num_rows($query);
        if ($rows == 1) {
            $_SESSION['login_user'] = $name; // Initializing Session
            $_SESSION['login_failure'] = 'false';
        } else {
            $_SESSION['login_failure'] = 'true';
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close(connectDB()); // Closing Connection
}

function createUser() {
    $conn = connectDB();
    $name=$_POST['name'];
    $password=hash('sha512', $_POST['password']);
    $name = stripslashes($name);
    $password = stripslashes($password);
    $password = mysqli_real_escape_string(connectDB(), $password);

    //$query = mysqli_query(connectDB(), "insert into `users` (`Name`, Password, IsAdmin) VALUES ('".$name."', '".$password."', '".$_POST['IsAdmin']."')");
    $stmt = mysqli_prepare($conn, "insert into `users` (`Name`, Password, IsAdmin) VALUES (?, ?, ?)");
    if (isset($_POST['isAdmin'])){
        $admin = 1;
    } else {
        $admin = 0;
    }
    mysqli_stmt_bind_param($stmt, 'ssi', $name, $password, $admin);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn); // Closing Connection
}

function anmeldung() {
    $conn = connectDB();

    //$query = mysqli_query(connectDB(), "insert into `registration`(FirstName, LastName, Street, City, PLZ, EMail, Team, Country, Languages) values ('".$_POST['FirstName']."', '".$_POST['LastName']."', '".$_POST['Street']."', '".$_POST['City']."', '".$_POST['PLZ']."', '".$_POST['EMail']."', '".$_POST['Team']."', '".$_POST['Country']."', '".$_POST['Language']."')");
    $stmt = mysqli_prepare($conn, "insert into `regristration`(`FirstName`, `LastName`, `Street`, `City`, `PLZ`, `EMail`, `Team`, `Country`, `Language`) values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'sssssssss', $_POST['Vorname'],$_POST['Name'],$_POST['Strasse'],$_POST['Ort'],$_POST['PLZ'],$_POST['Mail'],$_POST['Gruppe'],$_POST['Land'],$_POST['Sprache']);
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        echo "Participant Successfully added.....";
    } else {
        echo "Error....!!";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

function userAdminCheck(){
    $conn = connectDB();
    $name = $_SESSION['login_user'];
    $adminCheck = true;
    $admin = array();
    $stmt = mysqli_prepare($conn, "select * from `users` WHERE `Name` LIKE ? and IsAdmin like FALSE");
    mysqli_stmt_bind_param($stmt, 's', $name);
    $done = mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)){
        array_push($admin, $row);
        foreach ($row as $r){
            if ($name === $r){
                $adminCheck = false;
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $adminCheck;
}
