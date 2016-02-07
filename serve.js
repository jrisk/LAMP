var http = require('http');
var express = require('express');

var app = express();

const PORT = 8080;

function handleReq(req, res) {
	res.end("responding..." + req.url + req);
};

var server = http.createServer(app);

server.listen(PORT, function() {
	console.log("listening on port " + PORT);
	console.log(app);
});


