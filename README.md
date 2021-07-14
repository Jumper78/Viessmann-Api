Version 2.0.0-SNAPSHOT intégrée avec IOT
-------------------------
Pour information, suite au mail d’avertissement de viessmann j’ai un peu retravaillé sur la branche features/iot (https://github.com/thetrueavatar/Viessmann-Api/tree/features/iot) qui permet de s’intégrer avec la nouvelle api de Viessmann.

J’ai fait en sorte qu’elle est fonctionnelle pour la lecture des données. 
Néanmoins en pratique j’ai remarqué que pas mal de données ne sont pas encore exposée.
Je n’ai pas encore regardé pour les écritures.
Attention que pour l’api, il faut générer un api key sur le portail https://developer.viessmann.com/ .
et l'ajouter dans le champ clientId de credentials.properties dont j'ai adapté la structure:

    clientId=xxxx

Le phar se trouve sur https://github.com/thetrueavatar/Viessmann-Api/raw/features/iot/example/Viessmann-Api-2.0.0-SNAPSHOT.phar 

If you wish to contribute or thanks me /Si souhaitez me soutenir ou me remercier:[![paypal](https://www.paypalobjects.com/fr_FR/BE/i/btn/btn_donate_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3DAXXVZV7PCR6)

Version 1.4.0
-------------
Basculement sur la version v2 du service Oauth Viessmann. Plusieurs autres modifications voir release note https://github.com/thetrueavatar/Viessmann-Api/releases/tag/1.4.0

Version 1.3.4
-------------
Suppression de la dépendance sur php 7.1 et fix de GetAvailableFeatures
https://github.com/thetrueavatar/Viessmann-Api/releases/tag/1.3.4

Version 1.3.3
--------------

Ajout d'un import DateTime manquant créant une erreur lors du traitement du message de ban de Viessmann:
https://github.com/thetrueavatar/Viessmann-Api/releases/tag/1.3.3

Version 1.3.2
--------------
Attention, cette version nécessite php et php-curl 7.1 pour supporter l'utilisation du "?".
Translated documentation can be found here:
- English: https://github.com/thetrueavatar/Viessmann-Api/blob/develop/README-en.md 

Ajout d'une cache et refactoring pour réduire la charge sur le serveur Viessmann https://github.com/thetrueavatar/Viessmann-Api/releases/tag/1.3.2
Il est désormais possible de définir dans le credentials.properties son installationId(3ème ligne) et son gatewayid(4ème ligne) ce qui réduit le nombre de requêtes nécessaire.
Ces valeurs peuvent être obtenues en appelant les méthodes getGatewayId and getInstallationId avec juste le user/pwd dans credentials.properties.
Cela réduira le nombre de requête à 3 dont 2 pour l'authentification qui ne comptent pas dans le quota.
La cache est utilisée pour tout appelle sur l'objet ViessmannApi.
Le code suivant ne fait donc qu'un seul appel au total:

    <?php
    include __DIR__ . '/bootstrap.php';
    $viessmannApi->getOutsideTemperature());
    $viessmannApi->getBoilerTemperature());
    $viessmannApi->getSlope());
    $viessmannApi->getShift());

Comme déjà expliqué Viessmann limite désormais le nombre de requête sur son service:
* 120 calls for a time window of 10 minutes
* 1450 calls for a time window of 24 hours



News FR
----
Une nouvelle version utilisant une cache et évitant un nombre trop important d'appel est disponible en snapshot. Cette version a été développé à l'aveulge(mon compte est bloqué) mais fonctionne en test local. Faites-moi le plus de retour possible ! 
Attention, la cache fonctionne à condition que vous fassiez tout vos appels sur le même objet viessmannApi.
Exemple:

 $viessmannApi->getOutsideTemperature());

 $viessmannApi->getBoilerTemperature());
 
 $viessmannApi->getSlope());
 
 $viessmannApi->getShift());
 

General info
-----

Translated documentation can be found here:
- English: https://github.com/thetrueavatar/Viessmann-Api/blob/develop/README-en.md 

Implémentation d'une interface pour récupérer les données exposées par le service Viessmann.

Ce service accessible via autorisation OAUTH2 expose les données via l'approche HATEOAS implémentée par Siren dont la spécification est définie ici:

https://github.com/kevinswiber/siren

Le but de l'api est de cacher ces aspects techniques poru exposer directement les données.

Je suis novice en php(JAVAEE Dev) donc il se peut que je ne connaisse pas les conventions/habitudes php. Tout conseil/remarque est apprécié et n'hésitez pas à contribuer !

Je précise aussi que je partage mon dev perso mais ne souhaite pas faire un support intensif (pas le temps). Je ne donne donc pas de garantie sur la résolution de tel ou tel bug en terme de délais de résolution.
De toute façon, cmme on dit dans l'open-source "Please contribute" ;-)

Pour voir les explications sur l'utilisation voir wiki: https://github.com/thetrueavatar/Viessmann-Api/wiki/French ou le code de example/Main.php

Voici la doc des méthodes de l'api [**Viessmann API**](https://htmlpreview.github.io/?https://github.com/thetrueavatar/Viessmann-Api/blob/develop/docs/index.html):

Une fonctionnalité manque ? N'hésitez pas à l'ajouter vous-même ! Je suis en train de construire un petit guide pour le faire:
[How to add new feature by yourself](https://github.com/thetrueavatar/Viessmann-Api/wiki/How-to-add-you-own-feature-to-the-api):
