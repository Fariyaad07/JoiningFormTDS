//Move Single item to trash folder by set a valible IsDel to 1	
	function changeUpdateStatus(id, url_value) {
		swal({  
				title: "Are you sure?",
				text: "Change edit permission for this user!",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes, do it!",
				cancelButtonClass: "btn-warning",
				cancelButtonText: "No, cancel please!",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function (isConfirm) {
				if (isConfirm) {

					$.ajax({
						url: url_value,
						cache: false,
						success: function (result) {
							toastr.warning('Permission granted.');
						}
					});

					swal("Moved!", "Permission granted.", "success");
				} else {
					swal("Cancelled", "permission denied.", "error");
				}
			});
	}



//Move Single item to trash folder by set a valible IsDel to 1	
	function move_to_trash(id, url_value) {
		swal({  
				title: "Are you sure?",
				text: "You will not be able to use this anymore without restoring it!",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes, do it!",
				cancelButtonClass: "btn-warning",
				cancelButtonText: "No, cancel please!",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function (isConfirm) {
				if (isConfirm) {

					$.ajax({
						url: url_value,
						cache: false,
						success: function (result) {
							var tr = $('#' + id).closest('tr');
							tr.fadeOut(200, function () {
								$('#' + id).remove();
							});
							toastr.warning('Single item moved to trash.');
						}
					});

					swal("Moved!", "This item is moved to trash Successfully.", "success");
				} else {
					swal("Cancelled", "This item is safe.", "error");
				}
			});
	}

//Delete Single item Permanently From Database		
	function delete_forever(id, url_value) {
		swal({
				title: "Are you sure?",
  				text: "You will not be able to recover it again!",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes, do it!",
				cancelButtonClass: "btn-warning",
				cancelButtonText: "No, cancel please!",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function (isConfirm) {
				if (isConfirm) {

					$.ajax({
						url: url_value,
						cache: false,
						success: function (result) {
							var tr = $('#' + id).closest('tr');
							tr.fadeOut(200, function () {
								$('#' + id).remove();
							});
							toastr.error('Single item deleted permanently.');
						}
					});

					swal("Deleted!", "This item is permanently deleted.", "success");
				} else {
					swal("Cancelled", "This item is safe.", "error");
				}
			});
	}


//Restore Single item from trash folder by set a valible IsDel to 0		
	function restore_from_trash(id, url_value) {
		swal({
				title: "Are you sure?",
				text: "You can use it again!",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-success",
				confirmButtonText: "Yes, do it!",
				cancelButtonClass: "btn-warning",
				cancelButtonText: "No, cancel please!",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function (isConfirm) {
				if (isConfirm) {

					$.ajax({
						url: url_value,
						cache: false,
						success: function (result) {
							var tr = $('#' + id).closest('tr');
							tr.fadeOut(200, function () {
								$('#' + id).remove();
							});
							toastr.success('Single item restored.');
						}
					});

					swal("Restored!", "This item restored Successfully.", "success");
				} else {
					swal("Cancelled", "This item is not restored.", "error");
				}
			});
	}


//Move Multiple item to trash folder by set a valible IsDel to 1	
	function move_to_trash_multiple(url_value) {
  		var checkbox = $('.operation_checkbox:checked');
		if(checkbox.length > 0)
		{
			swal({
					title: "Are you sure?",
					text: "You will not be able to use this anymore without restoring it!",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					confirmButtonText: "Yes, do it!",
					cancelButtonClass: "btn-warning",
					cancelButtonText: "No, cancel please!",
					closeOnConfirm: false,
					closeOnCancel: false
				},
				function (isConfirm) {
					if (isConfirm) {
						var checkbox_value = [];
						$(checkbox).each(function(){
							checkbox_value.push($(this).val());
						});
						$.ajax({
							url: url_value,
							method:"POST",
							data:{checkbox_value:checkbox_value},
							success:function()
							{
								$('.selectedActiveRow').fadeOut(200);
								$('.selectedActiveRow').remove();
								toastr.warning('Multiple item moved to trash.');
							}
						});

						swal("Moved!", "This item is moved to trash Successfully.", "success");
					} else {
						swal("Cancelled", "This item is safe.", "error");
					}
				});
		}
		else
		{
			swal({
			  title: "Ohh Sorry!",
			  text: "Select atleast one row.",
  			  type: "warning",
			  timer: 7000
			});
		}
	}	


//Delete Multiple item Permanently From Database
	function delete_forever_multiple(url_value) {
  		var checkbox = $('.operation_checkbox:checked');
		if(checkbox.length > 0)
		{
			swal({
					title: "Are you sure?",
					text: "You will not be able to recover it again!",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					confirmButtonText: "Yes, do it!",
					cancelButtonClass: "btn-warning",
					cancelButtonText: "No, cancel please!",
					closeOnConfirm: false,
					closeOnCancel: false
				},
				function (isConfirm) {
					if (isConfirm) {
						var checkbox_value = [];
						$(checkbox).each(function(){
							checkbox_value.push($(this).val());
						});
						$.ajax({
							url: url_value,
							method:"POST",
							data:{checkbox_value:checkbox_value},
							success:function()
							{
								$('.selectedActiveRow').fadeOut(200);
								$('.selectedActiveRow').remove();
								toastr.error('Multiple item deleted permanently.');
							}
						});

						swal("Deleted!", "This item is permanently deleted.", "success");
					} else {
						swal("Cancelled", "This item is safe.", "error");
					}
				});
		}
		else
		{
			swal({
			  title: "Ohh Sorry!",
			  text: "Select atleast one row.",
  			  type: "warning",
			  timer: 7000
			});
		}
	}	


//Restore Multiple item from trash folder by set a valible IsDel to 0
	function restore_from_trash_multiple(url_value) {
  		var checkbox = $('.operation_checkbox:checked');
		if(checkbox.length > 0)
		{
			swal({
					title: "Are you sure?",
					text: "You can use it again!",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-success",
					confirmButtonText: "Yes, do it!",
					cancelButtonClass: "btn-warning",
					cancelButtonText: "No, cancel please!",
					closeOnConfirm: false,
					closeOnCancel: false
				},
				function (isConfirm) {
					if (isConfirm) {
						var checkbox_value = [];
						$(checkbox).each(function(){
							checkbox_value.push($(this).val());
						});
						$.ajax({
							url: url_value,
							method:"POST",
							data:{checkbox_value:checkbox_value},
							success:function()
							{
								$('.selectedActiveRow').fadeOut(200);
								$('.selectedActiveRow').remove();
								toastr.success('Multiple item restored.');
							}
						});

						swal("Restored!", "This item restored Successfully.", "success");
					} else {
						swal("Cancelled", "This item is not restored.", "error");
					}
				});
		}
		else
		{
			swal({
			  title: "Ohh Sorry!",
			  text: "Select atleast one row.",
  			  type: "warning",
			  timer: 7000
			});
		}
	}	


