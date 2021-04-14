// let loaction = 'http://localhost:8000/vakken';
function refresh() {    
    setTimeout(function () {
        location.reload()
    }, 2000);
}

function createproduct() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
  }


  function gotowork() {
    var popup = document.getElementById("gawerken");
    popup.classList.toggle("show");
  }
 
  function toggleModal() { 
    var popup = document.getElementById("modalVak"); 
    popup.classList.toggle("show"); 
}
// refresh()

// function sleep(ms) {
//     return new Promise(resolve => setTimeout(resolve, ms));
//   }

// while (true){
//     await sleep(10000);
//     location.reload()
// }
  