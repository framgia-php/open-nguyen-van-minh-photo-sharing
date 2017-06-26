$(document).ready(function(){

	//Thêm CSS cho các trang đang truy cập

	if ($('title').text() == 'Trang chủ') {
		$('#trangchu').addClass('active_nav');
	}
	else if ($('title').text() == 'Trang cá nhân') {
		$('#trangcanhan').addClass('active_nav');
	}

	//Bắt sự kiện ấn các button

	$('button').click(function() {
		var imageId = $(this).attr('name');
		var comment = $('#comment_content_' + imageId).val();
		var token = $('#_token').val();

		// Khi người dùng bình luận
		if ($(this).attr("id") == "comment") {
			$('#comment_content_' + imageId).val("");

			$.post("/project1/public/addcomment",
			{
				_token : token,
				imageId: imageId,
				comment: comment
			},

			function(data, status) {
  			$('#display_comment_' + imageId).prepend(data);
			})
		}

		// Khi người ấn xem bình luận
		else if ($(this).attr('id') == 'show_comment') {
			$('#display_comment_' + imageId).html("");
			$(this).attr('id', 'showed_comment');

			$.get("/project1/public/comments/" + imageId, function(data, status) {
	  			$('#display_comment_' + imageId).prepend(data);
			})
		}

		// Khi người dùng ấn show bình luận lần 2
		else if ($(this).attr('id') == 'showed_comment') {
			$(this).attr('id', 'show_comment');
			$('#display_comment_' + imageId).html("");
		}

		// Khi người dùng bấm like
		else if ($(this).attr('id') == 'like') {
			$(this).attr('class', 'btn btn-danger');
			$(this).attr('id', 'liked');
			var numlike = parseInt($(this).text()) + 1;
			$(this).html(numlike + ' <i class="fa fa-heart-o" style="font-size:12px;color:white"></i>');

			$.post("/project1/public/addlike",
				{
					_token : token,
					imageId: imageId,
				},

				function(data, status) {
					if(data != 1) {
						alert("Đã xảy ra vấn đề gì đó @@");
					}
				})
		}

		// Khi người dùng bấm like lần 2
		else if ($(this).attr('id') == 'liked') {
			$(this).attr('class', 'btn btn-default');
			$(this).attr('id','like');
			var numlike = parseInt($(this).text()) - 1;
			$(this).html(numlike + ' <i class="fa fa-heart-o" style="font-size:12px;color:red"></i>');

			$.post("/project1/public/removelike",
				{
					_token : token,
					imageId : imageId,
				},
				function() {
					if(data != 1) {
						alert("Đã xảy ra vấn đề gì đó @@");
					}
			})
		}
	})
})
