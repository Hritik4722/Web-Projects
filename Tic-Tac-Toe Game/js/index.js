const boxes = document.getElementsByClassName("boxes");
const reset = document.getElementById("reset");
let turn = "X";
let gameover = false;
let indexof = [0,0,0];

let changeTurn = ()=> {
  return turn === "X" ? "0": "X";
}

function checkwin() {
  let boxtext = document.querySelectorAll(".boxtext");
  let boxes = document.querySelectorAll(".boxes");
  let won = [
    [0,1,2],
    [3,4,5],
    [6,7,8],
    [0,4,8],
    [2,4,6],
    [0,3,6],
    [1,4,7],
    [2,5,8]
  ];
  for (let i = 0; i < won.length; i++) {
    let [a,b,c] = won[i];
    if ((boxtext[a].innerText === boxtext[b].innerText) && (boxtext[b].innerText === boxtext[c].innerText) && (boxtext[a].innerText !== "")) {
      gameover = true
      indexof = won[i];
      boxes[a].style.background = "#d77f7f"
      boxes[b].style.background = "#d77f7f"
      boxes[c].style.background = "#d77f7f"
     
    }
  }
}

Array.from(boxes).forEach(element => {
   element.addEventListener('click', ()=> {
     let boxtext = element.querySelector(".boxtext");
     if (!gameover) {
       if (boxtext.innerText === "") {
         boxtext.innerText = turn;
         turn = changeTurn();
         checkwin();
       }
     }
   });
    reset.addEventListener('click',()=> {
      let boxtext = element.querySelectorAll(".boxtext");
      let boxes = document.querySelectorAll(".boxes");
      
      Array.from(boxtext).forEach(e => {
        e.innerText = "";
        turn = "X";
        gameover = false;
      });
      for(let i = 0 ; i < 3 ; i++){
      boxes[indexof[i]].style.removeProperty("background")
      }
    });
});