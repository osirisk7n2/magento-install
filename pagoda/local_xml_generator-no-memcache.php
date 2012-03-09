<?php 

$xml = new XmlWriter();
$xml->openMemory();
$xml->startDocument('1.0');
$xml->startElement('conifig');
    $xml->startElement('global');
        $xml->startElement('install');
            $xml->startElement('date');
                $xml->writeCData("Tue, 31 Jan 2012 16:26:32 +0000");
            $xml->endElement(); //date
        $xml->endElement(); //install
        $xml->startElement('crypt');
            $xml->startElement('key');
                $xml->writeCData("a1c7cec1bc010e443bff2ef1df04fe3a");
            $xml->endElement(); //key
        $xml->endElement(); //crypt
        $xml->startElement('disable_local_modules');
            $xml->writeCData('false');
        $xml->endElement(); // disable_local_modules
        $xml->startElement('resources');
            $xml->startElement('db');
                $xml->startElement('table_prefix');
                    $xml->writeCData('');
                $xml->endElement(); // table_prefix
            $xml->endElement(); // db
            $xml->startElement('default_setup');
                $xml->startElement('connection');
                    $xml->startElement('host');
                        $xml->writeCData($_SERVER['DB1_HOST']);
                    $xml->endElement(); // host
                    $xml->startElement('username');
                        $xml->writeCData($_SERVER['DB1_USER']);
                    $xml->endElement(); // username
                    $xml->startElement('password');
                        $xml->writeCData($_SERVER['DB1_PASS']);
                    $xml->endElement(); // password
                    $xml->startElement('dbname');
                        $xml->writeCData($_SERVER['DB1_NAME']);
                    $xml->endElement(); // dbname
                    $xml->startElement('initStatements');
                        $xml->writeCData('SET NAMES utf8');
                    $xml->endElement(); // initStatements
                    $xml->startElement('model');
                        $xml->writeCData('mysql4');
                    $xml->endElement(); // model
                    $xml->startElement('type');
                        $xml->writeCData('pdo_mysql');
                    $xml->endElement(); // type
                    $xml->startElement('pdoType');
                        $xml->writeCData('');
                    $xml->endElement(); // pdoType
                    $xml->startElement('active');
                        $xml->writeCData('1');
                    $xml->endElement(); // active
                $xml->endElement(); // connection
            $xml->endElement(); // default_setup
        $xml->endElement(); // resources
        $xml->startElement('session_save');
            $xml->writeCData('files');
        $xml->endElement(); // session_save
    $xml->endElement(); // global
    $xml->startElement('admin');
        $xml->startElement('routers');
            $xml->startElement('adminhtml');
                $xml->startElement('args');
                    $xml->startElement('frontname');
                        $xml->writeCData('admin');
                    $xml->endElement(); //frontname
                $xml->endElement(); //args
            $xml->endElement(); //adminhtml
        $xml->endElement(); //admin
    $xml->endElement(); //admin
$xml->endElement(); //config

$handle = fopen('/var/www/app/etc/local.xml', 'a');
fwrite($handle, $xml->outputMemory(true));
    
?>