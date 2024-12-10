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
    selectedStars = stars; // Armazena a avaliação em 'selectedStars'
}

function like() {
    if (selectedStars > 0) {
        // Preenche o campo oculto com o número de estrelas selecionadas
        document.getElementById('stars').value = selectedStars;
        
        // Envia o formulário
        document.getElementById('ratingForm').submit();
    } else {
        alert('Por favor, selecione uma avaliação!');
    }
}
