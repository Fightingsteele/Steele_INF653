const express = require("express");

const router = express.Router();

const {
  getBookings,
  getBookingById,
  createBooking,  
  validateBookingQR
} = require("../controllers/bookingController");

const protect = require("../middleware/authMiddleware");


// protected routes
router.get("/", protect, getBookings);

router.get("/validate/:qr",validateBookingQR);

router.get("/:id", protect, getBookingById);

router.post("/", protect, createBooking);

module.exports = router;