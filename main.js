function _(el) {
	
	return document.getElementById(el);
	
}

function setColor(el, color) {
	
	_(el).setAttribute('style', 'color: ' + color);
	
}