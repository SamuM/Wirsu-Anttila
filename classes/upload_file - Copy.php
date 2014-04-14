

<?php
header("Content-Type: text/html; charset=utf8");

require_once("../config/db.php");
$allowedExts = array("gif", "jpeg", "jpg", "JPG", "JPEG", "png", "PNG");
$temp = explode(".", $_FILES["file"]["name"]);
$otsikko = $_POST["otsikko"];
$otsikko = muokkaa_otsikko($otsikko);
$extension = end($temp);

$tiedosto = muokkaa_tiedostonimi($_FILES["file"]["name"]);  // Muokkaa tiedostosta pois ääkköset ja välit. Muuttaa kaikki kirjaimet pieniksi kirjaimiksi.

$url = "http://localhost/uploaded/"; //Tiedostopolun alku, eli ip osoite tai domaini. Vaihda tarvittaessa.
$urlthumb = "http://localhost/uploaded/thumbs/"; //Thumbnailin tiedostopolun alku. Vaihda tarvittaessa.

if ((($_FILES["file"]["type"] == "image/gif")
  || ($_FILES["file"]["type"] == "image/GIF")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/JPG")
|| ($_FILES["file"]["type"] == "image/JPEG")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/PNG"))
&& ($_FILES["file"]["size"] < 8000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $tiedosto . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("../uploaded/" . $tiedosto))
      {
      echo $tiedosto . " niminen kuva on jo hakemistossa. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"], "../uploaded/" . $tiedosto);

         
         $thumbnail = "thumb_".$tiedosto;
         echo $thumbnail."<br>";
         echo $tiedosto."<br>";




        $laheta = $db->prepare("INSERT INTO valokuvat (kuvaotsikko, kuvaURL, kuvaThumb) VALUES ( :kuvaotsikko, :kuvaURL, :kuvaThumb)");
        $laheta->execute(array(
          ':kuvaotsikko' => $otsikko, 
          ':kuvaURL' => $url.$tiedosto, 
          ':kuvaThumb' => $urlthumb.$thumbnail
          ));

        


    echo "Kuva löytyy hakemistossa: " . "uploaded/" . $tiedosto;
    echo "kuvan otsikko: ". $otsikko ."<br>";
    createThumbnail($tiedosto, 200, "../uploaded/", "../uploaded/thumbs/"); //Luo thumbnailin käyttäen functiota
      }
    }
  }
else
  {

  echo "Tiedosto ei kelpaa ".$_FILES["file"]["size"];
  }



  

function createThumbnail($filename,	$final_width_of_image , $path_to_image_directory, $path_to_thumbs_directory){
     
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