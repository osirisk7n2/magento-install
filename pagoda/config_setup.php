<?php

$local_xml = "
header('Content-type: text/xml');
header('Pragma: public');
header('Cache-control: private');
header('Expires: -1');
<?xml version=\"1.0\"?>;
<config>
				<global>
					<install>
            <date><![CDATA[Tue, 31 Jan 2012 16:26:32 +0000]]></date>
        	</install>
        	<crypt>
            <key><![CDATA[a1c7cec1bc010e443bff2ef1df04fe3a]]></key>
        	</crypt>
        	<disable_local_modules>false</disable_local_modules>
        	<resources>
            <db>
              <table_prefix><![CDATA[]]></table_prefix>
            </db>
            <default_setup>
              <connection>
                <host><![CDATA['. $_SERVER['DB1_HOST'] .']]></host>
                <username><![CDATA[' . $_SERVER['DB1_USER'] . ']]></username>
                <password><![CDATA[' . $_SERVER['DB1_PASS'] . ']]></password>
                <dbname><![CDATA[' . $_SERVER['DB1_NAME'] . ']]></dbname>
                <initStatements><![CDATA[SET NAMES utf8]]></initStatements>
                <model><![CDATA[mysql4]]></model>
                <type><![CDATA[pdo_mysql]]></type>
                <pdoType><![CDATA[]]></pdoType>
                <active>1</active>
              </connection>
            </default_setup>
        	</resources>
        	<session_save><![CDATA[files]]></session_save>
    		</global>
		    <admin>
	        <routers>
            <adminhtml>
              <args>
                <frontName><![CDATA[admin]]></frontName>
              </args>
            </adminhtml>
	        </routers>
		    </admin>
		  </config>";
echo $local_xml;
?>