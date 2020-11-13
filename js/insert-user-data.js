// Take the user image from the db an insert into every img field with the class of user-img
function insertUserImg(user) {
  const userImgElements = document.querySelectorAll('.user-img')
  userImgElements.forEach(
    (userImgElement) =>
      (userImgElement.src = `img/user/${user[9] ? user[9] : 'placeholder.jpg'}`)
  )
}

function insertBackroundImg(user) {

  const backgroundImgElements = document.querySelectorAll('.user-bg')
  backgroundImgElements.forEach((backgroundImgElement) => {
    backgroundImgElement.src = user[13]
      ? `img/background/${user[13]}`
      : 'img/background/placeholder.jpg'
  })
}

// Take the full name of the user from the db an insert into every field with the class user-name
function insertUserName(user) {
  const userNameElements = document.querySelectorAll('.user-name')
  userNameElements.forEach(
    (userNameElement) => (userNameElement.innerText = user[1] + ' ' + user[2])
  )
}

function insertUserHandle(user) {
  const userHandleElements = document.querySelectorAll('.user-handle')
  userHandleElements.forEach(
    (userHandleElement) => (userHandleElement.innerText += '@' + user[3])
  )
}

function insertUserJoinDate(user) {
  const joinDate = new Date(user[8] * 1000)
  const monthString = getMonthAsString(joinDate.getMonth())
  const year = joinDate.getFullYear()

  const userJoinDateElements = document.querySelectorAll('.user-join-date')
  userJoinDateElements.forEach(
    (userJoinDateElement) =>
      (userJoinDateElement.innerText = `Joined ${monthString} ${year}`)
  )
}

function insertNumberOfTweets(user) {
  const userTweetsNrElements = document.querySelectorAll('.user-tweets-nr')
  userTweetsNrElements.forEach(
    (userTweetsNrElement) => (userTweetsNrElement.innerText += `5 Tweets`)
  )
}

function insertUserWebsite(user) {
  const userWebsiteElements = document.querySelectorAll('.user-website')
  if(user[12]){
    userWebsiteElements.forEach((userWebsiteElement) => {
      userWebsiteElement.href = `http://www.${user[12]}`
      userWebsiteElement.innerText = user[12]
    })
  }
  else{
    document.getElementById('profile-website-container').style.display ='none'
  }
  
 
}
function inserUserLocation(user) {
  console.log(user[11])
  const userLocationElements = document.querySelectorAll('.user-location')
  if(user[11]){
    userLocationElements.forEach(
      (userLocationElement) => (userLocationElement.innerText += user[11])
    )
  }
 else{
     document.getElementById('user-location-container').style.display ='none'
  }
}
function insertUserBio(user) {
  if(user[10]){
    const userBioElements = document.querySelectorAll('.user-bio')
    userBioElements.forEach(
      (userBioElement) => (userBioElement.innerText += user[10])
    )
  }

}

// Get the user data and pass it into the other functions to load the user data into the dom
async function init() {
  const id = document.getElementById('user-id').getAttribute('data-user-id')
  const user = await getUser(id)
  console.log(user)

  insertUserImg(user)
  insertBackroundImg(user)
  insertUserName(user)
  insertUserHandle(user)
  insertNumberOfTweets(user)
  insertUserJoinDate(user)
  insertUserWebsite(user)
  inserUserLocation(user)
  insertUserBio(user)
}

init()
