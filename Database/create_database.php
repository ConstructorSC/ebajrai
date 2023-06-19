<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $conn = mysqli_connect($servername, $username, $password);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "CREATE DATABASE ebajrai";
  if (mysqli_query($conn, $sql)) {
    echo "<h3>Database created successfully</h3>";
  } else {
    echo "Error creating database: " . mysqli_error($conn);
  }

  require ("config.php");
  $sql = "CREATE TABLE user
          (
            id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            username varchar(50) NOT NULL,
            email varchar(50) NOT NULL,
            password varchar(50) NOT NULL,
            fname varchar(15) NOT NULL,
            lname varchar(15) NOT NULL,
            address varchar(50) ,
            phone varchar(12)
          )";
  if (mysqli_query($conn, $sql)) {
    echo "<h3>Table user created successfully</h3>";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  $sql = "CREATE TABLE item
          (
            item_id int(10) PRIMARY KEY,
            item_name varchar(50),
            item_desc varchar(500),
            qty int,
            item_price decimal (10,2),
            item_category varchar(100),
            item_package varchar(100),
            item_image varchar(500),
            des_page varchar(500)
          )";
  if (mysqli_query($conn, $sql)) {
    echo "<h3>Table item created successfully</h3>";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  $sql = "CREATE TABLE cart
          (
            cart_id int(10) PRIMARY KEY,
            item_id int(10),
            unit_price decimal(8,2),
            total_price decimal(8,2),
            quantity int(10),
            FOREIGN KEY(item_id) REFERENCES item(item_id)
          )";
  if (mysqli_query($conn, $sql)) {
    echo "<h3>Table cart created successfully</h3>";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  $sql = "CREATE TABLE orderList
          (
            order_id int(10) PRIMARY KEY,
            cart_id int(10),
            item_id int(10),
            unit_price decimal(8,2),
            total_price decimal(8,2),
            quantity_order int(10),
            FOREIGN KEY(cart_id) REFERENCES cart(cart_id),
            FOREIGN KEY(item_id) REFERENCES item(item_id)
          )";
  if (mysqli_query($conn, $sql)) {
    echo "<h3>Table orderList created successfully</h3>";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  $sql = "CREATE TABLE saleschart
          (
            id int(11) NOT NULL,
            jan varchar(255) NOT NULL,
            feb varchar(255) NOT NULL,
            march varchar(255) NOT NULL,
            april varchar(255) NOT NULL,
            may varchar(255) NOT NULL,
            june varchar(255) NOT NULL,
            july varchar(255) NOT NULL,
            august varchar(255) NOT NULL,
            september varchar(255) NOT NULL,
            october varchar(255) NOT NULL,
            november varchar(255) NOT NULL,
            december varchar(255) NOT NULL
          )";
  if (mysqli_query($conn, $sql)) {
    echo "<h3>Table saleschart created successfully</h3>";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  $sql = "CREATE TABLE adminLogin
          (
            id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            email_admin varchar(50) NOT NULL,
            password_admin varchar(50) NOT NULL
          )";
  if (mysqli_query($conn, $sql)) {
    echo "<h3>Table adminLogin created successfully</h3>";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  $sql = "CREATE TABLE shopDetails
          (
            shop_desc varchar(255) NOT NULL,
            monThu varchar(255) NOT NULL,
            friday varchar(255) NOT NULL,
            saturday varchar(255) NOT NULL,
            location varchar(255) NOT NULL,
            phoneNum varchar(255) NOT NULL,
            fax varchar(255) NOT NULL
          )";
  if (mysqli_query($conn, $sql)) {
    echo "<h3>Table shopDetails created successfully</h3>";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  require ("config.php");
  $sql = "INSERT INTO saleschart (id, jan, feb, march, april, may, june, july)
          VALUES (1, '10000', '31000', '50000', '20000', '41302', '43243', '34242');";
  if (mysqli_multi_query($conn, $sql)) {
    echo "<h3>New records of saleschart created successfully</h3>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);

  require ("config.php");
  $sql = "INSERT INTO adminLogin (email_admin, password_admin)
          VALUES ('ebajrai@gmail.com', '1234');";
  if (mysqli_multi_query($conn, $sql)) {
    echo "<h3>New records of adminLogin created successfully</h3>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);

  require ("config.php");
  $sql = "INSERT INTO user (username, email, password, fname, lname, address, phone)
          VALUES ('john', 'johndoe@gmail.com', '1234', 'John', 'Doe', 'Taman U, Skudai, Johor', '+60123456');";
  if (mysqli_multi_query($conn, $sql)) {
    echo "<h3>New records of user created successfully</h3>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);

  require ("config.php");
  $sql = "INSERT INTO shopDetails (shop_desc, monThu, friday, saturday, location, phoneNum, fax)
          VALUES ('Pasar Mini Bajrai is a mini market or grocery shop located in No. 1 Jalan Ampuan, 83000 Batu Pahat, Johor. We provides basic needs by people for their daily life such as food, chicken, meat, sugar, flour, and a variety types of rice, spices and seasonings. Other than that, We also provides frozen foods such as roti canai, donuts and curry puffs.', '9.00A.M. - 6.00P.M.', '8.30A.M. - 12.00P.M., 3.00P.M. - 6.00P.M', '8.00A.M. - 2.00P.M.', 'No. 1 Jalan Ampuan, 83000 Batu Pahat, Johor', '07-431 2446', '07-4342446');";
  if (mysqli_multi_query($conn, $sql)) {
    echo "<h3>New records of shopDetails created successfully</h3>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);

  require ("config.php");
  mysqli_query($conn, "INSERT INTO item (item_id, item_name, item_desc, qty, item_price, item_category, item_package, item_image, des_page) VALUES ('101', 'Whole Fresh Chicken', 'This product is fresh from the farm, freshly packed and selected full grown chicken, HALAL - Malaysia.', '0', '16.50', '3', '1.5 - 1.6 kg for each whole chicken', 'images/Chicken.jpg', 'des_chicken.html')");

  mysqli_query($conn, "INSERT INTO item (item_id, item_name, item_desc, qty, item_price, item_category, item_package, item_image, des_page) VALUES ('102', 'Fresh Beef', 'This product is fresh from local farm and freshly packed beef, HALAL - Malaysia.', '0', '21.90', '3', '1 kg for one packet of beef', 'images/Meet.jpg', 'des_beef.html')");

  mysqli_query($conn, "INSERT INTO item (item_id, item_name, item_desc, qty, item_price, item_category, item_package, item_image, des_page) VALUES ('103', 'Red Apple', 'This product is fresh from the farm, freshly selected medium size red apples, Makanan Selamat Tanggungjawab Industri (MeSTI).', '0', '0.90', '1', '70 - 100 grams for an apple', 'images/Apple.jpg', 'des_apple.html')");

  mysqli_query($conn, "INSERT INTO item (item_id, item_name, item_desc, qty, item_price, item_category, item_package, item_image, des_page) VALUES ('104', 'Organic Banana', 'This product is freshly selected organic bananas, Makanan Selamat Tanggungjawab Industri (MeSTI).', '0', '5.90', '1', '1.0 - 1.3 kg for a bundle of bananas', 'images/Banana.jpg', 'des_banana.html')");

  mysqli_query($conn, "INSERT INTO item (item_id, item_name, item_desc, qty, item_price, item_category, item_package, item_image, des_page) VALUES ('105', 'Coca Cola Can', 'This product is a carbonated drinks that contained caffeince and also known as World's popular carbonated soft drink. It is excellent to have after the luncheon.', '0', '1.70', '4', '250 mL for a can', 'images/CocaCola.jpg', 'des_coke.html')");

  mysqli_query($conn, "INSERT INTO item (item_id, item_name, item_desc, qty, item_price, item_category, item_package, item_image, des_page) VALUES ('106', 'Egg Grade A', 'This product is an A graded chicken eggs that are graded according to the size of the cell which have thick white and high and round yolks.', '28', '13.50', '0', '66.7 - 71.6 grams for a pieces', 'images/EggGredA.jpg', 'des_eggA.html')");

  mysqli_query($conn, "INSERT INTO item (item_id, item_name, item_desc, qty, item_price, item_category, item_package, item_image, des_page) VALUES ('107', 'Egg Grade B', 'This product is an B graded chicken eggs that are graded according to the size of the cell which have thinner whites and wider yolks.', '0', '11.50', '2', '50.0 - 58.2 grams for a piece', 'images/EggGredB.jpg', 'des_eggB.html')");

  mysqli_query($conn, "INSERT INTO item (item_id, item_name, item_desc, qty, item_price, item_category, item_package, item_image, des_page) VALUES ('108', 'Fresh Salad', 'This product is a hybrid lettuce looks as good as it tastes, producing large, curly leaves with a buttery flavor that is fresh from the garden, freshly selected.', '0', '6.50', '1', '100 - 250 grams for a packet', 'images/Salad.jpg', 'des_salad.html')");

  mysqli_query($conn, "INSERT INTO item (item_id, item_name, item_desc, qty, item_price, item_category, item_package, item_image, des_page) VALUES ('109', 'Fresh Mustard Leaf/Sawi', 'This product is have broad, wavy frilled leave with longitudinal veins and deep green color that are freshly selected from the garden.', '0', '2.00', '1', '100 - 250 grams for a packet', 'images/Sawi.jpg', 'des_sawi.html')");

  mysqli_query($conn, "INSERT INTO item (item_id, item_name, item_desc, qty, item_price, item_category, item_package, item_image, des_page) VALUES ('110', 'Asian Sea Bass / Ikan Siakap', 'This product is freshly picked from the sea, Makanan Selamat Tanggungjawab Industri (MeSTI).', '0', '14.90', '3', '700 - 900 grams for one piece', 'images/AsianSeaBass.jpg', 'des_siakap.html')");

  mysqli_query($conn, "INSERT INTO item (item_id, item_name, item_desc, qty, item_price, item_category, item_package, item_image, des_page) VALUES ('111', 'Red Snapper / Ikan Merah', 'This product is freshly picked from the sea, Makanan Selamat Tanggungjawab Industri (MeSTI).', '0', '28.00', '3', '700 - 900 grams for one piece', 'images/RedSnapper.jpg', 'des_redsnapper.html')");

  mysqli_query($conn, "INSERT INTO item (item_id, item_name, item_desc, qty, item_price, item_category, item_package, item_image, des_page) VALUES ('112', 'Red Watermelon', 'This product is freshly selected red watermelon from local farm, Makanan Selamat Tanggungjawab Industri (MeSTI).', '0', '6.20', '1', '1.4 - 1.8 kg for one piece', 'images/Watermelon.jpg', 'des_watermelon.html')");

  mysqli_query($conn, "INSERT INTO item (item_id, item_name, item_desc, qty, item_price, item_category, item_package, item_image, des_page) VALUES ('113', 'Potato', 'This product is fresh from local farm, freshly selected good potatos, Makanan Selamat Tanggungjawab Industri (MeSTI).', '', '2.90', '1', '1 kg (7 - 9 pcs) for one packet of potatos', 'images/Potato.jpg', 'des_potato.html')");

  mysqli_query($conn, "INSERT INTO item (item_id, item_name, item_desc, qty, item_price, item_category, item_package, item_image, des_page) VALUES ('114', 'Cactus Natural Mineral Water', 'This product is a underground mineral water from pure and clean natural water sources that is hygienically filtered and bottled in accordance to international standards for your peace of minds.', '0', '6.20', '4', '5.5L for a bottle', 'images/MineralWater.jpg', 'des_mineralW.html')");

  mysqli_query($conn, "INSERT INTO item (item_id, item_name, item_desc, qty, item_price, item_category, item_package, item_image, des_page) VALUES ('115', 'Tropicana Twister Orange', 'This product is a real fruit juice and pulp that have no artificial coloring or added preservatives in order to offers a fine natural taste.', '0', '5.90', '4', '1.5L for a bottle', 'images/TropicanaTwister.jpg', 'des_twisterO.html')");

  mysqli_query($conn, "INSERT INTO item (item_id, item_name, item_desc, qty, item_price, item_category, item_package, item_image, des_page) VALUES ('116', 'Salted Egg', 'This product is an Asian preserved food product made by soaking duck eggs in brin or packing each egg in damp, salted charcoal.', '0', '9.00', '2', '50 - 70 grams for a piece', 'images/SaltedEgg.jpg', 'des_saltedEgg.html')");
  if (mysqli_multi_query($conn, $sql)) {
    echo "<h3>New records of item created successfully</h3>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);

?>
