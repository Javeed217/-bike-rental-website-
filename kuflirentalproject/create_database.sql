
CREATE DATABASE IF NOT EXISTS kufli_rentals;
USE kufli_rentals;


CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pickupLocation VARCHAR(100) NOT NULL,
    bikeType VARCHAR(100) NOT NULL,
    bikeModel VARCHAR(100) NOT NULL,
    startDate DATE NOT NULL,
    endDate DATE NOT NULL,
    helmet TINYINT(1) DEFAULT 0,
    insurance TINYINT(1) DEFAULT 0,
    `lock` TINYINT(1) DEFAULT 0,
    fullName VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
); 