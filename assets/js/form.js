function ajouteLigne ()
{
clone = document.getElementById("a_cloner").cloneNode(true);
document.getElementById("tab").appendChild (clone);
}


function suppression(){
	var field = document.getElementById('a_cloner');
	field.parentNode.removeChild(field);
}