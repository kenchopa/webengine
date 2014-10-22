-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 22 okt 2014 om 22:39
-- Serverversie: 5.6.16
-- PHP-versie: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `storehouse`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `Client_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'De id van de klant',
  `FirstName` varchar(64) NOT NULL COMMENT 'De voornaam',
  `LastName` varchar(64) NOT NULL COMMENT 'De familienaam',
  `Email` varchar(128) NOT NULL COMMENT 'Het e-mailadres',
  `Telephone` varchar(32) NOT NULL COMMENT 'Het telefoonnummer',
  `Company` varchar(256) NOT NULL COMMENT 'Het bedrijf',
  `Country_ID` int(11) DEFAULT NULL COMMENT 'de foreign key van country',
  `Region` varchar(128) DEFAULT NULL COMMENT 'De regio',
  `City` varchar(128) DEFAULT NULL COMMENT 'De stad',
  `Street` varchar(256) DEFAULT NULL,
  `StreetNumber` varchar(50) DEFAULT NULL,
  `Fax` varchar(32) DEFAULT NULL,
  `Mobile` varchar(32) DEFAULT NULL,
  `VAT` int(128) DEFAULT NULL,
  PRIMARY KEY (`Client_ID`),
  KEY `Country_ID` (`Country_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='De gegevens van een klant' AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `client`
--

INSERT INTO `client` (`Client_ID`, `FirstName`, `LastName`, `Email`, `Telephone`, `Company`, `Country_ID`, `Region`, `City`, `Street`, `StreetNumber`, `Fax`, `Mobile`, `VAT`) VALUES
(1, 'Kengy', 'Van Hijfte', 'kengy.vanhijfte@telenet.be', '31499856545', 'Stardekk', 18, 'Lissewege', 'Brugge', 'Scharphoutstraat', '9', '/', '31499856545', 123456789),
(4, 'Gilles', 'Demeyer', 'gilles.demeyer@gmail.com', '4565823', 'Stardekk', 18, 'West Flanders', 'Bruges', 'Kasteelstraat', '9', '/', '254689212', 24456652);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `Country_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'De primary key van country',
  `Name` varchar(128) NOT NULL COMMENT 'De naam van country',
  `ISO_short` varchar(2) DEFAULT NULL COMMENT 'de volledige ISO code',
  `ISO_long` varchar(3) DEFAULT NULL COMMENT 'de verkort ISO code',
  `Code` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`Country_ID`),
  UNIQUE KEY `Name` (`Name`),
  KEY `ISO_short` (`ISO_short`,`ISO_long`,`Code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='De countries tabel' AUTO_INCREMENT=33 ;

--
-- Gegevens worden uitgevoerd voor tabel `country`
--

INSERT INTO `country` (`Country_ID`, `Name`, `ISO_short`, `ISO_long`, `Code`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', '93'),
(2, 'Albania', 'Al', 'ALB', '355'),
(3, 'Algeria', 'DZ', 'DZA', '213'),
(4, 'American Samoa', 'AS', 'ASM', '1684'),
(5, 'Andorra', 'AD', 'AND', '376'),
(6, 'Angola', 'AO', 'AGO', '244'),
(7, 'Anguilla', 'Ai', 'AIA', '1264'),
(8, 'Antartica', 'AQ', 'ATA', '672'),
(9, 'Antiqua and Barbuda', 'AG', 'ARG', '1268'),
(10, 'Argentina', 'AR', 'ARG', '1268'),
(11, 'Aruba', 'AW', 'ABW', '297'),
(12, 'Australia', 'AT', 'AUT', '61'),
(13, 'Azerbaijan', 'AZ', 'AZE', '994'),
(14, 'Bahamas', 'BS', 'BHS', '1242'),
(15, 'Bahrain', 'BH', 'BHR', '973'),
(16, 'Barbados', 'BB', 'BRB', '1246'),
(17, 'Belarus', 'BY', 'BLR', '375'),
(18, 'Belgium', 'BE', 'BEL', '32'),
(19, 'Belize', 'BZ', 'BLZ', '501'),
(20, 'Benin', 'BM', 'BMU', '1441'),
(21, 'Bhutan', 'BT', 'BTN', '975'),
(22, 'Bolivia', 'BO', 'BOL', '591'),
(23, 'Bosnia and Herzegovina', 'BA', 'BIH', '387'),
(24, 'Botswana', 'BW', 'BWA', '267'),
(25, 'Brazil', 'BR', 'BRA', '55'),
(26, 'British Indian Ocean Territory', 'IO', 'IOT', ''),
(27, 'British Virgin Islands', 'VG', 'VGB', '1284'),
(28, 'Brunei', 'BN', 'BRN', '673'),
(29, 'Bulgaria', 'BG', 'BGR', '359'),
(30, 'Burkina Faso', 'BF', 'BFA', '226'),
(31, 'Burma (Myanmar)', 'MM', 'MMR', '95'),
(32, 'Burundi', 'BI', 'BDI', '257');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `Project_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'De primary key van project',
  `Client_ID` int(11) NOT NULL COMMENT 'de foreign key van client',
  `CreatedBy_User_ID` int(11) DEFAULT NULL COMMENT 'De foreign key van user, created by user',
  `UpdatedBy_User_ID` int(11) DEFAULT NULL COMMENT 'De foreign key van user, updated by',
  `Name` varchar(128) NOT NULL COMMENT 'De naam van het project',
  `Description` varchar(256) DEFAULT NULL COMMENT 'de beschrijving van het project',
  `Active` tinyint(1) NOT NULL COMMENT 'Kijk of het project al dan niet actief is',
  `Website` varchar(256) DEFAULT NULL COMMENT 'De website waar het project op komt te staan (domeinnaam van het project)',
  `Date_Added` datetime DEFAULT NULL COMMENT 'De datum van creatie',
  `Date_Modified` datetime DEFAULT NULL COMMENT 'De datum van bewerking',
  `Date_Expired` datetime DEFAULT NULL COMMENT 'De expiration date van een project',
  PRIMARY KEY (`Project_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='het project van een client' AUTO_INCREMENT=8 ;

--
-- Gegevens worden uitgevoerd voor tabel `project`
--

INSERT INTO `project` (`Project_ID`, `Client_ID`, `CreatedBy_User_ID`, `UpdatedBy_User_ID`, `Name`, `Description`, `Active`, `Website`, `Date_Added`, `Date_Modified`, `Date_Expired`) VALUES
(6, 1, 25, NULL, 'Project_Kengy_Van_Hijfte', 'Dit is een project voor de client Kengy Van Hijfte', 1, 'www.kengyvanhijfte.be', '2014-10-22 21:47:13', NULL, '2016-10-22 21:47:13'),
(7, 4, 25, NULL, 'Project_Gilles_Demeyer', 'Dit is een project voor de client Gilles Demeyer', 1, 'www.gillesdemeyer.be', '2014-10-22 21:51:12', NULL, '2016-10-22 21:51:12');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `project_user_assignment`
--

CREATE TABLE IF NOT EXISTS `project_user_assignment` (
  `Project_ID` int(11) NOT NULL COMMENT 'De primary key van project',
  `User_ID` int(11) NOT NULL COMMENT 'De primary key van user',
  PRIMARY KEY (`Project_ID`,`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='de many to many table tussen projects en users';

--
-- Gegevens worden uitgevoerd voor tabel `project_user_assignment`
--

INSERT INTO `project_user_assignment` (`Project_ID`, `User_ID`) VALUES
(6, 26),
(6, 27),
(7, 31);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `Type_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'De primary key van type',
  `Name` varchar(128) NOT NULL COMMENT 'de naam van type',
  `Description` varchar(512) DEFAULT NULL COMMENT 'de beschrijving van type',
  `Active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'kijken of het type active is',
  PRIMARY KEY (`Type_ID`),
  KEY `Name` (`Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='De types van project' AUTO_INCREMENT=10 ;

--
-- Gegevens worden uitgevoerd voor tabel `type`
--

INSERT INTO `type` (`Type_ID`, `Name`, `Description`, `Active`) VALUES
(1, 'Winkelierswebsite', 'Wat wil je als winkelier op je site verkopen? Je producten? Ik denk het niet. Ik denk dat je op je site je winkel wilt verkopen. Klinkt misschien wat raar, maar je wilt dat mensen die de site bezoeken besluiten om naar de winkel te komen om daar een aankoop te doen.   Op je site moet je ze dus overtuigende redenen geven om naar je zaak te komen. Sowieso moet dus de sfeer van je winkel op je site te proeven zijn. De website van een sjieke, high-end meubelzaak moet er dus ook sjiek uitzien. ', 1),
(2, 'Dienstverlenerswebsite', 'Dienstverlening is een zeer breed begrip. Loodgieters en stukadoors verlenen een dienst, maar accountants en notarissen ook. Die sites zien er natuurlijk heel anders uit, maar toch zijn er een aantal aspecten aan de website die voor alle dienstverleners gelijk zijn. ', 1),
(3, 'ZZP-er website', 'Als zzp-er ben je doorgaans alleen en moet je jezelf verkopen. Zoals ook bij dienstverleners het geval is, lopen de diensten van zzp-er enorm uiteen. Je kunt als zzp-er een webdesigner zijn, een verhuizer, een consultant of bijvoorbeeld in de bouw werken. De overeenkomst is dat je in alle gevallen moet proberen jezelf te verkopen. Meestal aan andere bedrijven en soms aan particulieren. ', 1),
(4, 'Groothandelwebsite', 'Een groothandel levert doorgaans aan vaste relaties. Zij hoeven niet telkens een klant te overtuigen maar moeten wel zorgen dat de relatie goed blijft. De site moet dus vooral ingericht zijn op het in stand houden en verbeteren van de bestaande relaties. ', 1),
(5, 'E-commerce', 'Dit zijn sites die er allereerst op zijn gericht om producten te verkopen. Voorbeelden zijn Wehkamp en Bol, webwinkels zogezegd. Net als in de fysieke winkel is de marketing in de webwinkel geïntegreerd.', 1),
(6, 'Lead Generation Site', 'Het belangrijkste doel dat een bedrijf met dit soort sites nastreeft is het genereren van orders. De voornaamste functionaliteit is vaak het kunnen aanvragen van een offerte. Voorbeelden van deze categorie zijn telecom bedrijven zoals KPN en T-mobile.', 1),
(7, 'Branding Site', 'Een branding website is bedoeld om een merk neer te zetten. Alles wat er op en rondom de site gebeurd heeft als doel het merk bekender te maken en de beleving bij en waardering voor het merk te verbeteren. Goede voorbeelden van een branding site zijn Heineken en Coca Cola.', 1),
(8, 'Publicatie Site', 'De publicatie site heet ook wel site volgens het uitgeefmodel. Belangrijkste kenmerk van dit type site is dat het verdienmodel is gebaseerd op advertentie inkomsten en abonnementen. Inhoud vormt bij al deze sites een belangrijk aspect. Voorbeelden zijn Nu.nl of NOS.nl.', 1),
(9, 'Blog', 'Een weblog of blog is een persoonlijk dagboek op een website dat regelmatig, soms meermalen per dag, wordt bijgehouden. Meestal gaat het om teksten die in omgekeerd chronologische volgorde verschijnen. De auteur, ook blogger genoemd, biedt in feite een logboek van informatie die hij wil meedelen aan zijn publiek, de bezoekers van zijn weblog. Meestal gaat het om tekst, maar soms ook foto''s (een fotoblog), video (vlog) of audio (podcast).', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'de primary key van gebruiker',
  `Client_ID` int(11) NOT NULL COMMENT 'de foreign key van de klant',
  `UserName` varchar(32) NOT NULL COMMENT 'de gebruikersnaam van de gebruiker',
  `Password` varchar(256) NOT NULL COMMENT 'het paswoord van de gebruiker',
  `Email` varchar(256) NOT NULL COMMENT 'het e-mailadres van de gebruiker',
  `IP_Adress` varchar(256) DEFAULT NULL COMMENT 'het ip-adres van de gebruiker',
  `Salt` varchar(256) DEFAULT NULL COMMENT 'de salt van de gebruiker (encryption)',
  `Activation_Token` varchar(256) DEFAULT NULL COMMENT 'de activatiecode van de gebruiker',
  `Forgot_Password_Token` varchar(256) DEFAULT NULL COMMENT 'de vergeet wachtwoord token',
  `Active` tinyint(1) DEFAULT NULL COMMENT 'kijken of de gebruiker actief is',
  `Suspend` tinyint(1) DEFAULT NULL COMMENT 'kijken of de gebruiker uitgesloten is',
  `Failed_Logins` int(11) DEFAULT NULL COMMENT 'aantal keer dat de login mislukt is, 3 mislukte pogingen timeout van 5 minuten.',
  `Failed_Login_IP` varchar(256) DEFAULT NULL COMMENT 'het ip-adres van de laatste login poging',
  `Failed_Login_Ban_Date` datetime DEFAULT NULL COMMENT 'als de gebruiker meerdere malen foutief heeft ingelogd, dan kan hij gebanned worden tot een bepaald tijdstip',
  `Last_Login_Date` datetime DEFAULT NULL COMMENT 'de laatste keer ingelogd',
  `Current_Login_Date` datetime DEFAULT NULL,
  `Date_Added` datetime DEFAULT NULL COMMENT 'de datum van creatie',
  `Date_Modified` datetime DEFAULT NULL COMMENT 'De datum van modificatie',
  `Level` int(11) DEFAULT NULL COMMENT 'het level van de gebruiker ( voorlopige fix voor verschil te maken tussen hoofduser en subuser) 1 => hoofduser, 2 => subuser',
  PRIMARY KEY (`User_ID`),
  KEY `ClientID` (`Client_ID`),
  KEY `ClientID_2` (`Client_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='de gebruikers gekoppeld aan klant (klant heeft meerdere users)' AUTO_INCREMENT=32 ;

--
-- Gegevens worden uitgevoerd voor tabel `user`
--

INSERT INTO `user` (`User_ID`, `Client_ID`, `UserName`, `Password`, `Email`, `IP_Adress`, `Salt`, `Activation_Token`, `Forgot_Password_Token`, `Active`, `Suspend`, `Failed_Logins`, `Failed_Login_IP`, `Failed_Login_Ban_Date`, `Last_Login_Date`, `Current_Login_Date`, `Date_Added`, `Date_Modified`, `Level`) VALUES
(25, 1, 'sudo', '$1$Il3.xT/.$wHJNgmFOzm7ZyRfiJ9w991', 'kengy.vanhijfte@telenet.be', '127.0.0.1', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2014-10-22 22:32:16', '2014-10-22 22:37:37', '2014-07-20 13:47:39', '2014-07-26 22:57:48', 0),
(26, 1, 'admin', '$1$cl/./W5.$8d5XUpLMuFYFQvxx1snMN/', 'kengy.vanhijfte@telenet.be', '127.0.0.1', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2014-10-22 21:41:21', '2014-10-22 22:35:20', '2014-07-20 13:47:57', '2014-10-22 22:37:56', 1),
(27, 1, 'member', '$1$P0/.sk5.$Nt9qPhtweNhThXyyMvhYr1', 'kengy.vanhijfte@telenet.be', '127.0.0.1', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2014-07-29 23:39:37', '2014-08-02 22:46:38', '2014-07-20 19:16:57', '2014-10-22 21:48:22', 2),
(31, 4, 'Gilles', '$1$FE0.qZ1.$cp8XoGExQQ5Od4xO2ff5e/', 'gilles.demeyer@stardekk.be', '127.0.0.1', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '2014-10-22 22:32:33', '2014-10-22 22:33:47', '2014-10-22 21:50:38', '2014-10-22 21:51:32', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
