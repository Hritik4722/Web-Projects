function Func() {
  return fetch("./data.json")
  .then((res) => {
    return res.json();
  })
  .then((data) => {
    return data;
  });
}


const selectElement = document.getElementById("nameSelect");
const MotherElement = document.getElementById("MnameSelect");
const nameInput = document.getElementById("inputbox");
const nameInput2 = document.getElementById("inputbox2");
const next_btn = document.getElementById('nextbtn');
Func().then((data) => {

  data.forEach((item) => {
    const option = document.createElement("option");
    option.value = item.Name;
    option.text = item.Name;
    selectElement.appendChild(option);
  });
  data.forEach((item) => {
    const option = document.createElement("option");
    option.value = item.MotherName;
    option.text = item.MotherName;
    MotherElement.appendChild(option);
  });
  let catch_index;
  
  next_btn.addEventListener('click', ()=> {
    let index = 0;
    const nameToCheck = nameInput.value.toLowerCase();
    let nameavailable = false;


    data.forEach((item) => {
      if (nameToCheck === item.Name.toLowerCase()) {
        catch_index = index;
        nameavailable = true;
      }
      index++;
    });

    if (nameavailable) {
      if (inputbox2.value === data[catch_index].MotherName) {
        document.getElementById('copy_btn').style.display = "block";
        document.getElementById('prn').innerText = data[catch_index].PRN;


      } else {
        document.getElementById('copy_btn').style.display = "none";
        document.getElementById('prn').innerText = "Mother Name Mismatched";

      }
    } else {
      document.getElementById('copy_btn').style.display = "none";
      document.getElementById('prn').innerText = "Student Not Found";

    }
  });
  const copyButton = document.getElementById("copy_btn");

  copyButton.addEventListener("click",
    () => {
      const prnValue = data[catch_index].PRN;
      const tempInput = document.createElement("input");
      tempInput.value = prnValue;
      document.body.appendChild(tempInput);
      tempInput.select();
      document.execCommand("copy");
      document.body.removeChild(tempInput);
    });

});