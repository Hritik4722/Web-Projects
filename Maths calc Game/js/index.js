'use strict';

function random(max) {
  return Math.floor(Math.random() * max) + 1;
}

function assignOperator(operator) {
  if (operator === 1) {
    return "+";
  } else if (operator === 2) {
    return "-";
  } else if (operator === 3) {
    return "*";
  }
}





window.onload = () => {
  const operand1 = document.getElementById('num1');
  const operand2 = document.getElementById('num2');
  const operand3 = document.getElementById('num3');
  const operand4 = document.getElementById('num4');
  const checkButton = document.getElementById('check');

  
function initializeQuestion() {
  const num1 = random(9);
  const num2 = random(9);
  const num3 = random(9);
  const num4 = random(9);
  const operator1 = random(3);
  const operator2 = random(3);
  const operator3 = random(3);
  const operator1_i = assignOperator(operator1);
  const operator2_i = assignOperator(operator2);
  const operator3_i = assignOperator(operator3);
  
  operand1.innerHTML = num1;
  operand2.innerHTML = num2;
  operand3.innerHTML = num3;
  operand4.innerHTML = num4;
  
  return `${num1} ${operator1_i} ${num2} ${operator2_i} ${num3} ${operator3_i} ${num4}`;
}
function start(){
  document.getElementById('operator1').innerHTML = "?";
  document.getElementById('operator2').innerHTML = "?";
  document.getElementById('operator3').innerHTML = "?";
 const result = initializeQuestion();
  document.getElementById('result').innerHTML = eval(result);
   
}

  const operator1Element = document.getElementById('operator1');
  const operator2Element = document.getElementById('operator2');
  const operator3Element = document.getElementById('operator3');
  
  function checkAnswer() {
  const operator1Element = document.getElementById('operator1');
  const operator2Element = document.getElementById('operator2');
  const operator3Element = document.getElementById('operator3');
  const result = document.getElementById('result').innerHTML ;
  if (operator1Element.innerHTML === "?") {
      alert("First input the operators");
      return;
    } else if (operator2Element.innerHTML === "?") {
      alert("First input the operators");
      return;
    } else if (operator3Element.innerHTML === "?") {
   alert("First input the operators");
      return;
    }
  const expression = `${operand1.innerHTML} ${operator1Element.innerHTML} ${operand2.innerHTML} ${operator2Element.innerHTML} ${operand3.innerHTML} ${operator3Element.innerHTML} ${operand4.innerHTML}`;
  
  const calculatedResult = eval(expression);
  
  if (calculatedResult == result) {
    alert("Correct!");
    start();
  } else {
    alert("Incorrect.");
    
  }
}
  function addingOperator(operator) {
    if (operator1Element.innerHTML === "?") {
      operator1Element.innerHTML = operator;
    } else if (operator2Element.innerHTML === "?") {
      operator2Element.innerHTML = operator;
    } else if (operator3Element.innerHTML === "?") {
      operator3Element.innerHTML = operator;
    } else{
      operator1Element.innerHTML = "?";
      operator2Element.innerHTML = "?";
      operator3Element.innerHTML = "?";
    }
  }

  function deleteOperator(operatorElement) {
    operatorElement.innerHTML = "?";
  }
 const plus = document.getElementById('add');
 const subtract = document.getElementById('subtract');
 const divide = document.getElementById('divide');
 const Startgame = document.getElementById('startGame');
 const hint= document.getElementById('hint');
 const next = document.getElementById('nextq');
  plus.addEventListener('click', function() {
    addingOperator("+");
  });

  subtract.addEventListener('click', function() {
    addingOperator("-");
  });

  divide.addEventListener('click', function() {
    addingOperator("*");
  });

  operator1Element.addEventListener('click', function() {
    deleteOperator(operator1Element);
  });

  operator2Element.addEventListener('click', function() {
    deleteOperator(operator2Element);
  });

  operator3Element.addEventListener('click', function() {
    deleteOperator(operator3Element);
  });

  checkButton.addEventListener('click', function() {
    checkAnswer();
  });
  Startgame.addEventListener('click',
  function(){
   const intro = document.getElementById('introdiv'); 
   intro.style.height = "0";
   start();
  });
  let click = 1;
  hint.addEventListener('click', function(){
   const next = document.getElementById('nextq') ;
   if(click == 1){
   next.style.display = "block";
     click = 2;
   }
   else{
     next.style.display= "none";
     click = 1;
   }
  });
  next.addEventListener('click',function(){
    start();
    next.style.display="none";
    click = 1;
  })
  
};
