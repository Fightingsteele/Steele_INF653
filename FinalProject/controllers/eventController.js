const Event = require("../models/Event");
const Booking = require("../models/Booking");


// GET /api/events
const getEvents = async (req, res) => {
  try {
    const filter = {};

    // filter by category
    if (req.query.category) {
      filter.category = req.query.category;
    }

    // filter by date
    if (req.query.date) {
      const start = new Date(req.query.date);
      const end = new Date(req.query.date);

      end.setDate(end.getDate() + 1);

      filter.date = {
        $gte: start,
        $lt: end
      };
    }

    const events = await Event.find(filter);

    res.json(events);

  } catch (error) {
    res.status(500).json({
      message: error.message
    });
  }
};



// GET /api/events/:id
const getEventById = async (req, res) => {
  try {

    const event = await Event.findById(req.params.id);

    if (!event) {
      return res.status(404).json({
        message: "Event not found"
      });
    }

    res.json(event);

  } catch (error) {
    res.status(500).json({
      message: error.message
    });
  }
};



// POST /api/events
// admin only
const createEvent = async (req, res) => {
  try {

    const {
      title,
      description,
      category,
      venue,
      date,
      time,
      seatCapacity,
      price
    } = req.body;

    // validation
    if (seatCapacity <= 0) {
      return res.status(400).json({
        message: "Seat capacity must be greater than 0"
      });
    }

    if (price < 0) {
      return res.status(400).json({
        message: "Price cannot be negative"
      });
    }

    const event = await Event.create({
      title,
      description,
      category,
      venue,
      date,
      time,
      seatCapacity,
      price
    });

    res.status(201).json(event);

  } catch (error) {
    res.status(500).json({
      message: error.message
    });
  }
};



// PUT /api/events/:id
// admin only
const updateEvent = async (req, res) => {
  try {

    const event = await Event.findById(req.params.id);

    if (!event) {
      return res.status(404).json({
        message: "Event not found"
      });
    }

    // important validation
    if (
      req.body.seatCapacity &&
      req.body.seatCapacity < event.bookedSeats
    ) {
      return res.status(400).json({
        message:
          "Seat capacity cannot be less than booked seats"
      });
    }

    const updatedEvent = await Event.findByIdAndUpdate(
      req.params.id,
      req.body,
      { new: true }
    );

    res.json(updatedEvent);

  } catch (error) {
    res.status(500).json({
      message: error.message
    });
  }
};



// DELETE /api/events/:id
// admin only
const deleteEvent = async (req, res) => {
  try {

    const event = await Event.findById(req.params.id);

    if (!event) {
      return res.status(404).json({
        message: "Event not found"
      });
    }

    // prevent delete if bookings exist
    const bookings = await Booking.find({
      event: event._id
    });

    if (bookings.length > 0) {
      return res.status(400).json({
        message:
          "Cannot delete event with existing bookings"
      });
    }

    await event.deleteOne();

    res.json({
      message: "Event deleted"
    });

  } catch (error) {
    res.status(500).json({
      message: error.message
    });
  }
};



module.exports = {
  getEvents,
  getEventById,
  createEvent,
  updateEvent,
  deleteEvent
};