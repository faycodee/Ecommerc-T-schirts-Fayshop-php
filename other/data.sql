-- Products Table
CREATE TABLE tshirts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    photo VARCHAR(255),
    brand VARCHAR(255),
    name VARCHAR(255)NOT NULL,
    rate INT,
    price INT,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
    desc TEXT Default  "good product ",
    stock INT NOT NULL,
    gender ENUM('male', 'female'),
   size INT,
    FOREIGN KEY (size) REFERENCES sizes(id),
    is_featured BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP


);


-- Categories Table
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT
);

-- Inserting example data into the categories table
INSERT INTO categories (name, description) VALUES
('Men''s T-Shirts', 'Collection of t-shirts for men'),
('Women''s T-Shirts', 'Collection of t-shirts for women'),
('Unisex T-Shirts', 'Collection of t-shirts suitable for both men and women'),
('Casual T-Shirts', 'Informal and relaxed t-shirt styles'),
('Formal T-Shirts', 'T-shirts suitable for more formal occasions'),
('Graphic T-Shirts', 'T-shirts featuring various graphic designs'),
('Plain T-Shirts', 'Simple and basic t-shirt styles'),
('Striped T-Shirts', 'T-shirts with striped patterns'),
('Printed T-Shirts', 'T-shirts with printed designs or slogans'),
('Sports T-Shirts', 'T-shirts designed for sports and athletic activities'),
('Vintage T-Shirts', 'Retro and nostalgic t-shirt designs'),
('Designer T-Shirts', 'High-end and fashion-forward t-shirt styles');

CREATE TABLE sizes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    xs BOOLEAN DEFAULT FALSE,
    xsStock INT,
    s BOOLEAN DEFAULT FALSE,
    sStock INT,
    m BOOLEAN DEFAULT FALSE,
    mStock INT,
    l BOOLEAN DEFAULT FALSE,
    lStock INT,
    xl BOOLEAN DEFAULT FALSE,
    xlStock INT,
    xxl BOOLEAN DEFAULT FALSE,
    xxlStock INT,
    xxxl BOOLEAN DEFAULT FALSE,
    xxxlStock INT
);
-- Orders Table
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,  
    total_amount DECIMAL(10,2) NOT NULL,
    status VARCHAR(50),
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Order Items Table
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Reviews Table
CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    user_id INT,
    rating DECIMAL(3, 2) NOT NULL,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Addresses Table
CREATE TABLE addresses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
    address_line1 VARCHAR(255) NOT NULL,
    address_line2 VARCHAR(255),
    city int ,
    FOREIGN KEY (city) REFERENCES ville(id),
    state int ,
    FOREIGN KEY (state) REFERENCES region(id),
    postal_code VARCHAR(20) NOT NULL,
    
);


-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('customer','admin', 'manager' ) NOT NULL
    photo VARCHAR(100)
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

   
);

-- Customers Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255),
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
    FOREIGN KEY (email) REFERENCES users(id)
);
-- Payments Table
CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    payment_method VARCHAR(50),
    amount DECIMAL(10, 2) NOT NULL,	

    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id)
);

	



INSERT INTO `tshirts`( `photo`, `brand`, `name`, `rate`, `price`,`size`, `category_id`, `descr`, `gender`) VALUES 
( 'img/products/man/m10.jpg', 'Puma', 'Summer Children T-shirtsss', 5 , 110, 'r5wa',2, 'smell coffee', 'male' ),
("img/products/man/m0.jpg", "Puma", "summer man t-shirts", 3, 279, "H1g2",  10, "green irish locky m xl l ",'male'  ),
("img/products/boy/b0.jpg", "Puma", "summer children t-shirts", 4, 200, "r5wa",  10, "white", 'male' ),
("img/products/femal/f0.jpg", "Puma", "summer women t-shirts", 5, 328, "r1fu",  10, "girl black", 'female' ),
("img/products/man/mc0.jpg", "Adidas", "classic man t-shirts", 3, 61, "H1g2",  10, "orange blue",'male'  ),
("img/products/man/m1.jpg", "Springfield", "summer man t-shirts", 5, 333, "H1g2",  10, "sciences blue", 'male',1 ),
("img/products/boy/b1.jpg", "Nike", "summer children t-shirts", 5, 223, "r5wa",  10, "black happy emoji yellow ", 'male' ),
("img/products/femal/f1.jpg", "Nike", "summer women t-shirts", 5, 409, "r1fu",  10, "blue hand ino pasaran yellow ", 'female' ),
("img/products/man/mc1.jpg", "Nike", "classic man t-shirts", 4, 32, "H1g2", 11, "classic", 'male' ),
("img/products/man/m2.jpg", "Nike", "summer man t-shirts", 3, 440, "H1g2", 11, "man green wu tang is for the children us", 'male' ),
("img/products/boy/b2.jpg", "Springfield", "summer children t-shirts", 3, 131, "r5wa", 11, "blue unspeakable", 'male' ),
("img/products/femal/f2.jpg", "Nike", "summer women t-shirts", 3, 439, "r1fu", 11, "brown never underetimate an old man with a harmonica yellow", 'female' ),
("img/products/man/mc2.jpg", "Springfield", "classic man t-shirts", 4, 200, "H1g2", 11, "classic", 'male' ),
("img/products/man/m3.jpg", "Nike", "summer man t-shirts", 3, 301, "H1g2", 11, "yes you can flowr blue",'male'  ),
("img/products/boy/b3.jpg", "Puma", "summer children t-shirts", 3, 297, "r5wa", 11, "space universe stars black ", 'male' );
("img/products/femal/f3.jpg", "Puma", "summer women t-shirts", 4, ,250, "Yzir",7, "it's okay birdie carton black",'female' ),
("img/products/man/mc3.jpg", "Adidas", "classic man t-shirts", 4, 150 , "kRaA",7, "classic",'male'),
("img/products/man/m4.jpg", "Nike", "summer man t-shirts", 3, 301, "H1g2",  7,"black end human trafficking red hand crime",'male'  ),
("img/products/femal/f4.jpg", "Puma", "summer women t-shirts", 4, ,250, "Yzir", 7,"flower butterfly parrot beatiful girl",'female' ),
("img/products/man/mc4.jpg", "Adidas", "classic man t-shirts", 4, 150 , "kRaA", 7,"classic",'male'),
("img/products/man/m5.jpg", "Nike", "summer man t-shirts", 3, 301, "H1g2", 7, "black 6nome to tunt eggs sun nature ",'male'  ),
("img/products/femal/f5.jpg", "coco", "summer women t-shirts", 4, ,250, "Yzir",7, "cat lins black",'female' ),
("img/products/man/mc5.jpg", "Adidas", "classic man t-shirts", 4, 150 , "kRaA", 4,"classic",'male'),
("img/products/man/m6.jpg", "Nike", "summer man t-shirts", 3, 301, "H1g2",  4,"sorry i can't talk i m thinking about the 1997 performance of silver springs where stevie nicks stares a hole through lindsey buckingham  black",'male'  ),
("img/products/boy/b6.jpg", "coco", "summer children t-shirts", 3, 297, "r5wa",  4,"black light birthday boy blue ", 'male' );
("img/products/femal/f6.jpg", "coco", "summer women t-shirts", 4, ,250, "Yzir", 4,"black pyotr ilyich tchaikovsky ",'female' ),
("img/products/man/mc6.jpg", "Adidas", "classic man t-shirts", 4, 150 , "kRaA", 4,"classic",'male'),
("img/products/man/m7.jpg", "Nike", "summer man t-shirts", 3, 301, "H1g2",  4,"jane deer black",'male'  ),
("img/products/boy/b7.jpg", "coco", "summer children t-shirts", 3, 297, "r5wa",  4",yellow pink egg hunting squad", 'male' );
("img/products/femal/f7.jpg", "coco", "summer women t-shirts", 4, ,250, "Yzir", 4,"sciences i wear this shirt periodically black but only when i'm in my element",'female' ),
("img/products/man/mc7.jpg", "Adidas", "classic man t-shirts", 4, 150 , "kRaA", 4,"classic",'male'),
("img/products/man/m8.jpg", "Adidas", "summer man t-shirts", 5, 276, "kRaA", 4,"i love miners mincraft",'male'),
("img/products/boy/b8.jpg", "Nike", "summer children t-shirts", 3, 226, "r5wa", 4,"green blue ice rabbit egg pink",'male'),
("img/products/femal/f8.jpg", "Nike", "summer women t-shirts", 4, 265 , "Yzir", 4,"black if your dad doesnt have a beard you've got two mums",'female' ),
("img/products/man/mc8.jpg", "Adidas", "classic man t-shirts", 4, 88 , "kRaA", 4,"classic",'male'),
("img/products/man/m9.jpg", "Puma", "summer man t-shirts", 4, 438 , "kRaA", 4,"here you can add key words ,description",'male'),
("img/products/boy/b9.jpg", "Puma", "summer children t-shirts", 5, 166 , "r5wa", 3,"red education is important but rowing is importanter",'male'),
("img/products/femal/f9.jpg", "Nike", "summer women t-shirts", 3, 278 , "Yzir", 3,"here you can add key words ,description",'female' ),
("img/products/man/mc9.jpg", "Puma", "classic man t-shirts", 4, 58 , "kRaA", 3,"classic",'male'),
("img/products/man/m10.jpg", "Nike", "summer man t-shirts", 4, 394 , "kRaA", 3,"here you can add key words ,description",'male'),
("img/products/boy/b10.jpg", "Nike", "summer children t-shirts", 3, 225 , "r5wa", 3,"here you can add key words ,description",'male'),
("img/products/femal/f10.jpg", "Adidas", "summer women t-shirts", 4, 393 , "Yzir", 3,"here you can add key words ,description",'female' ),
("img/products/man/mc10.jpg", "Adidas", "classic man t-shirts", 4, 56 , "kRaA", 4,"classic",'male'),
("img/products/man/m11.jpg", "Puma", "summer man t-shirts", 5, 350 , "kRaA", 6,"here you can add key words ,description",'male'),
("img/products/boy/b11.jpg", "Puma", "summer children t-shirts", 5, 188 , "r5wa", 12,"here you can add key words ,description",'male'),
("img/products/femal/f11.jpg", "Puma", "summer women t-shirts", 4, 403 , "Yzir", 12,"here you can add key words ,description",'female' ),
("img/products/man/mc11.jpg", "Adidas", "classic man t-shirts", 5, 100 , "kRaA", 12,"classic",'male'),
("img/products/man/m16.jpg", "Nike", "summer man t-shirts", 5, 224 , "kRaA", 12,"here you can add key words ,description",'male'),
("img/products/boy/b16.jpg", "Adidas", "summer children t-shirts", 4, 159 , "r5wa",12, "here you can add key words ,description",'male'),
("img/products/femal/f16.jpg", "Nike", "summer women t-shirts", 4, 397 , "Yzir", 12,"here you can add key words ,description",'female',1 ),
("img/products/man/mc16.jpg", "Nike", "classic man t-shirts", 4, 80 , "kRaA", 3,"classic",'male'),
("img/products/man/m17.jpg", "Adidas", "summer man t-shirts", 3, 232 ,  "kRaA",  7 ,"here you can add key words ,description",'male'),
("img/products/boy/b17.jpg", "Adidas", "summer children t-shirts", 5, 286 , "r5wa", 7 "here you can add key words ,description",'male'),
("img/products/femal/f17.jpg", "Nike", "summer women t-shirts", 3, 262 , "Yzir", 8 , "Default description",'female' ),
("img/products/man/mc17.jpg", "Puma", "classic man t-shirts", 3, 66 , "kRaA", 8 , "Default description",'male'),
("img/products/man/m18.jpg", "Nike", "summer man t-shirts", 5, 210 , "kRaA", 8 , "Default description",'male'),
("img/products/boy/b18.jpg", "Puma", "summer children t-shirts", 3, 220 , "r5wa", 8 , "Default description",'male'),
("img/products/femal/f18.jpg", "Puma", "summer women t-shirts", 5, 263 , "Yzir", 8 , "Default description",'female' ),
("img/products/man/mc18.jpg", "Adidas", "classic man t-shirts", 5, 109 , "kRaA", 8 , "Default description",'male'),
("img/products/man/m19.jpg", "Adidas", "summer man t-shirts", 5, 400 , "kRaA", 8 , "Default description",'male'),
("img/products/boy/b19.jpg", "Adidas", "summer children t-shirts", 5, 209 , "r5wa", 8 , "Default description",'male'),
("img/products/femal/f19.jpg", "Adidas", "summer women t-shirts", 4, 265 , "Yzir", 8 , "Default description",'female' ),
("img/products/man/mc19.jpg", "Adidas", "classic man t-shirts", 4, 64 , "kRaA", 8 , "Default description",'male'),
("img/products/man/m20.jpg", "Nike", "summer man t-shirts", 3, 211 , "kRaA", 8 , "Default description",'male'),
("img/products/boy/b20.jpg", "Adidas", "summer children t-shirts", 3, 212 , "r5wa", 8 , "Default description",'male'),
("img/products/femal/f20.jpg", "Puma", "summer women t-shirts", 4, 369 , "Yzir", 8 , "Default description",'female' ),
("img/products/man/mc20.jpg", "Adidas", "classic man t-shirts", 3, 35 , "kRaA", 8 , "Default description",'male'),
("img/products/man/m21.jpg", "Nike", "summer man t-shirts", 4, 360 , "kRaA", 8 , "Default description",'male'),
("img/products/boy/b21.jpg", "Adidas", "summer children t-shirts", 3, 112 , "r5wa", 8 , "Default description",'male'),
("img/products/femal/f21.jpg", "Adidas", "summer women t-shirts", 5, 220 , "Yzir", 8 , "Default description",'female' ),
("img/products/man/mc21.jpg", "Puma", "classic man t-shirts", 3, 40 , "kRaA", 8 , "Default description",'male'),
("img/products/man/m22.jpg", "Puma", "summer man t-shirts", 3, 421 , "kRaA", 8 , "Default description",'male'),
("img/products/boy/b22.jpg", "Nike", "summer children t-shirts", 3, 112 , "r5wa", 8 , "Default description",'male'),
("img/products/femal/f22.jpg", "Puma", "summer women t-shirts", 5, 243 , "Yzir", 8 , "Default description",'female' ),
("img/products/man/mc22.jpg", "Nike", "classic man t-shirts", 3, 80 , "kRaA", 8 , "Default description",'male'),
("img/products/man/m23.jpg", "Puma", "summer man t-shirts", 5, 322 , "kRaA", 8 , "Default description",'male'),
("img/products/boy/b23.jpg", "Adidas", "summer children t-shirts", 5, 140 , "r5wa", 8 , "Default description",'male'),
("img/products/femal/f23.jpg", "Adidas", "summer women t-shirts", 4, 311 , "Yzir", 8 , "Default description",'female' ),
("img/products/man/mc23.jpg", "Nike", "classic man t-shirts", 3, 53 , "kRaA", 8 , "Default description",'male'),
("img/products/man/m24.jpg", "Nike", "summer man t-shirts", 4, 144 , "kRaA", 8 , "Default description",'male'),
("img/products/boy/b24.jpg", "Nike", "summer children t-shirts", 3, 280 , "r5wa", 8 , "Default description",'male'),
("img/products/femal/f24.jpg", "Puma", "summer women t-shirts", 4, 213 , "Yzir", 8 , "Default description",'female' ),
("img/products/man/mc24.jpg", "Nike", "classic man t-shirts", 4, 97 , "kRaA", 8 , "Default description",'male');

ALTER TABLE order_items add qteXS INT DEFAULT 0 AFTER product_id ;
ALTER TABLE order_items add qteS INT DEFAULT 0 AFTER qteXS ;
ALTER TABLE order_items add qteM INT DEFAULT 0 AFTER qteS ;
ALTER TABLE order_items add qteL INT DEFAULT 0 AFTER qteM ;
ALTER TABLE order_items add qteXL INT DEFAULT 0 AFTER qteL ;
ALTER TABLE order_items add qteXXL INT DEFAULT 0 AFTER qteXL ;
ALTER TABLE order_items add qteXXXL INT DEFAULT 0 AFTER qteXXL ;
ALTER TABLE order_items add quantity INT DEFAULT 0 AFTER qteXXL ;