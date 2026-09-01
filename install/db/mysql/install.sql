CREATE TABLE `booking_hall` (`ID` int NOT NULL AUTO_INCREMENT, `CODE` varchar(10), `NAME` varchar(255), `MAP` varchar(255), `ACTIVE` varchar(1), PRIMARY KEY(`ID`)) Engine=InnoDB;
CREATE TABLE `booking_table` (`ID` int NOT NULL AUTO_INCREMENT, `CODE` varchar(10), `NAME` varchar(255), `ACTIVE` varchar(1), `HALL_ID` int NOT NULL,PRIMARY KEY(`ID`)) Engine=InnoDB;
