function trmouseover(el) {
	el.style.backgroundColor = "#DDDDDD"
}
function trmouseout(el) {
	el.style.backgroundColor = ""
}

function boxmouseover(el2,litecolor,darkcolor) {
	el = document.getElementById(el2);
	
	el.style.backgroundColor = "#ffffff"
	el.style.borderTop = "1px solid " + darkcolor;
	el.style.borderRight = "1px solid " + litecolor;
	el.style.borderBottom = "1px solid " + litecolor;
	el.style.borderLeft = "1px solid " + darkcolor;
}
function boxmouseout(el2) {
	el = document.getElementById(el2);
	
	el.style.backgroundColor = "#ffffff"
	el.style.borderTop = "1px solid " + "#848484";
	el.style.borderRight = "1px solid " + "#D6D6CE";
	el.style.borderBottom = "1px solid " + "#D6D6CE";
	el.style.borderLeft = "1px solid " + "#848484";
}

function mriSwitchOn(el2) {
	elForm = document.getElementById("mri_via_form");
	elFax = document.getElementById("mri_via_fax");
	
	if (el2 == "mri_via_fax") {
		elFax.style.display = "block";
		elForm.style.display = "none";
	} else {
		elForm.style.display = "block";
		elFax.style.display = "none";
	}
}