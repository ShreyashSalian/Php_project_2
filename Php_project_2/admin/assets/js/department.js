
let department_name = document.getElementById('department_name');
let manager = document.getElementById('manager');
let department_des = document.getElementById('department_des');
let submit = document.getElementById('submit');
let valid_department_name = false;
let valid_manager = false;
let valid_department_des = false;

$('#failure').hide();

department_name.addEventListener('blur',()=>{
    let regex = /^([A-Za-z])/;
    department_name_value = department_name.value;
    if(regex.test(department_name_value)){
        department_name.classList.remove('is-invalid');
        department_name.classList.add('is-valid');
        valid_department_name = true;
    }
    else{
        department_name.classList.add('is-invalid');
        valid_department_name = false;
    }
});
manager.addEventListener('blur',()=>{
    let regex = /^([A-Za-z])/;
    manager_value = manager.value;
    if(regex.test(manager_value)){
        manager.classList.remove('is-invalid');
        manager.classList.add('is-valid');
        valid_manager = true;
    }
    else{
        manager.classList.add('is-invalid');
        valid_manager = false;
    }
});
department_des.addEventListener('blur',()=>{
    let regex = /^([A-Za-z])/;
    department_des_value = department_des.value;
    if(regex.test(department_des_value)){
        department_des.classList.remove('is-invalid');
        department_des.classList.add('is-valid');
        valid_department_des = true;
    }
    else{
        department_des.classList.add('is-invalid');
        valid_department_des = false;
    }
});

submit.addEventListener('click',(e)=>{
   
    if(valid_department_name == true && valid_manager == true && valid_department_des == true){
        //success.classList.add('show');   
        // $('#failure').alert('close');  
        $('#failure').hide(); 
    }
    else{
        failure.classList.add('show');   
        //success.classList.remove('show');
        // $('#success').alert('close');
        $('#failure').show(); 
        e.preventDefault();
           
    }
})