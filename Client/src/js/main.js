console.log("main.js load");

const api_url = "http://control-app.local.com";

fetch(api_url + "/api/v1/start", {
  method: "POST",
  body: JSON.stringify({ data: false }),
}).then((res) => {
  console.log("response:", res);
});
