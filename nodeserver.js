var http = require('http');

var server = http.createServer(function(req, res) {
	res.writeHead(200);
	res.end('This is the node server for testing back end request and such');
});

server.listen(8080);