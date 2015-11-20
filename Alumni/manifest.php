<?php
/*
Gibbon, Flexible & Open School System
Copyright (C) 2010, Ross Parker

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

//This file describes the module, including database tables

//Basica variables
$name="Alumni" ;
$description="The Alumni module allows schools to accept alumni registrations, and then link these to existing user accounts." ;
$entryURL="alumni_manage.php" ;
$type="Additional" ;
$category="People" ;
$version="0.1.00" ;
$author="Ross Parker" ;
$url="http://rossparker.org/free-learning" ;


//Module tables
$moduleTables[0]="CREATE TABLE `alumniAlumnus` (  `alumniAlumnusID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,  `title` varchar(5) NOT NULL,  `surname` varchar(30) NOT NULL DEFAULT '',  `firstName` varchar(30) NOT NULL DEFAULT '',  `officialName` varchar(150) NOT NULL,  `maidenName` varchar(30) NOT NULL,  `gender` enum('M','F','Other','Unspecified') NOT NULL DEFAULT 'Unspecified',  `username` varchar(20) NOT NULL,  `dob` date DEFAULT NULL,  `email` varchar(50) DEFAULT NULL,  `address1Country` varchar(255) NOT NULL,  `profession` varchar(30) NOT NULL,  `employer` varchar(30) NOT NULL,  `jobTitle` varchar(30) NOT NULL,  `graduatingYear` int(4) NOT NULL, `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`alumniAlumnusID`)) ENGINE=MyISAM DEFAULT CHARSET=utf8;" ;


//Settings
$gibbonSetting[0]="INSERT INTO `gibbonSetting` (`gibbonSystemSettingsID` ,`scope` ,`name` ,`nameDisplay` ,`description` ,`value`) VALUES (NULL , 'Alumni', 'showPublicRegistration', 'Show Public Registration', 'Should the alumni registration form be displayed on the school\'s Gibbon homepage, or available via a link only?.', 'Y');";


//Hooks
$array=array() ;
$array["toggleSettingName"]="showPublicRegistration" ;
$array["toggleSettingScope"]="Alumni" ;
$array["toggleSettingValue"]="Y" ;
$array["title"]="Alumni Registration" ;
$array["text"]="Are you a former member of our school community? If so, please do <a href=\'./index.php?q=/modules/Alumni/publicRegistration.php\'>register as an alumnus of the school</a>." ;
$hooks[0]="INSERT INTO `gibbonHook` (`gibbonHookID`, `name`, `type`, `options`, gibbonModuleID) VALUES (NULL, 'Alumni', 'Public Home Page', '" . serialize($array) . "', (SELECT gibbonModuleID FROM gibbonModule WHERE name='$name'));" ;


?>