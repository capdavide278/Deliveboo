require('./bootstrap');


const register_form = document.getElementById("register_form");
if (register_form) {
    // register_form.onsubmit = function () { return validateRegister() };
    register_form.addEventListener("submit", validateRegister());
}


function validateRegister() {
    let name_register = document.getElementById("register_name").value
    let surname_register = document.getElementById("register_surname").value
    let phonenumber_register = document.getElementById("register_phonenumber").value
    let p_iva_register = document.getElementById("register_p_iva").value
    let date_of_birth_register = document.getElementById("register_date_of_birth").value
    let email_address_register = document.getElementById("register_email").value
    let password_register = document.getElementById("register_password").value
    let confirm_password_register = document.getElementById("register_password_confirm").value
    // let val_name = document.getElementById('name_fill')
    // let val_surname = document.getElementById('surname_fill')
    // let val_password = document.getElementById('password_fill')


    if  (email_address_register != "" & name_register != "" & surname_register != "" & phonenumber_register != "" & p_iva_register != "" & date_of_birth_register != "") {
        // if (name_register.length > 20) {
        //     val_name.innerHTML = 'hai un massimo di 20 caratteri';
        //     return false;
        // } 
        
        
        
        // if (surname_register.length > 20) {
        //     val_surname.innerHTML = 'hai un massimo di 20 caratteri';
        //     return false;
        // } 

        // if (password != conferma) {
        //     alert("La password confermata è diversa da quella scelta, controllare.");
        //     document.modulo.conferma.value = "";
        //     document.modulo.conferma.focus();
        //     return false;
        //     }
        if (!email_address_register.includes('@') || !email_address_register.includes('.')) {
            alert('email non corretta');
            return false;
        }

        if (password_register != confirm_password_register) {
            alert("La password confermata è diversa da quella scelta, controllare.");
            return false;
        } 


    }
    else {
        alert('compila tutti i campi');
        return false;
    }
    return true;   
}

 

    