This code tries to intergrate EmberJS with CakePHP.

In the initial commit just the retrieving works...

This is the table used to hold the Todo's

    CREATE TABLE `todos` (
        `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
        `title` text,
        `isCompleted` tinyint(1) DEFAULT NULL,
        `created` datetime DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8
