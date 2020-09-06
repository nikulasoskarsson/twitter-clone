// Get elements from the dom
const navigationLinks = document.querySelectorAll('.navigation__list-item');
const subPageContainers = document.querySelectorAll('.subpage');

// Get the correct li element even if somebody clicks the svg or link inside
function getNavLink(target) {
  if (target.tagName == 'A' || target.tagName == 'svg') {
    return target.parentElement;
  } else if (target.tagName == 'path') {
    return target.parentElement.parentElement.parentElement;
  } else {
    return event.target;
  }
}

// Add and remove classes to show active state on the icon and link
function setActiveState(navLink) {
  navigationLinks.forEach((link) => {
    if (link == navLink) {
      link.children[0].classList.add('navigation__icon-active');
      link.children[1].classList.add('navigation__link-active');
    } else {
      link.children[0].classList.remove('navigation__icon-active');
      link.children[1].classList.remove('navigation__link-active');
    }
  });
}

// Show the correct page and hide the others based on the id
function changePage(id) {
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

function handlePageChange() {
  const navLink = getNavLink(event.target);
  const id = navLink.getAttribute('data-id'); // Get the data-id att that will match the id on the page to be shown

  setActiveState(navLink);
  changePage(id);
}

// Click events
navigationLinks.forEach((link) =>
  link.addEventListener('click', handlePageChange)
);
