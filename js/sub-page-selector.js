// Get elements from the dom
const navigationLinks = document.querySelectorAll('.navigation__list-item');
const subPageContainers = document.querySelectorAll('.subpage');

//functions
function handlePageChange() {
  const id = event.target.getAttribute('data-id');

  // add active state
  //   navigationLinks.forEach((link) => {
  //     // !match
  //     if (link == event.target) {
  //       link.classList.add('yo');
  //     } else {
  //       console.log('no match');
  //     }
  //   });

  // show correct page and hide others
  subPageContainers.forEach((page) => {
    if (page.getAttribute('id') === id) {
      page.classList.remove('subpage-hidden');
      page.classList.add('subpage-visible');
    } else {
      page.classList.add('subpage-hidden');
      page.classList.remove('subpage-visible');
    }
  });
}

// Click events
navigationLinks.forEach((link) =>
  link.addEventListener('click', handlePageChange)
);
