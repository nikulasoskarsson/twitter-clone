// TODO refactor this entire code
const openModalBtn = document.getElementById('open-tweet-modal')
const closeModalBtn = document.getElementById('close-modal')
const modalContainer = document.getElementById('modal-container')
const tweetModal = document.getElementById('tweet-modal')

const openSignUpModal = document.getElementById('open-sign-up-modal')
const signupModal = document.getElementById('signup-modal')

const openUserModal = document.getElementById('open-user-modal')
const userModal = document.getElementById('user-modal')

const tweetModalCloseBtn = document.getElementById('create-tweet-from-modal')

const imageModal = document.getElementById('image-modal')

function openModal(modal) {
  modalContainer.classList.add('display-flex')
  modal.classList.add('display-inline-block')
  modalContainer.classList.remove('display-hidden')
  modal.classList.remove('display-hidden')
}

function closeModal(modal) {
  modalContainer.classList.remove('display-flex')
  modal.classList.remove('display-inline-block')
  modalContainer.classList.add('display-hidden')
  modal.classList.add('display-hidden')
}
function openModalNoContainer(modal) {
  modal.classList.add('display-inline-block')
  modal.classList.remove('display-hidden')
}

function openImageModal(image, images, index) {
  modalContainer.classList.remove('display-hidden')
  imageModal.classList.remove('display-hidden')

  const imageEl = imageModal.querySelector('img')
  imageEl.src = `${window.location.pathname}img/tweets/${image}`
  const aImages = images.split(',')

  addPrevAndNextEventListeners(imageEl, aImages, index)
}
function showPrevImg(imageEl, images, index) {
  index--

  imageEl.src = `${window.location.pathname}img/tweets/${images[index]}`

  addPrevAndNextEventListeners(imageEl, images, index)
}
function showNextImg(imageEl, images, index) {
  index++

  imageEl.src = `${window.location.pathname}img/tweets/${images[index]}`

  addPrevAndNextEventListeners(imageEl, images, index)
}

function addPrevAndNextEventListeners(imageEl, images, index) {
  const leftBtn = imageModal.querySelector('.left')
  const rightBtn = imageModal.querySelector('.right')

  index === 0
    ? leftBtn.classList.add('display-hidden')
    : leftBtn.classList.remove('display-hidden')
  index + 1 === images.length
    ? rightBtn.classList.add('display-hidden')
    : rightBtn.classList.remove('display-hidden')

  leftBtn.removeEventListener('click', () =>
    showPrevImg(imageEl, images, index)
  )
  rightBtn.removeEventListener('click', () =>
    showNextImg(imageEl, images, index)
  )

  leftBtn.addEventListener('click', () => showPrevImg(imageEl, images, index))
  rightBtn.addEventListener('click', () => showNextImg(imageEl, images, index))
}

function closeImageModal(e) {
  const classList = e.target.classList
  const elType = e.target.tagName

  console.log(elType)

  if (
    !classList.contains('image-modal__icon') &&
    !classList.contains('image-modal__img') &&
    elType != 'g' &&
    elType != 'path'
  ) {
    modalContainer.classList.add('display-hidden')
    imageModal.classList.add('display-hidden')
  }
}

if (openModalBtn) {
  openModalBtn.addEventListener('click', () => openModal(tweetModal))
}
if (closeModalBtn) {
  closeModalBtn.addEventListener('click', () => closeModal(tweetModal))
}
if (openSignUpModal) {
  openSignUpModal.addEventListener('click', () => openModal(signupModal))
}
if (tweetModalCloseBtn) {
  tweetModalCloseBtn.addEventListener('click', () => closeModal(tweetModal))
}
if (openUserModal) {
  openUserModal.addEventListener('click', () => openModalNoContainer(userModal))
}

modalContainer.addEventListener('click', (e) => closeImageModal(e))
