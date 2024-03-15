//////////////////////////////////////////////////////
//Variables globales botones
//////////////////////////////////////////////////////
const btnmesa1 = document.getElementById("btnmesa1");
const btnmesa2 = document.getElementById("btnmesa2");
const btnmesa3 = document.getElementById("btnmesa3");
const btnmesa4 = document.getElementById("btnmesa4");
const btnmesa5 = document.getElementById("btnmesa5");
const btnmesa6 = document.getElementById("btnmesa6");
const btnmesa7 = document.getElementById("btnmesa7");

const divbotones1 = document.getElementById("q1");
const divbotones2 = document.getElementById("q2");
const divbotones3 = document.getElementById("q3");
const divbotones4 = document.getElementById("q4");
const divbotones5 = document.getElementById("q5");
const divbotones6 = document.getElementById("q6");
const divbotones7 = document.getElementById("q7");

const fondosA1 = document.getElementById("Area01");
const fondosA2 = document.getElementById("Area02");
const fondosA3 = document.getElementById("Area03");
const fondosA4 = document.getElementById("Area04");
const fondosA5 = document.getElementById("Area05");
const fondosA6 = document.getElementById("Area06");
const fondosA7 = document.getElementById("Area07");

const s1 = document.getElementById("Seleccionado1");
const s2 = document.getElementById("Seleccionado2");
const s3 = document.getElementById("Seleccionado3");
const s4 = document.getElementById("Seleccionado4");
const s5 = document.getElementById("Seleccionado5");
const s6 = document.getElementById("Seleccionado6");
const s7 = document.getElementById("Seleccionado7");

const imgA1 = document.getElementById("verA1");
const imgA2 = document.getElementById("verA2");
const imgA3 = document.getElementById("verA3");
const imgA4 = document.getElementById("verA4");
const imgA5 = document.getElementById("verA5");
const imgA6 = document.getElementById("verA6");
const imgA7 = document.getElementById("verA7");

//////////////////////////////////////////////////////
//Habilitar mesas
//////////////////////////////////////////////////////
document.addEventListener("DOMContentLoaded", function () {
  const NOPERSONAS = document.getElementById("inputPersonas");
  const selectMesa1 = document.getElementById("OpcionesMesa1");

  NOPERSONAS.addEventListener("change", function () {
    const personas = NOPERSONAS.value;

    let mensaje = "";

    if (personas == 1) {
      mensaje = "Limite de 1 mesa en tu reserva";
      document.getElementById("mensajeNumeroMesas").innerHTML = mensaje;
      selectMesa1.disabled = false;
    } else if (personas == 2) {
      mensaje = "Limite de 2 mesas en tu reserva";
      document.getElementById("mensajeNumeroMesas").innerHTML = mensaje;
      selectMesa1.disabled = false;
    } else if (personas == 3) {
      mensaje = "Limite de 3 mesas en tu reserva";
      document.getElementById("mensajeNumeroMesas").innerHTML = mensaje;
      selectMesa1.disabled = false;
    } else if (personas == 4) {
      mensaje = "Limite de 4 mesas en tu reserva";
      document.getElementById("mensajeNumeroMesas").innerHTML = mensaje;
      selectMesa1.disabled = false;
    } else if (personas == 5) {
      mensaje = "Limite de 5 mesas en tu reserva";
      document.getElementById("mensajeNumeroMesas").innerHTML = mensaje;
      selectMesa1.disabled = false;
    }
  });
});

//////////////////////////////////////////////////////
//Seleccionar mesa
//////////////////////////////////////////////////////
document.addEventListener("DOMContentLoaded", function () {
  const select1 = document.getElementById("OpcionesMesa1");

  function seleccionarMesa(mesa) {
    btnmesa1.classList.remove("MesaSeleccionada");
    btnmesa2.classList.remove("MesaSeleccionada");
    btnmesa3.classList.remove("MesaSeleccionada");
    btnmesa4.classList.remove("MesaSeleccionada");
    btnmesa5.classList.remove("MesaSeleccionada");
    btnmesa6.classList.remove("MesaSeleccionada");
    btnmesa7.classList.remove("MesaSeleccionada");

    mesa.classList.add("MesaSeleccionada");
  }

  function fundivBOTONES(quitartexto) {
    divbotones1.classList.remove("quitarTitulo");
    divbotones2.classList.remove("quitarTitulo");
    divbotones3.classList.remove("quitarTitulo");
    divbotones4.classList.remove("quitarTitulo");
    divbotones5.classList.remove("quitarTitulo");
    divbotones6.classList.remove("quitarTitulo");
    divbotones7.classList.remove("quitarTitulo");

    quitartexto.classList.add("quitarTitulo");
  }

  function camColor(cambiarfondo) {
    fondosA1.classList.remove("cambiarfondo");
    fondosA2.classList.remove("cambiarfondo");
    fondosA3.classList.remove("cambiarfondo");
    fondosA4.classList.remove("cambiarfondo");
    fondosA5.classList.remove("cambiarfondo");
    fondosA6.classList.remove("cambiarfondo");
    fondosA7.classList.remove("cambiarfondo");

    cambiarfondo.classList.add("cambiarfondo");
  }

  function mosSeleccionado(mosSeleccionado) {
    s1.classList.remove("estaSeleccionado");
    s2.classList.remove("estaSeleccionado");
    s3.classList.remove("estaSeleccionado");
    s4.classList.remove("estaSeleccionado");
    s5.classList.remove("estaSeleccionado");
    s6.classList.remove("estaSeleccionado");
    s7.classList.remove("estaSeleccionado");

    mosSeleccionado.classList.add("estaSeleccionado");
  }

  function noOjo(noOjo) {
    imgA1.classList.remove("quitarOjo");
    imgA2.classList.remove("quitarOjo");
    imgA3.classList.remove("quitarOjo");
    imgA4.classList.remove("quitarOjo");
    imgA5.classList.remove("quitarOjo");
    imgA6.classList.remove("quitarOjo");
    imgA7.classList.remove("quitarOjo");

    noOjo.classList.add("quitarOjo");
  }

  let selectedOption1 = "";

  select1.addEventListener("change", () => {
    {
      selectedOption1 = select1.value;
      if (selectedOption1 === "0") {
        fundivBOTONES(quitartexto);
        camColor();
        mosSeleccionado();
        noOjo();
      } else if (selectedOption1 === "1") {
        seleccionarMesa(btnmesa1);
        fundivBOTONES(divbotones1);
        camColor(fondosA1);
        mosSeleccionado(s1);
        noOjo(imgA1);
      } else if (selectedOption1 === "2") {
        seleccionarMesa(btnmesa2);
        fundivBOTONES(divbotones2);
        camColor(fondosA2);
        mosSeleccionado(s2);
        noOjo(imgA2);
      } else if (selectedOption1 === "3") {
        seleccionarMesa(btnmesa3);
        fundivBOTONES(divbotones3);
        camColor(fondosA3);
        mosSeleccionado(s3);
        noOjo(imgA3);
      } else if (selectedOption1 === "4") {
        seleccionarMesa(btnmesa4);
        fundivBOTONES(divbotones4);
        camColor(fondosA4);
        mosSeleccionado(s4);
        noOjo(imgA4);
      } else if (selectedOption1 === "5") {
        seleccionarMesa(btnmesa5);
        fundivBOTONES(divbotones5);
        camColor(fondosA5);
        mosSeleccionado(s5);
        noOjo(imgA5);
      } else if (selectedOption1 === "6") {
        seleccionarMesa(btnmesa6);
        fundivBOTONES(divbotones6);
        camColor(fondosA6);
        mosSeleccionado(s6);
        noOjo(imgA6);
      } else if (selectedOption1 === "7") {
        seleccionarMesa(btnmesa7);
        fundivBOTONES(divbotones7);
        camColor(fondosA7);
        mosSeleccionado(s7);
        noOjo(imgA7);
      }
    }
  });
});
