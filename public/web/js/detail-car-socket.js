$(function(){
	var socket = io.connect('http://localhost:3000');
	socket.on('comment', function(data){
		console.log(data);
	});

	socket.emit('comment', {name: 'thieu'});
})