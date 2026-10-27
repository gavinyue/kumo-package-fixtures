FROM wordpress@sha256:81a34254acaa6ff3b9a67268c2745e9a041c4094cbe5ccd35b75ed3bbdc033b5
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf && sed -i 's/:80>/:8080>/' /etc/apache2/sites-available/000-default.conf
COPY --chown=www-data:www-data . /var/www/html/
COPY --chown=www-data:www-data extensions/ /var/www/html/wp-content/mu-plugins/
# Platform-maintained (protected) plugins, copied last so an extension cannot replace them.
COPY --chown=www-data:www-data _kumo/mu-plugins/ /var/www/html/wp-content/mu-plugins/
EXPOSE 8080
