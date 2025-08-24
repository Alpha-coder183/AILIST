-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2025 at 01:45 PM
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
-- Database: `ailist`
--

-- --------------------------------------------------------

--
-- Table structure for table `allai`
--

CREATE TABLE `allai` (
  `name` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `tags` text NOT NULL,
  `rating` decimal(2,1) DEFAULT NULL CHECK (`rating` >= 1.0 and `rating` <= 5.0),
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `usage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allai`
--

INSERT INTO `allai` (`name`, `link`, `tags`, `rating`, `email`, `username`, `password`, `usage`) VALUES
('adobe podcast', 'https://podcast.adobe.com/enhance', 'music cleaner audio cleaner sound cleaner', 3.0, 'dassreejit03@gmail.com', 'Sreejit', 'NIL', 'music cleaner audio cleaner sound cleaner'),
('AI Exploria', 'https://www.aixploria.com/en/', 'all ai-detector, dictionary ai-finder', 3.0, 'NIL@gmail.com', 'NIL', 'NIL', 'To find ai and detect them'),
('All AI', 'https://www.futurepedia.io/ai-tools', 'ai finder', 3.8, 'sree18032003@gmail.com', 'Sreejit', 'NIL', 'finding ai tools'),
('beatoven', 'https://sync.beatoven.ai/welcome', 'music generator', 3.6, 'dassreejit03@gmail.com', 'Sreejit', 'NIL', 'music generator'),
('Chatgpt', 'https://chatgpt.com/', 'all, text-generator, image generator', 5.0, 'noobgetonthedancefloor@gmail.com', 'Sreejit', 'NIL', 'Use it for all the small big thing i do'),
('chatpdf', 'https://www.chatpdf.com/', 'pdf reader pdf ai', 4.9, 'dassreejit03@gmail.com', 'Sreejit', 'NIL', 'pdf reader pdf ai'),
('Clean Voice', 'https://app.cleanvoice.ai/beta', 'voice cleaner audio cleaner music cleaner', 3.6, 'dassreejit03@gmail.com', 'Sreejit', 'Sreejit@18032003', 'voice cleaner audio cleaner music cleaner'),
('cleanup pic', 'https://cleanup.pictures/', 'removing object from pic', 4.6, 'sree18032003@gmail.com', 'Sreejit', 'NIL', 'removing object from pic'),
('copy ai', 'https://app.copy.ai/', 'content writing email writing', 2.5, 'sree18032003@gmail.com', 'Sreejit', 'NIL', 'content writing email writing'),
('facecheck ai', 'https://facecheck.id/', 'face check find people', 4.6, 'sree18032003@gmail.com', 'Sreejit', 'NIL', 'finds people by their face from different website'),
('Gama', 'https://gamma.app/', 'ppt presentation', 4.8, 'dassreejit03@gmail.com', 'Sreejit', 'NIL', 'making power point presentation'),
('Gemini', 'https://gemini.google.com/', 'all text image', 4.7, 'sree18032003@gmail.com', 'Sreejit', 'NIL', 'all rounder'),
('image to text', 'https://www.imagetotext.info/', 'image to text', 4.9, 'sree18032003@gmail.com', 'Sreejit', 'NIL', 'image to text'),
('invideo', 'https://ai.invideo.io/onboard', 'video content creation ', 4.9, 'dassreejit03@gmail.com', 'Sreejit', 'NIL', 'making videos'),
('leiapix-ai', 'https://leiapix-ai.com/', 'image video image_to_video', 3.0, 'sree18032003@gmail.com', 'Sreejit', 'NIL', 'image to 3d image image to 3d video'),
('leonardo', 'https://app.leonardo.ai/', 'image generation', 4.4, 'dassreejit03@gmail.com', 'Sreejit', 'NIL', 'image making'),
('Looka', 'https://looka.com/', 'logo generation', 2.7, 'sree18032003@gmail.com', 'Sreejit@18032003', 'Sreejit@18032003', 'logo making'),
('Luma labs', 'https://lumalabs.ai/dream-machine', 'video, paid frre-image', 3.5, 'sree18032003@gmail.com', 'Sreejit', 'NIL', 'image generation video generation'),
('News api', 'https://newsapi.org/', 'news api', 4.0, 'sree18032003@gmail.com', 'Sreejit', 'Sreejit@18032003', 'news api'),
('perplexity', 'https://www.perplexity.ai/', 'all text generator, content writing', 4.5, 'dassreejit03@gmail.com', 'Sreejit', 'NIL', 'all fields'),
('pica', 'https://www.pica-ai.com/', 'face change image enhance image', 3.7, 'sree18032003@gmail.com', 'Sreejit', 'NIL', 'face changing'),
('Playground Ai', 'https://playgroundai.com/create', 'image generation ai', 3.9, 'dassreejit03@gmail.com', 'Sreejit', 'NIL', 'making images'),
('remove bg', 'https://www.remove.bg/upload', 'background remover image background remover', 4.0, 'sree18032003@gmail.com', 'Sreejit', 'NIL', 'background remover image background remover'),
('Runway', 'https://app.runwayml.com/video-tools/teams/sree18032003/ai-tools/generate', 'video, paid', 1.9, 'sree18032003@gmail.com', 'Sreejit', 'NIL', 'nil'),
('soundraw', 'https://soundraw.io/', 'music generator', 3.9, 'dassreejit03@gmail.com', 'Sreejit', 'NIL', 'music generator'),
('Step AI', 'https://yuewen.cn/videos?side-bar=my-videos', 'video video-generator', 2.0, 'dassree03@gmail.com', 'Sreejit', 'NIL', 'video generator'),
('stockimg', 'https://stockimg.ai/home', 'image image generator', 3.0, 'dassreejit03@gmail.com', 'Sreejit', 'NIL', 'image image generator'),
('virality', 'https://viralityai.net/', 'keyword-search trend-search', 2.8, 'sree18032003@gmail.com', 'Sreejit', 'NIL', 'used to find keywords and trends in insta'),
('wolfarmalpha', 'https://developer.wolframalpha.com/access', 'api for defination maths', 4.0, 'sree18032003@gmail.com', 'Sreejit', 'Sreejit@18032003', 'api for defination maths'),
('Write Sonic', 'https://app.writesonic.com/', 'writing content-writing', 3.8, 'dassreejit03@gmail.com', 'Sreejit', 'NIL', 'writing content');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allai`
--
ALTER TABLE `allai`
  ADD PRIMARY KEY (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
