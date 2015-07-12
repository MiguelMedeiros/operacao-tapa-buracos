<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<!-- METAS -->
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="icon" type="image/png" href="http://www.operacaotapaburacos.com.br/img/alerta.png" />

		<!-- TITLE -->
		<title>Operação Tapa-Buracos - Curitiba</title>
		
		<!-- CSS -->
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Bangers' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/jquery.fancybox.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		
		<!-- OG -->
		<meta property="og:title" content="Operação Tapa-Buracos" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="http://www.operacaotapaburacos.com.br/" />
		<meta property="og:image" content="http://www.operacaotapaburacos.com.br/img/og-fb.jpg" />
		<meta property="og:site_name" content="Operação Tapa-Buracos - Curitiba" />
		<meta property="fb:admins" content="100001164483820" />
		<meta property="og:description" content="Ajuda a nossa cidade! Sinalize aonde estão os buracos no mapa!">
		<!-- #OG -->
		
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
	</head>
	<body>
		<!-- ANALYTICS -->
		<script type="text/javascript">
		
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-64694514-1']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		
		</script>

		<!-- FB -->
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3&appId=1600619146884018";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		
		<!-- CONTEUDO -->
		<div class="conteudo">
			<h1>Operação Tapa-Buracos - Curitiba</h1>
			
			<?php echo $this->fetch('content'); ?>
			
			<div class="menu">
				<div class="botao-menu">
					<a onClick="_gaq.push(['_trackEvent', 'Menu', 'Mobile', 'Click no botão Mobile']);" href="javacript:void(0);" id="botao-mobile"><i class="fa fa-bars"></i></a>
				</div>
				
				
				<ul>
					
					<li><a onClick="_gaq.push(['_trackEvent', 'Menu', 'Sobre', 'Click no menu Sobre']);" class="menu-sobre fancybox" href="#sobre"><i class="fa fa-info-circle"></i> <span>Sobre</span></a></li>
					
					<li><a onClick="_gaq.push(['_trackEvent', 'Menu', 'Como Usar', 'Click no menu Como Usar']);" class="menu-como-usar fancybox" href="#como-usar"><i class="fa fa-question-circle"></i> <span>Como usar?</span></a></li>
					
					<li><a onClick="_gaq.push(['_trackEvent', 'Menu', 'Estatísticas', 'Click no menu Estatísticas']);" class="menu-estatisticas fancybox" href="#estatisticas"><i class="fa fa-pie-chart"></i> <span>Nossos números</span></a></li>
					
					<li><a onClick="_gaq.push(['_trackEvent', 'Menu', 'Doações', 'Click no menu Doações']);" class="menu-doacoes fancybox" href="#doacoes"><i class="fa fa-heart"></i> <span>Doações</span></a></li>
					
					<li><a onClick="_gaq.push(['_trackEvent', 'Menu', 'Compartilhar', 'Click no menu Compartilhar']);" class="menu-share fancybox" href="#compartilhar"><i class="fa fa-thumbs-up"></i> <span>Compartilhe</span></a></li>

				</ul>
			</div>
			
			
			<!-- MODAL SOBRE -->
			<div id="sobre" class="fancymodal">
				<div>
					<h1 class="modal-title" id="myModalLabel">Sobre</h1>
				</div>
				<div>
					<p>Olá! Meu nome é <a href="http://www.miguelmedeiros.com.br">Miguel Medeiros</a>. Sou carioca, mas adotei Curitiba como minha cidade faz quase 10 anos!</p>
					<p>Estava cansado de ver tantos buracos na cidade que resolvi criar esse site. Ele é, basicamente, um mapa colaborativo aonde qualquer cidadão pode reportar alertas de buracos.</p>
					<p>A ideia é enviar relatórios semanais ou mensais para a prefeitura de Curitiba conseguir localizar com maior precisão esses locais tão perigosos que geram vítmas no trânsito e danos ao seu automóvel!</p>
					<p>Acredito que com a pressão popular podemos fazer diferença!</p>
					<p>Muito obrigado por ajudar nossa cidade ficar cada vez melhor!</p>
					<p style="text-align:right"><a href="http://www.miguelmedeiros.com.br">Miguel Medeiros</a></p>
				</div>
			</div>
			
			<!-- MODAL ESTATISTICAS -->
			<div id="estatisticas" class="fancymodal">
				<div>
					<h1>Nossos números</h1>
				</div>
				<div>
					<div class="col-md-12"><h3>Total de alertas gerados:</h3> <span><b><?=$buracos_total;?></b></span></div>
					
					<div class="col-md-12"><img src="http://operacaotapaburacos.com.br/img/alerta_status_0.png" /> <h3>Buracos Abertos:</h3> <span><b><?=$buracos_abertos;?></b></span></div>
					
					<div class="col-md-12"><img src="http://operacaotapaburacos.com.br/img/alerta_status_2.png" /> <h3>Buracos Tapados:</h3> <span><b><?=$buracos_tapados;?></b></span></div>
					
				</div>
			</div>
			
			<!-- MODAL COMO USAR -->
			<div id="como-usar" class="fancymodal">
				<div>
					<h1 class="modal-title" id="myModalLabel">Como usar?</h1>
				</div>
				<div>
					<h3>Passo 1:</h3>
					<p>Clique com o botão direito do mouse na localização que você deseja informar aonde está o buraco.</p>
					
					<h3>Passo 2:</h3>
					<p>Verifique se o marcador está no lugar correto, caso queira movê-lo basta clicar e arrastar o ícone para posição desejada.</p>
					
					<h3>Passo 3:</h3>
					<p>Insira um e-mail válido para receber um feedback do alerta.</p>
					
					<h3>Passo 4:</h3>
					<p>Confirme o alerta clicando no botão "Enviar alerta"!</p>
					<br/>
					<p>Qualquer dúvida entre em contato com o desenvolvedor: <a href="mailto:contato@miguelmedeiros.com.br">contato@miguelmedeiros.com.br</a></p>
				</div>
			</div>
			
			<!-- MODAL DOACOES -->
			<div id="doacoes" class="fancymodal">
				<div>
					<h1 class="modal-title" id="myModalLabel">Doações</h1>
				</div>
				<div>
					<p>Desenvolvi esse site sem intenção de ganhar dinheiro e sim de ajudar nossa cidade a melhorar cada vez mais! <b>Mas nada é de graça nesse mundo!</b></p>
					<p>Se você puder colaborar com qualquer valor para manter o servidor, registro do domínio e <b>novas melhorias no site</b> basta clicar no botão abaixo:</p>
					
					<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
					<div class="pagseguro">
						<form action="https://pagseguro.uol.com.br/checkout/v2/donation.html" method="post">
							<!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
							<input type="hidden" name="currency" value="BRL" />
							<input type="hidden" name="receiverEmail" value="miguel.medeiros@gmail.com" />
							<input onClick="_gaq.push(['_trackEvent', 'Doação', 'Pagseguro', 'Click no botão do Pagseguro']);" type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/doacoes/209x48-doar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
						</form>
					</div>
					<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
					
					<p>Todas as doações serão investidas para ampliação do projeto <b>Operação Tapa-Buracos!</b></p>
					<p><b>Muito obrigado por contribuir! &nbsp;&nbsp; :D</b></p>

				</div>
			</div>			
			
			<!-- MODAL COMPARTILHAR -->
			<div id="compartilhar" class="fancymodal">
				<div>
					<h1 class="modal-title" id="myModalLabel">Compartilhar</h1>
				</div>
				<div>
					
					<div class="col-md-12">
						<h2>Gostou do site? Então curte aí!</h2>
						
						<div class="share-contadores">
							<div class="fb-like" data-href="http://www.operacaotapaburacos.com.br/" data-layout="box_count" data-action="like" data-show-faces="true" data-share="false"></div>
							
							<a class="twitter-share-button"
							   href="http://www.operacaotapaburacos.com.br/"
							  data-url="http://www.operacaotapaburacos.com.br/"
							  data-counturl="http://www.operacaotapaburacos.com.br/"
							  data-count="vertical"
							  data-hashtags="OperacaoTapaBuracos">
							Tweet
							</a>
							
					        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				        </div>
	               	</div>
	               	
	               	<div class="col-md-12" id="fb-comments">
	               		
						<h2>Comente o que achou da ideia!</h2>
						<div>
							<div class="fb-comments" data-href="http://www.operacaotapaburacos.com.br/" data-width="400" data-numposts="5"></div>
						</div>
					</div>
					
				</div>
			</div>
			
			
			<div class="col-md-12 assinatura">
				Versão 1.0 (beta) | por <a href="http://www.miguelmedeiros.com.br" target="_blank">Miguel Medeiros</a>
			</div>
		</div>
		<!-- JS -->
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAXkdgyj0N-00RGNvJZU9wFf1PqC0m2fyE&sensor=false"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.fancybox.js"></script>
		
		<script src="js/custom.js"></script>
		
		
	</body>
</html>