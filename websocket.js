var websock = new WebSocket("ws://localhost:3000/socketserver");

websock.onopen = function (event) {
	websock.send("HELLO I AM SEND THIS VIA WEBSOCKET TO PORT3000");
};
