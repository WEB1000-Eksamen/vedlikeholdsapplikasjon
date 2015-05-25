--
-- Tabellstruktur for tabell `bilde`
--

CREATE TABLE IF NOT EXISTS `bilde` (
`bildenr` int(11) NOT NULL,
  `opplastingsdato` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `filnavn` varchar(60) NOT NULL,
  `beskrivelse` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `klasse`
--

CREATE TABLE IF NOT EXISTS `klasse` (
  `klassekode` char(50) NOT NULL,
  `klassenavn` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `brukernavn` char(50) NOT NULL,
  `fornavn` text NOT NULL,
  `etternavn` text NOT NULL,
  `klassekode` char(50) NOT NULL,
  `bildenr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`userid` bigint(20) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateddate` timestamp NULL,
  `lastlogin` timestamp NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bilde`
--
ALTER TABLE `bilde`
 ADD PRIMARY KEY (`bildenr`);

--
-- Indexes for table `klasse`
--
ALTER TABLE `klasse`
 ADD PRIMARY KEY (`klassekode`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`brukernavn`), ADD KEY `klassekode` (`klassekode`), ADD KEY `bildenr` (`bildenr`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bilde`
--
ALTER TABLE `bilde`
MODIFY `bildenr` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `userid` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`klassekode`) REFERENCES `klasse` (`klassekode`);
