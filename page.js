//swiper
// var swiper = new Swiper(".home", {
//     spaceBetween: 30,
//     centeredSlides: true,
   
//     navigation: {
//       nextEl: ".swiper-button-next",
//       prevEl: ".swiper-button-prev",
//     },
//   });

  let menu=document.querySelector('#menu-icon');
  let navbar=document.querySelector('.navbar');

  menu.onclick = ()=>{
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('active');

  }
  window.onscroll=()=>{
    menu.classList.remove('bx-x');
    navbar.classList.remove('active');
  }





  
  // const tabsBox = document.querySelector(".tabs-box"),
  // allTabs = tabsBox.querySelectorAll(".tab"),
  // arrowIcons = document.querySelectorAll(".icon i");
  
  // let isDragging = false;
  
  // const handleIcons = (scrollVal) => {
  //     let maxScrollableWidth = tabsBox.scrollWidth - tabsBox.clientWidth;
  //     arrowIcons[0].parentElement.style.display = scrollVal <= 0 ? "none" : "flex";
  //     arrowIcons[1].parentElement.style.display = maxScrollableWidth - scrollVal <= 1 ? "none" : "flex";
  // }
  
  // arrowIcons.forEach(icon => {
  //     icon.addEventListener("click", () => {
  //         // if clicked icon is left, reduce 350 from tabsBox scrollLeft else add
  //         let scrollWidth = tabsBox.scrollLeft += icon.id === "left" ? -340 : 340;
  //         handleIcons(scrollWidth);
  //     });
  // });
  
  // allTabs.forEach(tab => {
  //     tab.addEventListener("click", () => {
  //         tabsBox.querySelector(".active").classList.remove("active");
  //         tab.classList.add("active");
  //     });
  // });
  
  // const dragging = (e) => {
  //     if(!isDragging) return;
  //     tabsBox.classList.add("dragging");
  //     tabsBox.scrollLeft -= e.movementX;
  //     handleIcons(tabsBox.scrollLeft)
  // }
  
  // const dragStop = () => {
  //     isDragging = false;
  //     tabsBox.classList.remove("dragging");
  // }
  
  // tabsBox.addEventListener("mousedown", () => isDragging = true);
  // tabsBox.addEventListener("mousemove", dragging);
  // document.addEventListener("mouseup", dragStop);

  
// start: Category
document.querySelector('.category-arrow.prev').addEventListener('click', function(e) {
  e.preventDefault()
  const scroller = document.querySelector('.category-link')
  scroller.scrollLeft -= scroller.offsetWidth
});
document.querySelector('.category-arrow.next').addEventListener('click', function(e) {
  e.preventDefault()
  const scroller = document.querySelector('.category-link')
  scroller.scrollLeft += scroller.offsetWidth
});
document.querySelector('.category-link').addEventListener('scroll', function() {
  document.querySelector('.category-arrow.prev').classList.toggle('hidden', this.scrollLeft < 24)
  document.querySelector('.category-arrow.next').classList.toggle('hidden', this.scrollLeft > this.scrollWidth - this.offsetWidth - 24)
});
// end: Category
