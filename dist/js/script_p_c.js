// start: Category
document.querySelector('.category-arrow.prevv').addEventListener('click', function(e) {
    e.preventDefault()
    const scroller = document.querySelector('.category-link')
    scroller.scrollLeft -= scroller.offsetWidth
  });
  document.querySelector('.category-arrow.nextt').addEventListener('click', function(e) {
    // alert("hi");
    e.preventDefault()
    const scroller = document.querySelector('.category-link')
    scroller.scrollLeft += scroller.offsetWidth
  });
  document.querySelector('.category-link').addEventListener('scroll', function() {
    document.querySelector('.category-arrow.prevv').classList.toggle('hidden', this.scrollLeft < 24)
    document.querySelector('.category-arrow.nextt').classList.toggle('hidden', this.scrollLeft > this.scrollWidth - this.offsetWidth - 24)
  });
  // end: Category

  // start: Category
document.querySelector('.category-arrowd.prevvd').addEventListener('click', function(e) {
  e.preventDefault()
  const scroller = document.querySelector('.category-linkd')
  scroller.scrollLeft -= scroller.offsetWidth
});
document.querySelector('.category-arrowd.nexttd').addEventListener('click', function(e) {
  // alert("hi");
  e.preventDefault()
  const scroller = document.querySelector('.category-linkd')
  scroller.scrollLeft += scroller.offsetWidth
});
document.querySelector('.category-linkd').addEventListener('scroll', function() {
  document.querySelector('.category-arrowd.prevvd').classList.toggle('hidden', this.scrollLeft < 24)
  document.querySelector('.category-arrowd.nexttd').classList.toggle('hidden', this.scrollLeft > this.scrollWidth - this.offsetWidth - 24)
});
// end: Category