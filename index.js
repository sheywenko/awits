const hamburger = document.querySelector(".hamburger");
const navList = document.querySelector(".nav-list");
console.log(hamburger);
hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  navList.classList.toggle("active");
});
document.querySelectorAll(".nav-link").forEach((link) => {
  link.addEventListener("click", () => {
    hamburger.classList.remove("active");
    navList.classList.remove("active");
  });
});

// Copyright year
let year = document.querySelector(".year");
const updatedYear = new Date().getFullYear();
year.textContent = updatedYear;

// AOS
AOS.init({
  duration: 800,
});
// counter
$(document).ready(function () {
  $(".counter-no").counterUp({
    delay: 10,
    time: 1000,
  });
});
