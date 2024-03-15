///////////////////////////////
//Efecto de las lineas de fondo
///////////////////////////////

// Selecciona el elemento HTML con la clase 'reserva'
const reservaSection = document.querySelector(".reserva");

// Crea un nuevo elemento HTML div y añade la clase 'bubbles' a él
const linesBContainer = document.createElement("div");
linesBContainer.classList.add("lineasB");

// Crea un array de números que se utilizarán para crear elementos 'span'
const numbers = [
  130, 15, 56, 27, 58, 103, 95, 126, 2, 61, 14, 121, 3, 30, 40, 114, 67, 83, 48,
  49, 66, 10, 118, 77, 98, 43, 35, 25, 9, 69, 46, 125, 100, 34, 105, 53, 13, 20,
  108, 111, 101, 4, 76, 38, 26, 36, 39, 112, 57, 75, 52, 31, 16, 12, 116, 50,
  17, 72, 33, 21, 123, 68, 96, 22, 106, 71, 102, 37, 129, 63, 94, 23, 11, 113,
  32, 18, 120, 99, 60, 82, 59, 117, 73, 62, 5, 124, 92, 42, 24, 1, 41, 55, 45,
  6, 110, 79, 54, 28, 51, 107, 74, 80, 119, 93, 7, 8, 87, 115, 44, 97, 64, 19,
  109, 127, 81, 29, 104, 70, 122, 128,
];

// Itera sobre los elementos del array 'numbers'
for (let i = 0; i < numbers.length; i++) {
  // Crea un nuevo elemento HTML 'span'
  const span = document.createElement("span");
  // Establece la propiedad CSS '--i' en el valor correspondiente del array 'numbers'
  span.style.setProperty("--i", numbers[i]);
  // Añade el elemento 'span' al contenedor 'linesBContainer'
  linesBContainer.appendChild(span);
}

// Añade el contenedor al elemento 'reservaSection'
reservaSection.appendChild(linesBContainer);

/////////////////////
//Habilitar boton de reservar al aceptar terminos y condicones
////////////////////
document.addEventListener("DOMContentLoaded", function () {
  const checkbox = document.querySelector("#star-checkbox2");
  const button = document.querySelector("#botonReservar");

  if (checkbox && button) {
    checkbox.addEventListener("click", function () {
      if (checkbox.checked) {
        button.disabled = false;
      } else {
        button.disabled = true;
      }
    });
  }
});