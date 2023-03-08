let a=document.getElementById('payment-button1');

const z=sessionStorage.getItem("num");
let fname=[];
let number=[];
let boaddress=[];
let depaddress=[];
for(let i=0;i<z;i++){
    fname[i]=document.getElementById('fname'+i);
    number[i]=document.getElementById('number'+i);
    boaddress[i]=document.getElementById('boaddress'+i);
    depaddress[i]=document.getElementById('depaddress'+i);
}

for(let i=0;i<z;i++){
  cusform.addEventListener("input",()=>{
  if(fname[i].value.length>0 && number[i].value.length>0 && boaddress[i].value.length>0 && depaddress[i].value.length>0 ){
        a.style.visibility="hidden";
      
    }
   else{
    a.style.visibility="visible";
   }
});
}
