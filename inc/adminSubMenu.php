<?php
/**
 * Created by PhpStorm.
 * User: Hituc
 * Date: 28.9.2014
 * Time: 17:31
 */



?>

<div class="adminSubMenu">

    <?php

    if(isset($_SESSION['adminHeader'])) {

    if($_SESSION['adminHeader'] == 'showAdminMenu'){
        if($_SESSION['adminSubMenu'] == 'uusiuutinen'){

    ?>

        <ol class="submenu">
            <li><a href="./index.php?uusiuutinen">Lisää uusi</a></li>
            <li><a href="./index.php?muokkaauutista">Muokkaa</a></li>
            <li><a href="#">Linnki</a></li>
            <li><a href="#">Linnki</a></li>
        </ol>

    <?php
    }elseif($_SESSION['adminSubMenu'] == 'adminBlog'){ ?>

     <?php
    }}
    ?>



    <?php } ?>


</div>