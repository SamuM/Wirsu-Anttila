<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>

  <?php 

  

  	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		require_once("./classes/upload_pakinat.php");
   		$uppi = new uppaaKuvat();

		//very basic validation
		if($postTitle ==''){
			$error[] = 'Lisää otsikko.';
		}
		if($postCont ==''){
			$error[] = 'Lisää sisältö.';
		}

		if(!isset($error)){

			try {

				//insert into database
				$sql = $db->prepare('INSERT INTO pakinat (postTitle,postCont,postDate) VALUES (:postTitle, :postCont, :postDate)');				
				$sql->execute(array(
					':postTitle' => $postTitle, //hakee datan formista $postTitle on formin post title jne...								
					':postCont' => $postCont,					
					':postDate' => date('Y-m-d H:i:s')
				));

				$pakinaid = $db->lastInsertId();

				$uppi->uppaakuvat($_FILES['file'], $_POST);

				$paavontekstiid = $db->lastInsertId();

				$sql = $db->prepare('INSERT INTO pakinakuvat (kuvaID,postID) VALUES (:kuvaID, :postID)');				
				$sql->execute(array(
					':kuvaID' => $paavontekstiid, //hakee datan formista $postTitle on formin post title jne...	
					':postID' => $pakinaid
				));

				//redirect to index page
				header('Location: ../index.php?paavonpakinat');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

		
  ?>

  <div class="container">


  	<div class="admin-wrapper">
  	

  	<?php if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}?>




  <form action="../classes/upload_pakinat.php" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td><label for="otsikko">Kuvan otsikko:</label></td>
			<td><input type="text" name="otsikko" id="otsikko" placeholder="Kuvaus"></td>
		</tr>
		<tr>
			<td><label for="file">Tiedosto:</label></td>
			<td><input type="file" name="file[]" id="file"></td>
		</tr>
		<tr>
			<td><label for="file">Tiedosto:</label></td>
			<td><input type="file" name="file[]" id="file"></td>
		</tr>
		<tr>
			<td><label for="file">Tiedosto:</label></td>
			<td><input type="file" name="file[]" id="file"></td>
		</tr>

		<p><label>Otsikko</label><br />
		<input type='text' name='postTitle' value=''<?php if(isset($error)){ echo $_POST['postTitle'];} ?>''></p>
		<p><label>Sisältö</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postCont'];}?></textarea></p>

		<p><input type='submit' name='submit' value='Submit'></p>

		<tr>
			<td></td>
			<td><button type="submit" name="submit" value="Submit"><i class="fa fa-plus"></i> Lisää</button></td>
		</tr>
</table>
</form>

	</div>

	</div>