-- Disable foreign key checks
SET FOREIGN_KEY_CHECKS = 0;

-- Truncate table data
TRUNCATE TABLE RoomFacility;
TRUNCATE TABLE RoomPhoto;
TRUNCATE TABLE Reservation;
TRUNCATE TABLE Room;
TRUNCATE TABLE Customer;
TRUNCATE TABLE ReservationPolicy;
TRUNCATE TABLE RoomStatus;
TRUNCATE TABLE Facility;
TRUNCATE TABLE RoomView;
TRUNCATE TABLE RoomType;

-- Enable foreign key checks
SET FOREIGN_KEY_CHECKS = 1;

-- Insert facility data
INSERT INTO Facility (FacilityID, FacilityName) VALUES
(1, 'WiFi'),
(2, 'Air Conditioning'),
(3, 'Electronic Door Lock'),
(4, 'Electronic Smoke Detector'),
(5, 'Refrigerator'),
(6, 'Slippers, Towels, Bathrobes'),
(7, 'Electric Kettle'),
(8, 'LED LCD TV'),
(9, 'Coffee Maker & Tea'),
(10, 'Hair Dryer'),
(11, 'Private Bathroom and Toilet'),
(12, 'Shower'),
(13, 'Fitness Equipment'),
(14, 'Standard Room Service'),
(15, 'VIP Room Service'),
(16, 'Hot Tub'),
(17, 'Kitchen, Cookware'),
(18, 'Speakers'),
(19, 'Pay TV Channels'),
(20, 'Massage Chair'),
(21, 'Non-Smoking Room'),
(22, 'Mini Bar'),
(23, 'Game Console (Switch/PS4)');

-- Insert room type data
INSERT INTO RoomType (RoomTypeID, TypeName, MaxOccupancy) VALUES
(1, 'Single Room', 1), (2, 'Double Room', 3), (3, 'Suite', 5);

-- Insert room view data
INSERT INTO RoomView (RoomViewID, ViewName) VALUES
(1, 'Sea View'), (2, 'Mountain View'), (3, 'City View');

-- Insert room status data
INSERT INTO RoomStatus (RoomStatusID, StatusName) VALUES
(1, 'Available'), (2, 'Booked');

-- Insert reservation policy data
INSERT INTO ReservationPolicy (PolicyID, PolicyDescription, RefundPeriod, DepositRequired) VALUES
(1, 'Standard Policy - No deposit required, full refund if canceled one day in advance', 1, FALSE),
(2, 'Premium Policy - Deposit required, non-refundable', 0, TRUE);

-- Insert customer data
INSERT INTO Customer (CustomerID, Name, Email, PhoneNumber, MembershipLevel) VALUES
(1, 'John Doe', 'johndoe@example.com', '1234567890', 'Gold'),
(2, 'Jane Smith', 'janesmith@example.com', '0987654321', 'Silver');

-- Insert room data and update description
INSERT INTO Room (RoomID, RoomTypeID, RoomViewID, Size, Floor, Price, RoomStatusID, BedCount, Description) VALUES
(1, 1, 1, 20, 1, 100.00, 1, 1, 'Single room with sea view, perfect for a personal escape with stunning seaside views.'),
(2, 2, 1, 30, 1, 150.00, 1, 2, 'Double room with sea view, ideal for couples with modern facilities and beautiful sea views.'),
(3, 3, 1, 50, 1, 300.00, 2, 2, 'Suite with sea view, luxurious decor with private balcony and hot tub, breathtaking sea views.'),
(4, 1, 2, 20, 2, 90.00, 1, 1, 'Single room with mountain view, simple decor with scenic mountain views.'),
(5, 2, 2, 30, 2, 140.00, 2, 2, 'Double room with mountain view, spacious and comfortable with beautiful natural surroundings.'),
(6, 3, 2, 50, 2, 280.00, 1, 2, 'Suite with mountain view, spacious living area and full kitchen, ideal for families and long stays.'),
(7, 1, 3, 20, 3, 80.00, 1, 1, 'Single room with city view, modern design, perfect for business travelers.'),
(8, 2, 3, 30, 3, 130.00, 1, 2, 'Double room with city view, comfortable and convenient, ideal for city explorers.'),
(9, 3, 3, 50, 3, 260.00, 2, 2, 'Suite with city view, top floor with premium entertainment system and spacious living area.'),
(10, 2, 3, 30, 4, 135.00, 1, 2, 'Double room with city view, extra comfort and luxury for high-end living.');

-- Add basic facilities to all rooms
INSERT INTO RoomFacility (RoomID, FacilityID) VALUES
(1, 1), (1, 2), (1, 3), (1, 4), (1, 5), (1, 6), (1, 7), (1, 8), (1, 12), (1, 14), -- Single room, sea view
(2, 1), (2, 2), (2, 3), (2, 4), (2, 5), (2, 6), (2, 7), (2, 8), (2, 12), (2, 14), -- Double room, sea view
(3, 1), (3, 2), (3, 3), (3, 4), (3, 5), (3, 6), (3, 7), (3, 8), (3, 11), (3, 14), -- Suite, sea view
(4, 1), (4, 2), (4, 3), (4, 4), (4, 5), (4, 6), (4, 7), (4, 8), (4, 12), (4, 14), -- Single room, mountain view
(5, 1), (5, 2), (5, 3), (5, 4), (5, 5), (5, 6), (5, 7), (5, 8), (5, 12), (5, 14), -- Double room, mountain view
(6, 1), (6, 2), (6, 3), (6, 4), (6, 5), (6, 6), (6, 7), (6, 8), (6, 11), (6, 14), -- Suite, mountain view
(7, 1), (7, 2), (7, 3), (7, 4), (7, 5), (7, 6), (7, 7), (7, 8), (7, 12), (7, 14), -- Single room, city view
(8, 1), (8, 2), (8, 3), (8, 4), (8, 5), (8, 6), (8, 7), (8, 8), (8, 12), (8, 14), -- Double room, city view
(9, 1), (9, 2), (9, 3), (9, 4), (9, 5), (9, 6), (9, 7), (9, 8), (9, 11), (9, 14), -- Suite, city view
(10, 1), (10, 2), (10, 3), (10, 4), (10, 5), (10, 6), (10, 7), (10, 8), (10, 12), (10, 14); -- Double room, city view

-- Add special facilities to each room
INSERT INTO RoomFacility (RoomID, FacilityID) VALUES
(1, 9), (1, 18), (1, 21), -- Room 1 has Coffee Maker & Tea, Speakers, Non-Smoking Room
(2, 10), (2, 19), (2, 22), -- Room 2 has Hair Dryer, Pay TV Channels, Mini Bar
(3, 9), (3, 16), (3, 23), -- Room 3 has Coffee Maker & Tea, Hot Tub, Game Console (Switch/PS4)
(4, 9), (4, 18), (4, 21), -- Room 4 has Coffee Maker & Tea, Speakers, Non-Smoking Room
(5, 10), (5, 19), (5, 22), -- Room 5 has Hair Dryer, Pay TV Channels, Mini Bar
(6, 9), (6, 16), (6, 17), (6, 23), -- Room 6 has Coffee Maker & Tea, Hot Tub, Kitchen, Cookware, Game Console (Switch/PS4)
(7, 9), (7, 18), (7, 21), -- Room 7 has Coffee Maker & Tea, Speakers, Non-Smoking Room
(8, 10), (8, 19), (8, 22), -- Room 8 has Hair Dryer, Pay TV Channels, Mini Bar
(9, 9), (9, 16), (9, 23), -- Room 9 has Coffee Maker & Tea, Hot Tub, Game Console (Switch/PS4)
(10, 10), (10, 18), (10, 21); -- Room 10 has Hair Dryer, Speakers, Non-Smoking Room

-- Add VIP room service to rooms with price >= 300 if they don't have standard room service
DELETE FROM RoomFacility WHERE RoomID IN (3, 6) AND FacilityID = 14;
INSERT INTO RoomFacility (RoomID, FacilityID) SELECT RoomID, 15 FROM Room WHERE Price >= 300;

-- Insert reservation data, including meal plans
INSERT INTO Reservation (ReservationID, RoomID, CustomerID, ReservationDate, CheckInDate, CheckOutDate, ReservationStatus, PolicyID, IncludedMeals) VALUES
(1, 5, 1, CURDATE(), DATE_ADD(CURDATE(), INTERVAL 3 DAY), DATE_ADD(CURDATE(), INTERVAL 8 DAY), 'Confirmed', 1, 'Includes Breakfast'),
(2, 3, 2, CURDATE(), DATE_ADD(CURDATE(), INTERVAL 1 DAY), DATE_ADD(CURDATE(), INTERVAL 5 DAY), 'Confirmed', 2, 'Includes Buffet'),
(3, 9, 1, CURDATE(), DATE_ADD(CURDATE(), INTERVAL 7 DAY), DATE_ADD(CURDATE(), INTERVAL 14 DAY), 'Confirmed', 1, 'Includes Breakfast and Dinner Buffet'),
(4, 10, 2, CURDATE(), DATE_ADD(CURDATE(), INTERVAL 10 DAY), DATE_ADD(CURDATE(), INTERVAL 15 DAY), 'Confirmed', 1, 'Includes Breakfast and Dinner Buffet');
