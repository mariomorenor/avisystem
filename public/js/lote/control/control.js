console.log('prueba html')

var express = require('express');
var app = express();
var io = require('socket.io')(app.listen(8081));



const { Board, Thermometer } = require("johnny-five");
const board = new Board({
    repl:false,
    port:'COM3'
});

board.on("ready", () => {

  var commands = null;

  const thermometer = new Thermometer({
    controller: "DS18B20",
    pin: 2,
    freq: 1000
  });
  
  // thermometer.on("data", () => {
  //   const {address, celsius, fahrenheit, kelvin} = thermometer;
  //   console.log("  celsius      : ", celsius);
  //   console.log("  fahrenheit   : ", fahrenheit);
  //   console.log("  kelvin       : ", kelvin);
  //   console.log("--------------------------------------");
  // });

  io.on('connection', function (socket) {
    socket.on('temperatura', function () {
      thermometer.on("data", () => {
        const {celsius} = thermometer;
      
       socket.emit('responseTemp', celsius );
      });

      })
    })


});
