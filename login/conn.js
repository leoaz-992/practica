$(document).ready(function() {
  $("#login-form").submit(function(event) {
  event.preventDefault();
  let username = $("#username").val();
  let password = $("#password").val();
  
  $.ajax({
  type: "POST",
  url: "login.php",
  data: {
  username: username,
  password: password
  },
  success: function(response) {
  if (response === "success") {
  $("#message").html("Inicio de sesión exitoso.");
  } else {
  $("#message").html("Usuario o contraseña incorrectos.");
  }
  }
  });
  });
  });
//id nombre usuario password