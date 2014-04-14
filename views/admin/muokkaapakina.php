<?php 
	$kysely = $db->prepare("SELECT postID, postTitle, postDate FROM pakinat ORDER BY postID desc");
		$kysely->execute();
?>

  <div class="container">

  	<?php include('adminmenu.php'); ?>
  	<div class="admin-wrapper">
  	

  		<div class="container-case">
  			<table>
          <thead>
  				<tr>
  					<th>Otsikko</th>
  					<th>Julkaistu</th>
  					<th></th>
  				</tr>
          </thead>
          <tbody>
  		<?php	
  			while ($rivi = $kysely->fetch()) {  					
  					
  				echo '<tr>';

  				echo '<td>'.$rivi['postTitle'].'</td>';
  				echo '<td>'.date('j'.'.'.'m'.'.'.'Y', strtotime($rivi['postDate'])).'</td>';
  				echo '<td><a href="index.php?muokkaapakinaID='.$rivi['postID'].'">Muokkaa</a></td>';

  				echo '</tr>';

  				}
  		?>		
        </tbody>
  			</table>

  		</div>

	</div>

	</div>