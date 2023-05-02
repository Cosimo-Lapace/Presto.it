(function () {
let update = document.getElementById('update');
let name = document.getElementById('name');
let date = document.getElementById('date');
let email = document.getElementById('email');
let phone = document.getElementById('phone');
let address = document.getElementById('address');
const inputimage = document.getElementById('inputimage');
const textinseriscimmagine = document.getElementById('textinseriscimmagine')

const formupdateuser = document.getElementById('formupdateuser');
let check = false;
  function updateprofile(element,request,type){
    let content = element.textContent;
    let newcontent = document.createElement('input');
    newcontent.classList.add('form-control');
    element.replaceWith(newcontent);
    newcontent.setAttribute("value",content)
    newcontent.setAttribute("name",request)
    newcontent.setAttribute("type",type)
  }


inputimage.style.display= "none";
textinseriscimmagine.style.display="none";
update.addEventListener('click',(e)=>{
    e.preventDefault()
    if (check) {
        formupdateuser.submit();
        return;
      }
    update.textContent = "Salva"
    if(update.textContent === "Salva"){
        updateprofile(name,"name","text")
        updateprofile(date,"date","date")
        updateprofile(email,"email","email")
        updateprofile(phone,"phone","number")
        updateprofile(address,"address","text")
        inputimage.style.display="";
        textinseriscimmagine.style.display="";
        check = true;
      }

})







      }) ()
