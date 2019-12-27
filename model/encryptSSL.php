<?php
header('Access-Control-Allow-Origin: *');
require '../bin/key/key.php';

function encryptIt($input){
	$key = $_POST['$key'];
	$method = "AES-256-CTR"; 
	// Use OpenSSl Encryption method 
	$iv_length = openssl_cipher_iv_length($method); 
	// Non-NULL Initialization Vector for encryption 
	$encryption_v = '1234567891011121';
	$options = 0; 
	// EncryptIt
	try{
		$encryption = openssl_encrypt($_POST[$input], $method, $key, $options, $encryption_v);
	}catch(Exception $e){
		print_r($e->getmessage());
		die();
	}
	return $encryption;
}

function decryptIt($input){
	$key = '$key';
	$ciphering = "AES-256-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering); 
	$options = 0;
	$encryption_v = '1234567891011121';
	try{
		$decryption = openssl_decrypt($_POST[$input], $ciphering, $key, $options, $encryption_v);
	}catch(Exception $e){
		print_r($e->getmessage());
		die();
	}
	return $decryption;
}