<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Poppins',sans-serif;
            height:100vh;
            overflow:hidden;
        }

        .main-section{
            width:100%;
            height:100vh;
            position:relative;
            background:url('background.jpg') center center/cover no-repeat;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        /* Dark Overlay */
        .main-section::before{
            content:'';
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:rgba(40,25,15,0.60);
        }

        .content-box{
            position:relative;
            z-index:2;
            text-align:center;
            color:#fff;
            padding:20px;
        }

        .logo{
            position:absolute;
            top:40px;
            left:50%;
            transform:translateX(-50%);
            z-index:3;
        }

        .logo img{
            width:75px;
            background:#fff;
            padding:5px;
        }

        h1{
            font-size:58px;
            font-weight:700;
            margin-bottom:20px;
            line-height:1.2;
        }

        .line{
            width:35px;
            height:2px;
            background:#ff6b3d;
            margin:0 auto 30px;
        }

        .sub-text{
            font-size:16px;
            color:#f1f1f1;
            margin-bottom:40px;
        }

        .btn{
            display:inline-block;
            padding:16px 38px;
            background:#ff6b3d;
            color:#fff;
            text-decoration:none;
            border-radius:40px;
            font-size:14px;
            font-weight:600;
            transition:0.3s;
        }

        .btn:hover{
            background:#e85a2f;
            transform:translateY(-2px);
        }

        /* Responsive */
        @media(max-width:768px){

            h1{
                font-size:38px;
            }

            .sub-text{
                font-size:14px;
            }

            .btn{
                padding:14px 28px;
                font-size:13px;
            }

            .logo img{
                width:65px;
            }
        }

        @media(max-width:480px){

            h1{
                font-size:28px;
            }

            .main-section{
                padding:20px;
            }

            .logo{
                top:25px;
            }
        }

    </style>
</head>

<body>

    <section class="main-section">

        <!-- Logo -->
        <div class="logo">
            <img src="<?= base_url()?>images/TDS-group-logo-New.jpg" alt="Logo">
        </div>

        <!-- Content -->
        <div class="content-box">

            <h1>Thanks for Submitting Your Data</h1>

            <div class="line"></div>

            <p class="sub-text">
                We will get back to you soon
            </p>

            <a href="<?= base_url('page/printApplication') ?>"target="_blank" class="btn">
                PRINT SUBMITTED DETAILS
            </a>
			
			 <a href="<?= base_url('userdashboard') ?>" class="btn">
                Back to Home
            </a>

        </div>

    </section>

</body>
</html>