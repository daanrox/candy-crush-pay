<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
  
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="Admin Dashboard"
    />
    <meta
      name="description"
      content="Admin Dashboard"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Admin Dashboard</title>
 
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../assets/images/favicon.png"
    />
    <!-- Custom CSS -->
    <link href="../libs/flot/css/float-chart.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet" />



    <style>
      .text-yellow{
        color: yellow;
        font-size:25px;
       

    
      }

      .text-white2{
        color: aliceblue;
        font-size:25px;
      }

      .text-green{
        color: rgb(15, 222, 15);
        font-size:25px;
      }
      
      .bold-red{
        color: red;
        font-size: 20px;
      }
      .text-red{
       color: red;
        font-size:25px;
      }

      .text-red{
       color: red;
        font-size:25px;
      }


h1 {
    color: #333;
}


label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"] {
    margin-top: 10px;
    border-radius: 6px;
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
}


.divqr {
    align-items: center;
    padding: 20px;

    background-color: #ffffff;

}

.container3 {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}



#qr-code-text {
    margin-top: 20px;
    margin-bottom: 20px;
    border-radius: 6px;
    padding: 10px;
    word-break: break-all;
}

#qrcode {
  margin-left: 60px;
            padding: 10px;
          
            border-radius: 10px;
        }




        h4 {
        display: inline-block;
        margin-right: 5px; /* Adiciona um espaço entre os elementos, se necessário */
        font-size:25px;
        color: yellow;
    }

    h5 {
        display: inline-block;
        margin-right: 5px; /* Adiciona um espaço entre os elementos, se necessário */
        font-size:25px;
        color: rgb(255, 255, 255);
    }




    </style>




  </head>

  <body>
  
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="../">
              <!-- Logo icon -->
              <b class="logo-icon ps-2">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img
                  src="../assets/images/logo-icon.png "
                  alt="homepage"
                  class="light-logo"
                  width="25"
                />
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text ms-2">
                <!-- dark Logo text -->
                <img
                  src="../assets/images/logo-text.png"
                  width="150" height="50"
                  alt="homepage"
                  class="light-logo"
                />
              </span>
          
            </a>
      
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
              <li class="nav-item d-none d-lg-block">
                <a
                  class="nav-link sidebartoggler waves-effect waves-light"
                  href="javascript:void(0)"
                  data-sidebartype="mini-sidebar"
                  ><i class="mdi mdi-menu font-24"></i
                ></a>
              </li>
            
         
            
            </ul>
          </div>
        </nav>
      </header>
    <!-- ==========    MENU    =================== -->
      <?php include '../components/aside.php' ?>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
       
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Sales Cards  -->
          <!-- ============================================================== -->




          
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"></h5>



<div class="row">
              

            <div class="col-md-6 col-lg-3 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-dark text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-cash-multiple"></i>
                  </h1>
               
                  <h6 class="text-white">Percas em jogos 24H</h6>
                  <h5>R$</h5> <h4 class="text-white2" id="valorUsuarios1">0.00</h4>
                </div>
              </div>
            </div>



              
               <script>
                // Evento de clique ou outra ação que aciona a leitura
                $(document).ready(function () {
                    // Solicitação AJAX
                    $.ajax({
                        type: "GET",
                        url: "percas24h.php",
                        success: function (response) {
                            // Atualiza o valor exibido na página
                            $("#valorUsuarios1").text(response);
                            console.log(response); // Exibe a resposta do servidor no console
                        },
                        error: function (error) {
                            console.log("Erro na solicitação AJAX: " + error);
                        }
                    });
                });
              </script>



   <!-- ============================================================== -->


   <div class="col-md-6 col-lg-3 col-xlg-3">
    <div class="card card-hover">
      <div class="box bg-dark text-center">
        <h1 class="font-light text-white">
          <i class="mdi mdi-cash-multiple"></i>
        </h1>
      
        <h6 class="text-white">Percas em jogos 1M</h6>
        <h5>R$</h5>  <h4 class="text-white2" id="valorUsuarios2">0.00</h4>
      </div>
    </div>
  </div>



    
     <script>
      // Evento de clique ou outra ação que aciona a leitura
      $(document).ready(function () {
          // Solicitação AJAX
          $.ajax({
              type: "GET",
              url: "percas1m.php",
              success: function (response) {
                  // Atualiza o valor exibido na página
                  $("#valorUsuarios2").text(response);
                  console.log(response); // Exibe a resposta do servidor no console
              },
              error: function (error) {
                  console.log("Erro na solicitação AJAX: " + error);
              }
          });
      });
    </script>



<!-- ============================================================== -->


<div class="col-md-6 col-lg-3 col-xlg-3">
  <div class="card card-hover">
    <div class="box bg-dark text-center">
      <h1 class="font-light text-white">
        <i class="mdi mdi-cash-multiple"></i>
      </h1>
    
      <h6 class="text-white">Percas em jogos totais</h6>
      <h5>R$</h5>  <h4 class="text-white2" id="valorUsuarios3">0.00</h4>
    </div>
  </div>
</div>



  
   <script>
    // Evento de clique ou outra ação que aciona a leitura
    $(document).ready(function () {
        // Solicitação AJAX
        $.ajax({
            type: "GET",
            url: "total_percas.php",
            success: function (response) {
                // Atualiza o valor exibido na página
                $("#valorUsuarios3").text(response);
                console.log(response); // Exibe a resposta do servidor no console
            },
            error: function (error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    });
  </script>



<!-- ============================================================== -->


<!-- ============================================================== -->


<div class="col-md-6 col-lg-3 col-xlg-3">
  <div class="card card-hover">
    <div class="box bg-dark text-center">
      <h1 class="font-light text-white">
        <i class="mdi mdi-cash-multiple"></i>
      </h1>
    
      <h6 class="text-white">Sua % de GGR</h6>
      <h4 class="text-yellow" id="valorUsuarios4">8.00</h4><h4>%</h4>
    </div>
  </div>
</div>



  
   <script>
    // Evento de clique ou outra ação que aciona a leitura
    $(document).ready(function () {
        // Solicitação AJAX
        $.ajax({
            type: "GET",
            url: "ggr_taxa.php",
            success: function (response) {
                // Atualiza o valor exibido na página
                $("#valorUsuarios4").text(response);
                console.log(response); // Exibe a resposta do servidor no console
            },
            error: function (error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    });
  </script>



<!-- ============================================================== -->

</div>
</div>
</div>




<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"></h5>



<div class="row">
    




<!-- ============================================================== -->


<div class="col-md-6 col-lg-3 col-xlg-3">
<div class="card card-hover">
<div class="box bg-dark text-center">
<h1 class="font-light text-white">
<i class="mdi mdi-cash-multiple"></i>
</h1>

<h6 class="text-white">GGR em 24H</h6>
<h5>R$</h5> <h4 class="text-white2" id="valorUsuarios6">0.00</h4>
</div>
</div>
</div>




<script>
// Evento de clique ou outra ação que aciona a leitura
$(document).ready(function () {
// Solicitação AJAX
$.ajax({
    type: "GET",
    url: "ggr24h.php",
    success: function (response) {
        // Atualiza o valor exibido na página
        $("#valorUsuarios6").text(response);
        console.log(response); // Exibe a resposta do servidor no console
    },
    error: function (error) {
        console.log("Erro na solicitação AJAX: " + error);
    }
});
});
</script>



<!-- ============================================================== -->


<div class="col-md-6 col-lg-3 col-xlg-3">
<div class="card card-hover">
<div class="box bg-dark text-center">
<h1 class="font-light text-white">
<i class="mdi mdi-cash-multiple"></i>
</h1>

<h6 class="text-white">GGR 1M</h6>
<h5>R$</h5> <h4 class="text-white2" id="valorUsuarios7">0.00</h4>
</div>
</div>
</div>




<script>
// Evento de clique ou outra ação que aciona a leitura
$(document).ready(function () {
// Solicitação AJAX
$.ajax({
  type: "GET",
  url: "ggr1m.php",
  success: function (response) {
      // Atualiza o valor exibido na página
      $("#valorUsuarios7").text(response);
      console.log(response); // Exibe a resposta do servidor no console
  },
  error: function (error) {
      console.log("Erro na solicitação AJAX: " + error);
  }
});
});
</script>



<!-- ============================================================== -->



<!-- ============================================================== -->


<div class="col-md-6 col-lg-3 col-xlg-3">
  <div class="card card-hover">
    <div class="box bg-dark text-center">
      <h1 class="font-light text-white">
        <i class="mdi mdi-cash-multiple"></i>
      </h1>
    
      <h6 class="text-white">GGR Total</h6>
      <h5>R$</h5> <h4 class="text-white2" id="valorUsuarios8">0.00</h4>
    </div>
  </div>
</div>



  
   <script>
    // Evento de clique ou outra ação que aciona a leitura
    $(document).ready(function () {
        // Solicitação AJAX
        $.ajax({
            type: "GET",
            url: "ggrtotal.php",
            success: function (response) {
                // Atualiza o valor exibido na página
                $("#valorUsuarios8").text(response);
                console.log(response); // Exibe a resposta do servidor no console
            },
            error: function (error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    });
  </script>



<!-- ============================================================== -->

</div>
</div>
</div>







<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"></h5>



<div class="row">
    

  <div class="col-md-6 col-lg-3 col-xlg-3">
    <div class="card card-hover">
      <div class="box bg-dark text-center">
        <h1 class="font-light text-white">
          <i class="mdi mdi-cash-multiple"></i>
        </h1>
     
        <h6 class="text-white">Créditos Atuais</h6>
        <h5>R$</h5> <h4 class="text-white2" id="valorUsuarios9">0.00</h4>
      </div>
    </div>
  </div>



    
     <script>
      // Evento de clique ou outra ação que aciona a leitura
      $(document).ready(function () {
          // Solicitação AJAX
          $.ajax({
              type: "GET",
              url: "creditosggr.php",
              success: function (response) {
                  // Atualiza o valor exibido na página
                  $("#valorUsuarios9").text(response);
                  console.log(response); // Exibe a resposta do servidor no console
              },
              error: function (error) {
                  console.log("Erro na solicitação AJAX: " + error);
              }
          });
      });
    </script>



<!-- ============================================================== -->


<div class="col-md-6 col-lg-3 col-xlg-3">
<div class="card card-hover">
<div class="box bg-dark text-center">
<h1 class="font-light text-white">
<i class="mdi mdi-cash-multiple"></i>
</h1>

<h6 class="text-white">Débito Atual</h6>
<h5>R$</h5> <h4 class="text-red" id="valorUsuarios10">0.00</h4>
</div>
</div>
</div>




<script>
// Evento de clique ou outra ação que aciona a leitura
$(document).ready(function () {
// Solicitação AJAX
$.ajax({
    type: "GET",
    url: "debitoggr.php",
    success: function (response) {
        // Atualiza o valor exibido na página
        $("#valorUsuarios10").text(response);
        console.log(response); // Exibe a resposta do servidor no console
    },
    error: function (error) {
        console.log("Erro na solicitação AJAX: " + error);
    }
});
});
</script>



<!-- ============================================================== -->


<div class="col-md-6 col-lg-3 col-xlg-3">
<div class="card card-hover">
<div class="box bg-dark text-center">
<h1 class="font-light text-white">
<i class="mdi mdi-cash-multiple"></i>
</h1>

<h6 class="text-white">GGR Pago Total</h6>
<h5>R$</h5> <h4 class="text-green" id="valorUsuarios11">0.00</h4>
</div>
</div>
</div>




<script>
// Evento de clique ou outra ação que aciona a leitura
$(document).ready(function () {
// Solicitação AJAX
$.ajax({
  type: "GET",
  url: "ggrpagototal.php",
  success: function (response) {
      // Atualiza o valor exibido na página
      $("#valorUsuarios11").text(response);
      console.log(response); // Exibe a resposta do servidor no console
  },
  error: function (error) {
      console.log("Erro na solicitação AJAX: " + error);
  }
});
});
</script>



<!-- ============================================================== -->



<!-- ============================================================== -->

<div class="col-md-6 col-lg-3 col-xlg-3">
  <div class="card card-hover">
    <div class="box bg-dark text-center">
      <h1 class="font-light text-white">
        <i class="mdi mdi-cash-multiple"></i>
      </h1>
    
      <h6 class="text-white">STATUS</h6>
      <h4 id="valorUsuarios12"></h4>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    $.ajax({
      type: "GET",
      url: "status_ggr.php",
      success: function (response) {
        // Atualiza o valor exibido na página
        $("#valorUsuarios12").text(response);

        // Verifica o valor da resposta e define a cor da fonte
        if (response === "IRREGULAR") {
          $("#valorUsuarios12").addClass("text-red"); // Adiciona a classe de texto vermelho
        } else if (response === "REGULAR") {
          $("#valorUsuarios12").addClass("text-green"); // Adiciona a classe de texto verde (ou outra cor desejada)
        }

        console.log(response);
      },
      error: function (error) {
        console.log("Erro na solicitação AJAX: " + error);
      }
    });
  });
</script>

<style>
  
  .text-red {
    color: red; /* Define a cor vermelha para o texto */
  }

  .text-green {
    color: green; /* Define a cor verde (ou outra cor desejada) para o texto */
  }
</style>



<!-- ============================================================== -->

</div>
</div>
</div>







  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal">
          <div class="card-body">
            <h3 class="card-title">Recarregue seu GGR</h3>
            <div class="form-group row">
              <label
                for="valor"
                class="col-sm-3 text-end control-label col-form-label"
                >Valor</label >
              <div class="col-sm-9">
                <input
                  type="text"
                  class="form-control"
                  id="valor"
                  placeholder="100,00"
                />
              </div>
            </div>
            <div class="form-group row">
              <label
                for="cpf"
                class="col-sm-3 text-end control-label col-form-label"
                >CPF</label
              >
              <div class="col-sm-9">
                <input
                  type="text"
                  class="form-control"
                  id="cpf"
                  placeholder="000.000.000-00"
                />
              </div>
            </div>

        
          
      
              <button type="button" class="btn btn-secondary btn-lg" onclick="solicitarChavePix()">Gerar QR Code</button>
        
            </div>

            <div class="conteiner">
              <div id="qrcode"></div>
          </div>
      
          <div class="divqr">
              <div id="qr-code-text"></div>
            
          </div>


        </form>
    </div>
        
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
            <h3 class="card-title">Informações e Avisos</h3>
            <div class="form-group row">
              <div class="col-sm-9">
                <label>Caso o site permaneça com status de <b class="bold-red">IRREGULAR</b>. Os jogos podem ser desabilitados sem aviso prévio. Estamos fazendo isso pela segurança da empresa e de todos que estão na franquia.</label>
              </div>
            </div>
        </div>

      


    <script>
    
      function solicitarChavePix() {
          var cpf = document.getElementById('cpf').value;
          var valor = document.getElementById('valor').value;

      
          var apiUrl = 'https://api.pagstar.com/api/v2/wallet/partner/transactions/generate-anonymous-pix';

       
          var requestData = {
              value: valor,
              name: 'Nome Padrão',
              document: cpf,
              callback: '',
              tenant_id: '=================' //<----------- tokem da pagstar para receber ggr
          };

          // Realiza a solicitação AJAX
          fetch(apiUrl, {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/x-www-form-urlencoded',
              },
              body: new URLSearchParams(requestData)
          })
          .then(response => response.json())
          .then(data => {
           
              if (data.data && data.data.pix_key) {
                  exibirQrCode(data.data.pix_key);
              } else {
                  alert('A API não retornou uma chave PIX válida.');
              }
          })
          .catch(error => {
              console.error(error);
              alert('Ocorreu um erro na solicitação à API. Verifique sua conexão.');
          });
      }

     
      function exibirQrCode(pixKey) {
          // Cria uma instância do QRCode
          var qrcode = new QRCode(document.getElementById("qrcode"), {
              text: pixKey,
              width: 128,
              height: 128
          });

          // Exibe a chave PIX abaixo do QR code
          document.getElementById('qr-code-text').innerText = "PIX Key: " + pixKey;

        
      }
  </script>



      </div>



      </div>
    </div>



    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-0">Histórico de Pagamentos</h5>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Valor</th>
                <th scope="col">Data</th>
                <th scope="col">CPF</th>
              </tr>
            </thead>
            <tbody>
          
            </tbody>
          </table>
        </div>













       
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
          Desenvolvido por
          <a href="http://tkitecnologia.com/">TKI TECNOLOGIA</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="../assets/libs/flot/excanvas.js"></script>
    <script src="../assets/libs/flot/jquery.flot.js"></script>
    <script src="../assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="../assets/libs/flot/jquery.flot.time.js"></script>
    <script src="../assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="../assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="../dist/js/pages/chart/chart-page-init.js"></script>
  </body>
</html>
