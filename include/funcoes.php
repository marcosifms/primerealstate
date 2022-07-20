<?php
//FUNÇÕES
// CONVERSÃO DE DATAS
// Formata data aaaa-mm-dd para dd/mm/aaaa
function databr($datasql)
{
	if (!empty($datasql)) {
		$p_dt = explode('-', $datasql);
		$data_br = $p_dt[2] . '/' . $p_dt[1] . '/' . $p_dt[0];
		return $data_br;
	}
}

// Formata data dd/mm/aaaa para aaaa-mm-dd
function datasql($databr)
{
	if (!empty($databr)) {
		$p_dt = explode('/', $databr);
		$data_sql = $p_dt[2] . '-' . $p_dt[1] . '-' . $p_dt[0];
		return $data_sql;
	}
}

function dtinfo($datasql)
{
	if (!empty($datasql)) {
		$p_dt = explode('-', $datasql);
		$data_br = $p_dt[2] . '_' . $p_dt[1] . '_' . $p_dt[0];
		return $data_br;
	}
}
function initRand()
{
	static $randCalled = FALSE;
	if (!$randCalled) {
		srand((float) microtime() * 1000000);
		$randCalled = TRUE;
	}
}
function randNum($low, $high)
{
	initRand();
	$rNum = rand($low, $high);
	return $rNum;
}

//informar dia da semana
function diasemana($data)
{  // Traz o dia da semana para qualquer data informada
	$dia =  substr($data, 0, 2);
	$mes =  substr($data, 3, 2);
	$ano =  substr($data, 6, 9);
	$diasemana = date("w", mktime(0, 0, 0, $mes, $dia, $ano));
	switch ($diasemana) {
		case "0":
			$diasemana = "Domingo";
			break;
		case "1":
			$diasemana = "Segunda-Feira";
			break;
		case "2":
			$diasemana = "Terça-Feira";
			break;
		case "3":
			$diasemana = "Quarta-Feira";
			break;
		case "4":
			$diasemana = "Quinta-Feira";
			break;
		case "5":
			$diasemana = "Sexta-Feira";
			break;
		case "6":
			$diasemana = "Sábado";
			break;
	}
	return utf8_decode($diasemana);
}

function combo_empresa($id)

{

	global $conecta;

	$sSql  = " SELECT *";
	$sSql .= " FROM empresas where tipo='C' or tipo='T'";
	$sSql .= " ORDER BY fantasia";

	$Result = mysqli_query($conecta, $sSql);

	if (!$Result)
		exit(" Erro : ao Carregar Dados de empresas = > " . mysqli_error($conecta));

	while ($aResult = mysqli_fetch_assoc($Result)) {

		if ($id == $aResult["id_empresa"])
			print "<option value=\"" . $aResult["id_empresa"]  . "\" selected>" . $aResult["fantasia"] . "</option>\n";
		else
			print "<option value=\"" . $aResult["id_empresa"]  . "\" >" . $aResult["fantasia"] . "</option>\n";
	}
}
//fwlr 19/07 - função usada para saber qual o tipo de valorPorExtenso é para chamar
function valorPorExtenso($valor, $moeda)
{
	if ($moeda == 1) {
		return valorPorExtensoGuarani($valor);
	} elseif ($moeda == 2) {
		return valorPorExtensoDolar($valor);
	} else return valorPorExtensoReal($valor);
}

function valorPorExtensoReal($valor = 0)
{

	$singular = array("centavo", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
	$plural = array(
		"centavos", "", "mil", "milhões", "bilhões", "trilhões",
		"quatrilhões"
	);

	$c = array(
		"", "cem", "duzentos", "trezentos", "quatrocentos",
		"quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos"
	);
	$d = array(
		"", "dez", "vinte", "trinta", "quarenta", "cinquenta",
		"sessenta", "setenta", "oitenta", "noventa"
	);
	$d10 = array(
		"dez", "onze", "doze", "treze", "quatorze", "quinze",
		"dezesseis", "dezesete", "dezoito", "dezenove"
	);
	$u = array(
		"", "um", "dois", "três", "quatro", "cinco", "seis",
		"sete", "oito", "nove"
	);


	$z = 0;
	$rt = "";

	$valor = number_format($valor, 2, ".", ".");
	$inteiro = explode(".", $valor);
	for ($i = 0; $i < count($inteiro); $i++)
		for ($ii = strlen($inteiro[$i]); $ii < 3; $ii++)
			$inteiro[$i] = "0" . $inteiro[$i];

	$fim = count($inteiro) - ($inteiro[count($inteiro) - 1] > 0 ? 1 : 2);
	for ($i = 0; $i < count($inteiro); $i++) {
		$valor = $inteiro[$i];
		$rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
		$rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
		$ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

		$r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd &&
			$ru) ? " e " : "") . $ru;
		$t = count($inteiro) - 1 - $i;
		$r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";
		if ($valor == "000") $z++;
		elseif ($z > 0) $z--;
		if (($t == 1) && ($z > 0) && ($inteiro[0] > 0)) $r .= (($z > 1) ? " de " : "") . $plural[$t];
		if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) &&
			($inteiro[0] > 0) && ($z < 1)) ? (($i < $fim) ? ", " : " e ") : " ") . $r;
	}
	return ($rt ? $rt : "zero");
}

function valorPorExtensoDolar($valor = 0)
{
	/*
	$singular = array("centavo", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
	$plural = array(
		"centavos", "", "mil", "milhões", "bilhões", "trilhões",
		"quatrilhões"
	);

	$c = array(
		"", "cem", "duzentos", "trezentos", "quatrocentos",
		"quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos"
	);
	$d = array(
		"", "dez", "vinte", "trinta", "quarenta", "cinquenta",
		"sessenta", "setenta", "oitenta", "noventa"
	);
	$d10 = array(
		"dez", "onze", "doze", "treze", "quatorze", "quinze",
		"dezesseis", "dezesete", "dezoito", "dezenove"
	);
	$u = array(
		"", "um", "dois", "três", "quatro", "cinco", "seis",
		"sete", "oito", "nove"
	);
*/

$singular = array("", "", "mil", "millón", "mil milones", "trillones", "cuatrillones");
$plural = array("", "", "millones", "miles de millones", "trillones", "cuatrillones");
	$c = array("", "cien", "doscientos", "trescientos", "cuatrocientos", "quinientos", "seiscientos", "setecientos", "ochocientos", "novecientos");
	$d = array("", "diez", "veinte", "treinta", "cuarenta", "cincuenta", "sesenta", "setenta", "ochenta", "noventa");
	$d10 = array("diez", "once", "doce", "trecee", "catorce", "quince", "dieciséis", "diecisiete", "dieciocho", "diecinueve");
	$u = array("", "uno", "dos", "tres", "cuatro", "cinco", "seis", "site", "ocho", "nueve");

	$z = 0;
	$rt = "";

	$valor = number_format($valor, 2, ".", ".");
	$inteiro = explode(".", $valor);
	for ($i = 0; $i < count($inteiro); $i++)
		for ($ii = strlen($inteiro[$i]); $ii < 3; $ii++)
			$inteiro[$i] = "0" . $inteiro[$i];

	$fim = count($inteiro) - ($inteiro[count($inteiro) - 1] > 0 ? 1 : 2);
	for ($i = 0; $i < count($inteiro); $i++) {
		$valor = $inteiro[$i];
		$rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
		$rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
		$ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

		$r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd &&
			$ru) ? " e " : "") . $ru;
		$t = count($inteiro) - 1 - $i;
		$r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";
		if ($valor == "000") $z++;
		elseif ($z > 0) $z--;
		if (($t == 1) && ($z > 0) && ($inteiro[0] > 0)) $r .= (($z > 1) ? " de " : "") . $plural[$t];
		if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) &&
			($inteiro[0] > 0) && ($z < 1)) ? (($i < $fim) ? ", " : " e ") : " ") . $r;
	}
	return ($rt ? $rt : "zero");
}

function valorPorExtensoGuarani($valor = 0)
{
	//$valor = floor($valor);
	$singular = array("", "", "mil", "millón", "mil milones", "trillones", "cuatrillones");
	$plural = array("", "", "millones", "miles de millones", "trillones", "cuatrillones");

	$c = array("", "cien", "doscientos", "trescientos", "cuatrocientos", "quinientos", "seiscientos", "setecientos", "ochocientos", "novecientos");
	$d = array("", "diez", "veinte", "treinta", "cuarenta", "cincuenta", "sesenta", "setenta", "ochenta", "noventa");
	$d10 = array("diez", "once", "doce", "trecee", "catorce", "quince", "dieciséis", "diecisiete", "dieciocho", "diecinueve");
	$u = array("", "uno", "dos", "tres", "cuatro", "cinco", "seis", "site", "ocho", "nueve");

	$z = 0;
	$rt = "";

	$valor = number_format($valor, 2, ".", ".");
	$inteiro = explode(".", $valor);
	print_r($inteiro);//mpv
	for ($i = 0; $i < count($inteiro); $i++)
		for ($ii = strlen($inteiro[$i]); $ii < 3; $ii++)
			$inteiro[$i] = "0" . $inteiro[$i];

	$fim = count($inteiro) - ($inteiro[count($inteiro) - 1] > 0 ? 1 : 2);
	for ($i = 0; $i < count($inteiro); $i++) {
		$valor = $inteiro[$i];
		$rc = (($valor > 100) && ($valor < 200)) ? "ciento" : $c[$valor[0]];
		$rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
		$ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

		$r = $rc . (($rc && ($rd || $ru)) ? " y " : "") . $rd . (($rd &&
			$ru) ? " y " : "") . $ru;
		$t = count($inteiro) - 1 - $i;
		$r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";
		if ($valor == "000") $z++;
		elseif ($z > 0) $z--;
		if (($t == 1) && ($z > 0) && ($inteiro[0] > 0)) $r .= (($z > 1) ? " de " : "") . $plural[$t];
		if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) &&
			($inteiro[0] > 0) && ($z < 1)) ? (($i < $fim) ? ", " : " y ") : " ") . $r;
	}
	return ($rt ? $rt : "zero");
}

function chamaProprietario($genero)
{
	if ($genero == "M") {
		echo ("EL PROPRIETARIO");
	} else {
		echo ("LA PROPRIETARIA");
	}
}

function chamaMandatario($genero)
{
	if ($genero == "M") {
		echo ("EL MANDATARIO");
	} else {
		echo ("LA MANDATARIA");
	}
}

function chamaLocatario($genero)
{
	if ($genero == "M") {
		echo ("EL LOCATARIO");
	} else {
		echo ("LA LOCATARIA");
	}
}
