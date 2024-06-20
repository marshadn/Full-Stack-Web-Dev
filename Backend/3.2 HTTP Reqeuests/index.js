import express from "express";
const app = express();
const port = 3500;
app.get("/", (req, res) => {
    res.send("<center><h1>You are created HTTP Request Method</h1></center>");
});

app.get("/about", (req, res) => {
    res.send("<center><h2>Tell me tell about me . I'm Web developer.</h2></center>");
});

app.get("/contact", (req, res) => {
    res.send("<center><h3>You can contact me @instagram:@marshxadn_</h3></center>");
});

app.listen(port, () => {
    console.log('Server running on  number ',port);
});
