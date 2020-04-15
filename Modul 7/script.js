var num1;
var num2;
var hasil;
var opr;
var opr_select = false;
function set(num){
    var result = document.getElementById("output").value;
    switch(result){
        case "0":
            result = num;
            break;
        default:
            result = result + num;
            break;
    }
    document.getElementById("output").value = result;
}
function clr() {
	document.getElementById("output").value = "0";
	bil1 = 0;
	bil2 = 0;
	opr_seleksi = false;
}

function operator(o){
    opr_select = true;
	num1 = parseFloat(document.getElementById("output").value);
	opr = o;
	document.getElementById("output").value = "0";
}

function point() {
	var result = document.getElementById("output").value;
	if (result.includes(".") == false) {
		result += ".";
	}
	document.getElementById("output").value = result;	
}

function count() {
	if (opr_select == true) {
		num2 = parseFloat(document.getElementById("output").value);
		switch(opr){
			case "*" :
				hasil = num1 * num2;
				document.getElementById("output").value = hasil;			
				break;
			case "/" :
				hasil = num1 / num2;
				document.getElementById("output").value = hasil;
				break;
			case "-" :
				hasil = num1 - num2;
				document.getElementById("output").value = hasil;
				break;
			case "+" :
				hasil = num1 + num2;
				document.getElementById("output").value = hasil;
				break;
		}
		opr_select = false
		hasil = 0;
		num1 = 0;
		num2 = 0;
	}
}

 
