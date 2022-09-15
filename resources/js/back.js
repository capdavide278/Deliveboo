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
