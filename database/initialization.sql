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

CREATE TABLE Chip_Models
(
  chip_model CHAR(20) NOT NULL,
  PRIMARY KEY (chip_model)
);

CREATE TABLE Operation_Types
(
  `priority` INT NOT NULL,
  operation_type CHAR(20) NOT NULL,
  chip_model CHAR(20) NOT NULL,
  PRIMARY KEY (operation_type, chip_model),
  FOREIGN KEY (chip_model) REFERENCES Chip_Models(chip_model)
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
  `time` INT,
  expense INT,
  machine_model CHAR(20) NOT NULL,
  chip_model CHAR(20) NOT NULL,
  operation_type CHAR(20) NOT NULL,
  PRIMARY KEY (machine_model, chip_model, operation_type),
  FOREIGN KEY (machine_model) REFERENCES Machine_Models(machine_model),
  FOREIGN KEY (chip_model, operation_type) REFERENCES Operation_Types(chip_model, operation_type)
);

CREATE TABLE Processing_Records
(
  start_time DATE,
  end_time DATE,
  chip_ID INT NOT NULL,
  expense INT,
  plant_name CHAR(20),
  machine_ID INT,
  machine_model CHAR(20),
  package_ID INT NOT NULL,
  chip_model CHAR(20) NOT NULL,
  operation_type CHAR(20) NOT NULL,
  PRIMARY KEY (chip_ID, package_ID, chip_model, operation_type),
  FOREIGN KEY (plant_name, machine_ID, machine_model) REFERENCES Machines_in_Plants(plant_name, machine_ID, machine_model),
  FOREIGN KEY (package_ID) REFERENCES Packages(package_ID),
  FOREIGN KEY (chip_model, operation_type) REFERENCES Operation_Types(chip_model, operation_type)
);


INSERT INTO Chip_Models (`chip_model`) VALUES ('i5');
INSERT INTO Chip_Models (`chip_model`) VALUES ('i7');
INSERT INTO Chip_Models (`chip_model`) VALUES ('i9');

INSERT INTO Operation_Types (`chip_model`, `operation_type`, `priority`) VALUES ('i5', 'design-import', '10');
INSERT INTO Operation_Types (`chip_model`, `operation_type`, `priority`) VALUES ('i5', 'etch', '20');
INSERT INTO Operation_Types (`chip_model`, `operation_type`, `priority`) VALUES ('i5', 'bond', '30');
INSERT INTO Operation_Types (`chip_model`, `operation_type`, `priority`) VALUES ('i5', 'drill', '40');
INSERT INTO Operation_Types (`chip_model`, `operation_type`, `priority`) VALUES ('i5', 'test', '50');
INSERT INTO Operation_Types (`chip_model`, `operation_type`, `priority`) VALUES ('i7', 'design-import', '10');
INSERT INTO Operation_Types (`chip_model`, `operation_type`, `priority`) VALUES ('i7', 'etch', '20');
INSERT INTO Operation_Types (`chip_model`, `operation_type`, `priority`) VALUES ('i7', 'bond', '30');
INSERT INTO Operation_Types (`chip_model`, `operation_type`, `priority`) VALUES ('i7', 'drill', '40');
INSERT INTO Operation_Types (`chip_model`, `operation_type`, `priority`) VALUES ('i7', 'test', '50');
INSERT INTO Operation_Types (`chip_model`, `operation_type`, `priority`) VALUES ('i9', 'design-import', '10');
INSERT INTO Operation_Types (`chip_model`, `operation_type`, `priority`) VALUES ('i9', 'etch', '20');
INSERT INTO Operation_Types (`chip_model`, `operation_type`, `priority`) VALUES ('i9', 'bond', '30');
INSERT INTO Operation_Types (`chip_model`, `operation_type`, `priority`) VALUES ('i9', 'drill', '40');
INSERT INTO Operation_Types (`chip_model`, `operation_type`, `priority`) VALUES ('i9', 'test', '50');
