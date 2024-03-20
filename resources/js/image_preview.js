// Preview dell'immagine nel form per aggiungere un nuovo progetto

const placeholder = 'https://marcolanci.it/boolean/assets/placeholder.png';
const input = document.getElementById('image');
const preview = document.getElementById('preview');

input.addEventListener('input', () => {
    preview.src = input.value ? input.value : placeholder;
})