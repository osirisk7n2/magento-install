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
            $xml->writeCData('memcache');
        $xml->endElement(); // session_save
        $xml->startElement('session_save_path');
            $xml->writeCData('tcp://' . $_SERVER["CACHE2_HOST"] . ':' . $_SERVER["CACHE2_PORT"] . '?persistent=1&weight=2&timeout=10&retry_interval=10');
        $xml->endElement(); // session_save_path
        $xml->startElement('session_cache_limiter');
            $xml->writeCData('');
        $xml->endElement(); // session_cache_limiter
        $xml->startElement('cache');
            $xml->startElement('backend');
                $xml->writeCData('memcached');
            $xml->endElement(); // slow_backend
            $xml->startElement('slow_backend');
                $xml->writeCData('database');
            $xml->endElement(); // backend
            $xml->startElement('slow_backend_store_data');
                $xml->writeCData('0');
            $xml->endElement(); // slow_backend_store_data
            $xml->startElement('auto_refresh_fast_cache');
                $xml->writeCData('0');
            $xml->endElement(); // auto_refresh_fast_cache
            $xml->startElement('memcached');
                $xml->startElement('servers');
                    $xml->startElement('server');
                        $xml->startElement('host');
                            $xml->writeCData($_SERVER["CACHE1_HOST"]);
                        $xml->endElement(); // host
                        $xml->startElement('port');
                            $xml->writeCData($_SERVER["CACHE1_PORT"]);
                        $xml->endElement(); // port
                        $xml->startElement('persistent');
                            $xml->writeCData('1');
                        $xml->endElement(); // persistent
                        $xml->startElement('weight');
                            $xml->writeCData('2');
                        $xml->endElement(); // weight
                        $xml->startElement('timeout');
                            $xml->writeCData('10');
                        $xml->endElement(); // timeout
                        $xml->startElement('retry_interval');
                            $xml->writeCData('10');
                        $xml->endElement(); // retry_interval
                        $xml->startElement('status');
                            $xml->writeCData('1');
                        $xml->endElement(); // status
                    $xml->endElement(); // server
                $xml->endElement(); // servers
                $xml->startElement('compression');
                    $xml->writeCData('0');
                $xml->endElement(); // compression
            $xml->endElement(); // memcached
        $xml->endElement(); // cache
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

$handle = fopen('/var/www/app/etc/local.xml', 'w');
fwrite($handle, $xml->outputMemory(true));
    
?>