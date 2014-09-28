<html>
<head>
	<title><?php echo $pageTitle; ?></title>

	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
	<link rel="stylesheet" href="css/normalize.css" type="text/css">
	<link rel="stylesheet" href="css/main.css" type="text/css">	
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
	<script src="../js/javascript.js"></script>
	<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
</head>
<body>
<?php 
	//Hakee DB conffit
	require_once("./config/db.php");
	require_once("./classes/Login.php");
    require("./config/session.php");



?>

<header>
	<h1>Wirsu-Anttila</h1>
	<div class="menu-container">
	<div class="menu-wrapper">

    <?php

    if(isset($_SESSION['adminHeader'])) {

        if($_SESSION['adminHeader'] == 'showAdminMenu'){


        ?>
            <div class="admin-menu">

                <ol>

                    <li class="menu1">
                        <a href="./index.php?uusiuutinen"><span>Uutiset </i></span> </a>

                    </li>
                    <li class="menu2">
                        <a href="./index.php?adminBlog"><span>Wirsu-Anttila Blogi </span></a>
                        <ol class="submenu">
                            <li><a href="#">Lisää uusi</a></li>
                            <li><a href="#">Muokkaa</a></li>
                            <li><a href="#">Linnki</a></li>
                            <li><a href="#">Linnki</a></li>
                        </ol>
                    <li class="menu3">
                        <a href="./index.php?uusipakina""><span>Paavon Pakinat </span></a>
                        <ol>
                            <li><a href="./index.php?uusipakina">Lisää uusi</a></li>
                            <li><a href="./index.php?muokkaapakina">Muokkaa</a></li>
                            <li><a href="#">Linnki</a></li>
                            <li><a href="#">Linnki</a></li>
                        </ol>
                    </li>
                    <li class="menu4">
                        <a href="#"><span>Valokuvat </span></a>
                        <ol>
                            <li><a href="./index.php?lisaakuva">Lisää uusi</a></li>
                            <li><a href="#">Muokkaa</a></li>
                            <li><a href="#">Linnki</a></li>
                            <li><a href="#">Linnki</a></li>
                        </ol>
                    </li>
                    <li class="menu5">
                        <a href="#"><span>Videot </span></a>
                        <ol>
                            <li><a href="#">Lisää uusi</a></li>
                            <li><a href="#">Muokkaa</a></li>
                            <li><a href="#">Linnki</a></li>
                            <li><a href="#">Linnki</a></li>
                        </ol>
                    </li>
                    <li class="menu6">
                        <a href=""><span>Ääninauhat </span></a>
                        <ol>
                            <li><a href="#">Lisää uusi</a></li>
                            <li><a href="#">Muokkaa</a></li>
                            <li><a href="#">Linnki</a></li>
                            <li><a href="#">Linnki</a></li>
                        </ol>
                    </li>
                    <li class="menu7">
                        <a href="index.php?etusivu">Palaa Etusivulle</a>
                    </li>
                </ol>

            </div>
           <?php }else{ ?>
        <ul>
                <li><a href="index.php">Uutiset</a></li>
                <li><a href="index.php?wirsublog">Wirsu-Anttila Blogi</a></li>
                <li><a href="index.php?paavonpakinat">Paavon Pakinat</a></li>
                <li><a href="index.php?valokuvat">Valokuvat</a></li>
                <li><a href="index.php?videot">Videot</a></li>
                <li><a href="index.php?aaninauhat">Ääninauhat</a></li>
        </ul>
          <?php }}?>
	</div>

<div class="menu-logout">
	<p class="">Hei, <?php echo $_SESSION['user_name']; ?>! <span id="settings">Asetukset
	<a class="fa fa-cog ratas"></a></span></p>

	<div id="user-menu"> 

		<ol>
			<li><a href="index.php?logout">Kirjaudu ulos</a></li>
			<li><a href="index.php?asetukset">Asetukset</a></li>
			<?php
				// Näyttää admin linkin jos on käyttäjä on admin
				foreach ($admins as $admin) {
					if($_SESSION["user_name"] == $admin['admin_username']){

			 ?>
				
					<li><a href="index.php?admin">Ylläpito</a></li>
			<?php 
					
					break;
					}
				}
			?> 
		</ol>

	</div>
	

</div>
</div>
</header>