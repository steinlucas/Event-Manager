$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});


$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});






function autenticar(nomeForm){
	dadosJson = $("#formAutentica").serialize();  // Passando os dados de um form
	//console.debug(dadosJson); // igual ao varDump
	
	url = $("#formAutentica").attr('action');
	$.post(url, dadosJson, function(retorno, status){
		if(retorno.status==true){
			window.location = "/prova/src/controller/internoController.php";
		}
		else{
			alert(retorno.mensagem);
		}
	}, 'json');
}



