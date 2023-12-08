<?php
session_start();

// Verificar se a sessão existe
if (!isset($_SESSION['emailadm'])) {
    // Sessão não existe, redirecionar para outra página
    header("Location: ../login");
    exit();
}

// O restante do código da sua página continua aqui
// ...

?>


<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


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
    <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet" />

  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
  
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

          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5">
   
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
   
<div class="page-wrapper">
    
</div> 
<div class="page-wrapper">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Tabela de Usuários</h5>
       <!-- Column -->
        <div class="row">
            <div class="col-md-12 col-lg-4 col-xlg-3">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white" id="valorUsuarios1">0</h1>
                        <h4 class="text-white">Total de cadastros</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xlg-3">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white" id="valorUsuarios2">0</h1>
                        <h4 class="text-white">Total de cadastros nas últimas 24 horas</h4>
                    </div>
                </div>
            </div>
        </div>

        

        
      <div class="table-responsive">
        <h5>Filtrar por link de afiliado</h5>
        <input type="text" id="leadAffInput" placeholder="Filtrar por afiliado">
        <table id="user-table" class="table table-striped table-bordered">
          <thead>
            <tr>
                <th>Data/Hora</th>
              <th>Email</th>
              <th>Telefone</th>
              <th>Saldo</th>
           
              <th>Total Depositado</th>
       
              <th>Editar</th>
            </tr>
          </thead>
          <tbody id="table-body">
              
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Editar Usuário</h5>
        <button type="button" class="btn-close-modal" onclick="fecharModal()" data-dismiss="editModal" aria-label="Close">
          <span aria-hidden="false">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Campos de input para edição -->
        <form id="editForm" action="/adm/usuarios/update.php" method="post">
            <label for="editEmail">Email:</label>
            <input type="text" class="form-control" id="editEmail" name="email" >
    
            <label for="editSenha">Senha:</label>
            <input type="password" class="form-control" id="editSenha" name="senha" >
            <label>Mostrar Senha: </label>
            <input type="checkbox" id="mostrarSenha" onclick="mostrarOcultarSenha()">
            <br/>
            <label for="editTelefone">Telefone:</label>
            <input type="text" class="form-control" id="editTelefone" name="telefone" >
    
            <label for="editSaldo">Saldo:</label>
            <input type="text" class="form-control" id="editSaldo" name="saldo" >
    
            <label for="editLinkAfiliado">Link Afiliado:</label>
            <input type="text" class="form-control" id="editLinkAfiliado" name="linkafiliado" >
    
            <label for="editPlano">Revenue Share (%):</label>
            <input type="text" class="form-control" id="editPlano" name="plano" >
            
            <!-- <select  name="plano" class="form-select custom-input" aria-label="Escolha a dificuldade">
                <option value="bronze">Bronze</option>
                <option value="ouro">Ouro</option>
                <option value="platina">Platina</option>
            </select>-->
    
            <label for="editBloqueado">Bloqueado:</label>
            <input type="checkbox" id="editBloqueado" name="bloqueado" >
            
            <br/>
            
            <label for="editSaldoComissao">Saldo Comissao:</label>
            <input type="text" class="form-control" id="editSaldoComissao" name="saldo_comissao" >
    
            <!-- <label for="editPerdas">Perdas:</label>-->
            <!-- <input type="text" class="form-control" id="editPerdas" name="percas" >-->
    
            <!-- <label for="editGanhos">Ganhos:</label>-->
            <!-- <input type="text" class="form-control" id="editGanhos" name="ganhos" >-->
    
            <label for="editCpa">Cpa:</label>
            <input type="text" class="form-control" id="editCpa" name="cpa" >
    
            <label for="editCpaFake">Chance do Afiliado Receber CPA (%):</label>
            <input type="text" class="form-control" id="editCpaFake" name="cpafake" >
    
            <label for="editComissaoFake">Porcentagem de Rev. Share Falso (%):</label>
            <input type="text" class="form-control" id="editComissaoFake" name="comissaofake" >

            <input type="hidden" id="editUserId" name="id">

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function () {
        // Adicione um evento para reagir a mudanças no campo de entrada
        $('#leadAffInput').on('input', function () {
            // Obtenha o valor digitado no campo de entrada
            var leadAffValue = $(this).val();

            // Solicitação AJAX
            $.ajax({
                type: "GET",
                url: "../php/cadastrados_ultimas_24h.php",
                data: { leadAff: leadAffValue },
                success: function (response) {
                    // Atualiza o valor exibido na página
                    $("#valorUsuarios1").text(response.total);
                    $("#valorUsuarios2").text(response.ultimas_24h);
                    console.log(response); // Exibe a resposta do servidor no console
                },
                error: function (error) {
                    console.log("Erro na solicitação AJAX: " + error);
                }
            });
        });

        // Dispare o evento de mudança inicial para carregar os dados com base no valor padrão
        $('#leadAffInput').trigger('input');
    });
</script>

<script>

    function fecharModal() {
        $('#editModal').modal('hide')
    }

    function mostrarOcultarSenha(){
        const senhaInput = document.getElementById('editSenha');

        // Altera o tipo do input de senha para texto ou vice-versa
        senhaInput.type = senhaInput.type === 'password' ? 'text' : 'password';
        senhaInput.type = mostrarSenhaCheckbox.checked ? 'text' : 'password';
    }
    
</script>

<script>
  $(document).ready(function() {
    
    // Use AJAX para buscar dados do arquivo PHP
    $.ajax({
      url: 'bd.php',
      method: 'GET',
      success: function(data) {
        // Limpar o corpo da tabela
        $('#table-body').empty();
        

        // Inserir dados na tabela
        data.forEach(function(row) {
            var newRow = "<tr>" +
            "<td>" + row.data_cadastro + "</td>" +
            "<td>" + row.email + "</td>" +
            "<td>" + row.telefone + "</td>" +
            "<td>" + row.saldo + "</td>" +
         
            "<td>" + row.depositou + "</td>" +
           
            "<td><button class='btn-edit' data-id='" + row.id + "'>Editar</button></td>" +
            "</tr>";
          $('#table-body').append(newRow);
        });
        

        // Inicializar DataTables após a conclusão da chamada AJAX
        var table = $('#user-table').DataTable();
        
        // Adicionar evento de clique para o botão de edição
        $('#user-table tbody').on('click', '.btn-edit', function() {
            
              var userId = $(this).data('id');
              // Preencher os campos do modal com os dados do usuário
              fillEditModal(userId);
              // Abrir o modal
              $('#editModal').modal('show');
        });
        

        function fillEditModal(userId) {
            var user = getUserById(userId); // Implemente a lógica para obter os dados do usuário por ID
            console.log(data)
            // Preencher os campos do modal
            $('#editEmail').val(user.email);
            $('#editSenha').val(user.senha);
            $('#editTelefone').val(user.telefone);
            $('#editSaldo').val(user.saldo);
            $('#editLinkAfiliado').val(user.linkafiliado);
            $('#editPlano').val(user.plano);
            $('#editDepositou').val(user.depositou);
            $('#editBloqueado').prop('checked', user.bloc === 'true');
            $('#editSaldoComissao').val(user.saldo_comissao);
            $('#editPerdas').val(user.percas);
            $('#editGanhos').val(user.ganhos);
            $('#editCpa').val(user.cpa);
            $('#editCpaFake').val(user.cpafake);
            $('#editComissaoFake').val(user.comissaofake);
            $('#editUserId').val(user.id);
        }

        function getUserById(userId) {
            return data.find(function (user) {
                return user.id == userId;
            });
        }
      },
      error: function() {
        console.log('Erro ao obter dados do servidor.');
      }
    });
    // Adicione um identificador ao seu campo de entrada
    var leadAffInput = $('#leadAffInput');

    // Adicione um evento para reagir a mudanças no campo de entrada
    $('#leadAffInput').on('input', function () {
            // Recarregue os dados da tabela com o novo valor de lead_aff
            loadData($(this).val());
        });

        // Função para carregar dados da tabela
        function loadData(leadAff) {
            $.ajax({
                url: 'bd.php',
                method: 'GET',
                data: { leadAff: leadAff },
                success: function (data) {
                    // Limpar o corpo da tabela
                    $('#table-body').empty();

                    // Inserir dados na tabela
                    data.forEach(function (row) {
                        var newRow = "<tr>" +
                            "<td>" + row.data_cadastro + "</td>" +
                            "<td>" + row.email + "</td>" +
                            "<td>" + row.telefone + "</td>" +
                            "<td>" + row.saldo + "</td>" +
                            "<td>" + row.depositou + "</td>" +
                            "<td><button class='btn-edit' data-id='" + row.id + "'>Editar</button></td>" +
                            "</tr>";
                        $('#table-body').append(newRow);
                    });

                    // Inicializar DataTables após a conclusão da chamada AJAX
                    var table = $('#user-table').DataTable();

                    // Adicionar evento de clique para o botão de edição
                    $('#user-table tbody').on('click', '.btn-edit', function () {
                        var userId = $(this).data('id');
                        // Preencher os campos do modal com os dados do usuário
                        fillEditModal(userId);
                        // Abrir o modal
                        $('#editModal').modal('show');
                    });
                },
                error: function () {
                    console.log('Erro ao obter dados do servidor.');
                }
            });
        }

        // Adicione um identificador ao seu campo de entrada
        var leadAffSelect = $('#leadAffSelect');

        // Adicione um evento para reagir a mudanças no campo de entrada
        leadAffSelect.on('change', function() {
            // Obter o valor selecionado
            var leadAffValue = leadAffSelect.val();
        
            // Se o valor selecionado for "Todos", reinicialize a tabela
            if (leadAffValue === "") {
                // Destrua e recrie a tabela
                $('#user-table').DataTable().destroy();
                
                // Recarregue os dados da tabela com o novo valor de lead_aff
                loadData('');
        
                // Inicialize novamente o DataTables
                //$('#user-table').DataTable();
            } else {
                // Se o valor selecionado for diferente de "Todos", proceda normalmente
                loadData(leadAffValue);
            }
        });


        // Chame a função loadData inicialmente para carregar todos os dados
        //loadData('');
    });
</script>




<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>







      
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
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="../assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();
    </script>
  </body>
</html>
