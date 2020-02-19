axios.get(base_url + '/clientes')
    .then(function (response) {
        let listaCliente = response.data;
        listaCliente.forEach(element => {
            $('#conteudo-tabela').append(
                '<tr><th scope="row">' + element.id + '</th>' +
                '<td>' + element.nome + '</td>' +
                '<td>' + element.email + '</td>' +
                '<td>' + element.contato + '</td>' +
                '<td>' +
                '<button onclick="visualizar_cliente(' + element.id + ')" data-toggle="modal" data-target="#modal-visualizar" type="button" class="btn btn-info espaco-button">Visualizar</button>' +
                '<button type="button" class="btn btn-warning espaco-button">Editar</button>' +
                '<button type="button" class="btn btn-danger espaco-button">Excluir</button>' +
                '</td></tr>'
            );
        });
    })
    .catch(function (error) {
        // handle error
        console.log(error);
    })
    .then(function () {
        // always executed
    });

function visualizar_cliente(id) {
    $('#conteudo-modal-visualizar').html('');
    axios.get(base_url + '/cliente/' + id)
        .then(function (response) {
            let dadosCliente = response.data;
            $('#conteudo-modal-visualizar').append(
                '<div class="col-md-6">'+
                '<div class="row">' +
                '<div class="col-md-12 d-flex">'+
                '<h5>Nome: </h5><span>' + dadosCliente.nome+ '</span>' +
                '</div>'+
                '<div class="col-md-12 d-flex">' +
                '<h5>E-mail: </h5><span>' + dadosCliente.email+ '</span>' +
                '</div>' +
                '<div class="col-md-12 d-flex">' +
                '<h5>Contato: </h5><span>' + dadosCliente.contato+ '</span>' +
                '</div>' +
                '</div>' +
                '</div>' +

                '<div class="col-md-6">' +
                '<div class="row">' +
                '<div class="col-md-12 d-flex">' +
                '<h5>Estado: </h5><span>' + dadosCliente.estado+ '</span>' +
                '</div>' +
                '<div class="col-md-12 d-flex">' +
                '<h5>Cidade: </h5><span>' + dadosCliente.cidade+ '</span>' +
                '</div>' +
                '<div class="col-md-12 d-flex">' +
                '<h5>Data Nascimento: </h5><span>' + dadosCliente.data_nascimento+ '</span>' +
                '</div>' +
                '</div>' +
                '</div>'+ 
                '<div class="col-md-6 d-flex flex-column align-items-start">' +
                '<h5>Plano: </h5><div id="plano"> Não tem</div>'+
                '</div>' +
                '<div class="col-md-6 d-flex flex-column align-items-start">' +
                '<h5>Mensalidade: </h5><div id="valor"> Não tem </div>' +
                '</div>'
            );
            if (dadosCliente.planos != '') {
                $('#plano').html('');
                $('#valor').html('');
            }
            dadosCliente.planos.forEach(element => {
                
                $('#plano').append('<span>' + element.nome+'</span>');
                $('#plano').append('<br />');
                $('#valor').append('<span>R$ ' + element.mensalidade+'</span>');
                $('#valor').append('<br />');

                // + element.nome +
                //     element.mensalidade +
            });
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        .then(function () {
            // always executed
        });
}