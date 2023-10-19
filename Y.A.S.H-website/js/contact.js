function decrypt(encryptedMessage, key) {
  let decrypted = '';
  for (let i = 0; i < encryptedMessage.length; i++) {
    const charCode = encryptedMessage.charCodeAt(i);
    const decryptedCharCode = charCode - key;
    decrypted += String.fromCharCode(decryptedCharCode);
  }
  return decrypted;
}
const decrypted1 = "኶዗ዕዤያዢዦ዗ዖ"
let message = "  ኺ዗ዞዞዡኒ዆ዚዛዥኒዛዥኒዅ዗ዕዤ዗ዦኒዟ዗ዥዥዓዙ዗ኒኞኒዀዡዦዚዛዠዙኒኞኒኻኒዖዛዖዠዦኒዧዠዖ዗ዤዥዦዓዠዖኒዩዚዓዦኒዦዡኒዓዖዖኒዚ዗ዤ዗ኒአ";

const decryptsuccess = "ኺዤዛዦዛዝ";
let navopen = false;
const navbtn = document.querySelector('.opennav');
navbtn.addEventListener('click', ()=> {
  const navdiv = document.querySelector('.nav-option');
  if (navopen == false) {
    navdiv.style.height = "25vh";
    navbtn.style.transform = "rotate(180deg)";
    navopen = true;
  } else {
    navdiv.style.height = "0";
    navbtn.style.transform = "rotate(0deg)";
    navopen = false;
  }
});
const numberInput = document.getElementById('numberInput');
let Rchance = 0;

numberInput.addEventListener('keydown', (event) => {
  if (event.key === 'Enter') {
    let runn = false;
    const value = parseInt(numberInput.value);
    const datadiv = document.querySelector('.data');
    const passdiv = document.querySelector('.enterpass');
    const sdata4 = document.querySelector('.showdata4');
    const sdata3 = document.querySelector('.showdata3');
    const sdata2 = document.querySelector('.showdata2');
    const sdata1 = document.querySelector('.showdata1');
    const incorrectM = document.querySelector('#incorrect');
    const secretmessage = document.querySelector('.secretmessage');
    var variableValue = localStorage.getItem('Rchance1');
    if(variableValue !== null){
      
     if(variableValue >= 3){
     incorrect.innerHTML =" You are Blocked!"
     runn = false;
     }
     else{
     runn = true;
     }
    }else{
      runn=true;
    }
    if(runn){
    if (value === "") {} else {
      const check = 2089767.987081745 * value;
      const decryptedmessage123 = decrypt(decrypted1,value);
      
      if(decryptedmessage123 === "Decrypted"){
      passdiv.style.display = "none";
      datadiv.style.display = "block";
      sdata4.innerHTML = `${parseInt(value*1755871.8951715375)}`;
      sdata3.innerHTML = `${parseInt(value*2089767.987081745)}`;
      sdata2.innerHTML = `${parseInt(value*1923378.352181279)}`;
      sdata1.innerHTML = `${parseInt(value*1714761.8627700128)}`;
      const decryptedmessage = decrypt(message,value);
      secretmessage.innerHTML = decryptedmessage;  
      }
      
      else{
        Rchance++;
        localStorage.setItem('Rchance1', Rchance);
      incorrect.innerHTML = `Incorrect Password(${Rchance})`;
      
       }
   
    }
  }
    event.preventDefault();
  }
});


