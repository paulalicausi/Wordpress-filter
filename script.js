$('#filtro').submit(function(){
      var filtro = $('#filtro');
      $.ajax({
        url:filtro.attr('action'),
        data:filtro.serialize(),
        type:filtro.attr('method'),
        beforeSend:function(xhr){
          filtro.find('button').text('Procesando...');
        },
        success:function(data){
          filtro.find('button').text('Aplicar filtro');
          $('#resultados').html(data);
        }
      });
      return false;
    });
