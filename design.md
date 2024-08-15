# Design Documentation

## Overview
The "myHotel" website is designed to offer a comprehensive and user-friendly experience for clients seeking to book rooms and learn more about our hotel. Our design approach emphasizes intuitive navigation, seamless booking processes, and engaging content. This document outlines the architectural and user interface design of the website, covering both the web and mobile versions.

## Architectural Design
# Major Components
1. **Login Feature**
    - **Purpose**: Allows clients to access the rooms page, manage bookings, and view detailed information.
    - **Technology**: PHP for server-side processing, JavaScript for client-side interactions.

2. **Navigation**
    - **Purpose**: Provides easy access to all major pages, including rooms, gallery, facilities, map, and more.
    - **Design**: Fixed navigation bar on both desktop and mobile versions, with responsive design ensuring usability across devices.

3. **Gallery**
    - **Purpose**: Showcases the hotel environment to attract and inform potential clients.
    - **Design**: High-quality images and interactive elements to enhance visual appeal.

4. **Popular Facilities**
    - **Purpose**: Allows clients to explore and check facilities to meet their needs.
    - **Design**: Organized in a grid layout with filters to refine choices.

5. **Map**
    - **Purpose**: Helps clients locate the hotel easily.
    - **Design**: Integrated with Google Maps for real-time navigation.

6. **Intro Video**
    - **Purpose**: Provides a quick overview of the hotel, its amenities, and services.
    - **Design**: Embedded video player with autoplay and muted options for immediate engagement.

7. **Team Members**
    - **Purpose**: Introduces the team behind the hotel, adding a personal touch.
    - **Design**: Profiles with photos and roles displayed in a clean, accessible format.

8. **Reviewer Feature**
    - **Purpose**: Allows clients to read reviews and experiences from past guests.
    - **Design**: Review carousel with ratings and comments.

9. **Searching Page**
    - **Purpose**: The main feature for finding available rooms, checking availability, and making bookings.
    - **Design**: Advanced search options with filters for dates, room types, and more.

10. **Contact Page**
    - **Purpose**: Enables clients to leave messages and inquiries.
    - **Design**: Simple contact form with fields for name, email, and message.

11. **Room Categories Page**
    - **Purpose**: Displays all room categories available in the hotel.
    - **Design**: Categorized listings with detailed descriptions and booking options.


## Database Design
1. **Database Design**
Our database is designed to efficiently manage all aspects of a hotel's room operations.
It includes:
- **Room Information**: Captures details like room type, view, price, and availability.
- **Facilities**: Manages a comprehensive list of amenities for each room.
- **Reservations**: Tracks booking information, customer details, and reservation policies.
- **Photos**: Stores URLs for room images to enhance user engagement.

2. **SQL Code Overview**
We developed SQL scripts to create and populate the database. Key tables include:
- **Room**: Stores details about each room.
- **RoomType**: Defines categories such as Single, Double, Suite.
- **RoomView**: Specifies views like Sea, Mountain, City.
- **Facility**: Lists all available amenities.
- **RoomFacility**: Associates rooms with their respective facilities.
- **Reservation**: Tracks bookings and customer details.
- **RoomPhoto**: Stores links to room images.

**SQL Example**:
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


## User Interface Design
# Web Version
- **Layout**: Responsive design to ensure usability across various screen sizes.
- **Typography**: Clear, legible fonts for readability and aesthetic appeal.
- **Color Scheme**: A palette that reflects the hotel's branding and creates a welcoming atmosphere.
- **Interactive Elements**: Smooth transitions and hover effects to enhance user engagement.

# Mobile Version
- **Layout**: Mobile-first approach with a focus on touch-friendly interactions.
- **Navigation**: Collapsible menu for easy access to all pages.
- **Content**: Condensed and optimized for smaller screens to maintain functionality.

# Technology Stack
- **Languages**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: SQL
- **Prototyping**: Figma for designing and testing layouts and interactions.

# Design Process
Our design process involved extensive research into existing hotel websites to identify best practices and user preferences. Using Figma, we created prototypes to visualize the layout and interactions before development. The final design aims to provide a seamless and engaging user experience, motivating clients to explore and book with ease.
