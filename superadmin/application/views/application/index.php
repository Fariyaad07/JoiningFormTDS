
<!DOCTYPE html>
<html>

<head>

    <title>Application Management</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DATATABLE -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- BUTTONS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>

        body{
            background:#f5f5f5;
        }

        .sidebar{
            background: linear-gradient(180deg,#6c757d,#495057);
            min-height:100vh;
            padding:0;
        }

        .sidebar .logo-box{
            text-align:center;
            padding:20px 10px;
            border-bottom:1px solid rgba(255,255,255,0.2);
        }

        .sidebar .logo-box img{
            width:100px;
        }

        .sidebar .logo-text{
            color:#fff;
            font-weight:bold;
            margin-top:10px;
            font-size:16px;
        }

        .sidebar-link{
            display:flex;
            align-items:center;
            color:#fff;
            padding:12px 20px;
            font-size:15px;
            transition:0.3s;
            border-radius:6px;
            margin:5px 10px;
            text-decoration:none;
        }

        .sidebar-link i{
            width:25px;
        }

        .sidebar-link:hover{
            background:#343a40;
            transform:translateX(5px);
        }

        .sidebar-link.active{
            background:#212529;
        }

        .card{
            border-radius:10px;
        }

        table.dataTable tbody td{
            vertical-align:middle;
        }

        .dt-buttons{
            margin-bottom:15px;
        }

    </style>

</head>

<body>

<div class="container-fluid">

    <div class="row">

        <!-- SIDEBAR -->

        <div class="col-md-2 sidebar d-flex flex-column">

            <div class="logo-box">

                <img src="<?= base_url();?>images/TDS-New-Logo-min.png">

                <div class="logo-text">
                    TDS GROUP
                </div>

            </div>

            <div class="mt-3">

                <a href="<?= base_url('index.php/application') ?>"
                   class="sidebar-link active">

                    <i class="fas fa-home"></i>
                    On Boarding

                </a>

                <a href="<?= base_url('index.php/client') ?>"
                   class="sidebar-link">

                    <i class="fas fa-users"></i>
                    Client Management

                </a>

                <a href="<?= base_url('index.php/application/dashboard') ?>"
                   class="sidebar-link">

                    <i class="fas fa-chart-line"></i>
                    Dashboard

                </a>
				
				<a href="<?= base_url('index.php/application/adminList') ?>"
					class="sidebar-link <?= uri_string() == 'application/adminList' ? 'active' : '' ?>">
						<i class="fas fa-chart-line"></i> Admin Management
					</a>

            </div>

        </div>


        <!-- CONTENT -->

        <div class="col-md-10">

            <!-- TOPBAR -->

            <nav class="navbar navbar-expand-lg bg-white shadow-sm mb-3">

                <div class="container-fluid">

                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle"
                               href="#"
                               role="button"
                               data-bs-toggle="dropdown">

                                <img src="<?= base_url();?>images/blank-person.png"
                                     class="rounded-circle"
                                     style="width:35px;">

                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">

                                <li>

                                    <a class="dropdown-item"
                                       href="<?= site_url('application/logout') ?>"
                                       onclick="return confirm('Logout?')">

                                        Logout

                                    </a>

                                </li>

                            </ul>

                        </li>

                    </ul>

                </div>

            </nav>



            <h3 class="mb-4">
                Welcome SuperAdmin
            </h3>


            <!-- FILTER -->

            <div class="card p-3 mb-3">

                <form id="filterForm">

                    <div class="row">

                        <div class="col-md-2">

                            <label>From Date</label>

                            <input type="date"
                                   name="from"
                                   class="form-control">

                        </div>

                        <div class="col-md-2">

                            <label>To Date</label>

                            <input type="date"
                                   name="to"
                                   class="form-control">

                        </div>

                        <div class="col-md-2">

                            <label>Status</label>

                            <select name="status"
                                    class="form-control">

                                <option value="">All</option>
                                <option value="0">Pending</option>
                                <option value="1">Approved</option>
                                <option value="5">Left</option>
                                <option value="2">Rejected</option>
                                <option value="3">Deleted</option>

                            </select>

                        </div>

                        <div class="col-md-3">

                            <label>Client</label>

                            <select name="client"
                                    class="form-control">

                                <option value="">All</option>

                                <?php foreach($clients as $c): ?>

                                    <option value="<?= $c->client_name ?>">
                                        <?= $c->client_name ?>
                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <div class="col-md-3 mt-4">

                            <button type="submit"
                                    class="btn btn-success">

                                <i class="fa fa-search"></i>
                                Filter

                            </button>

                            <button type="button"
                                    id="resetFilter"
                                    class="btn btn-danger">

                                Reset

                            </button>
							
							<a href="javascript:void(0)"
   id="exportExcel"
   class="btn btn-primary">
    Download Full Excel
</a>

                        </div>

                    </div>

                </form>

            </div>



            <!-- TABLE -->

            <div class="card p-3">

                <table id="applicationTable"
                       class="table table-bordered table-striped w-100">

                    <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Client</th>
                        <th>Name</th>
                        <th>Mobile</th>
						<th>Date</th>
                        <th>Status</th>
                        <th>Action</th>


                    </tr>

                    </thead>

                    <tbody></tbody>

                </table>

            </div>


          
        </div>

    </div>

</div>



<!-- JQUERY -->

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DATATABLE -->

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


<!-- BOOTSTRAP -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



<script>

$(document).ready(function () {

   let table = $('#applicationTable').DataTable({

    processing: true,
    serverSide: true,
    responsive: true,

    pageLength: 10,

    lengthMenu: [
        [10,25,50,100,500],
        [10,25,50,100,500]
    ],

    ajax: {

        url: "<?= base_url('index.php/application/ajaxList') ?>",

        type: "POST",

        data: function (d) {

            d.from = $('input[name=from]').val();
            d.to = $('input[name=to]').val();
            d.status = $('select[name=status]').val();
            d.client = $('select[name=client]').val();

        }

    },

    dom: 'lfrtip',

    order: [[0, 'desc']],

    columnDefs: [
        {
            targets: 5,
            orderable: false
        }
    ]

});



    // FILTER

    $('#filterForm').on('submit', function(e){

        e.preventDefault();

        table.ajax.reload();

    });



    // RESET FILTER

    $('#resetFilter').on('click', function(){

        $('#filterForm')[0].reset();

        table.ajax.reload();

    });

});

</script>

<script>

function rejectApplication(id)
{
    var reason = prompt("Enter reject reason");

    if(reason != null && reason != '')
    {
        window.location.href = "<?php echo base_url('index.php/application/changeStatus'); ?>/" 
        + id + "/2?reason=" + encodeURIComponent(reason);
    }
}

$('#exportExcel').click(function () {

    let from   = $('input[name=from]').val();
    let to     = $('input[name=to]').val();
    let status = $('select[name=status]').val();
    let client = $('select[name=client]').val();

    let url = "<?= base_url('index.php/application/exportExcel') ?>?from="
        + from
        + "&to=" + to
        + "&status=" + status
        + "&client=" + client;

    window.location.href = url;

});

</script>
 <?php $this->load->view('application/footer'); ?>
</body>
</html>
