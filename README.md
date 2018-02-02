# Lalahomev2

Lalahome est un site d'automation pour habitations connectées developpé pour la société DomISEP.

## Commençons !

Les instructions suivantes vous permettrons d'installer le site sur votre serveur de production Debian ou Ubuntu.

### Prérequis 

Pour installer mettre à disposition le site sur votre serveur de production merci d'avoir au préalable un serveur configurer avec les packets suivants

```
PHP 7.1
APACHE 2.4 ou NGINX 
Mysql ou MariaDB 
phpmyadmin
```

## Installation 

Commençons par nous placer à la racine de votre Serveur Web: 
sous apache
```
cd /var/www/
```
Installation de git

```
apt install git 
```

Puis on clone le repository: 

```
git clone https://github.com/godblesslancek/Lalahomev2.git
```

Maintenant nous allons donner les permissions au web serveur sur le dossier précédement télécharger : 

```
chown 33:33 -R Lalahomev2/
```

Passons maintenant à la configuration de notre web serveur apache: 

```
cd /etc/apache2/sites-available/
touch lalahome.conf
nano lalahome.conf
```

Copier coller la configuration suivante: 
(Remplacer exemple.com et www.example.com par le nom de domaine de votre server)
```
<VirtualHost *:80>
    ServerName example.com
    ServerAlias www.example.com
    DirectoryIndex index.php
    DocumentRoot /var/www/LalahomeV2
</VirtualHost>
```

On active la configuration: 
```
a2ensite lalahome.conf
service apache2 reload 
```

Vérifier que vous pouvez accéder à www.votrenomdedomain.tld 

Si vous pouvez accéder passons à la configuration de la base de donnée: 

```
Depuis l'interface graphique de phpmyadmin créer une nouvelle base de donnée et importer le fichier .sql 
qui se trouve sur la page de wiki
```

Maintenant configurer dans le fichier Database.php, LalahomeV2/Model/Database.php,
Modifier les informations de connexion suivantes selon votre configuration :

```
    private $_host = "localhost";
    private $_username = "root";
    private $_password = "root";
    private $_database = "techouse";
```

Voilà ! Votre si est prêt ! 

Vous pouvez dès à présent vous connecter avec l'identifiant admin@domisep.fr et mot de passe admin.



## Créé avec 

* [PHP 7.1] 
* [ChartJS](http://www.chartjs.org/) 
* [JQuery](https://jquery.com/)
* [JQuery UI ](https://jqueryui.com/) 


## Auteurs

* **Thomas Buatois** 
* **Amel El Yaaqoubi**
* **Lancelot Kinkelin**
* **Micke-Anthony Gbaguidi** 
* **Leslie Dainelli** 
* **Adrien Girodengo** 


