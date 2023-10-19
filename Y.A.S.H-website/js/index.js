window.onload = () => {
let navopen = false;
const navbtn = document.querySelector('.opennav');
navbtn.addEventListener('click', ()=>{
 const navdiv = document.querySelector('.nav-option') ;
 if(navopen == false){
 navdiv.style.height = "25vh";
 navbtn.style.transform = "rotate(180deg)";
 navopen = true;
 }
 else{
  navdiv.style.height = "0";
  navbtn.style.transform = "rotate(0deg)";
  navopen = false;
 }
});

const next1 = document.querySelector('.next1');
next1.addEventListener('click', ()=>{
  const center_div= document.querySelector('.center-div') ;
  const next_page = document.querySelector('.next-page') ;
  center_div.style.top= "100vh";
  next_page.style.height = "86vh";
});
const seemore = document.querySelector('#see-more');
seemore.addEventListener('click', ()=>{
  const next_page = document.querySelector('.next-page') ;
  const next_page2 = document.querySelector('.next-page2') ;
  next_page.style.top = "100vh";
  next_page2.style.height = "86vh";
});
}