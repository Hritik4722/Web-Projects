 
let clear = document.getElementById('clr-1'); 
let percentage = document.getElementById('%'); 
let clearAll = document.getElementById('clr'); 
let calculate = document.getElementById('calculate'); 
let leftshift = document.getElementById('<'); 
let rightshift = document.getElementById('>'); 
let inputbox = document.getElementById('inputdiv'); 
function writee(value) {
  inputbox.value += value;
} 
function clear_All(){
  inputbox.value = "";
}
function calculateResult() {
  try {
    const result = eval(inputbox.value);
    inputbox.value = result;
  } catch (e) {
    inputbox.value = 'Error';
    console.log(e);
  }
}
function clr_last() {
  
  const inputValue = inputbox.value;

  if (inputValue.length > 0) {
    inputbox.value = inputValue.slice(0, -1); 
  }
}
