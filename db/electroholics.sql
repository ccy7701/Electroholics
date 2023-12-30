-- Table structure for account

-- INSERT INTO tableName (attributes)
-- VALUES (attributeValues);

DROP TABLE IF EXISTS account;
CREATE TABLE IF NOT EXISTS account (
    accountID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    accountEmail varchar(255) NOT NULL UNIQUE,
    accountPassword varchar(255) NOT NULL,
    username varchar(255) NOT NULL UNIQUE,
    accountRegistrationDate date NOT NULL DEFAULT CURRENT_DATE,
    accountRole int NOT NULL DEFAULT 2 COMMENT '1 - Admin, 2 - Customer'
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for user_profile

DROP TABLE IF EXISTS user_profile;
CREATE TABLE IF NOT EXISTS user_profile (
    userID int PRIMARY KEY AUTO_INCREMENT,
    accountID int,
    userAddress varchar(255),
    userContact varchar(255),
    userDOB datetime,
    FOREIGN KEY (accountID) REFERENCES account(accountID) ON DELETE CASCADE
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for catalog_item

DROP TABLE IF EXISTS catalog_item;
CREATE TABLE IF NOT EXISTS catalog_item (
    productID varchar(16) PRIMARY KEY,
    productType varchar(8),
    productName varchar(255),
    productDescription varchar(255),
    productPrice double,
    productStock int,
    productImagePath varchar(255)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data for catalog_item
INSERT INTO catalog_item (productID, productType, productName, productDescription, productPrice, productStock, productImagePath) VALUES
('CPU001', 'cpu', 'Intel Core i5 10500 6 Cores/12 Threads 3.1/4.5Ghz LGA1200 CPU Processor', '', 705.00, 100, '../images/websiteElements/catalogueIMGs/cpu/LGA1200.png'),
('CPU002', 'cpu', 'Intel Core i5 12600 6 Cores/12 Threads 3.3/4.8 GHz LGA1700 CPU Processor', '', 1285.00, 90, '../images/websiteElements/catalogueIMGs/cpu/LGA1700.png'),
('CPU003', 'cpu', 'Intel Core i7 13700F 16 Cores/24 Threads 2.1/5.2GHz LGA1700 CPU Processor', '', 1709.00, 80, '../images/websiteElements/catalogueIMGs/cpu/LGA1700i7.png'),
('CPU004', 'cpu', 'AMD Ryzen 5 5600 6 Core/12 Threads 3.9/4.4GHz AM4 CPU Processor 100-100000927BOX', '', 819.00, 70, '../images/websiteElements/catalogueIMGs/cpu/Ryzen55600.png'),
('CPU005', 'cpu', 'AMD Ryzen 7 5700G 8 Core/16 Threads 3.8/4.6GHz AM4 CPU Processor 100-100000263BOX', '', 1249.00, 60, '../images/websiteElements/catalogueIMGs/cpu/Ryzen75700G.png'),
('CPU006', 'cpu', 'AMD Ryzen 9 5900X 12 Core/24 Threads 3.7/4.8GHz AM4 CPU Processor 100-100000061WOF', '', 2299.00, 50, '../images/websiteElements/catalogueIMGs/cpu/Ryzen95900X.png');


-- Table structure for item_order

DROP TABLE IF EXISTS item_order;
CREATE TABLE IF NOT EXISTS item_order (
    orderID int PRIMARY KEY AUTO_INCREMENT,
    userID int,
    productID int,
    orderQuantity int,
    orderCost double,
    FOREIGN KEY (userID) REFERENCES user_profile(userID),
    FOREIGN KEY (productID) REFERENCES catalog_item(productID)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 