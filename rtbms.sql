CREATE DATABASE IF NOT EXISTS rtbms;
USE rtbms;
CREATE TABLE IF NOT EXISTS blood_donations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    blood_type VARCHAR(5) NOT NULL,
    quantity INT NOT NULL,
    latitude DECIMAL(10, 6),
    longitude DECIMAL(10, 6),
    donated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS blood_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    blood_type VARCHAR(5) NOT NULL,
    quantity_requested INT NOT NULL,
    urgency VARCHAR(20),
    place VARCHAR(100),
    latitude DECIMAL(10, 6),
    longitude DECIMAL(10, 6),
    status VARCHAR(20) DEFAULT 'pending',
    requested_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS blood_banks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    latitude DECIMAL(10, 6) NOT NULL,
    longitude DECIMAL(10, 6) NOT NULL,
    address TEXT
);
INSERT INTO blood_banks (name, latitude, longitude, address) VALUES
('Civil Hospital Ludhiana', 30.9120, 75.8539, 'Civil Lines, Ludhiana'),
('DMC Hospital Blood Bank', 30.9010, 75.8469, 'Tagore Nagar, Ludhiana'),
('Christian Medical College Blood Bank', 30.8947, 75.8571, 'Brown Road, Ludhiana'),
('Guru Nanak Dev Hospital', 31.6340, 74.8741, 'Majitha Road, Amritsar'),
('Fortis Hospital Mohali', 30.7076, 76.6905, 'Sector 62, Mohali'),
('PGIMER Blood Bank', 30.7600, 76.7700, 'Sector 12, Chandigarh'),
('Civil Hospital Jalandhar', 31.3260, 75.5762, 'Jalandhar Cantt, Jalandhar'),
('Amandeep Hospital', 31.6333, 74.8726, 'GT Road, Amritsar'),
('Civil Hospital Patiala', 30.3398, 76.3869, 'Tripuri, Patiala'),
('Apollo Blood Center', 13.0604, 80.2496, 'Greams Road, Chennai'),
('Jeevan Blood Bank', 13.0731, 80.2618, 'Kilpauk, Chennai'),
('City Blood Bank', 13.0827, 80.2707, 'Chennai Main Road'),
('Red Cross Blood Bank', 13.0800, 80.2700, 'Egmore, Chennai'),
('Government Blood Bank', 13.0456, 80.2308, 'Saidapet, Chennai'),
('St. Johns Blood Bank', 13.0022, 80.2561, 'Adyar, Chennai'),
('Chiranjeevi Blood Bank', 17.3850, 78.4867, 'Hyderabad, Telangana'),
('Osmania General Hospital Blood Bank', 17.3870, 78.4760, 'Afzalgunj, Hyderabad'),
('KIMS Hospital Blood Bank', 17.4523, 78.3513, 'Secunderabad, Hyderabad'),
('NIMS Blood Bank', 17.4220, 78.4396, 'Punjagutta, Hyderabad'),
('CARE Hospitals Blood Bank', 17.4044, 78.4690, 'Banjara Hills, Hyderabad'),
('Yashoda Hospital Blood Bank', 17.4212, 78.5492, 'Secunderabad, Hyderabad');
