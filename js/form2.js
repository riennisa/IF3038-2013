function disable(form) {
	if (validateAsignee(form)&&validateTag(newtask)&&Checkfiles())
		document.getElementById("submit").disabled=false;
	else
		document.getElementById("submit").disabled=true;
}

function validateNamaTugas(form){
var validate=/^[a-zA-Z0-9]{0,25}$/ 
if (!validate.test(form.namatugas.value)){
	document.getElementById("errorMsgNamaTugas").innerHTML = "*Username maksimal 25 karakter";
	return false;}
else
	document.getElementById("errorMsgNamaTugas").innerHTML = "";
	return true;
}

function validateAsignee(form){
var validate=/\w{1}/ 
if (!validate.test(form.asignee.value)){
	document.getElementById("errorMsgAsignee").innerHTML = "*Nama tidak boleh kosong";
	return false;}
else
	document.getElementById("errorMsgAsignee").innerHTML = "";
	return true;
}
function validateTag(form){
var validate=/\w{1}/ 
if (!validate.test(form.tag.value)){
	document.getElementById("errorMsgTag").innerHTML = "*Tag tidak boleh kosong";
	return false;}
else
	document.getElementById("errorMsgTag").innerHTML = "";
	return true;
}

function CheckVideo()
{
	var fup = document.getElementById("filename");
	var fileName = fup.value;
	var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	if(ext == "MP4" || ext == "mp4" || ext == "OGG" || ext == "ogg" || ext == "WebM")
		return true;
	else
		return false;
}

function CheckDocument()
{
	var fup = document.getElementById("filename");
	var fileName = fup.value;
	var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	if(ext == "PDF" || ext == "pdf" || ext == "DOC" || ext == "doc" || ext == "DOCX" || ext == "docx")
		return true;
	else
		return false;
}

function CheckImage()
{
	var fup = document.getElementById("filename");
	var fileName = fup.value;
	var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	if(ext == "JPG" || ext == "JPEG" || ext == "GIF" || ext == "PNG" || ext == "jpg" || ext == "jpeg" || ext == "gif" || ext == "png")
		return true;
	else
		return false;
}

function Checkfiles()
{
	if(CheckVideo() || CheckImage() || CheckDocument())
	{
	document.getElementById("errorMsgAvatar1").innerHTML = "";
	return true;
	} 
	else
	{
	document.getElementById("errorMsgAvatar1").innerHTML = "*Format salah";
	return false;
	}
}