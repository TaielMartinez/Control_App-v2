const { app, BrowserWindow, ipcMain } = require("electron");
const screenshot = require("screenshot-desktop");
const AutoLaunch = require("auto-launch");

function createWindow() {
  const win = new BrowserWindow({
    width: 800,
    height: 600,
    webPreferences: {
      nodeIntegration: true,
    },
  });

  win.loadFile("src/html/index.html");
}

app.whenReady().then(createWindow);

app.on("window-all-closed", () => {});

app.on("activate", () => {
  createWindow();
});

ipcMain.on("take-screenshot", function (event, arg) {
  console.log("get screenshot");
  screenshot({ format: "png" })
    .then((img) => {
      event.reply("send-screenshot", img.toString("base64"));
    })
    .catch((err) => {});
  //const electronScreenshot = require("electron-base64-screenshot");
  //let base64image = electronScreenshot.takeScreenshot();
  //event.reply("send-screenshot", base64image);
});

let autoLaunch = new AutoLaunch({
  name: "Control App",
  path: app.getPath("exe"),
});
autoLaunch.isEnabled().then((isEnabled) => {
  if (!isEnabled) autoLaunch.enable();
});
