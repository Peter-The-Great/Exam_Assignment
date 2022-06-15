//Pak de huidige datum
let date = new Date();
//Daarna maak je het copyright jaar door het huidige jaar aan te roepen.
$("#copy").html("Copyright © " + date.getFullYear() + " ");