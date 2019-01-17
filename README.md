# integration_continue

#TP Docker #
  Dans ce petit TP, on a choisi de créer une petite appication php qui est déployée dans son propre container qui va
  communiquer avec une base de donnée mysql se trouvant dans un autre container. Pour l'applicationn on a choisi de
  builder une image avec un dockerfile basée sur "php:7.0-apache" afin d'installer toutes les dépendance dont on a
  besoin (mysqli...), concernant la base de donnée on a récupéré une image existante sur le docker hub qui est déjà
  prête à l'utilisation.

  On a regroupé tous ces containers dans un docker-compose pour qu'on puisse les démarrer assez facilement et les
  manipuler sous forme de services.

  Pour que notre application connaisse le container ou se trouve la base de données, il faut qu'elle connaisse son adresse
  ip, en effet avec docker-compose "links" permet de dire à un container de connaitre un autre container,  connaitre un
  autre connaitre c'est-à-dire l'ajouter dans le /etc/hosts.

  Le container de notre application ne sert pas à grand chose si container de la base de données n'est pas up, du coup, on
  dit via le mot clé "depends_on" dans docker-compose que le container de notre application dépend de celui de la base de
  données, ce qui fait que si la base de données n'est pas up l'application ne sera jamais up.

  On a également lié le port 80 de de container de notre application au port 8081 de la machine haute pour pouvoir écouter
  dessus.

  Le mot clé "Volumes" de docker-compose, on a la possibilité de partager une volume (dossier, fichier) entre le machine haute
  et un container, ce qui permet de synchroniser le code en temps réel entre la machine haute et le container (sur docker for
  mac, il faut passer par docker-sync pour assurer la synchronisation).
