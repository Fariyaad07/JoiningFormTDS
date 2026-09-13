/*Active Menu*/
var activeurl = window.location.href;
$('a[href="'+activeurl+'"]').parent('li').addClass('active open start');
$('a[href="'+activeurl+'"]').parent('li').parents('li').addClass('active open start');


//Change Input Field Type Dynamically
function changeType(field,prev_type,new_type) {
  var x = document.getElementById(field);
  if (x.type === prev_type) {
    x.type = new_type;
  } else {
    x.type = prev_type;
  }
} 


//Password and Confirm Password validation
function validatePassword(){
	var password = document.getElementById("admin_password");
  var confirm_password = document.getElementById("admin_password_recovery");
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}


//Remove Field Group
$(document).ready(function(){
	//remove fields group
    $("body").on("click",".remove_button",function(){ 
        $(this).parents(".remove_this").remove();
		toastr.error('One field group removed.');
    });
});



//Get URL Parameter
function getUrlParam( paramName ) {
	var reParam = new RegExp( '(?:[\?&]|&)' + paramName + '=([^&]+)', 'i' );
	var match = window.location.search.match( reParam );
	return ( match && match.length > 1 ) ? match[1] : null;
}



