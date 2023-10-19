const input = document.getElementById("input");
const qrimage = document.getElementById("qrimage");
const btn = document.getElementById("btn");

function Qrgenerate(){
  
  if(input.value.length > 0){
  qrimage.src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + input.value;
  qrimage.style.height= "150px"
  }else{
    input.classList.add("shake");
    function remove(){
      input.classList.remove("shake");
    }
    setTimeout(remove
    , 500);
  }
  
}