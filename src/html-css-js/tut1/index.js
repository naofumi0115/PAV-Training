// javascript

function scrollToTop() {
    window.scrollTo({top: 0, behavior: 'smooth'}); 
}

function toggleScrollButton() {
    const lastPosition = window.scrollY;
    const scrollBtn = document.getElementById('scroll');
    
    if (lastPosition !== 0) {
        scrollBtn.setAttribute('style', 'display: block;');
    } else {
        scrollBtn.setAttribute('style', 'display: none;');
    }
}

window.addEventListener('scroll', function() {
   
    toggleScrollButton();
});

window.addEventListener('load', () => {
    toggleScrollButton();
});

