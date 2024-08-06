document.addEventListener('DOMContentLoaded', () => {
    const viewMoreBtn = document.getElementById('viewMoreBtn');
    const popup = document.getElementById('popup');
    const closeBtn = document.querySelector('.popup .close');

    viewMoreBtn.addEventListener('click', () => {
        popup.style.display = 'block';
    });

    closeBtn.addEventListener('click', () => {
        popup.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target === popup) {
            popup.style.display = 'none';
        }
    });
});

const images = [
    'images/pool.jpg',
    'images/gym.jpg',
    'images/restaurant.jpg',
    'images/bar.jpg',
    'images/spa.jpg',
    'images/parking.jpg'
];

const titles = [
    'AZURE OASIS POOL',
    'VATALITY FITNESS CENTER',
    'GOURMET HAVEN',
    'SKYLINE LOUNGE',
    'SERENITY SPA',
    'SECURE PARK'
  ];
  
const descriptions = [
    "Dive into relaxation at our exquisite pool, where you can unwind and soak up the sun in a tranquil setting. Our outdoor pool is surrounded by lush landscaping and comfortable loungers, offering the perfect escape for a refreshing swim or a leisurely afternoon by the water. For added convenience, poolside service is available, so you can enjoy a selection of drinks and snacks without having to leave your lounge chair. Whether you're looking to enjoy a relaxing dip, work on your tan, or spend quality time with family and friends, our pool area provides a serene and inviting environment.",
    "Stay active and energized during your stay with access to our fully-equipped gym, designed to meet all your fitness needs. Featuring state-of-the-art cardio machines, strength-training equipment, and free weights, our gym provides a comprehensive workout environment. Whether you prefer a high-intensity workout or a more relaxed exercise routine, you’ll find everything you need to maintain your fitness goals. The gym is open 24/7, allowing you to work out at your convenience, and our fitness instructors are available for personalized training sessions upon request.",
    "Our on-site restaurant offers a sophisticated dining experience with a diverse menu that caters to all tastes. Enjoy gourmet dishes crafted from the finest local and international ingredients, prepared by our skilled chefs. The elegant setting is perfect for both intimate dinners and group celebrations. Whether you’re in the mood for a hearty breakfast, a leisurely lunch, or a lavish dinner, our restaurant provides a warm and inviting atmosphere, complemented by exceptional service. Special dietary needs can be accommodated upon request.",
    "Elevate your evening at our stylish rooftop bar, where breathtaking views of the city skyline and horizon set the stage for a memorable experience. Sip on expertly crafted cocktails, sample an array of fine wines, or enjoy a selection of premium liquors while you relax in a chic, modern environment. Our rooftop bar is the perfect spot to unwind after a long day, socialize with friends, or simply enjoy a stunning sunset. Seasonal events and live music add to the vibrant atmosphere, making it a must-visit destination.",
    "Indulge in relaxation and rejuvenation at our luxurious spa, where a range of treatments and therapies await to pamper your senses. From soothing massages and invigorating facials to specialized body treatments and wellness rituals, our skilled therapists use premium products to ensure a revitalizing experience. The serene ambiance of our spa promotes tranquility, offering the perfect escape from the hustle and bustle of everyday life. Book a session and let us help you achieve ultimate relaxation and well-being.",
    "Our hotel offers convenient and secure parking facilities to ensure a stress-free stay. Guests can take advantage of our on-site parking garage, which provides ample space and 24/7 security. Whether you’re traveling with your own vehicle or renting one, you can rest easy knowing that your car is well-protected. Valet service is also available for added convenience, allowing you to focus on enjoying your stay rather than worrying about parking logistics."
 ];
  
 let currentIndex = 0;

 const imgElement = document.getElementById('facility-img');
 const titleElement = document.getElementById('facility-title');
 const descElement = document.getElementById('facility-desc');
 const nextButton = document.getElementById('next-btn');
 
 function updateContent() {
   currentIndex = (currentIndex + 1) % images.length;
   imgElement.src = images[currentIndex];
   titleElement.textContent = titles[currentIndex];
   descElement.textContent = descriptions[currentIndex];
 }
 
 nextButton.addEventListener('click', updateContent);

