Version 2.0.0 intégrée avec IOT
-------------------------
Depuis le 16 juillet, l'ancienne API de Viessmann ne semble plus utilisable.
J'ai donc planché sur une première version en urgence s'intégrant avec l'api IOT.
J’ai fait en sorte qu’elle est fonctionnelle pour la lecture des données. 
Il se peut que certaines données ne soient pas tout de suite dispo et que je doives adapté certaines routes.


Attention que pour l’api, il faut générer un api key sur le portail https://developer.viessmann.com/ et l'ajouter dans le champ clientId de credentials.properties.
Attention de désactiver l'option ReCaptcha qui forcera une validation du mot de passse par captcha!
L'url de rédirection à préciser est http://localhost:4200/
Il faut donc reprendre le fichier [bootstrap.php](https://github.com/thetrueavatar/Viessmann-Api/raw/features/iot/example/bootstrap.php) et [credentias.properties](https://github.com/thetrueavatar/Viessmann-Api/raw/features/iot/example/credentials.properties).

La release  se trouve sur https://github.com/thetrueavatar/Viessmann-Api/releases/tag/2.0.0

Désormais les informations sur les versions précédentes sont dispo dans le changelog: https://github.com/thetrueavatar/Viessmann-Api/blob/develop/Changelog.md  

If you wish to contribute or thanks me /Si souhaitez me soutenir ou me remercier:[![paypal](https://www.paypalobjects.com/fr_FR/BE/i/btn/btn_donate_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LPAMB5QUEPV48)
 

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
