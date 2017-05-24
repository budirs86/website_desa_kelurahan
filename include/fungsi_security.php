<?php 
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1)
{
	echo "<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>";
	exit("Direct access not permitted.");
}
//status informasi pada saat eksekusi database

function alert($type,$text = null){
	if($type=='info'){
		echo "<font color='white'><div class='infofly go-front' id='status'>$text</div></font>";
	}
	else if($type=='error')	{
		echo "<font color='white'><div class='errorfly go-front' id='status'>$text</div></font>";
	}
	else if($type=='download')	{
		echo "<font color='black'><center>$text</center></font>";
	}
	else if($type=='loading')		
		echo "<div id='loading'><center>$text</center></div>";
	
}
define("ENCRYPTION_KEY", "!@#$%^&*");
//$string = "This is the original data string!";

//echo $encrypted = encrypt($string, ENCRYPTION_KEY);
//echo "<br />";
//echo $decrypted = decrypt($encrypted, ENCRYPTION_KEY);

/**
 * Returns an encrypted & utf8-encoded
 */
function encrypt($pure_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
    return $encrypted_string;
}

/**
 * Returns decrypted original string
 */
function decrypt($encrypted_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
    return $decrypted_string;
}

//$data = 'Super secret confidential string data.';
//$encrypted_data = mc_encrypt($data, ENCRYPTION_KEY);
//echo '<h2>Example #1: String Data</h2>';
//echo 'Data to be Encrypted: ' . $data . '<br/>';
//echo 'Encrypted Data: ' . $encrypted_data . '<br/>';
//echo 'Decrypted Data: ' . mc_decrypt($encrypted_data, ENCRYPTION_KEY) . '</br>';

//$data = array(1, 5, 8, 9, 22, 10, 61);
//$encrypted_data = mc_encrypt($data, ENCRYPTION_KEY);
//echo '<h2>Example #2: Non-String Data</h2>';
//echo 'Data to be Encrypted: <pre>';
//print_r($data);
//echo '</pre><br/>';
//echo 'Encrypted Data: ' . $encrypted_data . '<br/>';
//echo 'Decrypted Data: <pre>';
//print_r(mc_decrypt($encrypted_data, ENCRYPTION_KEY));
//echo '</pre>';

function bCrypt($pass,$cost){
      $chars='./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
 
      // Build the beginning of the salt
      $salt=sprintf('$2a$%02d$',$cost);
 
      // Seed the random generator
      mt_srand();
 
      // Generate a random salt
      for($i=0;$i<22;$i++) $salt.=$chars[mt_rand(0,63)];
 
     // return the hash
    return crypt($pass,$salt);
}	

function createToken()

{

 $token= base64_encode(openssl_random_pseudo_bytes(32));

 $_SESSION['csrfvalue']=$token;

 return $token; }

 
function unsetToken()

{

 unset($_SESSION['csrfvalue']);

}

function validation()
{  $csrfvalue = isset($_SESSION['csrfvalue']) ? mysql_real_escape_string($_SESSION['csrfvalue']) : '';  if(isset($_POST['csrf_name']))
{  $value_input=$_POST['csrf_name'];
 if($value_input==$csrfvalue)
 {
 unsetToken();

 return true;  }else{

 unsetToken();

 return false;

 }

 }else{

 unsetToken();

 return false;

 }

}

//anti ddos
//
// Description : Script anti flood
// Version      : 0.0.1
// Auteur       : Atmoner
// Url          : http://httpscript.org
//
function antiddos(){
if (!isset($_SESSION)) {
    session_start();
}
// anti flood protection
if($_SESSION['last_session_request'] > time() - 2){
    // users will be redirected to this page if it makes requests faster than 2 seconds
    header("location: https://simaya.go.id/alert/ddos");
    exit;
}
$_SESSION['last_session_request'] = time();
}
	
function cek_certificate(){
//$data = openssl_x509_parse(file_get_contents('/path/to/cert.crt'));
//$validFrom = date('Y-m-d H:i:s', $data['validFrom_time_t']);
//$validTo ) date('Y-m-d H:i:s', $data['validTo_time_t']);
//echo $validFrom . "\n";
//echo $validTo . "\n";
}	
?>
