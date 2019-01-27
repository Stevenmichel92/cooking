-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 23 Janvier 2019 à 08:31
-- Version du serveur :  5.7.24-0ubuntu0.18.04.1
-- Version de PHP :  7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cooking`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `idCategorie` smallint(6) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`idCategorie`, `nom`) VALUES
(1, 'viande'),
(2, 'lÃ©gume'),
(3, 'poisson'),
(4, 'fruit');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `idMembre` int(11) NOT NULL,
  `gravatar` varchar(100) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(80) NOT NULL,
  `statut` varchar(20) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `dateCrea` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `administrateur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`idMembre`, `gravatar`, `login`, `password`, `statut`, `prenom`, `nom`, `dateCrea`, `administrateur`) VALUES
(1, 'natha.png\r\n', 'natha', '$2y$10$T15qI0r3Lr3Q6s/JMl/lMum8GGG6TJCaKUr4ySJ8Ju9k9p.qZpbmO', 'membre', 'nathalie', 'Martin', '2019-01-23 00:17:59', 'NON'),
(2, 'sylvie.png', 'syl92', '0b9c2625dc21ef05f6ad4ddf47c5f203837aa32c', 'membre', 'sylvie', 'Dubois', '2019-01-21 22:38:26', 'NON'),
(3, 'lucie.png', 'luce18', '$2y$10$X.yHWWTOAZBWAqzLeBQ6IejRGJV2uOPAIFB1nYvDkF7odF.J4XTWe', 'membre', 'lucie', 'Mantis', '2019-01-23 00:18:50', 'NON'),
(4, 'laurence.png', 'laulie', '0b9c2625dc21ef05f6ad4ddf47c5f203837aa32c', 'membre', 'laurence', 'Expert', '2019-01-23 00:19:02', 'NON'),
(5, 'annie.png', 'ann75', '0b9c2625dc21ef05f6ad4ddf47c5f203837aa32c', 'membre', 'annie', 'Frennic', '2019-01-23 00:19:22', 'NON'),
(6, 'laure.png', 'lolo', '0b9c2625dc21ef05f6ad4ddf47c5f203837aa32c', 'membre', 'laure', 'Astien', '2019-01-23 00:19:33', 'NON'),
(7, 'didier.png', 'did93', '$2y$10$URSDoY7TSujIO.g3neOmY.ScMj0X7.L4kSXTZVOCLl11aqu0GVsFS', 'membre', 'didier', 'Eleg', '2019-01-23 00:19:55', 'NON'),
(8, 'manu.png', 'man', '$2y$10$rZ3zqXflF9E759VNESgrLe3v0gZxVZxrbcAGwnZP41/FuVungcATW', 'membre', 'manu', 'Bientre', '2019-01-23 00:20:23', 'NON'),
(9, 'michel.png', 'mimiche', '$2y$10$o9RJZLJpXFEmjcgex8e.oO7kuKVqeTH.tcwufGC6ObrzWAprJLgUy', 'membre', 'michel', 'Maluran', '2019-01-23 00:20:06', 'NON'),
(10, 'lydia.png', 'lili', '$2y$10$onijcGHLwBYy7r8oi8sGL.qT2meZvhp6BsZ2LXSFgtDj9X6d6HljS', 'membre', 'lydia', 'Mantour', '2019-01-22 02:13:24', 'NON'),
(11, '0psgPstG_400x400.jpg', 'steven', '$2y$10$jJgFDkhcH2sejTiDob6/teDCJF.C33pAZICCEnVXlzBaOd4HWYu06', 'membre', 'Steven', 'Michel', '2019-01-23 00:52:48', 'OUI');

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `idRecette` int(11) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `chapo` text NOT NULL,
  `img` varchar(50) NOT NULL,
  `preparation` text NOT NULL,
  `ingredient` text NOT NULL,
  `membre` int(11) NOT NULL,
  `couleur` varchar(30) NOT NULL,
  `dateCrea` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `categorie` int(11) NOT NULL,
  `tempsCuisson` varchar(50) NOT NULL,
  `tempsPreparation` varchar(50) NOT NULL,
  `difficulte` varchar(50) NOT NULL,
  `prix` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `recettes`
--

INSERT INTO `recettes` (`idRecette`, `titre`, `chapo`, `img`, `preparation`, `ingredient`, `membre`, `couleur`, `dateCrea`, `categorie`, `tempsCuisson`, `tempsPreparation`, `difficulte`, `prix`) VALUES
(2, 'Carottes glac&eacute;es &agrave; l&#039;orange', 'Vous ne connaissiez pas le mariage de la carotte et de l&#039;orange ? Alors permettez-nous de vous donner l&#039;eau &agrave; la bouche avec cette recette de carottes glac&eacute;es, acidul&eacute;es et l&eacute;g&egrave;rement sucr&eacute;es qui donnera du peps &agrave; votre repas du jour !', '75DE742E-6C79-4620-8BEE-285E308706BA.jpg', '&lt;ol&gt;\r\n&lt;li&gt;1\r\nCoupez les carottes en rondelles de 3 mm. Faites sauter les carottes doucement, 2 &agrave; 3 minutes dans une sauteuse au beurre.&lt;/li&gt;\r\n&lt;li&gt;2\r\nD&eacute;glacez avec un m&eacute;lange de jus d&#039;orange et d&#039;eau. Recouvrez &agrave; ras. Ajoutez le cumin, le sucre, sel et poivre. Laissez mijoter jusqu&#039;&agrave; absorption du jus et gla&ccedil;age des rondelles.&lt;/li&gt;\r\n&lt;/ol&gt;', '&lt;ul&gt;\r\n&lt;li&gt;1 kg de carottes&lt;/li&gt;\r\n&lt;li&gt;&frac12; l d&#039;eau&lt;/li&gt;\r\n&lt;li&gt;2 pinc&eacute;es de sucre&lt;/li&gt;\r\n&lt;li&gt;&frac12; jus d&#039;orange&lt;/li&gt;\r\n&lt;li&gt;1 pinc&eacute;e de cumin&lt;/li&gt;\r\n&lt;li&gt;beurre&lt;/li&gt;\r\n&lt;li&gt;sel, poivre&lt;/li&gt;\r\n&lt;/ul&gt;', 1, 'fushia', '2019-01-23 00:27:32', 2, '10 min', '15 min', 'Facile', 'Pas cher'),
(4, 'Risotto de poulet aux carottes', 'Ce risotto est la douceur incarn&eacute;e. Avec son bon go&ucirc;t de carottes et de navets, il met &agrave; l&#039;honneur les l&eacute;gumes de printemps ! Ajoutez quelques morceaux de poulet pour un plat complet que vos gourmands vont souvent r&eacute;clamer !', 'E2E4DD31-8CA8-4D43-8976-6D4FD2600C43.jpg', '&lt;ol&gt;\r\n&lt;li&gt;1\r\nCoupez le poulet en petits morceaux et faites-les revenir dans une po&ecirc;le chauff&eacute;e et huil&eacute;e.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n2\r\nPendant ce temps, pelez l&#039;oignon, puis coupez-le en petits morceaux.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n3\r\n&Eacute;pluchez les carottes et taillez-les en cubes ainsi que les navets.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n4\r\nIncorporez l&#039;oignon &eacute;minc&eacute;, les navets et les carottes au poulet dor&eacute;, puis faites-les sauter pour que les oignons soient transparents.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n5\r\nVersez dans la po&ecirc;le 1 litre d&#039;eau pour recouvrir le poulet, r&eacute;duisez les cubes de bouillons en miettes puis ajoutez-les &agrave; la pr&eacute;paration.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n6\r\nSalez, poivrez, remuez le tout et laissez fr&eacute;mir tout en go&ucirc;tant le bouillon de volaille de temps en temps.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n7\r\nMettez le riz dans un plat &agrave; gratiner et versez-y ensuite, le bouillon avec les carottes, les navets et les oignons saut&eacute;s. Ainsi que le poulet.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n8\r\nEnfournez le tout &agrave; th. 7(210&deg;C) et laissez cuire le temps indiqu&eacute; sur l&#039;emballage du riz.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n9\r\nRemuez r&eacute;guli&egrave;rement pour &eacute;viter que votre pr&eacute;paration br&ucirc;le et retirez d&egrave;s que le riz sera cuit.\r\n&lt;/li&gt;\r\n&lt;/ol&gt;', '&lt;ul&gt;\r\n&lt;li&gt;300 g de riz&lt;/li&gt;\r\n&lt;li&gt;3 filets de poulet&lt;/li&gt;\r\n&lt;li&gt;4 carottes nouvelles&lt;/li&gt;\r\n&lt;li&gt;2 navets nouveaux&lt;/li&gt;\r\n&lt;li&gt;1 oignon&lt;/li&gt;\r\n&lt;li&gt;3 cubes de bouillon de volaille&lt;/li&gt;\r\n&lt;li&gt;huile&lt;/li&gt;\r\n&lt;li&gt;eau&lt;/li&gt;\r\n&lt;li&gt;sel, poivre&lt;/li&gt;\r\n&lt;/ul&gt;', 3, 'vertClair', '2019-01-23 00:27:14', 1, '30 min', '15 min', 'Facile', 'Pas cher'),
(5, 'Pain de viande aux l&eacute;gumes', 'Cette recette de pain de viande est compl&egrave;te ! En plus d&#039;y trouver de la viande hach&eacute;e, vous ne pourrez qu&#039;appr&eacute;cier les morceaux de carottes et de poivrons qui mettront du soleil dans votre assiette ! C&#039;est original et c&#039;est surtout un d&eacute;lice, alors lancez-vous !', 'D6D39709-F780-4849-8F8D-D9CEAC385265.jpg', '&lt;ol&gt;\r\n&lt;li&gt;1\r\nPr&eacute;chauffez votre four th.6 (180&deg;C).\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n2\r\nLavez les carottes et coupez-les en cubes.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n3\r\nLavez et coupez le poivron en cubes.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n4\r\nPelez et &eacute;mincez finement les oignons et ail.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n5\r\nHachez finement les herbes.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n6\r\nDans une casserole, faites chauffer du beurre et faites revenir les carottes et le poivron.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n7\r\nDans un plat ajoutez la viande hach&eacute;e et ajoutez les fines herbes.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n8\r\n&Eacute;gouttez les l&eacute;gumes et incorporez-les &agrave; la viande.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n9\r\nMalaxez et faites un petit pain avec la viande.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n10\r\nPlacez le pain dans un plat huil&eacute;.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n11\r\nEnfournez pendant 40 &agrave; 45 min.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n9\r\nRemuez r&eacute;guli&egrave;rement pour &eacute;viter que votre pr&eacute;paration br&ucirc;le et retirez d&egrave;s que le riz sera cuit.\r\n&lt;/li&gt;\r\n&lt;/ol&gt;', '&lt;ul&gt;\r\n&lt;li&gt;500 g de viande hach&eacute;e&lt;/li&gt;\r\n&lt;li&gt;1 poivron rouge&lt;/li&gt;\r\n&lt;li&gt;2 carottes nouvelles&lt;/li&gt;\r\n&lt;li&gt;1 oignon&lt;/li&gt;\r\n&lt;li&gt;1 oignon nouveau&lt;/li&gt;\r\n&lt;li&gt;3 &eacute;clats d&#039;ail&lt;/li&gt;\r\n&lt;li&gt;persil, ciboulette, origan, basilic et menthe&lt;/li&gt;\r\n&lt;li&gt;poivre&lt;/li&gt;\r\n&lt;/ul&gt;', 4, 'fushia', '2019-01-23 00:26:56', 1, '45 min', '35 min', 'Facile', 'Pas cher'),
(6, 'Pommes de terre aux herbes', 'Avec les belles journ&eacute;es qui se profilent, on aurait bien envie de se pr&eacute;parer des plats simples et d&eacute;licieux. Avec une viande grill&eacute;e, vous devriez essayer ces pommes de terre aux herbes. L&eacute;g&egrave;rement rissol&eacute;es, elles sont un avant-go&ucirc;t d&#039;&eacute;t&eacute; dans l&#039;assiette.', '5B49E549-A466-489E-8F28-AF373876F12A.jpg', '&lt;ol&gt;\r\n&lt;li&gt;1\r\nFaites chauffer l&#039;huile dans une sauteuse, mettez y les pommes de terres et l&#039;ail et faites dorer l&eacute;g&egrave;rement.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n2\r\nAjoutez le thym, la marjolaine et le laurier et du sel.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n3\r\nRectifiez &eacute;ventuellement l&#039;assaisonnement et servez.\r\n&lt;/li&gt;\r\n&lt;/ol&gt;', '&lt;ul&gt;\r\n&lt;li&gt;1 kg 500 g de pommes de terre nouvelles&lt;/li&gt;\r\n&lt;li&gt;4 gousses d&#039;ail pil&eacute;es&lt;/li&gt;\r\n&lt;li&gt;2 c. &agrave; soupe de thym et de marjolaine frais et finement hach&eacute;s&lt;/li&gt;\r\n&lt;li&gt;2 feuilles de laurier &eacute;miett&eacute;es&lt;/li&gt;\r\n&lt;li&gt;3 c. &agrave; soupe d&#039;huile d&#039;olive&lt;/li&gt;\r\n&lt;li&gt;sel&lt;/li&gt;\r\n&lt;/ul&gt;', 5, 'vertClair', '2019-01-23 00:26:15', 2, '30 min', '15 min', 'Facile', 'Pas cher'),
(7, 'Navarin d&#039;agneau facile', 'Qui dit l&eacute;gumes nouveaux pense imm&eacute;diatement au navarin d&#039;agneau. Ce plat, id&eacute;al quelques semaines avant P&acirc;ques, rassemblera toute votre petite famille autour d&#039;un repas gourmand et fondant.  N&#039;h&eacute;sitez pas &agrave; pr&eacute;parer votre navarin &agrave; l&#039;avance, il n&#039;en sera que meilleur le lendemain !', '4367277A-A3DA-4364-A04E-60B2527D6113.jpg', '&lt;ol&gt;\r\n&lt;li&gt;1\r\nD&eacute;coupez l&#039;&eacute;paule d&#039;agneau en 6 morceaux et collez-le en 6 tranches. Faites chauffer l&#039;huile dans une cocotte de grande taille et ajoutez les morceaux de viande deux par deux pour les faire colorer sans laissez-les roussir. Quand ils sont tous dor&eacute;s, &eacute;gouttez-les et videz les deux tiers de la graisse fondue.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n2\r\nRemettez-les dans la cocotte et poudrez-les de sucre, m&eacute;langez, puis poudrez de farine et faites chauffer en remuant de 2 &agrave; 3 minutes pour cuire la farine. Versez le vin et m&eacute;langez, salez, poivrez et muscadez. R&eacute;glez sur feu mod&eacute;r&eacute;.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n3\r\nEbouillantez les tomates, puis pelez-les; &eacute;p&eacute;pinez-les et concassez-les.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n4\r\nPelez les gousses d&#039;ail et hachez-les. Ajoutez ces ingr&eacute;dients dans la cocotte ainsi que le bouquet garni. Le mouillement doit juste recouvrir la viande: ajoutez &eacute;ventuellement un peu d&#039;eau. Lorsque l&#039;&eacute;bullition est atteinte, couvrez et faites mijoter pendant 45 min environ en &eacute;cumant et en d&eacute;graissant r&eacute;guli&egrave;rement.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n5\r\nPelez les carottes et les navets. Pelez les petits oignons, &ocirc;tez les fils des haricots verts, faites chauffer le beurre dans une sauteuse et mettez-y les carottes, les navets et les oignons, puis faites-les revenir en remuant pendant 10 min. &Eacute;gouttez-les. Faites cuire les haricots verts &agrave; la vapeur pendant 10 min.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n6\r\nAjoutez carottes, navets, oignons et petits pois dans la cocotte. M&eacute;langez et couvrez &agrave; nouveau, poursuivez la cuisson doucement pendant 20 min.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n7\r\nAjoutez enfin les haricots verts 5 min avant de servir et m&eacute;langez d&eacute;licatement. Go&ucirc;tez pour rectifier l&#039;assaisonnement. Servez dans la cocotte ou un plat de service creux et bien chaud.\r\n&lt;/li&gt;\r\n&lt;/ol&gt;', '&lt;ul&gt;\r\n&lt;li&gt;800 g d&#039;&eacute;paule d&#039;agneau d&eacute;soss&eacute;e&lt;/li&gt;\r\n&lt;li&gt;800 g de collier d&#039;agneau d&eacute;soss&eacute;&lt;/li&gt;\r\n&lt;li&gt;1 c. &agrave; caf&eacute; de sucre en poudre&lt;/li&gt;\r\n&lt;li&gt;1 c. &agrave; soupe de farine&lt;/li&gt;\r\n&lt;li&gt;20 cl de vin blanc sec&lt;/li&gt;\r\n&lt;li&gt;noix de muscade&lt;/li&gt;\r\n&lt;li&gt;2 tomates m&ucirc;res&lt;/li&gt;\r\n&lt;li&gt;2 gousses d&#039;ail&lt;/li&gt;\r\n&lt;li&gt;1 bouquet garni&lt;/li&gt;\r\n&lt;li&gt;300 g de petites carottes nouvelles&lt;/li&gt;\r\n&lt;li&gt;100 g de petits oignons blancs&lt;/li&gt;\r\n&lt;li&gt;200 g de petits navets nouveaux&lt;/li&gt;\r\n&lt;li&gt;300 g de haricots verts&lt;/li&gt;\r\n&lt;li&gt;300 g de petits pois &eacute;coss&eacute;s&lt;/li&gt;\r\n&lt;li&gt;25 g de beurre&lt;/li&gt;\r\n&lt;li&gt;2 c. &agrave; soupe d&#039;huile&lt;/li&gt;\r\n&lt;li&gt;sel, poivre&lt;/li&gt;\r\n&lt;/ul&gt;', 6, 'bleuClair', '2019-01-23 00:26:00', 1, '1h 30 min', '30 min', 'Facile', 'Abordable'),
(8, 'Lotte aux l&eacute;gumes gourmands', 'Les l&eacute;gumes et la viande, c&#039;est d&eacute;licieux, mais avec du poisson c&#039;est encore mieux. Ici, la lotte est l&eacute;g&egrave;rement po&ecirc;l&eacute;e et accompagn&eacute;e de l&eacute;gumes croquants pour lesquels vous ne pourrez que succomber ! &Eacute;quilibr&eacute;e et gourmande, cette recette est &agrave; tomber !', '458118AF-CB6D-4BE2-998D-89D7A00CFE2F.jpg', '&lt;ol&gt;\r\n&lt;li&gt;1\r\nFaites cuire les navets, les courgettes et les carottes 8 min, dans 1 l d&#039;eau bouillante sal&eacute;e puis ajoutez les oignons (partag&eacute;s en deux) et les petits pois.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n2\r\nProlongez la cuisson 3 min avant d&#039;&eacute;goutter les l&eacute;gumes (en r&eacute;servant leur eau de cuisson).\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n3\r\nDisposez les dans un plat de cuisson ou vous les m&ecirc;lerez &agrave; 50 g de beurre, couvrez.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n4\r\nDans du beurre faites l&eacute;g&egrave;rement dorer la lotte coup&eacute;e en 8 tranches. Assaisonnez puis r&eacute;servez le poisson.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n5\r\nD&eacute;glacez la po&ecirc;le avec 25 cl de jus de cuisson des l&eacute;gumes,portez &agrave; &eacute;bullition incorporez le reste du beurre.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n6\r\nServez la lotte entour&eacute;e de l&eacute;gumes et ajoutez quelques tomates s&eacute;ch&eacute;es.\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n7\r\nVous pouvez remplacer la lotte par bien d&#039;autres poissons.\r\n&lt;/li&gt;\r\n\r\n&lt;/ol&gt;', '&lt;ul&gt;\r\n&lt;li&gt;900 g de lotte&lt;/li&gt;\r\n&lt;li&gt;500 g de petits pois &agrave; &eacute;cosser&lt;/li&gt;\r\n&lt;li&gt;8 carottes nouvelles&lt;/li&gt;\r\n&lt;li&gt;2 navets nouveaux&lt;/li&gt;\r\n&lt;li&gt;250 g de courgettes&lt;/li&gt;\r\n&lt;li&gt;4 oignons blancs&lt;/li&gt;\r\n&lt;li&gt;3 brins de cerfeuil&lt;/li&gt;\r\n&lt;li&gt;quelques tomates s&eacute;ch&eacute;es&lt;/li&gt;\r\n&lt;li&gt;100 g de beurre&lt;/li&gt;\r\n&lt;li&gt;sel, poivre&lt;/li&gt;\r\n\r\n&lt;/ul&gt;', 1, 'fushia', '2019-01-23 00:25:25', 3, '30 min', '40 min', 'Facile', 'Pas cher'),
(10, 'Girolles &agrave; la paysanne', 'Cette recette m&ecirc;le les saveurs d&#039;automne avec les girolles fondantes avec les l&eacute;gumes croquants des premiers beaux jours de l&#039;ann&eacute;e. Servez ce m&eacute;lange gourmand avec de la viande de veau et vous verrez, le bonheur sera complet !', 'BFC247F9-6407-43DF-84B2-15E0B0F0A77E.jpg', '&lt;ol&gt;\r\n&lt;li&gt;1\r\nNettoyez les girolles sans les laver. Laissez-les enti&egrave;res. Pelez les pommes de terre et les carottes.\r\n&lt;/li&gt;&lt;li&gt;\r\n2\r\nLaissez les premi&egrave;res enti&egrave;res et taillez les secondes en tranches. Faites fondre le beurre dans une cocotte en fonte, placez les tranches de lard et faites-les blondir doucement.\r\n&lt;/li&gt;&lt;li&gt;\r\n3\r\nAjoutez les pommes de terre, les carottes, le thym, le laurier et la gousse d&#039;ail non pel&eacute;e. Faites cuire doucement en remuant de temps en temps, pour que les l&eacute;gumes se colorent l&eacute;g&egrave;rement et d&#039;une mani&egrave;re uniforme.\r\n&lt;/li&gt;&lt;li&gt;\r\n4\r\nAjoutez les girolles et couvrir. (Les pommes de terre finiront de cuire en absorbant l&#039;eau rendue par les girolles).\r\n&lt;/li&gt;&lt;li&gt;\r\n5\r\nPoivrez, mais ne pas salez, &agrave; cause du lard. Parsemez le fricot avec le persil et servez directement dans la cocotte.\r\n&lt;/li&gt;&lt;li&gt;\r\n6\r\nServez aussit&ocirc;t. Accompagnez d&#039;un bol de chantilly parsem&eacute;e de baies roses.\r\n&lt;/li&gt;\r\n\r\n&lt;/ol&gt;', '&lt;ul&gt;\r\n&lt;li&gt;300 g de girolles&lt;/li&gt;\r\n&lt;li&gt;2 tranches de poitrine de lard sal&eacute;e&lt;/li&gt;\r\n&lt;li&gt;400 g de petites pommes de terre nouvelles&lt;/li&gt;\r\n&lt;li&gt;12 petites carottes nouvelles&lt;/li&gt;\r\n&lt;li&gt;1 petite gousse d&#039;ail&lt;/li&gt;\r\n&lt;li&gt;1/2 feuille de laurier&lt;/li&gt;\r\n&lt;li&gt;1 brindille de thym&lt;/li&gt;\r\n&lt;li&gt;1 c. &agrave; soupe de persil plat, hach&eacute;&lt;/li&gt;\r\n&lt;li&gt;20 g de beurre&lt;/li&gt;\r\n&lt;li&gt;sel, poivre&lt;/li&gt;\r\n\r\n&lt;/ul&gt;', 3, 'bleuClair', '2019-01-23 00:24:44', 2, '15 min', '40 min', 'Facile', 'Pas cher');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_recette_personne`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vue_recette_personne` (
`login` varchar(32)
,`gravatar` varchar(100)
,`idRecette` int(11)
,`titre` varchar(250)
,`chapo` text
,`img` varchar(50)
,`preparation` text
,`ingredient` text
,`couleur` varchar(30)
,`tempsCuisson` varchar(50)
,`tempsPreparation` varchar(50)
,`difficulte` varchar(50)
,`prix` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure de la vue `vue_recette_personne`
--
DROP TABLE IF EXISTS `vue_recette_personne`;

CREATE ALGORITHM=UNDEFINED DEFINER=`irondev`@`localhost` SQL SECURITY DEFINER VIEW `vue_recette_personne`  AS  select `m`.`login` AS `login`,`m`.`gravatar` AS `gravatar`,`r`.`idRecette` AS `idRecette`,`r`.`titre` AS `titre`,`r`.`chapo` AS `chapo`,`r`.`img` AS `img`,`r`.`preparation` AS `preparation`,`r`.`ingredient` AS `ingredient`,`r`.`couleur` AS `couleur`,`r`.`tempsCuisson` AS `tempsCuisson`,`r`.`tempsPreparation` AS `tempsPreparation`,`r`.`difficulte` AS `difficulte`,`r`.`prix` AS `prix` from (`membres` `m` join `recettes` `r`) where (`m`.`idMembre` = `r`.`membre`) ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`idMembre`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `idCategorie` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `idMembre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
