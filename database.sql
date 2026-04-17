-- Tao database
CREATE DATABASE IF NOT EXISTS web2041
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE web2041;

-- Bang users (admin)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Bang danh muc quan ao
CREATE TABLE IF NOT EXISTS categorys (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

-- Bang san pham quan ao
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    price DECIMAL(12,0) NOT NULL DEFAULT 0,
    stock INT NOT NULL DEFAULT 0,
    image VARCHAR(255) DEFAULT NULL,
    description TEXT DEFAULT NULL,
    id_category INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_category) REFERENCES categorys(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- =====================
-- Du lieu mau
-- =====================

-- Danh muc quan ao
INSERT INTO categorys (name) VALUES
('Ao thun'),
('Ao so mi'),
('Ao khoac'),
('Quan jean'),
('Quan tay'),
('Vay - Dam'),
('Phu kien');

-- Tai khoan admin mac dinh: admin@gmail.com / 123456
INSERT INTO users (name, email, password) VALUES
('Admin', 'admin@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
