CREATE DATABASE todolist COLLATE utf8mb4_general_ci;
CREATE TABLE todo (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    staus ENUM('todo','doing','done') NOT NULL DEFAULT('todo'),
    created_at DATETIME NOT NULL DEFAULT NOW()
);

