const express = require("express");

const router = express.Router();

const {
  getEvents,
  getEventById,
  createEvent,
  updateEvent,
  deleteEvent
} = require("../controllers/eventController");

const protect = require("../middleware/authMiddleware");

const admin = require("../middleware/adminMiddleware");


// public routes
router.get("/", getEvents);

router.get("/:id", getEventById);


// admin routes
router.post("/", protect, admin, createEvent);

router.put("/:id", protect, admin, updateEvent);

router.delete("/:id", protect, admin, deleteEvent);


module.exports = router;
