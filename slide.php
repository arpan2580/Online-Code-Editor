<div class="" style="max-width:800px; margin:auto">
  <img class="mySlides" src="GifStudio/C.gif" style="width:100%">
  <img class="mySlides" src="GifStudio/C++.gif" style="width:100%">
  <img class="mySlides" src="GifStudio/Java.gif" style="width:100%">
  <img class="mySlides" src="GifStudio/Python.gif" style="width:100%">
  <img class="mySlides" src="GifStudio/Node.gif" style="width:100%">
  <img class="mySlides" src="GifStudio/Js.gif" style="width:100%">
  <img class="mySlides" src="GifStudio/Php.gif" style="width:100%">
</div>
<br>
<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
</div>


<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" actv", "");
    }
    x[myIndex-1].style.display = "block";
    dots[myIndex-1].className += " actv";
    setTimeout(carousel, 12000); // Change image every 12 seconds
}
</script>