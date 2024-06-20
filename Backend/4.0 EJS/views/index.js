import express from "express";

const app = express();
const port = 3000;

app.get("/", (req, res) => {
    res.render("index.ejs", {
        dayType: "It's week day",
        advice: "Work hard bro",
    });
});

app.listen(port, () => {
    console.log("Server runnning on", port);
});