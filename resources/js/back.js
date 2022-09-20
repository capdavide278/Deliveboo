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

    // validation register
    window.validateRegister = function(){
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
        // let val_mail = document.getElementById('email_fill')
        // let val_compila = document.getElementById('compila_tutto')
        // let val_password = document.getElementById('password_fill')
        let controlloValidazione = document.getElementById("controlloValidazione").value;

        if (name_register != '' & surname_register != '' & phonenumber_register != '' & email_address_register != '' & p_iva_register != '') {

            if (!email_address_register.includes('@') || !email_address_register.includes('.')) {
                // alert('mail non valida');
                document.getElementById("controlloValidazione").innerHTML ='Attenzione: La mail non è valida';
            }

            if (password_register != confirm_password_register) {
                // alert('password diversa');
                document.getElementById("controlloValidazione").innerHTML ='Attenzione: La password è diversa';

            }

        }
        else {
            // alert('compila tutti i campi');
            document.getElementById("controlloValidazione").innerHTML ='Attenzione: Compila tutti i campi';

        }

        return true;
    }



    // validation creazione ristorante

    window.validateRestaurant = function() {
        let name_restaurant = document.getElementById("name_restaurant").value
        let address = document.getElementById("address").value
        let my_categories = document.getElementById('category')
        let my_category;
        let compila = document.getElementById('compila')

        if (name_restaurant != '' & address != '') {
            ''
        } else {
            document.getElementById("controlloValidazione").innerHTML ='Attenzione: Compila tutti i campi';
        }

        // my_categories.forEach(category => {
        //     if (category.checked) {
        //         my_category = true;
        //         alert('pep')
        //     } else {
        //         alert('metti categoria')
        //     }
        // });



        return true;
    }



    // // categorie
    // let checkboxvalue = document.querySelectorAll('.remove-input');
    // let checkboxlength = checkboxvalue.length;

    // checkboxvalue.forEach(checkbox => {
    //     checkbox.addEventListener('click', function(){
    //         checkboxvalue.forEach(checkbox => {
    //             checkbox.removeAttribute('required');

    //         });
    //         checkbox.classList.toggle('remove-input');
    //         checkboxvalue = document.querySelectorAll('.remove-input');

    //         if (checkboxvalue.length == checkboxlength) {
    //             checkboxvalue.forEach(checkbox => {
    //                 checkbox.setAttribute('required', '');
    //             });
    //         }

    //     });
    // });


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

