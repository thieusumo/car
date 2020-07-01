
var express = require("express");
var app = express();
var server = require("http").createServer(app);
var io = require('socket.io')(server);

//Make socket
var connectedUsers = {};
var client_arr = {}

io.on('connection', function(socket){

	var name = socket.handshake.query.name;
	console.log(name);

	connectedUsers[name] = socket;
	client_arr[socket.id] = name
		console.log('check 1', socket.connected);

	io.on("disconnet", function(socket){
		console.log('check 2', socket.connected);
		socket.on('status', function(){
			io.sockets.emit('status');
		});
	});
	console.log(Object.keys(io.sockets.connected));
	// socket.on("get_status", function(){
	// 	// console.log(Object.keys(connectedUsers))
	// 	console.log(client_arr)
	// 	console.log(Object.keys(io.sockets.connected));
		
	// 	console.log(Object(client_arr));
	// 	// var data = Object.keys(connectedUsers)
	// 	io.sockets.emit('get_status',data)
	// })

	socket.on('send', function(data){
		var send_to = data.send_to;
		// console.log(connectedUsers)
		// console.log(Object.keys(connectedUsers));

		// io.sockets.emit('send',data); //To all clients

		if(connectedUsers.hasOwnProperty(send_to)){
			//Send only special client
			connectedUsers[send_to].emit('send',data, function(status, callback){
				console.log(status);
				console.log('ok');
			});
		}
	});
});

//Start serve with port
server.listen(3000);

