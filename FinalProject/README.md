# Event Ticketing System API

## Setup for local running instructions

### 1. Clone the Repository
[git clone YOUR_GITHUB_REPOSITORY_URL](https://github.com/Fightingsteele/Steele_INF653/tree/main/FinalProject)

### 2. Open the Project folder
cd FinalProject

### 3. install dependencies
npm install

### 4. 
Create a .env file in the root folder and add (MONGO_URI and JWT_SECRET should be changed):
PORT=5000
MONGO_URI=your_mongodb_connection_string
JWT_SECRET=your_jwt_secret

example .env
PORT=5000
MONGO_URI=mongodb+srv://username:password@cluster.mongodb.net/eventTicketDB?retryWrites=true&w=majority
JWT_SECRET=mysecretkey

### 5. Start server
npm run dev


For each of the below, include http://localhost:5000/ infront of each. Example http://localhost:5000/api/auth/register
Users (Uses User id)
Register User
POST /api/auth/register
Login User
POST /api/auth/login

Events(Uses event id)
Get all events
GET /api/events
Get single event
GET /api/events/:id
Filter by catagory and filter by date
GET /api/events?category=Music, GET /api/events?date=2026-06-10
Create event (admin)
POST /api/events
Update event (admin)
PUT /api/events/:id
Delete event (admin)
DELETE /api/events/:id

Booking (Uses booking id)
Get bookings for logged in user
GET /api/bookings
Get single booking
GET /api/bookings/:id
Create booking
POST /api/bookings

Deployed URL
https://final-project-hbg6.onrender.com/
