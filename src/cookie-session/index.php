<?php

// This allow you show the error on the browser when developing
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ini_set("session.gc_maxlifetime", 60);


// Include router class
require 'src/helpers/router.php';
require 'src/common/functions.php';

// the time to that the session will live (second), after this time the session will be destroy
// session_cache_expire(1);
session_start();

$parsed_url = parse_url($_SERVER['REQUEST_URI']);

if (!isset($_SESSION['LOGGED_IN']) && $parsed_url['path'] != '/' && $parsed_url['path'] != '/login') {
    header('Location: /');
    die();
}


// Add base route (startpage)
Route::add('/', function() { include 'src/home/index.php'; });

Route::add('/home', function() { include 'src/home/index.php'; });

Route::add('/users', function() { include 'src/users/index.php'; });

// Simple test route that simulates static html file
Route::add('/test.html',function(){
    echo 'Hello from test.html';
});


// // Post route example
// Route::add('/contact-form',function(){
//     echo '<form method="post"><input type="text" name="test" /><input type="submit" value="send" /></form>';
// },'get');

// Post route example
// After login, I redirect it to home page again.
Route::add('/login', function() {
    if ( !empty( $_POST ) ) {
        $username = $_POST['username'];
        $pass = $_POST['password'];

        if ( isset($username) && isset($pass) ) {
            if ( isUserValid($username, $pass)) {
                $_SESSION['LOGGED_IN'] = $username;
                $_SESSION['USERNAME'] = $_POST['username'];
            }

            if (isset($_POST['rememberUsername'])) {
                setcookie('username', $username, time() + (24 * 60 * 60 * 5), "/"); // 5 days
            }
        }
    }

    header('Location: /');
    exit;
}, 'post');

Route::add('/logout', function() {
    destroySession();
    header('Location: /');
    die();
}, 'get');


Route::run('/');




////////////////////////////////////////////////
//////
////////////

function isUserValid($username, $password) {
	return $username == 'pav' && $password == '123';
}

// $filehandle = 'test.log';

// // https://www.quora.com/What-is-the-best-way-to-detect-a-close-browser-event
// while(true) {
//     if (connection_aborted()) {
//         fwrite($filehandle, 'aborted!');
//         break;
//     } else {
//         sleep(60);
//         fwrite($filehandle, 'conteced');
//     }
// }
