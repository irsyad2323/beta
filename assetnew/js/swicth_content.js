$(document).ready(function(){
    window.onload = index();

	$('#index').click(function(){
		//alert("Hello! I am an alert box!!");
		index();
	});
	
	$('#logout').click(function(){
		//alert("Hello! I am an alert box!!");
		logout();
	});

});
		

	function index(){	
		$(".myDiv").fadeIn("fast");
		$("#view_content").load("dashboard.php",function() { 
		$(".myDiv").fadeOut();
	});
};	
	
	
	function logout(){	
	$(".myDiv").fadeIn("slow");
    $("#view_content").load("../control/logout.php",function() { 
	$(".myDiv").fadeOut();
	});		
};
	
