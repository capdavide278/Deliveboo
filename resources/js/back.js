require('./bootstrap');


// const register_form = document.getElementById("register_form");
// if (register_form) {
//     // register_form.onsubmit = function () { return validateRegister() };
//     register_form.addEventListener("submit", validateRegister());
// }


window.validateRegister = function (){
    let name_register = document.getElementById("name").value
    let surname_register = document.getElementById("surname").value
    let phonenumber_register = document.getElementById("phonenumber").value
    let p_iva_register = document.getElementById("p_iva").value
    // let date_of_birth_register = document.getElementById("date_of_birth").value
    let email_address_register = document.getElementById("email").value
    let password_register = document.getElementById("password").value;
    let confirm_password_register = document.getElementById("password_confirm").value;
    // let val_name = document.getElementById('name_fill')
    // let val_surname = document.getElementById('surname_fill')
    let val_mail = document.getElementById('email_fill')
    let val_compila = document.getElementById('compilatutto')
    let val_password = document.getElementById('password_fill')


        if (name_register != '' & surname_register != '' & phonenumber_register != '' & email_address_register != "") {

            if (!email_address_register.includes('@') || !email_address_register.includes('.')) {
                alert('email normale')
            }
           
           
            if (password_register != confirm_password_register) {
                alert('metti la stessa password ')
            }


        }
        else {
            alert('compila tutto')
        }

       
        // if (password_register != confirm_password_register) {
        //     alert("La password confermata è diversa da quella scelta, controllare.");
        //     return false;
        // } 


    // }
    // else {
    //     val_compila.innerHTML = 'compila i campi vuoti';
    //     return false;
    // }
}

 

    