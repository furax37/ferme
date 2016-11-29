<?php
$config = array(
    'db_host' => 'XXXXXXXXXX', // fournis par votre hébergeur
    'db_name' => 'XXXXXXXXXX', // fournis par votre hébergeur
    'db_user' => 'XXXXXXXXXX', // fournis par votre hébergeur
    'db_password' => 'XXXXXXXXXX', // fournis par votre hébergeur
    'base_url' => 'http://localhost/ferme/', // indiquez le chemin de votre ferme
    'source' => 'yeswiki-cercopitheque', // à priori, ne pas changer
    'log_file' => 'ferme.log', // à priori, ne pas changer
    'ferme_path' => 'wikis/', // à priori, ne pas changer
    'archives_path' => 'archives/', // à priori, ne pas changer
    'tmp_path' => '/tmp/', // à priori, ne pas changer
    'template' => 'default', // à priori, ne pas changer
    'mail_from' => 'no-reply@domain.tld', // remplacez domaine.tld par votre domaine
    'users' => array(
        // ici de l'administrateurs de la ferme. 
        // par défaut : compte admin et pass password (dans l'idéal les mots de passe doivent être chiffrés)
        // on peut créer plusieurs admins (dupliquer la ligne)
        'admin' => password_hash('password', PASSWORD_DEFAULT),
    ),
    'contacts' => array(
        // il s'agit du nom des admins référents
        // on peut créer plusieurs admins (dupliquer la ligne)
        'Votre nom' => 'votre.nom@domain.tld'
    ),
    // Default md5 password for installed wikis, le pass du WikiAdmin par défaut
    'admin_password' => md5('password'),
);
