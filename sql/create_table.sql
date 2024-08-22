CREATE DATABASE IF NOT EXISTS drag_and_drop_app;
USE drag_and_drop_app;

CREATE TABLE items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    position INT NOT NULL
);

INSERT INTO items (name, position) VALUES
('Item 1', 1),
('Item 2', 2),
('Item 3', 3),
('Item 4', 4),
('Item 5', 5);