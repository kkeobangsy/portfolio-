var to = null;
function myMove() {
  var elem = document.getElementById("pic2");
  var pos = 0;
  clearInterval(to);
  id = setInterval(frame, 15);
  function frame() {
    if (pos == 600){
      clearInterval(id);
    } else {
      pos++;
      elem.style.left = pos + 'px';
      elem.style.right = pos + 'px';
    }
  }
}
