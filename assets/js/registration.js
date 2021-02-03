const signUpForm = document.getElementById('signUpForm')
signUpForm.addEventListener('submit', signUp)

function signUp(e){
  e.preventDefault();
  let username = document.getElementById("username").value;
  let email = document.getElementById('email').value;
  let password = document.getElementById('password').value;

    const url = `https://plantfoodapi.herokuapp.com/user/register`;  
    const bodyObj = {
      username: username,
      email: email,
      password: password
    }
        
    async function postLogin() {
       
      let response = await fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': "application/json"
        },
        body: JSON.stringify(bodyObj)
      })
       
      response = await response.json()
      if(response.sessionToken){
        localStorage.setItem('token', response.sessionToken)
        window.location.href = "/"
      } else {
        alert(response.error.errors[0].message)
      }
    } 
  
    postLogin()
}