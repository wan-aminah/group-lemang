<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moodle";

$conn = new mysqli($servername, $username, $password, $dbname);

?>
<html>
<head>
<title>qrcode.php qr code test</title>
<style>
	body {
		font-family: Helvetica, sans-serif;
		padding: 1em;
	}
</style>
</head>
<body>

<h3>Haa try scan.</h3>

<style>
    .slides { width: 15%; }
	.slides-hidden { display : none; }
</style>

<?php 
// utk php punya encryption --> AES-128-CTR

// Store a string into the variable which 
// need to be Encrypted 
$simple_string = "http://192.168.43.43/php-qrcode-master/index.php"; 

$simple_string2 = "http://192.168.43.43/php-qrcode-master/tukar.php";
// Display the original string 
echo "Original String: " . $simple_string; 
echo "<br>";
echo "Original String: " . $simple_string2; 
echo "<br>";
// Store the cipher method 
$ciphering = "AES-128-CBC"; 
$ciphering2 = "AES-128-CBC"; 
// Use OpenSSl Encryption method 
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0; 

$iv_length2 = openssl_cipher_iv_length($ciphering2); 
$options2 = 0; 

// Non-NULL Initialization Vector for encryption 
$encryption_iv = '6666666666666666'; 
$encryption_iv2 = '6666666666666666';  
// Store the encryption key 
$encryption_key = "1111111111111111"; 
$encryption_key2 = "1111111111111111";  
// Use openssl_encrypt() function to encrypt the data 
$encryption = openssl_encrypt($simple_string, $ciphering, 
            $encryption_key, $options, $encryption_iv); 

$encryption2 = openssl_encrypt($simple_string2, $ciphering2, 
            $encryption_key2, $options2, $encryption_iv2); 
			
// Display the encrypted string 
echo " <br> Encrypted String: " . $encryption . "\n"; 
echo " <br> Encrypted String: " . $encryption2 . "\n";  
// Non-NULL Initialization Vector for decryption 
$decryption_iv = '6666666666666666'; 
$decryption_iv2 = '6666666666666666'; 
  
// Store the decryption key 
$decryption_key = "1111111111111111"; 
$decryption_key2 = "1111111111111111";  
// Use openssl_decrypt() function to decrypt the data 
$decryption=openssl_decrypt ($encryption, $ciphering,  
        $decryption_key, $options, $decryption_iv); 

$decryption2=openssl_decrypt ($encryption2, $ciphering2,  
        $decryption_key2, $options2, $decryption_iv2); 
		
// Display the decrypted string 
echo " <br><br> Decrypted String: " . $decryption; 
echo " <br> Decrypted String: " . $decryption2;   

?> 


<script>
    addEventListener("load",() => { // "load" is safe but "DOMContentLoaded" starts earlier
        var index = 0;
        const slides = document.querySelectorAll(".slides");
        const classHide = "slides-hidden", count = slides.length;
        nextSlide();
        function nextSlide() {
            slides[(index ++) % count].classList.add(classHide);
            slides[index % count].classList.remove(classHide);
            setTimeout(nextSlide, 1000);
			
        }
    });
</script>

<section>
		
		<img class="slides slides-hidden" src="qrcode.php?s=qrl&d= <?php echo $encryption; ?> ">
		<img class="slides slides-hidden" src="qrcode.php?s=qrl&d= <?php echo $encryption2; ?> ">
			<!--
			<img class="slides slides-hidden" src="qrcode.php?s=qrl&d=http://192.168.43.43/php-qrcode-master/index.php">
			<img class="slides slides-hidden" src="qrcode.php?s=qrl&d=http://192.168.43.43/php-qrcode-master/tukar.php">	
		
		-->
</section>


</body>
</html>

<?php
$conn->close();

?>
