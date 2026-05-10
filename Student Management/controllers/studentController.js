const Student = require("../models/Student");

// GET all students
exports.getStudents = async (req, res) => {
  const students = await Student.find();
  res.json(students);
};

// GET one student
exports.getStudentById = async (req, res) => {
  const student = await Student.findById(req.params.id);
  res.json(student);
};

// CREATE student
exports.createStudent = async (req, res) => {
  const newStudent = new Student(req.body);
  const saved = await newStudent.save();
  res.status(201).json(saved);
};

// UPDATE student
exports.updateStudent = async (req, res) => {
  const updated = await Student.findByIdAndUpdate(
    req.params.id,
    req.body,
    { new: true }
  );
  res.json(updated);
};

// DELETE student
exports.deleteStudent = async (req, res) => {
  await Student.findByIdAndDelete(req.params.id);
  res.json({ message: "Student deleted" });
};