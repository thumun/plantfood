const loginForm = document.getElementById('loginForm')
loginForm.addEventListener('submit', login)

function login(e){
  e.preventDefault();
  let email = document.getElementById('email').value;
  let password = document.getElementById('password').value;

    const url = `https://plantfoodapi.herokuapp.com/user/login`;  
    const bodyObj = {
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
        alert(response.error)
      }
    } 
  
    postLogin()
}