const Booking = require("../models/Booking");
const Event = require("../models/Event");
const QRCode = require("qrcode");



// GET /api/bookings
// logged-in user's bookings only
const getBookings = async (req, res) => {
  try {

    const bookings = await Booking.find({
      user: req.user._id
    })
      .populate("event");

    res.json(bookings);

  } catch (error) {
    res.status(500).json({
      message: error.message
    });
  }
};



// GET /api/bookings/:id
const getBookingById = async (req, res) => {
  try {

    const booking = await Booking.findById(
      req.params.id
    )
      .populate("event");

    if (!booking) {
      return res.status(404).json({
        message: "Booking not found"
      });
    }

    // ownership check
    if (
      booking.user.toString() !==
      req.user._id.toString()
    ) {
      return res.status(403).json({
        message:
          "Not authorized to access this booking"
      });
    }

    res.json(booking);

  } catch (error) {
    res.status(500).json({
      message: error.message
    });
  }
};



// POST /api/bookings
const createBooking = async (req, res) => {
  try {

    const {
      event: eventId,
      quantity
    } = req.body;

    // quantity validation
    if (quantity <= 0) {
      return res.status(400).json({
        message:
          "Quantity must be greater than 0"
      });
    }

    const event = await Event.findById(eventId);

    if (!event) {
      return res.status(404).json({
        message: "Event not found"
      });
    }

    // available seats
    const availableSeats =
      event.seatCapacity - event.bookedSeats;

    // prevent overbooking
    if (quantity > availableSeats) {
      return res.status(400).json({
        message:
          "Not enough seats available"
      });
    }

    // update booked seats
    event.bookedSeats += quantity;

    await event.save();

    // create booking
const booking = new Booking({
  user: req.user._id,
  event: eventId,
  quantity
});

// use booking ID as QR data
const qrData = booking._id.toString();

// generate QR image
booking.qrCode = await QRCode.toDataURL(qrData);

await booking.save();

    res.status(201).json(booking);

  } catch (error) {
    res.status(500).json({
      message: error.message
    });
  }
  res.status(201).json(booking);
};

const validateBookingQR = async (req, res) => {
  try {
    const booking = await Booking.findById(req.params.qr)
      .populate("event")
      .populate("user");

    if (!booking) {
      return res.status(404).json({
        valid: false,
        message: "Invalid QR Code"
      });
    }

    res.json({
      valid: true,
      booking
    });

  } catch (error) {
    res.status(500).json({
      message: error.message
    });
  }
};

module.exports = {
  getBookings,
  getBookingById,
  createBooking,
  validateBookingQR
};