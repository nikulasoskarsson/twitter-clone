const profileTweetContianer = document.getElementById('profile-tweet-container')
const createTweetBtn = document.getElementById('create-tweet')
const createTweetFromModalBtn = document.getElementById(
  'create-tweet-from-modal'
)

async function handleCreateTweet(e) {
  const id = document.getElementById('user-id').getAttribute('data-user-id')
  const tweet = e.target.parentNode.parentNode.querySelectorAll('input')[1]
    .value
  const images = e.target.parentNode.parentNode.querySelectorAll('input')[0]

  const res = await createTweet(id, tweet, images)

  if (res.status === 200) {
    handleDisplayingTweets()
  }
}

async function handleDisplayingTweets() {
  const id = document.getElementById('user-id').getAttribute('data-user-id')
  const tweets = await getAllTweets(id)
  const sortedTweets = tweets.sort((a, b) => b[1] - a[1])
  console.log(sortedTweets)
  const user = await getUser(id)

  displayTweets(sortedTweets, user)
}

function displayTweets(tweets, user) {
  profileTweetContianer.innerHTML = '' //reset
  tweets.forEach(
    (tweet) => (profileTweetContianer.innerHTML += createTweetCard(tweet, user))
  )
}
function displaySingleTweet(tweet, user) {
  profileTweetContianer.innerHTML = createTweetCard(tweet, user)
}
function createTweetCard(tweet, user) {
  return `<div class="tweet-card">
  <div class="tweet-card__grid-container">
      <img class="tweet-card__user-img" src="img/user/${
        user[9] ? user[9] : 'placeholder.jpg'
      }" />
      <div>
          <div class="tweet-card__info">
              <div class="tweet-card__user">
                  <h3 class="tweet-card__user-name">${user[1]} ${user[2]}</h3>
                  <span class="tweet-card__user-handle">@${user[3]}</span>
              </div>
              <span class="tweet-card__tweet-date">${tweet[3]}</span>
          </div>

          <p class="tweet-card__tweet">
              ${tweet[2]}
          </p>
          ${tweet[4].length ? showTweetImages(tweet[4]) : ''}
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
                          <path d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"></path>
                      </g>
                  </svg>
                  <span class="tweet-card-icon-field-nr">224</span>
              </div>

              <div class="tweet-card__icon-field">
                  <svg viewBox="0 0 24 24" class="tweet-card__icon-field-icon">
                      <g>
                          <path d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"></path>
                      </g>
                  </svg>
                  <span class="tweet-card-icon-field-nr">2k</span>
              </div>

              <div class="tweet-card__icon-field">
                  <svg viewBox="0 0 24 24" class="tweet-card__icon-field-icon">
                      <g>
                          <path d="M17.53 7.47l-5-5c-.293-.293-.768-.293-1.06 0l-5 5c-.294.293-.294.768 0 1.06s.767.294 1.06 0l3.72-3.72V15c0 .414.336.75.75.75s.75-.336.75-.75V4.81l3.72 3.72c.146.147.338.22.53.22s.384-.072.53-.22c.293-.293.293-.767 0-1.06z"></path>
                          <path d="M19.708 21.944H4.292C3.028 21.944 2 20.916 2 19.652V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 .437.355.792.792.792h15.416c.437 0 .792-.355.792-.792V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 1.264-1.028 2.292-2.292 2.292z"></path>
                      </g>
                  </svg>
              </div>
          </div>
      </div>
      <div class="dropdown-container">
                <svg viewBox="0 0 24 24" class="tweet-card__dropdown-icon open-dropdown" onclick="openDropDown();">
                    <g>
                        <path d="M20.207 8.147c-.39-.39-1.023-.39-1.414 0L12 14.94 5.207 8.147c-.39-.39-1.023-.39-1.414 0-.39.39-.39 1.023 0 1.414l7.5 7.5c.195.196.45.294.707.294s.512-.098.707-.293l7.5-7.5c.39-.39.39-1.022 0-1.413z"></path>
                    </g>
                </svg>
                <div class="dropdown-primary display-hidden">
                    <ul class="dropdown-primary__list">
                        <li class="dropdown-primary__list-item"  onclick="handleDeleteTweet('${
                          tweet[0]
                        }');">
                            <svg viewBox="0 0 24 24" class="dropdown-primary__icon dropdown-primary__icon-delete"">
                                <g>
                                    <path d=" M20.746 5.236h-3.75V4.25c0-1.24-1.01-2.25-2.25-2.25h-5.5c-1.24 0-2.25 1.01-2.25 2.25v.986h-3.75c-.414 0-.75.336-.75.75s.336.75.75.75h.368l1.583 13.262c.216 1.193 1.31 2.027 2.658 2.027h8.282c1.35 0 2.442-.834 2.664-2.072l1.577-13.217h.368c.414 0 .75-.336.75-.75s-.335-.75-.75-.75zM8.496 4.25c0-.413.337-.75.75-.75h5.5c.413 0 .75.337.75.75v.986h-7V4.25zm8.822 15.48c-.1.55-.664.795-1.18.795H7.854c-.517 0-1.083-.246-1.175-.75L5.126 6.735h13.74L17.32 19.732z"></path>
                                <path d="M10 17.75c.414 0 .75-.336.75-.75v-7c0-.414-.336-.75-.75-.75s-.75.336-.75.75v7c0 .414.336.75.75.75zm4 0c.414 0 .75-.336.75-.75v-7c0-.414-.336-.75-.75-.75s-.75.336-.75.75v7c0 .414.336.75.75.75z"></path>
                                </g>
                            </svg>
                            <a href="#" class="dropdown-primary__link dropdown-primary__link-delete">Delete</a>
                        </li>
                        <li class="dropdown-primary__list-item" onclick="openUpdateTweetModal('${
                          tweet[2]
                        }','${tweet[0]}');">
                            <svg class="dropdown-primary__icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="528.899px" height="528.899px" viewBox="0 0 528.899 528.899" style="enable-background:new 0 0 528.899 528.899;" xml:space="preserve">
                                <g>
                                    <path d="M328.883,89.125l107.59,107.589l-272.34,272.34L56.604,361.465L328.883,89.125z M518.113,63.177l-47.981-47.981   c-18.543-18.543-48.653-18.543-67.259,0l-45.961,45.961l107.59,107.59l53.611-53.611   C532.495,100.753,532.495,77.559,518.113,63.177z M0.3,512.69c-1.958,8.812,5.998,16.708,14.811,14.565l119.891-29.069   L27.473,390.597L0.3,512.69z" />
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                            <a href="#" class="dropdown-primary__link">Update</a>
                        </li>
                        <li class="dropdown-primary__list-item">
                            <svg viewBox="0 0 24 24" class="dropdown-primary__icon">
                                <g>
                                    <path d="M20.472 14.738c-.388-1.808-2.24-3.517-3.908-4.246l-.474-4.307 1.344-2.016c.258-.387.28-.88.062-1.286-.218-.406-.64-.66-1.102-.66H7.54c-.46 0-.884.254-1.1.66-.22.407-.197.9.06 1.284l1.35 2.025-.42 4.3c-1.667.732-3.515 2.44-3.896 4.222-.066.267-.043.672.222 1.01.14.178.46.474 1.06.474h3.858l2.638 6.1c.12.273.39.45.688.45s.57-.177.688-.45l2.638-6.1h3.86c.6 0 .92-.297 1.058-.474.265-.34.288-.745.228-.988zM12 20.11l-1.692-3.912h3.384L12 20.11zm-6.896-5.413c.456-1.166 1.904-2.506 3.265-2.96l.46-.153.566-5.777-1.39-2.082h7.922l-1.39 2.08.637 5.78.456.153c1.355.45 2.796 1.78 3.264 2.96H5.104z"></path>
                                </g>
                            </svg>
                            <a href="#" class="dropdown-primary__link">Pin to your profile</a>
                        </li>
                    </ul>

                </div>
            </div>
  </div>
</div>`
}
function showTweetImages(images) {
  return images.length > 1
    ? showMultipleImages(images)
    : showSingleImage(images)
}
function showSingleImage(img) {
  return `<img onclick="openImageModal('${img}')" src="img/tweets/${img}" alt="" class="tweet-card__img" />`
}
function showMultipleImages(images) {
  const imgContainer = document.createElement('div')
  imgContainer.classList.add('tweet-card__multiple-img-container')

  for (let i = 0; i < 4; i++) {
    // break out of the for loop if there are no more images
    if (i > images.length) {
      break
    }
    if (i === images.length) {
      break
    }
    // add extra container class if you have more then 4 images

    if (i === 3 && images.length > 4) {
      imgContainer.innerHTML += `   <div class="last-image" >
    <div class="last-image__film" onclick="openImageModal('${
      images[i]
    }', '${images}', ${i})">  <p class="last-image__amount">+${
        images.length - i - 1
      }</p></div>
  
  <img src="img/tweets/${
    images[i]
  }" alt="" class="tweet-card__img-mult tweet-card__img-mult-right tweet-card__img-mult-last">
      
</div>`
    } else {
      imgContainer.innerHTML += `<img onclick="openImageModal('${
        images[i]
      }', '${images}', ${i})" src="img/tweets/${
        images[i]
      }" alt="" class='${getTweetImgClassName(images, i)}' />`
    }
  }
  return imgContainer.outerHTML
}
// function that will return a classname for the image depanding on a lot of factors like if its on the left or right
function getTweetImgClassName(images, index) {
  let classes = 'tweet-card__img-mult'
  if (index === 2 && images.length === 3) {
    classes += ' tweet-card__img-mult-full'
  } else if (index === 0 || index === 2) {
    classes += ' tweet-card__img-mult-left'
  } else if (index === 1 || index === 3) {
    classes += ' tweet-card__img-mult-right'
  }
  return classes
}
function openUpdateTweetModal(tweetBody, tweetId) {
  const updateTweetmodalContainer = document.getElementById(
    'update-modal-container'
  )
  const updateTweetModal = document.getElementById('update-tweet-modal')
  updateTweetmodalContainer.classList.remove('display-hidden')
  updateTweetModal.classList.remove('display-hidden')

  updateTweetModal.setAttribute('data-tweet-id', tweetId)

  const newTweetInput = updateTweetModal.getElementsByTagName('input')[1]
  newTweetInput.value = tweetBody
}

async function handleDeleteTweet(tweetId) {
  const userId = document.getElementById('user-id').getAttribute('data-user-id')
  const form = new FormData()
  form.append('userId', userId)
  form.append('tweetId', tweetId)

  const res = await deleteTweet(form)
  if (res.status === 200) {
    handleDisplayingTweets()
  }
}

createTweetBtn.addEventListener('click', (e) => handleCreateTweet(e))
createTweetFromModalBtn.addEventListener('click', (e) => handleCreateTweet(e))

handleDisplayingTweets()
