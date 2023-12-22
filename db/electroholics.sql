-- Table structure for account

INSERT INTO tableName (attributes)
VALUES (attributeValues);

DROP TABLE IF EXISTS account;
CREATE TABLE IF NOT EXISTS account (
    accountID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    accountEmail varchar(255) NOT NULL UNIQUE,
    accountPassword varchar(255) NOT NULL,
    accountRegistrationDate date,
    accountRole int NOT NULL DEFAULT 2 COMMENT '1 - Admin, 2 - Customer'
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for user_profile

DROP TABLE IF EXISTS user_profile;
CREATE TABLE IF NOT EXISTS user_profile (
    userID int PRIMARY KEY AUTO_INCREMENT,
    accountID int,
    userAddress varchar(255),
    username varchar(255),
    userContact varchar(255),
    userDOB datetime,
    FOREIGN KEY (accountID) REFERENCES account(accountID) ON DELETE CASCADE
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for catalog_item

DROP TABLE IF EXISTS catalog_item;
CREATE TABLE IF NOT EXISTS catalog_item (
    productID varchar(16) PRIMARY KEY,
    productName varchar(255),
    productDescription varchar(255),
    productPrice double,
    productStock int,
    productImagePath varchar(255)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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