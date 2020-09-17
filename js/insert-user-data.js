function insertDataToUserCard(user) {
  const userCard = document.getElementById('user-card');

  const userNameField = userCard.querySelector('h3');
  const twitterHandleField = userCard.querySelector('p');
  const logoutBtn = userCard.querySelector('button');

  userNameField.innerText = user.firstname + ' ' + user.lastname;
  twitterHandleField.innerText = `@${user.username}`;
  logoutBtn.innerText = `logout as ${user.username}`;
}

function insertDataToProfile() {}

// Get the user data and pass it into the other functions to load the user data into the dom
async function init() {
  const user = await getUser();

  insertDataToUserCard(user);
}

init();
