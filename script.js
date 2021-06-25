var nom = document.getElementsById('nom');
var plus = document.getElementById('plus_inp');
var moins = document.getElementById('moins');


plus.onclick = function(){
    var newField = document.createElement('input');
    newField.setAttribute('type','text');
    newField.setAttribute('name','nom[]');
    newField.setAttribute('class','nom');
    nom.appendChild(newField);
}