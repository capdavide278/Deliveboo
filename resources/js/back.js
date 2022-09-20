require('./bootstrap');

//cancellazione piatto
const eleOverlay = document.querySelector('.overlay');
if (eleOverlay) {
    const deleteButtons = document.querySelectorAll('.js-delete');
    const formPopup = document.querySelector('.popup');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            eleOverlay.classList.remove('d-none');
        })
    });

    document.querySelector('.js-no').addEventListener('click', function() {
        eleOverlay.classList.add('d-none');
    })
};

    // // validation register
    // window.validateRegister = function(e){
    //     let name_register = document.getElementById("name").value
    //     let surname_register = document.getElementById("surname").value
    //     let phonenumber_register = document.getElementById("phonenumber").value
    //     let p_iva_register = document.getElementById("p_iva").value
    //     // let date_of_birth_register = document.getElementById("date_of_birth").value
    //     let email_address_register = document.getElementById("email").value
    //     let password_register = document.getElementById("password").value;
    //     let confirm_password_register = document.getElementById("password_confirm").value;
    //     let controlloValidazione = document.getElementById("controlloValidazione").value;

    //     if (name_register != '' & surname_register != '' & phonenumber_register != '' & email_address_register != '' & p_iva_register != '' & password_register != '' & confirm_password_register != '') {


    //         if (password_register != confirm_password_register) {
    //             // alert('password diversa');
    //             document.getElementById("controlloValidazione").innerHTML ='Attenzione: La password è diversa';
    //             return false;
    //         }
            
    //         return true;
    //     }
    //     else {
    //         // alert('compila tutti i campi');
    //         
    //     }
        
    //     return true;
    // }


    const form_register = document.getElementById('register_form');
    form_register.addEventListener('submit', function (event) {
        const name_register = document.getElementById("name").value;
        const surname_register = document.getElementById("surname").value;
        const email_address_register = document.getElementById("email").value
        const password_register = document.getElementById("password").value;
        const confirm_password_register = document.getElementById("password_confirm").value;
        if (name_register != '' & surname_register != '' & email_address_register != '') {

            if (!email_address_register.includes('@') || !email_address_register.includes('.')) {
                event.preventDefault();
                document.getElementById("controlloValidazione").innerHTML ='Attenzione: La mail non è valida';
            }

            if (password_register != confirm_password_register) {
                event.preventDefault();
                document.getElementById("controlloValidazione").innerHTML ='Attenzione: La password non è valida';
            }
        
        } else {
            document.getElementById("controlloValidazione").innerHTML ='Attenzione: compila tutti i campi';
        }
        
    })



    // validation creazione ristorante

    window.validateRestaurant = function() {
        let name_restaurant = document.getElementById("name_restaurant").value
        let address = document.getElementById("address").value
        const checkbox = document.querySelectorAll('.checkbox').checked
        if (name_restaurant != '' & address != '') {
            if (!checkbox) {           
                document.getElementById("controlloValidazione").innerHTML = 'Attenzione: metti una categoria'
                return false;
            }

            return false;
        } else {
            document.getElementById("controlloValidazione").innerHTML ='Attenzione: Compila tutti i campi';
        }

        return true;
    }


    // validation piatto
    window.validateDish = function() {
        let name_dish = document.getElementById('name_dish').value;
        let price_dish = document.getElementById('price_dish').value;

        if (name_dish != '' & price_dish != '') {
            if (price_dish > 1) {
               ' ';
            } else if (price_dish.includes('-')) {
                document.getElementById("controlloValidazione").innerHTML ='Attenzione: Il prezzo non può essere negativo';
            }
        } else {
            document.getElementById("controlloValidazione").innerHTML ='Attenzione: Compila tutti i campi';
        }

        return true;
    }


    window.validateEditDish = function() {
        let name_dish = document.getElementById('name_dish').value;
        let price_dish = document.getElementById('price_dish').value;

        if (name_dish != '' & price_dish != '') {
            if (price_dish > 1) {
                '';
            } else if (price_dish.includes('-')) {
                document.getElementById("controlloValidazione").innerHTML ='Attenzione: Il prezzo non può essere negativo';
            }
        } else {
            document.getElementById("controlloValidazione").innerHTML ='Attenzione: Compila tutti i campi';
        }

        return true;
    }

