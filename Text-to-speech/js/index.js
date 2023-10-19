let speech = new SpeechSynthesisUtterance();
let btn = document.getElementById("btn");
let textarea = document.getElementById("text");

btn.addEventListener('click', ()=>{
  speech.text = textarea.value;
  window.speechSynthesis.speak(speech);
})