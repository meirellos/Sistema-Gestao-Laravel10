function deleteItem(rotaUrl, idItem) {
  if (confirm("Tem certeza de que deseja deletar este item?")) {
    $.ajax({
      url: rotaUrl,
      method: "delete",
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      data: {
        id: idItem,
      },
      beforeSend: function () {
        $.blockUI({
          message: "Carregando...",
          timeout: 2000,
        });
      },
    })
      .done(function (data) {
        $.unblockUI();
        if (data.success == true) {
          window.location.reload();
        } else {
          alert("Não foi possível deletar o item");
        }
      })
      .fail(function (data) {
        $.unblockUI();
        alert("Não foi possível buscar os dados");
      });
  }
}

$("#mask_valor").mask("#.##0,00", {
  reverse: true,
});

$("#cep").blur(function () {
  //Nova variável "cep" somente com dígitos.
  var cep = $(this).val().replace(/\D/g, "");

  //Verifica se campo cep possui valor informado.
  if (cep != "") {
    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if (validacep.test(cep)) {
      //Preenche os campos com "..." enquanto consulta webservice.
      $("#logradouro").val("...");
      $("#bairro").val("...");
      $("#endereco").val("...");

      //Consulta o webservice viacep.com.br/
      $.getJSON(
        "https://viacep.com.br/ws/" + cep + "/json/?callback=?",
        function (dados) {
          if (!("erro" in dados)) {
            //Atualiza os campos com os valores da consulta.
            $("#logradouro").val(dados.logradouro);
            $("#bairro").val(dados.bairro);
            $("#endereco").val(dados.localidade);
          } //end if.
          else {
            //CEP pesquisado não foi encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
          }
        }
      );
    } //end if.
    else {
      //cep é inválido.
      limpa_formulário_cep();
      alert("Formato de CEP inválido.");
    }
  } //end if.
  else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
  }
});
