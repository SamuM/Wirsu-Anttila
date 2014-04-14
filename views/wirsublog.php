<?php
	$pageTitle = "Wirsu-Anttila Blogi";
	$section = "";
?>

	<div class="container">
	<div class="uu-wrapper">
		<h1>Wirsu-Anttila Blogi</h1>
		
		<?php
		// luo tietokantakyselyn		
		$kysely = $db->prepare("SELECT postID, postTitle, postCont, postDate FROM wirsu_blog ORDER BY postID desc");
		$kysely->execute();


		// Tulostetaan data while loopissa

		while ($row = $kysely->fetch()) {
			echo '<div class="uutinen">';
				echo '<h1>'.utf8_encode($row['postTitle']).'</h1>';
				echo '<p>Julkaistu '.date('j'.'.'.'m'.'.'.'Y', strtotime($row['postDate'])).'</p>';		
				echo '<p>'.$row['postCont'].'</p>';	
				/*echo '<p><a href="index.php?uutisID='.$row['postID'].'">Lue lisää</a></p>';	*/
			echo '</div>';
			}

		?>		

		</div>
	</div>	