function disable(form) {
	if (validateUsername(form)&&validatePassword(form)&&confirmPassword(form)&&validateNama(form)&&validateEmail(form)&&Checkfiles())
		document.getElementById("submit").disabled=false;
	else
		document.getElementById("submit").disabled=true;
}

function validateUsername(form){
var validate=/\w{5}/ 
if (!validate.test(form.username.value)){
	document.getElementById("errorMsgUsername").innerHTML = "*Username minimal 5 karakter";
	return false;}
else
	document.getElementById("errorMsgUsername").innerHTML = "";
	return true;
}

function validatePassword(form){
var validate2=/\w{8}/ 
if (!validate2.test(form.password.value)){
	document.getElementById('errorMsgPassword').innerHTML = "*Password minimal 8 karakter";
	return false;}
else
if((form.password.value==form.username.value)||(form.password.value==form.email.value)){
	document.getElementById('errorMsgPassword').innerHTML = "*Password tidak boleh sama dengan username atau email";
	return false;}
else
	document.getElementById('errorMsgPassword').innerHTML = "";
	return true;
}


function confirmPassword(form){
if (form.password.value!=form.cnfpassword.value){
	document.getElementById('errorMsgCnfPassword').innerHTML = "*Password tidak cocok";
	return false;}
else
	document.getElementById('errorMsgCnfPassword').innerHTML = "";
	return true;
}

function validateNama(form){
var validate3=/^((\b[a-zA-Z]{1,40}\b)\s*){2,}$/
if (!validate3.test(form.nama.value)){
	document.getElementById("errorMsgNama").innerHTML = "*Nama minimal dua kata";
	return false;}
else
	document.getElementById("errorMsgNama").innerHTML = "";
	return true;
}

function validateEmail(form){
var validate4 = /([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})/
if (!validate4.test(form.email.value)){ // format email salah
	document.getElementById('errorMsgEmail').innerHTML = "*Format Email salah";
	return false;}
else
if(form.email.value == form.password.value){
	document.getElementById('errorMsgEmail').innerHTML = "*Email tidak boleh sama dengan password";
	return false;}
else
	document.getElementById('errorMsgEmail').innerHTML = "";
	return true;
}

function validateTanggal(form){
var validate5= /^((19|20)\d\d)-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])/
if (validate5.test(form.tanggal.value)){
	document.getElementById("errorMsgTanggal").innerHTML = "*Tanggal tidak sesuai format";
	return false;}
else
	document.getElementById("errorMsgTanggal").innerHTML = "";
	return true;
}

function Checkfiles()
{
	var fup = document.getElementById("filename");
	var fileName = fup.value;
	var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	if(ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG")
	{
	document.getElementById("errorMsgAvatar").innerHTML = "";
	return true;
	} 
	else
	{
	document.getElementById("errorMsgAvatar").innerHTML = "*Format harus .jpg atau .jpeg";
	return false;
	}
}

function CheckVideo()
{
	var fup = document.getElementById("attach");
	var fileName = fup.value;
	var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	if(ext == "MP4" || ext == "mp4" || ext == "OGG" || ext == "ogg" || ext == "WebM")
		return true;
	else
		return false;
}

function CheckImage()
{
	var fup = document.getElementById("attach");
	var fileName = fup.value;
	var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	if(ext == "JPG" || ext == "JPEG" || ext == "GIF" || ext == "PNG" || ext == "jpg" || ext == "jpeg" || ext == "gif" || ext == "png")
		return true;
	else
		return false;
}

function CheckDocument()
{
	var fup = document.getElementById("attach");
	var fileName = fup.value;
	var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	if(ext == "PDF" || ext == "pdf" || ext == "DOC" || ext == "doc" || ext == "DOCX" || ext == "docx")
		return true;
	else
		return false;
}

function Show()
{
	var fup = document.getElementById("attach");
	var fileName = fup.value;
	if (CheckImage())
	{
		document.getElementById('show').innerHTML = "<img src='"+fileName+"' width='320' height='240'></img>";
	}
	else
	if (CheckVideo())
	{
		document.getElementById('show').innerHTML = "<video width='320' height='240' controls><source src='"+fileName+"' type='video/mp4'><source src='"+fileName+"' type='video/webm'><source src='"+fileName+"' type='video/ogg'></video>";
	}
	else
	if (CheckDocument())
	{
		window.open(fileName);
	}
}

function Edit()
{
	document.getElementById('deadline').innerHTML = "<input name='deadline1' id='deadline1'></input>";
	document.getElementById('asignee').innerHTML = "<input type='text' name='asignee1' id='asignee1' autocomplete='on'></input>";
	document.getElementById('tag').innerHTML = "<input type='text' name='tag1' id='tag1'></input>";
	document.getElementById('savechange').disabled=false;
	document.getElementById('taskbtn').disabled=true;
}

function Done()
{
	var deadline = document.getElementById('deadline1');
	var asignee = document.getElementById('asignee1');
	var tag = document.getElementById('tag1');
	document.getElementById('deadline').innerHTML = ""+deadline.value+"";
	document.getElementById('asignee').innerHTML = ""+asignee.value+"";
	document.getElementById('tag').innerHTML = ""+tag.value+"";
	document.getElementById('savechange').disabled=true;
	document.getElementById('taskbtn').disabled=false;
}
