(function () {
let carouselimagearticle = document.querySelectorAll('.carouselimagearticle')
  for (let i = 1; i < carouselimagearticle.length; i = i + 3){
    carouselimagearticle[i].classList.add('active');
  }

}) ()

