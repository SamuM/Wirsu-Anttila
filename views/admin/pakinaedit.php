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
	$kysely = $db->prepare('SELECT postID, pakinakuvatID, postTitle, postDesc, postCont, postDate FROM pakinat WHERE postID = :postID');
	$kysely->execute(array(':postID'=>$_GET['muokkaapakinaID']));
		

	$rivi = $kysely->fetch();

	if(isset($_POST['poista'])){
		$sql = $db->prepare('DELETE FROM uutiset WHERE postID = :postID');
		$sql->execute(array(':postID' => $_GET['muokkaapakinaID']));

		header('Location: index.php?muokkaapakina');
				exit;
	}

	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation
		if($postID ==''){
			$error[] = 'This post is missing a valid id!.';
		}

		if($postTitle ==''){
			$error[] = 'Lisää otsikko.';
		}		

		if($postCont ==''){
			$error[] = 'Lisää sisältö.';
		}

		if(!isset($error)){

			try {

				//insert into database
				$stmt = $db->prepare('UPDATE uutiset SET postTitle = :postTitle, postCont = :postCont WHERE postID = :postID') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,					
					':postCont' => $postCont,
					':postID' => $postID
				));

				//redirect to index page
				header('Location: index.php?action=updated');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}


?>

<div class="container">


<?php include('adminmenu.php'); ?>
  	<div class="admin-wrapper">

  	

  	<?php if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}?>  	

  	<form action='' method='post'>
		<input type='hidden' name='postID' value='<?php echo $rivi['postID'];?>'>

		<p><label>Title</label><br />
		<input type='text' name='postTitle' value='<?php echo $rivi['postTitle'];?>'></p>		

		<p><label>Content</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php echo $rivi['postCont'];?></textarea></p>

		<p><input type='submit' name='submit' value='Update'></p>
		<p><input type='submit' name='poista' value='poista uutinen'></p>

	</form>



  	</div>
</div>  	