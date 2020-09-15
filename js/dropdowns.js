const openDrowndownBtns = document.querySelectorAll('.open-dropdown');
const body = document.querySelector('body');

function openDropDown() {
  let dropdown;
  if (event.target.tagName == 'path') {
    dropdown = event.target.parentNode.parentNode.nextElementSibling;
  } else {
    dropdown = event.target.nextElementSibling;
  }
  dropdown.classList.remove('display-hidden');

  body.addEventListener('click', () => closeDropDown(dropdown));
}
function closeDropDown(dropdown) {
  const eventClassListArr = Array.from(event.target.classList);
  if (!eventClassListArr.includes('open-dropdown')) {
    dropdown.classList.add('display-hidden');
  }

  //   body.removeEventListener('click', () => closeDropDown(dropdown));
}

openDrowndownBtns.forEach((btn) => btn.addEventListener('click', openDropDown));
