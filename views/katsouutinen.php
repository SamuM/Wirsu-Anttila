<?php
		// luo tietokantakyselyn		
		$kysely = $db->prepare("SELECT postID, postTitle, postCont, postDate FROM uutiset WHERE postID = :postID");
		$kysely->execute(array(':postID' => $_GET['uutisID']));
		$row = $kysely->fetch();
?>	


		<div class="container">

		
<?php 
	
		echo '<div class="uutinen">';
				echo '<h1>'.$row['postTitle'].'</h1>';
				echo '<p>Julkaistu '.date('j'.'.'.'m'.'.'.'Y', strtotime($row['postDate'])).'</p>';
				echo '<p>'.$row['postCont'].'</p>';				
			echo '</div>';
?>		

 		
			
		</div>

