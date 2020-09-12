const signupForm = document.getElementById('signup-form');

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

  const allFormFields = [
    firstname,
    lastname,
    username,
    email,
    password,
    month,
    year,
    day,
  ];

  addFormListeners(allFormFields);
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

  containerDiv.classList.remove('border-nutural');
  containerDiv.classList.remove('border-success');
}
function showSuccessCharCount(charCountDiv, containerDiv) {
  charCountDiv.classList.add('success');
  charCountDiv.classList.remove('fail');
  containerDiv.classList.add('border-success');

  containerDiv.classList.remove('border-nutural');
  containerDiv.classList.remove('border-fail');
}

function showErrorBorder(containerDiv) {
  containerDiv.classList.add('border-fail');
  containerDiv.classList.remove('border-success');
  containerDiv.classList.remove('border-nutural');
}
function showSuccesBorder(containerDiv) {
  containerDiv.classList.add('border-success');
  containerDiv.classList.remove('border-nutural');
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
