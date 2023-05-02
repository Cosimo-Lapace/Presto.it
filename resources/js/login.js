(function () {
const password = document.getElementById('password');
const iconpasswordeye = document.getElementById('iconpasswordeye');
const buttonlogin = document.getElementById('buttonlogin');
let check = true


iconpasswordeye.addEventListener('click',(e)=>{
    if(check){
    password.type = 'text';
    iconpasswordeye.classList.remove('bi','bi-eye-slash-fill');
    iconpasswordeye.classList.add('bi','bi-eye-fill');
    check = false;
}else{
    password.type = 'password'
    iconpasswordeye.classList.remove('bi','bi-eye-fill');
    iconpasswordeye.classList.add('bi','bi-eye-slash-fill');;
    check= true;
}
buttonlogin.addEventListener('click',(e)=>{
    if(password.type =='text'){
       password.type = 'password';
       check = true;
    }
})
})
}) ()
