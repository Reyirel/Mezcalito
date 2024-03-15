var prevScrollpos = window.pageYOffset;
var nav = document.querySelector(".navegacion");
var windowHeight = window.innerHeight;

window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    nav.style.transform = "translateY(0)";
    nav.classList.remove("ocultar-nav");
  } else {
    if (currentScrollPos > windowHeight * 0.92) {
      nav.style.transform = "translateY(-100%)";
      nav.classList.add("ocultar-nav");
    }
  }
  prevScrollpos = currentScrollPos;
};

// apartado de reservacion

var reservaButton = document.querySelector("#reservau");
var reservaDiv = document.querySelector(".reserva");
var main = document.querySelector(".main");

reservaButton.addEventListener("click", function () {
  if (reservaDiv.style.display === "none" || reservaDiv.style.display === "") {
    reservaDiv.style.display = "flex";
    main.style.filter = "blur(5px)";
  } else {
    reservaDiv.style.display = "none";
    main.style.filter = "blur(0px)";
  }
});

function reserButon() {
  if (reservaDiv.style.display === "none" || reservaDiv.style.display === "") {
    reservaDiv.style.display = "flex";
    main.style.filter = "blur(5px)";
  } else {
    reservaDiv.style.display = "none";
    main.style.filter = "blur(0px)";
  }
}

// Check del apartado reservacion
const checkbox = document.getElementById("ocupar");
const mesa2Select = document.getElementById("mesa2");

checkbox.addEventListener("change", function () {
  if (this.checked) {
    mesa2Select.disabled = false;
  } else {
    mesa2Select.disabled = true;
  }
});

// Cambio de modos
const icono = document.querySelector("ion-icon");

document.querySelector("#cerrar-contenedor").addEventListener("click", () => {
  const nombreActual = icono.getAttribute("name");
  if (nombreActual === "sunny-outline") {
    icono.setAttribute("name", "moon-outline");
  } else {
    icono.setAttribute("name", "sunny-outline");
  }
});

// Cambio de modos

const cambio = document.querySelector("#galeria .cambio");

cambio.addEventListener("click", function () {
  const galeria = document.querySelector("#galeria");
  const imagenes = galeria.querySelectorAll(".imagens");

  const imagenesNuevas = [
    { nueva: "/images/div1.jpg", original: "images/Galeria (1).jpg" },
    { nueva: "/images/div2.jpg", original: "/images/Galeria (2).jpg" },
    { nueva: "/images/div1.jpg", original: "/images/Galeria (3).jpg" },
    { nueva: "nueva-imagen-4.jpg", original: "/images/Galeria (4).jpg" },
    { nueva: "nueva-imagen-5.jpg", original: "/images/Galeria (5).jpg" },
    { nueva: "nueva-imagen-6.jpg", original: "/images/Galeria (6).jpg" },
    { nueva: "nueva-imagen-7.jpg", original: "/images/Galeria (7).jpg" },
    { nueva: "nueva-imagen-8.jpg", original: "/images/Galeria (8).jpg" },
  ];

  let indiceImagen = 0;

  if (imagenes[0].querySelector("img").src === imagenesNuevas[0].nueva) {
    for (let i = 0; i < imagenes.length; i++) {
      imagenes[i].querySelector("img").src = imagenesNuevas[i].original;
    }
  } else {
    for (let i = 0; i < imagenes.length; i++) {
      imagenes[i].querySelector("img").src = imagenesNuevas[indiceImagen].nueva;
      indiceImagen++;
    }
  }
});
