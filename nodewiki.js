var https = require('https');
var http = require('http');

var dispatcher = require('http-dispatcher');

console.log(dispatcher);

var server = http.createServer(function(req,res) {
	console.log('test');
	res.writeHead(200);
	res.end('something to put at the end to prevent errors');
}).listen(8080);

var options = {
	host: 'en.wikipedia.org',
	path: '/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=jsonfm'
};

var callback = function(response) {

	response.resume();

	response.on('data', function(wiki) {
		var wikiData = wiki;
	});
};