
(function () {
    /* icone immagini */
const icon = document.querySelector('.iconinput1');
const fileInput = document.querySelector('#image1');
const spaniconads = document.querySelector('.spaniconads1')
//------
const icon2 = document.querySelector('.iconinput2');
const fileInput2 = document.querySelector('#image2');
const spaniconads2 = document.querySelector('.spaniconads2')
//--------
const icon3 = document.querySelector('.iconinput3');
const fileInput3 = document.querySelector('#image3');
const spaniconads3 = document.querySelector('.spaniconads3');
//------
const previewimg = document.getElementById('previewimg');

function loadimg(file_input,icon_,icon_2,span,divimg){
    if(icon_.classList.contains("iconinput2")){
        icon_.style.display = "none"
    }
    if(icon_.classList.contains("iconinput3")){
        icon_.style.display = "none"
    }
    icon_.addEventListener('click', () => {
        file_input.click();
      });
      file_input.addEventListener('change', (e) => {
        if (file_input.value) {
            if(icon_.classList.contains("iconinput3")){
            icon_.classList.remove('bi', 'bi-plus-square');
            icon_.classList.add('bi','bi-check-square')
            icon_.style.color = '#26c49f';
            }else{
            if(icon_.classList.contains('bi-check-square')){
            icon_.classList.remove('bi', 'bi-arrow-up-square');
        }else{
            icon_.classList.remove('bi', 'bi-plus-square');
        }
            icon_.classList.add('bi','bi-check-square')
            icon_.style.color = '#26c49f';
            icon_2.style.display = 'inline';
        }
            const file = e.target.files[0];
            const imageUrl = URL.createObjectURL(file);
            let fileName = file_input.value.split("\\").pop();
            span.innerHTML = `<img class="mt-4 me-5 img-fluid" src="${imageUrl}" width="500px" alt"">${fileName + '  '}<button class="mt-0 btn btn-danger spanicondelete">Cancella</button>
          `;
          divimg.appendChild(span);
          span.querySelector('.spanicondelete').addEventListener('click', () => {
            file_input.value = '';
            span.innerHTML = '';
            if(icon_.classList.contains("iconinput1")){
            icon_.classList.remove('bi', 'bi-check-square');
            icon_.classList.add('bi','bi-arrow-up-square')
        }else{
            icon_.classList.remove('bi', 'bi-check-square');
            icon_.classList.add('bi','bi-plus-square')
        }
            icon_.style.color = '';
            icon_2.style.display = 'none';
          });
        }
      });

}
loadimg(fileInput,icon,icon2,spaniconads,previewimg)
loadimg(fileInput2,icon2,icon3,spaniconads2,previewimg)
loadimg(fileInput3,icon3,null,spaniconads3,previewimg)

//----------------------------------------------


}) ()
