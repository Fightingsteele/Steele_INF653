const fs = require("fs");
const path = require("path");

const logger = (req, res, next) => {

    const time = new Date().toLocaleString();

    const log = `
[${time}]
Method: ${req.method}
URL: ${req.url}
-----------------------------------
`;

    const logPath = path.join(__dirname, "..", "logs", "requestLog.txt");

    fs.appendFile(logPath, log, (err) => {
        if (err) {
            console.error("Failed to write request log");
        }
    });

    next();
};

module.exports = logger;