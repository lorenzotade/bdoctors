-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Creato il: Ago 04, 2021 alle 09:15
-- Versione del server: 5.7.32
-- Versione PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_doctors`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `object` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `object`, `email`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gianni', 'Prescrizione', 'gianni@gmail.com', 'Buonasera Dottore, le scrivo per chiederle cortesemente se potrebbe ripetermi il nome dei farmaci prescritti. Non riesco bene a leggere la sua scrittura. Grazie.', '2021-08-03 17:32:42', '2021-08-03 17:32:42'),
(2, 2, 'Mario S.', 'Ricordo l\'appuntamento', 'mario.s@gmail.com', 'Buonasera Dottoressa, volevo solo ricordarle di ricordarmi l\'appuntamento il giorno precedente allo stesso.', '2021-08-03 17:46:36', '2021-08-03 17:46:36'),
(3, 2, 'Gigi', 'Mi fanno male le ossa', 'gigi@gmail.com', 'Buongiorno Dottoressa, volevo chiederle quando fosse disponibile per un appuntamento.', '2021-08-03 17:49:54', '2021-08-03 17:49:54'),
(4, 3, 'Luca', 'Appuntamento urgente', 'luca@gmail.com', 'Buonasera Dottoressa, volevo chiedere la sua disponibilità per appuntamenti ad agosto. Grazie', '2021-08-03 18:05:45', '2021-08-03 18:05:45'),
(5, 3, 'Nello', 'Richiesta', 'nello@gmail.com', 'Dottoressa volevo chiederle se lei curasse solo bambini o anche adulti. Grazie.', '2021-08-03 18:07:00', '2021-08-03 18:07:00'),
(6, 4, 'Alessandro', 'Ancora', 'ale@gmail.com', 'Ciao, quando sei disponibile per un nuovo incontro?', '2021-08-03 18:15:32', '2021-08-03 18:15:32'),
(7, 5, 'Giuseppina', 'Consiglio', 'giuseppina@gmail.com', 'Buongiorno Dottore, le scrivo perché ho sempre il naso che cola. Vorrei venire a fare un test allergico mi dica lei quando. Grazie.', '2021-08-03 18:27:46', '2021-08-03 18:27:46'),
(8, 6, 'Giuseppe', 'Appuntamento', 'giuseppe@gmail.com', 'Buongiornto Dottore, le chiedo quando fosse possibile fissare un appuntamento dal momento che avrei urgente bisogno di parlarle.', '2021-08-03 18:37:17', '2021-08-03 18:37:17'),
(9, 7, 'Giafilippo', 'Appuntamento', 'gianfil@gmail.com', 'Salve Dottore, quando avrebbe tempo per un consulto? A presto.', '2021-08-03 18:45:50', '2021-08-03 18:45:50'),
(10, 8, 'Maria Roberta', 'Messaggio importante', 'mariaroberta@gmail.com', 'Buonasera dottore mi contatti al più presto ho bisogno di parlarle.', '2021-08-03 18:57:48', '2021-08-03 18:57:48'),
(11, 9, 'Barbie', 'Dottore per favore', 'barbie@gmail.com', 'Dottore per favore risponda ai miei messaggi ho un urgente bisogno di lei', '2021-08-03 19:12:39', '2021-08-03 19:12:39'),
(12, 10, 'Gerardo', 'Complimenti ancora', 'gerardo@gmail.com', 'Dottore volevo ringraziarla anche per messaggio per l\'ottimo lavoro che ha svolto sul mio corpo! Grazie e a presto!', '2021-08-04 04:42:05', '2021-08-04 04:42:05'),
(13, 11, 'Giusy', 'Prossima visita', 'giusy@gmail.com', 'Buongiorno Dottoressa volevo solo chiederle di ricordarmi la prossima visita dal momento che ho perso il biglietto. Grazie.', '2021-08-04 04:52:48', '2021-08-04 04:52:48'),
(14, 12, 'Ollio', 'Cura pesante', 'ollio@gmail.com', 'Buonasera Dottore, volevo informarla che la cura da lei prescrittami è davvero pesante. Mi contatti per discuterne.', '2021-08-04 05:14:06', '2021-08-04 05:14:06'),
(15, 14, 'Giulietta', 'Dottore grazie', 'giulietta@gmail.com', 'Dottore la ringrazio molto per l\'umanità dimostrata. Attendo con ansia il prossimo appuntamento.', '2021-08-04 06:25:12', '2021-08-04 06:25:12'),
(16, 13, 'Leopoldo', 'Appuntamento', 'leopoldo@gmail.com', 'Buonasera Dottore, vorrei prendere un appuntamento con me stes..... con lei intendo.', '2021-08-04 06:29:29', '2021-08-04 06:29:29'),
(17, 15, 'Genoveffa', 'Appuntamento urgente', 'genoveffa@gmail.com', 'Buongiorno Dottore, le scrivo per fissare un appuntamento urgente appena avesse tempo. Attendo sue notizie. Grazie.', '2021-08-04 06:43:07', '2021-08-04 06:43:07'),
(18, 17, 'Nestore', 'Prossimo appuntamento', 'nestore@gmail.com', 'Dottore si ricordi di mandarmi il promemoria per il prossimo appuntamento per favore.', '2021-08-04 06:59:11', '2021-08-04 06:59:11');

-- --------------------------------------------------------

--
-- Struttura della tabella `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(159, '2014_10_12_000000_create_users_table', 1),
(160, '2014_10_12_100000_create_password_resets_table', 1),
(161, '2019_08_19_000000_create_failed_jobs_table', 1),
(162, '2021_07_15_152316_create_specs_table', 1),
(163, '2021_07_15_154649_create_user_spec_table', 1),
(164, '2021_07_19_092026_create_services_table', 1),
(165, '2021_07_19_094336_create_profiles_table', 1),
(166, '2021_07_19_123825_create_reviews_table', 1),
(167, '2021_07_19_124649_create_messages_table', 1),
(168, '2021_07_19_125606_create_sponsorships_table', 1),
(169, '2021_07_19_130159_create_user_sponsorship_table', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `education` text COLLATE utf8mb4_unicode_ci,
  `experience` text COLLATE utf8mb4_unicode_ci,
  `telephone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `education`, `experience`, `telephone`, `cellphone`, `picture`, `created_at`, `updated_at`) VALUES
(1, 1, '- Specializzazione in Oncologia, Università di Bologna, 2019 \r\n- Laurea in Medicina, Università di Bologna, 2014', '- Ospedale Sant\'Orsola, Bologna, 2014-presente\r\n- Ospedale Maggiore, Bologna, 2008-2014', '0386757000', '3407504101', 'profile_pictures/i1gVhYDe4b3BOgpHGO51zrSPotSxNSlIlcIznaD5.png', '2021-08-03 17:11:44', '2021-08-03 17:20:01'),
(2, 2, '- Specializzazione in Reumatologia, Università di Milano, 2017\r\n- Laurea in Medicina, Università di Milano, 2012', '- Ospedale Niguarda, 2012-presente\r\n- Ospdale Sant\'Ambrogio, 2006-2012', '02658294910', '3337651456', 'profile_pictures/4qiJmyMWWyA7RFU0CcCHtdS4qnA0VE113kNewMdg.png', '2021-08-03 17:42:43', '2021-08-03 17:42:43'),
(3, 3, '- Specializzazione in Pediatria, Università di Milano, 2020\r\n- Laurea in Medicina, Università di Milano, 2014', '- Policlinico, Milano, 2014-presente\r\n- Ospedale San Carlo Borromeo, Milano, 2008-2014', '02784395712', '3407588145', 'profile_pictures/RGvCg0VwZbv1wLNRP1bIuuxrUdsuUMHHA0Ix1WJ2.png', '2021-08-03 17:59:01', '2021-08-03 17:59:01'),
(4, 4, '- Specializzazione in Urologia, Università di Modena e Reggio Emilia, 2019\r\n- Laurea in Medicina, Università di Modena e Reggio Emilia, 2013', '- Ospedale di Baggiovara, Modena, 2013-presente\r\n- Ospedale Policlinico, Modena, 2006-2013', '05932478456', '3215689245', 'profile_pictures/CJtHinXtJIAv04bBFG3Kd3qbtGUhw9FBjcQyDjcU.png', '2021-08-03 18:13:11', '2021-08-03 18:13:11'),
(5, 5, '- Specializzazione in Allergologia, Università di Potenza, 2021\r\n- Laurea in Medicina, Università di Potenza, 2015', '- Policlinico, Potenza, 2015-presente', '08953468123', '3458720943', 'profile_pictures/BxEEq9fB3OCgHo9vBOiCNSIGPEqXEPwoqyQbHJxq.png', '2021-08-03 18:23:56', '2021-08-03 18:23:56'),
(6, 6, '- Specializzazione in Psicologia, Università di Ancona, 2014\r\n- Laurea in Medicina, Università di Ancona, 2008', 'Ospedale di Ancona, Ancona, 2008-presente\r\nOspedale di Falconara Marittima, Falconara Marittima, 2003-2008', '07548834712', '3250865381', 'profile_pictures/kNp53EQikZv1GrozvpMvDTurzmCT117mVh6ai8DU.png', '2021-08-03 18:31:56', '2021-08-03 18:31:56'),
(7, 7, '- Specializzazione in Neurologia, Università di Sassari, 2020\r\n- Laurea in Medicina, Università di Sassari, 2015', '- Ospedale Samaritano, Sassari, 2015-presente\r\n- Ospedale Mura Alte, Olbia, 2009-2015', '05762168461', '3247592576', 'profile_pictures/YluqTg8pnJ0QXOElALuM449sWbpIIGiFdQSyndC3.png', '2021-08-03 18:41:49', '2021-08-03 18:41:49'),
(8, 8, '- Specializzazione in Dermatologia, Università di Milano, 2018\r\n- Laurea in Medicina, Università di Milano, 2013', '- Ospedale Fatebenefratelli, Milano, 2013-presente\r\n-Ospedale San Paolo, Milano, 2007-2013', '02348713098', '3406531267', 'profile_pictures/wPwa2gh071Fo8ExLFSvOnLGhG4y9icskgPpwacwm.png', '2021-08-03 18:54:25', '2021-08-03 18:54:25'),
(9, 9, '- Specializzazione in Urologia e Odontoiatria, Università di Varese, 2015\r\n- Laurea in Medicina, Università di Milano, 2010', '- Ospedale San Raffaele, Milano, 2010-presente\r\n- Ospedale Varesotto, Varese, 2004-2010', '07563482093', '3219754083', 'profile_pictures/6AHyN5KRhWU17JKk8ae4rBRleFCjBqfowxHOm9CV.png', '2021-08-03 19:01:15', '2021-08-03 19:01:15'),
(10, 10, '- Specializzazione in Ortopedia, Università di Verona, 2014\r\n- Laurea in Medicina, Università di Verona, 2009', '- Ospedale Borgo Trento, Verona, 2009-presente\r\n- Ospedale Militare, Verona, 2003-2009', '04572310634', '3268704120', 'profile_pictures/GOF5cPwLiLwYsR2eVobNQEz8dWpMnj9bDmV9QUCk.png', '2021-08-04 04:32:12', '2021-08-04 04:32:12'),
(11, 11, '- Specializzazione in Odontoiatria, Università di Pavia, 2017\r\n- Laurea in Medicina, Università di Pavia, 2012', '- Ospedale San Giuseppe, Milano, 2012-presente\r\n- Ospedale San Raffaele, 2006-2012', '02784395712', '3495628709', 'profile_pictures/O4PcZ0e6JOd0MXe2ddAvSzxq1Q9gNDLAnASU3qxY.jpg', '2021-08-04 04:46:41', '2021-08-04 04:46:41'),
(12, 12, '- Specializzazione in Neurologia, Università La Sapienza, 2018\r\n- Laurea in Medicina, Università La Sapienza, 2013', '- Ospedale Sant\'Eugenio, Roma, 2013-presente\r\n- Ospedale Cristo Re, Roma, 2007-2013', '06342861056', '3450931877', 'profile_pictures/lw45gDZsH8uL1ZaaruPfcBc4SWznYHEMtIPhtXCz.jpg', '2021-08-04 05:01:29', '2021-08-04 05:01:29'),
(13, 13, '- Specializzazione in Pediatria, Unversità di Verona, 2021\r\n- Laurea in Medicina, Università di Verona, 2016', '- Ospedale Borgo Roma, Verona, 2016-presente\r\n- Ospedale Privato, Verona, 2010-2016', '06793694667', '3247769901', 'profile_pictures/Y9U0iUb6aCNW2ADh0vcXSsJ5eJqwAPdK9hfRSY48.png', '2021-08-04 05:19:47', '2021-08-04 05:19:47'),
(14, 14, '- Specializzazione in Psichiatria, Università La Sapienza, 2017\r\n- Laurea in Medicina, Università La Sapienza, 2012', '- Presidio Nuovo Regina Margherita, Roma, 2012-presente\r\n- Ospedale Cristo Re, Roma, 2006-2012', '06883245112', '3407582444', 'profile_pictures/bsHaBXaD8A8JZaCMjeBYrojDmcGMQMLRvTcZjY4c.jpg', '2021-08-04 05:52:32', '2021-08-04 06:22:47'),
(15, 15, '- Specializzazione in Ginecologia, Università Cattolica di Milano, 2016\r\n- Laurea in Medicina, Università Cattolica di Milano, 2011', '- Ospedale Oftalmico, Milano, 2011-presente\r\n- Ospedale Niguarda, Milano, 2005-2011', '02887711009', '3468829911', 'profile_pictures/dW0eN7aM6wefHy6qyTax2RSzZIqTXtAGwbZpW3IS.png', '2021-08-04 06:40:12', '2021-08-04 06:40:12'),
(16, 16, '- Specializzazione in Dermatologia, Università La Sapienza, 2011\r\n- Laurea in Medicina, Università La Sapienza, 2006', '- Ospedale Santo Spirito, Roma, 2006-presente\r\n- Ospedale San Camillo Forlanini, Roma, 2000-2006', '06553211886', '3459962311', 'profile_pictures/6WiQdTfl04B9uEJwuL4Vqti4seCedlXa3pnCXUoM.png', '2021-08-04 06:47:22', '2021-08-04 06:47:22'),
(17, 17, '- Specializzazione in Odontoiatria, Università La Sapienza, 2013\r\n- Laurea in Medicina, Università La Sapienza, 2008', '- Ospedale Cristo Re, Roma, 2008-presente\r\n- Ospedale Fatebenefratelli, Roma, 2002-2008', '06793694667', '3215689245', 'profile_pictures/FIBk4plDyWohCAH6WClHvmO1SZAMxojbhxPQpmDI.png', '2021-08-04 06:56:32', '2021-08-04 06:56:32'),
(18, 18, '- Specializzazione in Ginecologia e Pronto Soccorso, Università di Milano, 2020\r\n- Laurea in Medicina, Università di Milano, 2015', '- Ospedale San Raffaele, Milano, 2015-presente\r\n- Ospedale Niguarda, Milano, 2009-2015', '02784395712', '3407504101', NULL, '2021-08-04 07:02:21', '2021-08-04 07:02:21'),
(19, 19, '- Specializzazione in Pediatria, Università del Sacro Cuore di Perugia, 2020\r\n- Laurea in Medicina, Università del Sacro Cuore di Perugia, 2015', '- Ospedale di Perugia, Perugia, 2009-presente', '0769347122', '3215689245', NULL, '2021-08-04 07:11:51', '2021-08-04 07:11:51');

-- --------------------------------------------------------

--
-- Struttura della tabella `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vote` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `name`, `title`, `content`, `vote`, `created_at`, `updated_at`) VALUES
(1, 1, 'Roberto', 'Nulla da eccepire', 'Come da titolo non ho nulla da eccepire, professionale. Mani un po\' fredde.', 4, '2021-08-03 17:26:06', '2021-08-03 17:26:06'),
(2, 1, 'Maria Pia', 'Poteva andare meglio', 'Meglio il mio medico solito, il dottor Vittorio. Questo nuovo ha lasciato un poco a desiderare.', 3, '2021-08-03 17:29:11', '2021-08-03 17:29:11'),
(3, 1, 'Augusto', 'Ottimo!', 'Medico molto competente, rassicurante, disponibile!', 5, '2021-08-03 17:29:38', '2021-08-03 17:29:38'),
(4, 1, 'Giovanna', 'Bravo', 'Ottimo professionista, grande umanità.', 5, '2021-08-03 17:30:11', '2021-08-03 17:30:11'),
(5, 1, 'Mario', 'Benissimo', 'Molto disponibile, alla mano... Molto preparato.', 5, '2021-08-03 17:31:40', '2021-08-03 17:31:40'),
(6, 2, 'Filippo', 'Bella persona', 'Molto disponibile a capire le problematiche ed andare a fondo.', 5, '2021-08-03 17:44:37', '2021-08-03 17:44:37'),
(7, 2, 'Roberta', 'Ottimo', 'Ottima professionista, molto cordiale e disponibile. Attenta ai miei bisogni e celere nelle risposte.', 4, '2021-08-03 17:45:07', '2021-08-03 17:45:07'),
(8, 2, 'Simone', 'Nulla da dire', 'Mi è piaciuta molto.', 5, '2021-08-03 17:45:32', '2021-08-03 17:45:32'),
(9, 3, 'Ugo De Ughi', 'Mio figlio ora sta bene', 'Molto professionale ed esauriente.', 5, '2021-08-03 18:01:52', '2021-08-03 18:01:52'),
(10, 3, 'Laura', 'Bene', 'Professionale e precisa.', 5, '2021-08-03 18:03:59', '2021-08-03 18:03:59'),
(11, 3, 'Mariella', 'Benissimo!', 'Disponibile e soprattutto in grado di ascoltare dubbi e perplessità.', 5, '2021-08-03 18:04:24', '2021-08-03 18:04:24'),
(12, 4, 'Lorenzo', 'Tampone doloroso', 'Medico professionale, ma tampone doloroso.', 3, '2021-08-03 18:13:44', '2021-08-03 18:13:44'),
(13, 4, 'Vittorio', 'Mai più', 'Medico professionale, ma non voleva farmi la ricevuta fiscale.', 2, '2021-08-03 18:14:11', '2021-08-03 18:14:11'),
(14, 4, 'Corrado', 'Incubo', 'Con la scusa del tampone ha tentato di toccarmi. Penso sporgerò denuncia alle autorità competenti.', 1, '2021-08-03 18:14:56', '2021-08-03 18:14:56'),
(15, 5, 'Luca', 'Bravo bravo', 'Ottimo medico, professionale il giusto.', 5, '2021-08-03 18:24:47', '2021-08-03 18:24:47'),
(16, 5, 'Alfonso', 'Professionale', 'Una bravissima persona che svolge il suo lavoro con tanta professione.', 5, '2021-08-03 18:26:19', '2021-08-03 18:26:19'),
(17, 5, 'Giulio', 'Ottimo', 'Molto disponibile e cortese.', 4, '2021-08-03 18:26:51', '2021-08-03 18:26:51'),
(18, 6, 'Rosanna', 'Bene benissimo', 'Esperienza liberatoria. Con poche parole semplici e chiare, mi aiutato a riflettere su aspetti del mio problema che non avevo colto prima. Sono soddisfatta.', 5, '2021-08-03 18:34:41', '2021-08-03 18:34:41'),
(19, 6, 'Alessio', 'Eccezionale', 'Serio, disponibile e garbato. Mi sono sentito a mio agio quando ho iniziato a parlare della mia situazione un po\' ingarbugliata. Mi è piaciuto anche molto lo studio che ho trovato luminoso e accogliente.', 5, '2021-08-03 18:35:58', '2021-08-03 18:35:58'),
(20, 6, 'Franca', 'Bene', 'Non è la prima volta che vado da a uno psicologo. Ho apprezzato di lui il suo approccio schietto, sincero e non giudicante. Mi sono sentita di poter parlare dei casini che ho nella mia vita.', 4, '2021-08-03 18:36:27', '2021-08-03 18:36:27'),
(21, 7, 'Robertino', 'Ottimo', 'Ottimo medico, molto valido sotto il profilo professionale e molto disponibile sul piano umano. Giudizio molto positivo.', 5, '2021-08-03 18:43:48', '2021-08-03 18:43:48'),
(22, 7, 'Francesca', 'Non tanto bene', 'Non mi sono trovata per niente bene, mi dispiace ammetterlo.', 1, '2021-08-03 18:44:17', '2021-08-03 18:44:17'),
(23, 7, 'Alfredo', 'Bene dai', 'Ottimo medico. Chiaro. Gentile. Preparato.', 4, '2021-08-03 18:44:44', '2021-08-03 18:44:44'),
(24, 8, 'Agilulfo', 'Bene ma non benissimo', 'Professionale, disponibile e socievole.', 4, '2021-08-03 18:56:10', '2021-08-03 18:56:10'),
(25, 8, 'Astolfo', 'Bene tutto sommato', 'Gentile e cordiale, mette a proprio agio di fronte ai problemi e disagi fisici.', 5, '2021-08-03 18:56:35', '2021-08-03 18:56:35'),
(26, 8, 'Donatella', 'Bene bene', 'Gentile, ha la pazienza, i suoi spiegazioni della malatia, le ricette, medicina dottore era precizo pieno di informazioni.', 5, '2021-08-03 18:57:06', '2021-08-03 18:57:06'),
(27, 9, 'Benito', 'Dritto al punto', 'Un vero professionista del settore! Persona solare e cortese! Super consigliato!!!', 5, '2021-08-03 19:05:53', '2021-08-03 19:05:53'),
(28, 9, 'Delfino', 'Mica tanto', 'Poco comunicativo sbrigativo per nulla empatico.', 1, '2021-08-03 19:10:41', '2021-08-03 19:10:41'),
(29, 9, 'Gaia', 'Bene', 'Disponibile e competente. Esaustivo nelle spiegazioni. Un professionista.', 4, '2021-08-03 19:11:23', '2021-08-03 19:11:23'),
(30, 9, 'Federico', 'Ottimo', 'Ottimo medico, sono rimasto molto soddisfatto.', 5, '2021-08-03 19:11:49', '2021-08-03 19:11:49'),
(31, 10, 'Gennaro', 'Ottimo dottore', 'Molto disponibile, estremamente chiaro nella esposizione del problema e delle soluzioni necessarie per risolverlo.', 5, '2021-08-04 04:39:09', '2021-08-04 04:39:09'),
(32, 10, 'Giosuè', 'Benissimo', 'Professionale, molto preparato, cortese e esaustivo nelle spiegazioni.', 5, '2021-08-04 04:39:50', '2021-08-04 04:39:50'),
(33, 10, 'Gerardo', 'Nulla da dire', 'Il dottore mi è parso pronto ad ascoltare le mie esigenze e problematiche. Ha soddisfatto le mie aspettative.', 4, '2021-08-04 04:40:26', '2021-08-04 04:40:26'),
(34, 11, 'Maria Crocifissa', 'Ottimo', 'Molto professionale, misure anti covid applicate con scrupolo. Grande affidabilità.', 5, '2021-08-04 04:50:31', '2021-08-04 04:50:31'),
(35, 11, 'Giusy', 'Bene', 'Studio molto accogliente. Soddisfatta per la professionalità e rapporto qualità/prezzo.', 4, '2021-08-04 04:51:00', '2021-08-04 04:51:00'),
(36, 11, 'Ornella', 'OK!!', 'Dottoressa molto paziente, gentile e preparata! La consiglio a tutti!', 5, '2021-08-04 04:51:37', '2021-08-04 04:51:37'),
(37, 12, 'Albertina', 'Bene', 'Ottimo medico scrupoloso e gentile. Mi sono trovata a mio agio. Sto seguendo la cura che mi ha prescritto…..sono fiduciosa!', 5, '2021-08-04 05:10:56', '2021-08-04 05:10:56'),
(38, 12, 'Alberto', 'Ottimo', 'Medico preparato, meticoloso e con un’elevata attitudine relazionale.', 5, '2021-08-04 05:11:50', '2021-08-04 05:11:50'),
(39, 12, 'Goffredo', 'Ottimissimo', 'Perfetto! Dottore bravissimo, competente e super disponibile!', 5, '2021-08-04 05:13:17', '2021-08-04 05:13:17'),
(40, 13, 'Marco', 'Mio figlio ora sta bene', 'Il Dott. Nanti si è dimostrato molto competente e professionale, ha risposto in modo esaustivo alle nostre domande e, cosa forse più importante, ci ha subito fatto sentire a nostro agio, riuscendo addirittura a piacere a nostro figlio, da sempre poco amante dei medici.', 5, '2021-08-04 05:23:43', '2021-08-04 05:23:43'),
(41, 14, 'Roberto', 'Ha curato tutte le mie paturnie', 'Grande esperienza e competenza. Grande disponibilità all\'ascolto.', 5, '2021-08-04 06:23:41', '2021-08-04 06:23:41'),
(42, 14, 'Francesco', 'Bene', 'Preparato, chiaro nelle spiegazioni e assolutamente disponibile.', 5, '2021-08-04 06:24:03', '2021-08-04 06:24:03'),
(43, 14, 'Giulietta', 'OK!!!', 'Attento, molto cordiale  Ti fa sentire a proprio agio e le spiegazioni date semplici e concise.', 4, '2021-08-04 06:24:30', '2021-08-04 06:24:30'),
(44, 13, 'Marino', 'Perfetto', 'Grazie alle cure del Dott. Nanti la mia seconda figlia si è ripresa e non ho timore a dire che da oggi è come se fosse la mia prima figlia.', 5, '2021-08-04 06:28:21', '2021-08-04 06:28:21'),
(45, 13, 'Lidia', 'Bene', 'Tutto bene, ma forse era meglio se lasciavamo perdere.', 3, '2021-08-04 06:28:50', '2021-08-04 06:28:50'),
(46, 15, 'Aurora', 'Ottimo', 'Medico professionale ed esaustivo.', 5, '2021-08-04 06:41:01', '2021-08-04 06:41:01'),
(47, 15, 'Filomena', 'Ottimo dottore', 'Nulla da dire, mi ha saputo mettere a mio agio ed è stato molto professionale.', 5, '2021-08-04 06:41:34', '2021-08-04 06:41:34'),
(48, 15, 'Augustina', 'Bene', 'Nulla da eccepire su di un medico così preparato!', 4, '2021-08-04 06:42:07', '2021-08-04 06:42:07'),
(49, 16, 'Gianroberto', 'Bene tutto sommato', 'Molto chiaro, professionale e gentile.', 4, '2021-08-04 06:49:58', '2021-08-04 06:49:58'),
(50, 16, 'Alessio', 'Ottimo', 'Dottore molto disponibile e adcolta attentamente il paziente.', 5, '2021-08-04 06:51:13', '2021-08-04 06:51:13'),
(51, 16, 'Arrigo', 'OK ma poteva andare meglio', 'Non me la sento di commentare, ma dico solo che poteva andare meglio come visita.', 3, '2021-08-04 06:51:50', '2021-08-04 06:51:50'),
(52, 17, 'Ettore', 'Ottimo dottore', 'Professionale, gentile, empatico.', 5, '2021-08-04 06:57:32', '2021-08-04 06:57:32'),
(53, 17, 'Achille', 'Non molto bene', 'Non mi sono trovato per niente bene con questo dottore. Non lo consiglio.', 2, '2021-08-04 06:58:01', '2021-08-04 06:58:01'),
(54, 17, 'Nestore', 'Dai va bene', 'Buon dottore, buon rapporto qualità-prezzo.', 4, '2021-08-04 06:58:37', '2021-08-04 06:58:37'),
(55, 18, 'Lorenzo', 'Una certezza', 'Ho avuto bisogno della Dott.ssa Napoli un paio di volte negli ultimi mesi e devo dire che è una certezza. Consigliatissima.', 5, '2021-08-04 07:04:51', '2021-08-04 07:04:51'),
(56, 18, 'Nello', 'Ottima', 'Non ho nulla da dire a parte che la consiglierei a tutti!', 5, '2021-08-04 07:05:17', '2021-08-04 07:05:17'),
(57, 18, 'Faustina', 'Che dire, eccellente', 'Mai trovato una dottoressa così capace e in grado di trasmettere sicurezza.', 5, '2021-08-04 07:07:13', '2021-08-04 07:07:13'),
(58, 19, 'Mario', 'Empatico', 'Ottimo medico, riesce a trasmettere un senso di empatia verso i bambini eccezionale.', 5, '2021-08-04 07:12:41', '2021-08-04 07:12:41'),
(59, 19, 'Massimo', 'Mai trovato uno così', 'Penso che non cambieremo mai più dottore, ha curato l\'allergia di mio figlio in pochissimo tempo! Grazie!', 5, '2021-08-04 07:13:31', '2021-08-04 07:13:31'),
(60, 19, 'Ugo De Ughi', 'Ottimo', 'Molto bravo, simpatico coi bambini.', 4, '2021-08-04 07:14:17', '2021-08-04 07:14:17');

-- --------------------------------------------------------

--
-- Struttura della tabella `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `services`
--

INSERT INTO `services` (`id`, `user_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Prima visita', 200.00, '2021-08-03 17:11:44', '2021-08-03 17:11:44'),
(2, 1, 'Visita di controllo', 90.00, '2021-08-03 17:11:44', '2021-08-03 17:11:44'),
(3, 2, 'Prima visita', 150.00, '2021-08-03 17:42:43', '2021-08-03 17:42:43'),
(4, 2, 'Visita di controllo', 70.00, '2021-08-03 17:42:43', '2021-08-03 17:42:43'),
(5, 2, 'TSO', 300.00, '2021-08-03 17:42:43', '2021-08-03 17:42:43'),
(6, 3, 'Prima visita', 200.00, '2021-08-03 17:59:01', '2021-08-03 17:59:01'),
(7, 3, 'Spirometria', 50.00, '2021-08-03 17:59:01', '2021-08-03 17:59:01'),
(8, 3, 'Tampone', 40.00, '2021-08-03 17:59:01', '2021-08-03 17:59:01'),
(9, 4, 'Prima visita urologica', 150.00, '2021-08-03 18:13:11', '2021-08-03 18:13:11'),
(10, 5, 'Prima visita', 400.00, '2021-08-03 18:23:56', '2021-08-03 18:23:56'),
(11, 5, 'Test RAST', 250.00, '2021-08-03 18:23:56', '2021-08-03 18:23:56'),
(12, 5, 'Test allergologico base', 170.00, '2021-08-03 18:23:56', '2021-08-03 18:23:56'),
(13, 6, 'Visita psicoterapeutica', 100.00, '2021-08-03 18:31:56', '2021-08-03 18:31:56'),
(14, 6, 'Supporto psicologico', 80.00, '2021-08-03 18:31:56', '2021-08-03 18:31:56'),
(15, 6, 'Consulto specialistico', 180.00, '2021-08-03 18:31:56', '2021-08-03 18:31:56'),
(16, 7, 'Prima visita', 200.00, '2021-08-03 18:41:49', '2021-08-03 18:41:49'),
(17, 7, 'TAC', 150.00, '2021-08-03 18:41:49', '2021-08-03 18:41:49'),
(18, 7, 'Scan', 180.00, '2021-08-03 18:41:49', '2021-08-03 18:41:49'),
(19, 8, 'Controllo dermatologico', 120.00, '2021-08-03 18:54:25', '2021-08-03 18:54:25'),
(20, 8, 'Controllo pediatrico', 80.00, '2021-08-03 18:54:25', '2021-08-03 18:54:25'),
(21, 9, 'Prima visita', 140.00, '2021-08-03 19:01:15', '2021-08-03 19:01:15'),
(22, 9, 'Esame della prostata', 180.00, '2021-08-03 19:01:15', '2021-08-03 19:01:15'),
(23, 9, 'Capsule dentali', 900.00, '2021-08-03 19:01:15', '2021-08-03 19:01:15'),
(24, 10, 'Prima visita', 200.00, '2021-08-04 04:32:12', '2021-08-04 04:32:12'),
(25, 10, 'Vista reumatologica', 130.00, '2021-08-04 04:32:12', '2021-08-04 04:32:12'),
(26, 11, 'Otturazione', 180.00, '2021-08-04 04:46:41', '2021-08-04 04:46:41'),
(27, 11, 'Corone', 900.00, '2021-08-04 04:46:41', '2021-08-04 04:46:41'),
(28, 11, 'Igiene dentale', 80.00, '2021-08-04 04:46:41', '2021-08-04 04:46:41'),
(29, 12, 'Prima visita', 160.00, '2021-08-04 05:01:29', '2021-08-04 05:01:29'),
(30, 12, 'Test allergico', 60.00, '2021-08-04 05:01:29', '2021-08-04 05:01:29'),
(31, 12, 'Test neurologico', 120.00, '2021-08-04 05:01:29', '2021-08-04 05:01:29'),
(32, 13, 'Prima visita', 160.00, '2021-08-04 05:19:47', '2021-08-04 05:19:47'),
(33, 13, 'Controllo', 100.00, '2021-08-04 05:19:47', '2021-08-04 05:19:47'),
(34, 14, 'Prima visita', 150.00, '2021-08-04 05:52:32', '2021-08-04 06:22:47'),
(35, 14, 'Consulto psichiatrico', 120.00, '2021-08-04 06:22:47', '2021-08-04 06:22:47'),
(36, 15, 'Prima visita', 200.00, '2021-08-04 06:40:12', '2021-08-04 06:40:12'),
(37, 15, 'Tampone', 60.00, '2021-08-04 06:40:12', '2021-08-04 06:40:12'),
(38, 16, 'Prima visita', 100.00, '2021-08-04 06:47:22', '2021-08-04 06:47:22'),
(39, 16, 'Stick test', 120.00, '2021-08-04 06:47:22', '2021-08-04 06:47:22'),
(40, 17, 'Prima visita', 200.00, '2021-08-04 06:56:32', '2021-08-04 06:56:32'),
(41, 17, 'Consulto psicologico', 120.00, '2021-08-04 06:56:32', '2021-08-04 06:56:32'),
(42, 18, 'Prima visita', 300.00, '2021-08-04 07:02:21', '2021-08-04 07:02:21'),
(43, 18, 'Soccorso', 50.00, '2021-08-04 07:02:21', '2021-08-04 07:02:21'),
(44, 19, 'Prima visita', 150.00, '2021-08-04 07:11:51', '2021-08-04 07:11:51'),
(45, 19, 'Controllo', 70.00, '2021-08-04 07:11:51', '2021-08-04 07:11:51');

-- --------------------------------------------------------

--
-- Struttura della tabella `specs`
--

CREATE TABLE `specs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `specs`
--

INSERT INTO `specs` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Dermatologia', 'dermatologia', '2021-08-03 17:00:42', '2021-08-03 17:00:42'),
(2, 'Pediatria', 'pediatria', '2021-08-03 17:00:42', '2021-08-03 17:00:42'),
(3, 'Urologia', 'urologia', '2021-08-03 17:00:42', '2021-08-03 17:00:42'),
(4, 'Odontoiatria', 'odontoiatria', '2021-08-03 17:00:42', '2021-08-03 17:00:42'),
(5, 'Ginecologia', 'ginecologia', '2021-08-03 17:00:42', '2021-08-03 17:00:42'),
(6, 'Neurologia', 'neurologia', '2021-08-03 17:00:42', '2021-08-03 17:00:42'),
(7, 'Psicologia', 'psicologia', '2021-08-03 17:00:42', '2021-08-03 17:00:42'),
(8, 'Psichiatria', 'psichiatria', '2021-08-03 17:00:42', '2021-08-03 17:00:42'),
(9, 'Geriatria', 'geriatria', '2021-08-03 17:00:42', '2021-08-03 17:00:42'),
(10, 'Oncologia', 'oncologia', '2021-08-03 17:00:42', '2021-08-03 17:00:42'),
(11, 'Allergologia', 'allergologia', '2021-08-03 17:00:42', '2021-08-03 17:00:42'),
(12, 'Ortopedia', 'ortopedia', '2021-08-03 17:00:42', '2021-08-03 17:00:42'),
(13, 'Reumatologia', 'reumatologia', '2021-08-03 17:00:42', '2021-08-03 17:00:42');

-- --------------------------------------------------------

--
-- Struttura della tabella `sponsorships`
--

CREATE TABLE `sponsorships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` smallint(6) NOT NULL,
  `price` double(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `sponsorships`
--

INSERT INTO `sponsorships` (`id`, `name`, `duration`, `price`, `created_at`, `updated_at`) VALUES
(1, 'bronze', 24, 2.99, '2021-08-03 17:00:42', '2021-08-03 17:00:42'),
(2, 'silver', 72, 5.99, '2021-08-03 17:00:42', '2021-08-03 17:00:42'),
(3, 'gold', 144, 9.99, '2021-08-03 17:00:42', '2021-08-03 17:00:42');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `slug`, `street`, `city`, `postal_code`, `gender`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lorenzo', 'Tade\'', 'lorenzo-tade', 'Via Martiri della Libertà 27', 'San Giovanni del Dosso', '46020', 0, 'lorenzo.tade@gmail.com', NULL, '$2y$10$TMAEJuXz7MZLglH2BEE9n.M7PKdxB94jgEWkfPVq9puSMBmOvBLAm', NULL, '2021-08-03 17:02:29', '2021-08-03 17:02:29'),
(2, 'Donata', 'Casalini', 'donata-casalini', 'Via Stretta 2', 'Piacenza', '29121', 1, 'donata.casalini@gmail.com', NULL, '$2y$10$1FwODzD2lXys3M7Iql9R9.alKS53JvcirLgGemQzf4i.wWYwflc7y', NULL, '2021-08-03 17:38:27', '2021-08-03 17:38:27'),
(3, 'Isabella', 'Nita', 'isabella-nita', 'Via dei Colli 4', 'Milano', '20019', 1, 'isabella.nita@gmail.com', NULL, '$2y$10$AD.eOpfHrP6BgBoh17jnyOs1mPt6.IkIeTPGjyRtjzRSVPcnXwrha', NULL, '2021-08-03 17:56:06', '2021-08-03 17:56:06'),
(4, 'Marco', 'Manelli', 'marco-manelli', 'Via Palladio 13', 'Reggio Emilia', '43054', 0, 'marco.manelli@gmail.com', NULL, '$2y$10$4QSStvtvB2eWYX5TdqJjK.dP7CjRdn2Xa4pazqRMr3DaeQxpvDnLG', NULL, '2021-08-03 18:08:23', '2021-08-03 18:08:23'),
(5, 'Luca', 'Logallo', 'luca-logallo', 'Via dei Peri 43', 'Potenza', '65032', 0, 'luca.logallo@gmail.com', NULL, '$2y$10$0SkARxDln2BP7Bo6csFYAet7Tlh/qQxgYWcnxQwspX9VHdYkGb0qi', NULL, '2021-08-03 18:21:35', '2021-08-03 18:21:35'),
(6, 'Ajay', 'Singh Naruka', 'ajay-singh-naruka', 'Via dei Mille 1000', 'Ancona', '44022', 0, 'ajay.naruka@gmail.com', NULL, '$2y$10$xUzJA1W6tBu6lISCcnnJzOebuZsuWPj5oQc.4RYww0l/f589yFmn6', NULL, '2021-08-03 18:29:19', '2021-08-03 18:29:19'),
(7, 'Alessandro', 'Gallus', 'alessandro-gallus', 'Via Sassata 8', 'Sassari', '87043', 0, 'alessandro.gallus@gmail.com', NULL, '$2y$10$dHOHfBVjBB1wtr31QhJ4YOIwCvkQo8RiPzrQrw1rtdC8D4Owq80zi', NULL, '2021-08-03 18:38:17', '2021-08-03 18:38:17'),
(8, 'Corrado', 'Coppolino', 'corrado-coppolino', 'Via Coppi 34', 'Milano', '21045', 0, 'corrado.coppolino@gmail.com', NULL, '$2y$10$H7EYoHanuA6dY.SHv4PEle2mbNnuiDExdJROYdAtBZtli6T3dqC.G', NULL, '2021-08-03 18:49:24', '2021-08-03 18:49:24'),
(9, 'Vittorio', 'Grimaldi', 'vittorio-grimaldi', 'Via dei Liscati 32', 'Varese', '27043', 0, 'vittorio.grimaldi@gmail.com', NULL, '$2y$10$cycaw8csyAQlANLDCVh.5Op3XWTjhptmFuphr57gZRg.NBxdG/v9e', NULL, '2021-08-03 18:58:49', '2021-08-03 18:58:49'),
(10, 'Alessandro', 'Dal Ponte', 'alessandro-dal-ponte', 'Via Ponte Pietra', 'Verona', '32065', 0, 'alessandro.dalponte@gmail.com', NULL, '$2y$10$gtvUCNx3JVeb5JaWCsfGsOJZ1zCXEflHhbFm0AYw1Y8popl3N3CTu', NULL, '2021-08-04 04:27:44', '2021-08-04 04:27:44'),
(11, 'Mary', 'Wang', 'mary-wang', 'Via della Rivoluzione 8', 'Milano', '32087', 1, 'mary.wang@gmail.com', NULL, '$2y$10$lrMjEb5ad/Oj4bRs02i3F.25pbBwazPWyndXpSRk7nA0V4edIimi6', NULL, '2021-08-04 04:43:43', '2021-08-04 04:43:43'),
(12, 'Cosmin', 'Ariton', 'cosmin-ariton', 'Via Bianca 21', 'Roma', '67012', 0, 'cosmin.ariton@gmail.com', NULL, '$2y$10$nekcreBfNLZUueMCVSIuaObvzcrJ9hziT20eJn0wR9sR9of.rjl4W', NULL, '2021-08-04 04:58:20', '2021-08-04 04:58:20'),
(13, 'Leopoldo', 'Nanti', 'leopoldo-nanti', 'Via dei Lucci 12', 'Verona', '27043', 0, 'leopoldo.nanti@gmail.com', NULL, '$2y$10$qSJ3NlajJHtjHMGqKwPxxO9zeJ9EOBI86QqD/94OIRafL.j0WaEJ2', NULL, '2021-08-04 05:15:14', '2021-08-04 05:15:14'),
(14, 'Fabrizio', 'Rozzi', 'fabrizio-rozzi', 'Via dei Gatti 34', 'Roma', '34067', 0, 'fabrizio.rozzi@gmail.com', NULL, '$2y$10$1rNgYcoIp2UVFOzzPzWuOet1ioqA96YFikLT3pv2Y/pqRijMNvNKC', NULL, '2021-08-04 05:50:31', '2021-08-04 05:50:31'),
(15, 'Pietro', 'Visconti', 'pietro-visconti', 'Via Della Scala 29', 'Milano', '21100', 0, 'pietro.visconti@gmail.com', NULL, '$2y$10$iu3uDMdcQ/j7m2.65KEM6.WyNfAGERKmSeycJPfBILDHCuSR49BN.', NULL, '2021-08-04 06:37:54', '2021-08-04 06:37:54'),
(16, 'Simone', 'Arata', 'simone-arata', 'Viale dell\'Agricoltura 34', 'Roma', '43054', 0, 'simone.arata@gmail.com', NULL, '$2y$10$xWzm6kN1Y0KC.IlkyDdZh.tHeQJMATzrMdnOQ.tkZjE6kT0Zv8CNe', NULL, '2021-08-04 06:44:08', '2021-08-04 06:44:08'),
(17, 'Stefano', 'Celi', 'stefano-celi', 'Via Paradiso 45', 'Roma', '45065', 0, 'stefano.celi@gmail.com', NULL, '$2y$10$ytEwEg3/q8c/SXQ/hrGj/OpdEAA5Tkz1H.0mCHlE0jDBkDi65KNba', NULL, '2021-08-04 06:52:52', '2021-08-04 06:52:52'),
(18, 'Giulia', 'Napoli', 'giulia-napoli', 'Via Salvatore 10', 'Milano', '20019', 1, 'giulia.napoli@gmail.com', NULL, '$2y$10$AvTt5dSJYs6ZLQzYmoS1eOuIgeYV/D6JoVdzKJQR/ljlvxfW3zzg.', NULL, '2021-08-04 07:00:33', '2021-08-04 07:00:33'),
(19, 'Roberto', 'Bigozzi', 'roberto-bigozzi', 'Via della Madonna 3', 'Perugia', '40069', 0, 'roberto.bigozzi@gmail.com', NULL, '$2y$10$/TRVnAKQ50pgNt2D4CipJ.yW/c2PELRtXUvPj96SpEZ0ZAWBxKcQy', NULL, '2021-08-04 07:08:56', '2021-08-04 07:08:56');

-- --------------------------------------------------------

--
-- Struttura della tabella `user_spec`
--

CREATE TABLE `user_spec` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `spec_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `user_spec`
--

INSERT INTO `user_spec` (`id`, `user_id`, `spec_id`) VALUES
(1, 1, 9),
(2, 1, 10),
(3, 2, 8),
(4, 2, 13),
(5, 3, 1),
(6, 3, 2),
(7, 4, 3),
(8, 4, 6),
(9, 5, 1),
(10, 5, 11),
(11, 6, 7),
(12, 6, 8),
(13, 7, 5),
(14, 7, 6),
(15, 8, 1),
(16, 8, 2),
(17, 9, 3),
(18, 9, 4),
(19, 10, 12),
(20, 10, 13),
(21, 11, 4),
(22, 12, 6),
(23, 12, 11),
(24, 13, 2),
(25, 13, 3),
(26, 14, 8),
(27, 14, 9),
(28, 15, 5),
(29, 15, 6),
(30, 16, 1),
(31, 16, 13),
(32, 17, 4),
(33, 17, 7),
(34, 18, 3),
(35, 18, 5),
(36, 19, 2),
(37, 19, 11);

-- --------------------------------------------------------

--
-- Struttura della tabella `user_sponsorship`
--

CREATE TABLE `user_sponsorship` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `due_date` datetime NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sponsorship_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `user_sponsorship`
--

INSERT INTO `user_sponsorship` (`id`, `due_date`, `user_id`, `sponsorship_id`, `created_at`, `updated_at`) VALUES
(1, '2021-08-10 10:00:51', 3, 3, NULL, NULL);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`);

--
-- Indici per le tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indici per le tabelle `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indici per le tabelle `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indici per le tabelle `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_user_id_foreign` (`user_id`);

--
-- Indici per le tabelle `specs`
--
ALTER TABLE `specs`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `sponsorships`
--
ALTER TABLE `sponsorships`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indici per le tabelle `user_spec`
--
ALTER TABLE `user_spec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_spec_user_id_foreign` (`user_id`),
  ADD KEY `user_spec_spec_id_foreign` (`spec_id`);

--
-- Indici per le tabelle `user_sponsorship`
--
ALTER TABLE `user_sponsorship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_sponsorship_user_id_foreign` (`user_id`),
  ADD KEY `user_sponsorship_sponsorship_id_foreign` (`sponsorship_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT per la tabella `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la tabella `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT per la tabella `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT per la tabella `specs`
--
ALTER TABLE `specs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `sponsorships`
--
ALTER TABLE `sponsorships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la tabella `user_spec`
--
ALTER TABLE `user_spec`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT per la tabella `user_sponsorship`
--
ALTER TABLE `user_sponsorship`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `user_spec`
--
ALTER TABLE `user_spec`
  ADD CONSTRAINT `user_spec_spec_id_foreign` FOREIGN KEY (`spec_id`) REFERENCES `specs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_spec_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `user_sponsorship`
--
ALTER TABLE `user_sponsorship`
  ADD CONSTRAINT `user_sponsorship_sponsorship_id_foreign` FOREIGN KEY (`sponsorship_id`) REFERENCES `sponsorships` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_sponsorship_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
