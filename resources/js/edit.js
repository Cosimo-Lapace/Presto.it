

(function () {
    const icont = document.querySelectorAll('.iconcheck');


    const containerElement = document.getElementById("divinput");
    function createelement(image,iconinput,spaiconad,image_){

        const iElement = document.createElement("i");
        iElement.setAttribute("class", `bi bi-plus-square iconads ${iconinput} pointer`);

        // creazione dell'elemento <label>
        const labelElement = document.createElement("label");
        labelElement.setAttribute("for", image);
        labelElement.setAttribute("class", "label");

        // creazione dell'elemento <input>
        const inputElement = document.createElement("input");
        inputElement.setAttribute("type", "file");
        inputElement.setAttribute("name", image);
        inputElement.setAttribute("id", image);
        inputElement.setAttribute("class", "form-control image");
        inputElement.setAttribute("value", "");
        inputElement.setAttribute("style", "display: none");
        inputElement.setAttribute("data",image_);

        // aggiunta degli elementi al DOM


            containerElement.appendChild(iElement);
            containerElement.appendChild(labelElement);
            containerElement.appendChild(inputElement);


        //-------------------------
        // Creazione dell'elemento span con classe "spaniconads1"
        const spanIconAds1 = document.createElement("span");
        spanIconAds1.classList.add(spaiconad);
        // Aggiunta degli elementi al DOM
        containerElement.appendChild(spanIconAds1);
    }

    if(icont.length === 0){
        createelement("image","iconinput1","spaniconads1","image")
        createelement("image2","iconinput2","spaniconads2","image2")
        createelement("image3","iconinput3","spaniconads3","image3")

    }
    if(icont.length === 1){
        createelement("image2","iconinput2","spaniconads2","image2")
        createelement("image3","iconinput3","spaniconads3","image3")

    }
    if(icont.length === 2){
        createelement("image3","iconinput3","spaniconads3","image3")

    }


const urlimage = document.querySelectorAll('.urlimage')




const icon = document.querySelector('.iconinput1');
console.log(icon)
const fileInput = document.querySelector('#image');
console.log(fileInput)
const spaniconads = document.querySelector('.spaniconads1')
console.log(spaniconads)
/* const spanbutton = document.getElementById('spanbutton0') */
const formdestroy = document.getElementById('formdestroy0')


if(!fileInput.getAttribute("value") && typeof urlimage[0] !== "undefined"){
    fileInput.setAttribute("value",urlimage[0].textContent)
}

//------
const icon2 = document.querySelector('.iconinput2');
console.log(icon2)
const fileInput2 = document.querySelector('#image2');
console.log(fileInput2)
const spaniconads2 = document.querySelector('.spaniconads2')
console.log(spaniconads2)
/* const spanbutton2 = document.getElementById('spanbutton1') */
const formdestroy2 = document.getElementById('formdestroy1')


if(!fileInput2.getAttribute("value") && typeof urlimage[1] !== "undefined"){
    fileInput2.setAttribute("value",urlimage[1].textContent)
}


//--------
const icon3 = document.querySelector('.iconinput3');
console.log(icon3)
const fileInput3 = document.querySelector('#image3');
console.log(fileInput3)
const spaniconads3 = document.querySelector('.spaniconads3');
console.log(spaniconads3)
/* const spanbutton3 = document.getElementById('spanbutton2') */
const formdestroy3 = document.getElementById('formdestroy2')


if(!fileInput3.getAttribute("value") && typeof urlimage[2] !== "undefined"){
    fileInput3.setAttribute("value",urlimage[2].textContent)
}


//------
const previewimg = document.getElementById('previewimg');


if(fileInput.getAttribute("value") === fileInput2.getAttribute("value")){
    fileInput2.setAttribute("value","")
}else if(fileInput2.getAttribute("value") === fileInput3.getAttribute("value")){
    fileInput3.setAttribute("value","")
}

/* controllo se il file input contiene la foto e do il feed dell'icona */
function getcheckicon(input,icon_){
    if(input.getAttribute("value")){
        icon_.style.color = "#26c49f"
        icon_.classList.remove('bi','bi-plus-square')
        icon_.classList.add('bi','bi-check-square')
    }
}
getcheckicon(fileInput,icon)
getcheckicon(fileInput2,icon2)
getcheckicon(fileInput3,icon3)
/* fine */
//-----------------------------------------
/* imposto che ogni icona clicca il file input */
function clickinput(input,icon_){
    icon_.addEventListener('click',()=>{
        input.click();
    })
}
clickinput(fileInput,icon)
clickinput(fileInput2,icon2)
clickinput(fileInput3,icon3)
/* fine */
//------------------------------------------------
/* visualizzo l'immagine già presente nel database */
function viewimg(input,span,container,formdestroy_){
    if(formdestroy_ !== null){
        container.appendChild(formdestroy_);
        formdestroy_.appendChild(span);

    }
    let urlimg = input.getAttribute('value');
    span.innerHTML = `<img class="mt-4 me-5 img-fluid" src="${urlimg}" width="500px" alt"" id="imgprev"> <button type="submit"
    class=" btn btn-danger">Cancella</button>`;
    const imgprev = document.getElementById('imgprev')
    if(!imgprev.getAttribute("src","")){
        span.innerHTML=""
    }
}

viewimg(fileInput,spaniconads,previewimg,formdestroy)
viewimg(fileInput2,spaniconads2,previewimg,formdestroy2)
viewimg(fileInput3,spaniconads3,previewimg,formdestroy3)
/* fine  */
//-----------------------------------------------------
/* visualizzo l'immagine caricata dall'utente e cambio l'icona in verde */
function loadimg(input,span,container,icon){
    input.addEventListener('change', (e) => {

        const file = e.target.files[0];
        const imageUrl = URL.createObjectURL(file);
        let fileName = input.value.split("\\").pop();
        span.innerHTML = `<img class="mt-4 me-5 img-fluid" src="${imageUrl}" width="500px" alt"">${fileName + '  '}<button class="mt-0 btn btn-danger spanicondelete">Cancella</button>
      `;
      container.appendChild(span);
      icon.classList.remove('bi','bi-plus-square')
      icon.classList.add('bi', 'bi-check-square');
      icon.style.color = "#26c49f"
      span.querySelector('.spanicondelete').addEventListener('click', () => {
        input.value = '';
        span.innerHTML = '';
        icon.classList.remove('bi','bi-arrow-up-square')
        icon.classList.add('bi', 'bi-plus-square');
        icon.style.color= "";


    })

    })
}

loadimg(fileInput,spaniconads,previewimg,icon)
loadimg(fileInput2,spaniconads2,previewimg,icon2)
loadimg(fileInput3,spaniconads3,previewimg,icon3)
/* fine */
//----------------------------------------------------



}
())
