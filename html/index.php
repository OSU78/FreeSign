<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEN QR-CODE</title>
</head>

<body>
    <header>

    </header>
    <?php

    //Le fichier QR n'hexiste pas, je le fabrique
    require 'phpqrcode/qrlib.php';  
   

    //include('config.php');

    // how to save PNG codes to server
    
    $tempDir = "EXAMPLE_TMP_SERVERPATH";
    $date = new DateTime();
    $i=0;
  while($i<2){

 
    $codeContents = 'http://perle-in.comoncloud.com?'+strval($date->getTimestamp());
    
    // we need to generate filename somehow, 
    // with md5 or with database ID used to obtains $codeContents...
    $fileName = '005_file_'.md5($codeContents).'.png';
    
    $pngAbsoluteFilePath = $tempDir.$fileName;
    $urlRelativeFilePath = $tempDir.$fileName;
    
    // generating
    if (!file_exists($pngAbsoluteFilePath)) {
        QRcode::png($codeContents, $pngAbsoluteFilePath,QR_ECLEVEL_L, 15);
        echo 'File generated!';
        echo '<hr />';
    } else {
        echo 'File already generated! We can use this cached file to speed up site on common codes!';
        echo '<hr />';
    }
    
    echo 'Server PNG File: '.$pngAbsoluteFilePath;
    echo '<hr />';
    sleep(5);
    // displaying
    echo '<img src="'.$urlRelativeFilePath.'" />';
    $i++;
} 
    ?>
    <main>
    <script>
        function DynamicQr(){
	const xml= new XMLHttpRequest();
	xml.open('GET','reqAnimalerie.php?listeAnimaux=5');
	xml.onreadystatechange=function listeA(){
		
		if(xml.readyState===4){
		const imgQR=document.getElementById('QR');
		imgQR.innerHTML=xml.responseText;
		}
	};
	xml.send();
}
    </script>
    </main>
    <footer>

    </footer>
</body>

</html>