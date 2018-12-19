<?php
class Historique{
	
	public static function newLine($ligne){
		$file = fopen("log.txt","a");	
		date_default_timezone_set("Europe/Paris");		
		$date = date('d-m-Y');
		$heure = date('H:i:s');
		$txt = ''.$date.' '.$heure.' '.$ligne.PHP_EOL;
		fwrite($file,$txt);		
		$resu = fclose($file);
		return $resu;
	}
}
?>