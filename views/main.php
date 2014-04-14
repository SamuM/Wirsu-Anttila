<?php
	$pageTitle = "Wirsu-Anttila Sukusivusto";
	$section = "";
?>



	<div class="container">
		
		<div class="uu-wrapper">
		<h1>Uutiset</h1>
		<?php
		// luo tietokantakyselyn		
		$kysely = $db->prepare("SELECT postID, postTitle, postCont, postDate FROM uutiset ORDER BY postID desc");
		$kysely->execute();


		// Tulostetaan data while loopissa

		while ($row = $kysely->fetch()) {
			echo '<div class="uutinen">';
				echo '<h1>'.$row['postTitle'].'</h1>';
				echo '<p>Julkaistu '.date('j'.'.'.'m'.'.'.'Y', strtotime($row['postDate'])).'</p>';		
				echo '<p>'.$row['postCont'].'</p>';				
			echo '</div>';
			
			}

		?>		

		</div>
	</div>	



