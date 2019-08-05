$('#filtro').submit(function(){
      var filtro = $('#filtro');
      $.ajax({
        url:filtro.attr('action'),
        data:filtro.serialize(),
        type:filtro.attr('method'),
        beforeSend:function(xhr){
          filtro.find('button').text('Processing...');
        },
        success:function(data){
          filtro.find('button').text('Apply filtro');
          $('#response').html(data);
          $('#carreras').addClass('hide');
        }
      });
      return false;
    });
