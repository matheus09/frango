function numeros(ie, ff) {
	if (ie){
		tecla = ie;
	}else{
		tecla = ff;
	}
	if((tecla >= 48 && tecla <= 57) || (tecla == 8) || (tecla == 13) || (tecla == 9) || (tecla == 46)){
		return true;
	}
	else{
		return false;
	}
}

function Formatadata(Campo, teclapres){
	var tecla = teclapres.keyCode;
	var vr = new String(Campo.value);
	vr = vr.replace("/", "");
	vr = vr.replace("/", "");
	vr = vr.replace("/", "");
	tam = vr.length + 1;
	if (tecla != 8 && tecla != 8){
		if (tam > 0 && tam < 2)
			Campo.value = vr.substr(0, 2) ;
		if (tam > 2 && tam < 4)
			Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2);
		if (tam > 4 && tam < 7)
			Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2) + '/' + vr.substr(4, 7);
	}
}
					   
function VerificaData(campo,valor) {
	var date=valor;
	var ardt=new Array;
	var ExpReg=new RegExp("(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[012])/[12][0-9]{3}");
	ardt=date.split("/");
	erro=false;
	if ( date.search(ExpReg)==-1){
		erro = true;
		}
	else if (((ardt[1]==4)||(ardt[1]==6)||(ardt[1]==9)||(ardt[1]==11))&&(ardt[0]>30))
		erro = true;
	else if ( ardt[1]==2) {
		if ((ardt[0]>28)&&((ardt[2]%4)!=0))
			erro = true;
		if ((ardt[0]>29)&&((ardt[2]%4)==0))
			erro = true;
	}
	if (erro) {
		alert("\"" + valor + "\" nao e uma data valida!");
		// comentado campo.focus();
		campo.value = "";
		return false;
	}
	return true;
}

stop = '';
function mascara( campo ) {
	campo.value = campo.value.replace( /[^\d]/g, '' )
	.replace( /^(\d\d)(\d)/, '($1) $2' )
	.replace( /(\d{4})(\d)/, '$1-$2' );
	if ( campo.value.length > 14 ) campo.value = stop;
		else stop = campo.value;    
}

function checarEmail( campo ){
if( document.forms[0].email.value=="" 
   || document.forms[0].email.value.indexOf('@')==-1 
     || document.forms[0].email.value.indexOf('.')==-1 )
	{
		alert( "Por favor, informe um E-MAIL valido!" );
		campo.focus();
		campo.value = "";
		return false;
	}
}

function validarCPF(campo,valor){
	var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;
	erro = false;
	
	if(!filtro.test(valor)){
		erro = true;
	}
   
	valor = remove(valor, ".");
	valor = remove(valor, "-");
	
	if(valor.length != 11 || valor == "00000000000" || valor == "11111111111" ||
		valor == "22222222222" || valor == "33333333333" || valor == "44444444444" ||
		valor == "55555555555" || valor == "66666666666" || valor == "77777777777" ||
		valor == "88888888888" || valor == "99999999999"){
		erro = true;
    }

	soma = 0;
	for(i = 0; i < 9; i++){
		soma += parseInt(valor.charAt(i)) * (10 - i);
	}
	
	resto = 11 - (soma % 11);
	if(resto == 10 || resto == 11){
		resto = 0;
	}
	if(resto != parseInt(valor.charAt(9))){
		erro = true;
	}
	
	soma = 0;
	for(i = 0; i < 10; i ++){
		soma += parseInt(valor.charAt(i)) * (11 - i);
	}
	resto = 11 - (soma % 11);
	if(resto == 10 || resto == 11){
		resto = 0;
	}
	
	if(resto != parseInt(valor.charAt(10))){
		erro = true;
	}
	if (erro) {
		alert("\"" + valor + "\" nao e um CPF valido!");
		// comentado campo.focus();
		campo.value = "";
		return false;
	}
	return true;
 }
 
function remove(str, sub) {
	i = str.indexOf(sub);
	r = "";
	if (i == -1) return str;
	{
		r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);
	}
	
	return r;
}

function mascaraCPF(o,f){
	v_obj=o
	v_fun=f
	setTimeout("execmascara()",1)
}

function execmascara(){
	v_obj.value=v_fun(v_obj.value)
}

function cpf_mask(v){
	v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
	v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o terceiro e o quarto dígitos
	v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o setimo e o oitava dígitos
	v=v.replace(/(\d{3})(\d)/,"$1-$2")   //Coloca ponto entre o decimoprimeiro e o decimosegundo dígitos
	return v
}