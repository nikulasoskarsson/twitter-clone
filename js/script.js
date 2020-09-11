const createTweetBtn = document.getElementById('create-tweet');

async function createTweet() {
  const tweet = document.getElementById('new-tweet').value;
  const id = document.getElementById('user-id').getAttribute('data-user-id');
  console.log(id);

  const data = new FormData();
  data.append('userId', id);
  data.append('tweet', tweet);

  try {
    const conn = await fetch('php/api/api-create-tweet.php', {
      method: 'POST',
      body: data,
    });

    const res = await conn.text();
    // TODO show user he has created a tweet
    console.log(res);
  } catch (error) {
    console.log(error);
  }
}

async function getAllTweets() {
  const id = document.getElementById('user-id').getAttribute('data-user-id'); // Get the user id to only fetch his tweets
  const conn = await fetch(`php/api/api-get-tweets.php?userId=${id}`);
  const res = await conn.text();
  const tweets = JSON.parse(res);
  displayTweets(tweets);
}

function displayTweets(tweets) {
  tweets.forEach((tweet) => console.log(tweet));
}

createTweetBtn.addEventListener('click', () => createTweet());

document.addEventListener('load', getAllTweets());
