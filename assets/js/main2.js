let primeiroSlide = 1;
 showSlides(primeiroSlide);
 
 function acaoSlide(n) {
   showSlides(primeiroSlide += n);
 }
 
 function atualSlide(n) {
   showSlides(primeiroSlide = n);
 }
 
 function showSlides(n) {
   let i;
   let slidesShow = document.getElementsByClassName("meuSlide");
   if (n > slidesShow.length) {primeiroSlide = 1}    
   if (n < 1) {primeiroSlide = slidesShow.length}
   for (i = 0; i < slidesShow.length; i++) {
     slidesShow[i].style.display = "none";  
   }
   slidesShow[primeiroSlide-1].style.display = "block";  
 }