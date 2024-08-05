DROP DATABASE IF EXISTS MyHotelDatabase;
CREATE DATABASE MyHotelDatabase;
USE MyHotelDatabase;

CREATE TABLE RoomType (
    RoomTypeID INT PRIMARY KEY,
    TypeName VARCHAR(50) UNIQUE,
    MaxOccupancy INT
);


CREATE TABLE RoomView (
    RoomViewID INT PRIMARY KEY,
    ViewName VARCHAR(50)
);

CREATE TABLE Facility (
    FacilityID INT PRIMARY KEY,
    FacilityName VARCHAR(50) UNIQUE
);

CREATE TABLE RoomStatus (
    RoomStatusID INT PRIMARY KEY,
    StatusName VARCHAR(50) UNIQUE
);

CREATE TABLE ReservationPolicy (
    PolicyID INT PRIMARY KEY,
    PolicyDescription TEXT,
    RefundPeriod INT,
    DepositRequired BOOLEAN
);

CREATE TABLE Customer (
    CustomerID INT PRIMARY KEY,
    Name VARCHAR(100),
    Email VARCHAR(100) UNIQUE,
    PhoneNumber VARCHAR(20),
    MembershipLevel VARCHAR(50)
);

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

CREATE TABLE RoomFacility (
    RoomID INT,
    FacilityID INT,
    PRIMARY KEY (RoomID, FacilityID),
    FOREIGN KEY (RoomID) REFERENCES Room(RoomID),
    FOREIGN KEY (FacilityID) REFERENCES Facility(FacilityID)
);


CREATE TABLE Reservation (
    ReservationID INT AUTO_INCREMENT PRIMARY KEY,
    RoomID INT,
    CustomerID INT,
    ReservationDate DATE,
    CheckInDate DATE,
    CheckOutDate DATE,
    ReservationStatus VARCHAR(50),
    PolicyID INT,
    IncludedMeals VARCHAR(255),
    FOREIGN KEY (RoomID) REFERENCES Room(RoomID),
    FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID),
    FOREIGN KEY (PolicyID) REFERENCES ReservationPolicy(PolicyID)
);

CREATE TABLE RoomPhoto (
    PhotoID INT PRIMARY KEY,
    RoomID INT,
    PhotoURL VARCHAR(255),
    FOREIGN KEY (RoomID) REFERENCES Room(RoomID)
);

-- Indexes for optimization
CREATE INDEX idx_room_type ON Room(RoomTypeID);
CREATE INDEX idx_view ON Room(RoomViewID);
CREATE INDEX idx_status ON Room(RoomStatusID);
CREATE INDEX idx_customer ON Reservation(CustomerID);
CREATE INDEX idx_checkin_date ON Reservation(CheckInDate);
