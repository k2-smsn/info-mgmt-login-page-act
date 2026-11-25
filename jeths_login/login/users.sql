-- Jeth's Photography - login table
-- Import this in phpMyAdmin with your database selected.
-- Note: this table is NOT part of the ERD. It only stores staff logins.

CREATE TABLE IF NOT EXISTS users (
    UserID   INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50)  NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- Sample account:  username = admin   password = admin123
-- (the password is stored as a hash, never as plain text)
INSERT INTO users (Username, Password) VALUES
('admin', '$2y$10$hN4FTG62XdjSYTnUvOadyunUa88MnWrsPCgVZ7kiOk5JkyTGDvVKu');
