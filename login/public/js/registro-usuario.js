const registrar_usuario = () => {
    let nombre = document.getElementById('nombre').value;
    let password = document.getElementById('password').value;
    let data = new FormData();
    data.append("nombre", nombre);
    data.append("password", password); 
    fetch("app/controller/registro-usuario.php", {
        method: "POST",
        body: data
    }).then(respuesta => respuesta.json())
    .then(async respuesta => {
        if (respuesta[0] == 1) {
            alert(`${respuesta[1]}`)
            window.location = "login.php";
        } else {
            alert(`${respuesta[1]}`)
        }
    });
}

// window.addEventListener('DOMContentLoaded', () => {
//     if (document.getElementById('registrar_usuario')) {
//         document.getElementById('registrar_usuario').addEventListener('click', () => {
//             registrar_usuario();
//         });
//     }
// });
document.getElementById('registrar_usuario').addEventListener('click',() => {
    registrar_usuario();
});