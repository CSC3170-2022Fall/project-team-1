CREATE TABLE Consumers
(
  consumer_name CHAR(20) NOT NULL,
  `password` CHAR(20) NOT NULL,
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

CREATE TABLE Chip_Models
(
  chip_model CHAR(20) NOT NULL,
  PRIMARY KEY (chip_model)
);

CREATE TABLE Operation_Types
(
  operation_type CHAR(20) NOT NULL,
  PRIMARY KEY (operation_type)
);

CREATE TABLE Plants
(
  plant_name CHAR(20) NOT NULL,
  `password` CHAR(20) NOT NULL,
  PRIMARY KEY (plant_name)
);

CREATE TABLE Chips
(
  chip_ID INT NOT NULL,
  package_ID INT NOT NULL,
  chip_model CHAR(20) NOT NULL,
  PRIMARY KEY (chip_ID, package_ID),
  FOREIGN KEY (package_ID) REFERENCES Packages(package_ID),
  FOREIGN KEY (chip_model) REFERENCES Chip_Models(chip_model)
);

CREATE TABLE Operations_on_Chip_Models
(
  `order` INT NOT NULL,
  operation_type CHAR(20) NOT NULL,
  chip_model CHAR(20) NOT NULL,
  PRIMARY KEY (operation_type, chip_model),
  FOREIGN KEY (operation_type) REFERENCES Operation_Types(operation_type),
  FOREIGN KEY (chip_model) REFERENCES Chip_Models(chip_model)
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

CREATE TABLE Machine_Models
(
  machine_model CHAR(20) NOT NULL,
  PRIMARY KEY (machine_model)
);

CREATE TABLE Machines_in_Plants
(
  machine_ID INT NOT NULL,
  plant_name CHAR(20) NOT NULL,
  machine_model CHAR(20) NOT NULL,
  PRIMARY KEY (machine_ID, plant_name, machine_model),
  FOREIGN KEY (plant_name) REFERENCES Plants(plant_name),
  FOREIGN KEY (machine_model) REFERENCES Machine_Models(machine_model)
);

CREATE TABLE Operations_on_Machines_Models
(
  feasibility INT NOT NULL,
  `time` INT NOT NULL,
  expense INT NOT NULL,
  operation_type CHAR(20) NOT NULL,
  machine_model CHAR(20) NOT NULL,
  PRIMARY KEY (operation_type, machine_model),
  FOREIGN KEY (operation_type) REFERENCES Operation_Types(operation_type),
  FOREIGN KEY (machine_model) REFERENCES Machine_Models(machine_model)
);

CREATE TABLE Processing_Records
(
  start_time INT NOT NULL,
  end_time INT NOT NULL,
  chip_ID INT NOT NULL,
  expense INT NOT NULL,
  operation_type CHAR(20) NOT NULL,
  plant_name CHAR(20) NOT NULL,
  machine_ID INT NOT NULL,
  machine_model CHAR(20) NOT NULL,
  PRIMARY KEY (chip_ID, operation_type),
  FOREIGN KEY (operation_type) REFERENCES Operation_Types(operation_type),
  FOREIGN KEY (plant_name, machine_ID, machine_model) REFERENCES Machines_in_Plants(plant_name, machine_ID, machine_model)
);



INSERT INTO Operation_Types (`operation_type`) VALUES ('design-import_A');
INSERT INTO Operation_Types (`operation_type`) VALUES ('etch_A');
INSERT INTO Operation_Types (`operation_type`) VALUES ('bond_A');
INSERT INTO Operation_Types (`operation_type`) VALUES ('drill_A');
INSERT INTO Operation_Types (`operation_type`) VALUES ('test_A');

INSERT INTO Operation_Types (`operation_type`) VALUES ('design-import_B');
INSERT INTO Operation_Types (`operation_type`) VALUES ('etch_B');
INSERT INTO Operation_Types (`operation_type`) VALUES ('bond_B');
INSERT INTO Operation_Types (`operation_type`) VALUES ('drill_B');
INSERT INTO Operation_Types (`operation_type`) VALUES ('test_B');

INSERT INTO Operation_Types (`operation_type`) VALUES ('design-import_C');
INSERT INTO Operation_Types (`operation_type`) VALUES ('etch_C');
INSERT INTO Operation_Types (`operation_type`) VALUES ('bond_C');
INSERT INTO Operation_Types (`operation_type`) VALUES ('drill_C');
INSERT INTO Operation_Types (`operation_type`) VALUES ('test_C');

INSERT INTO Chip_Models (`chip_model`) VALUES ('chip_A');
INSERT INTO Operations_on_Chip_Models (`operation_type`, `chip_model`, `order`) VALUES ('design-import_A', 'chip_A', '0');
INSERT INTO Operations_on_Chip_Models (`operation_type`, `chip_model`, `order`) VALUES ('etch_A', 'chip_A', '1');
INSERT INTO Operations_on_Chip_Models (`operation_type`, `chip_model`, `order`) VALUES ('bond_A', 'chip_A', '2');
INSERT INTO Operations_on_Chip_Models (`operation_type`, `chip_model`, `order`) VALUES ('drill_A', 'chip_A', '3');
INSERT INTO Operations_on_Chip_Models (`operation_type`, `chip_model`, `order`) VALUES ('test_A', 'chip_A', '4');
INSERT INTO Operations_on_Chip_Models (`operation_type`, `chip_model`, `order`) VALUES ('design-import_B', 'chip_A', '-1');
INSERT INTO Operations_on_Chip_Models (`operation_type`, `chip_model`, `order`) VALUES ('etch_B', 'chip_A', '-1');
INSERT INTO Operations_on_Chip_Models (`operation_type`, `chip_model`, `order`) VALUES ('bond_B', 'chip_A', '-1');
INSERT INTO Operations_on_Chip_Models (`operation_type`, `chip_model`, `order`) VALUES ('drill_B', 'chip_A', '-1');
INSERT INTO Operations_on_Chip_Models (`operation_type`, `chip_model`, `order`) VALUES ('test_B', 'chip_A', '-1');
INSERT INTO Operations_on_Chip_Models (`operation_type`, `chip_model`, `order`) VALUES ('design-import_C', 'chip_A', '-1');
INSERT INTO Operations_on_Chip_Models (`operation_type`, `chip_model`, `order`) VALUES ('etch_C', 'chip_A', '-1');
INSERT INTO Operations_on_Chip_Models (`operation_type`, `chip_model`, `order`) VALUES ('bond_C', 'chip_A', '-1');
INSERT INTO Operations_on_Chip_Models (`operation_type`, `chip_model`, `order`) VALUES ('drill_C', 'chip_A', '-1');
INSERT INTO Operations_on_Chip_Models (`operation_type`, `chip_model`, `order`) VALUES ('test_C', 'chip_A', '-1');
INSERT INTO Chip_Models (`chip_model`) VALUES ('chip_B');
INSERT INTO Chip_Models (`chip_model`) VALUES ('chip_C');

INSERT INTO Consumers (`consumer_name`, `password`) VALUES ('aaa', '123');

INSERT INTO Plants (`plant_name`, `password`) VALUES ('apple', '123');
INSERT INTO Machine_Models (`machine_model`) VALUES ('boy');
INSERT INTO Machines_in_Plants (`plant_name`, `machine_ID`, `machine_model`) VALUES ('apple', '1', 'boy');
INSERT INTO Machines_in_Plants (`plant_name`, `machine_ID`, `machine_model`) VALUES ('apple', '2', 'boy');
INSERT INTO Operations_on_Machines_Models (`operation_type`, `machine_model`, `feasibility`, `time`, `expense`) VALUES ('design-import_A', 'boy', '1', '10', '10');
INSERT INTO Operations_on_Machines_Models (`operation_type`, `machine_model`, `feasibility`, `time`, `expense`) VALUES ('etch_A', 'boy', '1', '10', '10');
INSERT INTO Operations_on_Machines_Models (`operation_type`, `machine_model`, `feasibility`, `time`, `expense`) VALUES ('bond_A', 'boy', '1', '10', '10');
INSERT INTO Operations_on_Machines_Models (`operation_type`, `machine_model`, `feasibility`, `time`, `expense`) VALUES ('drill_A', 'boy', '1', '10', '10');
INSERT INTO Operations_on_Machines_Models (`operation_type`, `machine_model`, `feasibility`, `time`, `expense`) VALUES ('test_A', 'boy', '1', '10', '10');