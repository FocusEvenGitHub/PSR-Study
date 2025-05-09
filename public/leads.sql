CREATE TABLE leads (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       email VARCHAR(255) NOT NULL UNIQUE,
                       source VARCHAR(100) NOT NULL,
                       created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
