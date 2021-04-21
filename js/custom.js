$(document).ready(function () {
var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      spaceBetween: 30,
      slidesPerGroup: 1,
      loop:true,

      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      
    });
    var swiper = new Swiper('.swiper-container1', {
          slidesPerView: 1,
          slidesPerGroup: 1,
          loop:true,
          autoplay: {
            delay: 4000,
            disableOnInteraction: false,
          },
        });
      var swiper = new Swiper('.swiper-container2', {
          slidesPerView: 1,
          slidesPerGroup: 1,
          loop:true,

          autoplay: {
            delay: 4000,
            disableOnInteraction: false,
          },
        });
})

var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 4000); // Change image every 2 seconds
}