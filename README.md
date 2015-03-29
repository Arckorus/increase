![Increase logo](http://open-beer.kobject.net/img/Increase.png "Increase logo")
# increase
A Phalcon web application to manage the progress of projects, and improve communication with the customer

# Équipe
Pierre Lefèvre & Erwan Gesquin

# Travail effectué
* Au niveau du visuel, nous avons utilisé Bootstrap tout au long du projet afin de rester cohérent.
* Ajout sur l'index de trois boutons, l'un pour faire des tests sur la connexion, un autre pour accéder à la liste des projets d'un auteur, le dernier pour accéder à la liste des projets d'un client.
* Ajout de la liste des projets (client et auteur) avec le nom, l'avancement, les jours restants et un bouton pour accéder au détail.
* Ajout de la page du détail d'un projet qui comporte :
    * La photo du projet
    * Le nom du projet
    * Le détail du projet (description, date de création et date de mise à jour)
    * L'équipe qui travail sur le projet (pour un utilisateur) / Les uses cases du projet (pour un auteur)
    * Les messages portant sur ce projet
    * Le bouton de retour à la liste des projets
* Concernant la partie "Mes Uses Cases", on y trouve la liste des uses cases avec leurs noms, leurs poids, leurs avancements et le nombre de tâches qui les composent. On peut également accéder à ces dernières en cliquant sur la use case associée.
* Les tâches sont sélectionnables et les boutons "Modifier..." et "Supprimer" apparaissent en plus du bouton "+ Ajouter une tâche".
* La partie "Messages" apparaît après un clique sur le bouton "X Messages..." (où X est le nombre de message). Cette partie présente tous les messages liés à un projet sous forme d'arborescence (message de 1er, 2ème, 3ème... niveau de subordination). Il y a également un bouton pour ajouter un nouveau message de rang1, et chaque message possède son propre bouton pour ajouter un message de rangX+1 (où X est le rang du message avec ce bouton).
* Le système de connexion à l'application (pas entièrement fonctionnel).

# Travail non effectué
* Rendre fonctionnel les boutons suivants : "+ Ajouter une tâche", "Modifier...", "Supprimer", "Répondre" et "+ Nouveau message".
* Améliorer le système de connexion.
