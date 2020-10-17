async function signup(form) {
  const formData = new FormData(form)

  try {
    const conn = await fetch('php/api/api-signup.php', {
      method: 'post',
      body: formData,
    })

    console.log(conn)
    let res = await conn.text()
    console.log(res)
    res = JSON.parse(res)
    res.status = conn.status
    return res
  } catch (error) {
    console.log(error)
  }
}
async function login(form) {
  const formData = new FormData(form)
  try {
    const conn = await fetch('php/api/api-login.php', {
      method: 'post',
      body: formData,
    })

    let res = await conn.text()
    res = JSON.parse(res)
    res.status = conn.status
    return res
  } catch (error) {
    console.log(error)
  }
}
async function getUser(id) {
  try {
    const conn = await fetch(`php/api/api-get-user.php?userId=${id}`)
    const res = await conn.json()
    return res
  } catch (error) {
    console.log(error)
  }
}

async function getAllTweets(id) {
  try {
    const conn = await fetch(`php/api/api-get-tweets.php?userId=${id}`)
    const res = await conn.json()
    res.status = conn.status
    return res
    if (res.status !== 200) {
      console.log('running')
      return `Error fetching the tweets status ${res.status}`
    }

    return res
  } catch (error) {
    console.log(error)
  }
}
async function createTweet(userId, body, images) {
  const data = new FormData()
  data.append('userId', userId)
  data.append('tweet', body)
  for (let i = 0; i < images.files.length; i++) {
    data.append('images[]', images.files[i])
  }

  try {
    const conn = await fetch('php/api/api-create-tweet.php', {
      method: 'POST',
      body: data,
    })

    let res = await conn.text()
    console.log(res)
    res = JSON.parse(res)
    res.status = conn.status

    return res

    // TODO show user he has created a tweet
  } catch (error) {
    console.log(error)
  }
}

getAllTweets(4)