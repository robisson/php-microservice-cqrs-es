FROM debian

RUN apt-get update \
    && apt-get -y install \
    lsb-release \
    apt-transport-https \
    ca-certificates \
    vim \
    wget \
    curl \
    && wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg \
    && echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php7.3.list \
    && apt-get update \
    && apt-get -y install php7.3 \
    php7.3-cli \
    php7.3-fpm \
    php7.3-json \
    php7.3-pdo \
    php7.3-mysql \
    php7.3-zip \php7.3-gd  \
    php7.3-mbstring \
    php7.3-curl \
    php7.3-xml \
    php7.3-bcmath \
    php7.3-json \
    php-xdebug \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

expose 80 443

