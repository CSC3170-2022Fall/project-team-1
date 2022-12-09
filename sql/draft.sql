CREATE TABLE Consumers
(
  consumer_name CHAR(20) NOT NULL,
  password CHAR(20) NOT NULL,
  PRIMARY KEY (consumer_name)
);

CREATE TABLE Packages
(
  time_budget INT NOT NULL,
  expense_budget INT NOT NULL,
  package_ID INT NOT NULL,
  num_chip_A INT NOT NULL,
  num_chip_B INT NOT NULL,
  num_chip_C INT NOT NULL,
  consumer_name CHAR(20) NOT NULL,
  PRIMARY KEY (package_ID),
  FOREIGN KEY (consumer_name) REFERENCES Consumers(consumer_name)
);

CREATE TABLE Machine_Types
(
  machine_type CHAR(20) NOT NULL,
  PRIMARY KEY (machine_type)
);

CREATE TABLE Chip_Types
(
  chip_type CHAR(20) NOT NULL,
  PRIMARY KEY (chip_type)
);

CREATE TABLE Operation_Types
(
  operation_type CHAR(20) NOT NULL,
  PRIMARY KEY (operation_type)
);

CREATE TABLE Operations_on_Machines
(
  feasibility INT NOT NULL,
  time INT NOT NULL,
  expense INT NOT NULL,
  machine_type CHAR(20) NOT NULL,
  operation_type CHAR(20) NOT NULL,
  PRIMARY KEY (machine_type, operation_type),
  FOREIGN KEY (machine_type) REFERENCES Machine_Types(machine_type),
  FOREIGN KEY (operation_type) REFERENCES Operation_Types(operation_type)
);

CREATE TABLE Processing_Records
(
  start_time INT NOT NULL,
  end_time INT NOT NULL,
  expense INT NOT NULL,
  operation_type CHAR(20) NOT NULL,
  PRIMARY KEY (operation_type),
  FOREIGN KEY (operation_type) REFERENCES Operation_Types(operation_type)
);

CREATE TABLE Plants
(
  plant_name CHAR(20) NOT NULL,
  password CHAR(20) NOT NULL,
  PRIMARY KEY (plant_name)
);

CREATE TABLE Chips
(
  chip_ID INT NOT NULL,
  chip_type CHAR(20) NOT NULL,
  package_ID INT NOT NULL,
  PRIMARY KEY (chip_ID, package_ID),
  FOREIGN KEY (chip_type) REFERENCES Chip_Types(chip_type),
  FOREIGN KEY (package_ID) REFERENCES Packages(package_ID)
);

CREATE TABLE Operations_on_Chip_Types
(
  precedency INT NOT NULL,
  operation_type CHAR(20) NOT NULL,
  chip_type CHAR(20) NOT NULL,
  PRIMARY KEY (operation_type, chip_type),
  FOREIGN KEY (operation_type) REFERENCES Operation_Types(operation_type),
  FOREIGN KEY (chip_type) REFERENCES Chip_Types(chip_type)
);

CREATE TABLE Operations_on_Packages_in_Plants
(
  operation_type CHAR(20) NOT NULL,
  package_ID INT NOT NULL,
  plant_name CHAR(20) NOT NULL,
  PRIMARY KEY (operation_type, package_ID),
  FOREIGN KEY (operation_type) REFERENCES Operation_Types(operation_type),
  FOREIGN KEY (package_ID) REFERENCES Packages(package_ID),
  FOREIGN KEY (plant_name) REFERENCES Plants(plant_name)
);

CREATE TABLE Machines_in_Plants
(
  machine_ID INT NOT NULL,
  plant_name CHAR(20) NOT NULL,
  machine_type CHAR(20) NOT NULL,
  PRIMARY KEY (machine_ID),
  FOREIGN KEY (plant_name) REFERENCES Plants(plant_name),
  FOREIGN KEY (machine_type) REFERENCES Machine_Types(machine_type)
);

INSERT INTO Operation_Types (`operation_type`) VALUES ('design-import');
INSERT INTO Operation_Types (`operation_type`) VALUES ('etch');
INSERT INTO Operation_Types (`operation_type`) VALUES ('bond');
INSERT INTO Operation_Types (`operation_type`) VALUES ('drill');
INSERT INTO Operation_Types (`operation_type`) VALUES ('test');

INSERT INTO Plants (`plant_name`, `password`) VALUES ('apple', '123');
INSERT INTO Plants (`plant_name`, `password`) VALUES ('orange', '123');

INSERT INTO Chip_Types (`chip_type`) VALUES ('chip_A');
INSERT INTO Chip_Types (`chip_type`) VALUES ('chip_B');
INSERT INTO Chip_Types (`chip_type`) VALUES ('chip_C');
INSERT INTO Chip_Types (`chip_type`) VALUES ('chip_D');




