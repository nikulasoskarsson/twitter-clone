async function seedUsers() {
  const conn = await fetch('users.php')
  console.log('conn', conn)
}

seedUsers()
setInterval(seedUsers, 5000)
