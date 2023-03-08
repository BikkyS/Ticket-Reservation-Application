var froms = ["Select From", "Malangwa"];

var tos = ["Select To","Kathmandu"];
var from = document.getElementById('from');
var to = document.getElementById('to');
var bus = document.getElementById('bus');

for (var index in froms) {
  from.options[from.options.length] = new Option(froms[index], froms[index]);
}
for (var index in tos) {
  to.options[to.options.length] = new Option(tos[index], tos[index]);
}

to.addEventListener('change', updatebusto);
from.addEventListener('change', updatebusfrom);


function updatebusfrom() {
  var from = document.getElementById('from');
  var to = document.getElementById('to');
  var value = from.options[from.selectedIndex].text;
  var valueto = to.options[to.selectedIndex].text;
   sessionStorage.setItem('from',value);
   sessionStorage.setItem('to',valueto);
  
  if(value=="NaN"){
    alert("Select From")
  }
  if(value==valueto){
    alert("From and To Cannot be Same");
  }
  updatebus(value,valueto);
}

function updatebusto() {
  var from = document.getElementById('from');
  var to = document.getElementById('to');
  var value = from.options[from.selectedIndex].text;
  var valueto = to.options[to.selectedIndex].text;
   sessionStorage.setItem('to',valueto);
  if(value==valueto){
   
  }
  updatebus(value,valueto);
}
var buses=[];
function updatebus(from,to) {
  // console.log(from=="Kathmandu");
  if((from=="Kathmandu" && to=="Malangwa") || (from=="Malangwa" && to=="Kathmandu")){
    //Delete all of the children of the day dropdown
    //if they do exist
    while(bus.firstChild){
      bus.removeChild(bus.firstChild);
    }
    buses=["Select Bus","Sangrila","Shivparvati"];
    for (var index in buses) {
      bus.options[bus.options.length] = new Option(buses[index], buses[index]);
    }
  }
  // (from =="Kathmandu" && to =="Malangwa") || (from =="Malangwa" && to =="Kathmandu")
  else{
    //Delete all of the children of the day dropdown
    //if they do exist
    while(bus.firstChild){
      bus.removeChild(bus.firstChild);
    }
    buses=["No Bus Available"];
    for (var index in buses) {
      bus.options[bus.options.length] = new Option(buses[index], buses[index]);
    }
  }
}

bus.addEventListener('change', getbus);
function getbus(){
  var value= bus.options[bus.selectedIndex].textContent;
  sessionStorage.setItem('bus',value);
}
const monthSelect = document.getElementById("month");
const daySelect = document.getElementById("day");

const months = ["Select Month","Baishakh", "Jestha", "Ashadh", "Shrawan", "Bhadau", "Ashwin", "Kartik", "Mangsir", "Poush", "Magh", "Falgun", "Chaitra"];

//Months are always the same
(function populateMonths(){
    for(let i = 0; i < months.length; i++){
        const option = document.createElement('option');
        option.textContent = months[i];
        option.value = months[i];
        monthSelect.appendChild(option);
    }
    monthSelect.value = "Select Month";
})();

let previousDay;

function populateDays(month){
    //Delete all of the children of the day dropdown
    //if they do exist
    while(daySelect.firstChild){
        daySelect.removeChild(daySelect.firstChild);
    }
    //Holds the number of days in the month
    let dayNum;

    if(month === 'Baishakh' || month === 'Ashadh' || 
    month === 'Bhadau') {
        dayNum = 31;
    } else if(month === 'Kartik' || month === 'Poush' 
    || month === 'Falgun' || month === 'Chaitra') {
        dayNum = 30;
    }else if(month === 'Jestha' || month === 'Shrawan' 
    || month === 'Ashwin' || month === 'Mangsir' || month === 'Magh') {
        dayNum = 32;
    }else if(month==='NaN'){
      dayNum = 0;
    }


    //Insert the correct days into the day <select>
    for(let i = 1; i <= dayNum; i++){
        const option = document.createElement("option");
        option.textContent = i;
        daySelect.appendChild(option);
    }
    if(previousDay){
        daySelect.value = previousDay;
        if(daySelect.value === ""){
            daySelect.value = previousDay - 1;
        }
        if(daySelect.value === ""){
            daySelect.value = previousDay - 2;
        }
        if(daySelect.value === ""){
            daySelect.value = previousDay - 3;
        }
    }
}
populateDays(monthSelect.value);
monthSelect.onchange = function() {
  populateDays(monthSelect.value);
}
daySelect.onchange = function() {
  previousDay = daySelect.value;
}
