More About MyHotelDatabase
1. Database Design
Our database is designed to efficiently manage all aspects of a hotel's room operations.
It includes:

Room Information: 
Captures details like room type, view, price, and availability.
Facilities: Manages a comprehensive list of amenities for each room.
Reservations: Tracks booking information, customer details, and reservation policies.
Photos: Stores URLs for room images to enhance user engagement.

2. SQL Code Overview
We developed SQL scripts to create and populate the database. Key tables include:

Room: 
Stores details about each room.
RoomType: Defines categories such as Single, Double, Suite.
RoomView: Specifies views like Sea, Mountain, City.
Facility: Lists all available amenities.
RoomFacility: Associates rooms with their respective facilities.
Reservation: Tracks bookings and customer details.
RoomPhoto: Stores links to room images.

SQL Example:
sql
CREATE TABLE Room (
    RoomID INT PRIMARY KEY,
    RoomTypeID INT,
    RoomViewID INT,
    Size INT,
    Floor INT,
    Price DECIMAL(10, 2),
    RoomStatusID INT,
    BedCount INT,
    Description TEXT,
    FOREIGN KEY (RoomTypeID) REFERENCES RoomType(RoomTypeID),
    FOREIGN KEY (RoomViewID) REFERENCES RoomView(RoomViewID),
    FOREIGN KEY (RoomStatusID) REFERENCES RoomStatus(RoomStatusID)
);
This table defines the basic structure for storing room information, linking to other tables for room types, views, and statuses.

3. Deployment
MySQL Database: Deployed on SiteGround with all necessary tables and relationships.
PHP Backend: Facilitates interactions with the database, including querying and updating data.
Web Hosting: Hosted on SiteGround with integration of PHP for dynamic content rendering.
