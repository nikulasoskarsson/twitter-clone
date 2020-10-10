const signupFormEl = document.getElementById('signup-form');

async function getForm(e) {
  e.preventDefault();
  await signup(signupFormEl);
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

signupFormEl.addEventListener('submit', (e) => getForm(e));
