
INSERT INTO actors(lastname,firstname) VALUES
  ('Jordan','Michael B.');

INSERT INTO sheets_actors VALUES
  (1,1);

INSERT INTO `categories` (`id`, `name`) VALUES
  (1, 'Action'),
  (2, 'Science fiction'),
  (3, 'Comédie'),
  (4, 'Horreur'),
  (5, 'Guerre'),
  (6, 'Musique'),
  (7, 'Drame'),
  (8, 'Thriller'),
  (9, 'Policier'),
  (10, 'Animation');

INSERT INTO `sheets_categories` (`id_sheet`, `id_category`) VALUES
  (1, 2),
  (3, 1),
  (2, 2),
  (4, 8),
  (3, 7),
  (5, 3),
  (5, 1),
  (5, 9),
  (6, 7),
  (6, 7),
  (7, 3),
  (8, 10),
  (8, 3),
  (8, 1),
  (9, 3),
  (10, 7),
  (11, 1),
  (11, 7),
  (11, 8),
  (12, 9),
  (12, 7);

/*SHEETS*/
INSERT INTO `sheets` (`title`, `director`, `date`, `nationality`, `synopsis`, `image`) VALUES
  ('Black panther', 'Ryan Coogler', '2018-02-14', 'Américain', 'Après les événements qui se sont déroulés dans Captain America : Civil War, T’Challa revient chez lui prendre sa place sur le trône du Wakanda, une nation africaine technologiquement très avancée. Mais lorsqu’un vieil ennemi resurgit, le courage de T’Challa est mis à rude épreuve, aussi bien en tant que souverain qu’en tant que Black Panther. Il se retrouve entraîné dans un conflit qui menace non seulement le destin du Wakanda, mais celui du monde entier…', 'black-panther.jpg'),
  ('Avengers: Infinity war', 'Anthony Russo, Joe Russo\r\n', '2018-04-25', 'Américain', 'Les Avengers et leurs alliés devront être prêts à tout sacrifier pour neutraliser le redoutable Thanos avant que son attaque éclair ne conduise à la destruction complète de l’univers.', 'infinity-war.jpeg'),
  ('Tomb Raider', 'Roar Uthaug', '2018-03-14', 'Américain', 'Lara Croft, 21 ans, n\'a ni projet, ni ambition : fille d\'un explorateur excentrique porté disparu depuis sept ans, cette jeune femme rebelle et indépendante refuse de reprendre l\'empire de son père. Convaincue qu\'il n\'est pas mort, elle met le cap sur la destination où son père a été vu pour la dernière fois : la tombe légendaire d\'une île mythique au large du Japon. Mais le voyage se révèle des plus périlleux et il lui faudra affronter d\'innombrables ennemis et repousser ses propres limites pour devenir \"Tomb Raider\"…', 'tomb-raider.jpeg'),
  ('Taxi 5','Franck Gastambide','2018-04-11','Français','Sylvain Marot, super flic parisien et pilote d’exception, est muté contre son gré à la Police Municipale de Marseille. L’ex-commissaire Gibert, devenu Maire de la ville et au plus bas dans les sondages, va alors lui confier la mission de stopper le redoutable « Gang des Italiens », qui écume des bijouteries à l’aide de puissantes Ferrari. Mais pour y parvenir, Marot n’aura pas d’autre choix que de collaborer avec le petit-neveu du célèbre Daniel, Eddy Maklouf, le pire chauffeur VTC de Marseille, mais le seul à pouvoir récupérer le légendaire TAXI blanc.','taxi5.jpg'),
  ('N.W.A','Gary Gray','2015-09-16','Américain','En 1987, cinq jeunes hommes exprimaient leur frustration et leur colère pour dénoncer les conditions de vie de l endroit le plus dangereux de l’Amérique avec l arme la plus puissante qu ils possédaient : leur musique. Voici la véritable histoire de ces rebelles, armés uniquement de leur parole, de leur démarche assurée et de leur talent brut, qui ont résisté aux autorités qui les opprimaient. Ils ont ainsi formé le groupe de rappeur des N.W.A. en dénonçant la réalité de leur quartier. Leur voix a alors déclenché une révolution sociale qui résonne encore aujourdhui.','nwa.jpg'),
  ('Quest ce quon a fait au bon dieu','Philippe de Chauveron','2014-04-16','Français','Claude et Marie Verneuil, issus de la grande bourgeoisie catholique provinciale sont des parents plutôt "vieille France". Mais ils se sont toujours obligés à faire preuve douverture desprit...Les pilules furent cependant bien difficiles à avaler quand leur première fille épousa un musulman, leur seconde un juif et leur troisième un chinois.
Leurs espoirs de voir enfin lune delles se marier à léglise se cristallisent donc sur la cadette, qui, alléluia, vient de rencontrer un bon catholique.','qcqafabd.jpg'),
  ('Les indestructibles','Brad Bird','2004-10-24','Américain','Bob Paar était jadis l’un des plus grands super-héros de la planète. Tout le monde connaissait "Mr. Indestructible", le héros qui, chaque jour, sauvait des centaines de vies et combattait le mal. Mais aujourd’hui, Mr. Indestructible est un petit expert en assurances qui n’affronte plus que l’ennui et un tour de taille en constante augmentation.
Contraint de raccrocher son super costume quinze ans plus tôt à la suite d’une série de
lois ineptes, Bob et sa femme, Hélène, ex-Elastigirl, sont rentrés dans le rang et s’efforcent de mener une vie normale avec leurs trois enfants.
Rongeant son frein, rêvant de repasser à l’action, Bob bondit sur l’occasion lorsqu’une mystérieuse convocation l’appelle sur une île lointaine pour une mission top-secret. Il va découvrir que derrière cette alléchante proposition, se cache un génie malfaisant avide de
vengeance et de destruction.','indestructibles.jpg'),
  ('Pattaya','Franck Gastambide','2016-02-24','Français','Franky et Krimo rêvent de quitter la grisaille de leur quartier pour partir en voyage dans la célèbre et sulfureuse station balnéaire thaïlandaise de PATTAYA. Pour pouvoir s’y rendre à moindre coût, les deux amis ont la folle idée d’inscrire à son insu le nain de leur quartier au championnat du monde de Boxe Thaï des Nains. Mais ce qui devait être pour eux des vacances de rêves va se transformer en l’aventure la plus dingue et périlleuse de leurs vies.','pataya.jpg'),
  ('Creed','Ryan Coogler','2016-01-13','Américain','Adonis Johnson n’a jamais connu son père, le célèbre champion du monde poids lourd Apollo Creed décédé avant sa naissance. Pourtant, il a la boxe dans le sang et décide d’être entraîné par le meilleur de sa catégorie. À Philadelphie, il retrouve la trace de Rocky Balboa, que son père avait affronté autrefois, et lui demande de devenir son entraîneur. Dabord réticent, lancien champion décèle une force inébranlable chez Adonis et finit par accepter…','creed.jpg'),
  ('Scarface','Brian De Palma','1984-03-07','Americain','En 1980, Tony "Scarface" Montana bénéficie d’une amnistie du gouvernement cubain pour retourner en Floride. Ambitieux et sans scrupules, il élabore un plan pour éliminer un caïd de la pègre et prendre la place qu’il occupait sur le marché de la drogue.','scarface.jpg'),
  ('Le Parrain','Francis Ford Coppola','1972-09-18','Americain','En 1945, à New York, les Corleone sont une des cinq familles de la mafia. Don Vito Corleone, "parrain" de cette famille, marie sa fille à un bookmaker. Sollozzo, " parrain " de la famille Tattaglia, propose à Don Vito une association dans le trafic de drogue, mais celui-ci refuse. Sonny, un de ses fils, y est quant à lui favorable.
Afin de traiter avec Sonny, Sollozzo tente de faire tuer Don Vito, mais celui-ci en réchappe. Michael, le frère cadet de Sonny, recherche alors les commanditaires de l’attentat et tue Sollozzo et le chef de la police, en représailles.
Michael part alors en Sicile, où il épouse Apollonia, mais celle-ci est assassinée à sa place. De retour à New York, Michael épouse Kay Adams et se prépare à devenir le successeur de son père...','thegodfather.jpg');

