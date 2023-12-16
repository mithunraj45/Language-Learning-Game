-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 08:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lang_learn_quiz_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_email` varchar(20) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Mithun ', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `lang_table`
--

CREATE TABLE `lang_table` (
  `lang_id` int(11) NOT NULL,
  `lang_name` varchar(255) NOT NULL,
  `lang_info` varchar(255) NOT NULL,
  `lang_image` varchar(255) NOT NULL,
  `lang_instructions` varchar(1000) NOT NULL,
  `lang_links` varchar(255) NOT NULL,
  `lang_training_data` varchar(1000) NOT NULL,
  `lang_duration` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lang_table`
--

INSERT INTO `lang_table` (`lang_id`, `lang_name`, `lang_info`, `lang_image`, `lang_instructions`, `lang_links`, `lang_training_data`, `lang_duration`) VALUES
(1, 'हिंदी', 'Hindi is widely written, spoken and understood in North India and some other places in India. In 1997, a survey found that 45% of Indians can speak Hindi. It has taken words from the Dravidian languages of South India, as well as the Arabic, Persian, Chag', 'hindi.png', '', '', '', '8 Hours'),
(2, 'ಕನ್ನಡ', 'The Kannada language is written using the Kannada script, which evolved from the 5th-century Kadamba script. Kannada is attested epigraphically for about one and a half millennia and literary Old Kannada flourished in the 6th-century Ganga dynasty[', 'kannada.png', '<p class=\"align-justify\"> •	ಈ ಪ್ರಶ್ನೆಗಳಿಗೆ ಉತ್ತರಿಸಲು ಒಂದು ಸರಿಯಾದ ಉತ್ತರನ್ನು ಆಯ್ಕೆಮಾಡಿ. ಯಾವುದೇ ಸಂದರ್ಭದಲ್ಲಿ, ಒಂದು ಮಾತ್ರ ಸರಿಯಾದ ಉತ್ತರನ್ನು ಆಯ್ಕೆಮಾಡಿ.<br> •	ಉತ್ತರ ಹೊಂದಿದ ನಂತರ ನಿಮ್ಮ ಉತ್ತರವನ್ನು ಮಾಡಿದ ಪ್ರಶ್ನೆಗೆ ಹೊಂದಿದ್ದೇನೆ ಎಂದು ಖಚಿತಪಡಿಸಿ.<br> •	ಪ್ರತಿ ಪ್ರಶ್ನೆಗೆ ಬಹುಮಾನ ನೀಡಲು ಮೊದಲು ಅವುಗಳನ್ನು ಸರಿಯಾಗಿ ಪೂರ್ಣಗೊಳಿಸಿ.<br> •	ನಿಮ್ಮ ಉತ್ತರಗಳನ್ನು ತಿಳಿಸಲು ಮೇಲಿನ ಕೆಳಗಿನ ಬಾಕ್ಸ್ ಅನ್ನು ಬಳಸಿ.<br> •	ಕಡೆಯಲ್ಲಿ ಎಲ್ಲಾ ಪ್ರಶ್ನೆಗಳನ್ನು ಪೂರ್ಣಗೊಳಿಸಿ ಮತ್ತು ಸಂತೋಷದಿಂದ ಮುಗಿಸಿ.<br>  </p>', 'https://youtube.com/embed/YNpzYTyI-vM?si=IZoTJ9Q0hQyBz7UJ', '<p class=\"align-justify\">Fallow below links to learn the grammer<br>   •<a href=\"https://kannadawords.com/kannada-sandhigalu/\">ಸಂಧಿಗಳು </a><br>   •<a href=\"https://kannadawords.com/samasagalu-in-kannada/ \"> ಸಮಾಸ</a><br>   •<a href=\"https://kannadawords.com/alankaragalu-in-kannada/”> ಅಲಂಕಾರಗಳು </a><br>   •<a href=\"https://kannadawords.com/kalagalu-in-kannada/ \">ಕಾಲಗಳು</a><br>   </p>', '10 Hours'),
(3, 'English', 'English is a West Germanic language in the Indo-European language family, whose speakers, called Anglophones, originated in early medieval England.[4][5][6] The namesake of the language is the Angles, one of the ancient Germanic peoples that migrated to t', 'english.png', '<p class=\"align-justify\">1. Go Through all the provide website links for learning.<br>\n2. Fallow the below vedio link for better understanding.<br>\n3. Once you start the traing to complete uou need to <b> spend at least minimum duration </b> on provide study material.<br>\n4. Once the training is completed ,you can start with the <b> quiz </b> for improving the understanding. </p>', 'https://www.youtube.com/embed/6BzeqN5NrzA', '<p class=\"align-justify\">Fallow below links to learn the grammer<br>  •	<a href=\"https://www.englishgrammar101.com/module-1/nouns/lesson-1/what-is-a-noun\">Noun</a><br>  •	<a href=\"https://www.berlitz.com/blog/english-pronouns-grammar\">Pronoun</a><br> •	<a href=\"https://www.niu.edu/writingtutorial/grammar/adjective-or-adverb.shtml#:~:text=An%20adjective%20is%20a%20part,at%20the%20end%20of%20it.\">Adjective</a><br>  •	<a href=\"https://www.englishpage.com/verbpage/verbtenseintro.html\">Verb</a><br>  •	<a href=\"https://www.voices.com/help/beginners-guide-to-voice-acting\">Voices</a><br>  •	<a href=\"https://study.com/academy/lesson/figure-of-speech-definition-types-examples.html#:~:text=Figures%20of%20speech%20are%20a,%2C%20understatement%2C%20paradox%20and%20oxymoron.\">Figure of Speech</a><br>  </p>', '8 Hours'),
(4, 'தமிழ்', 'Tamil ( Tamil language ) is the mother tongue of Tamils ​​and many Tamil speakers. Tamil is one of the leading languages ​​in the world and also classical . Tamil is widely spoken in countries like India , Sri Lanka , Malaysia , and Singapore , and to a l', 'tamil.png', '', '', '', '7 Hours'),
(5, 'తెలుగు', 'Telugu (/ˈtɛlʊɡuː/;[5] తెలుగు, Telugu pronunciation: [ˈt̪eluɡu]) is a Dravidian language native to the Indian states of Andhra Pradesh and Telangana, where it is also the official language. Spoken by about 96 million people (2022),[6] Telugu is the most w', 'telugu.png', '', '', '', '7 Hours');

-- --------------------------------------------------------

--
-- Table structure for table `level_table`
--

CREATE TABLE `level_table` (
  `level_id` int(100) NOT NULL,
  `level_name` varchar(255) NOT NULL,
  `level_limit_question` int(100) NOT NULL,
  `level_time` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level_table`
--

INSERT INTO `level_table` (`level_id`, `level_name`, `level_limit_question`, `level_time`) VALUES
(1, 'Basic', 5, 10),
(2, 'Easy', 3, 20),
(3, 'Modrate', 3, 30),
(4, 'Complex', 3, 40),
(5, 'Hard', 3, 50);

-- --------------------------------------------------------

--
-- Table structure for table `option_table`
--

CREATE TABLE `option_table` (
  `option_id` int(11) NOT NULL,
  `question_id` int(100) DEFAULT NULL,
  `option_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `option_table`
--

INSERT INTO `option_table` (`option_id`, `question_id`, `option_name`) VALUES
(1, 1, '26'),
(2, 1, '25'),
(3, 1, '11'),
(4, 1, '23'),
(5, 2, '3'),
(6, 2, '4'),
(7, 2, '5'),
(8, 2, '6'),
(9, 3, '11'),
(10, 3, '21'),
(11, 3, '22'),
(12, 3, '12'),
(13, 4, 'A,AN,THE'),
(14, 4, 'DO,DID,DOES'),
(15, 4, 'HAVE,HAD,HAS'),
(16, 4, 'None of the above'),
(17, 5, 'Slide'),
(18, 5, 'Down'),
(19, 5, 'Narrow'),
(20, 5, 'Slide'),
(21, 6, 'DOWN'),
(22, 6, 'RAISE'),
(23, 6, 'STAND'),
(24, 6, 'SIT'),
(25, 7, 'Give'),
(26, 7, 'Steel'),
(27, 7, 'Borrow'),
(28, 7, 'Noneof the above'),
(29, 8, 'I like pizza and hamburgers'),
(30, 8, ' I like pizza, and hamburgers'),
(31, 8, 'I like pizza and hamburgers.'),
(32, 8, ' I like pizza and, hamburgers'),
(33, 9, 'Go'),
(34, 9, 'Goes'),
(35, 9, 'Gone'),
(36, 9, 'Going'),
(37, 10, 'They\'re going to the park with their friends.'),
(38, 10, 'There going to the park with they\'re friends.'),
(39, 10, 'Their going to the park with friends.'),
(40, 10, 'Theyre going to the park with their friends.'),
(41, 11, 'The cat quickly climbed the tree.'),
(42, 11, 'Climbed quickly the tree cat.'),
(43, 11, 'Quickly climbed the cat tree.'),
(44, 11, 'Climbed cat the quickly tree.'),
(45, 12, 'The ubiquitous sunset painted the sky in hues of orange.'),
(46, 12, 'She ubiquitously walked through the park.'),
(47, 12, 'Ubiquitous, the sky displayed its vibrant colors.'),
(48, 12, 'He ubiquitied his presence at the event.'),
(49, 13, 'Lasting for a very short time'),
(50, 13, 'Extremely large or massive'),
(51, 13, 'In a state of confusion or disorder'),
(52, 13, 'Having a strong and pleasant fragrance'),
(53, 14, 'If I was you, I would take the job.'),
(54, 14, 'If I were you, I would take the job.'),
(55, 14, 'If I am you, I will take the job.'),
(56, 14, 'If I would be you, I will take the job.'),
(57, 15, 'She almost completed the assignment quickly'),
(58, 15, 'She completed quickly almost the assignment.'),
(59, 15, 'She completed the assignment almost quickly.'),
(60, 15, 'Quickly, she almost completed the assignment.'),
(61, 16, 'The three items on her shopping list were: milk, bread and, eggs'),
(62, 16, 'He had three goals in mind; success, happiness, and wealth.'),
(63, 16, 'A few of his favorite hobbies include: playing guitar, swimming, and, reading.'),
(64, 16, ' In the garden, she planted: roses, tulips, and daisies.'),
(65, 17, 'ದೇಶ'),
(66, 17, 'ಹಳ್ಳಿ'),
(67, 17, 'ವಿದ್ಯಾರ್ಥಿ'),
(68, 17, 'ಪವ೯ತ'),
(69, 18, '09 '),
(70, 18, '25'),
(71, 18, '34'),
(72, 18, '49'),
(73, 19, 'ಹರಸ್ತ್ವ ಸ್ತ್ವರ'),
(74, 19, 'ದಿೇಘುಸ್ತ್ವರ'),
(75, 19, 'ಅಲಿ ಪಾರಣ'),
(76, 19, 'ಮಹಾಪಾರಣ '),
(77, 20, 'ಧಾತು'),
(78, 20, 'ಅರ್ಯಯ'),
(79, 20, 'ಪ್ರತಯಯ'),
(80, 20, 'ನಾಮಪ್ರಕತಿ '),
(81, 21, 'ಉತು '),
(82, 21, 'ಆನ '),
(83, 21, 'ಓದು'),
(84, 21, 'ಓದುತ್ಾ'),
(85, 22, 'ರ್ತುಮಾನ್'),
(86, 22, 'ಭ ತ'),
(87, 22, 'ಭವಿಷಯತ್'),
(88, 22, 'ಯಾರ್ುದ  ಅಲಿ '),
(90, 23, 'ಪ್ರಶ್ಾನಥುಕ'),
(91, 23, 'ಭಾರ್ಸ್ತ್ ಚಕ'),
(92, 23, 'ಆರ್ರಣ '),
(93, 23, 'ಅಧುವಿರಾಮ'),
(94, 24, 'ಪ್ರಶ್ಾನಥುಕ'),
(95, 24, 'ಭಾರ್ಸ್ತ್ ಚಕ'),
(96, 24, 'ಆರ್ರಣ'),
(97, 24, 'ಪ್ೂಣು ವಿರಾಮ '),
(98, 25, 'ಪ್ೂಣು ವಿರಾಮ'),
(99, 25, 'ಅಧುವಿರಾಮ'),
(100, 25, 'ಅಲಿವಿರಾಮ'),
(101, 25, 'ವಿರ್ರಣ'),
(102, 28, 'ಯಾಗ '),
(103, 28, 'ಜುಗ'),
(104, 28, 'ಜ  ೇಗ '),
(105, 28, 'ಯೇಗ'),
(106, 26, 'ಭಾರ್ಸ್ತ್ ಚಕ ಅರ್ಯಯ'),
(107, 26, 'ಸ್ತ್ಂಬಂಧಾಥುಕ ಅರ್ಯಯ'),
(108, 26, 'ಸಾಮಾನಾಯರ್ಯಯ'),
(109, 26, 'ಅನ್ುಕರಣಾರ್ಯಯ'),
(110, 27, 'ತಧಿಿತ್ಾಂತ '),
(111, 27, 'ಕೃದಂತ ಪ್ದ'),
(112, 27, 'ತದಿಧತ್ಾಂತ ಭಾರ್ನಾಮ'),
(113, 27, 'ಕೃದಂತಭಾರ್ನಾಮ'),
(114, 29, 'ಕನ್ನಡಿ ಯಾಕ '),
(115, 29, 'ಗಿಡದ ಮ ಲ್ಲಕ '),
(116, 29, 'ಔಷಧ ಯಾಕ'),
(117, 29, ' ಔಷಧ ಬ್ ೇಕ'),
(118, 30, 'ಕೃತಿ ಲ ೇಸ್ತ್'),
(119, 30, 'ಧರತಿ ಲ ೇಸ್ತ್ು'),
(120, 30, 'ಮ್ನ್ ಲ ೇಸ್ತ್ು'),
(121, 30, 'ಜಗಳ ಲ ೇಸ್ತ್ು'),
(122, 31, 'ಮ್ಲಯ'),
(123, 31, 'ಶ್ಕ್ಷಣ'),
(124, 31, ' ಜ್ಞಾನ್'),
(125, 31, 'ದ ವೇಷ'),
(126, 32, 'ಗಾದ '),
(127, 32, 'ಪ್ರಬಂಧ '),
(128, 32, 'ಪ್ತರ'),
(129, 32, ' ಗಿೇತ್ ');

-- --------------------------------------------------------

--
-- Table structure for table `question_table`
--

CREATE TABLE `question_table` (
  `question_id` int(100) NOT NULL,
  `question_name` varchar(255) NOT NULL,
  `question_answer` int(100) DEFAULT NULL,
  `question_level` int(100) DEFAULT NULL,
  `question_lang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_table`
--

INSERT INTO `question_table` (`question_id`, `question_name`, `question_answer`, `question_level`, `question_lang`) VALUES
(1, 'How many letters are there in English Alphabet?', 1, 1, 3),
(2, 'How many ovels are there in alphabets?', 7, 1, 3),
(3, 'How many Consonats are there ?', 10, 1, 3),
(4, 'Name the types of articels ?', 13, 1, 3),
(5, 'What is the opposite of Up ?', 18, 2, 3),
(6, 'What is the similar word of UP ?', 23, 2, 3),
(7, 'What is the opposite of throw ?', 25, 2, 3),
(8, 'Choose the sentence with the correct punctuation:', 29, 3, 3),
(9, 'Identify the correct form of the verb in the sentence: She ____ to the store yesterday.', 33, 3, 3),
(10, 'Select the sentence with the correct use of the word their:', 39, 3, 3),
(11, 'Choose the correct sentence structure:', 41, 4, 3),
(12, 'Identify the correct usage of the word ubiquitous in a sentence:', 45, 4, 3),
(13, 'What is the correct definition of the word ephemeral?', 49, 4, 3),
(14, 'Identify the correct sentence that uses the subjunctive mood:', 54, 5, 3),
(15, 'Choose the sentence with the correct placement of adverbs:', 57, 5, 3),
(16, 'Select the sentence with the appropriate use of the colon:', 62, 5, 3),
(17, 'ಈ ಕೆಳಗಿವುಗಳಲ್ಲಿ ಯಾವುದು ಅನ್ವಥ೯ಕನಾಮಪದ', 65, 1, 2),
(18, 'ಕನ್ನಡ ರ್ಣುಮಾಲ ಯಲ್ಲಿರುರ್ ಒಟುಟ ಅಕ್ಷರಗಳ ಸ್ತ್ಂಖ ಯ ', 72, 1, 2),
(19, 'ಎರಡು ಮಾತ್ಾರ ಕಾಲದಲ್ಲಿ ಉಚಚರಿಸ್ತ್ಲಿಡುರ್ ಸ್ತ್ವರಾಕ್ಷರಗಳನ್ುನ ಹಿೇಗ ನ್ುನರ್ರು ', 74, 1, 2),
(20, 'ಕಿರಯಾಪ್ದದ ಮ ಲರ ಪ್ ', 77, 2, 2),
(21, 'ಓದುತ್ಾುನ   ಈ ಕಿರಯಾಪ್ದದಲ್ಲಿರುರ್ ಧಾತು ', 83, 2, 2),
(22, 'ಗಮನಿಸ್ತ್ುರ್ರು ಈ ಕಿರಯಾಪ್ದದ ಕಾಲರ ಪ್ ', 87, 2, 2),
(23, 'ಹಷು,ದುುಃರ್,ವಿಷಾದ ಮುಂತ್ಾದ ಭಾರ್ನ ಗಳನ್ುನ ಸ್ತ್ ಚಿಸ್ತ್ುರ್ ಪ್ದಗಳ ಮುಂದ  ಈ ಚಿಹ ನ ಬಳಸ್ತ್ಲಾಗುತುದ  ', 91, 3, 2),
(24, ' ಒಂದು ಪ್ೂಣು ಕಿರಯಯಂದ ಕ ಡಿದ ವಾಕಯದ ಕ  ನ ಯಲ್ಲಿ ಬಳಸ್ತ್ುರ್ ಚಿಹ ನ ', 97, 3, 2),
(25, 'ಅನ ೇಕ ಉಪ್ವಾಕಯಗಳು ಒಂದು ಪ್ರಧಾನ್ವಾಕಯಕ ಿ ಅಧಿೇನ್ವಾಗಿದಾುಗ ಉಪ್ವಾಕಯಗಳು ಮುಗಿದಾಗಲ ಲಾಿ ಬಳಸ್ತ್ುರ್ ಚಿಹ ನ ', 99, 3, 2),
(26, 'ಎರಡು ಪ್ದಗಳನಾನಗಲ್ಲೇ ಅಥವಾ ಹಲರ್ು ಪ್ದ ಸ್ತ್ಮುಚಛಯಗಳನಾನಗಲ್ಲೇ , ವಾಕಯಗಳನಾನಗಲ್ಲೇ ಜ  ೇಡಿಸ್ತ್ುರ್ಂತ ಪ್ದಗಳನ್ುನ ಹಿೇಗ ನ್ುನರ್ರು.', 107, 4, 2),
(27, 'ಕನ್ನಡಿಗ ಈ ಪ್ದರ್ು ', 110, 4, 2),
(28, 'ಯುಗ ಇದರ ತದಭರ್ ರ ಪ್  ', 103, 4, 2),
(29, 'ಅಂಗ ೈ ಹುಣಿುಗ ', 114, 5, 2),
(30, ' ಮಾತಿಗಿಂತ....', 118, 5, 2),
(31, 'ಗಾದ ಗಳಲ್ಲಿ ಈ ಅಂಶವಿರುರ್ುದಿಲಿ ', 125, 5, 2),
(32, 'ಜನ್ರ ಬ್ಾಯಯಂದ ಬ್ಾಯಗ  ಹರಿದು ಬಂದ ಅನ್ುಭರ್ದ ನ್ುಡಿ', 126, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_table`
--

CREATE TABLE `quiz_table` (
  `user_id` int(100) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `level_id` int(100) NOT NULL,
  `marks_got` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_table`
--

INSERT INTO `quiz_table` (`user_id`, `lang_id`, `level_id`, `marks_got`) VALUES
(1, 1, 1, 3),
(1, 1, 2, 3),
(1, 1, 3, 3),
(1, 3, 1, 3),
(1, 3, 2, 2),
(1, 3, 3, 2),
(1, 3, 4, 2),
(1, 3, 5, 3),
(2, 3, 1, 3),
(4, 3, 1, 3),
(4, 3, 2, 2),
(4, 3, 3, 2),
(4, 3, 4, 2),
(4, 3, 5, 2),
(5, 2, 1, 5),
(5, 2, 2, 3),
(5, 2, 3, 2),
(5, 2, 4, 2),
(5, 2, 5, 3),
(5, 3, 1, 3),
(5, 3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `lang_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `level_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`lang_id`, `user_id`, `level_id`) VALUES
(1, 1, 3),
(2, 5, 5),
(3, 1, 5),
(3, 2, 1),
(3, 4, 5),
(3, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_gender` char(1) NOT NULL,
  `user_mobile` bigint(100) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_gender`, `user_mobile`, `user_password`) VALUES
(1, 'Mithun', 'mithun@gmail.com', 'M', 9658741230, '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Lakshmi', 'lakshmi@gmail.com', 'F', 7584692130, '6562c5c1f33db6e05a082a88cddab5ea'),
(3, 'Tharun', 'tharun@gmail.com', 'M', 6587493210, '912e79cd13c64069d91da65d62fbb78c'),
(4, 'Vachan', 'vachan@gmail.com', 'M', 9632541870, '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'Kusuma', 'kusuma@gmail.com', 'F', 8457693210, '6562c5c1f33db6e05a082a88cddab5ea'),
(6, 'Reshma', 'reshma@gmail.com', 'F', 6758941230, '6562c5c1f33db6e05a082a88cddab5ea');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `lang_table`
--
ALTER TABLE `lang_table`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `level_table`
--
ALTER TABLE `level_table`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `option_table`
--
ALTER TABLE `option_table`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `set question` (`question_id`);

--
-- Indexes for table `question_table`
--
ALTER TABLE `question_table`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `language set` (`question_lang`),
  ADD KEY `set level` (`question_level`),
  ADD KEY `set answer` (`question_answer`);

--
-- Indexes for table `quiz_table`
--
ALTER TABLE `quiz_table`
  ADD PRIMARY KEY (`user_id`,`lang_id`,`level_id`),
  ADD KEY `set language` (`lang_id`),
  ADD KEY `set levels` (`level_id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`lang_id`,`user_id`,`level_id`),
  ADD KEY `set users` (`user_id`),
  ADD KEY `set levels for users` (`level_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lang_table`
--
ALTER TABLE `lang_table`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `level_table`
--
ALTER TABLE `level_table`
  MODIFY `level_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `option_table`
--
ALTER TABLE `option_table`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `question_table`
--
ALTER TABLE `question_table`
  MODIFY `question_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `option_table`
--
ALTER TABLE `option_table`
  ADD CONSTRAINT `set question` FOREIGN KEY (`question_id`) REFERENCES `question_table` (`question_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `question_table`
--
ALTER TABLE `question_table`
  ADD CONSTRAINT `language set` FOREIGN KEY (`question_lang`) REFERENCES `lang_table` (`lang_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `set answer` FOREIGN KEY (`question_answer`) REFERENCES `option_table` (`option_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `set level` FOREIGN KEY (`question_level`) REFERENCES `level_table` (`level_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `quiz_table`
--
ALTER TABLE `quiz_table`
  ADD CONSTRAINT `set language` FOREIGN KEY (`lang_id`) REFERENCES `lang_table` (`lang_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `set levels` FOREIGN KEY (`level_id`) REFERENCES `level_table` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `set user` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_level`
--
ALTER TABLE `user_level`
  ADD CONSTRAINT `set lang` FOREIGN KEY (`lang_id`) REFERENCES `lang_table` (`lang_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `set levels for users` FOREIGN KEY (`level_id`) REFERENCES `level_table` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `set users` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
