<p style="text-align:right"><b style="color:darkslategray">---You are logged in as {{ strtoupper(Auth::user()->role) }}---</p>
    <link rel="stylesheet" href="{{asset('my/u.css')}}">
    <!-- Slideshow container -->
<div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
      
      <img src="img/img1.jpg" style="width:100%">
      <div class="text"></div>
    </div>
  
    <div class="mySlides fade">
      
      <img src="img/img2.jpg" style="width:100%">
      <div class="text"></div>
    </div>
  
    <div class="mySlides fade">
     
      <img src="img/p1.jpg" style="width:100%">
      <div class="text"></div>
    </div>
  
    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  
  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
    <span class="dot" onclick="currentSlide(3)"></span> 
  </div>
  <script>
    var slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
    }
    </script>
    
    </body>
    <div class ="container">    

        <br><br>
        <h2><img src="img\icons8_Eye_30px_3.png"> Our Vision</h2>
        <ul><p style="font-weight: bold">To be the most trusted, recognized and respected solution provider in the automobile industry in Sri Lanka</p></ul>
        <br><br>
        <h2><img src="img\icons8_Action_30px.png"> Our Mission</h2>
        <ul><p style="font-weight: bold">We strive to provide the best quality automobile product and services through conveniently located Car Care Service Centre’s, at affordable prices by making our brand a consumers’ first choice for automobile product and service supports. Trust will be gained from consumers through the genuine support given to them by our skilled and dedicated service staff. We are committed to deliver our service values and we are proud of our customized service</p></ul>
        <br><br>
      </div>