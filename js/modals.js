// The tweet modal
const openModalBtn = document.getElementById('open-tweet-modal');
const closeModalBtn = document.getElementById('close-modal');
const modalContainer = document.getElementById('modal-container');
const tweetModal = document.getElementById('tweet-modal');

function openModal() {
  modalContainer.classList.add('display-flex');
  tweetModal.classList.add('display-inline-block');
  modalContainer.classList.remove('display-hidden');
  tweetModal.classList.remove('display-hidden');
}

function closeModal() {
  modalContainer.classList.remove('display-flex');
  tweetModal.classList.remove('display-inline-block');
  modalContainer.classList.add('display-hidden');
  tweetModal.classList.add('display-hidden');
}

openModalBtn.addEventListener('click', openModal);
closeModalBtn.addEventListener('click', closeModal);
