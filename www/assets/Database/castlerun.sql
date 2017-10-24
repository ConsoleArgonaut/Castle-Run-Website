-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 24. Okt 2017 um 12:56
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `castlerun`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pages`
--

CREATE TABLE `pages` (
  `Id` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Text` text NOT NULL,
  `OnlyAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `pages`
--

INSERT INTO `pages` (`Id`, `Title`, `Text`, `OnlyAdmin`) VALUES
(1, 'Startseite', '<p> PHP ist eine in HTML-eingebettete Scriptsprache. Ihre Stärke liegt in der Gestaltung von dynamischen Webseiten und im Programmieren von online Datenbank-Applikationen mit MySQL. PHP ist wesentlich einfacher als JSP und verfügt über eine grosse Anzahl von vordefinierten Funktionen, die die Programmierarbeit vereinfachen. PHP-Scripte werden auf dem Server ausgeführt, sie werden nicht im Vorfeld kompiliert wie JSP, sondern bei jedem HTML-Request neu durch den sog. PHP-Parser auf dem Webserver. Dadurch sind PHP-Applikationen langsammer als JSP, dies spielt aber erst bei umfangreicheren Applikationen eine Rolle. </p>', 0),
(2, 'Vorwort', '<p> CSS steht für \"Cascading Style Sheets\" und dient dazu, Formatierungen, wie z.B. Schriftart oder -grösse, sowie die Farbe, aber auch verschiedene Positionierungen vorzunehmen. Mit CSS kann eine ganze Homepage relativ einfach einheitlich gestaltet werden, und im Internet sind darum die meisten Homepages damit aufgebaut. Diese Kurzanleitung sollte einen kurzen Einstieg in CSS geben, um einen kurzen Überblick über CSS zu erhalten. Die Links führen zu weiteren Internetseiten, die wertvolle und umfangreiche Informationen zum Thema CSS enthalten. Formatierungen können in jeder HTML-Datei einzeln gespeichert werden, was aber aufwendig ist, und bei einer späteren Anpassung zu einem ernormen Arbeitsaufwand führen kann, da jede Seite einzeln angepasst werden muss. Die Idee ist nun, dass man alle diese allgemeingültigen Formatierungen in eine separate Datei (z.B. style.css) schreibt, und dann von den einzelnen HTML-Seiten auf diese Datei zugreift. </p>', 0),
(3, 'Eigenschaften', '<h3>Pro CSS</h3> <p> <ul> <li>Saubere Trennung von Struktur und Form einer Webseite</li> <li>Eigentlicher Quellcode wird verschlankt</li> <li>Änderung des Layouts erfordert weniger Aufwand</li> <li>Es ist möglich einer Webseite mehrere Designs zu geben (z.B. mehr Kontrast für barrierefreie Webseiten</li> <li>Das Design kann für Ausgabegerät (Monitor, PDA, Drucker) angepasst werden</li> </ul> </p> <h3>Kontra CSS</h3> <p> <ul> <li>Es ist anspruchsvoller ein Webseite mit CSS zu gestalten</li> <li>Die Darstellung einer Webseite ist browserabhänig, da leider nicht alle Browser sich an die Standards halten</li> </ul> </p>', 0),
(4, 'Aufgaben', '<h3>1. Aufgabe</h3> <p> Speichere den Ordner Webdesign auf einem Server, welcher PHP unterstützt. </p> <h3>2. Aufgabe (PHP / CSS)</h3> <p> Studiere die Struktur der Seite. Wie werden die einzelnen Seiten eingebunden? Wie ist das Menü aufgebaut? </p> <h3>3. Aufgabe (CSS)</h3> <p> Schau dir die Seite \"Formularfelder\" an. Passe das CSS so an, dass die Formularfelder schön aber schlicht wirken. </p> <h3>4. Aufgabe (CSS)</h3> <p> Schau dir die Seite \"Listen\" an. Kannst du das CSS so anpassen, dass die oberen Listenpunkte einen unausgefüllten Kreis und die unteren Quadrate darstellen. </p> <h3>5. Aufgabe (CSS)</h3> <p> Auf der Seite Buttons siehst du drei Links, wobei der erste Link als Button erscheint. Generiere im CSS drei unterschiedliche Buttons. </p>', 0),
(5, 'Anmeldung Schlosslauf', '<form name=\"Formular\" action=\"assets/include/pageManager.php\" method=\"post\" onsubmit=\"return chkFormular()\"> <table> <tr><td>Name:</td><td><input type=\"text\"name=\"Name\"></td></tr> <tr><td>Vorname: </td><td>    <input type=\"text\"name=\"Vorname\"></td></tr> <tr><td>Strasse: </td><td> <input type=\"text\"  name=\"Strasse\"></td></tr> <tr><td>Ort:</td><td>  <input type=\"text\" name=\"Ort\"></td></tr> <tr><td>PLZ: </td><td> <input type=\"text\"  name=\"PLZ\"></td></tr> <tr><td>E-Mail:  </td><td> <input type=\"text\"  name=\"Mail\"></td></tr> <tr><td>Gruppe:  </td><td>  <select  name=\"Gruppe\"> <option value=\"a\">A</option><option value=\"b\">B</option> <option value=\"c\">C</option> </select></td></tr> <tr><td>Land:  </td><td>  <select  name=\"Land\"> <option value=\"schweiz\">Schweiz</option> <option value=\"deutschland\">Deutschland</option> <option value=\"italien\">Italien</option> <option value=\"frankreich\">Frankreich</option> </select></td></tr> <tr><td>Sprache:  </td><td><select  name=\"Sprache\"> <option value=\"Deutsch\">Deutsch</option><option value=\"Franzoesisch\">Franzoesisch</option> <option value=\"Italienisch\">Italienisch</option> <option value=\"Englisch\">Englisch</option> </select></td></tr> <tr><td><input type=\"submit\" name=\"anmeldung\" value=\"Absenden\"></td><td><input type=\"reset\" value=\"Abbrechen\"></td></tr> </table> </form>', 1),
(6, 'Benutzer Registration', '<form method=\"post\" action=\"assets/include/pageManager.php\" accept-charset=\"utf-8\"><label><b>New User</b></label><br><input type=\"text\" name=\"name\" placeholder=\"Username\"/><br><input type=\"password\" name=\"password\" placeholder=\"Password\"/><br><input type=\"password\" name=\"reEnterPassword\" placeholder=\"Re-enter password\"/><br><label>Is admin? </label><input type=\"checkbox\" name=\"isAdmin\" value=\"Yes\" /><label>Yes</label><br><input type=\"submit\" value=\"Register\" name=\"register\" class=\"login\"/></form>', 1),
(7, 'Logout', '', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `regristration`
--

CREATE TABLE `regristration` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Street` varchar(40) NOT NULL,
  `City` varchar(30) NOT NULL,
  `PLZ` varchar(10) NOT NULL,
  `EMail` varchar(30) NOT NULL,
  `Team` varchar(15) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `Language` varchar(30) NOT NULL,
  `RegristrationTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `regristration`
--

INSERT INTO `regristration` (`Id`, `FirstName`, `LastName`, `Street`, `City`, `PLZ`, `EMail`, `Team`, `Country`, `Language`, `RegristrationTime`) VALUES
(1, 'Enrico', 'Chatelin', 'Im Langacher 28', 'Richterswil', '8805', 'eni@chatelin.ch', 'a', 'schweiz', 'Deutsch', '2017-10-24 10:02:49');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `IsAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`Id`, `Name`, `Password`, `IsAdmin`) VALUES
(1, 'test', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', 1),
(2, 'trial', 'CE8027480807EF660E76C1A5EB387585C0FD939F53675E0746E9989057B3DD8126489225E6F0A326863DE22E126CA7F1628762E990D05BD3F374342091ACB5D7', 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `regristration`
--
ALTER TABLE `regristration`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `pages`
--
ALTER TABLE `pages`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `regristration`
--
ALTER TABLE `regristration`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
