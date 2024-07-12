-- create daatbase
CREATE DATABASE hotel_db;

-- use database
USE hotel_db;

-- create hotel list
CREATE TABLE hotels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    rating INT NOT NULL,
    star_rating INT NOT NULL,
    view_type VARCHAR(50),
    facilities VARCHAR(255),
    room_facilities VARCHAR(255)
);

-- create hotel database
INSERT INTO hotels (name, location, price, rating, star_rating, view_type, facilities, room_facilities)
VALUES 
('Hotel A', 'Beijing', 200.00, 8, 5, 'Sea View', 'gym,pool', 'single bed,bathroom,tv,fridge'),
('Hotel B', 'Shanghai', 150.00, 7, 4, 'City View', 'parking,restaurant', 'double bed,bathroom,tv,kitchen'),
('Hotel C', 'Guangzhou', 100.00, 9, 3, 'Sea View', 'gym,restaurant', 'single bed,bathroom,tv,balcony'),
('Hotel D', 'Shenzhen', 250.00, 6, 2, 'City View', 'pool,parking', 'double bed,bathroom,balcony,fridge');
