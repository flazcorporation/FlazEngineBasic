function strToNumber(strg,thousand,decimal){
    var strg = strg || "";
    strg = strg.replace(/[^0-9$.,]/g, '');
    if(strg.indexOf(',') > strg.indexOf('.')) decimal = ',';
    if((strg.match(new RegExp("\\" + decimal,"g")) || []).length > 1) decimal="";
    if (decimal != "" && (strg.length - strg.indexOf(decimal) - 1 == 3) && strg.indexOf("0" + decimal)!==0) decimal = "";
    strg = strg.replace(new RegExp("[^0-9$" + decimal + "]","g"), "");
    strg = strg.replace(',', '.');
    return parseFloat(strg);
}
function numberToStr(x,thousand,decimal){
    var parts = x.toString().split(thousand);
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousand);
    return parts.join(decimal);
}
function isFloat(value){
	var pattern=/^\d+(\.\d{2})?$/;
	if(pattern.test(value)){
		if (value.indexOf('.') > -1){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}