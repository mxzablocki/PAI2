<?php
class szyfr{
	
	function szyfrator($action, $string) {
		$output = false;

		$encrypt_method = "AES-256-CBC";
		
		$secret_key = 'Sekret EKOP';
		$secret_iv = 'Sekret EKOP';

		// hash
		$key = hash('sha256', $secret_key);
		
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		if( $action == 'encrypt' ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		}
		else if( $action == 'decrypt' ){
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}
		return $output;
	}
	
	function szyfruj($haslo){
		return $this->szyfrator("encrypt", $haslo);
	}

	function deszyfruj($haslo){
		return $this->szyfrator("decrypt", $haslo);
	}

}
//echo("<script>console.log('Autor: Daku @ BreakFire.EU | szo23el@gmail.com | szo9f38@gmail.com | daku@breakfire.eu | daku@battlearena.eu | 796 234 132 | Projekty stron WWW');</script>");
?>