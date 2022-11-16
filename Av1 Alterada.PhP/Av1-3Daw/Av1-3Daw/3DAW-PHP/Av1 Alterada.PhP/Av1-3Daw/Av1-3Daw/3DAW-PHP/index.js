

function enviarForm() { //(pNome, pMat, pEmail, pCpf) {
    let pNome = document.getElementById("nome").value;
    let pPeriodo = document.getElementById("periodo").value;
    let pIdPre = document.getElementById("idpre").value;
    let pCredito = document.getElementById("credito").value;
    let xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        console.log("mudou status: " + this.readyState);
        if (this.readyState == 4 && this.status == 200) {
            console.log("Chegou resposta: " + this.responseText)
            document.getElementById("msg").innerHTML = this.responseText;
        }
    }
    xmlHttp.open("POST", "http://localhost/Av1-3Daw/criar.php?nome=" + pNome +
    "&periodo=" + pPeriodo + "&idpre=" + pIdPre+ "&credito" + pCredito);
    xmlHttp.send();
    console.log("Enviei requisição");
}

function enviarFormAlt() { 
    let pNome = document.getElementById("nome").value;
    let pPeriodo = document.getElementById("periodo").value;
    let pIdPre = document.getElementById("idpre").value;
    let pCredito = document.getElementById("credito").value;

    let xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        console.log("mudou status: " + this.readyState);
        if (this.readyState == 4 && this.status == 200) {
            console.log("Chegou resposta: " + this.responseText)
            document.getElementById("msg").innerHTML = this.responseText;
        }
    }
    xmlHttp.open("POST", "http://localhost/Av1-3Daw/alterar.php?nome=" + pNome +
    "&periodo=" + pPeriodo + "&idpre=" + pIdPre+ "&credito" + pCredito);
    xmlHttp.send();
    console.log("Enviei requisição");
}

function carregaAlunos() {
    let xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function() {
            console.log("mudou status: " + this.readyState);
            if (this.readyState == 4 && this.status == 200) {
          
                let obj = JSON.parse(this.responseText);
                let x = 0;
                for (x=0;x<obj.length;x++) {
                    console.log("Posicao do Array " + x + " : " + obj[x].nome);
                    let linha = obj[x];
                    criarLinhaTabela(linha);
                }
                console.log("Posicao do x " + x );
            }
        }
        xmlHttp.open("POST", "http://localhost/Av1-3Daw/ex11_listar.php");
        xmlHttp.send();
}
function criarLinhaTabela(pobjReturnJSON) {
    let tb = document.getElementById("tab");
     let tr = document.createElement("tr"); // cria o elemento tr
    // let td = document.createElement("td"); // cria o element td
    // let textnode = document.createTextNode(pobjReturnJSON.id);
    // td.appendChild(textnode); // adiciona o texto na td criada
    // tr.appendChild(td); // adiciona a td na tr

    let td2 = document.createElement("td"); // cria o element td
    textnode1 = document.createTextNode(pobjReturnJSON.nome);
    td2.appendChild(textnode); // adiciona o texto na td criada
    tr.appendChild(td2); // adiciona a td na tr

    let td5 = document.createElement("td"); // cria o element td
    textnode1 = document.createTextNode(pobjReturnJSON.matricula);
    td5.appendChild(textnode); // adiciona o texto na td criada
    tr.appendChild(td5); // adiciona a td na tr

    let td3 = document.createElement("td"); // cria o element td
    textnode1 = document.createTextNode(pobjReturnJSON.email);
    td3.appendChild(textnode); // adiciona o texto na td criada
    tr.appendChild(td3); // adiciona a td na tr

    let td4 = document.createElement("td"); // cria o element td

    let tagA = document.createElement("a", "href");

let textnode1 = "ex12_alterar.php?mat=" + pobjReturnJSON.matricula;
   
    tagA.setAttribute("href",textnode1);
    textnode1 = document.createTextNode("Alterar");
    tagA.appendChild(textnode);

    td4.appendChild(tagA); // adiciona o texto na td criada
    tr.appendChild(td4); // adiciona a td na tr

    tb.appendChild(tr);

   
}
function buscarDisciplina(nome) {
    let xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        console.log("mudou status: " + this.readyState);
        if (this.readyState == 4 && this.status == 200) {
         
            let obj = JSON.parse(this.responseText);
            document.getElementById("nomeAlt").value = obj.nome;
            document.getElementById("periodoAlt").value = obj.periodo;
            document.getElementById("idpreAlt").value = obj.preAlt;
            document.getElementById("creditoAlt").value = obj.credito;
            let formAlt = document.getElementById("formAlterar");
            formAlt.style.display = "block";
        }
    }
    xmlHttp.open("GET", "http://localhost/Av1-3Daw/listar.php?nome=" + pNome +
    "&periodo=" + pPeriodo + "&idpre=" + pIdPre+ "&credito" + pCredito);
    xmlHttp.send();
}

function excluir(id) {
    const form = new FormData();
    form.append('id', id);

    const url = '"http://localhost/Av1-3Daw/excluir.php';

    Swal.fire({
        title: 'Você tem certeza?',
       
      }).then((result) => {
        if (result.isConfirmed) {
            fetch(url, {
                method:"POST",
                body:form
            }).then(response =>{
                response.json().then(data =>{
                    Swal.fire(data.message);
                    showData();
                })
            }).catch(err => console.log(err))
        }
      })
}
