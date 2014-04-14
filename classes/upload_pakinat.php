

<?php
header("Content-Type: text/html; charset=utf8");

require_once("../config/db.php");


$sql = $db->prepare('INSERT INTO pakinat (postTitle,postCont,postDate) VALUES (:postTitle, :postCont, :postDate)');       
        $sql->execute(array(
          ':postTitle' => $_POST['postTitle'], //hakee datan formista $postTitle on formin post title jne...               
          ':postCont' => $_POST['postCont'],        
          ':postDate' => date('Y-m-d H:i:s')
        ));

        $pakinaid = $db->lastInsertId();
        

foreach ($_FILES['file']['name'] as $f => $name) {
  # code...

$allowedExts = array("gif", "jpeg", "jpg", "JPG", "JPEG", "png", "PNG");
$temp = explode(".", $_FILES["file"]["name"][$f]);
$otsikko = $_POST["otsikko"];
$otsikko = muokkaa_otsikko($otsikko);
$extension = end($temp);

$tiedosto = muokkaa_tiedostonimi($_FILES["file"]["name"][$f]);  // Muokkaa tiedostosta pois ääkköset ja välit. Muuttaa kaikki kirjaimet pieniksi kirjaimiksi.

$url = "http://localhost/uploaded/"; //Tiedostopolun alku, eli ip osoite tai domaini. Vaihda tarvittaessa.
$urlthumb = "http://localhost/uploaded/thumbs/"; //Thumbnailin tiedostopolun alku. Vaihda tarvittaessa.

if ((($_FILES["file"]["type"][$f] == "image/gif")
  || ($_FILES["file"]["type"][$f] == "image/GIF")
|| ($_FILES["file"]["type"][$f] == "image/jpeg")
|| ($_FILES["file"]["type"][$f] == "image/jpg")
|| ($_FILES["file"]["type"][$f] == "image/JPG")
|| ($_FILES["file"]["type"][$f] == "image/JPEG")
|| ($_FILES["file"]["type"][$f] == "image/pjpeg")
|| ($_FILES["file"]["type"][$f] == "image/x-png")
|| ($_FILES["file"]["type"][$f] == "image/png")
|| ($_FILES["file"]["type"][$f] == "image/PNG"))
&& ($_FILES["file"]["size"][$f] < 8000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"][$f] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"][$f] . "<br>";
    }
  else
    {
    echo "Upload: " . $tiedosto . "<br>";
    echo "Type: " . $_FILES["file"]["type"][$f] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"][$f] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"][$f] . "<br>";

    if (file_exists("../uploaded/" . $tiedosto))
      {
      echo $tiedosto . " niminen kuva on jo hakemistossa. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"][$f], "../uploaded/" . $tiedosto);

         
         $thumbnail = "thumb_".$tiedosto;
         echo $thumbnail."<br>";
         echo $tiedosto."<br>";




        $laheta = $db->prepare("INSERT INTO paavontekstit (kuvaotsikko, kuvaURL, kuvaThumb) VALUES ( :kuvaotsikko, :kuvaURL, :kuvaThumb)");
        $laheta->execute(array(
          ':kuvaotsikko' => $otsikko, 
          ':kuvaURL' => $url.$tiedosto, 
          ':kuvaThumb' => $urlthumb.$thumbnail
          ));

        $paavontekstiid = $db->lastInsertId();

        $sql = $db->prepare('INSERT INTO pakinakuvat (kuvaID,postID) VALUES (:kuvaID, :postID)');       
        $sql->execute(array(
          ':kuvaID' => $paavontekstiid, //hakee datan formista $postTitle on formin post title jne... 
          ':postID' => $pakinaid
        ));   


    
    createThumbnail($tiedosto, 200, "../uploaded/", "../uploaded/thumbs/"); 
    header('Location: ./index.php?muokkaapakina');
      }
    }
  }
else
  {

  echo "Tiedosto ei kelpaa ".$_FILES["file"]["size"][$f];
  }
}


  

function createThumbnail($filename, $final_width_of_image , $path_to_image_directory, $path_to_thumbs_directory){
     
    if(preg_match('/[.](jpg)$/', $filename)) {
        $im = imagecreatefromjpeg($path_to_image_directory . $filename);
    }
    else if (preg_match('/[.](JPG)$/', $filename)) {
        $im = imagecreatefromjpeg($path_to_image_directory . $filename);
    } 
    else if (preg_match('/[.](gif)$/', $filename)) {
        $im = imagecreatefromgif($path_to_image_directory . $filename);
    } 
    else if (preg_match('/[.](GIF)$/', $filename)) {
        $im = imagecreatefromgif($path_to_image_directory . $filename);
    } 
    else if (preg_match('/[.](png)$/', $filename)) {
        $im = imagecreatefrompng($path_to_image_directory . $filename);
    }
    else if (preg_match('/[.](PNG)$/', $filename)) {
        $im = imagecreatefrompng($path_to_image_directory . $filename);
    }
     
    $ox = imagesx($im);
    $oy = imagesy($im);
     
    $nx = $final_width_of_image;
    $ny = floor($oy * ($final_width_of_image / $ox));
     
    $nm = imagecreatetruecolor($nx, $ny);
     
    imagecopyresized($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);
     
    if(!file_exists($path_to_thumbs_directory)) {
      if(!mkdir($path_to_thumbs_directory)) {
           die("Prosessissa ilmeni ongelmia, yritä myöhemmin uudestaan!");
      } 
       }
 
    imagejpeg($nm, $path_to_thumbs_directory . "thumb_".$filename, 100);
    $tn = '<img src="' . $path_to_thumbs_directory . "thumb_".$filename . '" alt="image" />';
    $tn .= '<br />Kuvasta on luotu onnistuneesti thumbnail.';
    echo $tn;
}


function muokkaa_tiedostonimi ($newfile) {
   $newfile = stripslashes($newfile);
   $newfile = strtolower($newfile);
   
   $kielletyt = array('ä', 'ö', 'å', ' ', '#');
   $korvaavat = array('a', 'o', 'a', '_', '-');
   $newfile = str_replace($kielletyt, $korvaavat, $newfile);
   
   $newfile = preg_replace('#[^a-z0-9._-]#', '', $newfile);
   
   return $newfile;
}

function muokkaa_otsikko ($newfile) {
   $newfile = stripslashes($newfile);
   $newfile = strtolower($newfile);
   
   $kielletyt = array('ä', 'ö'. 'å');
   $korvaavat = array('0xC3 0xA4 (c3a4)', '0xC3 0xB6 (c3b6)', '0xC3 0xA5 (c3a5)');
   $newfile = str_replace($kielletyt, $korvaavat, $newfile);  
  
   
   return $newfile;
}

?>