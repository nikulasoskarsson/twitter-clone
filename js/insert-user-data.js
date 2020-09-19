function insertDataToTweetBar(user) {
  const tweetBarImgField = document.querySelector('.tweetbar__img');
  tweetBarImgField.src = `img/user/${user.image}`;
}

function insertDataToUserCard(user) {
  const userCard = document.getElementById('user-card');

  const userNameField = userCard.querySelector('h3');
  const twitterHandleField = userCard.querySelector('p');
  const logoutBtn = userCard.querySelector('button');
  const userImgField = userCard.querySelector('.user__img');
  const userSmallScreenImg = document
    .querySelector('.user__smaller-screen')
    .querySelector('.user__img');

  userNameField.innerText = user.firstname + ' ' + user.lastname;
  twitterHandleField.innerText = `@${user.username}`;
  logoutBtn.innerText = `logout as ${user.username}`;
  userImgField.src = `img/user/${user.image}`;
  userSmallScreenImg.src = `img/user/${user.image}`;
}

function insertDataToProfile(user) {
  const profileUserbar = document.getElementById('profile-userbar');

  const signUpDate = new Date(user.signUpDate * 1000);
  const monthString = getMonthAsString(signUpDate.getMonth());
  const year = signUpDate.getFullYear();

  const userNameField = profileUserbar.querySelector(
    '.profile-userbar__username'
  );
  const twitterHandleField = profileUserbar.querySelector(
    '.profile-userbar__handle'
  );
  const joinDateField = profileUserbar.querySelector(
    '.profile-userbar__join-date__text'
  );

  const userImgField = profileUserbar.querySelector(
    '.profile-userbar__user-img'
  );

  userNameField.innerText = user.firstname + ' ' + user.lastname;
  twitterHandleField.innerText = `@${user.username}`;
  joinDateField.innerText = `Joined ${monthString} ${year}`;
  userImgField.src = `img/user/${user.image}`;
}

// Get the user data and pass it into the other functions to load the user data into the dom
async function init() {
  const user = await getUser();

  insertDataToTweetBar(user);
  insertDataToUserCard(user);
  insertDataToProfile(user);
}

init();
