let email = document.getElementById("email");
let nombre = document.getElementById("nombre");
let mensaje = document.getElementById("mensaje");

document.querySelector('form').addEventListener('submit', function(e) {
  let valid = true;
  if(email.value == ""){
    email.classList.add('is-invalid')
    valid = false;
  }else{
    email.classList.remove('is-invalid');
    email.classList.add('is-valid');}
  if(nombre.value == ""){
    nombre.classList.add('is-invalid')
    valid = false;
  }else{
    nombre.classList.remove('is-invalid');
    nombre.classList.add('is-valid');}
  if(mensaje.value == ""){
    mensaje.classList.add('is-invalid')
    valid = false;
  }else{
    mensaje.classList.remove('is-invalid');
    mensaje.classList.add('is-valid');
  }
  
  if(!valid){
    e.preventDefault();
    alert('Por favor, completa todos los campos antes de enviar.');
  }
});

