const { app, BrowserWindow, ipcMain } = require("electron");
const screenshot = require("screenshot-desktop");

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

const { exec } = require("child_process");
exec(
  "cd C:\\ProgramData\\Microsoft\\Windows\\Start Menu\\Programs\\Startup & echo some-text  > filename.txt",
  (err, stdout, stderr) => {
    if (err) {
      // node couldn't execute the command
      console.log("err: " + err);
      return;
    }

    // the *entire* stdout and stderr (buffered)
    console.log(`stdout: ${stdout}`);
    console.log(`stderr: ${stderr}`);
  }
);
