const prev = document.getElementById('prev');
console.log('Prev element:', prev.textContent);
const curr = document.getElementById('curr');



function cleardisplay(){
    curr.textContent='';
    prev.textContent='';
}

function calculateResult(){
    try{
        curr.textContent=eval(prev.textContent);
    }
    catch(error){
        curr.textContent='Error';
}
}

function appendToDisplay(input){
    console.log('Button clicked:', input);
   if (prev.textContent === '0') {
        prev.textContent = input;
    } else {
        prev.textContent += input;
    }
}