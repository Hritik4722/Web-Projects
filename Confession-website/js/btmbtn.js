let home = document.getElementById('home');
let pencil = document.getElementById('pencil');
let profile = document.getElementById('profile');

home.addEventListener("click",
    () => {
      
      window.location.href='home.php';
    });
    
pencil.addEventListener("click",
    () => {
      window.location.href='confess.php';
    });
profile.addEventListener("click",
    () => {
      window.location.href='profile.php';
    });    