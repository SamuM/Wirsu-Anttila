<?php
    $pageTitle = "Wirsu-Anttila Sukusivusto";
    $section = "";
    require_once("config/db.php");

    // Lataa login classin
    require_once("classes/Login.php");
    $login = new Login();
    if ($login->isUserLoggedIn() == true) { 
         include('inc/header.php');
    }
    else{
        include('inc/loginHeader.php');
      }  
   

/**
 * A simple, clean and secure PHP Login Script / MINIMAL VERSION
 * For more versions (one-file, advanced, framework-like) visit http://www.php-login.net
 *
 * Uses PHP SESSIONS, modern password-hashing and salting and gives the basic functions a proper login system needs.
 *
 * @author Panique
 * @link https://github.com/panique/php-login-minimal/
 * @license http://opensource.org/licenses/MIT MIT License
 */

// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("libraries/password_compatibility_library.php");
}

// include the configs / constants for the database connection


// Luo login objektin


// Näyttää jos käyttäjä on kirjautunut
if ($login->isUserLoggedIn() == true) {
//Controlleri actioneille


    if(isset($_GET["paavonpakinat"])){
        include("views/paavonpakinat.php");
    }         
    elseif(isset($_GET["valokuvat"])){
        include("views/valokuvat.php");
    }
    elseif(isset($_GET["videot"])){
        include("views/videot.php");
    }  
    elseif(isset($_GET["aaninauhat"])){
        include("views/aaninauhat.php");
    }
    elseif(isset($_GET["uutisID"])){
        include("views/katsouutinen.php");
    }
    elseif(isset($_GET["wirsublog"])){
        include("views/wirsublog.php");
    }
    elseif(isset($_GET["admin"])){      //Tarkistaa onko käyttäjä admin
        foreach ($admins as $admin) {
            if($_SESSION["user_name"] == $admin['admin_username']){
                include("views/admin/adminmain.php");
                break;
            }            
        }
    }  
    elseif(isset($_GET["uusiuutinen"])){      //Tarkistaa onko käyttäjä admin
        foreach ($admins as $admin) {
            if($_SESSION["user_name"] == $admin['admin_username']){
                include("views/admin/lisaauutinen.php");
                break;
            }            
        }
    } 
    elseif(isset($_GET["muokkaauutista"])){      //Tarkistaa onko käyttäjä admin
        foreach ($admins as $admin) {
            if($_SESSION["user_name"] == $admin['admin_username']){
                include("views/admin/muokkaauutista.php");
                break;
            }            
        }
    }
    elseif(isset($_GET["muokkaauutisID"])){      //Tarkistaa onko käyttäjä admin
        foreach ($admins as $admin) {
            if($_SESSION["user_name"] == $admin['admin_username']){
                include("views/admin/uutisedit.php");
                break;
            }            
        }
    }
    elseif(isset($_GET["lisaakuva"])){      //Tarkistaa onko käyttäjä admin
        foreach ($admins as $admin) {
            if($_SESSION["user_name"] == $admin['admin_username']){
                include("views/admin/lisaakuva.php");
                break;
            }            
        }
    }
    elseif(isset($_GET["uusipakina"])){      //Tarkistaa onko käyttäjä admin
        foreach ($admins as $admin) {
            if($_SESSION["user_name"] == $admin['admin_username']){
                include("views/admin/lisaapakina.php");
                break;
            }            
        }
    }
    elseif(isset($_GET["muokkaapakina"])){      //Tarkistaa onko käyttäjä admin
        foreach ($admins as $admin) {
            if($_SESSION["user_name"] == $admin['admin_username']){
                include("views/admin/muokkaapakina.php");
                break;
            }            
        }
    }
    elseif(isset($_GET["muokkaapakinaID"])){      //Tarkistaa onko käyttäjä admin
        foreach ($admins as $admin) {
            if($_SESSION["user_name"] == $admin['admin_username']){
                include("views/admin/pakinaedit.php");
                break;
            }            
        }
    }
    else{
        include("views/main.php"); // käyttäjä on kirjautunut
    }
   
   

} else {
    // Käyttäjä ei ole kirjautunut sisään
    include("views/not_logged_in.php"); 
}

include('inc/footer.php'); 
?>
