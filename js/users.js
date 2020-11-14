const updateUserBtn = document.getElementById('update-user-button')

async function handleUpdateUser() {
    const userId = getUserId()
    const updateUserForm = document.getElementById('update-user-form')
    const formData = new FormData(updateUserForm)
    formData.append('userId', userId)
    const res = updateUser(formData)


}
updateUserBtn.addEventListener('click',handleUpdateUser)