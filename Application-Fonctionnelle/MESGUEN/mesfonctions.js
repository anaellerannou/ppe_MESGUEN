function afficheHello()
{
	alert("Hello world...");
}

function afficheBonjour()
{
	alert("Bonjour...");
}

function afficheCoucou()
{
	alert("Coucou...");
}

function afficheMessage(unMessage)
{
	alert(unMessage);
}

function Validation(unLien, unMessage)
{
	if(confirm(unMessage))
		parent.location=unLien;
}

function randomColor() {
	var chars = "0123456789abcdef";
	var color = "#";
	for (var i=0; i<6; i++) {
		var rnd = Math.floor(16 * Math.random());
		color += chars.charAt(rnd);
	}
	return color;
}

function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

	return true;
}

function isAlphaKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (charCode > 31 && (	(charCode < 65 || charCode > 90) &&
							(charCode < 97 || charCode > 122) &&
							(charCode != 32) ))
		return false;

	return true;
}

function isRealNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (charCode == 46) {
		cpt++;
			if (cpt > 1)
				return false;
			else
				return true;
	}
	
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

	return true;
}

function testform()
{
	var chaine="";

	elt=document.forms['formulaire'].elements['info'];
	if (elt.value == "") {
		chaine=chaine + " info";
	}

	if (chaine=="") {
		document.getElementById('erreur').style.color="green";
		document.getElementById('erreur').innerHTML ="Insertion OK...";
		return True;
	} else {
		document.getElementById('erreur').style.color="red";
		document.getElementById('erreur').innerHTML ="Renseigner les champs : - "+chaine;
		return False;
	}
}

function sleep(milliSeconds)
{
	var startTime = new Date().getTime(); // récupère l'heure système
	while (new Date().getTime() < startTime + milliSeconds); // Temporise grace à une boucle
}