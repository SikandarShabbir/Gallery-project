$(document).ready(function() {
	var user_href;
	var user_href_splitted;
	var user_id;
	var img_src;
	var img_href_splitted;
	var img_name;
	var photo_id;

	$(".modal_thumbnails").click(function(){
		$("#set_user_image").prop('disabled', false);

		user_href = $("#user-id").prop('href');
		user_href_splitted = user_href.split("=");
	// alert(user_href_splitted);
	user_id = user_href_splitted[user_href_splitted. length -1];

	// alert(user_id);
	img_src = $(this).prop('src');
	img_href_splitted = img_src.split("/");
	// alert(user_href_splitted);
	img_name = img_href_splitted[img_href_splitted. length -1];
	photo_id = $(this).attr("data");
	$.ajax({
		url: "includes/ajax_code.php",
		data: {photo_id:photo_id},
		type: "POST",
		success:function(data){
			if (!data.error) {
					// location.reload(true);
					// alert(data);
					$("#modal_sidebar").html(data);
				}
			}
		});




});
	$("#set_user_image").click(function(){

		$.ajax({
			url: "includes/ajax_code.php",
			data: {img_name:img_name, user_id:user_id},
			type: "POST",
			success:function(data){
				if (!data.error) {
					// location.reload(true);
					// alert(data);
					$(".user_image_box a img").prop('src', data);
				}
			}
		});



	});

$(".info-box-header").click(function(){
	// alert("Hello");
	$(".inside").slideToggle("fast");
	$("#toggle").toggleClass("glyphicon-menu-down glyphicon, glyphicon-menu-up glyphicon");
	});

	$(".delete_button").click(function(){
		return confirm("Really Want to delete??? :o");
	});





	tinymce.init({ selector:'textarea' });

});
