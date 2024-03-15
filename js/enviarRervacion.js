// Para que seleccione a fuerzas una mesa
const CELPHONE = document.getElementById("inputTelefono");
const opmesa1 = document.getElementById("OpcionesMesa1");
const submitBtn = document.getElementById("botonReservar");

submitBtn.addEventListener("click", function (event) {
  const phoneNumber = CELPHONE.value.replace(/[\s-]/g, "");
const numericRegex = /^\d+$/;
  if (!numericRegex.test(phoneNumber) || phoneNumber.length !== 10) {
    alert("El número de teléfono debe tener 10 dígitos.");
    event.preventDefault(); // Detiene el envío del formulario.
  } else if (opmesa1.value === "0" && !opmesa1.disabled) {
    alert("Por favor, seleccione su Área.");
    event.preventDefault(); // Detiene el envío del formulario.
  }
});
// Hora disponible
var inputTime = document.getElementById("inputTime");
inputTime.addEventListener("change", function() {
  var hora = new Date("2000-01-01T" + inputTime.value + ":00");  
  if (hora.getHours() < 9 || hora.getHours() > 22) {  
    alert("Seleccione otro horario entre las 9am y las 10pm.");
    inputTime.value = "";  
  }
});
// Mostar terminos y condiciones
document
  .querySelector(".verTerminos")
  .addEventListener("click", function (event) {
    event.preventDefault();
    alert(
      "Terminos y condiciones\n 1-Al proporcionarnos su número de teléfono, recibirá mensajes a través de WhatsApp.\n2-Al proporcionarnos sus redes sociales, recibirá notificaciones sobre las novedades y promociones del bar.\nGracias"
    );
  });


const form = document.getElementById("formularioReservacion");
// Agrega un escucha de eventos para el evento "submit" del formulario
form.addEventListener("submit", function (event) {
  // Evita que el formulario se envíe normalmente
  event.preventDefault();
  // Crea una nueva solicitud XMLHttpRequest
  const xhr = new XMLHttpRequest();
  // Configura la solicitud con la URL y el método de envío del formulario
  xhr.open("POST", form.action);
  // Agrega un escucha de eventos para la carga de la solicitud
  xhr.addEventListener("load", function () {
    // Comprueba la respuesta del servidor
    if (xhr.status === 200) {
      // La respuesta fue exitosa, muestra un alerta en el formulario
      document
        .querySelectorAll(
          ".spanPaparpadeo1, .spanPaparpadeo2, .spanPaparpadeo3, .spanPaparpadeo4, .spanPaparpadeo5"
        )
        .forEach(function (element) {
          element.style["z-index"] = "0";
          element.style.animation = "none";
        });
      document
        .querySelectorAll(".MensajeDeEnvioReveracion1")
        .forEach(function (element) {
          element.style.display = "block";
        });
    } else {
      alert("Ha ocurrido un error al enviar los datos. Intenta mas tarde");
    }
  });
  // Envía la solicitud con los datos del formulario
  xhr.send(new FormData(form));
});
