<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: linear-gradient(135deg,#8ec5fc,#3a7bd5);
            font-family: 'Segoe UI', sans-serif;
            min-height:100vh;
        }

        /* Header */
        .header{
            background:#e9ecef;
            padding:12px;
            text-align:center;
            font-weight:bold;
            color:red;
            font-size:18px;
        }

        /* Navbar */
        .navbar{
            background:#fff;
        }

        /* Welcome */
        .welcome-box{
            padding:15px;
            color:#000;
            background:#fff;
            border-radius:12px;
            box-shadow:0 5px 15px rgba(0,0,0,0.08);
        }

        /* Cards */
        .card-box{
            background:#fff;
            border-radius:12px;
            padding:20px;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
            height:100%;
        }

        /* Buttons */
        .btn-custom{
            border-radius:20px;
            padding:8px 14px;
            font-size:14px;
        }

        /* Status */
        .status{
            color:red;
            font-weight:600;
        }

        /* Top buttons */
        .top-actions{
            display:flex;
            gap:10px;
            flex-wrap:wrap;
        }

        .card-buttons{
            display:flex;
            gap:10px;
            flex-wrap:wrap;
        }

        ol{
            padding-left:18px;
        }

        /* Mobile Responsive */
        @media(max-width:768px){

            .header{
                font-size:15px;
                padding:10px;
            }

            .welcome-box h5{
                font-size:18px;
                margin-bottom:12px;
            }

            .welcome-box .d-flex{
                flex-direction:column;
                align-items:flex-start !important;
                gap:12px;
            }

            .top-actions{
                width:100%;
            }

            .top-actions a{
                width:100%;
                text-align:center;
            }

            .card-buttons{
                flex-direction:column;
            }

            .card-buttons a{
                width:100%;
                text-align:center;
            }

            .card-box{
                padding:18px;
            }

            .navbar img{
                width:65px !important;
            }

            .dropdown-toggle img{
                width:32px !important;
            }
        }

    </style>
</head>

<body>

    <div class="header">TDS Management Consultant PVT. LTD.</div>

    <div class="container py-3">

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg shadow-sm mb-3 rounded px-2">
            <div class="container-fluid">

                <a href="<?= base_url('userdashboard') ?>">
                    <img src="<?= base_url()?>images/TDS-group-logo-New.jpg" style="width:80px;">
                </a>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a href="<?= base_url('userdashboard') ?>" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="<?= base_url();?>images/blank-person.png"
                                 class="rounded-circle"
                                 style="width:35px;">
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="<?= base_url('page/logout') ?>">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>

        <!-- WELCOME -->
        <div class="welcome-box mb-3">

            <h5>
                Welcome <?php echo $this->session->userdata('user_name'); ?>
            </h5>

            <div class="d-flex justify-content-between align-items-center">

                <?php if(!empty($application)) { ?>
                    <span class="status">Already Form Filled</span>
                <?php } ?>

                <div class="top-actions">

                    <a href="<?= base_url('page/showApplication') ?>"
                       class="btn btn-primary btn-sm">
                        See Filled Form
                    </a>

                    <a href="<?= base_url('page/printApplication') ?>"
                       target="_blank"
                       class="btn btn-primary btn-sm">
                        Print Details
                    </a>

                </div>

            </div>
        </div>

        <!-- CARDS -->
        <div class="row">

            <!-- PRIVATE JOB -->
            <div class="col-lg-6 col-md-6 mb-3">

                <div class="card-box">

                    <h5 class="mb-3">Apply for Pvt. Job</h5>

                    <p class="mb-2"><b>Following instructions:</b></p>

                    <ol>
                        <li>Application fee 300 + GST for 1 year</li>
                        <li>Fill application & upload CV</li>
                        <li>Click final submit</li>
                    </ol>

                    <div class="card-buttons">

                        <a href="<?= site_url('page/payment_registration/354') ?>"
                           class="btn btn-dark btn-custom btn-sm">
                            Apply Now with Payment
                        </a>

                        <?php if(!empty($application) && $application['Status'] != 1) { ?>
                            <a href="page/newApplicationForm"
                               class="btn btn-secondary btn-custom btn-sm">
                                Skip Payment
                            </a>
                        <?php } ?>

                        <?php if(empty($application)) { ?>
                            <a href="page/newApplicationForm"
                               class="btn btn-secondary btn-custom btn-sm">
                                Skip Payment
                            </a>
                        <?php } ?>

                    </div>

                </div>

            </div>

            <!-- GOVT JOB -->
            <div class="col-lg-6 col-md-6 mb-3">

                <div class="card-box">

                    <h5 class="mb-3">Apply for Govt. Contractual Job</h5>

                    <p class="mb-2"><b>Following instructions:</b></p>

                    <ol>
                        <li>Application fee 1000 + GST for 1 year</li>
                        <li>Fill application & upload CV</li>
                        <li>Click final submit</li>
                    </ol>

                    <div class="card-buttons">

                        <a href="<?= site_url('page/payment_registration/1180') ?>"
                           class="btn btn-dark btn-custom btn-sm">
                            Apply Now with Payment
                        </a>

                        <?php if(!empty($application) && $application['Status'] != 1) { ?>
                            <a href="page/newApplicationForm"
                               class="btn btn-secondary btn-custom btn-sm">
                                Skip Payment
                            </a>
                        <?php } ?>

                        <?php if(empty($application)) { ?>
                            <a href="page/newApplicationForm"
                               class="btn btn-secondary btn-custom btn-sm">
                                Skip Payment
                            </a>
                        <?php } ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php $this->load->view('modules/footer'); ?>

</body>
</html>