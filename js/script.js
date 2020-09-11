const createTweetBtn = document.getElementById('create-tweet');

async function createTweet() {
  const tweet = document.getElementById('new-tweet').value;
  const id = document.getElementById('user-id').getAttribute('data-user-id');
  console.log(id);

  const data = new FormData();
  data.append('userId', id);
  data.append('tweet', tweet);
  const conn = await fetch('php/api/api-create-tweet.php', {
    method: 'POST',
    body: data,
  });
  console.log(conn);
}

createTweetBtn.addEventListener('click', () => createTweet());
