

let bar = document.getElementById("bar");
let cart = document.querySelector(".mobile a");
let ul = document.querySelector(" header ul");
let X = document.getElementById("close");

function baar() {
  bar.classList.toggle("runclass");
  cart.classList.toggle("runclass");
  ul.classList.toggle("runclass");
  X.classList.toggle("runclass");
}
const proconti = document.querySelector(".pro-conti");
const pro = document.querySelector(".pro");

//  to top button
document.getElementById("totop").onclick = totop;
function totop() {
  scroll({
    left: 0,
    top: 0,
    behavior: "smooth",
  });
}
onscroll = () => {
  if (scrollY > 1000) {
    document.getElementById("totop").style.display = "block";
  } else {
    document.getElementById("totop").style.display = "none";
  }
};


  
      

