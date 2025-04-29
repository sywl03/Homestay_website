<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>
<body>

<div class="w3-container ">
  
</div>

<div class="w3-content w3-section" style="max-width:500px">
	<button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
	<button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
	<img class="mySlides w3-animate-left" src="images/a1.jpg" style="width:100%">
	<img class="mySlides w3-animate-left" src="images/a2.jpg" style="width:100%">
	<img class="mySlides w3-animate-left" src="images/a3.jpg" style="width:100%">
	<img class="mySlides w3-animate-left" src="images/a4.jpg" style="width:100%">
  
</div>
	
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 9000);    
}
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>