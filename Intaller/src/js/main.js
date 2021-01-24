const { ipcRenderer } = require("electron");
/*
console.log("main.js load");

var data = new FormData();
data.append("business_token", "e8fd0c3a-1fa9-45c0-abf0-a6e9d93f57b6");

var xhr = new XMLHttpRequest();
xhr.open("POST", api_url + "/api/client", true);
xhr.onload = function () {
  console.log(this.responseText);
};
xhr.send(data);

document.addEventListener("DOMContentLoaded", function (event) {
  ipcRenderer.on("fromMain", (event, messages) => {
    // do something
    console.log(messages);
  });
});

function send() {
  console.log("send");
  ipcRenderer.send("update-notify-value", "asjhgdakjsd");
}
*/

function sleep(seg) {
  return new Promise((resolve) => setTimeout(resolve, seg * 1000));
}
//localStorage.removeItem("client_token");
//              START
const api_url = "http://control-app.local.com/api/client";
const business_token = "bb7dc599-99e0-420b-a8c9-507b0118c1a9";
const client_name = "local";
var client_token = localStorage.getItem("client_token");
var connect_interval = 30;
var screenshot = 1;
var screenshot_interval = 1;
var screenshot_base64 = "";

loop();
async function loop() {
  //loop start

  //take screenshot
  if (screenshot && screenshot_interval >= screenshot)
    ipcRenderer.send("take-screenshot");

  ipcRenderer.on("send-screenshot", (event, messages) => {
    console.log("Imagen guardada");
    screenshot_base64 = messages;
  });

  var data = new FormData();
  data.append("business_token", business_token);
  if (client_token) data.append("client_token", client_token);
  if (client_name) data.append("client_name", client_name);
  if (screenshot_base64) {
    data.append("screenshot", screenshot_base64);
    screenshot_base64 = "";
    screenshot_interval = 0;
  } else {
    screenshot_interval++;
  }

  var xhr = new XMLHttpRequest();
  xhr.open("POST", api_url, true);
  xhr.onload = function () {
    console.log(this.responseText);
    console.log(this.responseText);
    let res = JSON.parse(this.responseText);
    console.log(res);
    if (!client_token) localStorage.setItem("client_token", res.client_token);
    connect_interval = res.client_config.connect_interval;
    screenshot = res.client_config.screenshot;
  };
  xhr.send(data);

  document.addEventListener("DOMContentLoaded", function (event) {
    ipcRenderer.on("fromMain", (event, messages) => {
      // do something
      console.log(messages);
    });
  });

  // reset
  await sleep(connect_interval);
  loop();
}
