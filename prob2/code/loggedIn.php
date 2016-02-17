<?php
	if(!isset($_COOKIE['cookie']))
	{
 		header('Location: login.php');
		exit;    
	}
   	else
	{ 
		header('Content-type: text/plain; charset=utf-8'); //Make newline work
 
		$passphrase = '8chrsLng'; 
		$cookieVal = $_COOKIE['cookie'];
		
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);

	  	$decryptedString = base64_decode($cookieVal); 

		$iv = substr($decryptedString, -$iv_size);		
		$decryptedString = substr($decryptedString, 0, -$iv_size);

		$plaintext = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $passphrase, $decryptedString, MCRYPT_MODE_CBC, $iv);
		$plaintext = trim($plaintext);

		echo "\nHello". " " .$_COOKIE['username'];
		echo "\n" . $plaintext; 
	}
?>
