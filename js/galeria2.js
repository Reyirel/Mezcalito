
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".popup-imag span").forEach((span) => {
    span.onclick = () => {
      document.querySelector(".popup-imag").style.display = "none";
    };
  });
  document.querySelectorAll(".imagens img").forEach((image) => {
    const zoomButton =
      image.nextElementSibling.querySelector(".zoom-button");
    zoomButton.onclick = () => {
      const imageUrl = image.getAttribute("src");
      document.querySelector(".popup-imag").style.display = "block";
      document.querySelector(".popup-imag img").src = imageUrl;
    };
  });
});

// Boton
var contenedor = document.getElementById("cerrar-contenedor");

var img1 = document.getElementById("myImage1");
var img2 = document.getElementById("myImage2");
var img3 = document.getElementById("myImage3");
var img4 = document.getElementById("myImage4");
var img5 = document.getElementById("myImage5");
var img6 = document.getElementById("myImage6");
var img7 = document.getElementById("myImage7");
var img8 = document.getElementById("myImage8");

contenedor.addEventListener("click", function () {
  var iconoActual = contenedor.querySelector('ion-icon');
  if (iconoActual.getAttribute("name") === "sunny-outline") {
    contenedor.innerHTML = '<ion-icon name="moon-outline"></ion-icon>';
    img1.src = "/images/Galeria (1).jpg";
    img2.src = "/images/Galeria (2).jpg";
    img3.src = "/images/Galeria (3).jpg";
    img4.src = "/images/Galeria (4).jpg";
    img5.src = "/images/Galeria (5).jpg";
    img6.src = "/images/Galeria (6).jpg";
    img7.src = "/images/Galeria (7).jpg";
    img8.src = "/images/Galeria (8).jpg";
  } else {
    contenedor.innerHTML = '<ion-icon name="sunny-outline"></ion-icon>';
    img1.src = "/images/div1.jpg";
    img2.src = "/images/div2.jpg";
    img3.src = "/images/div3.jpg";
    img4.src = "images/Galeria (4).jpg";
    img5.src = "images/Galeria (5).jpg";
    img6.src = "images/Galeria (6).jpg";
    img7.src = "images/Galeria (7).jpg";
    img8.src = "images/Galeria (8).jpg";
  }
});
