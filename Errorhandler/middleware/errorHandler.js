const fs = require("fs");
const path = require("path");

const errorHandler = (err, req, res, next) => {
    const time = new Date().toLocaleString();

    const errorLog = `
[${time}]
Error Name: ${err.name}
Error Message: ${err.message}
-----------------------------------
`;

    const logPath = path.join(__dirname, "..", "logs", "errorLog.txt");

    fs.appendFile(logPath, errorLog, (error) => {
        if (error) {
            console.error("Failed to write to log file");
        }
    });

    console.error(err);

    res.status(500).send("Something went wrong!");
};

module.exports = errorHandler;