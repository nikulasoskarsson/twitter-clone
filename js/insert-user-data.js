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
