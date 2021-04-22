<?php

header('Content-type: application/json');

    //Le fichier QR n'hexiste pas, je le fabrique
    require '../phpqrcode/qrlib.php';  
   
    if(isset($_GET["Content"]))
    {

        
   

    //include('config.php');

    // how to save PNG codes to server
    
    $tempDir = "EXAMPLE_TMP_SERVERPATH";
    $date = new DateTime();
  
    $codeContents = htmlspecialchars($_GET["Content"]).strval($date->getTimestamp());
    
    // we need to generate filename somehow, 
    // with md5 or with database ID used to obtains $codeContents...
    //$fileName = "005_file_".strval($date->getTimestamp()).".png";
    
    sleep(1);
    $fileName = "005_file_.png";
    
    $pngAbsoluteFilePath = $tempDir.$fileName;
    $urlRelativeFilePath = $tempDir.$fileName;
    
    // generating
    
        QRcode::png($codeContents, $pngAbsoluteFilePath,QR_ECLEVEL_L, 15);
        //echo"sUCCES";
    
    
    //echo '<img src="'.$urlRelativeFilePath.'" />';
   $result=[
       "url"=>$urlRelativeFilePath
   ];
 echo json_encode($result);
  //  echo 'Server PNG File: '.$pngAbsoluteFilePath;
    //echo '<hr />';
    sleep(1);
    // displaying
  
  

    }

    else{
        echo "erreur";
    }
