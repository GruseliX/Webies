//Aufgabe 2a
var currentCalculation = celsiusToFahrenheit;

registerEvents();


function convert(){
    let input = document.getElementsByTagName("input")[0].value;
    //let res = null; //TODO: replace by calculation
    //Aufgabe 2a
    let res = currentCalculation(input);
    setOutput(res);
}

function registerEvents(){
    //TODO: register click events for buttons
    //Aufgabe 2b
    let buttons = document.getElementsByClassName('calcButton');
    //Aufgabe 1a
    document.querySelector('button').addEventListener('click',convert);
}

function setOutput(value){
    let out = document.getElementById("output");
    //TODO: unset ghost values class
    //Aufgabe 2b
    out.innerHTML="";
    delete out;
    out.innerHTML = value;
}

//Aufgabe 1e -Kommentare
function superSafeSignature(inputText){
    // der eingegebene Text wird in einen Array aufgetrennt 
    // (Trennung erfolgt nach jedem Zeichen)
    // und von jedem dieser Zeichen wird der entsprechende Unicode ermittelt
    let chars = inputText.split("").map(x => x.charCodeAt(0));
    let summe = 0;
    let prev = 1;
    chars.forEach(element => {
        summe += element / prev;
        summe = summe % 1000000;
        prev = element;
    });
    //der zurueck gelieferte Wert ist mindestens 7 stellig
    return Math.round(summe * 1000000);
}

//insert conversion functions here

//Aufgabe 1a -Input String
function celsiusToFahrenheit(inputText){
    let floatInputCelsius = +(inputText);
    //Formel:   F = °C × 1,8 + 32
    let resultFahrenheit = floatInputCelsius * 1.8 + 32;
    return resultFahrenheit.toString();
}

//Aufgabe 1b
function isPrime(inputText){
    //pruefe Eingabe - nur int erlaubt
    //regex-Ausdruck nur Zahlen
    if(/^\d*$/g.test(inputText)){
	let integerInputNumber = Number(inputText);
	//pruefe, ob Primzahl
	if (integerInputNumber ==1 ){
	    return "true";
	}
	for (var i = 2;i < integerInputNumber;i++){
	    if( integerInputNumber % i ==0) {
		return "false";
	    }
	}
	return "true";

    //sonst Fehler in output box anzeigen
    } else {
	return "entered input contains characters";
    }    
}

//Aufgabe 1c
function reverseString(inputText){
	return inputText.split('').reverse().join('');
}

//Aufgabe 1d
function token (inputText) {
    //Zeit bestimmen
    var day = new Date();
    var today = day.getFullYear()+'-'+(day.getMonth()+1)+'-'+day.getDate();
    var currentTime = "T"+day.getHours() + ":" + day.getMinutes() + ":" + day.getSeconds();
    var time = today + currentTime;

    //signatur bestimmen
    var sig = superSafeSignature(inputText);

    //JSON ausgeben
    return JSON.stringify({ token: {msg:inputText, date: time}, signature : sig });
}