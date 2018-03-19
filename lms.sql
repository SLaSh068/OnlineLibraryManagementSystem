--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tab`
--

CREATE TABLE `admin_tab` (
  `users_id` int(11) NOT NULL,
  `users_fname` varchar(255) NOT NULL,
  `users_lname` varchar(255) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `users_pwd` varchar(255) NOT NULL,
  `users_jd` varchar(255) NOT NULL,
  `cl` varchar(255) NOT NULL,
  `ai` varchar(255) NOT NULL,
  `sec_ques` varchar(255) NOT NULL,
  `users_dp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tab`
--

INSERT INTO `admin_tab` (`users_id`, `users_fname`, `users_lname`, `users_email`, `users_pwd`, `users_jd`, `cl`, `ai`, `sec_ques`, `users_dp`) VALUES
(6, 'Sukhy', 'Singh', 'sukhy94@gmail.com', '123456', '28/07/2016', '', '', '', ''),
(8, 'Sam', 'Ghosh', 'ghoshsam37@gmail.com', '155b90f5f35f4b56617573b1173ac58d', '30/07/2016', 'India', 'MBA', 'Sultan', 'image/PicsArt_1459266330136.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `books_tab`
--

CREATE TABLE `books_tab` (
  `books_id` int(11) NOT NULL,
  `books_name` varchar(255) NOT NULL,
  `books_author` varchar(255) NOT NULL,
  `books_category` varchar(255) NOT NULL,
  `ISBN` varchar(11) NOT NULL,
  `availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_tab`
--

INSERT INTO `books_tab` (`books_id`, `books_name`, `books_author`, `books_category`, `ISBN`, `availability`) VALUES
(1, 'WBUT Organiser', 'WBUT Organiser', 'Entrance', '111', 1),
(2, 'Macbeth', 'William Shakespeare', 'Literature', '222', 1),
(4, 'Slash', 'Slash', 'Biographies', '444', 1),
(5, 'Chota Bheem', 'POGO', 'Children', '555', 1),
(7, 'Spiderman', 'Stan Lee', 'Comic', '777', 1),
(8, '2 States', 'Chetan Bhagat', 'Fiction', '888', 1),
(9, 'Iron Man', 'Stan Lee', 'Comic', '101', 1),
(10, 'Shiver', 'Maggie Steifvater', 'Fiction', '102', 0),
(11, 'The Avengers', 'Stan Lee', 'Comic', '54', 1),
(23, 'alladin', 'Disney', 'Comics', '433', 1),
(24, 'half girlfriend', 'chetan bhagat', 'Fiction', '742', 1),
(25, 'abc', 'def', 'self help', '940', 0),
(26, 'MK', 'xyz', 'self help', '305', 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_register`
--

CREATE TABLE `book_register` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `doi` varchar(255) NOT NULL,
  `dor` varchar(255) NOT NULL,
  `books_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_register`
--

INSERT INTO `book_register` (`id`, `book_name`, `user_email`, `doi`, `dor`, `books_category`) VALUES
(4, 'abc', 'sayakchatterjee@gmail.com', '30/07/2016', '13/08/2016', 'self help'),
(5, 'MK', 'sayakchatterjee@gmail.com', '30/07/2016', '13/08/2016', 'self help');

-- --------------------------------------------------------

--
-- Table structure for table `cat_tab`
--

CREATE TABLE `cat_tab` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_tab`
--

INSERT INTO `cat_tab` (`cat_id`, `cat_name`) VALUES
(1, 'Entrance'),
(2, 'Academic'),
(3, 'Literature'),
(5, 'Politics'),
(6, 'Biographies'),
(7, 'Children'),
(8, 'Business'),
(10, 'Comic'),
(12, 'Fiction'),
(13, 'self help');

-- --------------------------------------------------------

--
-- Table structure for table `users_tab`
--

CREATE TABLE `users_tab` (
  `users_id` int(11) NOT NULL,
  `users_fname` varchar(255) NOT NULL,
  `users_lname` varchar(255) NOT NULL,
  `users_con` int(10) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `users_pwd` varchar(255) NOT NULL,
  `users_jd` varchar(255) NOT NULL,
  `cl` varchar(255) NOT NULL,
  `ai` varchar(255) NOT NULL,
  `sec_ques` varchar(255) NOT NULL,
  `users_dp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tab`
--

INSERT INTO `users_tab` (`users_id`, `users_fname`, `users_lname`, `users_con`, `users_email`, `users_pwd`, `users_jd`, `cl`, `ai`, `sec_ques`, `users_dp`) VALUES
(1, 'Reetam', 'Chatterjee', 0, 'rtm619@gmail.com', 'beeac7b932b2d5e23b905c5e6aa5614d', '22/07/2016', 'Australia', 'Arts', 'Sherlock Holmes', 'image/PicsArt_1445179265175.jpg'),
(2, 'ani', 'ap', 0, 'anipd108', 'e0c132801f0ec1bc64b59ee6669935aa', '22/07/2016', '', '', '', ''),
(7, 'sambuddha', 'p', 1234567892, 'sam.ghosh3', '9af82031d374b97c9e73132a413cbdf5', '30/07/2016', '', '', '', ''),
(8, 'john', 'doe', 1234567654, 'johndoe', '5844a15e76563fedd11840fd6f40ea7b', '30/07/2016', '', '', '', ''),
(11, 'suprakash', 'basu', 2147483647, 'sbasu253', '40e09b21781dc2ac1ad4942022e32c04', '30/07/2016', '', '', '', ''),
(14, 'sankar', 'ghosh', 2147483647, 'ghoshsankar', 'f25afb04f161aeb3f22e631959b43a42', '30/07/2016', '', '', '', ''),
(15, 'abc', 'def', 1234567876, 'abcdef', 'e80b5017098950fc58aad83c8c14978e', '30/07/2016', '', '', '', ''),
(16, 'kaustav', 'karmakar', 1234567890, 'kkc', 'be92d127746dc9a42a7181595678c7de', '30/07/2016', '', '', '', ''),
(17, 'Harprit', 'Kaur', 2147483647, 'harpritkaur', '56ab24c15b72a457069c5ea42fcfc640', '30/07/2016', '', '', '', ''),
(18, 'suvo', 'das', 2147483647, 'suvopd', '52878780f6a57fa17dd9d66d50eef782', '30/07/2016', '', '', '', ''),
(19, 'sayak', 'chatterjee', 2147483647, 'sayakchatterjee@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '30/07/2016', 'India', 'MBA', '', 'image/PicsArt_1455196095523.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tab`
--
ALTER TABLE `admin_tab`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `users_email` (`users_email`);

--
-- Indexes for table `books_tab`
--
ALTER TABLE `books_tab`
  ADD PRIMARY KEY (`books_id`),
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- Indexes for table `book_register`
--
ALTER TABLE `book_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_tab`
--
ALTER TABLE `cat_tab`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `users_tab`
--
ALTER TABLE `users_tab`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `users_email` (`users_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tab`
--
ALTER TABLE `admin_tab`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `books_tab`
--
ALTER TABLE `books_tab`
  MODIFY `books_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `book_register`
--
ALTER TABLE `book_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cat_tab`
--
ALTER TABLE `cat_tab`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users_tab`
--
ALTER TABLE `users_tab`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
