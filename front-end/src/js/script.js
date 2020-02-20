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
                '<button onclick="visualizar_cliente(' + element.id + ')" type="button" class="btn btn-info espaco-button">Visualizar</button>' +
                '<button onclick="editar_cliente(' + element.id + ')" type="button" class="btn btn-warning espaco-button">Editar</button>' +
                '<button  onclick="deletar_cliente(' + element.id + ')" type="button" class="btn btn-danger espaco-button">Excluir</button>' +
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
                '<hr style="width: 100%;">'+
                '<div class="col-md-6 d-flex flex-column align-items-start">' +
                '<h5>Planos </h5><div id="plano"> Não tem</div>'+
                '</div>' +
                '<div class="col-md-6 d-flex flex-column align-items-start">' +
                '<h5>Mensalidade </h5><div id="valor"> Não tem </div>' +
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

            });
            $('#modal-visualizar').modal('show');
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        .then(function () {
            // always executed
        });
}

function editar_cliente(id) {
    $("#edicao_cliente input[type=checkbox]").each(function () { 
        $(this).prop("checked", false);
    })

    axios.get(base_url + '/cliente/' + id)
        .then(function (response) {
            let dadosCliente = response.data;
            
            dadosCliente.planos.forEach(element => {
                $("#" + element.nome).prop("checked", true);
            });

            $('#id').val(dadosCliente.id);
            $('#nome').val(dadosCliente.nome);
            $('#email').val(dadosCliente.email); 
            $('#contato').val(dadosCliente.contato); 
            $('#estado').val(dadosCliente.estado); 
            $('#cidade').val(dadosCliente.cidade); 
            $('#data_nascimento').val(dadosCliente.data_nascimento); 
            $('#modal-edicao').modal('show');
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        .then(function () {
            // always executed
        });
}

function salvar_edicao() {
    let cliente_id = $('#edicao_cliente #id').val();
    let arrayPlanos = [];
    $("#edicao_cliente input[type=checkbox]:checked").each(function () {
        arrayPlanos.push(($(this).val()));
    })

    let json_cliente = {
        "nome": $('#edicao_cliente #nome').val(),
        "email": $('#edicao_cliente #email').val(),
        "contato": $('#edicao_cliente #contato').val().replace(/\D/gim, ''),
        "estado": $('#edicao_cliente #estado').val(),
        "cidade": $('#edicao_cliente #cidade').val(),
        "data_nascimento": $('#edicao_cliente #data_nascimento').val().replace(/\D/gim, ''),
        "planos": arrayPlanos
        }

    axios({
        method: 'post',
        url: base_url + '/cliente/' + cliente_id,
        responseType: 'json',
        data: json_cliente,
    })
        .then(function (response) {
            if (response.data.status == 'sucesso_update') {
                Swal.fire({
                    title: 'Editado!',
                    text: "Seu cliente foi atualizado.",
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok!'
                }).then((result) => {
                    if (result.value) {
                        location.reload();
                    }
                })
            }
        }).catch(function (error) {
            // handle error
            console.log(error.response);
        });
}

function salvar_novo() {

    var arrayPlanos = [];
    $("#criacao_cliente input[type=checkbox]:checked").each(function () {
        arrayPlanos.push(($(this).val()));
    })

    let json_cliente = {
        "nome": $('#criacao_cliente #nome').val(),
        "email": $('#criacao_cliente #email').val(),
        "contato": $('#criacao_cliente #contato').val().replace(/\D/gim, ''),
        "estado": $('#criacao_cliente #estado').val(),
        "cidade": $('#criacao_cliente #cidade').val(),
        "data_nascimento": $('#criacao_cliente #data_nascimento').val().replace(/\D/gim, ''),
        "planos" : arrayPlanos
    }

    axios({
        method: 'post',
        url: base_url + '/cliente/',
        responseType: 'json',
        data: json_cliente,
    })
        .then(function (response) {
            if (response.data.status == 'sucesso_salvar') {
                Swal.fire({
                    title: 'Salvo!',
                    text: "Seu cliente foi criado.",
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok!'
                }).then((result) => {
                    if (result.value) {
                        location.reload();
                    }
                })
            } 
            if (response.data.status == 'erro_salvar') {
                Swal.fire({
                    title: 'Erro!',
                    text: "Ocorreu um erro ao salvar seu cliente.",
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok!'
                })
            }
        }).catch(function (error) {
            // handle error
            console.log(error.response);
        });
}

function deletar_cliente(id) {
    Swal.fire({
        title: 'Você tem certeza?',
        text: "O cliente será deletado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim!',
        cancelButtonText: 'Não!'
    }).then((result) => {
        if (result.value) {
            axios({
                method: 'delete',
                url: base_url + '/cliente/' + id,
            })
                .then(function (response) {
                    if (response.data.status == 'sucesso_delete') {
                        Swal.fire({
                            title: 'Excluido!',
                            text: "Seu cliente foi excluido.",
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok!'
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        })
                    }
                    if (response.data.status == 'nao_pode_excluir') {
                        Swal.fire({
                            title: 'Ops!',
                            text: "Este cliente não pode ser excluido.",
                            icon: 'error',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok!'
                        })
                    }
                });
        }
    })
}