const express = require("express");
const app = express();

const logger = require("./middleware/logger");
const errorHandler = require("./middleware/errorHandler");

app.use(logger);

app.get("/", (req, res) => {
    res.send("Home Page");
});

app.get("/error", (req, res, next) => {
    const err = new Error("This is a test error");
    next(err);
});

app.use(errorHandler);

const PORT = 3000;

app.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
});