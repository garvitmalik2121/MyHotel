Hotel Room Database Design Overview
1. Database Structure
Tables and Relationships:
Room: Central table containing details like room type, view, price, and status.
RoomType & RoomView: Categorizes rooms by type (single, double, suite) and view (sea, mountain, city).
Facility & RoomFacility: Lists amenities and maps them to rooms.
Reservation: Links customers to room bookings with details like check-in/out dates and policies.
Customer: Stores customer information.
RoomPhoto: Contains URLs of room photos.

3. Deployment Choices
Database: MySQL hosted on SiteGround.
Backend: PHP scripts for handling database connections and queries.
Web Hosting: SiteGround web hosting.
Front-End: Simple HTML/CSS pages for testing connections and displaying room data.

5. GitHub Repository
Overview: The repository contains SQL scripts for database creation, PHP scripts for backend logic, and deployment instructions.
Link: GitHub Repository (replace with the actual link).
