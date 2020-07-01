$(function(){
	var name = $("#name").val(); // customer_send_id
	var _token = $('meta[name=csrf-token]').attr('content');
	var send_to = 0;
	var ava_send = $("#ava-send").val();
	var baseUrl = window.location.origin;
	var port = 3000;
	//Kết nối với server socket đang lắng nghe
	var socket = io.connect(baseUrl+":"+port, {query : 'name='+name});

	//Socket nhận data và apppend vào giao diện
	socket.on("send", function(data){
		console.log(data);
		$("#content").animate({ scrollTop: $('#content').prop("scrollHeight")}, 1000);

		var ava = data.ava;
		if($(".receiver-head").hasClass('receiver-'+data.send_to+'-'+data.username)){
			var answer_html =   `<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="`+ava+`" class="rounded-circle user_img_msg">
									</div>
									<div class="msg_cotainer">`+data.message+`
										<span class="msg_time">8:40 AM, 11/12</span>
									</div>
								</div>`;
		$("#content").append(answer_html)
		}
		// alert('chat-'+data.send_to);
		// if($('.s-chat').hasClass('chat -'+data.send_to)){
		// 	alert(data.message);
		// 	$(this).find('user_info').children('p').text(data.message);
		// }
	})

	if(r != 0 && s != 0){
		name = s
		send_to = r
		getConvesation(name,send_to);
	}

	//Bắt sự kiện click gửi message
	$(document).on('click','#sendMessage', function(){
		sendMessage();
	})

	$(document).on('keypress','#message', function(event)
	{	if(event.which == 13) {
			sendMessage();
		}
	});

	function sendMessage()
	{
		var message = $("#message").val().trim();

		if(message == '' || send_to == 0){
			// alert('Text message and username');
		}else{
			$.ajax({
				url: route('frontend.chat.send') ,
				type: 'POST',
				dataType: 'json',
				data: {
					_token : _token,
					send_id : name,
					receiver_id : send_to,
					content : message
				},
			})
			.done(function(res) {
				if(res.status == 'danger')
					$.notify(data.message, {type: data.status});
				else{
					//Gửi dữ liệu cho socket
					socket.emit('send', {
						ava: ava_send,
						username:name, 
						message: message,
						 send_to: send_to}, function(data){
						// console.log(data.);
						if(data.error)
							console.log('error');
						if(data.ok)
							console.log('ok');
					});
					var message_html = `<div class="d-flex justify-content-end mb-4">
											<div class="msg_cotainer_send">
												`+message+`
												<span class="msg_time_send">8:55 AM, Today</span>
											</div>
										</div>`;
					$("#content").append(message_html);
					$("#content").animate({ scrollTop: $('#content').prop("scrollHeight")}, 1000);
					$("#message").val('');
				}
				console.log(res);
			})
			.fail(function() {
				$.notify('Error!', {type: 'danger'});
			});
		}
	}

	$(".search").on("keyup", function() {
    	var value = $(this).val().toLowerCase();
    	$(".contacts li").filter(function() {
      		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    	});
  	});
  	$(".s-chat").click(function(){
  		$(".s-chat").removeClass('active');
  		$(this).addClass('active');
  		send_to = $(this).attr('rc');
  		getConvesation(name, send_to);
  	});
  	function getConvesation(name, send_to)
  	{
  		$.ajax({
  			url: route('frontend.chat.conversation') ,
  			type: 'GET',
  			dataType: 'html',
  			data: {send_id: name, receiver_id: send_to},
  		})
  		.done(function(data) {
  			data = JSON.parse(data);
  			$("#content").html(data.detail_html);
  			$('.msg_head').html(data.receiver_html);
  			var footer_html = `<div class="input-group">
								<textarea name="" id="message" class="form-control type_msg scroller" placeholder="Type your message..."></textarea>
								<div class="input-group-append">
									<span class="input-group-text send_btn" id="sendMessage"><i class="fa fa-send-o"></i></span>
								</div>
							</div>`;
  			$('#footer-conversation').html(footer_html);
			$("#content").animate({ scrollTop: $('#content').prop("scrollHeight")}, 1000);
  		})
  		.fail(function() {
  			$.notify('Error', {type : 'danger'});
  		});
  	}
})