²-- Création de la base des données
CREATE DATABASE IF NOT EXISTS `module2`;

USE `module2`;

-- Creations des differentes tables "
--


--
-- -------------------Structure de la table `grades`
--
CREATE TABLE IF NOT EXISTS `grades` (
  `id_grade` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom_grade` varchar(255) NOT NULL
);

-- Insertion des données sur la table grades
INSERT INTO `grades` (`id_grade`, `nom_grade`) VALUES
(1, 'prefet'),
(2, 'd.e'),
(3, 'secretaire'),
(4, 'd.d'),
(5, 'enseignant'),
(6, 'parent-eleve');
-- =============================================================================================




--
-- Structure de la table `jours`
--
CREATE TABLE IF NOT EXISTS `jours`(
`id_jour` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`nom_jour` varchar(255) NOT NULL
);

-- Insertion des données sur la table jours
INSERT INTO `jours` (`id_jour`, `nom_jour`) VALUES
(1, 'Lundi'),
(2, 'Mardi'),
(3, 'Mercredi'),
(4, 'Jeudi'),
(5, 'Vendredi'),
(6, 'samedi'),
(7, 'Dimanche');
 -- ================================================================================================


--
-- Structure de la table `vacations`
--
CREATE TABLE IF NOT EXISTS `vacations`(
`id_vacation` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`nom_vacation` varchar(255) NOT NULL
);

-- Insertion des données sur la table vacations
INSERT INTO `vacations` (`id_vacation`, `nom_vacation`) VALUES
(1, 'Avant-midi'),
(2, 'Apreès-midi');
 -- ================================================================================================


--
-- Structure de la table `heures`
--
CREATE TABLE IF NOT EXISTS `heures`(
`id_heure` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`nom_heure` varchar(255) NOT NULL
);

-- Insertion des données sur la table heures
INSERT INTO `heures` (`id_heure`, `nom_heure`) VALUES
(1, '6h'),
(2, '7h'),
(3, '8h'),
(4, '9h'),
(5, '10h'),
(6, '11h'),
(7, '12h'),
(8, '13h'),
(9, '14h'),
(10, '15h'),
(11, '16h'),
(12, '17h'),
(13, '18h');
 -- ================================================================================================


--
-- Structure de la table `options`
--
CREATE TABLE IF NOT EXISTS `options`(
`id_option` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`nom_option` varchar(255) NOT NULL
);

-- Insertion des données sur la table options
INSERT INTO `options` (`id_option`, `nom_option`) VALUES
(1, 'maths-physique'),
(2, 'bio-chimie'),
(3, 'litteraire'),
(4, 'electricité'),
(5, 'mécanique'),
(6, 'coupe-couture'),
(7, 'pedagogie'),
(8, 'commerciale');
 -- ================================================================================================



--
-- Structure de la table `classes`
--
CREATE TABLE IF NOT EXISTS `classes`(
`id_classe` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`nom_classe` varchar(255) NOT NULL
);

-- Insertion des données sur la table classes
INSERT INTO `classes` (`id_classe`, `nom_classe`) VALUES
(1, '1ere Prim.'),
(2, '2e Prim.'),
(3, '3e Prim.'),
(4, '4e Prim.'),
(5, '5e Prim.'),
(6, '6e Prim.'),
(7, '1ere Sec.'),
(8, '2e Sec.'),
(9, '3e Hum.'),
(10, '4e Hum.'),
(11, '5e Hum.'),
(12, '6e Hum.');
 -- ================================================================================================




--
-- Structure de la table `matieres`
--
CREATE TABLE IF NOT EXISTS `matieres`(
`id_matiere` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`nom_matiere` varchar(255) NOT NULL
);

-- Insertion des données sur la table matieres
INSERT INTO `matieres` (`id_matiere`, `nom_matiere`) VALUES
(1, 'mathematiques'),
(2, 'physique'),
(3, 'chimie'),
(4, 'svt'),
(5, 'francais'),
(6, 'anglais'),
(7, 'informatique'),
(8, 'eps'),
(9, 'aucune');
 -- ================================================================================================



 --
-- Structure de la table `etat_civil`
--
CREATE TABLE IF NOT EXISTS `etat_civil`(
`id_etat_civil` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`nom_etat` varchar(255) NOT NULL
);

-- Insertion des données sur la table etat_civil
INSERT INTO `etat_civil` (`id_etat_civil`, `nom_etat`) VALUES
(1, 'célibataire'),
(2, 'marié');

 -- ================================================================================================



--
-- Structure de la table `sexes`
--
CREATE TABLE IF NOT EXISTS `sexes`(
`id_sexe` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`nom_sexe` varchar(255) NOT NULL
);

-- Insertion des données sur la table sexes
INSERT INTO `sexes` (`id_sexe`, `nom_sexe`) VALUES
(1, 'Masculin'),
(2, 'Feminin');

 -- ================================================================================================



--
-- Structure de la table `eleves`
--

CREATE TABLE IF NOT EXISTS `eleves` (
  `id_eleve` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom_eleve` varchar(255) NOT NULL,
  `postnom_eleve` varchar(255) NOT NULL,
  `prenom_eleve` varchar(255) NOT NULL,
  `id_sexe` int(11) NOT NULL,
  `date_naissance_eleve` varchar(255) NOT NULL,
  `lieu_naissance_eleve` varchar(255) NOT NULL NOT NULL,
  `date_inscription_eleve` datetime NOT NULL,
  `image_eleve` varchar(255) NOT NULL DEFAULT 'default.png',
  `id_option` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `pourcentage_eleve` varchar(255) NOT NULL DEFAULT '0%',
  `statut_eleve` tinyint(1) NOT NULL DEFAULT '0'
) ;
ALTER TABLE eleves ADD CONSTRAINT options FOREIGN KEY (id_option) REFERENCES options(id_option) ON UPDATE CASCADE ON DELETE CASCADE ;  
ALTER TABLE eleves ADD CONSTRAINT classes FOREIGN KEY (id_classe) REFERENCES classes(id_classe) ON UPDATE CASCADE ON DELETE CASCADE ;  
ALTER TABLE eleves ADD CONSTRAINT sexes FOREIGN KEY (id_sexe) REFERENCES sexes(id_sexe) ON UPDATE CASCADE ON DELETE CASCADE; 



-- Insertion des données sur la table eleves
INSERT INTO `eleves` (`id_eleve`, `nom_eleve`, `postnom_eleve`, `prenom_eleve`, `id_sexe`, `date_naissance_eleve`, `lieu_naissance_eleve`, `date_inscription_eleve`, `image_eleve`, `id_option`, `id_classe`, `pourcentage_eleve`, `statut_eleve`) VALUES
(1, 'aucun', 'aucun', 'aucun', 1, '2021-02-16 20:15:14', 'aucun', '2021-02-16 20:15:14', 'default.png', 1, 1, 'aucun', 1);
-- =============================================================================================

-- Structure de la table `utils`
--

CREATE TABLE IF NOT EXISTS `utils` (
  `id_util` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `matricule_eleve` int(11) NOT NULL DEFAULT 1,
  `nom_util` varchar(255) NOT NULL,
  `prenom_util` varchar(255) NOT NULL,
  `email_util` varchar(255) NOT NULL,
  `date_inscription_util` datetime NOT NULL,
  `image_util` varchar(255) NOT NULL DEFAULT 'default.png',
  `motpass_util` varchar(255) NOT NULL,
  `etat_civil_util` varchar(255) NOT NULL DEFAULT 'célibataire',
  `token_util` varchar(255) NOT NULL,
  `id_grade` int(11) NOT NULL DEFAULT '6',
  `matiere_util` varchar(255) NOT NULL DEFAULT 'aucune',
  `sexe_util` varchar(255) NOT NULL,
  `confirmation_util` tinyint(1) NOT NULL DEFAULT '0',
  `confirmCle_util` varchar(255) NOT NULL,
  `confirmation_email` tinyint(1) NOT NULL DEFAULT '0'
) ;

ALTER TABLE utils ADD CONSTRAINT eleves FOREIGN KEY (matricule_eleve) REFERENCES eleves(id_eleve) ON UPDATE CASCADE ON DELETE CASCADE ; 
ALTER TABLE utils ADD CONSTRAINT grades FOREIGN KEY (id_grade) REFERENCES grades(id_grade) ON UPDATE CASCADE ON DELETE CASCADE;
-- ALTER TABLE utils ADD CONSTRAINT matieres FOREIGN KEY (id_matiere) REFERENCES matieres(id_matiere) ON UPDATE CASCADE ON DELETE CASCADE;
-- ALTER TABLE utils ADD CONSTRAINT sexes FOREIGN KEY (id_sexe) REFERENCES sexes(id_sexe) ON UPDATE CASCADE; 
-- ================================================================================================








--
-- -------------------Structure de la table `reccuperationpassword`
--
CREATE TABLE IF NOT EXISTS `reccuperationpassword` (
  `id_reccup` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `email_reccup` varchar(255) NOT NULL,
  `code_reccup` int(11) NOT NULL,
   `date_reccup` datetime NOT NULL

);


-- =============================================================================================



--
-- Structure de la table `annonces`
--

CREATE TABLE IF NOT EXISTS `annonces` (
  `id_annonce` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_util` int(11) NOT NULL,
  `titre_annonce` varchar(255) NOT NULL,
  `contenu_annonce` text NOT NULL,
  `image_annonce` varchar(255) NOT NULL DEFAULT 'default.png',
  `date_annonce` datetime NOT NULL,
  `visibilite_annonce` tinyint(1) NOT NULL DEFAULT '0'
)  ;


-- ALTER TABLE annonces ADD CONSTRAINT utils FOREIGN KEY (id_util) REFERENCES utils(id_util) ON UPDATE CASCADE ON DELETE CASCADE;
-- ================================================================================================




--
-- Structure de la table `raports`
--
CREATE TABLE IF NOT EXISTS `rapports`(
`id_rapport` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`id_util` int(11) NOT NULL,
`objet_rapport` varchar(255) NOT NULL,
`contenu_rapport` text NOT NULL,
`date_rapport` datetime NOT NULL
);

ALTER TABLE rapports ADD CONSTRAINT utils FOREIGN KEY (id_util) REFERENCES utils(id_util) ON UPDATE CASCADE ON DELETE CASCADE;
 -- ================================================================================================






--
-- Structure de la table `horaires`
--
CREATE TABLE IF NOT EXISTS `charges_horaires`(
`id_charges_horaire` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`id_util` int(11) NOT NULL,
`id_classe` varchar(255) NOT NULL,
`id_matiere` int(11) NOT NULL,
`id_option` varchar(255) NOT NULL,
`heure_debut_charge_horaire` varchar(255) NOT NULL,
`heure_fin_charge_horaire` varchar(255) NOT NULL,
`id_jour` varchar(255) NOT NULL,
`id_vacation` varchar(255) NOT NULL
);


-- ALTER TABLE charges_horaires ADD CONSTRAINT utils FOREIGN KEY (id_util) REFERENCES utils(id_util) ON UPDATE CASCADE ON DELETE CASCADE;
-- ALTER TABLE charges_horaires ADD CONSTRAINT classes FOREIGN KEY (id_classe) REFERENCES classes(id_classe) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE charges_horaires ADD CONSTRAINT matieres FOREIGN KEY (id_matiere) REFERENCES matieres(id_matiere) ON UPDATE CASCADE ON DELETE CASCADE;
-- ALTER TABLE charges_horaires ADD CONSTRAINT options FOREIGN KEY (id_option) REFERENCES options(id_option) ON UPDATE CASCADE ON DELETE CASCADE;
-- ALTER TABLE charges_horaires ADD CONSTRAINT jours FOREIGN KEY (id_jour) REFERENCES utils(id_jour) ON UPDATE CASCADE ON DELETE CASCADE;
-- ALTER TABLE charges_horaires ADD CONSTRAINT vacations FOREIGN KEY (id_vacation) REFERENCES vacations(id_vacation) ON UPDATE CASCADE ON DELETE CASCADE;
--  -- ================================================================================================

-- NB : Un soucis , une charge horaire ne peut pas exister sans utilisateur, 
-- cependant Musql refuse de ffaire une contrainte double pour une seul table, 
-- il faut donc trouver une solution pour relier lable charges_horaires à la table utils












module2annoncescharges_horaires