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
</head>

<body>
    <header>
        <div class="container">
            <a href="index.html" class="logo">MyHotel</a>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="room inventory.html">Rooms</a></li>
                    <li><a href="#facilities">Facilities</a></li>
                    <li><a href="contact us.html">Contact Us</a></li>
                    <li><a href="login.html">Login</a></li>
                </ul>
            </nav>
        </div>
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
        </div>
        <div id="map">
            <h2>Our Location</h2>
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345092826!2d144.9537353153174!3d-37.816279779751!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf5778e5f0f7e77a3!2sFederation%20Square!5e0!3m2!1sen!2sau!4v1600000000000!5m2!1sen!2sau" 
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

    <footer>
        <div class="container">
            <div class="footer-nav">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="room inventory.html">Rooms</a></li>
                    <li><a href="#facilities">Facilities</a></li>
                    <li><a href="contact us.html">Contact Us</a></li>
                    <li><a href="login.html">Login</a></li>
                </ul>
            </div>
            <p>&copy; 2024 MyHotel. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
