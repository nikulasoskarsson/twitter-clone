// const signupFormEl = document.getElementById('signup-form');
const loginFormEl = document.getElementById('login-form');

async function getForm(e) {
  e.preventDefault();
  await login(loginFormEl);
}

async function signup(form) {
  const formData = new FormData(form);

  try {
    const conn = await fetch('php/api/api-signup.php', {
      method: 'post',
      body: formData,
    });
    const res = await conn.text();
    return JSON.stringify(res);
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
    const res = await conn.text();
    return JSON.stringify(res);
  } catch (error) {
    console.log(error);
  }
}
loginFormEl.addEventListener('submit', (e) => getForm(e));
// signupFormEl.addEventListener('submit', (e) => getForm(e));
