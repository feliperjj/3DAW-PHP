const teste = document.getElementById("formIncluir")


function enviarForm() {
        let pnome = document.getElementById("nome");
        let pemail = document.getElementById("email");
        let pmatricula = document.getElementById("matricula");


    let xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            console.log("Chegou resposta" + this.responseText)
            document.getElementById("msg").innerHTML = this.responseText

        }
    }
    xmlHttp.open("GET", "http://localhost/3DAW_2022-02/ex10?nome=" +
        pnome + "&email=" + pemail + "&matricula=" + pmatricula);

    xmlHttp.send();
    console.log("Enviei requisição");


}