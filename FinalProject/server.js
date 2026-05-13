const express = require("express");
const dotenv = require("dotenv");
const cors = require("cors");
const morgan = require("morgan");

const connectDB = require("./config/db");

const authRoutes = require("./routes/authRoutes");
const eventRoutes = require("./routes/eventRoutes");
const bookingRoutes = require("./routes/bookingRoutes");

const errorHandler = require("./middleware/errorMiddleware");
const notFound = require("./middleware/notFoundMiddleware");

dotenv.config();

connectDB();

const app = express();

app.use(express.json());

app.use(cors());

app.use(morgan("dev"));

app.get("/", (req, res) => {
  res.send(`
    <h1>Event Ticketing API</h1>
    <p>Welcome to the API</p>
  `);
});

app.use("/api/auth", authRoutes);

app.use("/api/events", eventRoutes);

app.use("/api/bookings", bookingRoutes);

app.use(notFound);

app.use(errorHandler);

const PORT = process.env.PORT || 5000;

app.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`);
});