const editar_usuario = () => {
    let usuario = document.getElementById('usuario').value;
    let password = document.getElementById('password').value;

    let data = new FormData();
    data.append("usuario", usuario);
    data.append("password", password);

    fetch("./app/controller/editar-usuario.php", {
        method: "POST",
        body: data
    }).then(respuesta => respuesta.json())
    .then(respuesta => {
        alert(respuesta[1]);
        if (respuesta[0] == 1) {
            alert(`${respuesta[1]}`);
            window.location = "index.php"; // Redirigir al listado después de la actualización
        }
    });
}
document.getElementById('editar_usuario').addEventListener('click',() => {
    editar_usuario();
});