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

    //  VALIDATION REGISTER SENZA INVIO DEL FORM
    const form_register = document.getElementById('register_form');
    form_register.addEventListener('submit', function (event) {
        const name_register = document.getElementById("name").value;
        const surname_register = document.getElementById("surname").value;
        const email_address_register = document.getElementById("email").value
        const password_register = document.getElementById("password").value;
        const confirm_password_register = document.getElementById("password_confirm").value;
        const mail_alert = document.getElementById("mail_alert");
        const password_alert = document.getElementById("password_alert")
        const insert_all = document.getElementById("controlloValidazione");
        if (name_register != '' & surname_register != '' & email_address_register != '') {

            if (!email_address_register.includes('@') || !email_address_register.includes('.')) {
                event.preventDefault();
                mail_alert.innerHTML ='Attenzione: La mail non è valida';
            } else {
                mail_alert.classList.add("none");
            }

            if (password_register != confirm_password_register) {
                event.preventDefault();
                password_alert.innerHTML ='Attenzione: La password non è valida';
            } else {
                password_alert.classList.add("none");
            }
            
        } else {
            event.preventDefault();
            insert_all.innerHTML ='Attenzione: compila tutti i campi';
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

