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
				$sql = $db->prepare('INSERT INTO uutiset (postTitle,postCont,postDate) VALUES (:postTitle, :postCont, :postDate)');				
				$sql->execute(array(
					':postTitle' => $postTitle, //hakee datan formista $postTitle on formin post title jne...					
					':postCont' => $postCont,
					':postDate' => date('Y-m-d H:i:s')
				));

				//redirect to index page
				header('Location: ../index.php?muokkaauutista');
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

		<p><label>Otsikko</label><br />
		<input type='text' name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'></p>
		<p><label>Sisältö</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postCont'];}?></textarea></p>

		<p><input type='submit' name='submit' value='Submit'></p>

	</form>

	</div>

	</div>