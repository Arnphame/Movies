-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018 m. Geg 19 d. 11:56
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database2`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `award`
--

CREATE TABLE `award` (
  `Name` varchar(255) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `Type` int(11) DEFAULT NULL,
  `id_Award` int(11) NOT NULL,
  `fk_Movieid_Movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `award`
--

INSERT INTO `award` (`Name`, `Year`, `Country`, `Type`, `id_Award`, `fk_Movieid_Movie`) VALUES
('Awards Circuit Community Awards', 1994, 'Global', 3, 1, 1),
('Oscar', 1973, 'United States of America', 8, 2, 2),
('Oscar', 1973, 'United States of America', 1, 3, 2),
('Oscar', 1973, 'United States of America', 2, 4, 2),
('Oscar', 2009, 'Global', 9, 5, 3),
('Golden Globes', 2009, 'USA', 1, 6, 3),
('Oscar', 2017, 'USA', 6, 7, 6),
('Oscar', 2017, 'USA', 9, 8, 6);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `award_types`
--

CREATE TABLE `award_types` (
  `id_Award_types` int(11) NOT NULL,
  `name` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `award_types`
--

INSERT INTO `award_types` (`id_Award_types`, `name`) VALUES
(1, 'Best_Actor/Actress'),
(2, 'Best_Screenplay'),
(3, 'Best_Cinematography'),
(4, 'Best_Costume_Design'),
(5, 'Best_Director'),
(6, 'Best_Film_Editing'),
(7, 'Best_Makeup'),
(8, 'Best_Picture'),
(9, 'Best_Sound'),
(10, 'Best_Special_Effects');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `has_movie`
--

CREATE TABLE `has_movie` (
  `fk_Movieid_Movie` int(11) NOT NULL,
  `fk_PersonPersonal_No` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `has_movie`
--

INSERT INTO `has_movie` (`fk_Movieid_Movie`, `fk_PersonPersonal_No`) VALUES
(1, '6541238975'),
(1, '6541238987'),
(1, '6541238988'),
(2, '6541238974'),
(3, '6541230001'),
(3, '6541230002'),
(3, '6541238973'),
(4, '6541230003'),
(4, '6541230004'),
(4, '6541230005'),
(4, '7541238970'),
(4, '7541238974'),
(5, '5541230007'),
(5, '6541230006'),
(5, '6541230008'),
(6, '6541230010'),
(6, '6541230011'),
(6, '6541230012');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `has_person`
--

CREATE TABLE `has_person` (
  `fk_Professionid_Profession` int(11) NOT NULL,
  `fk_PersonPersonal_No` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `has_person`
--

INSERT INTO `has_person` (`fk_Professionid_Profession`, `fk_PersonPersonal_No`) VALUES
(1, '6541230001'),
(1, '6541230003'),
(1, '6541230006'),
(1, '6541230010'),
(1, '6541238984'),
(1, '6541238985'),
(1, '6541238986'),
(1, '6541238989'),
(2, '6541230002'),
(2, '6541230004'),
(2, '6541230005'),
(2, '6541230011'),
(2, '6541238988'),
(2, '6541238990'),
(3, '5541230007'),
(3, '6541230008'),
(3, '6541230012'),
(3, '6541238970'),
(3, '6541238971'),
(3, '6541238972'),
(3, '6541238973'),
(3, '6541238974'),
(3, '6541238975'),
(3, '6541238976'),
(3, '6541238977'),
(3, '6541238978'),
(3, '6541238979'),
(3, '6541238980'),
(3, '6541238981'),
(3, '6541238982'),
(3, '6541238983'),
(3, '7541238970'),
(3, '7541238971'),
(3, '7541238972'),
(3, '7541238973'),
(3, '7541238974'),
(3, '7541238975'),
(3, '7541238976'),
(3, '7541238978'),
(3, '7541238979'),
(3, '7541238980'),
(3, '7541238981'),
(3, '7541238982'),
(3, '7541238983'),
(3, '7541238984'),
(3, '7541238985'),
(3, '7541238986');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `movie`
--

CREATE TABLE `movie` (
  `Name` varchar(255) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Is_Released` tinyint(1) DEFAULT NULL,
  `Runtime` varchar(255) DEFAULT NULL,
  `Box_Office` double DEFAULT NULL,
  `Genre` int(11) DEFAULT NULL,
  `id_Movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `movie`
--

INSERT INTO `movie` (`Name`, `Year`, `Is_Released`, `Runtime`, `Box_Office`, `Genre`, `id_Movie`) VALUES
('The Shawshank Redemption', 1994, 1, '142', 25000000, 4, 1),
('The Godfather', 1972, 1, '175', 6000000, 4, 2),
('The Dark Knight', 2008, 1, '152', 185000000, 1, 3),
('Justice League', 2017, 1, '120', 300000000, 1, 4),
('Tomb Raider', 2018, 0, '118', 0, 1, 5),
('Hacksaw Ridge', 2016, 1, '139', 40000000, 5, 6);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `movie_genres`
--

CREATE TABLE `movie_genres` (
  `id_Movie_genres` int(11) NOT NULL,
  `name` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `movie_genres`
--

INSERT INTO `movie_genres` (`id_Movie_genres`, `name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Comedy'),
(4, 'Crime'),
(5, 'Drama'),
(6, 'Historical'),
(7, 'Horror'),
(8, 'Musical'),
(9, 'Science_Fiction'),
(10, 'War'),
(11, 'Western');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `nationality`
--

CREATE TABLE `nationality` (
  `Language` varchar(255) DEFAULT NULL,
  `Capital` varchar(255) DEFAULT NULL,
  `ISO` varchar(255) NOT NULL,
  `Time_Zone` varchar(255) DEFAULT NULL,
  `Calling_Code` varchar(255) DEFAULT NULL,
  `Currency` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `nationality`
--

INSERT INTO `nationality` (`Language`, `Capital`, `ISO`, `Time_Zone`, `Calling_Code`, `Currency`, `Name`) VALUES
('English', 'Canberra', 'AU', 'UTC+8 to +10.5', '+61', 'AUD', 'Australia'),
('French', 'Paris', 'FR', 'UTC+1', '+33', 'EUR', 'France'),
('English', 'London', 'GB', 'UTC+1', '+44', 'GBP', 'England'),
('Hebrew', 'Jerusalem', 'IL', 'UTC+2', '+972', 'ILS', 'Israel'),
('Italian', 'Rome', 'IT', 'UTC+1', '+39', 'EUR', 'Italy'),
('Norwegian', 'Oslo', 'NO', 'UTC+1', '+47', 'NOK', 'Norway'),
('Swedish', 'Stockholm', 'SE', 'UTC+2', '+46', 'SEK', 'Sweden'),
('English', 'Washington', 'US', 'UTC-4 to -12', '+1', 'USD', 'United States');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `nomination`
--

CREATE TABLE `nomination` (
  `Name` varchar(255) DEFAULT NULL,
  `Is_Winner` tinyint(1) DEFAULT NULL,
  `id_Nomination` int(11) NOT NULL,
  `fk_Awardid_Award` int(11) DEFAULT NULL,
  `fk_Movieid_Movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `nomination`
--

INSERT INTO `nomination` (`Name`, `Is_Winner`, `id_Nomination`, `fk_Awardid_Award`, `fk_Movieid_Movie`) VALUES
('Best Picture', 0, 1, NULL, 1),
('Best Actor', 0, 2, NULL, 1),
('Best Cinematography', 1, 3, 1, 1),
('Best Picture', 1, 4, 2, 2),
('Best Actor', 1, 5, 3, 2),
('Best Sreenplay', 1, 6, 4, 2),
('Best Sound', 1, 7, 5, 3),
('Best Cinematography', 0, 8, NULL, 3),
('Best Actor', 1, 9, 6, 3),
('Best Actor', 0, 10, NULL, 4),
('Best Actress', 0, 11, NULL, 4),
('Best Film editing', 1, 12, 7, 6),
('Best Sound mixing', 1, 13, 8, 6),
('Best Actor', 0, 14, NULL, 6);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `person`
--

CREATE TABLE `person` (
  `Name` varchar(255) DEFAULT NULL,
  `Surname` varchar(255) DEFAULT NULL,
  `Personal_No` varchar(255) NOT NULL,
  `Salary` double DEFAULT NULL,
  `Sex` varchar(255) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Experience` int(11) DEFAULT NULL,
  `fk_NationalityISO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `person`
--

INSERT INTO `person` (`Name`, `Surname`, `Personal_No`, `Salary`, `Sex`, `Age`, `Experience`, `fk_NationalityISO`) VALUES
('Alicia', 'Vikander', '5541230007', 1000000, 'Male', 29, 10, 'SE'),
('Christopher', 'Nolan', '6541230001', 39000000, 'Male', 47, 15, 'GB'),
('Jonathan', 'Nolan', '6541230002', 34000000, 'Male', 41, 13, 'GB'),
('Zack', 'Snyder', '6541230003', 19000000, 'Male', 52, 26, 'US'),
('Chris', 'Terrio', '6541230004', 20000000, 'Male', 41, 15, 'US'),
('Joss', 'Whedon', '6541230005', 10000000, 'Male', 53, 21, 'US'),
('Roar', 'Uthaug', '6541230006', 9000000, 'Male', 44, 15, 'NO'),
('Dominic', 'West', '6541230008', 1600000, 'Male', 48, 23, 'GB'),
('Mel', 'Gibson', '6541230010', 35000000, 'Male', 62, 40, 'US'),
('Robert', 'Schenkkan', '6541230011', 29000000, 'Male', 64, 38, 'US'),
('Andrew', 'Garfield', '6541230012', 22000000, 'Male', 34, 9, 'US'),
('Tom', 'Hanks', '6541238970', 1000000, 'Male', 60, 35, 'US'),
('Robert', 'De Niro', '6541238971', 3000000, 'Male', 73, 45, 'US'),
('Leonardo', 'DiCaprio', '6541238972', 20000000, 'Male', 42, 20, 'US'),
('Christian', 'Bale', '6541238973', 1000000, 'Male', 43, 20, 'GB'),
('Al', 'Pacino', '6541238974', 10000000, 'Male', 76, 50, 'US'),
('Morgan', 'Freeman', '6541238975', 2500000, 'Male', 79, 50, 'US'),
('Anthony', 'Hopkins', '6541238976', 1000000, 'Male', 79, 52, 'GB'),
('Johnny', 'Depp', '6541238977', 30000000, 'Male', 53, 30, 'US'),
('Robert', 'Downey Jr.', '6541238978', 29000000, 'Male', 52, 30, 'US'),
('Matt', 'Damon', '6541238979', 1000000, 'Male', 46, 20, 'US'),
('Brad', 'Pitt', '6541238980', 10000000, 'Male', 53, 33, 'US'),
('Hugh', 'Jackman', '6541238981', 28000000, 'Male', 48, 27, 'AU'),
('Bradley', 'Cooper', '6541238982', 1900000, 'Male', 42, 19, 'US'),
('Tom', 'Hardy', '6541238983', 8900000, 'Male', 39, 15, 'US'),
('David', 'Fincher', '6541238984', 10000000, 'Male', 55, 30, 'US'),
('Martin', 'Scorsese', '6541238985', 30000000, 'Male', 75, 40, 'US'),
('Quentin', 'Tarantino', '6541238986', 10000000, 'Male', 55, 30, 'US'),
('Frank', 'Darabont', '6541238987', 60000000, 'Male', 59, 30, 'FR'),
('Stephen', 'King', '6541238988', 25000000, 'Male', 70, 40, 'US'),
('Francis', 'Ford Coppola', '6541238989', 20000000, 'Male', 78, 50, 'US'),
('Mario', 'Puzo', '6541238990', 19000000, 'Male', 0, 53, 'US'),
('Gal', 'Gadot', '7541238970', 50000000, 'Female', 32, 15, 'IL'),
('Daisy', 'Ridley', '7541238971', 5100000, 'Female', 25, 5, 'GB'),
('Meryl', 'Streep', '7541238972', 11000000, 'Female', 68, 40, 'US'),
('Sandra', 'Bullock', '7541238973', 18000000, 'Female', 53, 20, 'US'),
('Amy', 'Adams', '7541238974', 10500000, 'Female', 43, 18, 'IT'),
('Nicole', 'Kidman', '7541238975', 20100000, 'Female', 50, 25, 'US'),
('Jennifer', 'Lawrence', '7541238976', 22000000, 'Female', 27, 5, 'US'),
('Julia', 'Roberts', '7541238978', 10100000, 'Female', 50, 20, 'US'),
('Scarlett', 'Johansson', '7541238979', 20500000, 'Female', 33, 10, 'US'),
('Angelina', 'Jolie', '7541238980', 15500000, 'Female', 42, 15, 'US'),
('Emma', 'Watson', '7541238981', 9000000, 'Female', 27, 5, 'FR'),
('Elizabeth', 'Banks', '7541238982', 10000000, 'Female', 44, 20, 'US'),
('Cameron', 'Diaz', '7541238983', 3100000, 'Female', 45, 20, 'US'),
('Goldie', 'Hawn', '7541238984', 5100000, 'Female', 72, 40, 'US'),
('Natalie', 'Portman', '7541238985', 9100000, 'Female', 36, 15, 'IL'),
('Anne', 'Hathaway', '7541238986', 10000000, 'Female', 35, 10, 'US');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `profession`
--

CREATE TABLE `profession` (
  `Title` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Average_Salary` double DEFAULT NULL,
  `id_Profession` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `profession`
--

INSERT INTO `profession` (`Title`, `Description`, `Average_Salary`, `id_Profession`) VALUES
('Director', 'A film director is a person who directs the making of a film', 70950, 1),
('Writer', 'A screenplay writer is a writer who practices the craft of screenwriting,', 61240, 2),
('Actor', 'An actor is a person who portrays a character in a performance.', 54828, 3);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `rating`
--

CREATE TABLE `rating` (
  `IMDB` double DEFAULT NULL,
  `RT_TomatoMeter` double DEFAULT NULL,
  `MetaScore` double DEFAULT NULL,
  `Is_IMDB_Top250` tinyint(1) DEFAULT NULL,
  `Is_RT_Top100` tinyint(1) DEFAULT NULL,
  `RT_Audience_Score` double DEFAULT NULL,
  `MT_UserScore` double DEFAULT NULL,
  `id_Rating` int(11) NOT NULL,
  `fk_Movieid_Movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `rating`
--

INSERT INTO `rating` (`IMDB`, `RT_TomatoMeter`, `MetaScore`, `Is_IMDB_Top250`, `Is_RT_Top100`, `RT_Audience_Score`, `MT_UserScore`, `id_Rating`, `fk_Movieid_Movie`) VALUES
(9.3, 91, 80, 1, 0, 98, 8.9, 1, 1),
(9.2, 98, 100, 1, 1, 98, 9.2, 2, 2),
(9, 94, 82, 1, 1, 94, 8.9, 3, 3),
(6.8, 40, 45, 0, 0, 76, 6.7, 4, 4),
(7.6, 0, 0, 0, 0, 96, 0, 5, 5),
(8.2, 86, 71, 0, 0, 91, 8.3, 6, 6);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `review`
--

CREATE TABLE `review` (
  `IMDB_User_Count` int(11) DEFAULT NULL,
  `IMDB_Critic_Count` int(11) DEFAULT NULL,
  `RT_Count` int(11) DEFAULT NULL,
  `MT_User_Count` int(11) DEFAULT NULL,
  `MT_Critic_Count` int(11) DEFAULT NULL,
  `id_Review` int(11) NOT NULL,
  `fk_Movieid_Movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `review`
--

INSERT INTO `review` (`IMDB_User_Count`, `IMDB_Critic_Count`, `RT_Count`, `MT_User_Count`, `MT_Critic_Count`, `id_Review`, `fk_Movieid_Movie`) VALUES
(5195, 215, 66, 198, 20, 1, 1),
(2665, 224, 87, 361, 15, 2, 2),
(5221, 663, 326, 1297, 39, 3, 3),
(1360, 409, 305, 501, 52, 4, 4),
(28, 5, 0, 0, 0, 5, 5),
(655, 451, 244, 109, 47, 6, 6);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `studio`
--

CREATE TABLE `studio` (
  `Name` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `Founder` varchar(255) DEFAULT NULL,
  `Year` varchar(255) DEFAULT NULL,
  `Revenue` varchar(255) DEFAULT NULL,
  `id_Studio` int(11) NOT NULL,
  `fk_Movieid_Movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `studio`
--

INSERT INTO `studio` (`Name`, `Country`, `Founder`, `Year`, `Revenue`, `id_Studio`, `fk_Movieid_Movie`) VALUES
('Columbia Pictures', 'United States', 'Harry Cohn', '1918', '80640000000', 1, 1),
('Paramount Pictures', 'United States', 'William Wadsworth Hodkinson', '1912', '28850000000', 2, 2),
('Warner Bros', 'United States', 'Harry Warner', '1923', '129920000000', 3, 3),
('Warner Bros', 'United States', 'Harry Warner', '1923', '129920000000', 4, 4),
('Warner Bros', 'United States', 'Harry Warner', '1923', '129920000000', 5, 5),
('Summit Entertainment', 'United States', 'Rob Friedman', '1991', '0', 6, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`id_Award`),
  ADD KEY `Type` (`Type`),
  ADD KEY `has2` (`fk_Movieid_Movie`);
  
  ALTER TABLE `award`
  MODIFY `id_Award` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Indexes for table `award_types`
--
ALTER TABLE `award_types`
  ADD PRIMARY KEY (`id_Award_types`);
  
    ALTER TABLE `award_types`
  MODIFY `id_Award_types` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Indexes for table `has_movie`
--
ALTER TABLE `has_movie`
  ADD PRIMARY KEY (`fk_Movieid_Movie`,`fk_PersonPersonal_No`),
  ADD KEY `fk_PersonPersonal_No` (`fk_PersonPersonal_No`);

--
-- Indexes for table `has_person`
--
ALTER TABLE `has_person`
  ADD PRIMARY KEY (`fk_Professionid_Profession`,`fk_PersonPersonal_No`),
  ADD KEY `fk_PersonPersonal_No` (`fk_PersonPersonal_No`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id_Movie`),
  ADD KEY `Genre` (`Genre`);

  ALTER TABLE `movie`
  MODIFY `id_Movie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Indexes for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD PRIMARY KEY (`id_Movie_genres`);
  
    ALTER TABLE `movie_genres`
  MODIFY `id_Movie_genres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Indexes for table `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`ISO`);

--
-- Indexes for table `nomination`
--
ALTER TABLE `nomination`
  ADD PRIMARY KEY (`id_Nomination`),
  ADD UNIQUE KEY `fk_Awardid_Award` (`fk_Awardid_Award`);
  
      ALTER TABLE `nomination`
  MODIFY `id_Nomination` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`Personal_No`),
  ADD KEY `has1` (`fk_NationalityISO`);

--
-- Indexes for table `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`id_Profession`);
  
        ALTER TABLE `profession`
  MODIFY `id_Profession` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_Rating`),
  ADD UNIQUE KEY `fk_Movieid_Movie` (`fk_Movieid_Movie`);
  
          ALTER TABLE `rating`
  MODIFY `id_Rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_Review`),
  ADD UNIQUE KEY `fk_Movieid_Movie` (`fk_Movieid_Movie`);
  
            ALTER TABLE `review`
  MODIFY `id_Review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Indexes for table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`id_Studio`),
  ADD KEY `has7` (`fk_Movieid_Movie`);
  
              ALTER TABLE `studio`
  MODIFY `id_Studio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


--
-- Apribojimai eksportuotom lentelėm
--

--
-- Apribojimai lentelei `award`
--
ALTER TABLE `award`
  ADD CONSTRAINT `award_ibfk_1` FOREIGN KEY (`Type`) REFERENCES `award_types` (`id_Award_types`),
  ADD CONSTRAINT `has2` FOREIGN KEY (`fk_Movieid_Movie`) REFERENCES `movie` (`id_Movie`);

--
-- Apribojimai lentelei `has_movie`
--
ALTER TABLE `has_movie`
  ADD CONSTRAINT `has3` FOREIGN KEY (`fk_Movieid_Movie`) REFERENCES `movie` (`id_Movie`),
  ADD CONSTRAINT `has_movie_ibfk_1` FOREIGN KEY (`fk_PersonPersonal_No`) REFERENCES `person` (`Personal_No`);

--
-- Apribojimai lentelei `has_person`
--
ALTER TABLE `has_person`
  ADD CONSTRAINT `has4` FOREIGN KEY (`fk_Professionid_Profession`) REFERENCES `profession` (`id_Profession`),
  ADD CONSTRAINT `has_person_ibfk_1` FOREIGN KEY (`fk_PersonPersonal_No`) REFERENCES `person` (`Personal_No`);

--
-- Apribojimai lentelei `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`Genre`) REFERENCES `movie_genres` (`id_Movie_genres`);

--
-- Apribojimai lentelei `nomination`
--
ALTER TABLE `nomination`
  ADD CONSTRAINT `has8` FOREIGN KEY (`fk_Awardid_Award`) REFERENCES `award` (`id_Award`);

--
-- Apribojimai lentelei `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `has1` FOREIGN KEY (`fk_NationalityISO`) REFERENCES `nationality` (`ISO`);

--
-- Apribojimai lentelei `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `has5` FOREIGN KEY (`fk_Movieid_Movie`) REFERENCES `movie` (`id_Movie`);

--
-- Apribojimai lentelei `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `has6` FOREIGN KEY (`fk_Movieid_Movie`) REFERENCES `movie` (`id_Movie`);

--
-- Apribojimai lentelei `studio`
--
ALTER TABLE `studio`
  ADD CONSTRAINT `has7` FOREIGN KEY (`fk_Movieid_Movie`) REFERENCES `movie` (`id_Movie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
