<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Example page</title>
    </head>
    <body>
        <h2>This is an example page</h2>
        <h4>Look at the source code for this page if you want to learn how to use the Auth lib.</h4>
        <?php
        include_once 'lib/Auth/Encryption.php';
        include_once 'lib/Auth/Config.php';
        $salt = Encryption::generateSalt("hashing");
        $encrypted = Encryption::generateHash("asd", $salt);
        echo "Hashed: ".$encrypted."<br>";
        $verify = Encryption::verifyHash("asd".$salt, $encrypted);
        echo "Verified: ";
        if($verify == true){ echo "true"; } elseif ($verify == false) { echo "false"; }
        
        ?>
    </body>
</html>
