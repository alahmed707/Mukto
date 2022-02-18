-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2022 at 10:41 PM
-- Server version: 10.5.13-MariaDB-log
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muktooxy_muktoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Administrator',
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `role`, `photo`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Numan', 'numan@mukto.com', '34553442334', 'administrator', '15818367691558707029staff.jpg', '$2a$12$QwDGpJouk1GLkRzbEvjKCOYMQZfQT.qSC8CYjVwX9NHuY8VMnkiCC', 1, 'aRiTjEfkcEBRFPCt4OwZxkQ6Vg0cBP6xtcQwwALhxmM0nMIYBNinSpI2I6Uf', '2018-02-27 23:27:08', '2021-12-17 05:37:31'),
(7, 'Al-Amin', 'alamin@mukto.com', '22222222', 'administrator', '1639741026IMG_1052.JPG', '$2y$10$kLkUsIkAV.qNbOavI6.Kb./6HcNFXmEjiC7dJozkVLKhQ5vihXFVu', 1, 'ekUj6IbyurYDhWazVPhj8Y34VDEUwF0D3NxfKmM7gBIp5T4DuXjmpPAxHfwU', '2021-12-17 05:37:06', '2021-12-17 05:37:06'),
(8, 'Jisan', 'jisan@mukto.com', '4720935724', 'staff', NULL, '$2y$10$lm.ILER6/EftZ45bNBJEuu.wnyTM/Yv4ONoXkCJxOe/8x8NSaeyAy', 1, NULL, '2021-12-24 00:25:17', '2021-12-24 00:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `admin_languages`
--

CREATE TABLE `admin_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT 0,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rtl` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_languages`
--

INSERT INTO `admin_languages` (`id`, `name`, `is_default`, `language`, `file`, `rtl`, `created_at`, `updated_at`) VALUES
(1, '1618197897uah797pe', 1, 'English', '1618197897uah797pe.json', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_conversations`
--

CREATE TABLE `admin_user_conversations` (
  `id` int(191) NOT NULL,
  `subject` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(191) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user_conversations`
--

INSERT INTO `admin_user_conversations` (`id`, `subject`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(5, 'dghsagdhg', 1, 'hsaaghfdhajshj', '2021-04-15 15:36:58', '2021-04-15 15:36:58'),
(6, 'fghf', 1, 'hfgdhfd', '2021-04-15 15:38:20', '2021-04-15 15:38:20'),
(7, 'helloo', 1, 'hello', '2021-04-15 15:45:40', '2021-04-15 15:45:40'),
(8, 'test', 5, 'test', '2021-12-17 02:07:53', '2021-12-17 02:07:53'),
(9, 'dsd', 15, 'dsds', '2022-02-13 15:15:33', '2022-02-13 15:15:33'),
(10, 'rtd', 15, 'tr', '2022-02-13 15:24:56', '2022-02-13 15:24:56'),
(11, 'Regarding posted campaign', 6, 'hello!!! \nplease send us the proper documentation of your campaign. We will then approve it.', '2022-02-14 10:28:59', '2022-02-14 10:28:59'),
(12, 'Dns', 15, 'Nssn', '2022-02-14 13:15:43', '2022-02-14 13:15:43'),
(13, 'Regarding Creating campaign', 6, 'How can I create a campaign?', '2022-02-15 04:17:49', '2022-02-15 04:17:49'),
(14, 'Test 14feb', 15, 'Test', '2022-02-15 04:19:28', '2022-02-15 04:19:28'),
(15, 'test', 6, 'test', '2022-02-15 10:07:34', '2022-02-15 10:07:34'),
(16, 'test', 1, 'test', '2022-02-15 10:09:53', '2022-02-15 10:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_messages`
--

CREATE TABLE `admin_user_messages` (
  `id` int(191) NOT NULL,
  `conversation_id` int(191) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user_messages`
--

INSERT INTO `admin_user_messages` (`id`, `conversation_id`, `message`, `user_id`, `created_at`, `updated_at`) VALUES
(9, 5, 'hsaaghfdhajshj', NULL, '2021-04-15 15:36:58', '2021-04-15 15:36:58'),
(10, 6, 'hfgdhfd', NULL, '2021-04-15 15:38:20', '2021-04-15 15:38:20'),
(12, 7, 'hello', NULL, '2021-04-15 15:45:40', '2021-04-15 15:45:40'),
(13, 8, 'test', NULL, '2021-12-17 02:07:53', '2021-12-17 02:07:53'),
(14, 9, 'dsds', NULL, '2022-02-13 15:15:33', '2022-02-13 15:15:33'),
(15, 10, 'tr', NULL, '2022-02-13 15:24:56', '2022-02-13 15:24:56'),
(16, 9, 'fdf', 15, '2022-02-13 15:25:13', '2022-02-13 15:25:13'),
(17, 9, 'hello', NULL, '2022-02-14 10:27:05', NULL),
(18, 11, 'hello!!! \nplease send us the proper documentation of your campaign. We will then approve it.', NULL, '2022-02-14 10:28:59', '2022-02-14 10:28:59'),
(19, 12, 'Nssn', NULL, '2022-02-14 13:15:43', '2022-02-14 13:15:43'),
(20, 13, 'How can I create a campaign?', 6, '2022-02-15 04:17:49', '2022-02-15 04:17:49'),
(21, 14, 'Test', 15, '2022-02-15 04:19:28', '2022-02-15 04:19:28'),
(22, 9, 'M', NULL, '2022-02-15 04:21:39', NULL),
(23, 15, 'test', 6, '2022-02-15 10:07:34', '2022-02-15 10:07:34'),
(24, 16, 'test', NULL, '2022-02-15 10:09:53', '2022-02-15 10:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(191) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `meta_tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `title`, `slug`, `details`, `photo`, `source`, `views`, `status`, `meta_tag`, `meta_description`, `tags`, `created_at`) VALUES
(1, 5, 'Environment Pollution', 'Environment', 'Environmental pollution is not a new phenomenon, yet it remains the world’s greatest problem facing humanity, and the leading environmental causes of morbidity and mortality. Man’s activities through urbanization, industrialization, mining, and exploration are at the forefront of global environmental pollution. Both developed and developing nations share this burden together, though awareness and stricter laws in developed countries have contributed to a larger extent in protecting their environment. Despite the global attention towards pollution, the impact is still being felt due to its severe long-term consequences. This chapter examines the types of pollution—air, water, and soil; the causes and effects of pollution; and proffers solutions in combating pollution for sustainable environment and health.', '1643050985images.jfif', 'https://www.sciencedirect.com/topics/earth-and-planetary-sciences/environmental-pollution', 14, 1, NULL, NULL, 'Environment', '2022-01-24 11:22:21'),
(41, 6, 'Covid-19 tiggers impact on poverty', 'Covid-19 tiggers impact on poverty', '<span style=\"color: rgb(0, 0, 0); font-family: Asar, serif; font-size: 17px; letter-spacing: 1px; background-color: rgb(255, 245, 232);\">The poverty impact of Covid-19 brought unprecedented demand and supply-side shocks on the socio-economic lives of Bangladesh\'s people. The Covid pandemic has significantly eroded the country\'s past rapid success, and it is happening worldwide, regardless of developed or developing countries whatsoever. According to the UNU-WIDER study in April 2020, with a 5.0 per cent contribution to per capita incomes, the world could witness a potential increase in the number of poor people by nearly 85 million living on 1.9 dollars per day relative to the figure in 201-- rising from 759 to 844 million. Of these 85 million, South Asia\'s share will be 45 million. In Bangladesh, significant shocks are emerging from the labour market through large scale job losses. As more than 85 per cent of the labour force work in the informal market, the job losses are mostly hidden. They have necessary implications for aggravating poverty in Bangladesh, both now and in the future. The remittance-receiving poor households in the rural areas have also become more vulnerable due to a sudden fall in remittance incomes. The likely rise in poverty has several implications. No doubt, our long-achieved success in poverty reduction since 1990 is under threat at present. Furthermore, many of poor people who had graduated from extreme poverty in the past and used to live around the poverty line before the pandemic may fall back into poverty or extreme poverty again. Besides, a large part of these ultra-poor people may face long-term deprivation. The aggravated poverty situation may persist for some time in the future, likely to make it difficult for Bangladesh to achieve the sustainable development goals (SDGs) by 2030.</span><br style=\"color: rgb(0, 0, 0); font-family: Asar, serif; font-size: 17px; letter-spacing: 1px; background-color: rgb(255, 245, 232);\"><span style=\"color: rgb(0, 0, 0); font-family: Asar, serif; font-size: 17px; letter-spacing: 1px; background-color: rgb(255, 245, 232);\">At the outbreak of the Covid-19pandemic in March 2020, the whole country went under lockdown with the minimum movement of people other than those who were in emergency services. The death toll went up. It stuck the life suddenly like other parts of the globe. People saw a dismal situation as all hospitals were lacking severe patient care and all sectors\' economic activities almost closed. At that time, so far, the quick policy response of the government covered several areas. A large part of the stimulus package is credit-based through the banking system at a subsidized interest rate and was offered to the RMG sector, agriculture, microfinance, and other affected areas. The social protection coverage had been expanded through food distribution and cash transfer programmes. The critical challenge, however, was to make accurate targeting and effective implementation. Our Prime Minister took quick measures with her prudent knowledge, experience, and foresight. The prime minister continuously held meetings with the Deputy Commissioners of different districts, took updated field-level information about the livelihood of the poor people, and gave instructions to take government supports to the targeted jobless people. Everyone did not know how to handle the situation while consciously, the infected family, once detected, was kept in isolation, having no such experience ever before. At that time, the role of administration was praiseworthy. They cordially helped people with utmost patience and sincerity. So Covid did not impact much in the economy as many expected it to be. Keeping the tolerance level of Covid infection rate and death case in close observation, the government opened up the economy from the lockdown situation gradually to resume economic activities maintaining health and social safety measures.</span><br style=\"color: rgb(0, 0, 0); font-family: Asar, serif; font-size: 17px; letter-spacing: 1px; background-color: rgb(255, 245, 232);\"><span style=\"color: rgb(0, 0, 0); font-family: Asar, serif; font-size: 17px; letter-spacing: 1px; background-color: rgb(255, 245, 232);\">In this context, the NGO-MFIs played a vital role in handling the crisis, which had far-reaching impacts, especially on the poor and vulnerable communities across the country. NGOs carried out relief and rehabilitation programmes among the poor in combating the Covid-19 crisis. Also, many volunteer groups came forward to do the same. They also provided the poor people with hand sanitizer, masks alongside handwashing, and other health safety concerns raising the program. As the government instructed, NGOs suspended the collection of loan instalments. Microfinance borrowers were not put under pressure and on the list of defaulters by lingering the loan maturity period until June 2020. But it was confirmed that many impoverished people who were affected by the Covid-19 could not be reached due to inaccessibility in some areas of NGOs intervention. Following June, NGOs have begun both collection and disbursement of loan operations again. As the infection rate and deaths were constantly skewed down and the situation eased, the microfinance started to get its average pace again. The borrowers of microfinance, however, tried to get resilience. They spontaneously responded to loan operations paying off their previous loans for the sake of reviving their ongoing economic activities. Consequently, the loan collection got a sharp rise and hit the recovery rate of NGO-MFIs shortly, which fell drastically in early April 2020 due to countrywide lockdown.</span><br style=\"color: rgb(0, 0, 0); font-family: Asar, serif; font-size: 17px; letter-spacing: 1px; background-color: rgb(255, 245, 232);\"><span style=\"color: rgb(0, 0, 0); font-family: Asar, serif; font-size: 17px; letter-spacing: 1px; background-color: rgb(255, 245, 232);\">Surprisingly, the second wave of Covid-19 broke out just one year later, in early April 2021.In response, the government went for crackdown on people\'s movement and announced a countrywide lockdown in April 2021. This timely step undertaken by our government has been, in fact, practical to keep both infections and deaths at the tolerable level yet. In contrast, our neighbour India is badly experiencing a massive infection rate and death toll after the second wave of Covid-19 has hit the country. Amid the government restrictions, this time RMGs sector remains open, and shopping malls run following government instructions. No impact is there similar to last year on the rural grassroots level microfinance activities so far. At the onset of the second wave of Covid-19, the microfinance operations came to a halt for a shorter period. But in a few days, it got back to its normal functions keeping flexibility in loan repayment with no undue pressure on borrowers. This time, any significant impacts are yet to notice in the rural sector\'s economy, including microfinance. So, it is not the time to draw an inference about the rural economy. But this time, the new surge of Covid has seemingly impacted urban and semi-urban areas. Pandemic has pushed the low and middle income people down the poverty line. As a result, the new poor have been added mainly from the informal urban service sector comprising small entrepreneurs and unemployed daily wage workers. A recent study of the South Asian Network on Economic Modelling (SANEM) has conducted a survey countrywide and assumed an estimated 42 per cent of people staying under the poverty line, which was 21.6 per cent before the pandemic in 2018. It is assumed that almost 24.5 million people have become new poor by this time, and it may further rise if the pandemic continues with its recent surge.</span><br style=\"color: rgb(0, 0, 0); font-family: Asar, serif; font-size: 17px; letter-spacing: 1px; background-color: rgb(255, 245, 232);\"><span style=\"color: rgb(0, 0, 0); font-family: Asar, serif; font-size: 17px; letter-spacing: 1px; background-color: rgb(255, 245, 232);\">Covid-19 is undoubtedly an eye-opener for Bangladesh since it shows how internal and external shocks could affect the country\'s hard-earned success in poverty reduction over the past decades. What is needed is to emphasize developing the resilience and inherent capacity of the people to cope with Covid-19crises in view of the demand of time.</span><br>', '1644125257food-poor-istock.jpg', 'https://thefinancialexpress.com.bd/views/covid-19-tiggers-impact-on-poverty-1624645283', 11, 1, NULL, NULL, 'Poverty,covid,corona virus', '2022-02-05 23:27:37'),
(43, 10, 'How health aid can reach the world’s poorest people', 'Health.', '<p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 2em; margin-left: 0px; padding: 0px; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word; background-color: rgb(250, 250, 250);\"><font color=\"#101010\" face=\"PT Serif, Times, serif\"><span style=\"font-size: 18px;\">As part of a research project led by Duke University’s Center for Policy Impact in Global Health on disease, demography, development assistance, and domestic finance (the “4Ds”), we analyzed donors’ allocation policies to determine if they reflect subnational poverty trends. The study tried to identify ways health aid funders could adapt their policies and approaches to truly leave no one behind. Six donors were included in the analysis: Gavi, the Vaccine Alliance (Gavi); the Global Fund to Fight AIDS, Tuberculosis and Malaria (the Global Fund); the President’s Emergency Plan for AIDS Relief (PEPFAR); the United States Agency for International Development (USAID); the World Bank’s International Development Association (IDA); and the government of Japan.</span></font></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 2em; margin-left: 0px; padding: 0px; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word; background-color: rgb(250, 250, 250);\"><font color=\"#101010\" face=\"PT Serif, Times, serif\"><span style=\"font-size: 18px;\"><br></span></font></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 2em; margin-left: 0px; padding: 0px; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word; background-color: rgb(250, 250, 250);\"><font color=\"#101010\" face=\"PT Serif, Times, serif\"><span style=\"font-size: 18px;\">DO HEALTH DONORS TARGET SUBNATIONAL POCKETS OF POVERTY?</span></font></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 2em; margin-left: 0px; padding: 0px; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word; background-color: rgb(250, 250, 250);\"><font color=\"#101010\" face=\"PT Serif, Times, serif\"><span style=\"font-size: 18px;\">Our research identified four features of health donors’ allocation policies.</span></font></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 2em; margin-left: 0px; padding: 0px; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word; background-color: rgb(250, 250, 250);\"><font color=\"#101010\" face=\"PT Serif, Times, serif\"><span style=\"font-size: 18px;\"><br></span></font></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 2em; margin-left: 0px; padding: 0px; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word; background-color: rgb(250, 250, 250);\"><font color=\"#101010\" face=\"PT Serif, Times, serif\"><span style=\"font-size: 18px;\">Overreliance on national poverty indicators. All health aid funders rely on national-level economic indicators in their eligibility and/or allocation policies. Only Gavi and IDA explicitly incorporate subnational poverty in their allocation decisions and/or routine monitoring. Yet donors themselves acknowledge the limitations of using national-level economic indicators such as gross national income per capita in health aid allocation decisions.</span></font></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 2em; margin-left: 0px; padding: 0px; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word; background-color: rgb(250, 250, 250);\"><font color=\"#101010\" face=\"PT Serif, Times, serif\"><span style=\"font-size: 18px;\">Focus on key and vulnerable populations. Most health donors, particularly donors that target specific diseases such as HIV and tuberculosis, prioritize epidemic control over poverty elimination. These donors track subnational disease-specific and coverage indicators for populations they consider “key” and “vulnerable.” Donors define these populations by people’s epidemiological risk profile, which may be influenced by factors such as occupation (e.g., sex workers) or social identity (e.g., women and girls). Such populations may be an implied proxy for targeting the poorest people, but donors do not make this link explicit and do not track subnational poverty indicators alongside subnational health indicators.</span></font></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 2em; margin-left: 0px; padding: 0px; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word; background-color: rgb(250, 250, 250);\"><font color=\"#101010\" face=\"PT Serif, Times, serif\"><span style=\"font-size: 18px;\">Hints of future subnational targeting. Three donors—the Global Fund, Gavi, and USAID—intend to introduce “differentiated” and potentially subnational approaches to allocation and programming in their future strategies. Available details suggest, however, that these donors will continue using disease-specific rather than poverty-specific indicators in their subnational allocation and programming approaches.</span></font></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 2em; margin-left: 0px; padding: 0px; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word; background-color: rgb(250, 250, 250);\"><font color=\"#101010\" face=\"PT Serif, Times, serif\"><span style=\"font-size: 18px;\">Health systems strengthening used as a mechanism to reduce poverty. Many donors either channel funds through a “health systems strengthening” (HSS) window or use a cross-cutting HSS approach. The Global Fund, IDA, and USAID all use HSS as an explicit broad strategy to reach the poorest people. Gavi, which does not use HSS as an explicit strategy to reach the poorest people, and the Global Fund both have separate HSS investment windows. Neither donor tracks poverty-specific metrics linked to their HSS portfolios, while HSS investments for both donors comprise a relatively small share of total investments. USAID’s Bureau of Global Health has a standalone Office of Health Systems Strengthening, though it is unclear how this office’s activities are integrated into other bureau programming.</span></font></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 2em; margin-left: 0px; padding: 0px; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word; background-color: rgb(250, 250, 250);\"><font color=\"#101010\" face=\"PT Serif, Times, serif\"><span style=\"font-size: 18px;\">FIVE STEPS TO FULLER PROTECTION</span></font></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 2em; margin-left: 0px; padding: 0px; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word; background-color: rgb(250, 250, 250);\"><font color=\"#101010\" face=\"PT Serif, Times, serif\"><span style=\"font-size: 18px;\">Based on our findings, we highlight five things donors could immediately do to ensure people living in poverty benefit from health aid and are not “left behind,” the core principle guiding the SDGs.</span></font></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 2em; margin-left: 0px; padding: 0px; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word; background-color: rgb(250, 250, 250);\"><font color=\"#101010\" face=\"PT Serif, Times, serif\"><span style=\"font-size: 18px;\"><br></span></font></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 2em; margin-left: 0px; padding: 0px; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word; background-color: rgb(250, 250, 250);\"><font color=\"#101010\" face=\"PT Serif, Times, serif\"><span style=\"font-size: 18px;\">Make poverty elimination a central goal. If donors do not already have a specific focus on poverty elimination in their mandates, donors should embed poverty elimination in service of health outcomes. Donors could use geospatial data sources and methods, consult people living in poverty, and use multiple indicators to assess poverty to deliver on this focus. Countries around the world acknowledge poverty elimination as a central goal and so prioritized it as the as the first SDG. Donors should follow that lead. Furthermore, achieving poverty elimination should include addressing causes of deprivation that abound in subnational pockets of poverty.</span></font></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 2em; margin-left: 0px; padding: 0px; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word; background-color: rgb(250, 250, 250);\"><font color=\"#101010\" face=\"PT Serif, Times, serif\"><span style=\"font-size: 18px;\">Have a clear action plan for vulnerable groups. Donors should develop a clear action plan for targeted population groups and define to whom the action plan applies, how these populations will be reached, and how progress will be determined. Donors should also support data collection efforts for these groups and ensure that representatives of these populations are engaged in a meaningful way in creating action plans. This will require joint programming with in-country policymakers in order to achieve country-ownership and long-term sustainability.</span></font></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 2em; margin-left: 0px; padding: 0px; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word; background-color: rgb(250, 250, 250);\"><font color=\"#101010\" face=\"PT Serif, Times, serif\"><span style=\"font-size: 18px;\">Operationalize knowledge of reality. Expand beyond “value-for-money” approaches that prioritize disease-specific indicators that may inadvertently neglect those most in need to include poverty-specific subnational indicators and approaches. Donors should treat poverty as a complex, multidimensional, and context-dependent social phenomenon that cannot be captured by monetary indicators alone. To do this, donors will need to acknowledge that the “leave no one behind” approach might often be at odds with the “value for money” approach and be prepared to make some hard choices.</span></font></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 2em; margin-left: 0px; padding: 0px; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word; background-color: rgb(250, 250, 250);\"><font color=\"#101010\" face=\"PT Serif, Times, serif\"><span style=\"font-size: 18px;\">Adopt a systems approach. Donors would do better if they mainstreamed “systems thinking” across activities and used a clear set of indicators for monitoring the impact of HSS investments on illness-related poverty. In other words, they should pay attention to investments that build a strong primary health care delivery platform to tackle a wide array of health challenges, not just specific diseases that donors have chosen to target. To successfully adopt this approach, donors will need to prioritize long-term outcomes over “quick wins.”</span></font></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 2em; margin-left: 0px; padding: 0px; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word; background-color: rgb(250, 250, 250);\"><font color=\"#101010\" face=\"PT Serif, Times, serif\"><span style=\"font-size: 18px;\">Redress power imbalances in how health aid is imagined and delivered. Donors can leverage the disruptions caused by the COVID-19 pandemic to effect a paradigm shift in the aid ecosystem. At a minimum, they should consider adopting new aid approaches such as the “Re-imagined Aid model” that prioritize justice and accountability.</span></font></p><p style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin-right: 0px; margin-bottom: 2em; margin-left: 0px; padding: 0px; vertical-align: baseline; box-sizing: inherit; overflow-wrap: break-word; background-color: rgb(250, 250, 250);\"><font color=\"#101010\" face=\"PT Serif, Times, serif\"><span style=\"font-size: 18px;\">Achieving the SDGs requires recognizing granularity and coming up with tailored solutions. Household surveys, geospatial data, and other innovations have made it possible to get timely subnational data. Utilizing these data to inform health aid programs will help donors better serve the world’s most vulnerable people, regardless of the country in which they live.</span></font></p>', '1644313151poor-2754335_640.jpg', 'https://www.brookings.edu/blog/future-development/2021/02/02/how-health-aid-can-reach-the-worlds-poorest-people/', 7, 1, NULL, NULL, 'Health,health,sastho,Sastho', '2022-02-08 03:39:11'),
(44, 10, 'Health Aid for Poor Countries', 'Health..', '<div>On the list of factors keeping poor countries poor -- bad governance, war, natural disasters -- a prominent place must go to disease. By the most conservative estimates, malaria robs sub-Saharan Africa of 6 percent of its economic strength, and the actual figure could be even higher than 50 percent. As AIDS spreads, the situation will be even more devastating. Disease cuts the lifespan of workers and reduces productivity. High infant mortality compels families to have many children; the families are thus able to spend less on the health and education of each child, and mothers are kept from joining the work force. Disease discourages tourism and investment.</div><div><br></div><div>The health of the world\'s poorest nations is normally and properly measured in lives. Now, a new study commissioned by the World Health Organization puts a dollar figure on the rewards of improving health among the globe\'s poor. It makes a compelling argument that a dramatic increase in health spending by both rich and poor nations would produce huge economic and human benefits.</div><div><br></div><div>The Commission on Macroeconomics and Health, led by Prof. Jeffrey Sachs of Harvard, asks rich countries to spend an extra one-tenth of 1 percent of their economies on the health of the poor. In Washington\'s case, this would mean doubling current health aid, an extra $10 billion a year. If all wealthy countries cooperated, it would add $38 billion a year to health spending by 2015. The commission argues that if that money went to poor nations that also spent more and improved their health care systems, these countries would see at least $360 billion a year in economic gains, lifting millions of people out of poverty. And not incidentally, eight million lives a year would be saved.</div><div><br></div><div>Sign up for the Peter Coy newsletter, for Times subscribers only.&nbsp; A veteran business and economics columnist unpacks the biggest headlines. Get it with a Times subscription.</div><div>The study has been well received in Europe, where several prominent leaders have called for a sharp increase in health spending. In Washington, the response has been skeptical. Mr. Sachs and his co-authors, including Harold Varmus, formerly the head of the National Institutes of Health, say that one of the biggest obstacles to reaching the study\'s goals is changing the American view of foreign aid. Here, help for the third world is dismissed as waste, and Washington finds foreign aid money in the scraps left over after tax cuts and multibillion-dollar increases elsewhere.</div><div><br></div><div>It is hard to imagine anything less wasteful than the health spending recommended, in terms of the good it does and its cost-effectiveness. While foreign aid has often failed to produce results, health improvements are actually the easiest to deliver. We know how to cure a case of tuberculosis for $15, but many poor countries cannot afford even that for TB victims. The world knows how to administer childhood vaccines, a simple and cheap measure that saves three million lives a year. But in many nations vaccine coverage is dropping because the money is not there. In the world\'s 60 poorest nations, the average per capita health spending every year is $13. The W.H.O. report recommends that as a minimum, this should rise to $34. In the United States the figure is $4,500.</div><div><br></div><div>Improving the health of poor countries would be an investment with payoffs for America as well. A more prosperous and stable third world would experience fewer conflicts and disasters, and would eventually spend more money buying American exports. But Washington does not need self-interest to increase its health aid. The chance to save lives and reduce poverty should be incentive enough.</div>', '16443133062_12_18_27_Poor-healthcare-killing-kids-in-Bihar_1_H@@IGHT_401_W@@IDTH_801.jpg', 'https://www.nytimes.com/2002/01/03/opinion/health-aid-for-poor-countries.html', 8, 1, NULL, NULL, 'Health,health,sastho,Sastho', '2022-02-08 03:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(191) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `status`) VALUES
(5, 'Environment', 'Environment', 1),
(6, 'Poverty', 'Poverty', 1),
(7, 'Charity', 'Charity', 1),
(10, 'Health', 'Health', 1);

-- --------------------------------------------------------

--
-- Table structure for table `callback_messages`
--

CREATE TABLE `callback_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `callback_messages`
--

INSERT INTO `callback_messages` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(4, 'Numan Talukder', 'numan@gmail.com', '01846321035', 'Hello Dear', '2021-12-10 03:21:59', '2021-12-10 03:21:59'),
(5, 'effdf', 'fdf', 'fdf', 'fdfd', '2022-01-21 14:48:39', '2022-01-21 14:48:39'),
(6, 'Numan Talukder', 'numantalukder1001@gmail.com', '8622192492', 'Test', '2022-01-22 08:09:49', '2022-01-22 08:09:49'),
(7, 'gfdgfdgdfgdfgdfggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', 'alaminm707@gmail.com', '01741132009', 'gggggggggggggggg', '2022-02-07 00:51:58', '2022-02-07 00:51:58'),
(8, 'Numan Talukder', 'numantalukder1001@gmail.com', '01716687916', 'fsdfsf', '2022-02-13 11:06:34', '2022-02-13 11:06:34'),
(9, 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvddddddddddddddddddddddddddddddddddddddd', 'alaminm707@gmail.com', 'v', 'vvv', '2022-02-13 12:24:39', '2022-02-13 12:24:39'),
(10, 'Md. Al-Amin Ahmedggggggggggggggggggggggggggggggggggggggggggggggggggggggg', 'alaminm707@gmail.com', '01741132009', 'gggggg', '2022-02-13 14:28:15', '2022-02-13 14:28:15'),
(11, 'ggggggggggggggggggggggggggggggggggggggggggggggggggg', 'ggggg', 'gggggg', 'ggggggg', '2022-02-13 14:28:28', '2022-02-13 14:28:28'),
(12, 'Numan Talukder', 'numantalukder1001@gmail.com', '01716687916', 'test', '2022-02-14 12:16:27', '2022-02-14 12:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal` float DEFAULT NULL,
  `preloaded_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_after` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `featured` tinyint(191) DEFAULT NULL,
  `benefits` int(11) DEFAULT NULL,
  `available_fund` float NOT NULL DEFAULT 0,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_newsletter` tinyint(191) DEFAULT NULL,
  `status` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_panding` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secheck` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `campaign_name`, `slug`, `category_id`, `photo`, `description`, `video_link`, `end_date`, `goal`, `preloaded_amount`, `end_after`, `featured`, `benefits`, `available_fund`, `location`, `send_newsletter`, `status`, `is_panding`, `user_id`, `tags`, `meta_tag`, `meta_description`, `secheck`, `created_at`, `updated_at`) VALUES
(84, 'Campaign for Jessore', 'Food', 23, '1644316604Causes-of-Poverty-in-Bangladesh.jpg', '<div>There are lots of people in Jessore who are struggling with the food.</div><div>Please donate money to help them to buy foods for them.</div>', 'https://www.youtube.com/watch?v=0reCfiXKUmg', '02/26/2022', 200, '5,7,10,50', 'date', 1, 50, 120, 'Jessore, Khulna', 0, 'open', 1, NULL, 'Food,khabar,foods', NULL, NULL, 0, '2022-02-08 04:36:44', '2022-02-13 14:26:52'),
(85, 'Campaign for Rajshahi', 'Foods', 23, '1644316776istockphoto-1046802754-170667a.jpg', '<div>There are lots of people in Rajshahi who are struggling with the food.</div><div>Please donate money to help them to buy foods for them.</div>', 'https://www.youtube.com/watch?v=jCokoRUxdo0', '02/24/2022', 140, '5,7,10,50', 'goal', 1, 60, 80, 'Rajshahi City', 1, 'open', 1, NULL, 'Food,khabar,foods', NULL, NULL, 0, '2022-02-08 04:39:36', '2022-02-15 07:58:17'),
(86, 'Cloth for Thakurgaon', 'Cloth for Thakurgaon', 29, '1644317530observerbd.com_1641923638.jpg', 'Thakurgaon is one of the coldest cities in Bangladesh.<div>Please donate money to buy warm cloth for the people of&nbsp;Thakurgaon.</div>', 'https://www.youtube.com/watch?v=nVmRdXnPkNQ', '02/16/2022', 400, '10,20,30,50,70,8,90,80', 'goal', 1, 300, 229, 'Thakurgaon', 0, 'open', 1, NULL, 'Cloth,cloth,kapor,Kapor,Gorom Kapor', NULL, NULL, 0, '2022-02-08 04:46:34', '2022-02-08 04:52:10'),
(87, 'Need food for the street people', 'food-for-street', 23, '16447861412_12_18_27_Poor-healthcare-killing-kids-in-Bihar_1_H@@IGHT_401_W@@IDTH_801.jpg', '<p class=\"q-text qu-display--block qu-wordBreak--break-word qu-textAlign--start\" style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; word-break: break-word; color: rgb(40, 40, 41); font-family: -apple-system, system-ui, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; font-size: 15px; overflow-wrap: anywhere; direction: ltr;\"><span style=\"background: none;\">So this may be a little harder for some people to answer if they have never experienced homelessness. I see a lot of great posts and advice, but there are a few details that must be taken into account when you are trying to survive. Eating fish and counting calories is a luxury, it sounds wonderful, but your options are EXTREMELY limited when you become homeless.</span></p><p class=\"q-text qu-display--block qu-wordBreak--break-word qu-textAlign--start\" style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; word-break: break-word; color: rgb(40, 40, 41); font-family: -apple-system, system-ui, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; font-size: 15px; overflow-wrap: anywhere; direction: ltr;\"><span style=\"background: none;\">Also on a side note, regarding the part of the question asking how to “remaining healthy and full” - this is not really how it’s going to be, no matter how hard you try.</span></p><p class=\"q-text qu-display--block qu-wordBreak--break-word qu-textAlign--start\" style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; word-break: break-word; color: rgb(40, 40, 41); font-family: -apple-system, system-ui, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; font-size: 15px; overflow-wrap: anywhere; direction: ltr;\"><span style=\"background: none;\">Healthy and full is going to be what drives you to survive, achieving it fully on the other hand is not always possible.</span></p><p class=\"q-text qu-display--block qu-wordBreak--break-word qu-textAlign--start\" style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; word-break: break-word; color: rgb(40, 40, 41); font-family: -apple-system, system-ui, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; font-size: 15px; overflow-wrap: anywhere; direction: ltr;\"><span style=\"background: none;\">Healthy and full is not the mindset to focus on because you’re only going to frustrate yourself by trying to obtain needs beyond your means (depending on how far into being homeless you are).</span></p><p class=\"q-text qu-display--block qu-wordBreak--break-word qu-textAlign--start\" style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; word-break: break-word; color: rgb(40, 40, 41); font-family: -apple-system, system-ui, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; font-size: 15px; overflow-wrap: anywhere; direction: ltr;\"><span style=\"background: none;\">Don’t think “healthy and full”, this is not the right mindset if you are in a desperate situation, struggling to help yourself while everyone turns and looks the other way when you walk by. Try to change your mindset and think “I’m going to do my best to SURVIVE today.”</span></p><p class=\"q-text qu-display--block qu-wordBreak--break-word qu-textAlign--start\" style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; word-break: break-word; color: rgb(40, 40, 41); font-family: -apple-system, system-ui, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; font-size: 15px; overflow-wrap: anywhere; direction: ltr;\"><span style=\"background: none;\">This is what I have found from my personal experience over the past year from recently becoming homeless.</span></p>', 'https://www.youtube.com/watch?v=5AbVqSDxKZA', '02/26/2022', 10000, '10,20,50,100', 'goal', 0, 1000, 500, 'Khulna', 0, 'open', 1, NULL, NULL, NULL, NULL, 0, '2022-02-13 15:02:21', '2022-02-14 11:58:08'),
(89, 'Healthcare financing', 'Healthcare-financing', 30, '16448617941636727853.jpg', 'As the Covid-19 pandemic enters its second year, rising cases and the spread of the more infectious Delta variant have significantly worsened the situation in Bangladesh. The adverse impacts of the pandemic are felt not only through the increased pressure on the health sector but also through the economic impacts related to lockdowns. In late 2020, ThinkWell undertook a study to fully grasp the effects of Covid-19 on the Bangladesh health system, in partnership with the Planning Wing and the Health Economics Unit of the Ministry of Health and Family Welfare (MOHFW) in collaboration with the Institute of Health Economics at the University of Dhaka. The study analysed health service data and found that compared to 2019, the utilisation of essential health and family planning services declined significantly at the onset of theCovid-19 pandemic. The study also analysed resource allocations, grants, and incentives given to the health sector in 2020 to combat the Covid-19 pandemic and used this information to make recommendations to sustain the delivery of essential health services and support the fight against future waves of the pandemic. In addition to significant volumes of stimulus funding to overcome the economic impacts of the Covid-19 pandemic, the Government of Bangladesh recruited 5,000+ nurses and 2,000+ doctors from a prequalified waiting list during the initial Covid-19 period. This initiative supported sustaining the essential health services delivery given the long-standing human resources shortages in the health sector. To increase health system preparedness for future health emergencies, the government could consider maintaining a list of prequalified candidates for each health cadre (doctors, nurses, lab technologists, and others).', 'https://www.youtube.com/watch?v=l2ARcRnhPS4', '02/23/2022', 10000, '10,20,50,100', 'goal', 0, 1998, 375, 'Dhaka', 1, 'open', 1, 15, 'Covid19,Corona', NULL, NULL, 0, '2022-02-14 11:28:14', '2022-02-15 04:18:08'),
(90, 'Medicine For Bashundhara Street People', 'Bashundhara-Street-People', 30, '1644921506blood_pressure-1_wide-2899249929414165b1b4dc3bb6e4567b28784599.jpg', 'To the extent that homeless people have been able to obtain needed health care services, they have relied on emergency rooms, clinics, hospitals, and other facilities that serve the poor. Indigent people (with or without a home) experience many obstacles in obtaining health care. For homeless people there are additional barriers. Recognition of the special health care needs of homeless people has encouraged the development of special services for them. In observing and describing these health care and health care-related services, one must be mindful of the heterogeneous nature of the homeless population, as well as the structure of the communities in which such services have developed. Regardless of differences among homeless people or regional variations in services, however, homeless people are more susceptible to certain diseases, have greater difficulty getting health care, and are harder to treat than other people, all because they lack a home. Similarly, attempts to provide health and mental health care services, regardless of variations in such areas as history, funding levels, and nature of support, also have certain common elements. They arose in response to a crisis rather than developing as part of a well thought out plan. They generally brought services to homeless people rather than waiting for them to come in; increasingly, they rely on public funding because the problem has grown beyond a level that the private sector can support.', 'https://www.youtube.com/watch?v=PIyQZfWNwLg', '04/30/2022', 2000, '1', 'goal', 0, 492, 1100, 'Bashundhara, Dhaka', 0, 'open', 1, 6, NULL, NULL, NULL, 0, '2022-02-15 04:38:26', '2022-02-15 09:56:48'),
(91, 'Food for Street People', 'food-for-street-people', 23, '1644922137former-cricketer-virender-sehwag-prepares-home-food-for-needy-people_159082002150.jpg', 'Street people need your help desperately.', 'https://www.youtube.com/watch?v=r4qi7N0UgOo', '03/31/2022', 3000, '1', 'goal', 1, 3000, 0, 'Chittagang', 1, 'open', 1, 20, 'Food', NULL, NULL, 0, '2022-02-15 04:48:57', '2022-02-15 10:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(191) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`) VALUES
(23, 'Foods', 'foods', 1),
(29, 'Cloth', 'Cloth', 1),
(30, 'Health', 'Health', 1);

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` int(11) NOT NULL,
  `type` enum('referral','browser') NOT NULL DEFAULT 'referral',
  `referral` varchar(255) DEFAULT NULL,
  `total_count` int(11) NOT NULL DEFAULT 0,
  `todays_count` int(11) NOT NULL DEFAULT 0,
  `today` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `type`, `referral`, `total_count`, `todays_count`, `today`) VALUES
(1, 'referral', 'www.facebook.com', 5, 0, NULL),
(2, 'referral', 'geniusocean.com', 2, 0, NULL),
(3, 'browser', 'Windows 10', 2668, 0, NULL),
(4, 'browser', 'Linux', 301, 0, NULL),
(5, 'browser', 'Unknown OS Platform', 1042, 0, NULL),
(6, 'browser', 'Windows 7', 431, 0, NULL),
(7, 'referral', 'yandex.ru', 15, 0, NULL),
(8, 'browser', 'Windows 8.1', 541, 0, NULL),
(9, 'referral', 'www.google.com', 10, 0, NULL),
(10, 'browser', 'Android', 520, 0, NULL),
(11, 'browser', 'Mac OS X', 574, 0, NULL),
(12, 'referral', 'l.facebook.com', 3, 0, NULL),
(13, 'referral', 'codecanyon.net', 6, 0, NULL),
(14, 'browser', 'Windows XP', 13, 0, NULL),
(15, 'browser', 'Windows 8', 3, 0, NULL),
(16, 'browser', 'iPad', 6, 0, NULL),
(17, 'browser', 'Ubuntu', 18, 0, NULL),
(18, 'browser', 'iPhone', 19, 0, NULL),
(19, 'referral', 'www.sandbox.paypal.com', 2, 0, NULL),
(20, 'referral', 'test.instamojo.com', 1, 0, NULL),
(21, 'referral', 'www.mollie.com', 3, 0, NULL),
(22, 'referral', 'securegw-stage.paytm.in', 3, 0, NULL),
(23, 'referral', 'ravemodal-dev.herokuapp.com', 6, 0, NULL),
(24, 'referral', 'localhost', 2, 0, NULL),
(25, 'referral', 'www.mujervirtuosapiedrapreciosa.com', 1, 0, NULL),
(26, 'referral', 'baidu.com', 2, 0, NULL),
(27, 'browser', 'Windows Vista', 17, 0, NULL),
(28, 'referral', 'server.secureserverpanel.com', 4, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(191) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `sign`, `value`, `is_default`) VALUES
(1, 'USD', '$', 1, 1),
(4, 'BDT', '৳', 82.92649841308594, 0);

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Anonymous',
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Anonymous',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Anonymous',
  `number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Anonymous',
  `donation_amount` float NOT NULL DEFAULT 0,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donation_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txnid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `email_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_subject` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_body` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `email_type`, `email_subject`, `email_body`, `status`) VALUES
(1, 'Invest', 'You have invested successfully.', '<p>Hello {customer_name},<br>You have invested successfully.</p><p>Transaction ID:&nbsp;<span style=\"color: rgb(33, 37, 41);\">{order_number}.</span></p><p>Thank You.</p>', 1),
(2, 'Payout', 'Your Investment is completed successfully.', '<p>Hello {customer_name},<br>Your Investment is completed successfully.</p><p>Transaction ID:&nbsp;<span style=\"color: rgb(33, 37, 41);\">{order_number}.</span><br></p><p>Thank You<br></p>', 1),
(3, 'Withdraw', 'Your withdraw is completed successfully.', '<p>Hello {customer_name},<br>Your withdraw is completed successfully.</p><p>Thank You<br></p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `details`, `status`) VALUES
(10, 'How Mukto food works?', '<span style=\"color: rgb(52, 52, 52); font-family: Charter, Georgia, Times, serif; font-size: 19px;\">Rather than focusing on relief Mukto focuses on strategy and creating sustainable, grassroots, women-centered approaches to ending hunger.</span><br>', 0),
(11, 'How Mukto cloths works?', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(102, 102, 102); font-size: 14px; outline: none !important;\">1. We receive clothes from household and hostels of different college/universities.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(102, 102, 102); font-size: 14px;\">2. Clothes are sorted out according to size, gender and type and then washed and ironed.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(102, 102, 102); font-size: 14px;\">3. Each time we do a survey of the proposed villages prior to distribution.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(102, 102, 102); font-size: 14px;\">4. Clothes are distributed among some selected people.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(102, 102, 102); font-size: 14px;\">5. On special programs we distribute rags and warm clothes among the people who live under the sky to help them fight the winter.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(102, 102, 102); font-size: 14px;\">6. Clothes, not suitable to donate are sold to vendors and the money is used to buy new clothes.</p>', 0),
(12, 'How Mukto health works?', 'Mukto Health helps in Diseases, Disorders, and Disciplines are multipurpose organizations that seek cures for particular diseases and disorders or promote particular medical disciplines by providing direct services, advocating for public understanding and support.<br>', 0),
(13, 'Can I part of this?', 'You can join mukto team by creating a account that hardly takes a minute.', 0),
(14, 'How the Campaign works?', 'Campaign are created by the registered users. Only they can add new campaigns.&nbsp;<div>After then the admin will approve that.&nbsp;</div><div>After approving the campaign will show in the website.</div>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(191) NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `title`, `details`, `photo`) VALUES
(1, 'Financial Analysis', '<span style=\"color: rgb(5, 14, 51); text-align: center;\">Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span><br>', '1574146650laptop-office-working-men-3153201.jpg'),
(2, 'Financial Analysis', '<span style=\"color: rgb(5, 14, 51); text-align: center;\">Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span><br>', '1574146642man-working-on-a-laptop-while-woman-takes-notes-3153208.jpg'),
(3, 'Financial Analysis', '<span style=\"color: rgb(5, 14, 51); text-align: center;\">Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span><br>', '1574146635photo-of-people-using-laptop-3194521.jpg'),
(4, 'Financial Analysis', '<span style=\"color: rgb(5, 14, 51); text-align: center;\">Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span><br>', '1574146627photo-of-woman-using-her-laptop-935756.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `generalsettings`
--

CREATE TABLE `generalsettings` (
  `id` int(191) NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loader` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_loader` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `colors` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secendary_color` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_talkto` tinyint(1) NOT NULL DEFAULT 1,
  `talkto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_language` tinyint(1) NOT NULL DEFAULT 1,
  `is_loader` tinyint(1) NOT NULL DEFAULT 1,
  `map_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_disqus` tinyint(1) NOT NULL DEFAULT 0,
  `disqus` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_check` tinyint(1) DEFAULT 0,
  `paypal_client_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_client_secret` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_sendbox_check` int(11) NOT NULL DEFAULT 1,
  `stripe_check` tinyint(1) NOT NULL DEFAULT 0,
  `cod_check` tinyint(1) NOT NULL DEFAULT 0,
  `stripe_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_host` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_port` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_pass` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_smtp` tinyint(1) NOT NULL DEFAULT 0,
  `coupon_found` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `already_coupon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_subtitle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_currency` tinyint(1) NOT NULL DEFAULT 0,
  `currency_format` tinyint(1) NOT NULL DEFAULT 0,
  `price_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscribe_success` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscribe_error` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breadcumb_banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin_loader` tinyint(1) NOT NULL DEFAULT 0,
  `footer_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_contact` tinyint(1) NOT NULL DEFAULT 0,
  `is_faq` tinyint(1) NOT NULL DEFAULT 0,
  `is_home` tinyint(1) NOT NULL DEFAULT 0,
  `is_services` tinyint(1) NOT NULL DEFAULT 0,
  `withdraw_fee` double NOT NULL DEFAULT 0,
  `withdraw_charge` double NOT NULL DEFAULT 0,
  `is_projects` tinyint(1) NOT NULL DEFAULT 0,
  `is_teams` tinyint(1) NOT NULL DEFAULT 0,
  `is_blog` tinyint(1) NOT NULL DEFAULT 0,
  `is_pages` tinyint(1) NOT NULL DEFAULT 0,
  `plan_meta_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quotes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verification_email` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generalsettings`
--

INSERT INTO `generalsettings` (`id`, `logo`, `favicon`, `loader`, `admin_loader`, `banner`, `title`, `header_email`, `header_phone`, `footer`, `copyright`, `colors`, `secendary_color`, `is_talkto`, `talkto`, `is_language`, `is_loader`, `map_key`, `is_disqus`, `disqus`, `paypal_check`, `paypal_client_id`, `paypal_client_secret`, `paypal_sendbox_check`, `stripe_check`, `cod_check`, `stripe_secret`, `stripe_key`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `from_email`, `from_name`, `is_smtp`, `coupon_found`, `already_coupon`, `order_title`, `service_subtitle`, `service_title`, `service_text`, `service_image`, `service_link`, `order_text`, `is_currency`, `currency_format`, `price_title`, `price_subtitle`, `price_text`, `subscribe_success`, `subscribe_error`, `error_title`, `error_text`, `error_photo`, `breadcumb_banner`, `is_admin_loader`, `footer_logo`, `is_contact`, `is_faq`, `is_home`, `is_services`, `withdraw_fee`, `withdraw_charge`, `is_projects`, `is_teams`, `is_blog`, `is_pages`, `plan_meta_key`, `plan_meta_description`, `quotes`, `is_verification_email`) VALUES
(1, '1639743319Capture.PNG', '15821043881573982412statistics1.png', '1644318769Infinity-1s-200px.gif', '1644318771Infinity-1s-200px.gif', '1564374335herobg.jpg', 'Mukto', 'Info@example.com', '0123 456789', 'This is a web-based app to help meet the donor and receiver in a single platform. It is a project of our course CSE499.', '<pre><b><font color=\"#ffffff\">COPYRIGHT © 2022. All Rights Reserved By Al-Amin &amp;&nbsp;Numan.</font></b></pre>', '#24b9e8', '#2cd3f8', 0, '61e87295b84f7301d32bea84', 0, 0, 'AIzaSyB1GpE4qeoJ__70UZxvX9CTMUTZRZNHcu8', 1, 'junnunr', 1, 'AcWYnysKa_elsQIAnlfsJXokR64Z31CeCbpis9G3msDC-BvgcbAwbacfDfEGSP-9Dp9fZaGgD05pX5Qi', 'EGZXTq6d6vBPq8kysVx8WQA5NpavMpDzOLVOb9u75UfsJ-cFzn6aeBXIMyJW2lN1UZtJg5iDPNL9ocYE', 0, 1, 1, 'sk_test_QQcg3vGsKRPlW6T3dXcNJsor', 'pk_test_UnU1Coi1p5qFGwtpjZMRMgJM', 'smtp.mailtrap.io', '2525', '341b1a0c3edfa6', 'a578c7a5db5dae', 'numantalukder1001@gmail.com', 'Mukto', 1, 'Coupon Found', 'Coupon Already Applied', 'THANK YOU FOR YOUR GREAT GENEROSITY.', 'A litter bit More', 'About US', 'Our organization pursues several goals that can be identified as our mission. Learn more about them below. Auis nostrud exercitation ullamc laboris nisitm aliquip ex bea sed consequat duis autes ure dolor. dolore magna aliqua nim ad minim.', '1573987345about.jpg', 'http://google.com', 'We greatly appreciate your donation, and your sacrifice. Your support helps to further our mission through this campaign.', 0, 0, 'Choose Plans & Pricing', 'Choose the best for yourself', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'You are subscribed Successfully...', 'This email has already been taken!', '<div><h4 class=\"heading\"></h4></div><div><h4 class=\"heading\" style=\"margin: 40px 0px 25px; font-weight: 700; line-height: 46px; font-size: 36px; color: rgb(40, 56, 79); text-align: center;\">Oops! You\'re lost...</h4></div>', '<span style=\"color: rgb(51, 51, 51); text-align: center;\">The page you are looking for might have been moved, renamed, or might never existed.</span><br>', '1561878540404.png', '1639739291caring-header.jpg', 0, '1639743328Capture.PNG', 1, 1, 1, 1, 2, 3, 1, 0, 1, 1, 'p1,p2,p3,p4', 'Test', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `home_counters`
--

CREATE TABLE `home_counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter` int(11) NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_counters`
--

INSERT INTO `home_counters` (`id`, `text`, `counter`, `photo`, `created_at`, `updated_at`) VALUES
(5, 'Running Project', 8, '1617212975icon-3.png', '2019-12-27 23:03:27', '2022-01-19 13:28:51'),
(6, 'Receiver', 10000, '1617212970icon-3.png', '2019-12-27 23:03:47', '2021-12-17 05:13:14'),
(8, 'Donner', 120, '1617212964icon-3.png', '2019-12-27 23:12:12', '2022-01-19 13:28:37'),
(9, 'Volunteer', 99, '1617212957icon-3.png', '2019-12-27 23:23:51', '2022-01-19 13:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(191) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `language` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rtl` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `is_default`, `language`, `file`, `rtl`) VALUES
(1, '1579082671sXVk59Sx', 1, 'English', '1579082671sXVk59Sx.json', 0),
(4, '1642862934NXvPwnhP', 0, 'বাংলা', '1642862934NXvPwnhP.json', 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(191) NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_26_072954_create_home_pages_table', 1),
(4, '2019_12_28_043032_create_home_counters_table', 2),
(6, '2019_12_28_070324_create_campaigns_table', 3),
(11, '2019_12_30_041751_create_donations_table', 4),
(13, '2020_01_08_051311_create_callback_messages_table', 5),
(14, '2020_01_13_064322_create_admin_languages_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(191) NOT NULL,
  `donation_id` int(191) UNSIGNED DEFAULT NULL,
  `user_id` int(191) DEFAULT NULL,
  `withdrow_id` int(191) DEFAULT NULL,
  `campaign_id` int(191) DEFAULT NULL,
  `conversation_id` int(11) DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `donation_id`, `user_id`, `withdrow_id`, `campaign_id`, `conversation_id`, `is_read`, `created_at`, `updated_at`) VALUES
(45, NULL, NULL, NULL, 67, NULL, 1, '2021-01-05 00:11:23', '2021-01-05 00:11:57'),
(51, 49, NULL, NULL, NULL, NULL, 1, '2021-01-06 04:16:38', '2021-03-22 21:48:37'),
(52, NULL, NULL, NULL, 68, NULL, 1, '2021-03-22 21:48:33', '2021-03-22 21:48:37'),
(53, 67, NULL, NULL, NULL, NULL, 1, '2021-03-25 02:32:53', '2021-03-27 03:26:25'),
(56, 49, NULL, NULL, NULL, NULL, 1, '2021-04-15 13:31:14', '2021-04-15 15:33:22'),
(57, 49, NULL, NULL, NULL, NULL, 1, '2021-04-15 13:38:24', '2021-04-15 15:33:22'),
(59, 49, NULL, NULL, NULL, NULL, 1, '2021-04-15 13:44:27', '2021-04-15 15:33:22'),
(61, 49, NULL, NULL, NULL, NULL, 1, '2021-04-15 14:05:15', '2021-04-15 15:33:22'),
(62, 49, NULL, NULL, NULL, NULL, 1, '2021-04-15 14:09:19', '2021-04-15 15:33:22'),
(63, 67, NULL, NULL, NULL, NULL, 1, '2021-04-15 15:05:48', '2021-04-15 15:33:22'),
(66, 49, NULL, NULL, NULL, NULL, 1, '2021-04-15 15:59:23', '2021-04-15 16:00:40'),
(69, 49, NULL, NULL, NULL, NULL, 1, '2021-04-15 16:17:37', '2021-12-17 02:06:42'),
(70, 49, NULL, NULL, NULL, NULL, 1, '2021-04-15 16:49:05', '2021-12-17 02:06:42'),
(73, NULL, 6, NULL, NULL, NULL, 1, '2021-12-17 06:18:02', '2021-12-18 13:49:03'),
(74, NULL, NULL, NULL, 70, NULL, 1, '2021-12-17 06:31:28', '2021-12-18 13:49:03'),
(75, NULL, 7, NULL, NULL, NULL, 1, '2021-12-18 14:15:24', '2021-12-21 23:52:55'),
(76, NULL, NULL, NULL, 71, NULL, 1, '2021-12-19 02:03:54', '2021-12-21 23:52:55'),
(78, NULL, NULL, NULL, 72, NULL, 1, '2021-12-24 10:13:46', '2021-12-31 02:06:53'),
(79, NULL, 9, NULL, NULL, NULL, 1, '2021-12-31 01:58:00', '2021-12-31 02:06:53'),
(80, NULL, 11, NULL, NULL, NULL, 1, '2022-01-21 12:10:18', '2022-01-22 08:17:30'),
(81, NULL, 12, NULL, NULL, NULL, 1, '2022-01-21 15:04:32', '2022-01-22 08:17:30'),
(82, NULL, 13, NULL, NULL, NULL, 1, '2022-01-22 06:42:09', '2022-01-22 08:17:30'),
(83, NULL, NULL, NULL, 73, NULL, 1, '2022-01-22 06:44:28', '2022-01-22 08:17:30'),
(84, NULL, NULL, NULL, 74, NULL, 1, '2022-01-22 06:46:17', '2022-01-22 08:17:30'),
(85, NULL, NULL, NULL, 75, NULL, 1, '2022-01-22 06:53:18', '2022-01-22 08:17:30'),
(86, NULL, NULL, NULL, 76, NULL, 1, '2022-01-22 08:33:43', '2022-01-22 08:48:57'),
(87, NULL, 14, NULL, NULL, NULL, 1, '2022-01-22 08:45:01', '2022-01-22 08:48:57'),
(88, NULL, NULL, NULL, 77, NULL, 1, '2022-01-22 08:58:49', '2022-01-22 09:10:10'),
(91, NULL, NULL, NULL, 83, NULL, 1, '2022-02-08 03:50:38', '2022-02-09 01:28:18'),
(92, NULL, 15, NULL, NULL, NULL, 1, '2022-02-13 15:13:31', '2022-02-14 10:26:46'),
(93, NULL, 15, NULL, NULL, NULL, 1, '2022-02-13 15:13:42', '2022-02-14 10:26:46'),
(95, NULL, NULL, NULL, 88, NULL, 1, '2022-02-13 15:26:38', '2022-02-14 10:26:46'),
(96, NULL, NULL, NULL, 89, NULL, 1, '2022-02-14 11:28:14', '2022-02-14 11:47:56'),
(97, NULL, 20, NULL, NULL, NULL, 1, '2022-02-14 13:17:56', '2022-02-15 02:52:55'),
(99, NULL, NULL, 9, NULL, NULL, 1, '2022-02-15 04:18:08', '2022-02-15 04:20:50'),
(101, NULL, NULL, NULL, 90, NULL, 1, '2022-02-15 04:38:26', '2022-02-15 07:55:07'),
(102, NULL, NULL, NULL, 91, NULL, 1, '2022-02-15 04:48:57', '2022-02-15 07:55:07'),
(103, NULL, NULL, 10, NULL, NULL, 0, '2022-02-15 09:56:48', '2022-02-15 09:56:48'),
(104, NULL, NULL, NULL, NULL, 15, 1, '2022-02-15 10:07:34', '2022-02-15 10:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(191) NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_tag` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header` tinyint(1) NOT NULL DEFAULT 0,
  `footer` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `details`, `meta_tag`, `meta_description`, `header`, `footer`) VALUES
(1, 'About Us', 'about', '<div helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><p><font size=\"3\">Mukto&nbsp;is a nonprofit that supports other nonprofits by connecting them to donors and companies. We help donors make safe and easy donations to locally-driven organizations around the world. We’ve partnered with nonprofits in several countries who work on the ground and post the projects that their communities really need. We help companies develop powerful corporate social responsibility, grantmaking, and employee engagement strategies. When a disaster happens, we can quickly send funds to the local organizations that are best-suited to drive relief and recovery. Our impact is about more than moving money to where it’s needed most; it’s also about helping nonprofits access information and ideas that will help them listen, learn, and grow.&nbsp;</font></p></div>', NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pagesettings`
--

CREATE TABLE `pagesettings` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_success` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `side_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `side_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider` tinyint(1) NOT NULL DEFAULT 1,
  `service` tinyint(1) NOT NULL DEFAULT 1,
  `counter` tinyint(11) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 1,
  `review_blog` tinyint(1) NOT NULL DEFAULT 1,
  `video_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_background` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_subtitle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio_subtitle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_subtitle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_subtitle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_subtitle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_subtitle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_section` tinyint(1) NOT NULL DEFAULT 0,
  `contact_meta_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_meta_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_meta_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_meta_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_meta_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donate_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donate_subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donate_button_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_video_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_left_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `callback_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `callback_subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `callback_image1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `callback_image2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homepage_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepage_subtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepage_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepage_photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homepage_link1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homepage_link2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cservice` tinyint(4) NOT NULL DEFAULT 1,
  `ccounter` tinyint(4) DEFAULT 1,
  `cfeature` tinyint(4) NOT NULL DEFAULT 1,
  `cdonate` tinyint(4) NOT NULL DEFAULT 1,
  `ccallback` tinyint(4) NOT NULL DEFAULT 1,
  `cteam` tinyint(4) NOT NULL DEFAULT 1,
  `cportfolio` tinyint(4) NOT NULL DEFAULT 1,
  `cnews` tinyint(1) NOT NULL DEFAULT 1,
  `homepage_button1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepage_button2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `donate_link1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pagesettings`
--

INSERT INTO `pagesettings` (`id`, `contact_success`, `contact_email`, `contact_title`, `contact_text`, `side_title`, `side_text`, `street`, `phone`, `fax`, `email`, `site`, `slider`, `service`, `counter`, `featured`, `review_blog`, `video_title`, `video_text`, `video_link`, `video_image`, `video_background`, `service_subtitle`, `service_title`, `service_text`, `portfolio_subtitle`, `portfolio_title`, `portfolio_text`, `p_subtitle`, `p_title`, `p_text`, `p_background`, `team_subtitle`, `team_title`, `team_text`, `review_subtitle`, `review_title`, `review_text`, `blog_subtitle`, `blog_title`, `blog_text`, `c_title`, `c_text`, `c_background`, `contact_section`, `contact_meta_key`, `contact_meta_description`, `faq_meta_key`, `faq_meta_description`, `team_meta_key`, `team_meta_description`, `project_meta_key`, `project_meta_description`, `service_meta_key`, `service_meta_description`, `counter_subtitle`, `counter_title`, `donate_title`, `donate_subtitle`, `donate_button_text`, `counter_video_link`, `time`, `day`, `service_left_img`, `callback_title`, `callback_subtitle`, `callback_image1`, `counter_image`, `callback_image2`, `day_icon`, `phone_icon`, `street_icon`, `homepage_title`, `homepage_subtitle`, `homepage_description`, `homepage_photo`, `homepage_link1`, `homepage_link2`, `cservice`, `ccounter`, `cfeature`, `cdonate`, `ccallback`, `cteam`, `cportfolio`, `cnews`, `homepage_button1`, `homepage_button2`, `donate_link1`) VALUES
(1, 'Success! Thanks for contacting us, we will get back to you shortly.', 'al.ahmed@northsouth.edu  \r\nnuman.talukder@northsouth.edu', '<h4 class=\"subtitle\" style=\"margin-bottom: 6px; font-weight: 600; line-height: 28px; font-size: 28px; text-transform: uppercase;\">WE\'D LOVE TO</h4><h2 class=\"title\" style=\"margin-bottom: 13px;font-weight: 600;line-height: 50px;font-size: 40px;color: rgb(18, 66, 201);text-transform: uppercase;\">HEAR FROM YOU</h2>', '<span style=\"color: rgb(119, 119, 119);\">Send us a message and we\' ll respond as soon as possible</span><br>', '<h4 class=\"title\" style=\"margin-bottom: 10px; font-weight: 600; line-height: 28px; font-size: 28px;\">Let\'s Connect</h4>', '<span style=\"color: rgb(51, 51, 51);\">Get in touch with us</span>', 'NSU, Bashundhara R/A, Dhaka', '01741132009', '00 000 000 0001', 'info@mukto.com', 'https://geniusocean.com/', 0, 0, NULL, 1, 1, 'We are always with you to make your project', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas.', 'https://www.google.com/', '1574060315servicebg.jpg', '1574052088get-quot.jpg', 'Society Needs Your Help', 'Featured Campaign', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Our Projects', 'Our Projects', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Our Video Presentation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed posuere ipsum. Nunc eget sagittis nunc. Nunc ac aliquet ante. Morbi congue semper justo. Quisque sed pulvinar nisl. Maecenas nec consequat sapien.', 'https://www.youtube.com/watch?v=ZAb3qB99QEE', '1574060315hero-bg.png', '.', '.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Testimonial', 'Customer Reviews', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Blog', 'Latest Blogs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Contact Our Awesome Team', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.', '1574055631free-consult.jpg', 1, 'c1,c2,c3,c4,c5', 'Test', 'f1,f2,f3,f4,f5', 'Test', 't1,t2,t3,t4', 'Test', 'pro1,pro2,pro3', 'Test', 's1,s2,s3,s4,s5', 'Test', 'We’re helping hand on!', '10,000 Children in 64 Districts.', 'Donate now', 'Donate now and help others', 'Donate', 'https://www.youtube.com/watch?v=-_NNIxP63B4', '9am - 8pm', 'Mon - Sat', '1574054730service-shape.png', 'Let\'s make the world better,together', 'Request a call back', '1644317844volunteer.jpg', '1639856738lead-1587120188302-1587460354741.jpeg', '1578465075map.png', '1574071573clock-icon.png', '1574071573call.png', '1574071573marker-icon.png', 'Society Needs Your Help Today', 'Small Effort Make Big Change.', 'Search for causes that are special to you or just take a look at what amazing charities are doing', '1644317673LifeOntheRailsKids.jpg', 'http://muktoo.xyz/campaign', NULL, 1, 1, 1, 0, 1, 0, 1, 1, 'Donate', 'Campaign', 'http://muktoo.xyz/campaign');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` int(191) NOT NULL,
  `subtitle` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('manual','automatic') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'manual',
  `information` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(191) DEFAULT NULL,
  `status` tinyint(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `subtitle`, `title`, `details`, `name`, `type`, `information`, `keyword`, `status`) VALUES
(3, NULL, NULL, NULL, 'bKash', 'automatic', '{\"merchant_id\":\"01846321035\",\"developer_code\":\"5a61be72ab323\",\"text\":\"Pay Via bKash.\"}', 'voguepay', 0),
(5, NULL, NULL, NULL, '2Checkout', 'automatic', '{\"seller_id\":\"250201990346\",\"public_key\":\"00CB71D7-A4A7-4834-899F-40AAD5DC68B1\",\"private_key\":\"0222D6FF-6647-4DC0-B29A-F20413302AFD\",\"sandbox_check\":1,\"text\":\"Pay Via 2Checkout.\"}', '2checkout', 0),
(6, NULL, NULL, NULL, 'Fluter', 'automatic', '{\"public_key\":\"FLWPUBK_TEST-a34940f2f87746abbdd8c117caee81cf-X\",\"secret_key\":\"FLWSECK_TEST-1cb427c96e0b1e6772a04504be3638bd-X\",\"text\":\"Pay via your Fluter account.\"}', 'flutterwave', 0),
(7, NULL, NULL, NULL, 'Mercadopago', 'automatic', '{\"public_key\":\"TEST-6f72a502-51c8-4e9a-8ca3-cb7fa0addad8\",\"token\":\"TEST-6068652511264159-022306-e78da379f3963916b1c7130ff2906826-529753482\",\"sandbox_check\":1,\"text\":\"Pay Via MercadoPago\"}', 'mercadopago', 0),
(8, NULL, NULL, NULL, 'Authorize.Net', 'automatic', '{\"login_id\":\"76zu9VgUSxrJ\",\"txn_key\":\"2Vj62a6skSrP5U3X\",\"sandbox_check\":1,\"text\":\"Pay Via Authorize.Net\"}', 'authorize.net', 0),
(9, NULL, NULL, NULL, 'Razorpay', 'automatic', '{\"key\":\"rzp_test_xDH74d48cwl8DF\",\"secret\":\"cr0H1BiQ20hVzhpHfHuNbGri\",\"text\":\"Pay via your Razorpay account.\"}', 'razorpay', 0),
(11, NULL, NULL, NULL, 'Paytm', 'automatic', '{\"merchant\":\"tkogux49985047638244\",\"secret\":\"LhNGUUKE9xCQ9xY8\",\"website\":\"WEBSTAGING\",\"industry\":\"Retail\",\"sandbox_check\":1,\"text\":\"Pay via your Paytm account.\"}', 'paytm', 0),
(12, NULL, NULL, NULL, 'Paystack', 'automatic', '{\"key\":\"pk_test_162a56d42131cbb01932ed0d2c48f9cb99d8e8e2\",\"email\":\"junnuns@gmail.com\",\"text\":\"Pay via your Paystack account.\"}', 'paystack', 0),
(13, NULL, NULL, NULL, 'Instamojo', 'automatic', '{\"key\":\"test_172371aa837ae5cad6047dc3052\",\"token\":\"test_4ac5a785e25fc596b67dbc5c267\",\"sandbox_check\":1,\"text\":\"Pay via your Instamojo account.\"}', 'instamojo', 0),
(14, NULL, NULL, NULL, 'Stripe', 'automatic', '{\"key\":\"pk_test_UnU1Coi1p5qFGwtpjZMRMgJM\",\"secret\":\"sk_test_QQcg3vGsKRPlW6T3dXcNJsor\",\"text\":\"Pay via your Credit Card.\"}', 'stripe', 0),
(15, NULL, NULL, NULL, 'Paypal', 'automatic', '{\"client_id\":\"AcWYnysKa_elsQIAnlfsJXokR64Z31CeCbpis9G3msDC-BvgcbAwbacfDfEGSP-9Dp9fZaGgD05pX5Qi\",\"client_secret\":\"EGZXTq6d6vBPq8kysVx8WQA5NpavMpDzOLVOb9u75UfsJ-cFzn6aeBXIMyJW2lN1UZtJg5iDPNL9ocYE\",\"sandbox_check\":1,\"text\":\"Pay via your PayPal account.\"}', 'paypal', 1),
(17, NULL, NULL, NULL, 'Mollie Payment', 'automatic', '{\"key\":\"test_5HcWVs9qc5pzy36H9Tu9mwAyats33J\",\"text\":\"Pay with Mollie Payment.\"}', 'mollie', 0);

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(191) NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `subtitle`, `photo`, `details`) VALUES
(2, 'Health aid for the poor', 'We offer medical aid just only for 1tk for all kind of medical issues for the poor.', '1644318927Healthcare_Tk1_RajibDhar.jpg', 'Healthcare available at Tk1 for the poor\r\n\r\nThirty-eight-year-old Shakila Begum has been homebound for past two months because of her pregnancy. Despite her condition, she stays at home and looks after her three children, while her husband is away at work, and is unable to receive much needed medical care.\r\nOn the morning of April 13, however, things changed for the seven months pregnant woman when her neighbor Ashna came over to take her to a medical camp that had been set up near their homes.'),
(3, 'Warm cloths for the underprivileged people.', 'Successfully donated 300 peoples warm cloth in the area of Khulna.', '1644318341bidyanondo-project-images-146-big.jpg', 'Like every year, we are planning to distribute a special winter survival kit among underprivileged communities to save them from the cold. This kit includes a blanket, Vaseline, lip gel, mosquito net, and a special dry food package. Please come forward and donate to make them safe from the hard cold in the winter season.'),
(5, 'Foods for the poor people.', 'We had feed 200 people in Mirpur last month.', '1644318129bidyanondo-project-images-19-big.jpg', 'A very new and unique program began by Bidyanondo is \'Ek Takay Ahar\', which refers to \'food for a single penny\'. Under this program hundreds of street dwelling children, beggars, elderly people and physically and mentally challenged people hanging around streets or stations get their fundamental need of regular meals in exchange of more than one taka. Currently \'ek takay ahar\' is the flagship project of Bidyanondo. At present we are providing more than 1000 packets of meal in 8 districts of Bangladesh.The Bidyanondo Foundation\'s policy is to charge 1 taka to make sure that we are giving value for the people\'s pride. Paying the money allows them not to view themselves negatively as beggars. This project has been providing nutritional lifeline towards Bangladesh’s street children.');

-- --------------------------------------------------------

--
-- Table structure for table `seotools`
--

CREATE TABLE `seotools` (
  `id` int(10) UNSIGNED NOT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keys` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_pixel` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seotools`
--

INSERT INTO `seotools` (`id`, `google_analytics`, `meta_keys`, `facebook_pixel`) VALUES
(1, 'UA-137437974-1', 'Mukto, NSU, Charity', 'UA-137437974-1');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(191) NOT NULL,
  `category_id` int(191) DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `category_id`, `title`, `subtitle`, `details`, `photo`, `is_featured`, `slug`) VALUES
(36, 12, 'Upcoming Project', 'Lorem ipsum dolor sit amet, iaculis consectetur adipiscing elit. Cras aciaculis arcu.', '<font color=\"#000000\"><b>Our upcoming projects will be updated here.</b></font>', '1618465837161803487315773582991573537275si2.jpg', 0, 'global-network-25'),
(56, NULL, 'This is a project of Health', NULL, '<font color=\"#000000\"><b>The health platform is for blood donations and for health campeigns.&nbsp;</b></font>', '161846582615773583821573535273ic3.png', 0, NULL),
(59, NULL, 'This is Project of Food', NULL, 'Donate the extra food to the poor.', '161846580015773583711564379080icon1.png', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `socialsettings`
--

CREATE TABLE `socialsettings` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gplus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dribble` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_status` tinyint(4) NOT NULL DEFAULT 1,
  `g_status` tinyint(4) NOT NULL DEFAULT 1,
  `t_status` tinyint(4) NOT NULL DEFAULT 1,
  `l_status` tinyint(4) NOT NULL DEFAULT 1,
  `d_status` tinyint(4) NOT NULL DEFAULT 1,
  `f_check` tinyint(10) DEFAULT NULL,
  `g_check` tinyint(10) DEFAULT NULL,
  `fclient_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fclient_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fredirect` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gclient_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gclient_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gredirect` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socialsettings`
--

INSERT INTO `socialsettings` (`id`, `facebook`, `gplus`, `twitter`, `linkedin`, `dribble`, `f_status`, `g_status`, `t_status`, `l_status`, `d_status`, `f_check`, `g_check`, `fclient_id`, `fclient_secret`, `fredirect`, `gclient_id`, `gclient_secret`, `gredirect`) VALUES
(1, 'https://www.facebook.com/numan.talukder', 'https://plus.google.com/', 'https://twitter.com/', 'https://www.linkedin.com/', 'https://dribbble.com/', 1, 1, 1, 1, 1, 0, 0, '503140663460329', 'f66cd670ec43d14209a2728af26dcc43', 'https://localhost/charity/main-charity/auth/facebook/callback', '915191002660-okcvhj4qspmbcm4qgn9et4vnu5q3mdei.apps.googleusercontent.com', 'PP-ZuCXvvdIPrpUy2WEDeIck', 'http://localhost/charity-7/auth/google/callback');

-- --------------------------------------------------------

--
-- Table structure for table `social_providers`
--

CREATE TABLE `social_providers` (
  `id` int(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `provider_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_providers`
--

INSERT INTO `social_providers` (`id`, `user_id`, `provider_id`, `provider`, `created_at`, `updated_at`) VALUES
(3, 17, '102485372716947456487', 'google', '2019-06-19 17:06:00', '2019-06-19 17:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(191) NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`) VALUES
(24, 'admin@gmail.com'),
(25, 'alamin@gmail.com'),
(27, 'numan.talukder@northsouth.edu'),
(28, 'rubiakhatunmini@yandex.com'),
(29, 'abc@gmail.com'),
(30, 'alaminm707@gmail.com'),
(31, 'decemberchegg@gmail.com'),
(32, 'numantalukder1001@gmail.com'),
(33, 'numantalukder@ymail.com'),
(34, 'numan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_provider` tinyint(10) NOT NULL DEFAULT 0,
  `status` tinyint(10) NOT NULL DEFAULT 0,
  `verification_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `photo`, `zip`, `city`, `address`, `phone`, `fax`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `is_provider`, `status`, `verification_link`, `email_verified`) VALUES
(1, 'jisan', '1640937250side-part-haircut-31.jpg', '1230', NULL, 'uttara', '5079956958', NULL, 'jisan@gmail.com', '$2y$10$8vwH4dY2LTDfmHRk3TO/c.QnM3ki3c5NKrP.6B69kJ5RjqR7fLc8.', NULL, '2021-12-01 03:38:04', '2021-12-31 01:54:10', 0, 0, 'c32b9b52bc24e688871e520098b3ec42', 'Yes'),
(6, 'Numan Talukder', NULL, NULL, NULL, 'uttara', '8622192492', NULL, 'numan@gmail.com', '$2y$10$cIEpI/pCKSrjiSxRHs774.1anj.DftqBDCm8Ti41WXB81jY6A2z4u', NULL, '2021-12-17 06:18:02', '2021-12-17 06:18:02', 0, 0, '04faf543479dac329e221bfa8023e259', 'Yes'),
(7, 'Al-Amin', NULL, NULL, NULL, 'jashore', '347087097', NULL, 'alamin@gmail.com', '$2y$10$6wHAfjPJi1TK03ANZPKkV..gcKcJVHimTrv0AiXPOG3C/z0LMEwXq', NULL, '2021-12-18 14:15:24', '2021-12-18 14:15:24', 0, 0, '6062f8c8d545a1f95fe54f556d27acd6', 'Yes'),
(9, 'Jahan', NULL, NULL, NULL, 'Uttara', '123456', NULL, 'jahan@gmail.com', '$2y$10$Yc6CaLP8sG9Is.0fNeTq9uc2h3/XSiwGwA5glBnk/duEI9tioxYiC', NULL, '2021-12-31 01:58:00', '2021-12-31 01:58:00', 0, 0, '64248bf923627491e1c9de72b301d8cb', 'Yes'),
(10, 'test1', NULL, NULL, NULL, 'dfdf', '111', NULL, 'test@test.com', '$2y$10$iguZW7x2e7Rgc/jWM3zKZeUpFKD.07bWiPYTJz5uRf2x9aQ4f0Kbq', NULL, '2022-01-19 12:51:12', '2022-01-19 12:51:12', 0, 0, '2754416f17d83754cbb5088d20a59537', 'No'),
(11, 'Al-Amin Ahmed', '1644313362uyuy.jpg', NULL, NULL, 'House- 33, road- 10, block- B, Bashundhara R/A', '01741132009', NULL, 'al.ahmed@northsouth.edu', '$2y$10$swM/IwLZekFpfebtEB7UguACxgKKk69oLp8wgUdZi5jPyprUvByuy', NULL, '2022-01-21 12:10:18', '2022-02-08 03:42:42', 0, 0, '342831f23165e2b3ba5d7eaa62f77c2d', 'Yes'),
(12, 'abc', NULL, NULL, NULL, 'fghgf', '1234', NULL, 'abc@gmail.com', '$2a$12$QwDGpJouk1GLkRzbEvjKCOYMQZfQT.qSC8CYjVwX9NHuY8VMnkiCC', NULL, '2022-01-21 15:04:32', '2022-01-21 15:04:32', 0, 0, '407840b3fbbceeb198e50577f85907dc', 'Yes'),
(13, 'abc', NULL, NULL, NULL, 'dfdf', '123', NULL, 'abcd@gmail.com', '$2y$10$BIKdYXBlmIe.piNrqHUaXe9NxtZTIV8NBgAY5X2zsev54IPXYeKXW', NULL, '2022-01-22 06:42:09', '2022-01-22 06:55:59', 0, 0, 'ed451ab7993c6444db217d0734f582ac', 'Yes'),
(14, 'Numan Talukder', NULL, NULL, NULL, '187 Merselis Avenue', '8622192492', NULL, 'numantalukder1001@gmail.com', '$2y$10$aXuEoUBrrV8wGpDA8G15j.DAhcFJwcwfMxOisyYnSYwnhhnd6hnO.', NULL, '2022-01-22 08:45:01', '2022-01-22 08:45:01', 0, 0, 'f22b08d60c87fcec71f818f05527c139', 'Yes'),
(15, 'Al-Amin', NULL, NULL, NULL, 'House- 33, road- 10, block- B, Bashundhara R/A', '01741132009', NULL, 'alaminm707@gmail.com', '$2y$10$c9GG8TaRm/IHSSKW2G3CiunWLQKFgBW6VAGYrsODd/VPzGISMujgi', NULL, '2022-02-13 15:08:16', '2022-02-13 15:13:31', 0, 0, '7cfa157327fb9f06ab2bf643960c10dd', 'Yes'),
(16, 'JISAN', NULL, NULL, NULL, 'House: 45; Road: 12; Sector: 12; Uttara, Dhaka', '01748990380', NULL, 'talukderjisan4@gmail.com', '$2y$10$O4Hvq6rq3lOtORu6V5tNmOxEQUaFIgvUEm9hr5dv9uWSyX/uqXNC2', NULL, '2022-02-14 12:56:38', '2022-02-14 12:56:38', 0, 0, 'f2de969fc0b39aa44a65cd88ad2883ad', 'No'),
(17, 'Numan Talukder', NULL, NULL, NULL, '187 Merselis Avenue', '8622192492', NULL, 'hemito7215@chatich.com', '$2y$10$ZHsgUvLgcFll6Z5EwxYJ3ORelg0SnNqQ8uPVVYgMXYmQwPmvGH4Ka', NULL, '2022-02-14 13:01:37', '2022-02-14 13:01:37', 0, 0, '3015994857d2c7b326074c3fd9695754', 'No'),
(18, 'ANNUR ANE', NULL, NULL, NULL, 'Jessore', '45464', NULL, 'annurane.jes@gmail.com', '$2y$10$QeYhWbbtzcRyYViL/6O66uX6tMLFVe1c7gWT0mTF42K0JgAENO3v.', NULL, '2022-02-14 13:05:03', '2022-02-14 13:05:03', 0, 0, 'b5dc7b64b62dbbad7d4569b786715dbd', 'No'),
(19, 'Snsn', NULL, NULL, NULL, 'Dndn', '4949', NULL, 'dnd@gmail.com', '$2y$10$6dHXgdnQvnqr2F4Mpw5yYe9uhL4UaKKOEHD8QgJbunjwY25TXxemS', NULL, '2022-02-14 13:13:27', '2022-02-14 13:13:27', 0, 0, 'e2871c02027d7463dada6123b7d7315f', 'No'),
(20, 'Numan', NULL, NULL, NULL, 'House: 14-16, Road: 17, Sector: 12, Uttara', '01716687916', NULL, 'numan111@gmail.com', '$2y$10$RJcGczy1KRGzDN2cV2sD/e/orZ.yCxB3iH.UrGSfKmPvV3UoUOeiG', NULL, '2022-02-14 13:17:56', '2022-02-14 13:17:56', 0, 0, 'b473873447555f3c78a7023c246bb99b', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` int(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `campaign_id` int(191) DEFAULT NULL,
  `withdraw_id` int(191) DEFAULT NULL,
  `conversation_id` int(11) DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('campaign','Payout','Withdraw','message') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_notifications`
--

INSERT INTO `user_notifications` (`id`, `user_id`, `campaign_id`, `withdraw_id`, `conversation_id`, `is_read`, `created_at`, `updated_at`, `type`) VALUES
(17, 6, 71, NULL, NULL, 1, '2021-12-19 02:04:55', '2021-12-19 03:06:45', 'campaign'),
(18, 6, 72, NULL, NULL, 1, '2021-12-24 10:15:31', '2021-12-31 09:46:19', 'campaign'),
(19, 6, 77, NULL, NULL, 1, '2022-01-22 09:00:40', '2022-01-22 09:03:49', 'campaign'),
(20, 11, 76, NULL, NULL, 1, '2022-01-22 09:00:40', '2022-01-27 18:02:14', 'campaign'),
(21, 6, 77, NULL, NULL, 1, '2022-01-22 09:00:43', '2022-01-22 09:03:49', 'campaign'),
(22, 13, 75, NULL, NULL, 0, '2022-01-22 09:00:43', '2022-01-22 09:00:43', 'campaign'),
(23, 6, 77, NULL, NULL, 1, '2022-01-22 09:00:46', '2022-01-22 09:03:49', 'campaign'),
(24, 13, 73, NULL, NULL, 0, '2022-01-22 09:00:46', '2022-01-22 09:00:46', 'campaign'),
(25, 13, 75, NULL, NULL, 0, '2022-01-22 09:00:47', '2022-01-22 09:00:47', 'campaign'),
(26, 13, 74, NULL, NULL, 0, '2022-01-22 09:00:58', '2022-01-22 09:00:58', 'campaign'),
(28, 11, 83, NULL, NULL, 1, '2022-02-08 03:50:53', '2022-02-08 03:51:24', 'campaign'),
(29, 15, NULL, NULL, 9, 1, '2022-02-13 15:15:33', '2022-02-13 15:16:08', 'message'),
(30, 15, NULL, NULL, 10, 1, '2022-02-13 15:24:56', '2022-02-13 15:25:00', 'message'),
(31, 15, 88, NULL, NULL, 1, '2022-02-13 15:27:12', '2022-02-13 15:27:32', 'campaign'),
(32, 15, NULL, NULL, 9, 1, '2022-02-14 10:27:05', '2022-02-14 11:26:35', 'campaign'),
(33, 6, NULL, NULL, 11, 1, '2022-02-14 10:28:59', '2022-02-15 04:16:17', 'message'),
(34, 15, 89, NULL, NULL, 1, '2022-02-14 11:28:25', '2022-02-14 11:28:29', 'campaign'),
(35, 15, NULL, NULL, 12, 1, '2022-02-14 13:15:43', '2022-02-15 12:38:15', 'message'),
(36, 15, NULL, NULL, 9, 1, '2022-02-15 04:21:39', '2022-02-15 12:38:15', 'campaign'),
(37, 6, 90, NULL, NULL, 1, '2022-02-15 09:54:06', '2022-02-15 10:07:49', 'campaign'),
(38, 1, NULL, NULL, 16, 0, '2022-02-15 10:09:53', '2022-02-15 10:09:53', 'message'),
(39, 20, 91, NULL, NULL, 0, '2022-02-15 10:10:42', '2022-02-15 10:10:42', 'campaign');

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` int(191) NOT NULL,
  `user_id` int(191) DEFAULT NULL,
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `swift` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `campaign_id` int(11) NOT NULL,
  `fee` float DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('pending','completed','rejected') NOT NULL DEFAULT 'pending',
  `type` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdraws`
--

INSERT INTO `withdraws` (`id`, `user_id`, `method`, `acc_email`, `iban`, `country`, `acc_name`, `address`, `swift`, `reference`, `amount`, `campaign_id`, `fee`, `created_at`, `updated_at`, `status`, `type`) VALUES
(8, 0, 'Paypal', 'alaminm707@gmail.com', NULL, NULL, NULL, NULL, NULL, 'A', 7.7, 89, 2.3, '2022-02-15 10:14:36', '2022-02-15 10:14:36', 'completed', 'user'),
(9, 15, 'Paypal', '01741132009', NULL, NULL, NULL, NULL, NULL, '/', 7.7, 89, 2.3, '2022-02-15 10:18:08', '2022-02-15 10:18:08', 'pending', 'user'),
(10, 6, 'Paypal', 'numantalukder@ymail.com', NULL, NULL, NULL, NULL, NULL, NULL, 95, 90, 5, '2022-02-15 15:56:48', '2022-02-15 15:56:48', 'pending', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_languages`
--
ALTER TABLE `admin_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user_conversations`
--
ALTER TABLE `admin_user_conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user_messages`
--
ALTER TABLE `admin_user_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `callback_messages`
--
ALTER TABLE `callback_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalsettings`
--
ALTER TABLE `generalsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_counters`
--
ALTER TABLE `home_counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagesettings`
--
ALTER TABLE `pagesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seotools`
--
ALTER TABLE `seotools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialsettings`
--
ALTER TABLE `socialsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_providers`
--
ALTER TABLE `social_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_languages`
--
ALTER TABLE `admin_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_user_conversations`
--
ALTER TABLE `admin_user_conversations`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `admin_user_messages`
--
ALTER TABLE `admin_user_messages`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `callback_messages`
--
ALTER TABLE `callback_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `generalsettings`
--
ALTER TABLE `generalsettings`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_counters`
--
ALTER TABLE `home_counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pagesettings`
--
ALTER TABLE `pagesettings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seotools`
--
ALTER TABLE `seotools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `socialsettings`
--
ALTER TABLE `socialsettings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_providers`
--
ALTER TABLE `social_providers`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
