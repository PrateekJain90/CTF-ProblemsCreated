<?php
$name = $_POST['name'];
$pass = $_POST['pass'];

if( isset($name) || isset($pass) )
{
    if( empty($name) ) {
        die ("ERROR: Please enter username!");
    }
    if( empty($pass) ) {
        die ("ERROR: Please enter password!");
    }


    if( $name == $pass )
    {
        // Authentication successful - Set session
        session_start();
        $_SESSION['auth'] = 1; 
        setcookie("username", $_POST['name'], time()+(84600*30));
	$userId = '100';
	$groupId = '100';

	$plaintext = "Your UserId is: " . $userId . "\nand GroupId is: " . $groupId . ".\nBoth these ids need to be 777 for admin priveleges."; 

        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

	$passphrase = '8chrsLng'; 

	$encryptedString = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $passphrase, $plaintext, MCRYPT_MODE_CBC, $iv);
	$encryptedString = $encryptedString . $iv;
  	$encryptedString = base64_encode($encryptedString); 

	setcookie("cookie", $encryptedString, time()+(84600*30));

 	header('Location: loggedIn.php');
	exit;  
	}
    else {
        echo "ERROR: Incorrect username or password!";
    }
}


// If no submission, display login form
else {
?>
    <html>
    <meta charset="UTF-8"> 
    <head></head>
    <body>
    <center>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Username: <input type="text" name="name" value="<?php echo $_COOKIE['username']; ?>">
    <p />
    Password: <input type="password" name="pass">
    <p />
    <input type="submit" name="submit" value="Log In">
    </center>
    </body>
    </html>
<?php
}
?>
