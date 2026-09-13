<!DOCTYPE html>
<html>
<head>
    <title>Super Admin Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

body {
    margin: 0;
    height: 100vh;
    background: linear-gradient(135deg, #5f9cff, #6dd5ed);
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Segoe UI', sans-serif;
}

/* Card */
.admin-card {
    width: 360px;
    background: #fff;
    border-radius: 15px;
    padding: 30px 25px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    position: relative;
}

/* Logo circle */
.logo-circle {
    width: 150px;
    height: 150px;
    background: #5f9cff;
    border-radius: 50%;
    position: absolute;
    top: -60px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    align-items: center;
    justify-content: center;
}

.logo-circle img {
    width: 100px;
    height: 100px;
}

/* Title */
.title {
    margin-top: 70px;
}

.title h4 {
    font-weight: bold;
}

.title h5 {
    color: #e74c3c;
    font-weight: bold;
}

/* Inputs */
.form-group {
    position: relative;
    margin-top: 15px;
}

.form-control {
    padding-left: 40px;
    height: 45px;
    border-radius: 10px;
}

.form-icon {
    position: absolute;
    top: 12px;
    left: 12px;
    color: #777;
}

/* Button */
.btn-login {
    width: 100%;
    border-radius: 25px;
    height: 45px;
    margin-top: 15px;
    font-weight: 600;
}

/* Forgot */
.forgot-btn {
    margin-top: 10px;
}

body {
    margin: 0;
    height: 100vh;
    background: linear-gradient(135deg, #5f9cff, #6dd5ed);
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Segoe UI', sans-serif;
    overflow: hidden;
}

/* Bubble container */
.bubbles {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 0;
    overflow: hidden;
}

/* Each bubble */
.bubbles span {
    position: absolute;
    bottom: -100px;
    width: 20px;
    height: 20px;
    background: rgba(255,255,255,0.3);
    border-radius: 50%;
    animation: rise 10s infinite ease-in;
}

/* Animation */
@keyframes rise {
    0% {
        transform: translateY(0) scale(1);
        opacity: 0.5;
    }
    100% {
        transform: translateY(-110vh) scale(1.5);
        opacity: 0;
    }
}

/* Random positions */
/* Bigger bubbles */
.bubbles span {
    position: absolute;
    bottom: -150px;
    background: rgba(255,255,255,0.25);
    border-radius: 50%;
    animation: rise 12s infinite ease-in;
}

/* Different large sizes */
.bubbles span:nth-child(1) {
    left: 10%;
    width: 80px;
    height: 80px;
    animation-duration: 10s;
}

.bubbles span:nth-child(2) {
    left: 20%;
    width: 120px;
    height: 120px;
    animation-duration: 14s;
}

.bubbles span:nth-child(3) {
    left: 35%;
    width: 60px;
    height: 60px;
    animation-duration: 9s;
}

.bubbles span:nth-child(4) {
    left: 50%;
    width: 150px;
    height: 150px;
    animation-duration: 16s;
}

.bubbles span:nth-child(5) {
    left: 65%;
    width: 90px;
    height: 90px;
    animation-duration: 11s;
}

.bubbles span:nth-child(6) {
    left: 80%;
    width: 130px;
    height: 130px;
    animation-duration: 13s;
}

.bubbles span:nth-child(7) {
    left: 90%;
    width: 70px;
    height: 70px;
    animation-duration: 12s;
}
.admin-card {
    position: relative;
    z-index: 10;
}
</style>
</head>

<body>
<div class="bubbles">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>
<div class="admin-card">

    <!-- Logo -->
    <div class="logo-circle">
        <img src="<?= base_url()?>images/TDS-New-Logo-min.png">
    </div>

    <!-- Title -->
    <div class="title">
        <h5>TDS GROUP</h5>
        <h4>Super Admin Login</h4>
    </div>

    <!-- Form -->
    <form method="post" action="<?= site_url('adminauthenticate/loginCheck') ?>">

        <div class="form-group">
            <i class="fa fa-user form-icon"></i>
            <input type="text" name="admin_id" class="form-control" placeholder="Admin ID" required>
        </div>

        <div class="form-group">
            <i class="fa fa-lock form-icon"></i>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <button class="btn btn-danger btn-login">Login</button>

    </form>

    <div class="forgot-btn">
        <a href="#" class="btn btn-sm btn-primary">Forgot Password</a>
		<a href="/" class="btn btn-sm btn-primary">Website Login</a>
    </div>

</div>

</body>
</html>