// gallery item filter
  
const filterButtons = document.querySelector("#filter-btns").children;
const items = document.querySelector(".products-content").children;
  
for (let i = 0; i < filterButtons.length; i++) {
    filterButtons[i].addEventListener("click", function () {
        for (let j = 0; j < filterButtons.length; j++) {
            filterButtons[j].classList.remove("active")
        }
        this.classList.add("active");
        const target = this.getAttribute("data-target")
  
        for (let k = 0; k < items.length; k++) {
            items[k].style.display = "none";
            if (target == items[k].getAttribute("data-id")) {
                items[k].style.display = "block";
            }
            if (target == items[k].getAttribute("data-id2")) {
              items[k].style.display = "block";
            }
            if (target == "all") {
                items[k].style.display = "block";
            }
        }
  
    })
}



var prevScrollpos = window.pageYOffset;
var nav = document.querySelector(".navegacion");
var windowHeight = window.innerHeight;
  

window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    nav.style.transform = "translateY(0)";
    nav.classList.remove("ocultar-nav");
  } else {
    if (currentScrollPos > windowHeight * 0.9) {
      nav.style.transform = "translateY(-100%)";
      nav.classList.add("ocultar-nav");
    }
  }
  prevScrollpos = currentScrollPos;
}
