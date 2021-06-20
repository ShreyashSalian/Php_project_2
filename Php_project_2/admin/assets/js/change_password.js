let old_password = document.getElementById('old_password');
let password = document.getElementById('password');
let confirm_password = document.getElementById('confirm_password');
let submit = document.getElementById('submit');
$('#success').hide();
$('#failure').hide();
let valid_old_password = false;
let valid_password = false;
let valid_confirm_password = false;

old_password.addEventListener('keyup',()=>
{
    let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if(regex.test(old_password.value)){
        old_password.classList.remove('is-invalid');
        old_password.classList.add('is-valid');
        valid_old_password = true;
    }
    else{
        old_password.classList.add('is-invalid');
        valid_old_password = false;
    }
});

password.addEventListener('keyup',()=>
{
    let str = password.value;
    let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if(!str.match(old_password.value) && str !== '' && regex.test(str)){
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
  
    if(valid_old_password == true && valid_password == true && valid_confirm_password == true)
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
