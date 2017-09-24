<!DOCTYPE html>
<html>
<title>Schlosslauf</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" type="text/css" href="/assets/css/default.css">
<style>

</style>
<body>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft">Menü schliessen</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>Schlosslauf</b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="?siteId=1" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
    <a href="?siteId=2" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Vorwort</a> 
    <a href="?siteId=3" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Eigenschaften</a> 
    <a href="?siteId=4" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Aufgaben</a> 
    <a href="?siteId=5" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Anmeldung Schlosslauf</a> 
    <a href="?siteId=6" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Logout</a>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>Schlosslauf</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" title="Schliesse Seitenmenü" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main">
  <!-- Content -->
  <div class="w3-container">
    <h1>Title</h1>
	<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
  </div>
<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>
