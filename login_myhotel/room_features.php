<?php
session_start();
include("connection.php");
include("functions.php");

// Check if user is logged in
$user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Room Comparison</title>
    <style>
        /* General reset and styling */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-image: url('images/background_image.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 1200px;
            width: 100%;
            overflow-y: auto;
        }
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        .room-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .room {
            flex: 1 1 300px;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s ease;
            max-width: 300px;
            cursor: pointer;
        }
        .room:hover {
            transform: translateY(-5px);
        }
        .room h2 {
            margin-top: 0;
        }
        .room img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .room ul {
            list-style-type: none;
            padding: 0;
        }
        .room ul li {
            margin-bottom: 5px;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.8);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            position: relative;
        }
        .modal-content img {
            width: 100%;
            max-width: 400px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .close {
            color: #aaa;
            position: absolute;
            top: 10px;
            right: 25px;
            font-size: 30px;
            font-weight: bold;
            transition: 0.3s;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        h2 {
            text-align: center;
        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            max-width: 100%;
            height: auto;
        }

        ul {
            list-style-type: disc;
            margin: 20px;
            padding: 0;
        }

        ul li {
            margin: 5px 0;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form label {
            margin: 10px 0 5px;
        }

        form input, form textarea {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        form button {
            background-color: #008CBA;
        }

        form button:hover {
            background-color: #007BB5;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Compare Hotel Rooms</h1>
        </header>
        <div class="room-container">
            <!-- Room 1 -->
            <section class="room" onclick="openModal('room1')">
                <h2>Deluxe Room</h2>
                <img src="images/delux.jpg" alt="Deluxe Room">
                <ul>
                    <li>Price: $200/night</li>
                    <li>Size: 30 sqm</li>
                    <li>Bed: King</li>
                    <li>View: Sea</li>
                    <li>WiFi: Yes</li>
                </ul>
            </section>
            <!-- Room 2 -->
            <section class="room" onclick="openModal('room2')">
                <h2>Standard Room</h2>
                <img src="images/standard.jpeg" alt="Standard Room">
                <ul>
                    <li>Price: $100/night</li>
                    <li>Size: 20 sqm</li>
                    <li>Bed: Queen</li>
                    <li>View: City</li>
                    <li>WiFi: Yes</li>
                </ul>
            </section>
            <!-- Room 3 -->
            <section class="room" onclick="openModal('room3')">
                <h2>Suite</h2>
                <img src="images/suites.jpg" alt="Suite">
                <ul>
                    <li>Price: $300/night</li>
                    <li>Size: 50 sqm</li>
                    <li>Bed: King</li>
                    <li>View: Sea</li>
                    <li>WiFi: Yes</li>
                </ul>
            </section>
            <!-- Room 4 -->
            <section class="room" onclick="openModal('room4')">
                <h2>Family Room</h2>
                <img src="images/family.jpg" alt="Family Room">
                <ul>
                    <li>Price: $250/night</li>
                    <li>Size: 40 sqm</li>
                    <li>Bed: 2 Queens</li>
                    <li>View: Garden</li>
                    <li>WiFi: Yes</li>
                </ul>
            </section>
            <!-- Room 5 -->
            <section class="room" onclick="openModal('room5')">
                <h2>Single Room</h2>
                <img src="images/single.jpg" alt="Single Room">
                <ul>
                    <li>Price: $80/night</li>
                    <li>Size: 15 sqm</li>
                    <li>Bed: Single</li>
                    <li>View: Courtyard</li>
                    <li>WiFi: Yes</li>
                </ul>
            </section>
            <!-- Room 6 -->
            <section class="room" onclick="openModal('room6')">
                <h2>Presidential Suite</h2>
                <img src="images/presidential.jpg" alt="Presidential Suite">
                <ul>
                    <li>Price: $500/night</li>
                    <li>Size: 80 sqm</li>
                    <li>Bed: King</li>
                    <li>View: City & Sea</li>
                    <li>WiFi: Yes</li>
                </ul>
            </section>
            <!-- Room 7 -->
            <section class="room" onclick="openModal('room7')">
                <h2>Junior Suite</h2>
                <img src="images/junior suites.jpg" alt="Junior Suite">
                <ul>
                    <li>Price: $350/night</li>
                    <li>Size: 60 sqm</li>
                    <li>Bed: King</li>
                    <li>View: Sea</li>
                    <li>WiFi: Yes</li>
                </ul>
            </section>
            <!-- Room 8 -->
            <section class="room" onclick="openModal('room8')">
                <h2>Economy Room</h2>
                <img src="images/economy.jpg" alt="Economy Room">
                <ul>
                    <li>Price: $60/night</li>
                    <li>Size: 12 sqm</li>
                    <li>Bed: Single</li>
                    <li>View: City</li>
                    <li>WiFi: Yes</li>
                </ul>
            </section>
            <!-- Room 9 -->
            <section class="room" onclick="openModal('room9')">
                <h2>Luxury Suite</h2>
                <img src="images/luxury.jpg" alt="Luxury Suite">
                <ul>
                    <li>Price: $400/night</li>
                    <li>Size: 70 sqm</li>
                    <li>Bed: King</li>
                    <li>View: Sea</li>
                    <li>WiFi: Yes</li>
                </ul>
            </section>
            <!-- Room 10 -->
            <section class="room" onclick="openModal('room10')">
                <h2>Business Room</h2>
                <img src="images/buisness.jpg" alt="Business Room">
                <ul>
                    <li>Price: $150/night</li>
                    <li>Size: 25 sqm</li>
                    <li>Bed: Queen</li>
                    <li>View: City</li>
                    <li>WiFi: Yes</li>
                </ul>
            </section>
            <!-- Room 11 -->
            <section class="room" onclick="openModal('room11')">
                <h2>Accessible Room</h2>
                <img src="images/enterance.jpg" alt="Accessible Room">
                <ul>
                    <li>Price: $130/night</li>
                    <li>Size: 22 sqm</li>
                    <li>Bed: Queen</li>
                    <li>View: Courtyard</li>
                    <li>WiFi: Yes</li>
                </ul>
            </section>
            <!-- Room 12 -->
            <section class="room" onclick="openModal('room12')">
                <h2>Executive Suite</h2>
                <img src="images/execurtive.jpg" alt="Executive Suite">
                <ul>
                    <li>Price: $450/night</li>
                    <li>Size: 75 sqm</li>
                    <li>Bed: King</li>
                    <li>View: City</li>
                    <li>WiFi: Yes</li>
                </ul>
            </section>
        </div>
    </div>

    <!-- Modals for each room -->
    <!-- Example for Room 1 -->
<div id="modal-room1" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('room1')">&times;</span>
        <h2>Deluxe Room Details</h2>
        <img src="images/delux.jpg" alt="Deluxe Room">
        <ul>
            <li>En-suite bathroom with bathtub and separate shower</li>
            <li>Work desk and ergonomic chair</li>
            <li>Flat-screen TV with cable channels</li>
            <li>Mini-bar stocked with refreshments</li>
            <li>In-room safe for valuables</li>
            <li>Coffee and tea making facilities</li>
            <li>Complimentary toiletries and bathrobe</li>
            <li>24-hour room service available</li>
        </ul>
        <p>A Deluxe Room is designed to offer guests a luxurious and comfortable experience during their stay. These rooms are often larger than standard accommodations, providing around 30 square meters of space, which allows for a spacious environment. They are typically furnished with a King-sized bed, ensuring a restful sleep, and often include additional amenities such as a work desk, a cozy seating area for relaxation, and a well-appointed bathroom with upscale toiletries.</p>
        <button onclick="openBookingForm('Deluxe Room', 'En-suite bathroom with bathtub and separate shower, Work desk and ergonomic chair, Flat-screen TV with cable channels, Mini-bar stocked with refreshments, In-room safe for valuables, Coffee and tea making facilities, Complimentary toiletries and bathrobe, 24-hour room service available')">Book Now</button>
    </div>
</div>

<!-- Example for Room 2 -->
<div id="modal-room2" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('room2')">&times;</span>
        <h2>Standard Room Details</h2>
        <img src="images/standard.jpeg" alt="Standard Room">
        <ul>
            <li>En-suite bathroom with bathtub and separate shower</li>
            <li>Work desk and ergonomic chair</li>
            <li>Flat-screen TV with cable channels</li>
            <li>Mini-bar stocked with refreshments</li>
            <li>In-room safe for valuables</li>
            <li>Coffee and tea making facilities</li>
            <li>Complimentary toiletries and bathrobe</li>
            <li>24-hour room service available</li>
        </ul>
        <p>The Standard Room at our hotel is a haven of comfort and functionality, designed to cater to both leisure and business travelers alike. Spanning approximately 25 square meters, each Standard Room features a well-appointed en-suite bathroom equipped with both a bathtub and a separate shower, ensuring guests can indulge in a luxurious bathing experience of their choice. A spacious work desk paired with an ergonomic chair offers a dedicated space for guests needing to catch up on work or simply unwind with their laptop.</p>
        <button onclick="openBookingForm('Standard Room', 'En-suite bathroom with bathtub and separate shower, Work desk and ergonomic chair, Flat-screen TV with cable channels, Mini-bar stocked with refreshments, In-room safe for valuables, Coffee and tea making facilities, Complimentary toiletries and bathrobe, 24-hour room service available')">Book Now</button>
    </div>
</div>

<!-- Example for Room 3 -->
<div id="modal-room3" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('room3')">&times;</span>
        <h2>Suite Details</h2>
        <img src="images/suites.jpg" alt="Suite">
        <ul>
            <li>Spacious living area with tasteful decor</li>
            <li>Separate bedroom for privacy</li>
            <li>Luxurious bathroom with bathtub and separate shower</li>
            <li>Large flat-screen TV with premium cable channels</li>
            <li>Well-stocked mini-bar</li>
            <li>In-room safe for valuables</li>
            <li>Coffee and tea making facilities</li>
            <li>Luxury toiletries and plush bathrobes</li>
            <li>Dedicated work desk with ergonomic chair</li>
            <li>24-hour room service available</li>
        </ul>
        <p>The Suites at our establishment redefine luxury with spaciousness and a focus on unparalleled comfort. Each suite is meticulously crafted to provide a refined experience, combining tasteful decor with premium amenities. Step into a world of tranquility with a generously sized living area that invites relaxation and socializing. The separate bedroom offers privacy and a serene retreat, complemented by a luxurious bathroom featuring high-end fixtures, a bathtub, and a separate shower for indulgent bathing experiences.</p>
        <button onclick="openBookingForm('Suite', 'Spacious living area with tasteful decor, Separate bedroom for privacy, Luxurious bathroom with bathtub and separate shower, Large flat-screen TV with premium cable channels, Well-stocked mini-bar, In-room safe for valuables, Coffee and tea making facilities, Luxury toiletries and plush bathrobes, Dedicated work desk with ergonomic chair, 24-hour room service available')">Book Now</button>
    </div>
</div>

<!-- Example for Room 4 -->
<div id="modal-room4" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('room4')">&times;</span>
        <h2>Family Room Details</h2>
        <img src="images/family.jpg" alt="Family Room">
        <ul>
            <li>Spacious accommodation with multiple sleeping areas or separate bedrooms</li>
            <li>Comfortable seating arrangements for relaxation</li>
            <li>En-suite bathroom with bathtub and separate shower</li>
            <li>Flat-screen TV with a selection of channels</li>
            <li>Mini-refrigerator or mini-bar stocked with refreshments</li>
            <li>In-room safe for valuables</li>
            <li>Coffee and tea making facilities</li>
            <li>Complimentary toiletries</li>
            <li>Children's amenities available upon request</li>
            <li>Option for connecting rooms</li>
        </ul>
        <p>A Family Room is designed to cater specifically to families or larger groups traveling together, offering a spacious and comfortable accommodation option. It typically includes multiple sleeping areas or separate bedrooms to ensure privacy and convenience for all guests. The room is furnished with a variety of bed configurations, such as double beds, twin beds, or bunk beds, accommodating different family sizes and preferences.</p>
        <button onclick="openBookingForm('Family Room', 'Spacious accommodation with multiple sleeping areas or separate bedrooms, Comfortable seating arrangements for relaxation, En-suite bathroom with bathtub and separate shower, Flat-screen TV with a selection of channels, Mini-refrigerator or mini-bar stocked with refreshments, In-room safe for valuables, Coffee and tea making facilities, Complimentary toiletries, Children\'s amenities available upon request, Option for connecting rooms')">Book Now</button>
    </div>
</div>

<!-- Example for Room 5 -->
<div id="modal-room5" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('room5')">&times;</span>
        <h2>Single Room Details</h2>
        <img src="images/single.jpg" alt="Single Room">
        <ul>
            <li>Single bed for one guest</li>
            <li>Private en-suite bathroom with shower, toilet, and sink</li>
            <li>Dedicated work desk with ergonomic chair</li>
            <li>Flat-screen TV with various cable channels</li>
            <li>Storage options such as wardrobe or closet</li>
            <li>Mini-refrigerator for storing refreshments</li>
            <li>Coffee and tea making facilities</li>
            <li>In-room safe for valuables</li>
            <li>High-speed internet access</li>
        </ul>
        <p>A Single Room is tailored for solo travelers seeking comfort and functionality in a compact space. Typically outfitted with a single bed, these rooms offer a cozy environment for one guest. They feature a private en-suite bathroom equipped with a shower, toilet, and sink, ensuring privacy and convenience. A dedicated work desk with an ergonomic chair caters to business travelers or those needing a personal workspace. Entertainment needs are met with a flat-screen TV, providing access to various channels.</p>
        <button onclick="openBookingForm('Single Room', 'Single bed for one guest, Private en-suite bathroom with shower, toilet, and sink, Dedicated work desk with ergonomic chair, Flat-screen TV with various cable channels, Storage options such as wardrobe or closet, Mini-refrigerator for storing refreshments, Coffee and tea making facilities, In-room safe for valuables, High-speed internet access')">Book Now</button>
    </div>
</div>

<!-- Example for Room 6 -->
<div id="modal-room6" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('room6')">&times;</span>
        <h2>Presidential Suite Details</h2>
        <img src="images/presidential.jpg" alt="Presidential Suite">
        <ul>
            <li>Spacious living room with elegant furnishings</li>
            <li>Dining area for private meals and gatherings</li>
            <li>Master bedroom with a king-sized bed and premium linens</li>
            <li>Luxurious bathroom with a Jacuzzi and separate shower</li>
            <li>Personalized service and dedicated concierge</li>
            <li>State-of-the-art entertainment system</li>
            <li>Fully stocked mini-bar with premium beverages</li>
            <li>In-room safe for valuables</li>
            <li>Coffee and tea making facilities</li>
            <li>Access to exclusive lounge or amenities</li>
        </ul>
        <p>The Presidential Suite represents the pinnacle of luxury and exclusivity, designed to offer an unparalleled experience for high-profile guests or those seeking the ultimate indulgence. This suite features a spacious living room adorned with elegant furnishings and a separate dining area for private meals or gatherings. The master bedroom is fitted with a king-sized bed, premium linens, and additional features to ensure maximum comfort and relaxation.</p>
        <button onclick="openBookingForm('Presidential Suite', 'Spacious living room with elegant furnishings, Dining area for private meals and gatherings, Master bedroom with a king-sized bed and premium linens, Luxurious bathroom with a Jacuzzi and separate shower, Personalized service and dedicated concierge, State-of-the-art entertainment system, Fully stocked mini-bar with premium beverages, In-room safe for valuables, Coffee and tea making facilities, Access to exclusive lounge or amenities')">Book Now</button>
    </div>
</div>

<!-- Example for Room 7 -->
<div id="modal-room7" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('room7')">&times;</span>
        <h2>Executive Room Details</h2>
        <img src="images/executive.jpg" alt="Executive Room">
        <ul>
            <li>Spacious and well-appointed room with work desk</li>
            <li>King-sized bed with premium bedding</li>
            <li>En-suite bathroom with high-end fixtures</li>
            <li>Large flat-screen TV with cable channels</li>
            <li>Mini-bar stocked with snacks and beverages</li>
            <li>In-room safe for valuables</li>
            <li>Coffee and tea making facilities</li>
            <li>Complimentary Wi-Fi access</li>
            <li>Exclusive access to executive lounge</li>
        </ul>
        <p>The Executive Room is designed for business travelers and discerning guests who require a blend of comfort and functionality. This spacious room features a king-sized bed with premium bedding, ensuring a restful sleep. The en-suite bathroom is fitted with high-end fixtures and amenities. The room includes a well-appointed work desk, large flat-screen TV, mini-bar, and coffee/tea making facilities. Guests also benefit from complimentary Wi-Fi access and exclusive access to the executive lounge.</p>
        <button onclick="openBookingForm('Executive Room', 'Spacious and well-appointed room with work desk, King-sized bed with premium bedding, En-suite bathroom with high-end fixtures, Large flat-screen TV with cable channels, Mini-bar stocked with snacks and beverages, In-room safe for valuables, Coffee and tea making facilities, Complimentary Wi-Fi access, Exclusive access to executive lounge')">Book Now</button>
    </div>
</div>

<!-- Example for Room 8 -->
<div id="modal-room8" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('room8')">&times;</span>
        <h2>Junior Suite Details</h2>
        <img src="images/junior_suite.jpg" alt="Junior Suite">
        <ul>
            <li>Open-plan living area with stylish decor</li>
            <li>Separate sleeping area with a queen-sized bed</li>
            <li>En-suite bathroom with luxury fixtures</li>
            <li>Flat-screen TV with a selection of channels</li>
            <li>Mini-bar with a variety of beverages and snacks</li>
            <li>In-room safe for valuables</li>
            <li>Coffee and tea making facilities</li>
            <li>Complimentary toiletries and bathrobes</li>
            <li>Comfortable seating area for relaxation</li>
        </ul>
        <p>The Junior Suite offers a sophisticated and spacious retreat for guests who appreciate a blend of comfort and style. The open-plan design includes a living area and a separate sleeping area with a queen-sized bed, providing ample space to relax. The en-suite bathroom features luxury fixtures, and the suite is equipped with a flat-screen TV, mini-bar, coffee/tea making facilities, and complimentary toiletries. A comfortable seating area allows guests to unwind after a day of activities.</p>
        <button onclick="openBookingForm('Junior Suite', 'Open-plan living area with stylish decor, Separate sleeping area with a queen-sized bed, En-suite bathroom with luxury fixtures, Flat-screen TV with a selection of channels, Mini-bar with a variety of beverages and snacks, In-room safe for valuables, Coffee and tea making facilities, Complimentary toiletries and bathrobes, Comfortable seating area for relaxation')">Book Now</button>
    </div>
</div>

<!-- Example for Room 9 -->
<div id="modal-room9" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('room9')">&times;</span>
        <h2>Superior Room Details</h2>
        <img src="images/superior.jpg" alt="Superior Room">
        <ul>
            <li>Comfortable king-sized bed or twin beds</li>
            <li>En-suite bathroom with modern fixtures</li>
            <li>Flat-screen TV with a variety of channels</li>
            <li>Mini-bar with refreshments</li>
            <li>In-room safe for valuables</li>
            <li>Coffee and tea making facilities</li>
            <li>Complimentary Wi-Fi access</li>
            <li>Work desk with ergonomic chair</li>
            <li>Complimentary toiletries</li>
        </ul>
        <p>The Superior Room offers a step up in comfort and elegance from the standard accommodations. Featuring either a king-sized bed or twin beds, this room is designed to provide a restful and enjoyable stay. The en-suite bathroom is equipped with modern fixtures and high-quality toiletries. Guests can enjoy a flat-screen TV with a variety of channels, a well-stocked mini-bar, and coffee/tea making facilities. Additional amenities include complimentary Wi-Fi access and a work desk with an ergonomic chair.</p>
        <button onclick="openBookingForm('Superior Room', 'Comfortable king-sized bed or twin beds, En-suite bathroom with modern fixtures, Flat-screen TV with a variety of channels, Mini-bar with refreshments, In-room safe for valuables, Coffee and tea making facilities, Complimentary Wi-Fi access, Work desk with ergonomic chair, Complimentary toiletries')">Book Now</button>
    </div>
</div>

<!-- Example for Room 10 -->
<div id="modal-room10" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('room10')">&times;</span>
        <h2>Luxury Room Details</h2>
        <img src="images/luxury.jpg" alt="Luxury Room">
        <ul>
            <li>Spacious room with high-end furnishings</li>
            <li>King-sized bed with premium linens</li>
            <li>Modern en-suite bathroom with shower and bathtub</li>
            <li>Large flat-screen TV with premium channels</li>
            <li>Mini-bar stocked with high-quality beverages</li>
            <li>In-room safe for valuables</li>
            <li>Coffee and tea making facilities</li>
            <li>Complimentary high-speed Wi-Fi</li>
            <li>Access to exclusive hotel amenities</li>
        </ul>
        <p>The Luxury Room offers an exceptional level of comfort and sophistication. Featuring a spacious layout and high-end furnishings, this room is designed to cater to guests seeking an upscale experience. It includes a king-sized bed with premium linens, a modern en-suite bathroom with both a shower and bathtub, and a large flat-screen TV with premium channels. Additional amenities include a well-stocked mini-bar, in-room safe, coffee/tea making facilities, and complimentary high-speed Wi-Fi. Guests also benefit from access to exclusive hotel amenities.</p>
        <button onclick="openBookingForm('Luxury Room', 'Spacious room with high-end furnishings, King-sized bed with premium linens, Modern en-suite bathroom with shower and bathtub, Large flat-screen TV with premium channels, Mini-bar stocked with high-quality beverages, In-room safe for valuables, Coffee and tea making facilities, Complimentary high-speed Wi-Fi, Access to exclusive hotel amenities')">Book Now</button>
    </div>
</div>

<!-- Example for Room 11 -->
<div id="modal-room11" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('room11')">&times;</span>
        <h2>Garden View Room Details</h2>
        <img src="images/garden_view.jpg" alt="Garden View Room">
        <ul>
            <li>Private balcony with garden view</li>
            <li>Comfortable queen-sized bed</li>
            <li>En-suite bathroom with modern fixtures</li>
            <li>Flat-screen TV with cable channels</li>
            <li>Mini-bar stocked with refreshments</li>
            <li>In-room safe for valuables</li>
            <li>Coffee and tea making facilities</li>
            <li>Complimentary Wi-Fi access</li>
            <li>Complimentary toiletries</li>
        </ul>
        <p>The Garden View Room offers a serene and picturesque environment, featuring a private balcony with views of the beautifully landscaped gardens. The room is furnished with a comfortable queen-sized bed and includes an en-suite bathroom with modern fixtures. Guests can enjoy a flat-screen TV with cable channels, a mini-bar stocked with refreshments, and coffee/tea making facilities. Additional amenities include complimentary Wi-Fi access and high-quality toiletries.</p>
        <button onclick="openBookingForm('Garden View Room', 'Private balcony with garden view, Comfortable queen-sized bed, En-suite bathroom with modern fixtures, Flat-screen TV with cable channels, Mini-bar stocked with refreshments, In-room safe for valuables, Coffee and tea making facilities, Complimentary Wi-Fi access, Complimentary toiletries')">Book Now</button>
    </div>
</div>

<!-- Example for Room 12 -->
<div id="modal-room12" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('room12')">&times;</span>
        <h2>Accessible Room Details</h2>
        <img src="images/accessible.jpg" alt="Accessible Room">
        <ul>
            <li>Wheelchair-accessible room with ample space</li>
            <li>King-sized bed with accessible features</li>
            <li>En-suite bathroom with roll-in shower</li>
            <li>Flat-screen TV with a variety of channels</li>
            <li>Mini-bar with refreshments</li>
            <li>In-room safe for valuables</li>
            <li>Coffee and tea making facilities</li>
            <li>Grab bars and accessible amenities</li>
            <li>Complimentary Wi-Fi access</li>
        </ul>
        <p>The Accessible Room is designed to ensure comfort and ease for guests with mobility challenges. It features a spacious layout with wheelchair access and includes a king-sized bed with accessible features. The en-suite bathroom is equipped with a roll-in shower and grab bars for safety. Additional amenities include a flat-screen TV with a variety of channels, a mini-bar, coffee/tea making facilities, and complimentary Wi-Fi access. The room is thoughtfully designed to accommodate guests' specific needs and preferences.</p>
        <button onclick="openBookingForm('Accessible Room', 'Wheelchair-accessible room with ample space, King-sized bed with accessible features, En-suite bathroom with roll-in shower, Flat-screen TV with a variety of channels, Mini-bar with refreshments, In-room safe for valuables, Coffee and tea making facilities, Grab bars and accessible amenities, Complimentary Wi-Fi access')">Book Now</button>
    </div>
</div>

   <!-- Booking Form Modal -->
<div id="booking-form" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('booking-form')">&times;</span>
        <h2>Booking Form</h2>
        <form id="bookingForm" method="post" action="process_booking.php">
            <div class="form-group">
                <label for="roomType">Room Type:</label>
                <input type="text" id="roomType" name="roomType" readonly>
            </div>
            
            <div class="form-group">
                <label for="roomDetails">Room Details:</label>
                <textarea id="roomDetails" name="roomDetails" readonly></textarea>
            </div>

            <div class="form-group">
                <label for="booking_details">Booking Details:</label>
                <textarea id="booking_details" name="booking_details" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="payment_method">Payment Method:</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="">Select Payment Method</option>
                    <option value="paypal">PayPal</option>
                    <option value="card">Card</option>
                    <option value="cash">Cash</option>
                </select>
            </div>

            <div id="card_details" class="form-group" style="display: none;">
                <label for="card_number">Card Number:</label>
                <input type="text" id="card_number" name="card_number" placeholder="Enter Card Number">
                
                <label for="expiry_date">Expiry Date:</label>
                <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YYYY">
                
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" placeholder="CVV">
            </div>

            <input type="hidden" name="room_price" value="<?php echo htmlspecialchars($room_price); ?>">
            <input type="hidden" name="room_name" value="<?php echo htmlspecialchars($room_name); ?>">

            <div class="form-group">
                <button type="submit">Make Payment</button>
            </div>
        </form>
    </div>
</div>


   <script>
    // Function to open modal for a specific room
    function openModal(roomId) {
        var modal = document.getElementById('modal-' + roomId);
        if (modal) {
            modal.style.display = "block";
        }
    }

    // Function to close modal for a specific room
    function closeModal(roomId) {
        var modal = document.getElementById('modal-' + roomId);
        if (modal) {
            modal.style.display = "none";
        }
    }

    // Function to open the booking form with pre-filled details
    function openBookingForm(roomType, roomDetails) {
        var bookingForm = document.getElementById('booking-form');
        if (bookingForm) {
            document.getElementById('roomType').value = roomType;
            document.getElementById('roomDetails').value = roomDetails;
            bookingForm.style.display = "block";
        }
    }

    // Handle form submission
    document.getElementById('bookingForm').onsubmit = function(event) {
        event.preventDefault();
        var roomType = document.getElementById('roomType').value;
        var fullName = document.getElementById('fullName').value;
        var email = document.getElementById('email').value;
        var paymentInfo = document.getElementById('paymentInfo').value;

        // Here you can handle form submission, e.g., send data to a server
        console.log(`Booking confirmed for ${roomType}.\nName: ${fullName}\nEmail: ${email}`);

        alert(`Booking confirmed for ${roomType}.\nName: ${fullName}\nEmail: ${email}`);
        closeModal('booking-form');
    };

    // Close the modal if user clicks outside of it
    window.onclick = function(event) {
        var modals = document.querySelectorAll('.modal');
        for (var i = 0; i < modals.length; i++) {
            if (event.target === modals[i]) {
                modals[i].style.display = "none";
            }
        }
    };
</script>

</body>
</html>
