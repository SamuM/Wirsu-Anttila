

<div class="container">
<div class="uu-wrapper">
<h1>Paavon Pakinat</h1>

	<table>
		<tr>
			<th>Julkaisu aika</th>
			<th>Otsikko</th>
			<th>Esittely</th>
			<th>Katso</th>
		</tr>
<?php

			$kysely = $db->prepare('SELECT postID, postTitle, postDesc, postDate FROM pakinat ORDER BY postID desc');
			$kysely->execute();



			while($rivi = $kysely->fetch()){
				

				echo '<tr>';

					echo '<td>'.$rivi['postDate'].'</td>';
					echo '<td>'.$rivi['postTitle'].'</td>';
					echo '<td>'.$rivi['postDesc'].'</td>';
					echo '<td><a href="index.php?pakinaID='.$rivi['postID'].'">Lue</a></td>';

				echo '</tr>';
				
				
			}


			

		?>


	</table>




</div>
</div>