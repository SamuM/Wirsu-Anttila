
<script src="./js/lightbox-2.6.min.js"></script>
<link href="./css/lightbox.css" rel="stylesheet" />


<div class="container">
<div class="uu-wrapper">
<h1>Valokuvat</h1>
	<section id="photos">

		<?php

			$kysely = $db->prepare('SELECT kuvaID, kuvaotsikko, kuvaURL, kuvaThumb FROM valokuvat ORDER BY kuvaID desc');
			$kysely->execute();



			while($rivi = $kysely->fetch()){
				echo utf8_decode('<a href="'.$rivi['kuvaURL'].'" data-lightbox="albumi" class="kuva" title="'.$rivi['kuvaotsikko']).'">';
						echo utf8_decode('<img src="'.$rivi['kuvaThumb'].'" alt="Thumbnail" />');
				echo '</a>';
			}


			

		?>

	</section>
</div>
</div>