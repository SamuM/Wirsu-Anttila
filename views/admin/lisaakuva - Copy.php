
<div class="container">
<?php  include('/adminmenu.php'); ?> 
<div class="admin-wrapper">


<form action="../classes/upload_file.php" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td><label for="otsikko">Kuvan otsikko:</label></td>
			<td><input type="text" name="otsikko" id="otsikko" placeholder="Kuvaus"></td>
		</tr>
		<tr>
			<td><label for="file">Tiedosto:</label></td>
			<td><input type="file" name="file" id="file"></td>
		</tr>
		<tr>
			<td></td>
			<td><button type="submit" name="submit" value="Submit"><i class="fa fa-plus"></i> Lisää</button></td>
		</tr>
</table>
</form>


</div>
</div>