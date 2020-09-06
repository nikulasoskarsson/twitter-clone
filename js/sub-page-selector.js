// Get elements from the dom
const navigationLinks = document.querySelectorAll('.navigation__list-item');
const subPageContainers = document.querySelectorAll;

//functions
function handlePageChange() {
  console.log(event.target);

  // add active state
  navigationLinks.forEach((link) => {
    if (link == event.target) {
      console.log('match');
      link.classList.add('yo');
    } else {
      console.log('no match');
    }
  });
}

// Click events
navigationLinks.forEach((link) =>
  link.addEventListener('click', handlePageChange)
);
