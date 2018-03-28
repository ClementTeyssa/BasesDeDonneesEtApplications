CREATE TABLE `user` (
  `name` varchar(30) DEFAULT NULL,
  `surname` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `birthDate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`name`, `surname`, `email`, `address`, `phoneNumber`, `birthDate`) VALUES
('esport', 'noob', 'noob@esport.nl', '48541 place Gueric', '0626389123', '1993-11-22'),
('Johni', 'John', 'john.johni@gmail.com', '45 rue Berhu', '0622489563', '1996-02-16');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);
COMMIT;



CREATE TABLE `comment` (
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idGame` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`title`, `content`, `id`, `email`, `updated_at`, `created_at`, `idGame`) VALUES
('Morbi tortor orci, c', 'Cras varius velit id ante rhoncus, porttitor malesuada velit sagittis. \r\nPraesent ac rhoncus augue. Nullam varius massa ac ex pulvinar, eu iaculis nunc porttitor. \r\nQuisque a ante pretium ex consequat lobortis. Curabitur tincidunt risus eleifend dolor convallis, \r\nsit amet feugiat sem viverra. Aenean quis tempus quam. \r\nMaecenas ex ante, condimentum a lorem ac, vestibulum interdum orci. ', 12, 'noob@esport.nl', '2018-03-28 15:48:33', '2018-03-28 15:48:33', 12342),
('Donec nibh ante, pre', 'Nullam vel nisi eu mauris gravida imperdiet id et mi. Proin euismod placerat nisi\r\n ac suscipit. Sed ut turpis molestie, consectetur odio ac, iaculis orci. Praesent lobortis nunc \r\n nec felis commodo, a vulputate orci suscipit. Sed arcu mi, gravida nec erat vitae, molestie porttitor\r\n  dolor. Pellentesque nec dolor nec eros aliquet sodales. Praesent hendrerit porttitor mauris, a accumsan erat\r\n   condimentum et. Nullam placerat fringilla lectus, nec rhoncus nulla tempor ullamcorper. Fusce non sollicitudin metus. ', 11, 'noob@esport.nl', '2018-03-28 15:48:33', '2018-03-28 15:48:33', 12342),
('Duis porttitor dapib', 'Fusce vulputate rutrum mi. Quisque posuere dictum sem vel placerat. \r\nIn sit amet scelerisque ligula. Curabitur vel purus et nisi iaculis facilisis ac in orci. \r\nAliquam vitae fermentum orci. Quisque vulputate venenatis condimentum. Vestibulum vitae massa nunc. ', 10, 'noob@esport.nl', '2018-03-28 15:48:33', '2018-03-28 15:48:33', 12342),
('Etiam sagittis aliqu', 'Fusce vulputate rutrum mi. Quisque posuere dictum sem vel placerat. \r\nIn sit amet scelerisque ligula. Curabitur vel purus et nisi iaculis facilisis ac in orci. \r\nAliquam vitae fermentum orci. Quisque vulputate venenatis condimentum. Vestibulum vitae massa nunc. ', 9, 'john.johni@gmail.com', '2018-03-28 15:48:33', '2018-03-28 15:48:33', 12342),
('Phasellus purus sapi', 'Cras varius velit id ante rhoncus, porttitor malesuada velit sagittis. \r\nPraesent ac rhoncus augue. Nullam varius massa ac ex pulvinar, eu iaculis nunc porttitor. \r\nQuisque a ante pretium ex consequat lobortis. Curabitur tincidunt risus eleifend dolor convallis, \r\nsit amet feugiat sem viverra. Aenean quis tempus quam. \r\nMaecenas ex ante, condimentum a lorem ac, vestibulum interdum orci. ', 8, 'john.johni@gmail.com', '2018-03-28 15:48:33', '2018-03-28 15:48:33', 12342),
('Lorem ipsum dolor si', 'Nullam vel nisi eu mauris gravida imperdiet id et mi. Proin euismod placerat nisi\r\n ac suscipit. Sed ut turpis molestie, consectetur odio ac, iaculis orci. Praesent lobortis nunc \r\n nec felis commodo, a vulputate orci suscipit. Sed arcu mi, gravida nec erat vitae, molestie porttitor\r\n  dolor. Pellentesque nec dolor nec eros aliquet sodales. Praesent hendrerit porttitor mauris, a accumsan erat\r\n   condimentum et. Nullam placerat fringilla lectus, nec rhoncus nulla tempor ullamcorper. Fusce non sollicitudin metus. ', 7, 'john.johni@gmail.com', '2018-03-28 15:48:33', '2018-03-28 15:48:33', 12342);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;