/*Creating a new Database*/
-- CREATE DATABASE ONLINE_RETAIL_MANAGEMENT;

/*Creating a new table CUSTOMER
Email Id is a Candidate Key
*/
CREATE TABLE CUSTOMER(
CustomerID INT PRIMARY KEY,
EmailID Varchar(30) UNIQUE,
Fname Varchar(30) NOT NULL,
Minit CHAR(1),
LName Varchar(30) NOT NULL,
PhNo Varchar(15) NOT NULL,
Address Varchar(100) NOT NULL,
Pro BOOL DEFAULT FALSE,
RegDate TIMESTAMP,
Password Varchar(30)
);

/*Creating a new table PRODUCT*/
CREATE TABLE PRODUCT(
	ProductID INT PRIMARY KEY,
    PName Varchar(30) NOT NULL,
    Description Varchar(200),
    Category Varchar(30),
    Cost_Price DECIMAL(10,2),
    Selling_Price DECIMAL(10,2)
);



/*Creating a new table INVOICE*/
CREATE TABLE INVOICE(
	InvoiceNO INT PRIMARY KEY,
	OrderDate TIMESTAMP,
	AmountPaid DECIMAL(10,2),
	GSTIN VARCHAR(30) NOT NULL
);



/*Creating a new cross referenced table for the multi valued attribute PaymentMethod
of INVOICE*/
CREATE TABLE INVOICE_PaymentMethod(
	InvoiceID INT ,
	PaymentMethod VARCHAR(30),
	PRIMARY KEY(InvoiceId,PaymentMethod),
	FOREIGN KEY(InvoiceID) REFERENCES INVOICE(InvoiceNO)
);



/*Creating a new table SELLER*/
CREATE TABLE SELLER(
SellerID INT PRIMARY KEY,
SName  VARCHAR(30) NOT NULL,
PhNo VARCHAR(15) NOT NULL
);



/*Creating a new table INVENTORY*/
CREATE TABLE INVENTORY(
InventID INT PRIMARY KEY,
SellerID INT NOT NULL,
FOREIGN KEY(SellerID) REFERENCES SELLER(SellerID)
);



/*Creating a cross referenced relation for
INVENTORY's MULTI VALUED ATTRIBUTE Location*/
CREATE TABLE INVENTORY_Location(
InventID INT,
Location Varchar(30),
PRIMARY KEY(InventId,Location),
FOREIGN KEY(InventID) REFERENCES INVENTORY(InventID)
);




/*Creating a cross referenced relation for
INVENTORY's Multi valued attribute ProductID*/
CREATE TABLE INVENTORY_ProductID(
InventID INT,
ProductID INT,
Quantity INT  CHECK(Quantity>-1),
PRIMARY KEY(InventID,ProductID),
FOREIGN KEY(InventID) REFERENCES INVENTORY(InventID),
FOREIGN KEY(ProductID) REFERENCES PRODUCT(ProductID)
);




/*Creating a cross refernced relation for the
 PRODUCTS multi valued attribute SellerID*/
 CREATE TABLE PRODUCT_SellerID(
 ProductID INT,
 SellerID INT,
 PRIMARY KEY(ProductID,SellerID),
 FOREIGN KEY(ProductID) REFERENCES PRODUCT(ProductID),
 FOREIGN KEY(SellerID) REFERENCES SELLER(SellerID)
 );



 CREATE TABLE ORDERS(
 OrderID INT PRIMARY KEY,
 Quantity INT DEFAULT 1 CHECK(Quantity>0),
 ProductID INT,
 OrderDate TIMESTAMP,
 DelSysID INT NULL,/* Foreign key constraint added later*/
 CustomerID INT NOT NULL,
 InvoiceNo INT NOT NULL,
 FOREIGN KEY(InvoiceNo) REFERENCES INVOICE(InvoiceNo),
 FOREIGN KEY(ProductID) REFERENCES PRODUCT(ProductID),
 FOREIGN KEY(CustomerID) REFERENCES CUSTOMER(CustomerID)
 );



/*Creating a new table DELIVERY_SYSTEM*/
CREATE TABLE DELIVERY_SYSTEM(
DelSysId INT PRIMARY KEY,
DName VARCHAR(30) NOT NULL
);



/*Creating a cross referenced table for the
DELIVERY_SYSYTEM's multi valued attribute Location*/
CREATE TABLE DELIVERY_SYSTEM_Location(
DelSysID INT,
Location VARCHAR(30),
PRIMARY KEY(DelSysID,Location),
FOREIGN KEY(DelSysID) REFERENCES DELIVERY_SYSTEM(DelSysID)
);



/*Creating a new Table COURIER_SERVICE*/
CREATE TABLE COURIER_SERVICE(
CourierID INT PRIMARY KEY,
CName VARCHAR(30)
);

/*Creating a new table for
COURIER_SERVICE's  multi valued attribute Location*/
CREATE TABLE COURIER_SERVICE_Location(
CourierID INT,
Location Varchar(50),
PRIMARY KEY(CourierID,Location),
FOREIGN KEY(CourierID) REFERENCES COURIER_SERVICE(CourierID)
);

/*Creating a cross refernced table for
the relationship between COURIER_SERVICE and DELIVERY_SYSTEM*/
CREATE TABLE HIRES(
DelSysID INT,
CourierID INT,
OrderID INT,
FOREIGN KEY(DelSysID) REFERENCES DELIVERY_SYSTEM(DelSysID),
FOREIGN KEY(CourierID) REFERENCES COURIER_SERVICE(CourierID),
FOREIGN KEY(OrderID) REFERENCES ORDERS(OrderID)
);

/*Adding the foreign key constraint for ORDERS Table*/
ALTER TABLE ORDERS ADD CONSTRAINT DelSysFK FOREIGN KEY(DelSysID)
REFERENCES DELIVERY_SYSTEM(DelSysId);
