document.addEventListener('DOMContentLoaded', () => {
    const viewMoreBtn = document.getElementById('viewMoreBtn');
    const popup = document.getElementById('popup');
    const closeBtn = document.querySelector('.popup .close');

    viewMoreBtn.addEventListener('click', () => {
        popup.style.display = 'block';
    });

    closeBtn.addEventListener('click', () => {
        popup.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target === popup) {
            popup.style.display = 'none';
        }
    });
});




