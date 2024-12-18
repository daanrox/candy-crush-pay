<?php
   include '../conectarbanco.php';
   
   $conn = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
   
   if ($conn->connect_error) {
       die("Conexão falhou: " . $conn->connect_error);
   }
   
   $sql = "SELECT nome_unico, nome_um, nome_dois FROM app";
   $result = $conn->query($sql);
   
   if ($result->num_rows > 0) {
   
       $row = $result->fetch_assoc();
   
   
       $nomeUnico = $row['nome_unico'];
       $nomeUm = $row['nome_um'];
       $nomeDois = $row['nome_dois'];
   
   } else {
       return false;
   }
   
   $conn->close();
   ?>


<?php
   // Iniciar ou resumir a sessão
   session_start();
   // Inicie a sessão se ainda não foi iniciada
   include './../conectarbanco.php';
   
   $conn = new mysqli('localhost', $config['db_user'], $config['db_pass'], $config['db_name']);
   
   
   // Verifique se a conexão foi bem-sucedida
   if ($conn->connect_error) {
   die("Falha na conexão com o banco de dados: " . $conn->connect_error);
   }
   
   
   //
   if (isset($_SESSION['email'])) {
       $sql = "SELECT dificuldade_jogo FROM app LIMIT 1"; // Adicionando LIMIT 1 para obter apenas uma linha
       $result = $conn->query($sql);
       
       if ($result->num_rows > 0) {
       $row = $result->fetch_assoc();
       $dificuldade_jogo = $row['dificuldade_jogo'];
       }
   }
   
   $conn->close();
   ?>
<?php
   // Inicie a sessão se ainda não foi iniciada
   
       include './../conectarbanco.php';
   
       $conn = new mysqli('localhost', $config['db_user'], $config['db_pass'], $config['db_name']);
   
   
   // Verifique se a conexão foi bem-sucedida
   if ($conn->connect_error) {
       die("Falha na conexão com o banco de dados: " . $conn->connect_error);
   }
   
   // Recupere o email da sessão
   if (isset($_SESSION['email'])) {
       $email = $_SESSION['email'];
   
       // Consulta para obter o saldo associado ao email na tabela appconfig
       $consulta_saldo = "SELECT saldo FROM appconfig WHERE email = '$email'";
   
       // Execute a consulta
       $resultado_saldo = $conn->query($consulta_saldo);
   
       // Verifique se a consulta foi bem-sucedida
       if ($resultado_saldo) {
           // Verifique se há pelo menos uma linha retornada
           if ($resultado_saldo->num_rows > 0) {
               // Obtenha o saldo da primeira linha
               $row = $resultado_saldo->fetch_assoc();
               $saldo = $row['saldo'];
           }
       }
   }
   
   // Feche a conexão com o banco de dados
   $conn->close();
   ?>
   
   <!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta content="IE=edge" http-equiv="X-UA-Compatible">
      <script async="" src="js/fbevents.js"></script><script src="js/3a049d3e8f.js" crossorigin="anonymous"></script>
      <meta name="facebook-domain-verification" content="gbvlzi4e8nsm6e3unc48lf20pxjw6j">
      <title> <?php echo $nomeUnico; ?> 🍫</title>
      <meta content="width=device-width, initial-scale=1" name="viewport">
      <link href="css/page.css" rel="stylesheet" type="text/css">
      <link href="css/alert.css" rel="stylesheet" type="text/css">
      <script src="js/webfont.js" type="text/javascript"></script>
      <script type="text/javascript">
         WebFont.load({
         
           google: {
         
             families: ["Space Mono:regular,700"]
         
           }
         
         });
      </script>
      <link rel="apple-touch-icon" sizes="180x180" href="images/doce1.png">
      <link rel="icon" type="image/png" sizes="32x32" href="images/doce1.png">
      <link rel="icon" type="image/png" sizes="16x16" href="images/doce1.png">
      <script type="text/javascript">
         function saveUtm(utm_name, value) {
           if (sessionStorage.getItem(utm_name) === null && value !== '') {
             sessionStorage.setItem(utm_name, value);
           }
         }
         
         const queryString = window.location.search;
         const urlParams = new URLSearchParams(queryString);
         
         let ref = urlParams.get('ref') ? urlParams.get('ref') : '';
         
         saveUtm('ref', ref);
         
         window.dataLayer = window.dataLayer || [];
      </script>
      <!-- Meta Pixel Code -->
      <!-- Google tag (gtag.js) -->
   </head>

   <body>
       
          <script>
            let saldoInfluencer = sessionStorage.getItem('saldoPresell');
            
        
            if (!saldoInfluencer) {
                saldoInfluencer = 20;
                sessionStorage.setItem('saldoPresell', saldoInfluencer);
            }
        </script>
    
      <div>
         <div data-collapse="small" data-animation="default" data-duration="400" role="banner" class="navbar w-nav">
            <div class="container w-container">
               <a href="/" aria-current="page" class="brand w-nav-brand w--current">
                  <img src="./arquivos/l2.webp" loading="lazy" height="28" alt="" class="image-6">
                  <div class="nav-link logo"><?php echo $nomeUnico; ?></div>
               </a>
               <nav role="navigation" class="nav-menu w-nav-menu">
                  <a href="/cadastrar" class="nav-link w-nav-link" style="max-width: 940px;">Jogar</a>
                  <a href="/cadastrar/" class="button nav w-button">Cadastrar</a>
               </nav>
               <div class="w-nav-button"></div>
               <div class="menu-button w-nav-button">
                  <div class="icon w-icon-nav-menu"></div>
               </div>
            </div>
            <div class="nav-bar">
                <a href="/cadastrar" class="button w-button">
                   <div>Jogar</div>
                </a>
             
                <a href="/cadastrar" class="button w-button">Cadastrar</a>
             </div>
         </div>
         <style>
            ul.playersOn {
            display: block;
            position: absolute;
            top: calc(50vh - 240px);
            left: -154px;
            width: 190px;
            height: 460px;
            padding: 0;
            margin: 0;
            background: #00BCD4;
            border: 4px solid #000;
            box-shadow: -3px 3px 0 2px #000;
            border-radius: 0 15px 15px 0;
            filter: drop-shadow(2px 2px 6px #000000cc);
            transition: 2s;
            opacity: 0;
            z-index: 100;
            }
            ul.playersOn.ativo {
            left: -5px;
            }
            ul.playersOn li {
            display: block;
            margin: 10px 5px 0 5px;
            }
            ul.playersOn li img {
            float: left;
            width: 20px;
            margin: 0 -150px 0 150px;
            filter: drop-shadow(1px 1px 3px black);
            transition: 4s;
            }
            ul.playersOn.ativo li img {
            margin: 0 8px 0 0;
            }
            ul.playersOn li span {
            display: block;
            font-size: 12px;
            line-height: 12px;
            }
            ul.playersOn li i {
            display: block;
            font-size: 10px;
            margin-top: -6px;
            }
         </style>
         <ul class="playersOn"></ul>
         
         
        
         
         
         
         <div id="saldoDiv" style="position: absolute; top: 100px; width: 100%; line-height: 26px; color: #fff; z-index: 10; text-align: center; ">
    <p style='background-color: rgba(0,0,0,0.55); width: 80%; max-width:350px; margin: 0 auto;'>
        SALDO: R$<b class="saldo"> 0,00 </b>
    </p>
    </div>
    
 


   <script>
    
    window.onload = function() {
        var saldoDiv = document.getElementById('saldoDiv');
        var saldoInfluencer = sessionStorage.getItem('saldoPresell');
        var saldoFormatted = parseFloat(saldoInfluencer).toLocaleString('pt-BR', { minimumFractionDigits: 2 });
        saldoDiv.innerHTML = `<p style='background-color: rgba(0,0,0,0.55); width: 80%; max-width:350px; margin: 0 auto;'>SALDO: R$<b class="saldo">${saldoFormatted}</b></p>`;
    };
</script>
         
         
         
         
         <section id="hero" class="hero-section dark wf-section">
            <style>
               a.escudo {
               display: block;
               width: 247px;
               line-height: 65px;
               font-size: 12px;
               margin: -60px 0 0px 0;
               background-image: url(images/escudo-branco.png);
               background-size: contain;
               background-repeat: no-repeat;
               background-position: center;
               filter: drop-shadow(1px 1px 3px #00000099) hue-rotate(0deg);
               }
               a.escudo img {
               width: 50px;
               margin: -10px 0 0 0;
               }
            </style>
            <div class="minting-container w-container">
               <a href="#" class="escudo">  <img src="images/trophy.gif">  </a>
               <h2>Iniciar Expedição</h2>
               <p>Essa é a sua chance de faturar jogando Candy Crush!</p>
               <p>Aproveite seu saldo bônus para testar o jogo</p>
               <p>Faça trios e grupos com os docinhos! Quanto mais você fizer, mais vai ganhar #ficaadica</p>
               <form data-name="" id="play" method="post" aria-label="Form" action="./game">
                  <div class="properties">
                     <!--<h4 class="rarity-heading">Valor de entrada</h4>
                        <div class="rarity-row roboto-type2">
                          <input type="number" class="large-input-field w-input" max="25" min="5" step="1" name="bet" id="bet" required value="5">
                        </div>-->
                     <input type="hidden" name="type_game" value="presell">
                  </div>
                  <div class="">
                     <input type="submit" value="Jogar" name="button" class="primary-button w-button">
                     <!--<input type="submit" value="Demo" name="button" class="primary-button w-button">-->
                     <br>
                     <br>
                  </div>
               </form>
               <p>Você escolhe o valor da aposta dentro do jogo!</p>
            </div>
            <div id="wins" style="
               display: block;
               width: 240px;
               font-size: 12px;
               padding: 5px 0;
               text-align: center;
               line-height: 13px;
               background-color: #FFC107;
               border-radius: 10px;
               border: 3px solid #1f2024;
               box-shadow: -3px 3px 0 0px #1f2024;
               margin: -24px auto 0 auto;
               z-index: 1000;
               ">Usuários Online <br> <span id='winNumber'>0</span></div>
         </section>
         
         <script>
 
              function getRandomNumber(min, max) {
                return Math.floor(Math.random() * (max - min + 1)) + min;
              }
            
              function updateUsersOnline() {
                var randomNumber = getRandomNumber(140, 156);
                document.getElementById("winNumber").innerText = randomNumber;
              }
            
            
              updateUsersOnline();
            
              setInterval(updateUsersOnline, 5000); 
        </script>
         
         
         <section id="mint" class="mint-section wf-section">
            <div class="minting-container w-container">
               <img src="images/person.png" loading="lazy" width="240" alt="" class="mint-card-image">
               <h2>CandyPay</h2>
               <p class="paragraph">Bem-vindo(a) ao mundo suculento e lucrativo de CandyPay, o joguinho que vai deixar você com água na boca e o bolso cheio! Prepare-se para uma experiência emocionante, onde suas habilidades serão testadas e sua conta bancária pode crescer a cada fatia. </p>
               <a href="/deposito" class="primary-button w-button">DEPOSITE E COMECE A FATURAR!</a>
            </div>
         </section>
         <div class="intermission wf-section">
            <div class="center-image-block">
               <img src="images/60f8c4536d62687b8a9cee75_row%2001.svg" loading="eager" alt="">
            </div>
            <div class="center-image-block _2">
               <img src="images/60f8c453ca9716f569e837ee_row%2002.svg" loading="eager" alt="">
            </div>
            <div class="center-image-block _2">
               <img src="images/60f8c453bf76d73ecbc14a1d_row%2003.svg" loading="eager" alt="" class="image-3">
            </div>
         </div>
      </div>
      <div id="faq" class="faq-section">
         <div class="faq-container w-container">
            <h2>faq</h2>
            <div class="question first">
               <img src="images/60f8d0c642c4405fe15e5ee0_80s%20Pop.svg" loading="lazy" width="110" alt="">
               <h3>Como funciona?</h3>
               <div>CandyPay é o mais novo jogo divertido e lucrativo da galera! Lembra daquele joguinho ddo Candy Crush que todo mundo era viciado? Ele voltou e agora dá para ganhar dinheiro com cada combinação de doces.  Super simples, arraste os doces para combinar 3 ou mais em sequencia e você ganhará dinheiro na hora. </div>
            </div>
            <div class="question">
               <img src="images/60fa0061a0450e3b6f52e12f_Body.svg" loading="lazy" width="90" alt="">
               <h3>Como posso jogar?</h3>
               <div class="w-richtext">
                  <p>Você precisa fazer um depsito inicial na plataforma para começar a jogar e faturar. Lembrando que você indicando amigos, você ganhará dinheiro de verdade na sua conta bancária.</p>
               </div>
            </div>
            <div class="question">
               <img src="images/61070a430f976c13396eee00_Gradient%20Shades.svg" loading="lazy" width="120" alt="">
               <h3>Como posso sacar? <br>
               </h3>
               <p>O saque  instantâneo. Utilizamos a sua chave PIX como CPF para enviar o pagamento, é na hora e no PIX. 7 dias por semana e 24 horas por dia. <br>
               </p>
            </div>
            <div class="question">
               <img src="images/60f8d0c69b41fe00d53e8807_Helmet.svg" loading="lazy" width="90" alt="">
               <h3>Existem eventos?</h3>
               <div class="w-richtext">
                  <ul role="list">
                     <li>
                        <strong>Jogatina</strong>. A cada combinação em sequência de 3 ou mais doces, você acumula dinheiro diretamente em sua conta virtual. Quanto mais doces você combinar, mais dinheiro você ganha!.
                     </li>
                     <li>
                        <strong>Torneios</strong>. Além disso, voc pode competir com outros jogadores em torneios e desafios diários para ver quem consegue a maior pontuação e fatura mais dinheiro. A emoção da competição e a chance de ganhar grandes prêmios adicionam uma camada extra de adrenalina ao jogo.
                     </li>
                     <li>
                        <strong>Desafios</strong>. À medida que você progride no jogo, desafios emocionantes surgem. Voc será desafiado a combinar uma quantidade específica de doces em um determinado tempo, ou até mesmo enfrentar desafios especiais que valem mais dinheiro. Os combos também são uma maneira de aumentar seus ganhos, pois ao combinar vários doces em uma só jogada, você receberá bônus multiplicadores.
                     </li>
                  </ul>
                  <p>Clique <a href="https://t.me/">aqui</a> e acesse nosso grupo no Telegram para participar de eventos exclusivos. </p>
               </div>
            </div>
            <div class="question">
               <img src="images/60f8d0c6aa527d780201899a_Ear.svg" loading="lazy" width="72" alt="">
               <h3>O que são os combos?</h3>
               <div>Quando você combina uma quantidade maior que 4 doces, ele se transforma em um doce especial, que ao ser combinado, explode uma fileira inteira, ou até mesmo todos os doces da mesma cor no tabuleiro.</div>
            </div>
            <div class="question last">
               <img src="images/60f8d0c657c9a88fe4b40335_Exploded%20Head.svg" loading="lazy" width="72" alt="">
               <h3>D para ganhar mais?</h3>
               <div class="w-richtext">
                  <p>Chame um amigo para jogar e após o depósito será creditado em sua conta R$ para sacar a qualquer momento. </p>
                  <ol role="list">
                     <li>O saldo é adicionado diretamente ao seu saldo em dinheiro, com o qual você pode jogar ou sacar. </li>
                     <li>Seu amigo deve se inscrever atravs do seu link de convite pessoal. </li>
                     <li>Seu amigo deve ter depositado pelo menos R$20,00 BRL para receber o prêmio do convite. </li>
                     <li>Você não pode criar novas contas na <?php echo $nomeUnico; ?> e se inscrever através do seu próprio link para receber a recompensa. O programa Indique um Amigo é feito para nossos jogadores convidarem amigos para a plataforma <?php echo $nomeUnico; ?>. Qualquer outro uso deste programa é estritamente proibido. </li>
                  </ol>
                  <p>‍</p>
               </div>
            </div>
         </div>
         <div class="faq-left">
            <img src="images/60f988c7c856f076b39f8fa4_head%2004.svg" loading="eager" width="238.5" alt="" class="faq-img">
            <img src="images/60f988c9402afc1dd3f629fe_head%2026.svg" loading="eager" width="234" alt="" class="faq-img _1">
            <img src="images/60f988c9bc584ead82ad8416_head%2029.svg" loading="lazy" width="234" alt="" class="faq-img _2">
            <img src="images/60f988c913f0ba744c9aa13e_head%2027.svg" loading="lazy" width="234" alt="" class="faq-img _3">
            <img src="images/60f988c9d3d37e14794eca22_head%2025.svg" loading="lazy" width="234" alt="" class="faq-img _1">
            <img src="images/60f988c98b7854f0327f5394_head%2024.svg" loading="lazy" width="234" alt="" class="faq-img _2">
            <img src="images/60f988c82f5c199c4d2f6b9f_head%2005.svg" loading="lazy" width="234" alt="" class="faq-img _3">
         </div>
         <div class="faq-right">
            <img src="images/60f988c88b7854b5127f5393_head%2023.svg" loading="eager" width="238.5" alt="" class="faq-img">
            <img src="images/60f988c8bf76d754b9c48573_head%2012.svg" loading="eager" width="234" alt="" class="faq-img _1">
            <img src="images/60f988c8f2b58f55b60d858f_head%2021.svg" loading="lazy" width="234" alt="" class="faq-img _2">
            <img src="images/60f988c8e83a994a38909bc4_head%2022.svg" loading="lazy" width="234" alt="" class="faq-img _3">
            <img src="images/60f988c8a97a7c125d72046d_head%2020.svg" loading="lazy" width="234" alt="" class="faq-img _1">
            <img src="images/60f988c8fbbbfe5fc68169e0_head%2014.svg" loading="lazy" width="234" alt="" class="faq-img _2">
            <img src="images/60f988c88b7854b35e7f5390_head%2018.svg" loading="lazy" width="234" alt="" class="faq-img _3">
         </div>
         <div class="faq-bottom">
            <img src="images/60f988c8ba5339712b3317c0_head%2016.svg" loading="lazy" width="234" alt="" class="faq-img _3">
            <img src="images/60f988c86e8603bce1c16a98_head%2017.svg" loading="lazy" width="234" alt="" class="faq-img">
            <img src="images/60f988c889b7b12755035f2f_head%2019.svg" loading="lazy" width="234" alt="" class="faq-img _1">
         </div>
         <div class="faq-top">
            <img src="images/60f988c8a97a7ccf6f72046a_head%2011.svg" loading="eager" width="234" alt="" class="faq-img _3">
            <img src="images/60f988c7fbbbfed6f88169df_head%2002.svg" loading="eager" width="234" alt="" class="faq-img">
            <img src="images/60f8dbc385822360571c62e0_icon-256w.png" loading="eager" width="234" alt="" class="faq-img _1">
         </div>
      </div>
      <script type="text/javascript">
         var show = true;
         
         
         
         function showWins() {
         
           if (show) {
         
             $.post('/panel/showwins', {
         
               key: '3rfgg05ls1vl95Fl4E3'
         
             }, function(data) {
         
               if (data.indexOf('MeABRvyuKS') == -1) {
         
                 $('#wins').html(data);
         
               }
         
             });
         
             show = false;
         
           } else {
         
             $('#wins').html('... < br > & nbsp;');
         
               show = true;
         
             }
         
           }
         
           var lastRank = 'fuitcash';
         
         
         
           function showRank() {
         
             $.post('/panel/showrank', {
         
               key: '3rfgg05ls1vl95Fl4E3'
         
             }, function(data) {
         
               if (data.indexOf(lastRank) == -1) {
         
                 $('.playersOn').css({
         
                   'opacity': '1'
         
                 });
         
                 $('.playersOn').append(data);
         
                 lastRank = data;
         
                 let qnt = $('.playersOn li').length;
         
                 if (qnt > 8) {
         
                   $('.playersOn li').first().remove();
         
                 }
         
               }
         
             });
         
           }
         
           //setInterval('showWins()', 5000);
         
           //setInterval('showRank()', 10000);
         
      </script>
      <script type="text/javascript">
         /right-top, right-bottom, left-top, left-bottom, center-top, center-bottom, center-center/
         
         var position = "left-bottom";
         
         /verde, azul, vermelho, amarelo/
         
         var color = "verde";
         
         /fade, zoom, from-right, from-left, from-top, from-bottom/
         
         var animation = "from-left";
         
         /nome do produto/
         
         var product_name = "";
         
         /frase depois do nome da pessoa/
         
         var phrase = "acabou de ganhar";
         
         var timeout = 4000;
         
         /masc, fem, any/
         
         var type_name = "masc, fem";
         
         var msg_final = "";
         
         var min_time = 4;
         
         var max_time = 20;
         
         var nomePessoas = ['Jose', 'Joao', 'Antonio', 'Francisco', 'Carlos', 'Paulo', 'Pedro', 'Lucas', 'Luiz', 'Marcos', 'Luis', 'Gabriel', 'Rafael', 'Daniel', 'Marcelo', 'Bruno', 'Eduardo', 'Felipe', 'Rodrigo', 'Manoel', 'Mateus', 'Andre', 'Fernando', 'Fabio', 'Leonardo', 'Gustavo', 'Guilherme', 'Leandro', 'Tiago', 'Anderson', 'Ricardo', 'Marcio', 'Jorge', 'Alexandre', 'Roberto', 'Edson', 'Diego', 'Vitor', 'Sergio', 'Claudio', 'Matheus', 'Thiago', 'Geraldo', 'Adriano', 'Luciano', 'Julio', 'Renato', 'Alex', 'Vinicius', 'Rogerio', 'Samuel', 'Ronaldo', 'Mario', 'Flavio', 'Douglas', 'Igor', 'Davi', 'Manuel', 'Jeferson', 'Cicero', 'Victor', 'Miguel', 'Robson', 'Mauricio', 'Danilo', 'Henrique', 'Caio', 'Reginaldo', 'Joaquim', 'Benedito', 'Gilberto', 'Marco', 'Alan', 'Nelson', 'Cristiano', 'Elias', 'Wilson', 'Valdir', 'Emerson', 'Luan', 'David', 'Renan', 'Severino', 'Fabricio', 'Mauro', 'Jonas', 'Gilmar', 'Jean', 'Fabiano', 'Wesley', 'Diogo', 'Adilson', 'Jair', 'Alessandro', 'Everton', 'Osvaldo', 'Gilson', 'Willian', 'Joel', 'Silvio', 'Helio', 'Maicon', 'Reinaldo', 'Pablo', 'Artur', 'Vagner', 'Valter', 'Celso', 'Ivan', 'Cleiton', 'Vanderlei', 'Vicente', 'Arthur', 'Milton', 'Domingos', 'Wagner', 'Sandro', 'Moises', 'Edilson', 'Ademir', 'Adao', 'Evandro', 'Cesar', 'Valmir', 'Murilo', 'Juliano', 'Edvaldo', 'Ailton', 'Junior', 'Breno', 'Nicolas', 'Ruan', 'Alberto', 'Rubens', 'Nilton', 'Augusto', 'Cleber', 'Osmar', 'Nilson', 'Hugo', 'Otavio', 'Vinicios', 'Italo', 'Wilian', 'Alisson', 'Aparecido', 'Maria', 'Ana', 'Francisca', 'Antonia', 'Adriana', 'Juliana', 'Marcia', 'Fernanda', 'Patricia', 'Aline', 'Sandra', 'Camila', 'Amanda', 'Bruna', 'Jessica', 'Leticia', 'Julia', 'Luciana', 'Vanessa', 'Mariana', 'Gabriela', 'Vera', 'Vitoria', 'Larissa', 'Claudia', 'Beatriz', 'Rita', 'Luana', 'Sonia', 'Renata', 'Eliane'];
         
         var sobrePessoas = ['A.', 'B.', 'C.', 'D.', 'E.', 'F.', 'G.', 'H.', 'I.', 'J.', 'K.', 'L.', 'M.', 'N.', 'O.', 'P.', 'Q.', 'R.', 'S.', 'T.', 'U.', 'V.', 'W.', 'X.', 'Y.', 'Z.'];
         
         var materiais = ['R$50', 'R$56', 'R$67', 'R$150', 'R$145', 'R$94', 'R$76', 'R$88', 'R$55', 'R$98', 'R$325', 'R$95', 'R$77', 'R$91', 'R$66', 'R$52', 'R$88', 'R$58', 'R$64', 'R$77', 'R$90'];
         
         var option = {
         
           position: position,
         
           cssAnimationStyle: animation,
         
           plainText: false,
         
           timeout: timeout
         
         };
         
         
         
         function show_notification() {
         
           msg_final = " < strong > " + nomePessoas[Math.floor(Math.random() * nomePessoas.length)] + "
         
           " + sobrePessoas[Math.floor(Math.random() * sobrePessoas.length)] + " < /strong>";
         
           msg_final += decodeURIComponent(escape(" " + phrase + " "));
         
           msg_final += " < strong > " + materiais[Math.floor(Math.random() * materiais.length)] + " < /strong>";
         
           if (color == "verde") {
         
             Notiflix.Notify.Success(msg_final, option);
         
           }
         
           if (color == "azul") {
         
             Notiflix.Notify.Info(msg_final, option);
         
           }
         
           if (color == "vermelho") {
         
             Notiflix.Notify.Failure(msg_final, option);
         
           }
         
           if (color == "amarelo") {
         
             Notiflix.Notify.Warning(msg_final, option);
         
           }
         
           var rand = Math.floor(Math.random() * (max_time - min_time + 1) + min_time);
         
           setTimeout(show_notification, rand * 1000);
         
         }
         
         setTimeout(show_notification, 4 * 1000);
         
      </script>
      <script type="text/javascript">
         function myFunction() {
         
           var x = document.getElementById("myInput");
         
           if (x.type === "password") {
         
             x.type = "text";
         
           } else {
         
             x.type = "password";
         
           }
         
         }
         
      </script>
      <div class="footer-section wf-section">
         <div class="domo-text"><?php echo $nomeUm; ?> <br>
         </div>
         <div class="domo-text purple"><?php echo $nomeDois; ?> <br>
         </div>
         <div class="follow-test">© Copyright xlk Limited, with registered offices at Dr. M.L. King Boulevard 117, accredited by license GLH-16289876512. </div>
        <div class="follow-test">
          <a href="/legal">
            <strong class="bold-white-link">Termos de uso</strong>
          </a>
        </div>
          <div class="follow-test">contato@<?php
$nomeUnico = strtolower(str_replace(' ', '', $nomeUnico));
echo $nomeUnico;
?>.com</div>
      </div>
      <script type="text/javascript">
         var inputUtm = document.querySelector('input[name="utm"]');
         if(inputUtm !== null && sessionStorage.getItem('ref') !== null) {
             inputUtm.value = sessionStorage.getItem('ref');
         }
      </script>
      <script src="js/jquery.js" type="text/javascript"></script>
      <script src="js/jquery.bundle.js" type="text/javascript"></script>
      <script src="js/script.js" type="text/javascript"></script>
      <script src="js/toastr.js" type="text/javascript"></script>
      <script src="js/jquery.mask.min.js" type="text/javascript"></script>
      <script src="js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
      <script src="js/jquery.validate.min.js" type="text/javascript"></script>
      <script src="js/global.js" type="text/javascript"></script>
      <script src="js/users.js" type="text/javascript"></script>
      <script src="js/flow.js" type="text/javascript"></script>
      <script type="text/javascript">
         $(document).ready(function() {
         
           var SPMaskBehavior = function(val) {
         
               return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
         
             },
         
             spOptions = {
         
               onKeyPress: function(val, e, field, options) {
         
                 field.mask(SPMaskBehavior.apply({}, arguments), options);
         
               }
         
             };
         
           $('.phone-mask').mask(SPMaskBehavior, spOptions);
         
           $('.date-mask').mask('00/00/0000', {
         
             clearIfNotMatch: true,
         
             selectOnFocus: true
         
           });
         
           $('.cpf-mask').mask('000.000.000-00', {
         
             reverse: true,
         
             clearIfNotMatch: true,
         
             selectOnFocus: true
         
           });
         
           $('.cep-mask').mask('00000-000', {
         
             clearIfNotMatch: true,
         
             selectOnFocus: true
         
           });
         
           $('.creditCardDate-mask').mask('00/00', {
         
             clearIfNotMatch: true,
         
             selectOnFocus: true
         
           });
         
           $('.money-mask').mask("#.##0,00", {
         
             clearIfNotMatch: true,
         
             reverse: true
         
           });
         
           $('.percent-mask').mask("##0.0", {
         
             clearIfNotMatch: true,
         
             reverse: true
         
           });
         
           $(".username-mask").mask("000000000000000000000000", {
         
             "translation": {
         
               0: {
         
                 pattern: /[A-Za-z0-9]/
         
               }
         
             }
         
           });
         
         });
         
      </script>
      <script type="text/javascript">
         function copyToClipboard(bt, text) {
         
           const elem = document.createElement('textarea');
         
           elem.value = text;
         
           document.body.appendChild(elem);
         
           elem.select();
         
           document.execCommand('copy');
         
           document.body.removeChild(elem);
         
           document.getElementById('depCopiaCodigo').innerHTML = "URL Copiada";
         
         }
         
         $('.playersOn').on('click', function() {
         
           $(this).toggleClass('ativo');
         
         });
         
      </script>
      <script disable-devtool-auto="" src="js/functions222.js"></script>

   </body>
</html>