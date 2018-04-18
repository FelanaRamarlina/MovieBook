# MovieBook

Compilateur epub (JAVA): https://github.com/IDPF/epub3-samples
<br>
Exemple architecture EPUB: https://github.com/IDPF/epub3-samples/tree/master/31/moby-dick-mo

Pour compiler le python en PHP et générer le epub:
1. dans un dossier "temp", on crée un dossier avec le timestamp + id de la personne qui crée convertis en b64 / md5. (ex: 1524061305-1 -> c1c6228473e6b3548bc985a2720f8eb6)
2. Dans ce dossier, on place tous les fichiers nécéssaires à la création de l'epub
3. On envoie le chemin du dossier en HTTP POST au scrypt python qui compile ensuite dans le dossier reçu.
4. Quand le script python a terminé, réponse HTTP vers le script PHP initiateur indiquant erreur ou succes.
5. On déplace le epub généré dans un dossier *archives/epub* et on supprme le dossier généré dans temp.

![schema](https://prnt.sc/j6y88l)
