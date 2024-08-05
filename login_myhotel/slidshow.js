let slideIndex = 0;

function showSlides() {
    let slides = document.getElementsByClassName("slide");
    let dots = document.getElementsByClassName("dot");

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    for (let j = 0; j < dots.length; j++) {
        dots[j].className = dots[j].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";

    setTimeout(showSlides, 3000); // Change image every 3 seconds
}

showSlides();

// Add event listeners to dots
document.querySelectorAll('.dot').forEach((dot, index) => {
    dot.addEventListener('click', () => {
        clearTimeout();
        slideIndex = index;
        showSlides();
    });
});