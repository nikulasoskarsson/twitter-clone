const signupForm = document.getElementById('signup-form');
const loginForm = document.getElementById('login-form');

function init() {
  const allFormFields = getAllFormFields();
  addFormListeners(allFormFields);
}

function getAllFormFields() {
  // Username fields
  const firstname = signupForm['firstname'];
  const lastname = signupForm['lastname'];
  const username = signupForm['username'];
  const email = signupForm['email'];
  const password = signupForm['password'];

  // Date of birth fields
  const month = signupForm['month'];
  const year = signupForm['year'];
  const day = signupForm['day'];

  return [firstname, lastname, username, email, password, month, year, day];
}

function addFormListeners(formFields) {
  formFields.forEach((formfield) => {
    if (
      formfield.name == 'firstname' ||
      formfield.name == 'lastname' ||
      formfield.name == 'username'
    ) {
      formfield.addEventListener('keyup', (e) =>
        updateCharCount(e.target.name, e.target.value.length, 50)
      );
    } else if (formfield.name == 'password') {
      formfield.addEventListener('keyup', (e) =>
        updateCharCount(e.target.name, e.target.value.length, 20)
      );
    } else if (formfield.name == 'email') {
      formfield.addEventListener('blur', (e) => checkEmail(e));
    } else {
      formfield.addEventListener('focus', (e) => showDateSuccess(e));
      formfield.addEventListener('blur', (e) => checkDate(e));
    }
  });
}

function updateCharCount(fieldName, count, limit) {
  const fieldFromDom = signupForm[`${fieldName}`];
  const containerDiv = fieldFromDom.parentNode;
  const charCountDiv = fieldFromDom.parentNode.lastChild.previousElementSibling; // Div containting the error msg
  const charCountSpan = charCountDiv.lastChild.previousElementSibling; // Span containting the dynamic counter

  charCountSpan.innerText = count;
  charCountDiv.classList.add(count < limit ? 'success' : 'fail');

  if (count < 5) {
    showErrorCharCount(charCountDiv, containerDiv);
  } else if (count > 5 && count < limit) {
    showSuccessCharCount(charCountDiv, containerDiv);
  } else {
    showErrorCharCount(charCountDiv, containerDiv);
  }
}

function showErrorCharCount(charCountDiv, containerDiv) {
  charCountDiv.classList.add('fail');
  charCountDiv.classList.remove('success');
  containerDiv.classList.add('border-fail');

  containerDiv.classList.remove('border-neaturual');
  containerDiv.classList.remove('border-success');
}
function showSuccessCharCount(charCountDiv, containerDiv) {
  charCountDiv.classList.add('success');
  charCountDiv.classList.remove('fail');
  containerDiv.classList.add('border-success');

  containerDiv.classList.remove('border-neaturual');
  containerDiv.classList.remove('border-fail');
}

function showErrorBorder(containerDiv) {
  containerDiv.classList.add('border-fail');
  containerDiv.classList.remove('border-success');
  containerDiv.classList.remove('border-neaturual');
}
function showSuccesBorder(containerDiv) {
  containerDiv.classList.add('border-success');
  containerDiv.classList.remove('border-neaturual');
  containerDiv.classList.remove('border-fail');
}
function showNeaturalBorder(containerDiv) {
  containerDiv.classList.add('border-neaturual');
  containerDiv.classList.remove('border-success');
  containerDiv.classList.remove('border-fail');
}

function checkEmail(e) {
  const email = e.target.value;

  const containerDiv = e.target.parentNode;

  if (!validateEmailRegex(email)) {
    showErrorBorder(containerDiv);
  } else {
    showSuccesBorder(containerDiv);
  }
}

function validateEmailRegex(email) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

function checkDate(e) {
  const containerDiv = e.target.parentNode;
  if (!e.target.value) {
    showErrorBorder(containerDiv);
  } else {
    showSuccessBorder(containerDiv);
  }
}

function showDateSuccess(e) {
  const containerDiv = e.target.parentNode;
  // Initially show a succes stage when a user is selecting an option
  showSuccessBorder(containerDiv);
}

function checkLength(input, min, max) {}

function showError(input, errorMsg) {}

getAllFormFields();

function handleSubmit(e) {
  const errors = [];
  const username = loginForm['username'];
  const password = loginForm['password'];

  // Check the fields
  if (!username.value.length) {
    errors.push({ field: username, msg: 'Username cannot be empty' });
  } else if (username.value.length < 5) {
    errors.push({
      field: username,
      msg: 'Username cannot be less then 5 characters',
    });
  } else if (username.value.length > 50) {
    errors.push({
      field: username,
      msg: 'Username cannot be more then 50 characters',
    });
  }
  if (!password.value.length) {
    errors.push({ field: password, msg: 'Password cannot be empty' });
  } else if (password.value.length < 6) {
    errors.push({
      field: password,
      msg: 'Password cannot be more then 6 characters',
    });
  } else if (password.value.length > 20) {
    errors.push({
      field: password,
      msg: 'Password cannot be more then 20 characters',
    });
  }

  // Add errors to the dom if there are any
  if (errors.length) {
    e.preventDefault();
    showErrors(errors);
  }
  // Submit the form if it is error free
  else {
  }
}

function showErrors(errors) {
  errors.forEach((error) => {
    const errorField = error.field.nextElementSibling;
    const containerDiv = error.field.parentNode;
    showErrorBorder(containerDiv);
    console.log(error);
    errorField.innerText = error.msg;
    errorField.classList.remove('display-hidden');
  });
}
function clearLoginErrors(e) {
  const errorField = e.target.nextElementSibling;
  const containerDiv = e.target.parentNode;

  errorField.innerText = '';
  errorField.classList.add('display-hidden');
  showNeaturalBorder(containerDiv);
}

loginForm.addEventListener('submit', (e) => handleSubmit(e));
loginForm['username'].addEventListener('focus', (e) => clearLoginErrors(e));
loginForm['password'].addEventListener('focus', (e) => clearLoginErrors(e));

init();
