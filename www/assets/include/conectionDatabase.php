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

/*
        //$text = "insert into sets (userFK, setName, languange1, language2) values ((select userID from user where mail = '". $_SESSION['login_user'] . "'), '".$setName."', '".$languageOne."', '".$languageTwo."')";
        $query = mysqli_query($connection, "insert into sets (userFK, setName, language1, language2) values ((select userID from user where mail = '". $_SESSION['login_user'] . "'), '".$setName."', '".$languageOne."', '".$languageTwo."')");
        if ($query) {
            mysqli_close($connection);
            echo 'success';
            header("location: ../../pages/dashboard.php");
        }
        else {
            echo 'An error occured...';
        }
        mysqli_close($connection);
    }
}*/

function getPage (){

}

function login() {

}

function createUser() {

}

function registration() {
    $query = mysqli_query(connectDB(), "insert into `words`(word1, word2) values ('" . $word1 . "', '" . $word2 . "')");

    /*$connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..
    $word1 = mysqli_real_escape_string($connection, $wordOne);
    $word2 = mysqli_real_escape_string($connection, $wordTwo);
    $query = mysqli_query($connection, "insert into `words`(word1, word2) values ('" . $word1 . "', '" . $word2 . "')");
    if ($query) {
        $query2 = mysqli_query($connection, "insert into `word_set` (setFK, wordFK) VALUES ((select setID from sets WHERE setName like '" . $_SESSION['set'] . "'),(select wordID from words WHERE word1 like '" . $word1 . "' and word2 like '" . $word2 . "'))");
        if ($query2) {
            echo "Words Successfully added.....";
            header("location: editvocabulary.php");
        } else {
            echo "Error..5..!!";
            mysqli_query($connection, "delete from words where wordID like (select wordID from words WHERE word1 like '" . $word1 . "' and word2 like '" . $word2 . "')");
            header("location: editvocabulary.php");
        }
    } else {
        echo "Error....!!";
        mysqli_query($connection, "delete from words where wordID like (select wordID from words WHERE word1 like '" . $word1 . "' and word2 like '" . $word2 . "')");
        header("location: editvocabulary.php");
    }
    mysqli_close($connection);*/
}