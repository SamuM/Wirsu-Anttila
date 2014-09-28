<?php


    if(isset($_GET["etusivu"])){      //Tarkistaa onko käyttäjä admin
        foreach ($admins as $admin) {
            if($_SESSION["user_name"] == $admin['admin_username']){
                $_SESSION['adminHeader'] = 'dontShowAdminMenu';

                break;
            }
        }
    }
    elseif(isset($_GET["admin"])){      //Tarkistaa onko käyttäjä admin
        foreach ($admins as $admin) {
            if($_SESSION["user_name"] == $admin['admin_username']){
                $_SESSION['adminHeader'] = 'showAdminMenu';

                break;
            }
        }
    }
    elseif(isset($_GET["uusiuutinen"])){      //Tarkistaa onko käyttäjä admin
        foreach ($admins as $admin) {
            if($_SESSION["user_name"] == $admin['admin_username']){
                $_SESSION['adminSubMenu'] = 'uusiuutinen';
                break;
            }
        }
    }else{
        $_SESSION['adminSubMenu'] = 'noForward';
    }





?>