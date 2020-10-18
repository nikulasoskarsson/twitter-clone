const loginFormEl = document.getElementById('login-form')
const signupFormEl = document.getElementById('signup-form')

async function handleLogin(e) {
  e.preventDefault()

  const res = await login(loginFormEl)

  if (res.status === 200) {
    console.log('everything is good')
    document.location.href = 'index.php'
  }
}

async function handleSignup(e) {
  e.preventDefault()

  const res = await signup(signupFormEl)
  if (res.status === 200) {
    document.location.href = 'index.php'
  }
}

loginFormEl.addEventListener('submit', (e) => handleLogin(e))
signupFormEl.addEventListener('submit', (e) => handleSignup(e))
