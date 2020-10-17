const createTweetBtn = document.getElementById('create-tweet')
const createTweetFromModalBtn = document.getElementById(
  'create-tweet-from-modal'
)

async function handleCreateTweet(e) {
  console.log('handle create tweet running')
  const id = document.getElementById('user-id').getAttribute('data-user-id')
  const tweet = e.target.parentNode.parentNode.querySelectorAll('input')[1]
    .value
  const images = e.target.parentNode.parentNode.querySelectorAll('input')[0]

  const res = await createTweet(id, tweet, images)
  console.log(res)
  //   if (res.status === 200) {
  //   }
}

async function handleDisplayingTweets() {
  const id = document.getElementById('user-id').getAttribute('data-user-id')
  const tweets = await getAllTweets(id)
  const user = await getUser()
}

createTweetBtn.addEventListener('click', (e) => handleCreateTweet(e))
createTweetFromModalBtn.addEventListener('click', (e) => handleCreateTweet(e))
