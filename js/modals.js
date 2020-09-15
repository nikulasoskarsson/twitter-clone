// TODO refactor this entire code
const openModalBtn = document.getElementById('open-tweet-modal');
const closeModalBtn = document.getElementById('close-modal');
const modalContainer = document.getElementById('modal-container');
const tweetModal = document.getElementById('tweet-modal');

const openSignUpModal = document.getElementById('open-sign-up-modal');
const signupModal = document.getElementById('signup-modal');

const openUserModal = document.getElementById('open-user-modal');
const userModal = document.getElementById('user-modal');

const tweetModalCloseBtn = document.getElementById('create-tweet-from-modal');

function openModal(modal) {

  modalContainer.classList.add('display-flex');
  modal.classList.add('display-inline-block');
  modalContainer.classList.remove('display-hidden');
  modal.classList.remove('display-hidden');
  

function closeModal(modal) {
  modalContainer.classList.remove('display-flex');
  modal.classList.remove('display-inline-block');
  modalContainer.classList.add('display-hidden');
  modal.classList.add('display-hidden');
}
function openModalNoContainer(modal) {
  modal.classList.add('display-inline-block');
  modal.classList.remove('display-hidden');
}

if (openModalBtn) {
  openModalBtn.addEventListener('click', () => openModal(tweetModal));
}
if (closeModalBtn) {
  closeModalBtn.addEventListener('click', () => closeModal(tweetModal));
}
if (openSignUpModal) {
  openSignUpModal.addEventListener('click', () => openModal(signupModal));
}
if (tweetModalCloseBtn) {
  tweetModalCloseBtn.addEventListener('click', () => closeModal(tweetModal));
}
if (openUserModal) {
  openUserModal.addEventListener('click', () =>
    openModalNoContainer(userModal)
  );
}
