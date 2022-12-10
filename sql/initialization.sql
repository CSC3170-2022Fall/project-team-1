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
  consumer_name CHAR(20) NOT NULL,
  PRIMARY KEY (package_ID),
  FOREIGN KEY (consumer_name) REFERENCES Consumers(consumer_name)
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

CREATE TABLE Machine_Models
(
  machine_model CHAR(20) NOT NULL,
  PRIMARY KEY (machine_model)
);

CREATE TABLE Machines_in_Plants
(
  machine_ID INT NOT NULL,
  available INT NOT NULL,
  plant_name CHAR(20) NOT NULL,
  machine_model CHAR(20) NOT NULL,
  PRIMARY KEY (machine_ID, plant_name, machine_model),
  FOREIGN KEY (plant_name) REFERENCES Plants(plant_name),
  FOREIGN KEY (machine_model) REFERENCES Machine_Models(machine_model)
);

CREATE TABLE Operations_on_Machine_Models
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
  start_time DATE,
  end_time DATE,
  chip_ID INT NOT NULL,
  expense INT,
  chip_model CHAR(20) NOT NULL,
  `priority` INT NOT NULL,
  operation_type CHAR(20) NOT NULL,
  plant_name CHAR(20),
  machine_ID INT,
  machine_model CHAR(20),
  package_ID INT NOT NULL,
  PRIMARY KEY (chip_ID, operation_type, package_ID),
  FOREIGN KEY (operation_type) REFERENCES Operation_Types(operation_type),
  FOREIGN KEY (plant_name, machine_ID, machine_model) REFERENCES Machines_in_Plants(plant_name, machine_ID, machine_model),
  FOREIGN KEY (package_ID) REFERENCES Packages(package_ID)
);



INSERT INTO Operation_Types (`operation_type`) VALUES ('design-import_i5');
INSERT INTO Operation_Types (`operation_type`) VALUES ('etch_i5');
INSERT INTO Operation_Types (`operation_type`) VALUES ('bond_i5');
INSERT INTO Operation_Types (`operation_type`) VALUES ('drill_i5');
INSERT INTO Operation_Types (`operation_type`) VALUES ('test_i5');

INSERT INTO Operation_Types (`operation_type`) VALUES ('design-import_i7');
INSERT INTO Operation_Types (`operation_type`) VALUES ('etch_i7');
INSERT INTO Operation_Types (`operation_type`) VALUES ('bond_i7');
INSERT INTO Operation_Types (`operation_type`) VALUES ('drill_i7');
INSERT INTO Operation_Types (`operation_type`) VALUES ('test_i7');

INSERT INTO Operation_Types (`operation_type`) VALUES ('design-import_i9');
INSERT INTO Operation_Types (`operation_type`) VALUES ('etch_i9');
INSERT INTO Operation_Types (`operation_type`) VALUES ('bond_i9');
INSERT INTO Operation_Types (`operation_type`) VALUES ('drill_i9');
INSERT INTO Operation_Types (`operation_type`) VALUES ('test_i9');

INSERT INTO Consumers (`consumer_name`, `password`) VALUES ('aaa', '123');

INSERT INTO Plants (`plant_name`, `password`) VALUES ('apple', '123');
INSERT INTO Machine_Models (`machine_model`) VALUES ('boy');
INSERT INTO Machines_in_Plants (`plant_name`, `machine_ID`, `machine_model`, `available`) VALUES ('apple', '1', 'boy', '1');
INSERT INTO Machines_in_Plants (`plant_name`, `machine_ID`, `machine_model`, `available`) VALUES ('apple', '2', 'boy', '1');
INSERT INTO Operations_on_Machine_Models (`operation_type`, `machine_model`, `feasibility`, `time`, `expense`) VALUES ('design-import_i5', 'boy', '1', '100', '10');
INSERT INTO Operations_on_Machine_Models (`operation_type`, `machine_model`, `feasibility`, `time`, `expense`) VALUES ('etch_i5', 'boy', '1', '10', '100');
INSERT INTO Operations_on_Machine_Models (`operation_type`, `machine_model`, `feasibility`, `time`, `expense`) VALUES ('bond_i5', 'boy', '1', '10', '100');
INSERT INTO Operations_on_Machine_Models (`operation_type`, `machine_model`, `feasibility`, `time`, `expense`) VALUES ('drill_i5', 'boy', '1', '10', '100');
INSERT INTO Operations_on_Machine_Models (`operation_type`, `machine_model`, `feasibility`, `time`, `expense`) VALUES ('test_i5', 'boy', '1', '10', '100');