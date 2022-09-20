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
    if (form_register) {
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
    }
    




    // validation creazione ristorante

    const form_rest = document.getElementById('rest_form');
    if (form_rest) {
        form_rest.addEventListener('submit', function (event) { 
        
            const name_restaurant = document.getElementById("name_restaurant").value
            const address = document.getElementById("address").value
            const checkbox = document.querySelectorAll('.checkbox')
            console.log(typeof(checkbox));
            const category_alert = document.getElementById('category_alert')
           
            if (name_restaurant != '' & address != '') {
                for (let index = 0; index < 9 ; index++) {
                    if (!checkbox.index.checked) {  
                        event.preventDefault();   
                        category_alert.innerHTML = 'Attenzione: metti una categoria'
                    } else {
                        category_alert.classList.add('.none')
                    }
                    
                }
                return true
            } else {
                event.preventDefault();
                document.getElementById("controlloValidazione").innerHTML ='Attenzione: Compila tutti i campi';
            }
        })
    }
    







    // // validation piatto
    const form_dish = document.getElementById('dish_form');
    if (form_dish) {
        form_dish.addEventListener('submit', function (event) { 
            const name_dish = document.getElementById('name_dish').value;
            const price_dish = document.getElementById('price_dish').value;
            const price_alert = document.getElementById('price_alert')

            if (name_dish != '' & price_dish != '') {
                        if (price_dish > 1) {
                           ' ';
                        } else if (price_dish.includes('-')) {
                            event.preventDefault();
                            price_alert.innerHTML ='Attenzione: Il prezzo non può essere negativo';
                        }
            } else {
                event.preventDefault();
                document.getElementById("controlloValidazione").innerHTML ='Attenzione: Compila tutti i campi';
            }


        })


    }

    // VALIDATION PAGINA EDIT PIATTI
    const form_edit_dish = document.getElementById('dish_edit_form')
    if (form_edit_dish) {
        form_edit_dish.addEventListener('submit', function (event) { 
            const name_dish = document.getElementById('name_dish').value;
            const price_dish = document.getElementById('price_dish').value;
            const price_alert = document.getElementById('price_alert')
            if (name_dish != '' & price_dish != '') {
                if (price_dish > 1) {
                ' ';
                } else if (price_dish.includes('-')) {
                    event.preventDefault();
                    price_alert.innerHTML ='Attenzione: Il prezzo non può essere negativo';
                }
            } else {
            event.preventDefault();
            document.getElementById("controlloValidazione").innerHTML ='Attenzione: Compila tutti i campi';
            }
        })
    }

