<?php
	
	if (!function_exists('getApplicationStatus')) {
		
		function getApplicationStatus($status)
		{
			switch($status){
				
				case 0:
                return 'Pending';
				
				case 1:
                return 'Approved';
				
				case 2:
                return 'Rejected';
				
				case 3:
                return 'Deleted';
				
				case 5:
                return 'Left';
				
				default:
                return 'Unknown';
			}
		}
	}
	
	if (!function_exists('cleanFilePath')) {
		
		function cleanFilePath($path)
		{
			if(empty($path)){
				return '';
			}
			
			// remove ~\
			$path = str_replace('~\\', '', $path);
			
			// replace backslash with forward slash
			$path = str_replace('\\', '/', $path);
			return $path;
			//return 'uploads/'.$path;
		}
	}
	
	if (!function_exists('formatDateExcel')) {
		function formatDateExcel($date)
		{
			if(empty($date)){
				return '';
			}
			
			if($date instanceof DateTime){
				return $date->format('d-m-Y');
			}
			
			return date('d-m-Y', strtotime($date));
		}
	}
	if (!function_exists('showFilePreview')) {
		function showFilePreview($filePath)
		{
			if(empty($filePath)){
				return;
			}
			
			$file = cleanFilePath($filePath);
			
			$url = 'https://joiningform.tdsgroup.in/'.$file;
			
			$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
			
			if(in_array($ext, ['jpg','jpeg','png'])){
				
				echo '
				<img
				src="'.$url.'"
				style="
				width:80px;
				height:80px;
				object-fit:cover;
				border:1px solid #ddd;
				border-radius:5px;
				padding:2px;
				margin-bottom:10px;
				">
				<br>';
			}
			
			elseif($ext == 'pdf'){
				
				echo '
				<a
				href="'.$url.'"
				target="_blank"
				class="btn btn-sm btn-danger mb-2">
				
				<i class="fa fa-file-pdf"></i>
				View PDF
				
				</a>
				<br>';
			}
		}
	}	