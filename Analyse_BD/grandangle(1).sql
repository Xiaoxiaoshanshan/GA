-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2019-02-10 21:13:03
-- 服务器版本： 10.1.36-MariaDB
-- PHP 版本： 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `grandangle`
--

-- --------------------------------------------------------

--
-- 表的结构 `artiste`
--

CREATE TABLE `artiste` (
  `id` int(11) NOT NULL,
  `nomartiste` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenomartiste` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionartistefr` longtext COLLATE utf8mb4_unicode_ci,
  `descriptionartisteen` longtext COLLATE utf8mb4_unicode_ci,
  `descriptionartistecn` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `etat`
--

CREATE TABLE `etat` (
  `id` int(11) NOT NULL,
  `libelleetat` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `exposition`
--

CREATE TABLE `exposition` (
  `id` int(11) NOT NULL,
  `poster` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `titreexpo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionexpofr` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionexpoen` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionexpocn` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  `nbvisiters` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `libellemedia` longtext COLLATE utf8mb4_unicode_ci,
  `typemedia` longtext COLLATE utf8mb4_unicode_ci,
  `url` longtext COLLATE utf8mb4_unicode_ci,
  `oeuvre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190209144436', '2019-02-09 14:45:17'),
('20190209150005', '2019-02-09 15:00:42'),
('20190209151208', '2019-02-09 15:12:21'),
('20190209152731', '2019-02-09 15:27:44'),
('20190209153512', '2019-02-09 15:35:18'),
('20190209153857', '2019-02-09 15:39:03'),
('20190209154825', '2019-02-09 15:48:35'),
('20190209155427', '2019-02-09 15:54:32'),
('20190209160123', '2019-02-09 16:01:34'),
('20190209160351', '2019-02-09 16:03:55'),
('20190209160922', '2019-02-09 16:09:27'),
('20190209161545', '2019-02-09 16:15:50'),
('20190209162010', '2019-02-09 16:20:16'),
('20190209163705', '2019-02-09 16:37:15'),
('20190209165607', '2019-02-09 16:56:13');

-- --------------------------------------------------------

--
-- 表的结构 `oeuvre`
--

CREATE TABLE `oeuvre` (
  `id` int(11) NOT NULL,
  `titre` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionfr` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionen` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptioncn` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `longueur` double DEFAULT NULL,
  `largeur` double DEFAULT NULL,
  `hauteur` double DEFAULT NULL,
  `diametre` double DEFAULT NULL,
  `periodcreation` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `etat_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `oeuvre_artiste`
--

CREATE TABLE `oeuvre_artiste` (
  `oeuvre_id` int(11) NOT NULL,
  `artiste_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `oeuvre_exposition`
--

CREATE TABLE `oeuvre_exposition` (
  `oeuvre_id` int(11) NOT NULL,
  `exposition_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `libelleposition` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `libellefr` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelleen` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `libellecn` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` longtext COLLATE utf8mb4_unicode_ci,
  `cp` longtext COLLATE utf8mb4_unicode_ci,
  `ville` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转储表的索引
--

--
-- 表的索引 `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `exposition`
--
ALTER TABLE `exposition`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6A2CA10C88194DE8` (`oeuvre_id`);

--
-- 表的索引 `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- 表的索引 `oeuvre`
--
ALTER TABLE `oeuvre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_35FE2EFEC54C8C93` (`type_id`),
  ADD KEY `IDX_35FE2EFED5E86FF` (`etat_id`),
  ADD KEY `IDX_35FE2EFEDD842E46` (`position_id`);

--
-- 表的索引 `oeuvre_artiste`
--
ALTER TABLE `oeuvre_artiste`
  ADD PRIMARY KEY (`oeuvre_id`,`artiste_id`),
  ADD KEY `IDX_DB75DF1488194DE8` (`oeuvre_id`),
  ADD KEY `IDX_DB75DF1421D25844` (`artiste_id`);

--
-- 表的索引 `oeuvre_exposition`
--
ALTER TABLE `oeuvre_exposition`
  ADD PRIMARY KEY (`oeuvre_id`,`exposition_id`),
  ADD KEY `IDX_C642377388194DE8` (`oeuvre_id`),
  ADD KEY `IDX_C642377388ED476F` (`exposition_id`);

--
-- 表的索引 `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `artiste`
--
ALTER TABLE `artiste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `etat`
--
ALTER TABLE `etat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `exposition`
--
ALTER TABLE `exposition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `oeuvre`
--
ALTER TABLE `oeuvre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 限制导出的表
--

--
-- 限制表 `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `FK_6A2CA10C88194DE8` FOREIGN KEY (`oeuvre_id`) REFERENCES `oeuvre` (`id`);

--
-- 限制表 `oeuvre`
--
ALTER TABLE `oeuvre`
  ADD CONSTRAINT `FK_35FE2EFEC54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `FK_35FE2EFED5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `FK_35FE2EFEDD842E46` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`);

--
-- 限制表 `oeuvre_artiste`
--
ALTER TABLE `oeuvre_artiste`
  ADD CONSTRAINT `FK_DB75DF1421D25844` FOREIGN KEY (`artiste_id`) REFERENCES `artiste` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_DB75DF1488194DE8` FOREIGN KEY (`oeuvre_id`) REFERENCES `oeuvre` (`id`) ON DELETE CASCADE;

--
-- 限制表 `oeuvre_exposition`
--
ALTER TABLE `oeuvre_exposition`
  ADD CONSTRAINT `FK_C642377388194DE8` FOREIGN KEY (`oeuvre_id`) REFERENCES `oeuvre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C642377388ED476F` FOREIGN KEY (`exposition_id`) REFERENCES `exposition` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
