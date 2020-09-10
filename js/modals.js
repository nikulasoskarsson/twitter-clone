// The tweet modal
const openModalBtn = document.getElementById('open-tweet-modal');
const closeModalBtn = document.getElementById('close-modal');
const modalContainer = document.getElementById('modal-container');
const tweetModal = document.getElementById('tweet-modal');

const openSignUpModal = document.getElementById('open-sign-up-modal');
const signupModal = document.getElementById('signup-modal');

function openModal(modal) {
  modalContainer.classList.add('display-flex');
  modal.classList.add('display-inline-block');
  modalContainer.classList.remove('display-hidden');
  modal.classList.remove('display-hidden');
}

function closeModal(modal) {
  modalContainer.classList.remove('display-flex');
  modal.classList.remove('display-inline-block');
  modalContainer.classList.add('display-hidden');
  modal.classList.add('display-hidden');
}
if (openModalBtn) {
  openModalBtn.addEventListener('click', openModal(tweetModal));
}
if (closeModalBtn) {
  closeModalBtn.addEventListener('click', closeModal(tweetModal));
}

openSignUpModal.addEventListener('click', () => openModal(signupModal));
