<!DOCTYPE html>
<html>
	<head>
		<title>Payment</title>
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
		
		<style>
			body {
			background: linear-gradient(135deg,#8ec5fc,#3a7bd5);
			font-family: 'Segoe UI';
			}
			
			.payment-card {
			background:#fff;
			padding:30px;
			border-radius:10px;
			box-shadow:0 5px 20px rgba(0,0,0,0.2);
			max-width:500px;
			margin:auto;
			margin-top:80px;
			}
			
			.btn-pay {
			border-radius:20px;
			}
		</style>
		
	</head>
	
	<body>
		
		<div class="payment-card">
			
			<h5 class="text-center mb-4">Payment Details</h5>
			
			<div class="mb-2">
				<label>Name</label>
				<input type="text" id="name" class="form-control" value="<?= $user['user_name']; ?>" readonly>
			</div>
			
			<div class="mb-2">
				<label>Mobile</label>
				<input type="text" id="mobile" class="form-control" value="<?= $user['user_contact_number']; ?>" readonly>
			</div>
			
			<div class="mb-2">
				<label>Email</label>
				<input type="text" id="email" class="form-control" value="<?= $user['user_email_id']; ?>" readonly>
			</div>
			
			<div class="mb-3">
				<label>Amount (₹)</label>
				<input type="text" id="amount" class="form-control" value="<?= $amount; ?>" readonly>
			</div>
			
			<div class="text-center">
				<button onclick="payNow()" class="btn btn-primary btn-pay">Pay Now</button>
			</div>
			
		</div>
		
		<script>
			
			function payNow(){
				
				var amount = document.getElementById("amount").value;
				var options = {
					"key": "rzp_test_cdGn386BqAXj2A",
					"amount": amount * 100,
					"currency": "INR",
					"name": "TDS Group",
					"description": "Application Payment",
					
					"handler": function (response){
						// send to backend
						var form = document.createElement("form");
						form.method = "POST";
						form.action = "<?= site_url('page/paymentSuccess') ?>";
						
						form.innerHTML = `
						<input type="hidden" name="razorpay_payment_id" value="${response.razorpay_payment_id}">
						<input type="hidden" name="amount" value="${amount}">
						`;
						
						document.body.appendChild(form);
						form.submit();
					},
					
					"prefill": {
						"name": document.getElementById("name").value,
						"email": document.getElementById("email").value,
						"contact": document.getElementById("mobile").value
					},
					
					"theme": {
						"color": "#0d6efd"
					},
					
					// ✅ IMPORTANT: enable all methods
					"method": {
						"upi": true,
						"card": true,
						"netbanking": true,
						"wallet": true
					}
				};
				
				
				var rzp = new Razorpay(options);
				rzp.open();
			}
			
		</script>
		<?php $this->load->view('modules/footer'); ?>
	</body>
</html>