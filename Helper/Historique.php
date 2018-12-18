<?php
class Historique{
	
	public function __construct(){	
	}

	public static function newLine($ligne){
		$fp = fopen('./Helper/log.txt','a');
		$date = date('d-m-Y');
		$heure = date('H:i');
		fwrite($fp,''.$date.' '.$heure.' '.$ligne.'\n');
		
		fclose($fp)
	}
}
?>