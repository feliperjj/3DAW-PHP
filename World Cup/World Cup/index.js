// referente ao incluir
function enviarForm1() {   
  let nome = document.getElementById("nome").value;
  let grupo = document.getElementById("grupo").value;
  let tecnico = document.getElementById("tecnico").value;
  let xmlHttp = new XMLHttpRequest();

  xmlHttp.open("GET", "http://localhost/3DAW2022/12/CadastroSeleção?nome=" + nome +
      "&grupo=" + grupo + "&tecnico=" + tecnico);
  xmlHttp.send();

  location.reload();
}

// REFERENTE AO ALTERAR
        function enviarForm2() {
            let nome = document.getElementById("nome").value;
            let nomeAlt = document.getElementById("nomeAlt").value;
            let tecnico = document.getElementById("tecnicoAlt").value;
            let grupo = document.getElementById("grupoAlt").value;
            let pontos = document.getElementById("pontoAlt").value;

            let xmlHttp = new XMLHttpRequest();
            xmlHttp.open("GET", "http://localhost/3DAW2022/12/alteraSelecao.php?nome=" + nome + "&nomeAlt=" + nomeAlt + "&tecnico=" + tecnico
                + "&grupo=" + grupo + "&pontos=" + pontos);
            xmlHttp.send();

            location.reload();
        }
// REFERENTE AO ALTERAR
        function buscarSelecao() {
            let nome = document.getElementById("nome").value;
            let xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function () {
                console.log("mudou status: " + this.readyState);
                if (this.readyState == 4 && this.status == 200) {
                    let obj = JSON.parse(this.responseText);

                    document.getElementById("nomeAlt").value = obj.nome;
                    document.getElementById("tecnicoAlt").value = obj.tecnico;
                    document.getElementById("grupoAlt").value = obj.grupo;
                    document.getElementById("pontoAlt").value = obj.pontos;

                    let formAlt = document.getElementById("formAlterar");
                    formAlt.style.display = "block";
                }
            }

            xmlHttp.open("GET", "http://localhost/3DAW2022/12/buscarSelecao.php?nome=" + nome);
            xmlHttp.send();

        }
        // REFERENTE AO Cadastrar O confronto
        function enviarForm3() {
          let selecaoA = document.getElementById("selecaoA").value;
          let selecaoB = document.getElementById("selecaoB").value;
          let golsA = document.getElementById("golsA").value;
          let golsB = document.getElementById("golsB").value;
          let local = document.getElementById("local").value;
          let data = document.getElementById("data").value;
          let hora = document.getElementById("hora").value;
          
          let xmlHttp = new XMLHttpRequest();
          xmlHttp.open("GET", "http://localhost/3DAW2022/12/cadastroJogo.php?data=" + data +
              "&hora=" + hora + "&local=" + local + "&selecaoA=" + selecaoA + "&selecaoB=" + selecaoB + "&golsA=" + golsA + "&golsB=" + golsB);
          xmlHttp.send();
          console.log(xmlHttp.responseText);
          location.reload();
      }

      // Exibir o Calendário
      function carregaJogo() {

        let grupo = document.getElementById("grupo").value;
        let xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                let obj = JSON.parse(this.responseText);
                let x = 0;

                let valor = (obj[x].local).localeCompare("undefined");
                if (valor != 0) {
                    for (x = 0; x < obj.length; x++) {
                        let linha = obj[x];
                        criarLinhaTabela(linha);
                    }
                }
            }
        }
        xmlHttp.open("GET", "http://localhost/3DAW2022/12/calendarioGrupo.php?grupo=" + grupo);
        xmlHttp.send();

    }

    function criarLinhaTabela(linha) {
        let tabela = document.getElementById("tabela");
        let tr = document.createElement("tr");

        //Coluna data
        let tdData = document.createElement("td");
        textnode = document.createTextNode(linha.data);
        tdData.appendChild(textnode);
        tr.appendChild(tdData);

        //Coluna hora
        let tdHora = document.createElement("td");
        textnode = document.createTextNode(linha.hora);
        tdHora.appendChild(textnode);
        tr.appendChild(tdHora);

        //Coluna Local
        let tdLocal = document.createElement("td");
        textnode = document.createTextNode(linha.local);
        tdLocal.appendChild(textnode);
        tr.appendChild(tdLocal);

        //Coluna SelecaoA
        let tdSelA = document.createElement("td");
        textnode = document.createTextNode(linha.selecaoA);
        tdSelA.appendChild(textnode);
        tr.appendChild(tdSelA);

        //Coluna golsA
        let tdGolA = document.createElement("td");
        textnode = document.createTextNode(linha.golsA);
        tdGolA.appendChild(textnode);
        tr.appendChild(tdGolA);

        //Coluna SelecaoB
        let tdSelB = document.createElement("td");
        textnode = document.createTextNode(linha.selecaoB);
        tdSelB.appendChild(textnode);
        tr.appendChild(tdSelB);

        //Coluna golsB
        let tdGolB = document.createElement("td");
        textnode = document.createTextNode(linha.golsB);
        tdGolB.appendChild(textnode);
        tr.appendChild(tdGolB);

        tabela.appendChild(tr);
        tabela.style.display = "table";
        let input = document.getElementById("grupo");
        input.setAttribute("onclick", "location.reload();");
    }
//  referente ao calendário dosjogos
function carregaJogo() {

  let nomeA = document.getElementById("nomeA").value;
  let nomeB = document.getElementById("nomeB").value;
  
  let xmlHttp = new XMLHttpRequest();
  xmlHttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          let obj = JSON.parse(this.responseText);
          let x = 0;

          let valor = (obj[x].local).localeCompare("undefined");
          if (valor != 0) {
              for (x = 0; x < obj.length; x++) {
                  let linha = obj[x];
                  criarLinhaTabela(linha);
              }
          }
      }
  }
  xmlHttp.open("GET", "http://localhost/3DAW2022/12/calendarioJogo.php?nomeA=" + nomeA + "&nomeB=" + nomeB);
  xmlHttp.send();

}

function criarLinhaTabela(linha) {
  let tabela = document.getElementById("tabela");
  let tr = document.createElement("tr");

  //Coluna data
  let tdData = document.createElement("td");
  textnode = document.createTextNode(linha.data);
  tdData.appendChild(textnode);
  tr.appendChild(tdData);

  //Coluna hora
  let tdHora = document.createElement("td");
  textnode = document.createTextNode(linha.hora);
  tdHora.appendChild(textnode);
  tr.appendChild(tdHora);

  //Coluna Local
  let tdLocal = document.createElement("td");
  textnode = document.createTextNode(linha.local);
  tdLocal.appendChild(textnode);
  tr.appendChild(tdLocal);

  //Coluna SelecaoA
  let tdSelA = document.createElement("td");
  textnode = document.createTextNode(linha.selecaoA);
  tdSelA.appendChild(textnode);
  tr.appendChild(tdSelA);

  //Coluna golsA
  let tdGolA = document.createElement("td");
  textnode = document.createTextNode(linha.golsA);
  tdGolA.appendChild(textnode);
  tr.appendChild(tdGolA);

  //Coluna SelecaoB
  let tdSelB = document.createElement("td");
  textnode = document.createTextNode(linha.selecaoB);
  tdSelB.appendChild(textnode);
  tr.appendChild(tdSelB);

  //Coluna golsB
  let tdGolB = document.createElement("td");
  textnode = document.createTextNode(linha.golsB);
  tdGolB.appendChild(textnode);
  tr.appendChild(tdGolB);

  tabela.appendChild(tr);
  tabela.style.display = "table";
  let inputA = document.getElementById("nomeA");
  inputA.setAttribute("onclick", "location.reload();");
  let inputB = document.getElementById("nomeB");
  inputB.setAttribute("onclick", "location.reload();");
}


// Referente ao calendario Das Seleçoes
function carregaJogo() {

  let nome = document.getElementById("nome").value;
  let xmlHttp = new XMLHttpRequest();
  xmlHttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          let obj = JSON.parse(this.responseText);
          let x = 0;

          let valor = (obj[x].local).localeCompare("undefined");
          if (valor != 0) {
              for (x = 0; x < obj.length; x++) {
                  let linha = obj[x];
                  criarLinhaTabela(linha);
              }
          }
      }
  }
  xmlHttp.open("GET", "http://localhost/3DAW2022/12/calendarioSelecao.php?nome=" + nome);
  xmlHttp.send();

}

function criarLinhaTabela(linha) {
  let tabela = document.getElementById("tabela");
  let tr = document.createElement("tr");

  //Coluna data
  let tdData = document.createElement("td");
  textnode = document.createTextNode(linha.data);
  tdData.appendChild(textnode);
  tr.appendChild(tdData);

  //Coluna hora
  let tdHora = document.createElement("td");
  textnode = document.createTextNode(linha.hora);
  tdHora.appendChild(textnode);
  tr.appendChild(tdHora);

  //Coluna Local
  let tdLocal = document.createElement("td");
  textnode = document.createTextNode(linha.local);
  tdLocal.appendChild(textnode);
  tr.appendChild(tdLocal);

  //Coluna SelecaoA
  let tdSelA = document.createElement("td");
  textnode = document.createTextNode(linha.selecaoA);
  tdSelA.appendChild(textnode);
  tr.appendChild(tdSelA);

  //Coluna golsA
  let tdGolA = document.createElement("td");
  textnode = document.createTextNode(linha.golsA);
  tdGolA.appendChild(textnode);
  tr.appendChild(tdGolA);

  //Coluna SelecaoB
  let tdSelB = document.createElement("td");
  textnode = document.createTextNode(linha.selecaoB);
  tdSelB.appendChild(textnode);
  tr.appendChild(tdSelB);

  //Coluna golsB
  let tdGolB = document.createElement("td");
  textnode = document.createTextNode(linha.golsB);
  tdGolB.appendChild(textnode);
  tr.appendChild(tdGolB);

  tabela.appendChild(tr);
  tabela.style.display = "table";
  let input = document.getElementById("nome");
  input.setAttribute("onclick", "location.reload();");
}
// Referente ao calendario Completo
function carregaJogos() {
  let xmlHttp = new XMLHttpRequest();
      xmlHttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              let obj = JSON.parse(this.responseText);
              let x = 0;
              
              let valor = (obj[x].local).localeCompare("undefined");
              if(valor!=0){
                      for (x=0;x<obj.length;x++) {
                      let linha = obj[x];
                      criarLinhaTabela(linha);
                  }
              }
          }
      }
      xmlHttp.open("GET", "http://localhost/3DAW2022/12/calendarioTodo.php");
      xmlHttp.send();
}

function criarLinhaTabela(linha) {
  let tabela = document.getElementById("tabela");
  let tr = document.createElement("tr");
  
  //Coluna data
  let tdData = document.createElement("td"); 
  textnode = document.createTextNode(linha.data);
  tdData.appendChild(textnode); 
  tr.appendChild(tdData);

  //Coluna hora
  let tdHora = document.createElement("td"); 
  textnode = document.createTextNode(linha.hora);
  tdHora.appendChild(textnode); 
  tr.appendChild(tdHora); 

  //Coluna Local
  let tdLocal = document.createElement("td");
  textnode = document.createTextNode(linha.local);
  tdLocal.appendChild(textnode); 
  tr.appendChild(tdLocal);

  //Coluna SelecaoA
  let tdSelA = document.createElement("td"); 
  textnode = document.createTextNode(linha.selecaoA);
  tdSelA.appendChild(textnode); 
  tr.appendChild(tdSelA);
  
  //Coluna golsA
  let tdGolA = document.createElement("td"); 
  textnode = document.createTextNode(linha.golsA);
  tdGolA.appendChild(textnode); 
  tr.appendChild(tdGolA);

  //Coluna SelecaoB
  let tdSelB = document.createElement("td"); 
  textnode = document.createTextNode(linha.selecaoB);
  tdSelB.appendChild(textnode); 
  tr.appendChild(tdSelB);

  //Coluna golsB
  let tdGolB = document.createElement("td"); 
  textnode = document.createTextNode(linha.golsB);
  tdGolB.appendChild(textnode); 
  tr.appendChild(tdGolB);

  tabela.appendChild(tr);
}
