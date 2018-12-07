$(document).ready(function () {
	$(".profile").mouseover(function(){
		$(".profile-img").attr("src","images/jmsright.jpg");
		
	});
	$(".profile").mouseout(function(){
		$(".profile-img").attr("src","images/jms.jpg");
		
	});
})