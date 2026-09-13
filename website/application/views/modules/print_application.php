<?php
	// variables: $user, $clients, $application
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Application Form</title>
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		
		<style>
			body {
            background: #f5f7fa;
            font-family: 'Segoe UI', sans-serif;
			}
			
			.container-box {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            margin-top: 20px;
			}
			
			.header {
            text-align: center;
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 20px;
			}
			
			.section-title {
            background: #e9ecef;
            padding: 8px;
            margin-top: 20px;
            font-weight: bold;
			}
			
			.photo-box img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 1px solid #ccc;
			}
			
			@media print {
            button {
			display: none;
            }
			}
		</style>
		
		<style>
			
			@media print{
			
			.sidebar,
			.navbar,
			.no-print{
			display:none !important;
			}
			
			body{
			background:#fff;
			}
			
			.card{
			border:none;
			box-shadow:none;
			}
			
			}
			
			.section-title{
			background:#f1f1f1;
			padding:10px;
			border-left:5px solid #0d6efd;
			margin-top:30px;
			margin-bottom:20px;
			font-size:22px;
			font-weight:600;
			}
			
			label{
			font-weight:600;
			margin-bottom:5px;
			}
			
			.form-control{
			margin-bottom:15px;
			}
			
			.doc-img{
			width:140px;
			height:140px;
			object-fit:cover;
			border:1px solid #ddd;
			padding:5px;
			border-radius:5px;
			}
			
		</style>
	</head>
	
	<body>
		
		<div class="container">
			<div class="container-box">
				
				<div class="header">
					<a href="<?= base_url('userdashboard') ?>" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
						<img src="<?= base_url()?>images/TDS-group-logo-New.jpg" width="80"><br>
						TDS MANAGEMENT CONSULTANT PVT. LTD.
					</a>
				</div>
				
					<!-- BASIC DETAILS -->
				<div class="card p-4">
						
						<h1 class="text-center mb-4">
							Employee Application Form
						</h1>
						
						<?php if(empty($row)){ ?>
						
						<div class="alert alert-danger">
							Application data not found.
						</div>
						
					<?php return; } ?>
						
						<!-- BASIC DETAILS -->
						
						<?php
							$permissions = explode(',', 'approve,delete,pending,left,reject,view,edit');
							$changeStatus = '';
							
							
							// =====================
							// REJECT REASON
							// =====================
							
							if(!empty($row->RejectReason) && $row->Status == 2){
								
								$changeStatus .= '
								
								<div class="mb-3">
								
								<label style="font-weight:600; font-size:13px; margin-bottom:4px;">
								Reject Reason
								</label>
								
								<textarea readonly
								class="form-control"
								style="
								border:1px solid #dc3545;
								resize:none;
								background:#fff;
								font-size:13px;
								">'.$row->RejectReason.'</textarea>
								
								</div>';
							}
							
							
							
							// =====================
							// BUTTON DESIGN
							// =====================
							
							$changeStatus .= '<div class="d-flex flex-wrap gap-2 mb-3">';
							
							
							// APPROVE
							if(in_array('approve', $permissions)){
								
								$active = ($row->Status == 1);
								
								$changeStatus .= '
								<a href="' . (!$active ? base_url('index.php/application/changeStatus/'.$row->application_id.'/1') : 'javascript:void(0)') . '" 
								class="btn '.($active ? 'btn-success' : 'btn-outline-success').' "
								'.($active ? 'style="pointer-events:none; opacity:1; font-weight:bold;"' : '').'>
								'.($active ? '✓ Approved' : 'Approve').'
								</a>';
							}
							
							
							
							// PENDING
							if(in_array('pending', $permissions)){
								
								$active = ($row->Status == 0);
								
								$changeStatus .= '
								<a href="' . (!$active ? base_url('index.php/application/changeStatus/'.$row->application_id.'/0') : 'javascript:void(0)') . '" 
								class="btn '.($active ? 'btn-secondary' : 'btn-outline-secondary').' "
								'.($active ? 'style="pointer-events:none; opacity:1; font-weight:bold;"' : '').'>
								'.($active ? '✓ Pending' : 'Move to Pending').'
								</a>';
							}
							
							
							
							// UPDATE / REJECT
							if(in_array('reject', $permissions)){
								
								$active = ($row->Status == 2);
								
								$changeStatus .= '
								<a href="javascript:void(0)" 
								class="btn '.($active ? 'btn-info' : 'btn-outline-info').' "
								'.($active ? 'style="pointer-events:none; opacity:1; font-weight:bold;"' : '').'
								onclick="'.(!$active ? 'rejectApplication('.$row->application_id.')' : '').'">
								'.($active ? '✓ Rejected' : 'Rejected').'
								</a>';
							}
							
							
							
							// LEFT
							if(in_array('left', $permissions)){
								
								$active = ($row->Status == 5);
								
								$changeStatus .= '
								<a href="' . (!$active ? base_url('index.php/application/changeStatus/'.$row->application_id.'/5') : 'javascript:void(0)') . '" 
								class="btn '.($active ? 'btn-warning text-dark' : 'btn-outline-warning').' "
								'.($active ? 'style="pointer-events:none; opacity:1; font-weight:bold;"' : '').'>
								'.($active ? '✓ Left' : 'Left').'
								</a>';
							}
							
							
							
							// DELETE
							if(in_array('delete', $permissions)){
								
								$active = ($row->Status == 3);
								
								$changeStatus .= '
								<a href="' . (!$active ? base_url('index.php/application/changeStatus/'.$row->application_id.'/3') : 'javascript:void(0)') . '" 
								class="btn '.($active ? 'btn-danger' : 'btn-outline-danger').' "
								'.($active ? 'style="pointer-events:none; opacity:1; font-weight:bold;"' : '').'>
								'.($active ? '✓ Deleted' : 'Delete').'
								</a>';
							}
							
							
							$changeStatus .= '</div>';
							
							
							
							
							echo $changeStatus;
						?>
						
						<div class="section-title">
							Basic Details
						</div>
						
						<div class="row">
							
							<div class="col-md-6">
								<label>Employee Name</label>
								<input type="text" class="form-control"
								value="<?= !empty($row->application_employee_name) ? $row->application_employee_name : ($user['user_name'] ?? ''); ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Client Name</label>
								<input type="text" class="form-control"
								value="<?= $row->application_client_name ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Father Name</label>
								<input type="text" class="form-control"
								value="<?= $row->application_father_name ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Mother Name</label>
								<input type="text" class="form-control"
								value="<?= $row->application_mother_name ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Gender</label>
								<input type="text" class="form-control"
								value="<?= $row->Gender ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Marital Status</label>
								<input type="text" class="form-control"
								value="<?= $row->application_marital_status ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Spouse Name</label>
								<input type="text" class="form-control"
								value="<?= $row->application_wife_name ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Date of Birth</label>
								<input type="text" class="form-control"
								value="<?= $row->application_dob ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Date of Joining</label>
								<input type="text" class="form-control"
								value="<?= $row->application_doj ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Pincode</label>
								<input type="text" class="form-control"
								value="<?= $row->application_Pincode ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Status</label>
								
								<?php
									
									$statusText = '';
									
									switch($row->Status){
										
										case 0:
										$statusText = 'Pending';
										break;
										
										case 1:
										$statusText = 'Approved';
										break;
										
										case 2:
										$statusText = 'Rejected';
										break;
										
										case 3:
										$statusText = 'Deleted';
										break;
										
										case 5:
										$statusText = 'Left';
										break;
										
										default:
										$statusText = 'Unknown';
									}
									
								?>
								
								<input type="text"
								class="form-control"
								value="<?= $statusText ?>"
								readonly>
								
							</div>
							
							<div class="col-md-6">
								<label>Present Address</label>
								<textarea class="form-control"
								readonly><?= $row->application_present_address ?></textarea>
							</div>
							
							<div class="col-md-6">
								<label>Permanent Address</label>
								<textarea class="form-control"
								readonly><?= $row->application_permanent_address ?></textarea>
							</div>
							
						</div>
						
						<!-- PERSONAL DETAILS -->
						
						<div class="section-title">
							Personal Details
						</div>
						
						<div class="row">
							
							<div class="col-md-6">
								<label>Mobile Number</label>
								<input type="text" class="form-control"
								value="<?= $user['user_contact_number']; ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Email ID</label>
								<input type="text" class="form-control"
								value="<?= $user['user_email_id']; ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Emergency Contact Number</label>
								<input type="text" class="form-control"
								value="<?= $row->application_mobile_no_emergency ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Aadhaar Number</label>
								<input type="text" class="form-control"
								value="<?= $row->application_aadhaar_no ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>PAN Number</label>
								<input type="text" class="form-control"
								value="<?= $row->application_pan_no ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>UAN Number</label>
								<input type="text" class="form-control"
								value="<?= $row->application_uan_no ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>ESI Number</label>
								<input type="text" class="form-control"
								value="<?= $row->application_esi_no ?>" readonly>
							</div>
							
						</div>
						
						<!-- ACADEMIC DETAILS -->
						
						<div class="section-title">
							Academic Details
						</div>
						
						<div class="row">
							
							<div class="col-md-6">
								<label>Department</label>
								<input type="text" class="form-control"
								value="<?= $row->application_department ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Designation</label>
								<input type="text" class="form-control"
								value="<?= $row->application_designation ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Qualification</label>
								<input type="text" class="form-control"
								value="<?= $row->application_education_qualification ?>" readonly>
							</div>
							
							
							
							<div class="col-md-6">
								<label>Working Location</label>
								<input type="text" class="form-control"
								value="<?= $row->location ?>" readonly>
							</div>
							
						</div>
						
						<!-- DOCUMENT DETAILS -->
						
						<div class="section-title">
							Document Details
						</div>
						
						<div class="row">
							
							<div class="col-md-4  mb-4">
								
								<label>Photo</label><br><br>
								
								<?php if(!empty($row->application_photo)){ ?>
									
									<?php showFilePreview($row->application_photo ?? ''); ?>
									
								<?php } ?>
								
							</div>
							
							<div class="col-md-4 mb-4">
								
								<label>Qualification Certificate</label><br>
								
								<?php if(!empty($row->application_education_qualification_certificate)){ ?>
									
									
									<?php showFilePreview($row->application_education_qualification_certificate ?? ''); ?>
									
									<?php } else { ?>
									
									Not Uploaded
									
								<?php } ?>
								
							</div>
							
							<div class="col-md-4 mb-4">
								
								<label>Aadhaar Front</label><br>
								
								<?php if(!empty($row->application_aadhaar_front_upload)){ ?>
									
									<?php showFilePreview($row->application_aadhaar_front_upload ?? ''); ?>
									
								<?php } ?>
								
							</div>
							
							<div class="col-md-4 mb-4">
								
								<label>Aadhaar Back</label><br>
								
								<?php if(!empty($row->application_aadhaar_back_upload)){ ?>
									
									<?php showFilePreview($row->application_aadhaar_back_upload ?? ''); ?>
									
								<?php } ?>
								
							</div>
							
							<div class="col-md-4 mb-4">
								
								<label>PAN Card</label><br>
								
								<?php if(!empty($row->application_pan_upload)){ ?>
									
									<?php showFilePreview($row->application_pan_upload ?? ''); ?>
									
								<?php } ?>
								
							</div>
							
							<div class="col-md-4 mb-4">
								
								<label>Passbook / Cancel Cheque</label><br>
								
								<?php if(!empty($row->application_bank_account_passbook_upload)){ ?>
									
									<?php showFilePreview($row->application_bank_account_passbook_upload ?? ''); ?>
									
								<?php } ?>
								
							</div>
							
							<div class="col-md-4 mb-4">
								
								<label>Signature</label><br>
								
								<?php if(!empty($row->application_sign_upload)){ ?>
									
									<?php showFilePreview($row->application_sign_upload ?? ''); ?>
									
								<?php } ?>
								
							</div>
							
						</div>
						
						<!-- BANK DETAILS -->
						
						<div class="section-title">
							Bank Details
						</div>
						
						<div class="row">
							
							<div class="col-md-6">
								<label>Bank Account Number</label>
								<input type="text" class="form-control"
								value="<?= $row->application_bank_account_number ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Bank Name</label>
								<input type="text" class="form-control"
								value="<?= $row->application_bank_account_name ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>IFSC Code</label>
								<input type="text" class="form-control"
								value="<?= $row->application_bank_account_ifsc ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Nominee Name</label>
								<input type="text" class="form-control"
								value="<?= $row->application_nominee_name ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Nominee Contact Number</label>
								<input type="text" class="form-control"
								value="<?= $row->application_nominee_contact_no ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Nominee DOB</label>
								<input type="text" class="form-control"
								value="<?= $row->application_nominee_dob ?>" readonly>
							</div>
							
							<div class="col-md-12">
								<label>Nominee Address</label>
								<textarea class="form-control"
								readonly><?= $row->application_nominee_address ?></textarea>
							</div>
							
						</div>
						
						<div class="text-center mt-5 no-print">
							
							<button onclick="window.print()"
							class="btn btn-primary px-5">
								Print Application
							</button>
							
						</div>
						
					</div>
				
			</div>
		</div>
		<script>
window.onload = function() {
    window.print();
}
</script>
<?php $this->load->view('modules/footer'); ?>
	</body>
</html>