const signup = document.querySelector('#signButton');
const fullName = document.querySelector('#fullname');
const institute = document.querySelector('#username');
const dept = document.querySelector('#dept');
const email = document.querySelector('#email');
const password = document.querySelector('#password');

signup.addEventListener('click', verifyInputs);

function verifyInputs(e) {
  e.preventDefault();
    const Fullname = fullName.value.trim();
    const institution = institute.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const department = dept.value.trim();
    var regex = /^[0-9]+$/;
    if(Fullname.match(regex) || Fullname === '') {
      //small.innerText = "Please fill in your full name";
      //small.style.display = `block`;
      setError(fullName, `input valid fullname`);
    } else {
      setSuccess(fullName);
    }

    if(institution === '') {
      //small.innerText = "Please fill in your full name";
      //small.style.display = `block`;
      setError(institute, `enter a valid institute name`);
    } else {
      setSuccess(institute);
    }

    if(emailValue === '') {
      //small.innerText = "Please fill in your full name";
      //small.style.display = `block`;
      setError(email, `enter a valid mail account`);
    } else {
      setSuccess(email);
    }

    if(department === '') {
      //small.innerText = "Please fill in your full name";
      //small.style.display = `block`;
      setError(dept, `input value empty`);
    } else {
      setSuccess(dept);
    }

    if(passwordValue === '') {
      //small.innerText = "Please fill in your full name";
      //small.style.display = `block`;
      setError(password, `enter a valid password`);
    } else {
      setSuccess(password);
    }
}

/* Login */
const login = document.querySelector('#loginButton');
const loginUser = document.querySelector('#userlog');
const loginPass = document.querySelector('#passlog');

login.addEventListener('click', verifyLogin)
function verifyLogin(e) {
  e.preventDefault();
  const firstUser = loginUser.value.trim();
  const firstPass = loginPass.value.trim();

  if(firstUser === '') {
    setError(loginUser, `enter a valid username`);
  } else {
    setSuccess(loginUser);
  }

  if(firstPass === '') {
    setError(loginPass, `incorrect pasword`);
  } else {
    setSuccess(loginPass);
  }
}

// success message function
function setSuccess(input) {
  const formControl = input.parentElement; // form-control
  // adding success class
  //formControl.className = `form-control success`;
  formControl.classList.add("success")
  // document.classList.add(`form-over`);
}

// error message function
function setError(input, message) {
  const formControl = input.parentElement; // form-control
  const small = formControl.querySelector(`small`);

  // adding error message into the small tag
  small.innerText = message;

  // adding error class
  formControl.className = `form-control error`;
}