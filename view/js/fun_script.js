const detailsDiv = document.getElementById('detailsDiv');
const imgLogo = document.getElementById('perfil_Icono');
const EditDiv = document.getElementById('EditDiv');
const EditButton = document.getElementById('Edit_Button');
const CancelarButton = document.getElementById('CancelarButton_Edit');
const Sombreado = document.getElementById('Sombreado');

const app = {

    userId : "",
    keyWord : "",

    openEdit : function(postId){
        let html = ""
        const listaCom = $("#comments" + postId)
        $("#loading" + postId).toggleClass("d-none", false)
        fetch(this.urlComments + "?postId=" + postId)
            .then(resp => resp.json())
            .then( comments => {
                for( let c of comments) {
                    html += 
                    `
                        <li class="list-group-item">
                            De:<b>${c.email}</b><br>
                            ${ c.body}
                        </li>
                    
                    `
                }
                listaCom.html(html)
                $("#card-con" + postId).toggleClass("d-none",false)
                $("#btn-ver-com" + postId).toggleClass("d-none",true)
                $("#btn-cer-com" + postId).toggleClass("d-none",false)
            })
            .catch( err => console.error("Hubo un error en los comentarios xd" , err))
            .finally(  () => {
                $("#loading" + postId).toggleClass("d-none", true)
            })
    },
    closeComment : function(postId) {
        $("#comments" + postId).html("")
        $("#card-con" + postId).toggleClass("d-none",true)
        $("#loading" + postId).toggleClass("d-none", true)
        $("#btn-ver-com" + postId).toggleClass("d-none",false)
        $("#btn-cer-com" + postId).toggleClass("d-none",true)
    },
    searchByWord : function() {
        $("#up"+this.userId).removeClass('active')
        this.userId = ""
        this.keyWord = $("#buscar").val()
        this.loadPosts()
    }

}


imgLogo.addEventListener('click', () => {
    detailsDiv.style.display = detailsDiv.style.display === 'none' ? 'flex' : 'none';
});
EditButton.addEventListener('click', () => {
    EditDiv.style.display = EditDiv.style.display === 'none' ? 'flex' : 'none';
    Sombreado.style.display = 'flex';
    document.body.style.overflow = 'hidden'
});
CancelarButton.addEventListener('click', () => {
    EditDiv.style.display = 'none';
    Sombreado.style.display = 'none';
    document.body.style.overflow = ''
});




window.onclick = event => {
    if(event.target == app.detailsDiv) {
        app.detailsDiv.style.display = "none";
    }
}
window.onload = function() {
    detailsDiv.style.display = "none";
    EditDiv.style.display = "none";
    Sombreado.style.display = "none";
}


