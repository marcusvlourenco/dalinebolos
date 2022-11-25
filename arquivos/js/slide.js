
let primeiroSlideBolo = 1;
showSlidesBolo(primeiroSlideBolo);

function acaoSlideBolo(nBolo) {
  showSlidesBolo(primeiroSlideBolo += nBolo);
}

function atualSlideBolo(nBolo) {
  showSlidesBolo(primeiroSlideBolo = nBolo);
}

function showSlidesBolo(nBolo) {
  let iBolo;
  let slidesShowBolo = document.getElementsByClassName("meuSlideBolo");
  if (nBolo > slidesShowBolo.length) {primeiroSlideBolo = 1}    
  if (nBolo < 1) {primeiroSlideBolo = slidesShowBolo.length}
  for (iBolo = 0; iBolo < slidesShowBolo.length; iBolo++) {
    slidesShowBolo[iBolo].style.display = "none";  
  }
  slidesShowBolo[primeiroSlideBolo-1].style.display = "block";  
}




let primeiroSlideDoce = 1;
showSlidesDoce(primeiroSlideDoce);

function acaoSlideDoce(nDoce) {
  showSlidesDoce(primeiroSlideDoce += nDoce);
}

function atualSlideDoce(nDoce) {
  showSlidesDoce(primeiroSlideDoce = nDoce);
}

function showSlidesDoce(nDoce) {
  let iDoce;
  let slidesShowDoce = document.getElementsByClassName("meuSlideDoce");
  if (nDoce > slidesShowDoce.length) {primeiroSlideDoce = 1}    
  if (nDoce < 1) {primeiroSlideDoce = slidesShowDoce.length}
  for (iDoce = 0; iDoce < slidesShowDoce.length; iDoce++) {
    slidesShowDoce[iDoce].style.display = "none";  
  }
  slidesShowDoce[primeiroSlideDoce-1].style.display = "block";  
}




let primeiroSlidePersonalizado = 1;
showSlidesPersonalizado(primeiroSlidePersonalizado);

function acaoSlidePersonalizado(nPersonalizado) {
  showSlidesPersonalizado(primeiroSlidePersonalizado += nPersonalizado);
}

function atualSlideDoce(nPersonalizado) {
  showSlidesPersonalizado(primeiroSlidePersonalizado = nPersonalizado);
}

function showSlidesPersonalizado(nPersonalizado) {
  let iPersonalizado;
  let slidesShowPersonalizado = document.getElementsByClassName("meuSlidePersonalizado");
  if (nPersonalizado > slidesShowPersonalizado.length) {primeiroSlidePersonalizado = 1}    
  if (nPersonalizado < 1) {primeiroSlidePersonalizado = slidesShowPersonalizado.length}
  for (iPersonalizado = 0; iPersonalizado < slidesShowPersonalizado.length; iPersonalizado++) {
    slidesShowPersonalizado[iPersonalizado].style.display = "none";  
  }
  slidesShowPersonalizado[primeiroSlidePersonalizado-1].style.display = "block";  
}

