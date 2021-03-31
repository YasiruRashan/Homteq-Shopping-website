CREATE TABLE product(
    prodId int(4) NOT NULL AUTO_INCREMENT,
    prodName VARCHAR(30),
    prodPicNameSmall VARCHAR (100),
    prodPicNameLarge VARCHAR(100),
    prodDescripShort VARCHAR(1000),
    prodDescripLong VARCHAR(3000),
    prodPrice DECIMAL(6,2),
    prodQuantity int(4),

    CONSTRAINT product_PK PRIMARY KEY (prodId)
);

INSERT INTO product(prodId,prodName,prodPicNameSmall,prodPicNameLarge,prodDescripShort,prodDescripLong,prodPrice,prodQuantity)
VALUES(001,"Echo Dot (3rd Gen) - Smart speaker with Alexa","echoS.jpg","echoL.jpg","Echo Dot is our most popular voice-controlled speaker, now with 
improved sound and a new design","Simple to set up and use - To set up your free bulb, plug in and set up your Echo device, plug 
in your bulb, and ask, 'Alexa, discover my devices.'Use your voice to name your bulb and begin using immediately",300,500)

INSERT INTO product(prodName,prodPicNameSmall,prodPicNameLarge,prodDescripShort,prodDescripLong,prodPrice,prodQuantity)
VALUES("Bluetooth Dual Alarm FM Clock Radio","alarmS.jpg","alarmL.jpg","Wake to Bluetooth audio, 
FM radio, or 4 alarm tones. Dual alarms for separate wake times.","Play audio wirelessly from Bluetooth enabled devices. Speakerphone with digital voice echo cancellation and talk/end controls. 
Audio caller ID (Apple devices running iOS 10 or later).",350,180)

INSERT INTO product(prodName,prodPicNameSmall,prodPicNameLarge,prodDescripShort,prodDescripLong,prodPrice,prodQuantity)
VALUES("SAMSUNG QN32Q50RAFXZA Flat 32","samsungS.jpg","samsungL.jpg","4K UHD Processor: a powerful processor optimizes your tv’ s performance with 4K picture quality","4K UHD Processor: a powerful processor 
optimizes your tv’ s performance with 4K picture quality Inputs & Outputs: 3 HDMI ports, 1 Ethernet port, 2 USB Ports (v 2.0), 1 Digital 
Audio Output (Optical), 1 Composite Input (AV)",495,150)

INSERT INTO product(prodName,prodPicNameSmall,prodPicNameLarge,prodDescripShort,prodDescripLong,prodPrice,prodQuantity)
VALUES("YI Security Home Camera 3 Baby Monitor","cctvS.jpg","cctvL.jpg","YI TECHNOLOGY: Protect your family and home with value adding home security solutions from YI that millions of families, house and pet owners 
already trust today.","YI TECHNOLOGY: Protect your family and home with value adding home security solutions from YI that millions of families, house and pet owners already trust today. The YI Home Camera 3 is a AI security camera with human detection and advanced sound analytics, 1080p Full HD resolution,
107 degree wide angle, two way audio, magnetic base and night vision.",50,1000)


CREATE TABLE Users(
    userId int(4) AUTO_INCREMENT PRIMARY KEY,
    userType VARCHAR(1),
    userFName VARCHAR(50),
    userSName  VARCHAR(50),
    userAddress VARCHAR(50),
    userPostCode VARCHAR(50),
    userTelNo VARCHAR(50),
    userEmail VARCHAR(50),
    userPassword VARCHAR(50)

);

CREATE TABLE Orders(
    orderNo int (4) AUTO_INCREMENT PRIMARY KEY,
    userId int (4),
    orderDateTime datetime,
    orderTotal decimal (8,2),
    orderStatus varchar 50,

    
    CONSTRAINT user_id FOREIGN KEY (userId) References Users(userId)
);

CREATE TABLE Order_Line(
   orderLineId int(4) AUTO_INCREMENT PRIMARY KEY,
   orderNo Int(4),
   prodId int(4),
   quantityOrdered int(4),
   subToatal decimal(8,2),

   CONSTRAINT order_No FOREIGN KEY (orderNo) References Orders(orderNo),
   CONSTRAINT prod_id FOREIGN KEY (prodId) References product(prodId)
);




