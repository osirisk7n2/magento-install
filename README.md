Quickstart Explanation
----------------------

The following is an explanation of how this Quickstart was created so you can use it as a guide in creating your own Quickstarts.

* Config File: Because Pagoda Box needs a different config file than a local version of the site, we created a new directory in the root of the project called "pagoda" and created a pagoda version of the config file there. Then we created an After Build deploy hook in the Boxfile that moved that file from pagoda/settings.php to sites/default/settings.php. Also, in place of the static database credentials, we used the auto-created environment variables.

<pre>
    <code>
        after_build:
            - "php /var/www/pagoda/local_xml_generator.php"
    </code>
</pre>

* Database Component: An empty database was created by adding a db component to the Boxfile.

<pre>
    <code>
        db1:
            name: mag-db
            type: mysql
    </code>
</pre>

* Cache Component: An empty memcache component was created by adding a cache component to the Boxfile.

<pre>
    <code>
        cache1:
            name: mag-cache
            type: memcache
    </code>
</pre>

* Example Media: Because the "media" directory is writable, it doesn't get pulled from the repo, so it's necessary to place the example catalog images in there on the first deploy. This was done with a Before Deploy hook that downloaded and uncompressed it.

<pre>
    <code>
        before_deploy:
            - "tar -xz \< \<(curl -s http://cloud.github.com/downloads/pagodabox/magento-install/magento-media.tar.gz)"
    </code>
</pre>

* Database Import: Since the install script creates database tables, it was necessary to import an SQL file with those tables and the example catalog content. We did that with a Before Deploy hook, but since that import should only happen on the first deploy and not subsequent deploys, we placed it in the Boxfile.install file.

<pre>
    <code>
        - "mysql -h $DB1_HOST --port $DB1_PORT -u $DB1_USER -p$DB1_PASS $DB1_NAME \< /var/www/pagoda/magento_sample_data_for_1.6.1.0.sql"
    </code>
</pre>

* Increase php_max_execution_time: We increased the php_max_execution_time to 300 seconds to allow the database import plenty of time to complete. Then in the Boxfile we turned that back down to 100, so on subsequent deploys it would get turned back down.

<pre>
    <code>
        php_max_execution_time: 300
    </code>
</pre>