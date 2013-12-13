<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My_encryption {
	private $ivSize;
	private $cipher;
	private $key;
	private	$iv;		
	function __construct($data){			
		$this->key=$data['key'];
		$this->iv=$data['iv'];
	}
	function initializeCipher(){			
			$this->cipher=mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');			
	}
	function getIvSize(){
		$this->ivSize=mcrypt_enc_get_iv_size($this->cipher);
	}
	function encode($text){
		if(mcrypt_generic_init($this->cipher, $this->key, $this->iv) != -1){
			$text = mcrypt_generic($this->cipher,$text);
			// Display the result in hex.
			//printf("128-bit encrypted result as string:\n%s\n\n",base64_encode($text));
			//printf("128-bit encrypted result as hexadecimal:\n%s\n\n",bin2hex($text));
			//printf("128-bit encrypted result as binary:\n%s\n\n",$text);	
			return base64_encode($text);				
		}
	}
	function decrypt($text){
		if (mcrypt_generic_init($this->cipher, $this->key, $this->iv) != -1) {
			$text=base64_decode($text);
			$text=mdecrypt_generic($this->cipher,$text);
			return rtrim($text);				
		}
	}
	function deInitializeCipher(){
		mcrypt_generic_deinit($this->cipher);			
	} 
	function closeCipher(){
		mcrypt_module_close($this->cipher);
	}    
}
?>



		