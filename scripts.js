function adicionar(){

    var item = document.createElement("li");
    item.setAttribute("class","list-group-item")
    var tarefa = document.getElementById('manchete');
    var texto = document.createTextNode(tarefa);
    item.appendChild(texto);
    var elemento = document.getElementById("lista");
    elemento.appendChild(item);
}