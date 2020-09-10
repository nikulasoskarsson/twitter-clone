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
    formfield.addEventListener('keypress', (e) => checkForErrors(e));
  });
}

function checkForErrors(event) {
  const fieldName = event.target.name;

  if (
    fieldName == 'firstname' ||
    fieldName == 'lastname' ||
    fieldName == 'username'
  ) {
    updateCharCount(fieldName, event.target.value.length);
  }
}
function updateCharCount(fieldName, count) {
  const fieldFromDom = signupForm[`${fieldName}`];
  const containerDiv = fieldFromDom.parentNode;
  console.log(containerDiv);
  const charCountDiv = fieldFromDom.parentNode.lastChild.previousElementSibling; // Div containting the error msg

  const charCountSpan = charCountDiv.lastChild.previousElementSibling; // Span containting the dynamic counter
  charCountSpan.innerText = count;
  charCountDiv.classList.add(count < 50 ? 'success' : 'fail');
  if (count < 5) {
    charCountDiv.classList.add('fail');
    charCountDiv.classList.remove('success');
    containerDiv.classList.add('border-fail');

    containerDiv.classList.remove('border-nutural');
    containerDiv.classList.remove('border-success');
  } else if (count > 5 && count < 50) {
    charCountDiv.classList.add('success');
    charCountDiv.classList.remove('fail');
    containerDiv.classList.add('border-success');

    containerDiv.classList.remove('border-nutural');
    containerDiv.classList.remove('border-fail');
  } else {
    charCountDiv.classList.add('fail');
    charCountDiv.classList.remove('success');
    containerDiv.classList.add('border-fail');

    containerDiv.classList.remove('border-nutural');
    containerDiv.classList.remove('border-success');
  }
}

function checkLength(input, min, max) {}

function showError(input, errorMsg) {}

getAllFormFields();
