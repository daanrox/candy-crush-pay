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
        content="Admin Dashboard" />
    <meta
        name="description"
        content="Admin Dashboard" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Admin Dashboard</title>

    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="../assets/images/favicon.png" />

    <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet" />

    <link href="../dist/css/style.min.css" rel="stylesheet" />

</head>

<body>

    <div
        id="main-wrapper"
        data-layout="vertical"
        data-navbarbg="skin5"
        data-sidebartype="full"
        data-sidebar-position="absolute"
        data-header-position="absolute"
        data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="navbar-brand" href="../">

                        <span class="logo-text ms-2">
                            <img
                                src="https://daanrox.com/assets/image/daanrox-logo.png"
                                width="100%" height="50"
                                alt="homepage"
                                class="light-logo" />
                        </span>

                    </a>

                    <a
                        class="nav-toggler waves-effect waves-light d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
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
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <?php include '../components/aside.php' ?>

        <div class="page-wrapper">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tabela de Depósitos</h5>
                    <div class="row">
                        <div class="col-md-12 col-lg-4 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-danger text-center">
                                    <h1 class="font-light text-white" id="valorUsuarios1">0</h1>
                                    <h4 class="text-white">Nº de Depósitos</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-success text-center">
                                    <h1 class="font-light text-white" id="valorUsuarios2">0</h1>
                                    <h4 class="text-white">Nº Total de Depósitos nas últimas 24 horas</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-lg-4 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-danger text-center">
                                    <h1 class="font-light text-white" id="valorUsuarios5">0</h1>
                                    <h4 class="text-white">Valor Total Depositado</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-success text-center">
                                    <h1 class="font-light text-white" id="valorUsuarios6">0</h1>
                                    <h4 class="text-white">Valor Total Depositado Nas Últimas 24 horas</h4>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <button class="btn btn-success" id="exportCsvBtn">Exportar CSV</button>
                        </div>
                    </div>


                    <script>
                        function escapeCsvValue(value) {
                            if (/[",\n\r]/.test(value)) {
                                return '"' + value.replace(/"/g, '""') + '"';
                            }
                            return value;
                        }

                        $('#exportCsvBtn').on('click', function() {
                            exportTable('user-table', 'user-table.csv', ';', true);
                        });

                        $('#exportExcelBtn').on('click', function() {
                            exportTable('user-table', 'user-table.xlsx', ',', true);
                        });

                        function exportTable(tableId, filename, delimiter, excludeEditColumn) {
                            var data = [];
                            var headers = [];

                            $('#' + tableId + ' thead th').each(function() {
                                if (excludeEditColumn && $(this).text().trim().toLowerCase() === 'editar') {
                                    return;
                                }
                                headers.push(escapeCsvValue($(this).text().trim()));
                            });
                            data.push(headers);

                            var table = $('#' + tableId).DataTable();
                            table.rows().data().each(function(row) {
                                var rowData = [];

                                row.forEach(function(value, index) {
                                    if (excludeEditColumn && $('#' + tableId + ' thead th').eq(index).text().trim().toLowerCase() === 'editar') {
                                        return;
                                    }
                                    rowData.push(escapeCsvValue(value));
                                });

                                data.push(rowData);
                            });

                            if (filename.endsWith('.csv')) {
                                var csvContent = data.map(row => row.join(delimiter)).join('\n');
                                var blob = new Blob(["\ufeff" + csvContent], {
                                    type: 'text/csv;charset=utf-8;'
                                });
                                saveFile(blob, filename);
                            } else if (filename.endsWith('.xlsx')) {
                                var ws = XLSX.utils.aoa_to_sheet(data);
                                var wb = XLSX.utils.book_new();
                                XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
                                var blob = XLSX.write(wb, {
                                    bookType: 'xlsx',
                                    type: 'blob'
                                });
                                saveFile(blob, filename);
                            }
                        }

                        function saveFile(blob, filename) {
                            var link = document.createElement('a');
                            if (link.download !== undefined) {
                                var url = URL.createObjectURL(blob);
                                link.setAttribute('href', url);
                                link.setAttribute('download', filename);
                                link.style.visibility = 'hidden';
                                document.body.appendChild(link);
                                link.click();
                                document.body.removeChild(link);
                            }
                        }
                    </script>





                    <div class="table-responsive">
                        <h5>Filtrar por status</h5>
                        <select id="selectedStatus">
                            <option value="">Todos</option>
                            <option value="PAID_OUT">Aprovado</option>
                            <option value="WAITING_FOR_APPROVAL">Pendente</option>
                        </select>
                        <table id="user-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Data / Hora</th>
                                    <th>Email</th>
                                    <th>Cod. Referencia</th>
                                    <th>Valor</th>
                                    <th>Status</th>


                                </tr>
                            </thead>
                            <tbody id="table-body">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function getSelectedValue() {
                return $("#selectedStatus").val();
            }

            $(document).ready(function() {
                $('#selectedStatus').on('change', function() {
                    const selectedStatus = getSelectedValue();

                    $.ajax({
                        type: "GET",
                        url: "../php/depositados_ultimas_24h.php",
                        data: {
                            status: selectedStatus
                        },
                        success: (response) => {
                            $("#valorUsuarios6").text(response);
                            console.log(response);
                        },
                        error: (error) => {
                            console.error(`Erro na solicitação AJAX: ${error}`);
                        }
                    });
                });
            });
        </script>


        <script>
            function getSelectedValue() {
                return $("#selectedStatus").val();
            }

            $(document).ready(function() {
                $('#selectedStatus').on('change', function() {
                    const selectedStatus = getSelectedValue();

                    $.ajax({
                        type: "GET",
                        url: "../php/total_depositos.php",
                        data: {
                            status: selectedStatus
                        },
                        success: (response) => {
                            $("#valorUsuarios5").text(response);
                            console.log(response);
                        },
                        error: (error) => {
                            console.error(`Erro na solicitação AJAX: ${error}`);
                        }
                    });
                });
            });
        </script>

        <script>
            function getSelectedValue() {
                return $("#selectedStatus").val();
            }

            $(document).ready(function() {
                $('#selectedStatus').on('change', function() {
                    const selectedStatus = getSelectedValue();

                    $.ajax({
                        type: "GET",
                        url: "../php/numero_depositos.php",
                        data: {
                            status: selectedStatus
                        },
                        success: (response) => {
                            $("#valorUsuarios1").text(response);
                            console.log(response);
                        },
                        error: (error) => {
                            console.error(`Erro na solicitação AJAX: ${error}`);
                        }
                    });
                });
            });
        </script>


        <script>
            function getSelectedValue() {
                return $("#selectedStatus").val();
            }

            $(document).ready(function() {
                $('#selectedStatus').on('change', function() {
                    const selectedStatus = getSelectedValue();

                    $.ajax({
                        type: "GET",
                        url: "../php/numero_depositos_ultimas_24h.php",
                        data: {
                            status: selectedStatus
                        },
                        success: (response) => {
                            $("#valorUsuarios2").text(response);
                            console.log(response);
                        },
                        error: (error) => {
                            console.error(`Erro na solicitação AJAX: ${error}`);
                        }
                    });
                });
            });
        </script>


        <script>
            $(document).ready(function() {
                const table = $('#user-table').DataTable({
                    order: [
                        [0, 'desc']
                    ]
                });

                const statusSelect = $('#selectedStatus');
                statusSelect.val('');

                statusSelect.on('change', function() {
                    const statusValue = statusSelect.val();

                    table.clear().draw();

                    loadData(statusValue, table);
                });

                function loadData(status, dataTable) {
                    $.ajax({
                        url: 'bd.php',
                        method: 'GET',
                        data: {
                            status: status
                        },
                        success: (data) => {
                            data.forEach(row => {
                                const statusClass = row.status === 'Aprovado' ? 'text-success' : 'text-black';
                                dataTable.row.add([
                                    row.data,
                                    row.email,
                                    row.externalreference,
                                    row.valor,
                                    row.status
                                ]).draw();
                            });
                        },
                        error: () => {
                            console.error('Erro ao obter dados do servidor.');
                        }
                    });
                }

                loadData('');
            });
        </script>





        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>








        <footer class="footer text-center">
            Desenvolvido por
            <a href="https://daanrox.com" target='_blank'>DAANROX</a>.
        </footer>

    </div>

    </div>

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="../dist/js/waves.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <script src="../dist/js/custom.min.js"></script>
    <script src="../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="../assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        $("#zero_config").DataTable();
    </script>
    <link rel="stylesheet" href="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-button.css">
    <a id="robbu-whatsapp-button" target="_blank" href="https://api.whatsapp.com/send?phone=5531992812273&text=Ol%C3%A1,%20vim%20pelo%20site%20e%20gostaria%20de%20tirar%20uma%20d%C3%BAvida%20sobre%20abrir%20uma%20plataforma%20de%20apostas%20ou%20problemas%20em%20algum%20de%20seus%20sites.">
        <div class="rwb-tooltip">Entre em contato!</div>
        <img src="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-icon.svg">
    </a>
</body>

</html>
