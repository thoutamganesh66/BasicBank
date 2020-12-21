SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;

-- Table structure for table `transaction`

CREATE TABLE `transaction` (
  `sno` int(3) NOT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `amount` int(8) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `members`

CREATE TABLE `members` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `amount` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `members` (`id`, `name`, `email`, `amount`) VALUES
(1, 'Ganesh', 'ganesh12@gmail.com', 99760),
(2, 'john', 'john44@gmail.com', 2240),
(3, 'ram', 'ram200@gmail.com', 6640),
(4, 'rohan', 'rohan2@gmail.com', 77020),
(5, 'ajay', 'ajay3@yahoo.com', 17960),
(6, 'vamshi', 'vamshi99@gmail.com', 77000),
(7, 'varun', 'varun123@gmail.com', 33000),
(8, 'yash', 'yash51@yahoo.com', 6600),
(9, 'saikumar', 'saikumar@gmail.com', 20000),
(10, 'nandu', 'nandu22@gmail.com', 30000);

-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `members`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;
