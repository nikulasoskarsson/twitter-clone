async function signup(form) {
  const formData = new FormData(form);

  try {
    const conn = await fetch('php/api/api-signup.php', {
      method: 'post',
      body: formData,
    });

    let res = await conn.text();
    res = JSON.parse(res);
    res.status = conn.status;
    return res;
  } catch (error) {
    console.log(error);
  }
}
async function login(form) {
  const formData = new FormData(form);
  try {
    const conn = await fetch('php/api/api-login.php', {
      method: 'post',
      body: formData,
    });

    let res = await conn.text();
    res = JSON.parse(res);
    res.status = conn.status;
    return res;
  } catch (error) {
    console.log(error);
  }
}

async function createTweet(userId, body, images) {
  const data = new FormData();
  data.append('userId', userId);
  data.append('tweet', body);
  data.append('tweetImages', images.files);

  try {
    const conn = await fetch('php/api/api-create-tweet.php', {
      method: 'POST',
      body: data,
    });

    let res = await conn.text();
    console.log(res);
    res = JSON.parse(res);
    res.status = conn.status;

    return res;

    // TODO show user he has created a tweet
  } catch (error) {
    console.log(error);
  }
}
