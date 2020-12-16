$(function () {
  $('.example-popover').popover({
    container: 'body'
  })

})
//adiciona mais um campo
var cont=1;
	 		$( "#addcampo" ).click(function() {
	 			cont++;
  $( "#cadastrarlinhaform" ).append( '<div class="form-group col-md-6" id="campo'+cont+'" id="formcadastrarpergunta"><input type="text" class="form-control"   name="pergunta[]" value=""></div><div class="form-group "><button type="button" class="btnapagar" id="'+cont+'" class="mt-2 py-6 px-2 form-group"   id="addcampo">-</button></div>' );
});

//retirar campo
$( "form" ).on( "click", ".btnapagar", function() {
  var button_id = $( this ).attr( "id" );
  $( '#campo'+button_id+'' ).remove();
  $( '#'+button_id+'' ).remove();
});

