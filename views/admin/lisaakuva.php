
<div class="container">
<?php  


	if(isset($_POST['submit'])){


		require_once("./classes/upload_file.php");

		$kuva = new LisaaKuva();

		if ($kuva->kuvaUpVirheet) {
        foreach ($kuva->kuvaUpVirheet as $error) {
           
            echo "<p>".$error."</p>";
            
        }
    }
	}
	


?> 
<div class="admin-wrapper">


<form action="" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td><label for="otsikko">Kuvan otsikko:</label></td>
			<td><input type="text" name="otsikko" id="otsikko" placeholder="Kuvaus"></td>
		</tr>
		<tr class="addfile">
			<div class="filewrapper">
			<td><label for="file">Tiedosto:</label></td>
			<td><input type="file" name="file[]" id="file"></td>
			<td class="tdlisays"><a href="#" class="tlisays"><i class=" fa-2x fa fa-plus-square-o"></i></a></td>
			</div>
		</tr>

		<tr>
			<td></td>
			<td></td>
			<td><a href="#" class="poista"><i class="fa fa-minus-square-o fa-2x"></i></a></td>
		</tr>



		
		
		<tr>
			<td></td>
			<td><button type="submit" name="submit" value="Submit"><i class="fa fa-plus"></i> Lisää</button></td>
		</tr>
</table>
</form>


</div>
</div>