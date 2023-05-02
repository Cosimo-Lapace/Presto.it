"use strict"
import 'bootstrap';
import './nav.js';
import AOS from 'aos';
import 'aos/dist/aos.css';


(function () {
    AOS.init({

        duration: 1500,
    }
    );

/* endnavbar */
/* spancolor */
const spanElements = document.querySelectorAll('.spancardimg');
const tabletype = document.querySelectorAll('.tabletype');
const spantype = document.querySelectorAll('.spantype')
function colorelementype(elements) {
    elements.forEach((element) => {
      const spanText = element.textContent;
      if (spanText === 'cerco') {
        element.classList.remove('red');
        element.classList.add('green');
      }
    });
  }
colorelementype(spanElements);
colorelementype(tabletype);
colorelementype(spantype);

/* end span color*/
/* icona e span notifiche revisore */
const mybell = document.getElementById('mybell');
const spanbell = document.getElementById('spanbell');
if(mybell){
if(spanbell.textContent == 0){
    spanbell.remove();
    mybell.classList.remove('bi','bi-bell');
    mybell.classList.add('bi','bi-bell-slash');
    mybell.classList.add('disabled')
}}
/* fine icona span notifica revisore */


gsap.to(".titolo-revisore" , { top:30, opacity:1 ,  duration: 0.7 });
// titolo animazione















}) ()
