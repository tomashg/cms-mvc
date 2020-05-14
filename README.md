1. add domain cms.local
2. Add virtualHost like:

<VirtualHost *:80>
    DocumentRoot "/cms-mvc/public"
    ServerName cms.local
    <Directory "/cms-mvc/public">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>

3. import table (db cms)
