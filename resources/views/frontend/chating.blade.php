<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>
		<script src="{{ asset('web/js/jquery.js') }}" type="text/javascript" charset="utf-8"></script>
		<script src="{{ asset('web/js/socket.js') }}" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="{{ asset('web/css/font-awesome.min.css') }}">
		<link rel="stylesheet" type="text/css" href=" {{ asset('web/css/bootstrap.css') }} ">
		<link rel="stylesheet" type="text/css" href="{{ asset('web/css/chat-style.css') }} ">
		<script type="text/javascript" src=" {{ asset('web/js/chat-bootstrap.js') }}"></script>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<style type="text/css" media="screen">
			.text-ava, #content>h5{
				position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
			}
			.text-ava{
				font-weight: 700;
			}
			.img_cont_msg{
				position: relative;
			}
			#content{
				position: relative;
			}
		</style>
	</head>
	<body>
		<div class="container-fluid h-100">
			<div class="row justify-content-center my-2">
				<div class="col-md-4 col-sm-4 col-xl-3 text-left">
					<span style="color: yellow;font-size: 28px;line-height: 35px" class="">XeCuaToi</span><span class="text-white">.info</span>
					<input type="hidden" value="{{ $customer_composer->id }}" id="name" name="">
					<input type="hidden" value="{{ asset($customer_composer->ava) }}" id="ava-send" name="">
				</div>
				<div class="col-md-8 col-sm-8 col-xl-6 text-right">
					<a href="http://localhost/" target="_blank" title="">
						<button type="button" class="btn btn-primary">Trang Chủ</button>
					</a>
					<a href="" title="">
						<button type="button" onclick="window.history.go(-1); return false;" class="btn btn-info">Trở lại</button>
					</a>
				</div>
			</div>
			<div class="row justify-content-center h-100">
				<div class="col-md-12 col-sm-12 col-xl-3 ">
					<div class="card mb-sm-3 mb-md-0 contacts_card">
						<div class="card-header">
							<div class="input-group">
								<input type="text" placeholder="Search..."  name="" class="form-control search">
								<div class="input-group-prepend">
									<span class="input-group-text search_btn"><i class="fa fa-search"></i></span>
								</div>
							</div>
						</div>
						<div class="card-body contacts_body scroller">
							<ui class="contacts">
								@foreach($chats as $key => $chat)
									<li class="s-chat chat-{{ $chat->last()['receiver_id']== $customer_composer->id ? $chat->last()['send_id'] : $chat->last()['receiver_id'] }}" rc={{ $chat->last()['receiver_id']== $customer_composer->id ? $chat->last()['send_id'] : $chat->last()['receiver_id']}}>
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												@if($chat->last()['ava'] == "")
												<img src="" class="bg-info rounded-circle user_img">
												<span class="text-ava text-white text-uppercase">{{ substr($key,0,1) }}</span>
												@else
												<img src="{{ asset($chat->last()['ava']) }}" class="bg-info rounded-circle user_img">
												@endif
												{{-- <span class="online_icon"></span> --}}
											</div>
											<div class="user_info">
												<span>{{ $key }}</span>
												<p>{{ shortStringMessage($chat->last()['content'])  }}</p>
											</div>
										</div>
									</li>
								@endforeach
							</ui>
						</div>
						<div class="card-footer"></div>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xl-6 detail-conversation">
					<div class="card" id="conversation">
						<div class="card-header msg_head">
						</div>
						<div class="card-body msg_card_body scroller" id="content">
							<h5 class="text-center text-white">Chọn một cuộc trò chuyện</h5>
						</div>
						<div class="card-footer" id="footer-conversation">
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	@routes
	<script>
		var r = '{{ $id ?? 0 }}';
		var s = '{{ $customer_composer->id ?? 0 }}'
	</script>
	<script src="{{ asset('web/js/chat.js') }}" type="text/javascript" charset="utf-8"></script>
</html>
