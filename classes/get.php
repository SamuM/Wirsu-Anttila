<?php 
require_once("../config/db.php");


	$id = addslashes($_REQUEST['id']);
	

	$image = $db->prepare('SELECT kuva FROM valokuvat WHERE kuvaID = :id ');
	$image->execute(array(
		':id' => $id
		));

	

	$image->bindColumn('kuva', $kuva, PDO::PARAM_LOB);


	$image->fetch(PDO::FETCH_BOUND);
	

	header("Content-type: image");	

?> 