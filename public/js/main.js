function leesmeer() {
    document.getElementById("js--modal").style.display = "block";
  }
  
  function close() {
    document.getElementById("js--modal").style.display = "none";
  }
  
  window.onclick = function(event) {
    if (event.target == document.getElementById("js--modal")) {
        document.getElementById("js--modal").style.display = "none";
    }
  }