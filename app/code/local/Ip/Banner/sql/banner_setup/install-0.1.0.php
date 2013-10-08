<?php
$installer = $this;
$installer->startSetup();
$installer->run("
    DROP TABLE IF EXISTS {$installer->getTable('banner/slide')};
    CREATE TABLE {$installer->getTable('banner/slide')} (
        `slide_id` int(11) NOT NULL auto_increment,
        `title` varchar(255),
        `content` text,
        `url` varchar(255),
        `image` varchar(255),
        `status` int(1) NOT NULL DEFAULT '1',
        `position` int(11) NOT NULL DEFAULT '0',
        PRIMARY KEY (`slide_id`)
    );
");
$installer->endSetup();