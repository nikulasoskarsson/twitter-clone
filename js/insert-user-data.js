// function insertDataToTweetBar(user) {
//   const tweetBarImgField = document.querySelector('.tweetbar__img');
//   tweetBarImgField.src = `img/user/${user.userImg}`;
// }

// function insertDataToUserCard(user) {
//   const userCard = document.getElementById('user-card');

//   const userNameField = userCard.querySelector('h3');
//   const twitterHandleField = userCard.querySelector('p');
//   const logoutBtn = userCard.querySelector('button');
//   const userImgField = userCard.querySelector('.user__img');
//   const userSmallScreenImg = document
//     .querySelector('.user__smaller-screen')
//     .querySelector('.user__img');

//   userNameField.innerText = user.firstname + ' ' + user.lastname;
//   twitterHandleField.innerText = `@${user.username}`;
//   logoutBtn.innerText = `logout as ${user.username}`;
//   userImgField.src = `img/user/${user.userImg}`;
//   userSmallScreenImg.src = `img/user/${user.userImg}`;
// }

// function insertDataToProfile(user) {
//   const profileUserbar = document.getElementById('profile-userbar');

//   const signUpDate = new Date(user.signUpDate * 1000);
//   const monthString = getMonthAsString(signUpDate.getMonth());
//   const year = signUpDate.getFullYear();

//   const userNameField = profileUserbar.querySelector(
//     '.profile-userbar__username'
//   );
//   const twitterHandleField = profileUserbar.querySelector(
//     '.profile-userbar__handle'
//   );
//   const joinDateField = profileUserbar.querySelector(
//     '.profile-userbar__join-date__text'
//   );

//   const userImgField = profileUserbar.querySelector(
//     '.profile-userbar__user-img'
//   );

//   userNameField.innerText = user.firstname + ' ' + user.lastname;
//   twitterHandleField.innerText = `@${user.username}`;
//   joinDateField.innerText = `Joined ${monthString} ${year}`;
//   userImgField.src = `img/user/${user.userImg}`;
// }

// Take the user image from the db an insert into every img field with the class of user-img
function insertUserImg(user) {
  const userImgElements = document.querySelectorAll('.user-img');
  userImgElements.forEach(
    (userImgElement) => (userImgElement.src = `img/user/${user.userImg}`)
  );
}

// Take the full name of the user from the db an insert into every field with the class user-name
function insertUserName(user) {
  const userNameElements = document.querySelectorAll('.user-name');
  userNameElements.forEach(
    (userNameElement) =>
      (userNameElement.innerText = user.firstname + ' ' + user.lastname)
  );
}

function insertUserHandle(user) {
  const userHandleElements = document.querySelectorAll('.user-handle');
  userHandleElements.forEach(
    (userHandleElement) => (userHandleElement.innerText += user.username)
  );
}

function insertUserJoinDate(user) {
  const joinDate = new Date(user.signUpDate * 1000);
  const monthString = getMonthAsString(joinDate.getMonth());
  const year = joinDate.getFullYear();

  const userJoinDateElements = document.querySelectorAll('.user-handle');
  userJoinDateElements.forEach(
    (userJoinDateElement) =>
      (userJoinDateElement.innerText = `Joined ${monthString} ${year}`)
  );
}

function insertNumberOfTweets(user) {
  const userTweetsNrElements = document.querySelectorAll('.user-tweets-nr');
  userTweetsNrElements.forEach(
    (userTweetsNrElement) => (userTweetsNrElement.innerText += `5 Tweets`)
  );
}
// Get the user data and pass it into the other functions to load the user data into the dom
async function init() {
  const user = await getUser();
  insertUserImg(user);
  insertUserName(user);
  insertUserHandle(user);
  insertNumberOfTweets(user);
  insertUserJoinDate(user);
}

init();
