<?php
	header("Content-Type: text/html; charset=ISO-8859-1", true);
	/* Finalmente aprendi a usar charset no php, acima digo ao php, mais especificamente coloco no cabeçalho da resposta html, que utilizarei o charset ISO-8859-1*/
	echo "Ok está enviando somente texto  ";
		echo "Valores passados no array \$_REQUEST ";
		print_r($_REQUEST);
			/* printo os valores do $_REQUEST
			   com print_r($_REQUEST);
			   Na verdade isso não precisa, mas em fim normalmente é necessário fazer algo
			   com o que recebe do cliente esse algo está no $_REQUEST['campo1', 'campo2', ...]
			*/
		echo "Legal só texto";
?>
