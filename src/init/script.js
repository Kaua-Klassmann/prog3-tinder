let selectedStars = 0;

function rate(stars) {
    const starElements = document.querySelectorAll('.star');
    starElements.forEach((starElement, index) => {
        if (index < stars) {
            starElement.classList.add('selected');
        } else {
            starElement.classList.remove('selected');
        }
    });
    selectedStars = stars;
}

function like() {
    if (selectedStars > 0) {
        document.getElementById('stars').value = selectedStars;

        document.getElementById('ratingForm').submit();
    } else {
        alert('Por favor, selecione uma avaliação!');
    }
}
