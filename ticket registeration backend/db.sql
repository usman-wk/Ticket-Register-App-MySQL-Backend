CREATE DATABASE art_tickets DEFAULT CHARACTER SET utf8mb4;
USE art_tickets;

CREATE TABLE tickets (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    visitorName VARCHAR(100) NOT NULL,
    email       VARCHAR(100) NOT NULL,
    exhibitDate DATE         NOT NULL,
    ticketQty   INT          NOT NULL CHECK (ticketQty >= 1),
    created_at  TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
);
