# lerndex.de — Laufzeitabbild
#
# Einstufig: Die Seite hat keinen Build-Schritt und keine Abhaengigkeiten
# (PHP-Includes, Vanilla CSS/JS). Das Repository-Wurzelverzeichnis IST der
# Dokumentenstamm – genau wie frueher beim Shared Hosting. Was nicht
# ausgeliefert werden darf, haelt .dockerignore aus dem Abbild heraus, den
# Rest sperrt die .htaccess (includes/, config.php).
#
# Gebaut wird auf dem VPS (deploy/deploy.sh), so wie bei den Nachbarprojekten.
FROM php:8.4-apache

# opcache reicht. curl und json bringt das Grundabbild mit – api/submit.php
# braucht curl fuer die Weitergabe an n8n.
RUN docker-php-ext-install -j"$(nproc)" opcache

# rewrite/headers/expires/deflate: alles, was die .htaccess benutzt. Fehlt eins,
# greifen die IfModule-Bloecke stillschweigend nicht (Caching, Kompression).
# remoteip: siehe deploy/apache-lerndex.conf.
RUN a2enmod rewrite headers expires deflate remoteip

COPY deploy/php.ini /usr/local/etc/php/conf.d/lerndex.ini
# zz-: wird nach Debians security.conf geladen, sonst setzt die ServerTokens zurueck.
COPY deploy/apache-lerndex.conf /etc/apache2/conf-available/zz-lerndex.conf
COPY deploy/apache-prefork.conf /etc/apache2/mods-available/mpm_prefork.conf
RUN a2enconf zz-lerndex

# Keine Zugriffsprotokolle. Die Datenschutzerklaerung (Abschnitt 6a) sagt zu,
# dass einzelne Seitenaufrufe nicht gespeichert werden – Traefik schreibt
# ebenfalls keine. Fehlermeldungen gehen weiter nach stderr (docker logs).
RUN sed -ri '/CustomLog/d' /etc/apache2/sites-available/000-default.conf \
    && a2disconf other-vhosts-access-log

WORKDIR /var/www/html
COPY --chown=www-data:www-data . .

# Die Konfigurationsdateien oben kamen mit COPY . . auch in den Webroot –
# dort haben sie nichts verloren.
RUN rm -rf deploy

CMD ["apache2-foreground"]
