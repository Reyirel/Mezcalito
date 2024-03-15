const menuHamburger = document.querySelector(".menu-icon")
const navLinks = document.querySelector(".enlaces")

menuHamburger.addEventListener('click',()=>{
navLinks.classList.toggle('mobile-menu')
})

window.onscroll = () => {
    menuHamburger.classList.remove(".menu-icon");
    navLinks.classList.remove('mobile-menu');
}