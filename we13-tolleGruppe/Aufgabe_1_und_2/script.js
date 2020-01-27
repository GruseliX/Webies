//Aufgabe 2a
var currentCalculation = celsiusToFahrenheit;
var buttons;

registerEvents();

//function convert() {
// Aufgabe 2c
function convert(id) {
  let input = document.getElementsByTagName("input")[0].value;
  //let res = null; //TODO: replace by calculation

  // Aufgabe 2c
  // setzt die aktuelle Id-Bezeichnung des Buttons als Berechnungsfunktionsname
  if (typeof id !== "undefined") {
    currentCalculation = id;
  }

  //Aufgabe 2a
  let res = currentCalculation(input);
  setOutput(res);
  return;
}

function registerEvents() {
  //TODO: register click events for buttons
  //Aufgabe 2b
  buttons = document.getElementsByClassName("calcButton");

  //Aufgabe 2c
  // Übergibt die jeweilige Funktion an convert
    // Version 1
  //document.querySelectorAll(".calcButton").forEach(x => x.addEventListener("click", convert(x.id)));
  // Version 2
    document
      .querySelectorAll(".calcButton")[0]
      .addEventListener("click", convert(celsiusToFahrenheit));
    document
      .querySelectorAll(".calcButton")[1]
      .addEventListener("click", convert(isPrime));
    document
      .querySelectorAll(".calcButton")[2]
      .addEventListener("click", convert(reverseString));
    document
      .querySelectorAll(".calcButton")[3]
      .addEventListener("click", convert(token));

      // Version 3
//   let attribute = [
//       document.createAttribute("onclick"),
//       document.createAttribute("onclick"),
//       document.createAttribute("onclick"),
//       document.createAttribute("onclick")
//   ]
//   let value = [
//     convert(celsiusToFahrenheit),
//     convert(isPrime),
//     convert(reverseString),
//     convert(token)
//   ];

//   let i = 0;
//   for(x in attribute){
//     attribute[x].value = value[i];
//     i++;
//   }
//   document
//     .querySelectorAll(".calcButton")[0]
//     .setAttributeNode(attribute[0]);

//   document
//     .querySelectorAll(".calcButton")[1]
//     .setAttributeNote(attribute[1]);

//   document
//     .querySelectorAll(".calcButton")[2]
//     .setAttributeNote(attribute[2]);
//   document
//     .querySelectorAll(".calcButton")[3]
//     .setAttributeNote(attribute[3]);

    // Version 4
// document
//     .querySelectorAll(".calcButton")[0]
//     .onclick(convert(celsiusToFahrenheit));

//   document
//     .querySelectorAll(".calcButton")[1]
//     .onclick(convert(isPrime));
    

//   document
//     .querySelectorAll(".calcButton")[2]
//     .onclick(convert(reverseString));
//   document
//     .querySelectorAll(".calcButton")[3]
//     .onclick(convert(token));


  //Aufgabe 1a
  //document.querySelector("button").addEventListener("click", convert);
  return;
}

function setOutput(value) {
  let out = document.getElementById("output");
  //TODO: unset ghost values class
  //Aufgabe 2b
  out.innerHTML = "";
  delete out;
  out.innerHTML = value;
}

//Aufgabe 1e -Kommentare
function superSafeSignature(inputText) {
  // der eingegebene Text wird in einen Array aufgetrennt
  // (Trennung erfolgt nach jedem Zeichen)
  // und von jedem dieser Zeichen wird der entsprechende Dezimalwert
  // der Unicode Repräsentation des einzelnen Chars ermittelt.
  let chars = inputText.split("").map(x => x.charCodeAt(0));
  let summe = 0;
  let prev = 1;
  // Das zuvor angelegte Array wird Element für Element bearbeitet.
  chars.forEach(element => {
    // zunächst wird das aktuelle Element durch das vorherige geteilt.
    summe += element / prev;
    // daraufhin wird dafür gesorgt dass das Ergebnis nicht mehr als 6 Vorkommastellen hat.
    summe = summe % 1000000;
    // zu Letzt wird das aktuelle Element für die nächste
    // Itteration als letztes Element abgespeichert.
    prev = element;
  });
  // der zurueck gelieferte Wert ist immer 8 stellig und immer eine Ganzzahl
  return Math.round(summe * 1000000);
}

//insert conversion functions here

//Aufgabe 1a -Input String
function celsiusToFahrenheit(inputText) {
  if (/^\d+$/g.test(inputText)) {
    let floatInputCelsius = +inputText;
    //Formel:   F = °C × 1,8 + 32
    let resultFahrenheit = floatInputCelsius * 1.8 + 32;
    return resultFahrenheit.toString();
  } else {
    return "entered input contains characters";
  }
}

//Aufgabe 1b
function isPrime(inputText) {
  //pruefe Eingabe - nur int erlaubt
  //regex-Ausdruck nur Zahlen
  if (/^\d+$/g.test(inputText)) {
    let integerInputNumber = Number(inputText);
    //pruefe, ob Primzahl
    if (integerInputNumber == 1) {
      return "true";
    }
    for (var i = 2; i < integerInputNumber; i++) {
      if (integerInputNumber % i == 0) {
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
function reverseString(inputText) {
  return inputText.split("").reverse().join("");
}

//Aufgabe 1d
function token(inputText) {
  //Zeit bestimmen
  var day = new Date();
  var today =
    day.getFullYear() + "-" + (day.getMonth() + 1) + "-" + day.getDate();
  var currentTime =
    "T" + day.getHours() + ":" + day.getMinutes() + ":" + day.getSeconds();
  var time = today + currentTime;

  //signatur bestimmen
  var sig = superSafeSignature(inputText);

  //JSON ausgeben
  return JSON.stringify({
    token: { msg: inputText, date: time },
    signature: sig
  });
}
