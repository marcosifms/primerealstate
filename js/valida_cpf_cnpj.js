<script LANGUAGE="JavaScript">
<!--
  //Formata a digitação de CPF e CGC
function mask_cpfcgc(formulario,campo,tammax,teclapres) {

	var tecla = teclapres.keyCode;
	if ( (teclapres.shiftKey && tecla != 9) || teclapres.ctrlKey || teclapres.altKey ) {
		return false;
	}

	//48 a 57 são os números do teclado alfabético (1 a 0)
	//96 a 105 são os números do teclado numérico (0 a 9)
	//8 é a tecla de BACKSPACE
	//46 é a tecla DELETE
	//9 é a tecla de TAB
	//39 e 37 são as teclas para direita e para esquerda para retirar a seleção do campo
	if ((tecla < 48 || tecla > 57) && (tecla < 96 || tecla > 105) && tecla != 8 && tecla != 9 && tecla != 46 && tecla != 37 && tecla != 39 ) {
		return false;
	}

	vr = document.forms(formulario).item(campo.name).value;
	tam_vr = vr.length;
	vr = vr.replace( "/", "" );
	vr = vr.replace( "/", "" );
	vr = vr.replace( "-", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	tam = vr.length;

	if (tam < tammax && tecla != 8) {
		tam = vr.length+1;
	}

	if (tecla == 8 ) {
		tam = tam - 1;
	}
	else {
		if ( tecla != 9 && tecla != 37 && tecla != 39 ) {
			if ( tam_vr >= tammax ) {
				return false;
			}
		}
	}
}

function form_cpfcgc(formulario,campo,tammax,teclapres) {

	var tecla = teclapres.keyCode;

	if ((tecla < 48 || tecla > 57) && (tecla < 96 || tecla > 105) && tecla != 46 && tecla != 8) {
		return false;
	}

	vr = campo.value;
	vr = vr.replace( "/", "" );
	vr = vr.replace( "/", "" );
	vr = vr.replace( "-", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	tam = vr.length;

	if ( tam <= 2 ) {
		document.forms(formulario).item(campo.name).value = vr;
	}
	if ( (tam > 2) && (tam <= 5) ) {
		document.forms(formulario).item(campo.name).value = vr.substr( 0, tam - 2 ) + '-' + vr.substr( tam - 2, tam );
	}
	if ( (tam >= 6) && (tam <= 8) ) {
		document.forms(formulario).item(campo.name).value = vr.substr( 0, tam - 5 ) + '.' + vr.substr( tam - 5, 3 ) + '-' + vr.substr( tam - 2, tam );
	}
	if ( (tam >= 9) && (tam <= 11) ) {
		document.forms(formulario).item(campo.name).value = vr.substr( 0, tam - 8 ) + '.' + vr.substr( tam - 8, 3 ) + '.' + vr.substr( tam - 5, 3 ) + '-' + vr.substr( tam - 2, tam );
	}
	if ( (tam == 12) ) {
		document.forms(formulario).item(campo.name).value = vr.substr( tam - 12, 3 ) + '.' + vr.substr( tam - 9, 3 ) + '/' + vr.substr( tam - 6, 4 ) + '-' + vr.substr( tam - 2, tam );
	}
	if ( (tam > 12) && (tam <= 14) ) {
		document.forms(formulario).item(campo.name).value = vr.substr( 0, tam - 12 ) + '.' + vr.substr( tam - 12, 3 ) + '.' + vr.substr( tam - 9, 3 ) + '/' + vr.substr( tam - 6, 4 ) + '-' + vr.substr( tam - 2, tam );
	}
}

//Verifica se CPF ou CGC e encaminha para a devida função de teste
function consiste_cpfcgc(Param) {
	tmp = Param;
	if (tmp.length == 11) {
		x = verifica_cpf(tmp);
		if (!x) {
			return false;
		}
	}
	else {
		if (tmp.length == 14) {
			cgc_aux = tmp.substring(0,2) + tmp.substring(2,5) + tmp.substring(5,8) + tmp.substring(8,12) + tmp.substring(12,14);
			x = verifica_cgc(cgc_aux);
			if (!x) {
				return false;
			}
		}
		else {
			return false;
		}
	}
	return true;
}

//Verifica se CPF ou CGC e encaminha para a devida função, no caso do cpf/cgc estar digitado sem mascara
function consiste_cpfcgc_sem_mascara(Param) {
	tmp = Param;
	if (tmp.length <= 11) {
		x = verifica_cpf(tmp);
		if (!x) {
			return false;
		}
	}
	else {
		x = verifica_cgc(tmp);
		if (!x) {
			return false;
		}
	}
	return true;
}

//Verifica se o número de CPF informado é válido
function verifica_cpf(sequencia) {
	if ( Procura_Str(1,sequencia,'00000000000,11111111111,22222222222,33333333333,44444444444,55555555555,6666
6666666,77777777777,88888888888,99999999999,00000000191,19100000000') > 0 ) {
		return false;
	}
	seq = sequencia;
	soma = 0;
	multiplicador = 2;
	for (f = seq.length - 3;f >= 0;f--) {
		soma += seq.substring(f,f + 1) * multiplicador;
		multiplicador++;
	}
	resto = soma % 11;
	if (resto == 1 || resto == 0) {
		digito = 0;
	}
	else {
		digito = 11 - resto;
	}
	if (digito != seq.substring(seq.length - 2,seq.length - 1)) {
		return false;
	}
	soma = 0;
	multiplicador = 2;
	for (f = seq.length - 2;f >= 0;f--) {
		soma += seq.substring(f,f + 1) * multiplicador;
		multiplicador++;
	}
	resto = soma % 11;
	if (resto == 1 || resto == 0) {
		digito = 0;
	}
	else {
		digito = 11 - resto;
	}
	if (digito != seq.substring(seq.length - 1,seq.length)) {
		return false;
	}
	return true;
}

//Verifica se o número de CGC informado é válido
function verifica_cgc(sequencia) {
	seq = sequencia;
	soma = 0;
	multiplicador = 2;
	for (f = seq.length - 3;f >= 0;f-- ) {
		soma += seq.substring(f,f + 1) * multiplicador;
		if ( multiplicador < 9 ) {
			multiplicador++;
		}
		else {
			multiplicador = 2;
		}
	}
	resto = soma % 11;
	if (resto == 1 || resto == 0) {
		digito = 0;
	}
	else {
		digito = 11 - resto;
	}
	if (digito != seq.substring(seq.length - 2,seq.length - 1)) {
		return false;
	}

	soma = 0;
	multiplicador = 2;
	for (f = seq.length - 2;f >= 0;f--) {
		soma += seq.substring(f,f + 1) * multiplicador;
		if (multiplicador < 9) {
			multiplicador++;
		}
		else {
			multiplicador = 2;
		}
	}
	resto = soma % 11;
	if (resto == 1 || resto == 0) {
		digito = 0;
	}
	else {
		digito = 11 - resto;
	}
	if (digito != seq.substring(seq.length - 1,seq.length)) {
		return false;
	}
	return true;
}

//Procura uma string dentro de outra string
function Procura_Str(param0,param1,param2) {
	for (a = param0 - 1;a < param1.length;a++) {
		for (b = 1;b < param1.length;b++) {
			if (param2 == param1.substring(b - 1,b + param2.length - 1)) {
				return a;
			}
		}
	}
	return 0;
}

//Limpa "." e "-" e "/"
function LimpaCPFCGC(strCPFCGC)
{
	return strCPFCGC.replace(/\./g,'').replace(/-/g,'').replace(/\//g,'')
}


// Funcao que formata o campo conforme a Digitação de Caracteres
// Utiliza evento OnKeyPress
// OBS: Este campo somente aceitará valores numéricos
// Parametro: << campo do formulario >>
// Retorno:
function FormataData( campo )
{	var tam = campo.value.length;
	if (((event.keyCode) >= 48 ) && ((event.keyCode) <= 57 ))
	{	event.keyCode;
		if ( ( tam == 2 ) || ( tam == 5 ) )
		{	campo.value = campo.value + "/";	}
	}
	else
	{	event.keyCode = 0;	}
}
-->
</script>