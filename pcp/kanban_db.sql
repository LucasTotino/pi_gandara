CREATE DATABASE kanban_db;

USE kanban_db;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status ENUM('todo', 'inprogress', 'done') DEFAULT 'todo'
);