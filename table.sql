--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `sit` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id`, `sit`, `title`, `note`, `date`, `time`) VALUES
(1, 1, 'Study English', 'Study and practice English everyday.', '2018-04-30', '03:30'),
(2, 0, 'Study IELTS', 'Study for IELTS exam and be ready', '2018-05-10', '02:30'),
(3, 1, 'Appointment', 'Appointment with a dentist.', '2018-04-29', '17:00'),
(4, 0, 'Last day', 'Last day in Charlotte.', '2018-04-30', '20:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;