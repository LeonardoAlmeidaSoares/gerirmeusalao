<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_prev_tempo extends CI_Model {

	public function prevtempo($cidade, $tpm1=true, $tpm2=true, $st1=false, $st2=false, $vt=true, $pres=false, $umd=true){

		$url="http://tempoagora.uol.com.br/previsaodotempo.html/brasil/" . $cidade;
		$handle=file_get_contents($url);
		if(!$handle) 
			echo "Erro Ao Abrir a página de previsão do tempo";
		
		/*
		$temperatura = explode("°C",$andle);
		$vento = explode("km/h",$andle);
		$umidade = explode("%",$andle);
		$pressao = explode("hPa",$andle);
		$wind =trim( substr($vento[0],-1));
		$humidity =trim( substr($umidade[0],-2));
		$pressure =trim( substr($pressao[0],-6));
		$tempmin=trim(substr($temperatura[3],-2));
		$tempmax=trim(substr($temperatura[4],-2));
		$senstmin=trim(substr($temperatura[5],-2));
		$senstmax=trim(substr($temperatura[6],-2));
		
		$previsao="";

		if($tpm1) $previsao.="temperatura Mínima: " . $tempmin . " Graus Centígrados<br/>";
		if($tpm2) $previsao.="temperatura máxima: " . $tempmax . " Graus Centígrados<br/>";
		if($st1) $previsao.="Sensação térmica mínima: " . $senstmin . " Graus Centígrados<br/>";
		if($st2) $previsao.="Sensação térmica máxima:  " . $senstmax . " Graus Centígrados<br/>";
		if($vt) $previsao.="Velocidade do Vento: " . $wind . " KM / H<br/>";
		if($umd) $previsao.="Umidade: " . $humidity."%<br/>";
		if($pres) $previsao.="Pressão: " . $pressure . " hPa<br/>";
		*/
		return $handle;
	}
}
?>