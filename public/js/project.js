function deleteItem(rotaUrl, idItem) {
  if (confirm("Tem certeza de que deseja deletar este item?")) {
    $.ajax({
      url: rotaUrl,
      method: "delete",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
        if (data.success == true){
          window.location.reload();
        } else{
          alert("Não foi possível deletar o item");
        }
      })
      .fail(function (data) {
        $.unblockUI();
        alert("Não foi possível buscar os dados");
      });
  }
}
