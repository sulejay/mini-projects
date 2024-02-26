const WebSocket = require("ws");
const wss = new WebSocket.Server({ port: 8080 });
wss.on("connection", function connection(ws) {
  ws.on("message", function incoming(message) {
    console.log("Received: %s", message);
    // Send a message back to the client
    ws.send("Hello Client!");
  });
  ws.send("Welcome to the WebSocket server!");
});
