# integration_continue
# integration_continue
Projet Docker : Étapes

- Récupération de l'image Debian pour les deux containers.
- Le premier container, celui du web, récupère les packages nécessaires, comme apache et curl
- On configure correctement apache pour que celui-ci affiche l'index quand demandé.

- Création du fichier docker-compose qui liste les dépendances et les ports.

- Le second container, celui de la bdd, récupère sqlite3. Dans le dockerfile, nous précisons aussi le nom du fichier .bd à créer dans le fichier PHP.

-On accède finalement à la page web qu'on  a précédement placé dans le dossier www Apache de l'instance web qui nous permet de nous connecter à l'instance BD, créer la base de données, insérer des éléments dans un tableau et les récupérer.



