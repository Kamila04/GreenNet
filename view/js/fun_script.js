const detailsDiv = document.getElementById('detailsDiv');
const imgLogo = document.getElementById('perfil_Icono')
const app = {
    detailsDiv : document.querySelector("#detailsDiv"),       
}


imgLogo.addEventListener('click', () => {
    detailsDiv.style.display = detailsDiv.style.display === 'none' ? 'flex' : 'none';
});

window.onclick = event => {
    if(event.target == app.detailsDiv) {
        app.detailsDiv.style.display = "none";
    }
}
window.onload = function() {
    detailsDiv.style.display = "none";
}


