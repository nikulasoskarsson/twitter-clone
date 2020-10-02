async function signup() {
  const form = event.target;

  const conn = await fetch('php/api/api-signup.php', {
    method: 'POST',
    body: new FormData(form),
  });

  const res = await conn.text();
}
