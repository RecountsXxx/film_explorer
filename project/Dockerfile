FROM php:8.2-fpm

RUN apt update && apt install -y unzip mc

RUN apt-get install -y supervisor

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get install -y libmagickwand-dev

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html

COPY src /var/www/html
RUN composer install

RUN php /var/www/html/artisan vendor:publish --provider="PHPOpenSourceSaver\JWTAuth\Providers\LaravelServiceProvider"

COPY supervisor.conf /etc/supervisor/conf.d/supervisord.conf
EXPOSE 8000

CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
