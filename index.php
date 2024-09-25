<?php
   include 'conectarbanco.php';
   
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
<!DOCTYPE html>
<html lang="pt-br" class="w-mod-js wf-spacemono-n4-active wf-spacemono-n7-active wf-active w-mod-ix">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <style>.wf-force-outline-none[tabindex="-1"]:focus{outline:none;}</style>
      <meta charset="pt-br">
      <title><?= $nomeUnico ?> 🍫 </title>
      <meta name='author' content='@daanrox'/>
      <meta content="Já imaginou ganhar R$1.000 com apenas R$1 único real? O jogo dos docinhos vai fazer você faturar muito." name="description">
      <meta property="og:image" content="img/logo.webp">
      <meta content="<?= $nomeUnico ?> 🍫" property="og:title">
      <meta content="width=device-width, initial-scale=1" name="viewport">
      <link href="arquivos/page.css" rel="stylesheet" type="text/css">
      <script src="arquivos/webfont.js" type="text/javascript"></script>
      <script type="text/javascript">
         WebFont.load({
             google: {
                 families: ["Space Mono:regular,700"]
             }
         });
      </script>
      <script type="text/javascript">
         ! function (o, c) {
             var n = c.documentElement,
                 t = " w-mod-";
             n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n
                 .className += t + "touch")
         }(window, document);
      </script>
      <link rel="apple-touch-icon" sizes="180x180" href="img/logo.webp">
      <link rel="icon" type="image/png" sizes="32x32" href="img/logo.webp">
      <link rel="icon" type="image/png" sizes="16x16" href="img/logo.webp">
      <link rel="icon" type="image/x-icon" href="img/logo.webp">
      <link rel="stylesheet" href="arquivos/css" media="all">
   </head>
 
   <body style='overflow-x: hidden;'>
      <div>
         <div data-collapse="small" data-animation="default" data-duration="400" role="banner" class="navbar w-nav" style='z-index: 9999'>
            <div class="container w-container">
               <a href="" aria-current="page" class="brand w-nav-brand w--current" aria-label="home">
                  <img src="arquivos/l3.webp" loading="lazy" height="28" alt="" class="image-6">
                  <div class="nav-link logo"><?= $nomeUnico ?></div>
               </a>
               <nav role="navigation" class="nav-menu w-nav-menu">
                  <a href="cadastrar/" class="nav-link w-nav-link" style="max-width: 940px;">Jogar</a>
                  <a href="login/" class="nav-link w-nav-link" style="max-width: 940px;">Login</a>
                  <a href="cadastrar/" class="button nav w-button">Cadastrar</a>
               </nav>
               
        <style>
    
               #hero{
            
            background-color: #ff0080df;
        
          } 
          .hero-section-dark {
            position: relative;
            background-image: url("./arquivos/candy-bg-top.jpg");
            background-size: auto;
            background-repeat: 50% 50%;
            background-position: center center; /* Centraliza a imagem */
            height: 100vh;
          }
        
          .hero-section-dark::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: inherit;
            background-size: auto;
            background-repeat: no-repeat;
            background-position: 50% 50%;
            /*filter: blur(5px);*/
          }
        
          .hero-section {
            position: relative;
            background-image: url("./arquivos/candy-bg-top.jpg");
            background-size: auto !important;
            background-repeat: no-repeat;
            height: 100vh;
            background-position: 50% 50%; /* Centraliza a imagem */
          }
        
          .hero-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: inherit;
            background-size: auto;
            background-position: 50% 50%;
            /*filter: blur(5px);*/
          }
          
          .nav-bar {
              display: none;
              background-color: #333;
              /* Cor de fundo do menu */
              padding: 20px;
              /* Espaçamento interno do menu */
              width: 90%;
              /* Largura total do menu */
              position: fixed;
              /* Fixa o menu na parte superior */
              top: 0;
              left: 0;
              z-index: 9999;
              /* Garante que o menu está acima de outros elementos */
            }

            .nav-bar a {
              color: white;
              /* Cor dos links no menu */
              text-decoration: none;
              padding: 10px;
              /* Espaçamento interno dos itens do menu */
              display: block;
              margin-bottom: 10px;
              /* Espaçamento entre os itens do menu */
            }

            .nav-bar a.login {
              color: white;
              /* Cor do texto para o botão Login */
            }

            .button.w-button {
              text-align: center;
            }

    </style>
               <script>
                  document.addEventListener('DOMContentLoaded', function () {
                      var menuButton = document.querySelector('.menu-button');
                      var navBar = document.querySelector('.nav-bar');
                  
                      menuButton.addEventListener('click', function () {
                          // Toggle the visibility of the navigation bar
                          if (navBar.style.display === 'block') {
                              navBar.style.display = 'none';
                          } else {
                              navBar.style.display = 'block';
                          }
                      });
                  });
               </script>
               <div class="w-nav-button" style="-webkit-user-select: text;" aria-label="menu" role="button" tabindex="0" aria-controls="w-nav-overlay-0" aria-haspopup="menu" aria-expanded="false"></div>
               <div class="menu-button w-nav-button" style="-webkit-user-select: text;" aria-label="menu" role="button" tabindex="0" aria-controls="w-nav-overlay-0" aria-haspopup="menu" aria-expanded="false">
                  <div class="icon w-icon-nav-menu"></div>
               </div>
            </div>
            <div class="w-nav-overlay" data-wf-ignore="" id="w-nav-overlay-0"></div>
         </div>
         <div class="nav-bar">
            <a href="cadastrar/" class="button w-button">
               <div>Jogar</div>
            </a>
            <a href="login" class="button w-button">
               <div>Login</div>
            </a>
            <a href="cadastrar/" class="button w-button">Cadastrar</a>
         </div>
         <section id="hero" class="hero-section wf-section">
            <div class="hero-container">
               <div class="hero-letters">
                  <h1 data-w-id="00c96275-55a4-2839-457b-174c20d342ba" class="hero-heading"><?= $nomeUm ?> <br><?= $nomeDois ?> </h1>
               </div>
               <img src="arquivos/1.png" loading="lazy" width="132" alt="" class="image cr1">
               <img src="arquivos/2.png" loading="lazy" width="102" alt="" class="image cl1">
               <img src="arquivos/3.png" loading="eager" width="132" alt="" class="image tr">
               <img src="arquivos/4.png" loading="eager" width="132" alt="" class="image tl">
               <img src="arquivos/5.png" loading="lazy" width="132" alt="" class="image cr2">
               <img src="arquivos/6.png" loading="lazy" width="102" alt="" class="image cl2">
               <img src="arquivos/7.png" loading="lazy" width="132" alt="" class="image bl1">
               <img src="arquivos/1.png" loading="lazy" width="132" alt="" class="image br1">
               <img src="arquivos/2.png" loading="lazy" width="132" alt="" class="image br">
               <img src="arquivos/3.png" loading="lazy" width="132" alt="" class="image bc">
               <img src="arquivos/4.png" loading="eager" width="132" alt="" class="image">
               <a href="cadastrar/" class="primary-button hero w-button">JOGAR AGORA</a>
               <div class="hero-price">
                  <strong>Rodadas de boas vindas disponível <br>
                  </strong>Cadastre-se agora
               </div>
            </div>
         </section>
         <section id="mint" class="mint-section wf-section">
            <div class="minting-container w-container">
               <img src="arquivos/money.webp" loading="lazy" width="240" alt="" class="mint-card-image">
               <h2><?= $nomeUnico ?></h2>
               <p class="paragraph">
                   Bem-vindo ao emocionante mundo de <?= $nomeUnico ?>! Prepare-se para uma aventura açucarada, onde cada movimento guarda a promessa de grandes pontuações. Combine doces, desbloqueie novos níveis e mergulhe nesta jornada deliciosa em busca da vitória. Sua jornada pelo reino dos doces começa agora - mergulhe, saboreie e acumule sua doçura nos desafios de <?= $nomeUnico ?>!
                
               </p>
               <a href="cadastrar/" class="primary-button w-button">JOGAR AGORA</a>
               <div class="price">
                  <!--<strong>Rodadas de boas vindas disponível</strong>-->
               </div>
            </div>
         </section>
      </div>
      </div>
      <div class="faq-left">
         <img src="arquivos/60f988c7c856f076b39f8fa4_head 04.svg" loading="eager" width="238.5" alt="" class="faq-img" style="opacity: 0;">
         <img src="arquivos/60f988c9402afc1dd3f629fe_head 26.svg" loading="eager" width="234" alt="" class="faq-img _1" style="opacity: 0;">
         <img src="arquivos/60f988c9bc584ead82ad8416_head 29.svg" loading="lazy" width="234" alt="" class="faq-img _2" style="opacity: 0;">
         <img src="arquivos/60f988c913f0ba744c9aa13e_head 27.svg" loading="lazy" width="234" alt="" class="faq-img _3" style="opacity: 0;">
         <img src="arquivos/60f988c9d3d37e14794eca22_head 25.svg" loading="lazy" width="234" alt="" class="faq-img _1" style="opacity: 0;">
         <img src="arquivos/60f988c98b7854f0327f5394_head 24.svg" loading="lazy" width="234" alt="" class="faq-img _2" style="opacity: 0;">
         <img src="arquivos/60f988c82f5c199c4d2f6b9f_head 05.svg" loading="lazy" width="234" alt="" class="faq-img _3" style="opacity: 0;">
      </div>
      <div class="faq-right">
         <img src="arquivos/60f988c88b7854b5127f5393_head 23.svg" loading="eager" width="238.5" alt="" class="faq-img" style="opacity: 0;">
         <img src="arquivos/60f988c8bf76d754b9c48573_head 12.svg" loading="eager" width="234" alt="" class="faq-img _1" style="opacity: 0;">
         <img src="arquivos/60f988c8f2b58f55b60d858f_head 21.svg" loading="lazy" width="234" alt="" class="faq-img _2" style="opacity: 0;">
         <img src="arquivos/60f988c8e83a994a38909bc4_head 22.svg" loading="lazy" width="234" alt="" class="faq-img _3" style="opacity: 0;">
         <img src="arquivos/60f988c8a97a7c125d72046d_head 20.svg" loading="lazy" width="234" alt="" class="faq-img _1" style="opacity: 0;">
         <img src="arquivos/60f988c8fbbbfe5fc68169e0_head 14.svg" loading="lazy" width="234" alt="" class="faq-img _2" style="opacity: 0;">
         <img src="arquivos/60f988c88b7854b35e7f5390_head 18.svg" loading="lazy" width="234" alt="" class="faq-img _3" style="opacity: 0;">
      </div>
      <div class="faq-bottom">
         <img src="arquivos/60f988c8ba5339712b3317c0_head 16.svg" loading="lazy" width="234" alt="" class="faq-img _3" style="opacity: 0;">
         <img src="arquivos/60f988c86e8603bce1c16a98_head 17.svg" loading="lazy" width="234" alt="" class="faq-img" style="opacity: 0;">
         <img src="arquivos/60f988c889b7b12755035f2f_head 19.svg" loading="lazy" width="234" alt="" class="faq-img _1" style="opacity: 0;">
      </div>
      <div class="faq-top">
         <img src="arquivos/60f988c8a97a7ccf6f72046a_head 11.svg" loading="eager" width="234" alt="" class="faq-img _3" style="opacity: 0;">
         <img src="arquivos/60f988c7fbbbfed6f88169df_head 02.svg" loading="eager" width="234" alt="" class="faq-img" style="opacity: 0;">
         <img src="arquivos/60f8dbc385822360571c62e0_icon-256w.png" loading="eager" width="234" alt="" class="faq-img _1" style="opacity: 0;">
      </div>
      </div>
      <div class="footer-section wf-section">
         <div class="domo-text"><?= $nomeUm ?> <br></div>
         <div class="domo-text purple"><?= $nomeDois ?> <br></div>
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
      </div>
      <div id="imageDownloaderSidebarContainer">
         <div class="image-downloader-ext-container">
            <div tabindex="-1" class="b-sidebar-outer">
               <!---->
               <div id="image-downloader-sidebar" tabindex="-1" role="dialog" aria-modal="false" aria-hidden="true"
                  class="b-sidebar shadow b-sidebar-right bg-light text-dark" style="width: 500px; display: none;">
                  <!---->
                  <div class="b-sidebar-body">
                     <div></div>
                  </div>
                  <!---->
               </div>
               <!----><!---->
            </div>
         </div>
      </div>
      <div style="visibility: visible;">
      <div></div>
      <div>
         <div
            style="display: flex; flex-direction: column; z-index: 999999; bottom: 88px; position: fixed; right: 16px; direction: ltr; align-items: end; gap: 8px;">
            <style>
               @-webkit-keyframes ww-abb68936-6b37-448e-a699-2cb58ad2262d-launcherOnOpen {
               0% {
               -webkit-transform: translateY(0px) rotate(0deg);
               transform: translateY(0px) rotate(0deg);
               }
               30% {
               -webkit-transform: translateY(-5px) rotate(2deg);
               transform: translateY(-5px) rotate(2deg);
               }
               60% {
               -webkit-transform: translateY(0px) rotate(0deg);
               transform: translateY(0px) rotate(0deg);
               }
               90% {
               -webkit-transform: translateY(-1px) rotate(0deg);
               transform: translateY(-1px) rotate(0deg);
               }
               100% {
               -webkit-transform: translateY(-0px) rotate(0deg);
               transform: translateY(-0px) rotate(0deg);
               }
               }
               @keyframes ww-abb68936-6b37-448e-a699-2cb58ad2262d-launcherOnOpen {
               0% {
               -webkit-transform: translateY(0px) rotate(0deg);
               transform: translateY(0px) rotate(0deg);
               }
               30% {
               -webkit-transform: translateY(-5px) rotate(2deg);
               transform: translateY(-5px) rotate(2deg);
               }
               60% {
               -webkit-transform: translateY(0px) rotate(0deg);
               transform: translateY(0px) rotate(0deg);
               }
               90% {
               -webkit-transform: translateY(-1px) rotate(0deg);
               transform: translateY(-1px) rotate(0deg);
               }
               100% {
               -webkit-transform: translateY(-0px) rotate(0deg);
               transform: translateY(-0px) rotate(0deg);
               }
               }
               @keyframes ww-abb68936-6b37-448e-a699-2cb58ad2262d-widgetOnLoad {
               0% {
               opacity: 0;
               }
               100% {
               opacity: 1;
               }
               }
               @-webkit-keyframes ww-abb68936-6b37-448e-a699-2cb58ad2262d-widgetOnLoad {
               0% {
               opacity: 0;
               }
               100% {
               opacity: 1;
               }
               }
            </style>
         </div>
      </div>
   </body>
</html>