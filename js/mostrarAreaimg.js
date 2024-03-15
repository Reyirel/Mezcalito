const verA1 = document.querySelector("#verA1");
verA1.addEventListener("click", function () {
  document
    .querySelectorAll(".Imagenesmesas, .aA2, .aA3, .aA4, .aA5, .aA6, .aA7")
    .forEach(function (element) {
      element.style.display = "none";
    });

  document.querySelectorAll(".areaAbrir, .aA1").forEach(function (element) {
    element.style.display = "block";
  });
});

const verA2 = document.querySelector("#verA2");
verA2.addEventListener("click", function () {
  document
    .querySelectorAll(".Imagenesmesas, .aA1, .aA3, .aA4, .aA5, .aA6, .aA7")
    .forEach(function (element) {
      element.style.display = "none";
    });

  document.querySelectorAll(".areaAbrir, .aA2").forEach(function (element) {
    element.style.display = "block";
  });
});

const verA3 = document.querySelector("#verA3");
verA3.addEventListener("click", function () {
  document
    .querySelectorAll(".Imagenesmesas, .aA1, .aA2, .aA4, .aA5, .aA6, .aA7")
    .forEach(function (element) {
      element.style.display = "none";
    });

  document.querySelectorAll(".areaAbrir, .aA3").forEach(function (element) {
    element.style.display = "block";
  });
});

const verA4 = document.querySelector("#verA4");
verA4.addEventListener("click", function () {
  document
    .querySelectorAll(".Imagenesmesas, .aA1, .aA2, .aA3, .aA5, .aA6, .aA7")
    .forEach(function (element) {
      element.style.display = "none";
    });

  document.querySelectorAll(".areaAbrir, .aA4").forEach(function (element) {
    element.style.display = "block";
  });
});

const verA5 = document.querySelector("#verA5");
verA5.addEventListener("click", function () {
  document
    .querySelectorAll(".Imagenesmesas, .aA1, .aA2, .aA3, .aA4, .aA6, .aA7")
    .forEach(function (element) {
      element.style.display = "none";
    });

  document.querySelectorAll(".areaAbrir, .aA5").forEach(function (element) {
    element.style.display = "block";
  });
});

const verA6 = document.querySelector("#verA6");
verA6.addEventListener("click", function () {
  document
    .querySelectorAll(".Imagenesmesas, .aA1, .aA2, .aA3, .aA4, .aA5, .aA7")
    .forEach(function (element) {
      element.style.display = "none";
    });

  document.querySelectorAll(".areaAbrir, .aA6").forEach(function (element) {
    element.style.display = "block";
  });
});

const verA7 = document.querySelector("#verA7");
verA7.addEventListener("click", function () {
  document
    .querySelectorAll(".Imagenesmesas, .aA1, .aA2, .aA3, .aA4, .aA5, .aA6")
    .forEach(function (element) {
      element.style.display = "none";
    });

  document.querySelectorAll(".areaAbrir, .aA7").forEach(function (element) {
    element.style.display = "block";
  });
});

const cerrar = document.querySelector("#cerrar");
cerrar.addEventListener("click", function () {
  document.querySelectorAll(".Imagenesmesas").forEach(function (element) {
    element.style.display = "block";
  });

  document
    .querySelectorAll(".areaAbrir, .aA1, .aA2, .aA3, .aA4, .aA5, .aA6, .aA7")
    .forEach(function (element) {
      element.style.display = "none";
    });
});
