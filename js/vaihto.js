function valitse(valinta) {
	var source = valinta.getAttribute("href");
	var placeholder = document.getElementById("placeholder");
	placeholder.setAttribute("src", source);
	var text = valinta.getAttribute("title");
	var description = document.getElementById("tiedot");
	description.firstChild.nodeValue = text;
}