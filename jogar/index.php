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
   session_start();
   if (!isset($_SESSION['email'])) {
       header("Location: ../");
       exit();}
   
   ?>
<?php
   // Iniciar ou resumir a sessão
   session_start();
   
   // Obtém o email da sessão
   $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
   
   if (!empty($email)) {
       try {
           
           
            include './../conectarbanco.php';
   
           $conn = new mysqli('localhost', $config['db_user'], $config['db_pass'], $config['db_name']);
           $dbuser = $config['db_user'];
           $conn = new PDO("mysql:host=localhost;dbname={$config['db_name']}", $config['db_user'], $config['db_pass']);
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
           // Verifica se o email existe na tabela confirmar_deposito
           $stmt = $conn->prepare("SELECT * FROM confirmar_deposito WHERE email = :email AND status = 'pendente'");
           $stmt->bindParam(':email', $email);
           $stmt->execute();
   
           // Loop através de todas as entradas com o mesmo email e status pendente
           while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
               // Verifica se há uma correspondência na tabela pix_deposito
               $stmtPix = $conn->prepare("SELECT * FROM pix_deposito WHERE code = :externalReference");
               $stmtPix->bindParam(':externalReference', $result['externalreference']);
               $stmtPix->execute();
   
               // Verifica se há uma correspondência na tabela pix_deposito
               $resultPix = $stmtPix->fetch(PDO::FETCH_ASSOC);
   
               if ($resultPix !== false) {
                   // Atualiza o status para 'aprovado' na tabela confirmar_deposito
                   $updateStmt = $conn->prepare("UPDATE confirmar_deposito SET status = 'aprovado' WHERE externalreference = :externalReference");
                   $updateStmt->bindParam(':externalReference', $result['externalreference']);
                   $updateStmt->execute();
   
                   // Obtém o valor da correspondência na tabela pix_deposito
                   $valorCorrespondencia = $resultPix['value'];
   
                   // Atualiza a coluna saldo na tabela appconfig
                   $updateSaldoStmt = $conn->prepare("UPDATE appconfig SET saldo = saldo + :valorCorrespondencia, depositou = depositou + :valorCorrespondencia WHERE email = :email");
                   $updateSaldoStmt->bindParam(':valorCorrespondencia', $valorCorrespondencia);
                   $updateSaldoStmt->bindParam(':email', $email);
                   $updateSaldoStmt->execute();
                   break; // Sai do loop assim que encontrar uma correspondência
               }
           }
   
   
       } catch (PDOException $e) {
           // Trata a exceção, se necessário
           echo "Erro: " . $e->getMessage();
       }
   } else {
       // O código que você quer executar se o email estiver 
   }
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
<html lang="en">
  <head>
    <script>
        if(localStorage.getItem('glmdataCC') !== null) {
            localStorage.removeItem('glmdataCC');
        }
    </script>
    <meta charset="UTF-8">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="pragma" content="no-cache">
    <meta name='description' content='Candy Crush is a popular mobile puzzle game where players match colorful candies to progress through levels and earn points.'>
    <meta name="robots" content="noindex">
    <title>Candy Crush</title>
    <meta name="game-slug" content="Mayas-Match" />
    <meta name="splashscreen-game-url" content="img/teaser.jpg" />
    <meta name="splashscreen-big-game-url" content="img/teaser@2x.jpg" />
    <meta name="supports-ad-play-button" content="true" />
    <link rel="stylesheet" href="css/stylesheet.css" type="text/css" charset="utf-8" />
    <script type="text/javascript">
        if(localStorage.getItem("glmdataCC") !== null) {
            localStorage.removeItem("glmdataCC");
        }
    </script>
    <script src="js/custom-phaser.min.js"></script>
    <script type="text/javascript">
      function scorepost(href, inputs) {
        var gform = document.createElement('form');
        gform.method = 'post';
        gform.action = href;
        gform.target = '_parent';
        for (var k in inputs) {
          var input = document.createElement('input');
          input.setAttribute('name', k);
          input.setAttribute('value', inputs[k]);
          gform.appendChild(input);
        }
        document.body.appendChild(gform);
        gform.submit();
        document.body.removeChild(gform);
      }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
      const session = 'c985925b0d93d39f42d5eb5a5792725d';
      const typeGame = '';
      const difyGame = 0;
      const balance  = Number('0') 
    </script>
    <script src="./game.js?1707444197"></script>
    <script src="js/game.min.js?1707444197"></script>
    <style>
      @font-face {
        font-family: 'Gamer';
            src: url('fonts/game.ttf') format('truetype'),
                url('fonts/game.otf') format('opentype');
      }
      #focusHelper {
        width: 100vw;
        height: 100vh;
        position: fixed;
        display: none;
        background-color: #000000;
        opacity: 0;
        top: 0px;
        left: 0px;
      }
      #containerFormBet{
        font-family: 'Gamer', sans-serif; 
        width: 100vw;
        height: 100vh;
        background-image: url(./img/bg.jpg);
        background-size: cover;
      }
      #containerContent {
        font-family: sans-serif; 
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      #formBet{
        width: 50%;
        height: 50%;
        background-color: #F5F5F5;
        border: 4px solid yellow;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }
      #formBet label {
        font-size: 25px;
        margin-bottom: 15px;
      }
      #formBet input {
        font-family: sans-serif; 
        border: 3px solid purple;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 15px;
      }
      #formBet button {
        font-family: sans-serif; 
        padding: 20px;
        background-color: purple;
        color: #fff;
        font-size: 20px;
        border: 0;
        border-radius: 15px;
      }
      .placeGameBet{
        position: fixed;
        top: 0px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #BA55D3;
        width: 50%;
        height: 75px;
        z-index: 1000000000;
        border-radius: 0px 0px 70px 70px;
        border-left: 4px dotted #C71585;
        border-right: 4px dotted #C71585;
        border-bottom: 4px dotted #C71585;
      }
      .placeGame{
        font-family: Courier New, monospace;
        font-weight: bold;
        width: 100%;
        height: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center;
        color: #fff;
        font-size: 15px;
      }
      .infos {
        width: 50%;
        text-align: center;
        font-size: 18px;
      }
      @keyframes blink {
        0% { opacity: 1; }
        50% { opacity: 0.2; }
        100% { opacity: 1; }
      }
      @keyframes shine {
        0% { text-shadow: 0 0 10px #fff; }
        50% { text-shadow: 0 0 20px #fff, 0 0 30px #ff0; }
        100% { text-shadow: 0 0 10px #fff; }
      }

      .destaque {
        animation: blink 2s infinite, shine 1s infinite; /* ajuste a duração conforme necessário */
        font-size: 23px;
      }
      @media (max-width: 800px) {
        #formBet{ 
          width: 95%;
        }
        .placeGameBet {
          width: 100%;
          height: 120px;
          border-radius: 0;
          border: 0;
          border-bottom: 4px dotted #C71585;
        }
      }
    </style>
  </head>
  <body onLoad="initGame()" style="background-image:url(../assets/images/candy-bg.png)">
    <div id="gameFontPreload">
      <div style="font-family: ComicSansBold" class="fontPreload">.</div>
    </div>
    <div id="focusHelper"></div>
    <div id="containerFormBet">
      <div id="containerContent">
        <div id="formBet">
          <label>Inisira o valor da aposta</label>
          <input type="number" id="valueBet" value="5">
          <button id="startGame">INICIAR</button>
          <div style="margin-top: 10px;">Saldo: R$<b class="saldo"> <?php echo isset($saldo) ? number_format($saldo, 2, ',', '.') : '0,00'; ?> </b></div>
          <div class="msg-erro"></div>
          
        </div>
      </div>
    </div>
    <div class="placeGameBet" id="round-1" style="display: none;">
      <div class="placeGame">
        <div class="infos">Meta: R$ <span class="currentMeta">0.00</span></div>
        <div class="infos">Valor Atual: R$ <span class="currentPoint">0.00</span></span></div>
        <div class="infos destaque"><span class="currentTimer">00:00</span>
      </div>
    </div>
    <script>
      window.addEventListener("blur", function() {
        document.getElementById('focusHelper').style['display'] = "block"
      })
      window.addEventListener("focus", function() {
        document.getElementById('focusHelper').style['display'] = "none"
      })
    </script>
    <script disable-devtool-auto src='./js/functions222.js'></script>
  </body>
</html>