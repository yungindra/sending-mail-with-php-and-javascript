const form = document.getElementById('form');
const title = document.getElementById('title');
const firstName = document.getElementById('firstName');
const lastName = document.getElementById('lastName');
const email = document.getElementById('email');
const message = document.getElementById('message');

// show input error message
function showError(input, message) {
  const formControl = input.parentElement;
  formControl.className = 'form-control error';
  const small = formControl.querySelector('small');
  small.innerText = message;
}

// show success message
function showSuccess(input) {
  const formControl = input.parentElement;
  formControl.className = 'form-control success';
}

// Check email is valid
function checkEmail(input) {
  const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (re.test(input.value.trim())) {
    showSuccess(input);
  } else {
    showError(input, 'Email is not valid');
  }
}

// Check required fields
function checkRequired(inputArr) {
  inputArr.forEach(function (input) {
    if (input.value.trim() === '') {
      showError(input, `${getFieldName(input)} is required`);
    } else {
      showSuccess(input);
    }
  });
}

// Check input length
function checkLength(input, min, max) {
  if (input.value.length < min) {
    showError(input, `${getFieldName(input)} must be at least ${min} characters`);
  } else if (input.value.length > max) {
    showError(input, `${getFieldName(input)} must be less than ${max} characters`);
  } else {
    showSuccess(input);
  }
}

// Get field name
function getFieldName(input) {
  return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

// Function to check if input has value and apply 'has-value' class
function checkInputValue(input) {
  if (input.value.trim() !== '') {
    input.parentElement.classList.add('has-value');
  } else {
    input.parentElement.classList.remove('has-value');
  }
}

// Function to check if form data is valid
function isFormValid() {
  return (
    !title.parentElement.classList.contains('error') &&
    !firstName.parentElement.classList.contains('error') &&
    !lastName.parentElement.classList.contains('error') &&
    !email.parentElement.classList.contains('error') &&
    !message.parentElement.classList.contains('error')
  );
}

// Event listener for form submission
function submitForm(event) {
  event.preventDefault();

  const emailInput = email;
  const firstNameInput = firstName;

  checkRequired([title, firstName, lastName, email, message]);
  checkLength(firstName, 3, 15);
  checkEmail(email);
  checkInputValue(title);
  checkInputValue(firstName);
  checkInputValue(lastName);
  checkInputValue(email);
  checkInputValue(message);

  // Check if the form data is valid before submitting
  if (isFormValid()) {
    const formElement = document.getElementById('form');
    formElement.submit();
  }
}

// Add event listener to the form for form submission
form.addEventListener('submit', submitForm);

// Add event listeners for input fields to validate on the fly and check input value
title.addEventListener('input', () => {
  checkRequired([title]);
  checkInputValue(title);
});
firstName.addEventListener('input', () => {
  checkLength(firstName, 3, 15);
  checkInputValue(firstName);
});
lastName.addEventListener('input', () => {
  checkInputValue(lastName);
});
email.addEventListener('input', () => {
  checkEmail(email);
  checkInputValue(email);
});
message.addEventListener('input', () => {
  checkInputValue(message);
});

// Check input values on page load
window.addEventListener('load', () => {
  checkInputValue(title);
  checkInputValue(firstName);
  checkInputValue(lastName);
  checkInputValue(email);
  checkInputValue(message);
});
