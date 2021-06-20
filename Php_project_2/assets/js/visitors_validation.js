let first_name = document.getElementById('first_name');
let last_name = document.getElementById('last_name');
let email = document.getElementById('email');

let password = document.getElementById('password');
let confirm_password = document.getElementById('confirm_password');
let contact_number = document.getElementById('contact_number');
let submit = document.getElementById('submit');
$('#success').hide();
$('#failure').hide();
let valid_first_name = false;
let valid_last_name = false;
let valid_email = false;
let valid_password = false;
let valid_confirm_password = false;
let valid_contact_number = false;

first_name.addEventListener('keyup',()=>
{
    let regex = /^[a-zA-Z]{2,}$/;
    if(regex.test(first_name.value)){
        first_name.classList.remove('is-invalid');
        first_name.classList.add('is-valid');
        valid_first_name = true;
    }
    else{
        first_name.classList.add('is-invalid');
        valid_first_name = false;
    }
});
last_name.addEventListener('keyup',()=>
{
    let regex = /^[a-zA-Z]{2,}$/;
    if(regex.test(last_name.value)){
        last_name.classList.remove('is-invalid');
        last_name.classList.add('is-valid');
        valid_last_name = true;
    }
    else{
        last_name.classList.add('is-invalid');
        valid_last_name = false;
    }
});

email.addEventListener('keyup',()=>
{
    let regex = /^([_a-zA-Z0-9\-\.]+)@([_a-zA-Z0-9\-\.]+)\.([a-zA-Z]){2,7}$/;

    if(regex.test(email.value)){
        email.classList.remove('is-invalid');
        email.classList.add('is-valid');
        valid_email = true;
    }
    else{
        email.classList.add('is-invalid');
        valid_email = false;
    }
})

contact_number.addEventListener('keyup',()=>
{
    let regex = /^\d{10}$/;
    if(regex.test(contact_number.value)){
        contact_number.classList.remove('is-invalid');
        contact_number.classList.add('is-valid');
        valid_contact_number = true;
    }
    else{
        contact_number.classList.add('is-invalid');
        valid_contact_number = false;
    }
})
password.addEventListener('keyup',()=>
{
    let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    password_value = password.value;
    if(regex.test(password_value)){
        password.classList.remove('is-invalid');
        password.classList.add('is-valid');
        valid_password = true;
    }
    else{
        password.classList.add('is-invalid');
        valid_password = false;
    }
});
confirm_password.addEventListener('keyup',()=>
{
    let str = confirm_password.value;
    let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if(str.match(password.value) && str !== '' && regex.test(str)){
        confirm_password.classList.remove('is-invalid');
        confirm_password.classList.add('is-valid');
        valid_confirm_password = true;
    }
    else{
        confirm_password.classList.add('is-invalid');
        valid_confirm_password = false;
    }
});


submit.addEventListener('click',(e)=>{
  
    if(valid_first_name == true && valid_last_name == true && valid_email == true && valid_password == true && valid_confirm_password == true && valid_contact_number == true)
    {
        success.classList.add('show');   
        // $('#failure').alert('close');  
        $('#failure').hide(); 
        $('#success').show();      
    }
    else{
        e.preventDefault();
        failure.classList.add('show');   
        //success.classList.remove('show');
        // $('#success').alert('close');
        $('#success').hide();
        $('#failure').show(); 
    }
});
