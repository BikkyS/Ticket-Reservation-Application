var tickets1 = [
  { no: "1", amount: 1400 },
  { no: "2", amount: 1400 },
  { no: "1A", amount: 1400 },
  { no: '2A', amount: 1400 },
  { no: '3A', amount: 1400 },
  { no: '4A', amount: 1400 },
  { no: '5A', amount: 1400 },
  { no: '6A', amount: 1400 },
  { no: '7A', amount: 1400 },
  { no: '8A', amount: 1400 },
  { no: '9A', amount: 1400 },
  { no: '10A', amount: 1400 },
  { no: '11A', amount: 1400 },
  { no: '12A', amount: 1400 },
  { no: '13A', amount: 1400 },
  { no: '14A', amount: 1400 },
  { no: '15A', amount: 1400 },
  { no: '16A', amount: 1400 },
  
 
];
str1 = ``;
str2 = ``;
tickets1.forEach(function (value, index) {

  str1 =
    str1 +
    `
    <div onclick="hide(this)" class="no" for='${value.no}#${value.amount}'  id="abc${value.no}" style='background-color: #e2d7d7;'>
    <img src="./images/seat.png" alt="not found" />
    <div  id="number${value.no}" class="seatno">${value.no}</div>
    </div>
    `;
});





var tickets3 = [
  { no: "", amount: 1400 },
  { no: "", amount: 1400 },
  { no: "", amount: 1400 },
  { no: "", amount: 1400 },
  { no: "", amount: 1400 },
  { no: "", amount: 1400 },
  { no: "", amount: 1400 },
  { no: "", amount: 1400 },
  { no: "17", amount: 1400 },
];
str3 = ``;
tickets3.forEach(function (value, index) {

  str3 =
    str3 +
    `
    <div onclick="hide(this)" class="no" for='${value.no}#${value.amount}'  id="abc${value.no}" style='background-color: #e2d7d7;visibility:hidden;
    margin-left: 10px;
    margin-right: 10px;' >
    <img   class="img abc${value.no}" src="./images/seat.png" alt="not found" />
    <div  id="number" class="seatno">${value.no}</div>
    </div>
    `;
});

var tickets4 = [
  { no: "", amount: 1400 },
  { no: "", amount: 1400 },
  { no: "", amount: 1400 },
  { no: "", amount: 1400 },
  { no: "", amount: 1400 },
  { no: "", amount: 1400 },
  { no: "", amount: 1400 },
  { no: "", amount: 1400 },
  { no: "15", amount: 1400 },
];
str4 = ``;
tickets4.forEach(function (value, index) {

  str4 =
    str4 +
    `
    <div onclick="hide(this)" class="no" for='${value.no}#${value.amount}'  id="abc${value.no}" style='background-color: #e2d7d7;visibility:hidden;
    margin-left: 10px;
    margin-right: 10px;' >
    <img   class="img abc${value.no}" src="./images/seat.png" alt="not found" />
    <div  id="number" class="seatno">${value.no}</div>
    </div>
    `;
});





var tickets2 = [
  { no: "क", amount: 1400 },
  { no: "ख", amount: 1400 },
  { no: "ग", amount: 1400 },
  { no: "घ", amount: 1400 },
  { no: "1B", amount: 1400 },
  { no: '2B', amount: 1400 },
  { no: '3B', amount: 1400 },
  { no: '4B', amount: 1400 },
  { no: '5B', amount: 1400 },
  { no: '6B', amount: 1400 },
  { no: '7B', amount: 1400 },
  { no: '8B', amount: 1400 },
  { no: '9B', amount: 1400 },
  { no: '10B', amount: 1400 },
  { no: '11B', amount: 1400 },
  { no: '12B', amount: 1400 },
  { no: '13B', amount: 1400 },
  { no: '14B', amount: 1400 },
  { no: '15B', amount: 1400 },
  { no: '16B', amount: 1400 },
];
str = ``;
tickets2.forEach(function (value, index) {

  str2 =
    str2 +
    `
    <div onclick="hide(this)" class="no" for='${value.no}#${value.amount}' id="abc${value.no}" style='background-color: #e2d7d7;'>
    <img   class="img" src="./images/seat.png" alt="not found" />
    <div  id="number" class="seatno">${value.no}</div>
    </div>
    `;
});
document.getElementById("main").innerHTML=str1;
document.getElementById("main3").innerHTML=str3;
document.getElementById("main2").innerHTML=str2;
document.getElementById("main4").innerHTML=str4;

arr1=[];
arr2=[];
let total_amount;
function hide(myvar) {
    let ans= myvar.attributes.for.value;
    let ans1=ans.split("#");
    
    
    if(myvar.style.backgroundColor=='rgb(226, 215, 215)'){
      myvar.style.backgroundColor='green';
      arr1.push(ans1[0]);
      arr2.push(ans1[1]);
      final_no=arr1.join(",");
      
      document.getElementById("ticket-no").innerHTML=final_no;

      let final_amount=arr2.join("+");
      total_amount =eval(final_amount);
      document.getElementById("ticket-amount").innerHTML=total_amount;
    }
    else if(myvar.style.backgroundColor==='green'){
      myvar.style.backgroundColor='rgb(226, 215, 215)';
      arr1.splice(arr1.indexOf(ans1[0]),1);
      arr2.splice(arr1.indexOf(ans1[0]),1);
    
      final_no=arr1.join(",");
      
      document.getElementById("ticket-no").innerHTML=final_no;
      final_amount=arr2.join("+");
      
      total_amount =eval(final_amount);
      
      document.getElementById("ticket-amount").innerHTML=total_amount;
    } 
    document.cookie="cseat="+arr1; 
    document.cookie="camount="+total_amount;
  }
                                 


//Create references to the dropdown's
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





var froms = ["Select From", "Malangwa"];
// var froms = ["Select From","Kathmandu", "Malangwa", "Lalitpur", "Birgunj", "Biratnagar", "Bhadrapur", "Tansen", "Rajbiraj", "Butwal", "Dharan", "Ilam", "Janakpur","Nepalganj","Pokhara","Siddharthanagar","Hetauda","Birendranagar","Dhangadhi","Lahan","Bheemdatta","Bharatpur","Dhankuta","Ghorahi","Banepa","Damak","Jaleshwar","Kalaiya","Dipayal Silgadhi","Taulihawa","Bidur","Dhulikhel","Inaruwa","Bhaktapur","Gaur","Tulsipur","Vyas","Amargadhi","Baglung","Bhimeshwar","Dasharathchand","Gorkha","Gulariya","Itahari","Kamalamai","Khandbari","Kirtipur","Madhyapur Thimi","Mechinagar","Narayan","Panauti","Putalibazar","Ramgram","Ratnanagar","Siraha","Tikapur","Triyuga","Waling"];

var tos = ["Select To","Kathmandu"];
// var tos = ["Select To","Kathmandu", "Malangwa", "Lalitpur", "Birgunj", "Biratnagar", "Bhadrapur", "Tansen", "Rajbiraj", "Butwal", "Dharan", "Ilam", "Janakpur","Nepalganj","Pokhara","Siddharthanagar","Hetauda","Birendranagar","Dhangadhi","Lahan","Bheemdatta","Bharatpur","Dhankuta","Ghorahi","Banepa","Damak","Jaleshwar","Kalaiya","Dipayal Silgadhi","Taulihawa","Bidur","Dhulikhel","Inaruwa","Bhaktapur","Gaur","Tulsipur","Vyas","Amargadhi","Baglung","Bhimeshwar","Dasharathchand","Gorkha","Gulariya","Itahari","Kamalamai","Khandbari","Kirtipur","Madhyapur Thimi","Mechinagar","Narayan","Panauti","Putalibazar","Ramgram","Ratnanagar","Siraha","Tikapur","Triyuga","Waling"];
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
    alert("Select From");
  }
  if(value==valueto){
    // alert("From and To Cannot be Same");
  }
  updatebus(value,valueto);
}

function updatebusto() {
  var from = document.getElementById('from');
  var to = document.getElementById('to');
  var value = from.options[from.selectedIndex].text;
  var valueto = to.options[to.selectedIndex].text;
   sessionStorage.setItem('to',valueto);
  
  if(valueto=="NaN"){
    alert("Select To");
  }
  if(value==valueto){
    alert("From and To Cannot be Same");
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
    console.log("hello");
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
  updatechart(value);
}
function updatechart(value){
  if(value==="Sangrila"){
    document.getElementById('main4').style.display='none';
    document.getElementById('abcग').style.display='none';
    document.getElementById('abcघ').style.display='none';
  tickets1.forEach(function (value, index) {
    let z="abc"+value.no;
    let y="number"+value.no;
    let a=value.no+'#'+value.amount;
    document.getElementById(y).innerText=value.no;
  document.getElementById(z).setAttribute("for", a);
  });
  tickets1.forEach(function (value, index) {
    let z="abc"+value.no;
      document.getElementById(z).style.visibility='visible';
      document.getElementById(z).style.display='inline';
      document.getElementById('main').style.gridTemplateColumns='65px 60px';
      if(z=="abc2"){
        document.getElementById('abc2').style.visibility='hidden';
      }
    }
  );
  tickets3.forEach(function (value, index) {
    if(value.no=='17'){
      document.getElementById('abc17').style.visibility='visible';
    }
    }
  );
}
  else if(value==="Shivparvati"){
  document.getElementById('abc1').style.visibility='hidden';
  document.getElementById('abc2').style.visibility='hidden';
  document.getElementById('abc17').style.visibility='visible';
  document.getElementById('abc15').style.visibility='visible';
  document.getElementById('abc15B').style.display='none';
  document.getElementById('abc16B').style.display='none';
  }

else if(value==="Kabeli"){
  tickets1.forEach(function (value, index) {
    let z="abc"+value.no;
    let a=value.no+'#'+value.amount;
    document.getElementById(z).style.visibility='visible';
    document.getElementById(z).style.display='inline';
    document.getElementById('main').style.gridTemplateColumns='65px 60px';
  document.getElementById(z).setAttribute("for", a);
  });
  document.getElementById("number1A").innerText="2";
  document.getElementById("abc1A").setAttribute("for","2#1300");
  document.getElementById("number3A").innerText="3";
  document.getElementById("abc3A").setAttribute("for","3#1300");
  document.getElementById("number5A").innerText="4";
  document.getElementById("abc5A").setAttribute("for","4#1300");
  document.getElementById("number7A").innerText="5";
  document.getElementById("abc7A").setAttribute("for","5#1300");
  document.getElementById("number9A").innerText="6";
  document.getElementById("abc9A").setAttribute("for","6#1300");
  document.getElementById("number11A").innerText="7";
  document.getElementById("abc11A").setAttribute("for","7#1300");
  document.getElementById("number13A").innerText="8";
  document.getElementById("abc13A").setAttribute("for","8#1300");
  document.getElementById("number15A").innerText="9";
  document.getElementById("abc15A").setAttribute("for","9#1300");
  tickets1.forEach(function (value, index) {
    let z="abc"+value.no;
    if(value.no=='2A'||value.no=='4A'||value.no=='6A'||value.no=='8A'||value.no=='10A'||value.no=='12A'||value.no=='14A'||value.no=='16A'||value.no=='2'){
      document.getElementById('main').style.gridTemplateColumns= '65px';
      document.getElementById(z).style.display='none';
    }
  //   let z="abc"+value.no;
      
  //     if(value.no=='2'){
  //       document.getElementById('abc2').style.visibility='hidden';
  //       document.getElementById('abc16A').setAttribute("for","16A#1300");
  //     }
    }
  )
}
}
if( sessionStorage.getItem('bus')){
  var a= sessionStorage.getItem('bus');
  console.log(a);
  updatechart(a);
}
sessionStorage.clear();


