const createTweetBtn = document.getElementById('create-tweet');
const profileTweetContianer = document.getElementById(
  'profile-tweet-container'
);

// AJAX functions that communicate with the API
async function createTweet() {
  const tweet = document.getElementById('new-tweet').value;
  const id = document.getElementById('user-id').getAttribute('data-user-id');

  const data = new FormData();
  data.append('userId', id);
  data.append('tweet', tweet);

  try {
    const conn = await fetch('php/api/api-create-tweet.php', {
      method: 'POST',
      body: data,
    });

    const res = await conn.text();
    getData();
    // TODO show user he has created a tweet
  } catch (error) {
    console.log(error);
  }
}

async function getData() {
  const tweets = await getAllTweets();
  const user = await getUser();
  console.log('getdata', user);
  displayTweets(tweets, user);
}
async function getAllTweets() {
  const id = document.getElementById('user-id').getAttribute('data-user-id'); // Get the user id to only fetch his tweets
  const conn = await fetch(`php/api/api-get-tweets.php?userId=${id}`);
  const res = await conn.text();
  return JSON.parse(res);
}

async function getUser() {
  const id = document.getElementById('user-id').getAttribute('data-user-id');
  const conn = await fetch(`php/api/api-get-user.php?userId=${id}`);
  const res = await conn.text();
  return JSON.parse(res);
}

async function deleteTweet() {
  const userId = document
    .getElementById('user-id')
    .getAttribute('data-user-id');
  const tweetId = event.target.id;

  const data = new FormData();
  data.append('userId', userId);
  data.append('tweetId', tweetId);

  try {
    const conn = await fetch('php/api/api-delete-tweet.php', {
      method: 'POST',
      body: data,
    });
    const res = await conn.text();
    console.log(res);
    getData();
  } catch (error) {}
}

async function updateTweet() {
  const userId = document
    .getElementById('user-id')
    .getAttribute('data-user-id');

  const tweetId = event.target.id;
  const newTweetBody =
    event.target.parentNode.previousSibling.previousSibling.previousSibling
      .previousSibling.value;
  console.log(newTweetBody);
  const data = new FormData();

  data.append('userId', userId);
  data.append('tweetId', tweetId);
  data.append('newTweetBody', newTweetBody);

  try {
    const conn = await fetch('php/api/api-update-tweet.php', {
      method: 'POST',
      body: data,
    });

    const res = await conn.text();
    console.log(res);
    getData();
  } catch (error) {
    console.log(error);
  }
}

// Regular functions that don't communicate with the api

function displayTweets(tweets, user) {
  profileTweetContianer.innerHTML = ''; //reset
  tweets.forEach(
    (tweet) => (profileTweetContianer.innerHTML += createTweetCard(tweet, user))
  );
}

function createTweetCard(tweet, user) {
  console.log(user);
  return `<div class="tweet-card">
    <div class="tweet-card__grid-container">
        <img class="tweet-card__user-img" src="img/follow1.jpg" />
        <div>
            <div class="tweet-card__info">
                <div class="tweet-card__user">
                    <h3 class="tweet-card__user-name">${user.firstname} ${user.lastname}</h3>
                    <span class="tweet-card__user-handle">${user.username}</span>
                </div>
                <span class="tweet-card__tweet-date">1h</span>
            </div>

            
            <input class="tweet-card__tweet-input"type="text" value=" ${tweet.body}"/>
            <div class="tweet-card__icon-container">
                <div class="tweet-card__icon-field">
                    <svg viewBox="0 0 24 24" class="tweet-card__icon-field-icon">
                        <g>
                            <path d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"></path>
                        </g>
                    </svg>
                    <span class="tweet-card-icon-field-nr">100</span>
                </div>

                <div class="tweet-card__icon-field">
                    <svg viewBox="0 0 24 24" class="tweet-card__icon-field-icon">
                        <g>
                            <path d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"></path>
                        </g>
                    </svg>
                    <span class="tweet-card-icon-field-nr">100</span>
                </div>

                <div class="tweet-card__icon-field">
                    <svg viewBox="0 0 24 24" class="tweet-card__icon-field-icon">
                        <g>
                            <path d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"></path>
                        </g>
                    </svg>
                    <span class="tweet-card-icon-field-nr">100</span>
                </div>

                <div class="tweet-card__icon-field">
                    <svg viewBox="0 0 24 24" class="tweet-card__icon-field-icon">
                        <g>
                            <path d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"></path>
                        </g>
                    </svg>
                </div>
            </div>
            <div class="tweet-card__button-container">
              <button class="tweet-card__button delete" id="${tweet.id}"onclick="deleteTweet();">Delete</button>
              <button class="tweet-card__button update" id="${tweet.id}"onclick="updateTweet();">Update</button>
            </div>
        </div>`;
}

createTweetBtn.addEventListener('click', () => createTweet());

document.addEventListener('load', getData());
