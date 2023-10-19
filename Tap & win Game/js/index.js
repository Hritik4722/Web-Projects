const red = document.getElementById("red");
const blue = document.getElementById("blue");
const parent = document.getElementById("parent");

let redH = 50;
let blueH = 50;
let isred = false;
let isblue = false;
let isstarted = false

function start(){
    red.innerHTML ="";
  blue.innerHTML ="";
  isstarted = true;
}

function reset(){
  red.style.height = "50%";
  blue.style.height = "50%";
  red.innerHTML =`<p class="start"> Tap </p>`;
  blue.innerHTML =`<p class="start"> Tap </p>`;
  parent.style.backgroundColor = "#fff";
  redH = 50;
  blueH = 50;
  isred = false;
  isblue= false;
  isstarted = false;
}
function counter(){
let count = 4;
  const counter = document.getElementById("counter");
 let timer =  setInterval(function(){
    counter.innerText = count;
       if(count === 0 || count < 0) {
      clearInterval(timer);
      reset();
    }
    count = count - 1;

  },1000)
}
red.addEventListener('click' ,()=>{
  if(!isstarted){
   start(); 
  }
  if(blueH !== 100 && redH !== 100){
  redH = redH + 2;
  blueH = blueH - 2;
  red.style.height = redH + "%";
  blue.style.height = blueH +"%";
  }
  if(redH === 100){
    if(!isred){
    red.innerHTML = `    <h2 class="winM">Red won</h2>
    <div class="counter">
      <p>Game Start in <span id= "counter">5</span></p>
     </div>`;
     parent.style.backgroundColor = "blue";
    counter();
      isred = true;
    }
  }
});

blue.addEventListener('click' ,()=>{
  if(!isstarted){
    start();
  }
  if(blueH !== 100 && redH !== 100){
  redH = redH - 2;
  blueH = blueH + 2;
  red.style.height = redH + "%";
  blue.style.height = blueH +"%";
  }
  if(blueH === 100){
    if(!isblue){
    blue.innerHTML = `    <h2 class="winM">Blue won</h2>
    <div class="counter">
      <p>Game Start in <span id= "counter">5</span></p>
     </div>`;
     parent.style.backgroundColor = "red";
    counter();
    isblue= true;}
  }
});
