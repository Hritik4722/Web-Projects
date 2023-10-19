const openNav = document.getElementById('opennav');
const closenav = document.getElementById('closenav');
const links = document.querySelector('.links');
openNav.addEventListener('click', ()=> {
  links.style.height = "200px";
  closenav.style.display = "block";
  openNav.style.display = "none";

})
closenav.addEventListener('click', ()=> {
  links.style.height = "0";
  closenav.style.display = "none";
  openNav.style.display = "block";
})