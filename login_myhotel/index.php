<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to MyHotel</title>
    <link rel="stylesheet" href="contents.css">
    <link rel="stylesheet" href="format.css">
    <link rel="stylesheet" href="gallery.css">
    <script src="gallery.js" defer></script>
    <script src="facilities.js" defer></script>
</head>

<body>
    <header>
        <a href="index.html" class="logo">MyHotel</a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="room_features.php">Rooms</a></li>
                <li><a href="#facilities">Facilities</a></li>
                <li><a href="contact us.html">Contact Us</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <section id="gallery">
        <div class="gallery">
            <div class="image-grid-col-2 image-grid-row-2">
                <img src="images/background_image.jpg" alt="Main Image">
            </div>
            <div class="gallery-item">
                <img src="images/pool.jpg" alt="Image 1">
            </div>
            <div class="gallery-item">
                <img src="images/enterance.jpg" alt="Image 2">
            </div>
            <div class="gallery-item">
                <img src="images/corridor.jpg" alt="Image 3">
            </div>
            <div class="gallery-item">
                <img src="images/bathroom.jpg" alt="Image 4">
            </div>
            <div class="view-more" onclick="openModal()">View More</div>
        </div>
    </section>

    <section id="description">
        <div>
            <h1>Our Hotel</h1>
            <p>
                Nestled in the heart of Brisbane, MyHotel offers a perfect blend of luxury,
                comfort, and convenience. Whether you're visiting for business or pleasure, our elegantly
                designed rooms, state-of-the-art amenities, and exceptional service ensure an unforgettable stay.
            </p>
        </div>
    </section>

    <section id="content">
        <div id="facilities">
            <h2>Popular Facilities</h2>
            <div class="facility-lists">
                <ul id="column1">
                    <li>
                        <img src="images/ic_restaurant.png" alt="Swimming Pool Icon">
                        <span>Restaurant</span>
                    </li>
                    <li>
                        <img src="images/ic_parking.png" alt="Swimming Pool Icon">
                        <span>Parking included</span>
                    </li>
                    <li>
                        <img src="images/ic_pool.png" alt="Swimming Pool Icon">
                        <span>Pool</span>
                    </li>
                </ul>
                <ul id="column2">
                    <li>
                        <img src="images/ic_gym.png" alt="Gym Icon">
                        <span>Gym</span>
                    </li>
                    <li>
                        <img src="images/ic_spa.png" alt="Spa Icon">
                        <span>Spa</span>
                    </li>
                    <li>
                        <img src="images/ic_bar.png" alt="Swimming Pool Icon">
                        <span>Bar</span>
                    </li>
                </ul>
            </div>
            <button id="viewMoreBtn">View More Facilities</button>
        </div>
        <div id="map">
            <h2>Our Location</h2>
            <p>Ground Floor/349 Queen St, Brisbane City QLD 4000</p>
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.0826592702656!2d153.02690377509714!3d-27.466685876321336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b915a1d064dcb2f%3A0x7f3aed61f0bfd9e3!2sJames%20Cook%20University%2C%20Brisbane%20Campus!5e0!3m2!1sen!2sau!4v1720357730489!5m2!1sen!2sau" 
                width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </section>

    <!-- Modal for Viewing More Images -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="modal-gallery">
                <img src="images/background_image.jpg" alt="Image 1">
                <img src="images/pool.jpg" alt="Image 2">
                <img src="images/enterance.jpg" alt="Image 3">
                <img src="images/corridor.jpg" alt="Image 4">
                <img src="images/bathroom.jpg" alt="Image 5">
                <img src="images/backgrounds.jpg" alt="Image 6">
                <img src="images/suites.jpg" alt="Image 7">
                <img src="images/single.jpg" alt="Image 8">
                <img src="images/delux.jpg" alt="Image 9">
                <img src="images/standard.jpeg" alt="Image 10">
                <img src="images/family.jpg" alt="Image 11">
                <img src="images/buisness.jpg" alt="Image 11">
                <img src="images/luxury.jpg" alt="Image 11">
                <img src="images/pentahouse.jpg" alt="Image 11">
                <img src="images/junior suites.jpg" alt="Image 11">
                <img src="images/double.jpg" alt="Image 11">
                <img src="images/economy.jpg" alt="Image 11">
                <img src="images/execurtive.jpg" alt="Image 11">
                <img src="images/presidential.jpg" alt="Image 11">
            </div>
        </div>
    </div>

    <!-- Modal for Viewing Individual Images -->
    <div id="imageModal" class="image-modal">
        <div class="image-modal-content">
            <span class="close" onclick="closeImageModal()">&times;</span>
            <img id="imageModalImg" src="" alt="Large Image">
        </div>
    </div>

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closeImageModal()">&times;</span>
            <h2>Popular Facilities</h2>
            <div class="facility-lists">
                <ul id="column1">
                    <li>
                        <img src="images/ic_restaurant.png">
                        <span>Restaurant</span>
                    </li>
                    <li>
                        <img src="images/ic_parking.png">
                        <span>Parking Included</span>
                    </li>
                    <li>
                        <img src="images/ic_pool.png">
                        <span>Pool</span>
                    </li>
                    <li>
                        <img src="images/ic_housekeeping.png">
                        <span>Housekeeping</span>
                    </li>
                    <li>
                        <img src="images/ic_front desk.png">
                        <span>24/7 Front Desk</span>
                    </li>
                    <li>
                        <img src="images/ic_laundry.png">
                        <span>Laundry</span>
                    </li>
                    <li>
                        <img src="images/ic_tennis.png">
                        <span>Tennis Court</span>
                    </li>
                </ul>
                <ul id="column2">
                    <li>
                        <img src="images/ic_gym.png">
                        <span>Gym</span>
                    </li>
                    <li>
                        <img src="images/ic_spa.png">
                        <span>Spa</span>
                    </li>
                    <li>
                        <img src="images/ic_bar.png">
                        <span>Bar</span>
                    </li>
                    <li>
                        <img src="images/ic_breakfast.png">
                        <span>Breakfast Available</span>
                    </li>
                    <li>
                        <img src="images/ic_room service.png">
                        <span>Room Service</span>
                    </li>
                    <li>
                        <img src="images/ic_air con.png">
                        <span>Air Conditioning</span>
                    </li>
                    <li>
                        <img src="images/ic_wifi.png">
                        <span>Free WiFi</span>
                    </li>
                </ul>
            </div>
            <h2>Parking and Public Transport</h2>
            <div>
                <ul>
                    <li>Electric Charging Station: On-site for eco-conscious guests.</li>
                    <li>On-Site Parking: Secure and convenient.</li>
                    <li>Valet Service: Professional and hassle-free. </li>
                    <li>Public Transport: Easy access to buses and metros nearby.</li>
                    <li>Airport Transfers: Shuttle services for smooth travel to and from the airport.</li>
                </ul>
            </div>
            <h2>Food and Drink</h2>
            <div>
                <ul>
                    <li>Restaurant: Local and international cuisine with fresh ingredients.</li>
                    <li>Rooftop Bar: Handcrafted cocktails with city skyline views.</li>
                    <li>Café: Freshly brewed coffee and pastries for a delightful start.</li>
                    <li>Room Service: Gourmet meals and snacks available 24/7 in-room.</li>
                    <li>Breakfast Buffet: Sumptuous selection of hot and cold dishes, fresh fruits, baked goods, and made-to-order omelets.</li>
                </ul>
            </div>
            <h2>Internet</h2>
            <div>
                <ul>
                    <li> Available in all rooms: Free WiFi</li>
                    <li>Available in some public areas: Free WiFi</li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>