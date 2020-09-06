// Get elements from the dom
const navigationLinks = document.querySelectorAll('.navigation__list-item');
const subPageContainers = document.querySelectorAll('.subpage');

//functions
function handlePageChange() {
  let navLink;
  let id;

  // if somebody click and element inside of the li
  if (event.target.tagName == 'A' || event.target.tagName == 'svg') {
    navLink = event.target.parentElement;
  } else if (event.target.tagName == 'path') {
    navLink = event.target.parentElement.parentElement.parentElement;
  }
  // if somebody click on the
  else {
    navLink = event.target;
  }

  id = navLink.getAttribute('data-id');

  //   add active state
  navigationLinks.forEach((link) => {
    if (link == navLink) {
      link.children[0].classList.add('navigation__icon-active');
      link.children[1].classList.add('navigation__link-active');
    } else {
      link.children[0].classList.remove('navigation__icon-active');
      link.children[1].classList.remove('navigation__link-active');
    }
  });

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
