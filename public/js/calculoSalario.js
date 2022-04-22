$('body').on('click', '#salario', function () {
    var select=$('#periodo').val();
    id = $(this).attr("data-id");

calcularSalario(select,id);
});


function insertaNodo(salario,tipo){
    var elemento = document.getElementById('nodo');
    var elementoParrafo = document.getElementById('salarioTotal')
    var nuevoElemento = document.createElement("p");
    nuevoElemento.setAttribute('id','salarioTotal');
    nuevoElemento.classList.add('m-3');

    var textoDelElemento = document.createTextNode('Tu salario '+ tipo +' es: '+ salario); 

    nuevoElemento.appendChild(textoDelElemento);  
    elemento.replaceChild(nuevoElemento, elementoParrafo);

}

function calcularSalario(select,id) {
    var data = {
    select:select,
    id:id
};

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/admin/calcularSalario",
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (resp_success) {
           if(resp_success.status == true){
            insertaNodo(resp_success.salario, resp_success.tipo);
           }


        },
        complete: function () {

        }
        });
     
} 