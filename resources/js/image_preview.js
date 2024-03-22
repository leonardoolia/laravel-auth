// Preview dell'immagine nel form per aggiungere un nuovo progetto

const placeholder = 'https://marcolanci.it/boolean/assets/placeholder.png';
const input = document.getElementById('image');
const preview = document.getElementById('preview');

let blobUrl;

input.addEventListener('input', () => {
    if(Image.fil && Image.file[0]){
        const file = image.file[0];
        const blobUrl = URL.createObjectURL(file);

        preview.src = blobUrl;
    } else{
        preview.src = placeholder;
    }    
})

window.addEventListener('beforeunload', () =>{
    if(blobUrl) URL.revokeObjectURL(blobUrl);
})