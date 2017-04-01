
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `lafleurmvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `libelle` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
('bul', 'Bulbes'),
('mas', 'Plantes &agrave; massif'),
('ros', 'Roses');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `dateCommande` date NOT NULL,
  `nomPrenomClient` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `adresseRueClient` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `cpClient` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `villeClient` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `mailClient` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bonCdeClient` char(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `dateCommande`, `nomPrenomClient`, `adresseRueClient`, `cpClient`, `villeClient`, `mailClient`, `bonCdeClient`) VALUES
('1', '2015-02-17', 'O', 'O', 'O', 'O', 'O', 'AMOUR');

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `idCommande` varchar(32) NOT NULL,
  `idProduit` varchar(32) NOT NULL,
  `quantite` decimal(10,2) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idCommande`,`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contenir`
--

INSERT INTO `contenir` (`idCommande`, `idProduit`, `quantite`, `prix`) VALUES
('1', 'f01', '1.00', '58.00');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `idCategorie` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `description`, `prix`, `image`, `idCategorie`) VALUES
('c01', 'Panier de fleurs variées', '53.00', 'images/plantes2/aniwa.gif', 'bul'),
('c02', 'Coup de charme jaune', '38.00', 'images/plantes2/kos.gif', 'bul'),
('c03', 'Bel arrangement de fleurs de saison', '68.00', 'images/plantes2/loth.gif', 'bul'),
('c04', 'Coup de charme vert', '41.00', 'images/plantes2/luzon.gif', 'bul'),
('c05', 'Très beau panier de fleurs précieuses', '98.00', 'images/plantes2/makin.gif', 'bul'),
('c06', 'Bel assemblage de fleurs précieuses', '68.00', 'images/plantes2/mosso.gif', 'bul'),
('c07', 'Présentation prestigieuse', '128.00', 'images/plantes2/rawaki.gif', 'bul'),
('f01', 'Bouquet de roses multicolores', '58.00', 'images/plantes3/comores.gif', 'ros'),
('f02', 'Bouquet de roses rouges', '50.00', 'images/plantes3/grenadines.gif', 'ros'),
('f03', 'Bouquet de roses jaunes', '78.00', 'images/plantes3/mariejaune.gif', 'ros'),
('f04', 'Bouquet de petites roses jaunes', '48.00', 'images/plantes3/mayotte.gif', 'ros'),
('f05', 'Fuseau de roses multicolores', '63.00', 'images/plantes3/philippines.gif', 'ros'),
('f06', 'Petit bouquet de roses roses', '43.00', 'images/plantes3/pakopoka.gif', 'ros'),
('f07', 'Panier de roses multicolores', '78.00', 'images/plantes3/seychelles.gif', 'ros'),
('p01', 'Plante fleurie', '43.00', 'images/plantes1/antharium.gif', 'mas'),
('p02', 'Pot de phalaonopsis', '58.00', 'images/plantes1/galante.gif', 'mas'),
('p03', 'Assemblage paysagé', '103.00', 'images/plantes1/lifou.gif', 'mas'),
('p04', 'Belle coupe de plantes blanches', '128.00', 'images/plantes1/losloque.gif', 'mas'),
('p05', 'Pot de mitonia mauve', '83.00', 'images/plantes1/papouasi.gif', 'mas'),
('p06', 'Pot de phalaonopsis blanc', '58.00', 'images/plantes1/pionosa.gif', 'mas'),
('p07', 'Pot de phalaonopsis rose mauve', '58.00', 'images/plantes1/sabana.gif', 'mas');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
