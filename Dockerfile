FROM php:8.1-apache

# Upgrade & Install system dependencies
RUN apt-get update -y && apt-get install -y \
    #ca-certificates \
    # PDF tool kit needed to operate on documents
    pdftk \
    libxml2 libxml2-dev \
    # Locales
    locales \
    # for debugging
    nano \  
    # docker-php-extensions
    && docker-php-ext-install \
    xml \
    && a2enmod rewrite actions

# Install locales so PDFtk covers more cases
# RUN echo 'de_CH.UTF-8 UTF-8' >> /etc/locale.gen && \
#     echo 'de_DE.UTF-8 UTF-8' >> /etc/locale.gen && \
#     echo 'en_US.UTF-8 UTF-8' >> /etc/locale.gen && \
#     echo 'en_GB.UTF-8 UTF-8' >> /etc/locale.gen && \
#     echo 'es_ES.UTF-8 UTF-8' >> /etc/locale.gen && \
#     echo 'fr_FR.UTF-8 UTF-8' >> /etc/locale.gen && \
#     echo 'ru_RU.UTF-8 UTF-8' >> /etc/locale.gen && \
#     echo 'tr_TR.UTF-8 UTF-8' >> /etc/locale.gen && \
#     locale-gen

# Copy vhosts config
COPY config/vhosts/pdftk-web-service /etc/apache2/sites-enabled

# Copy application directory to apache directory
COPY app/ /var/www/html/

# Listen on port 80/TCP
EXPOSE 80

# Start apache webserver
CMD ["apachectl", "-D", "FOREGROUND"]