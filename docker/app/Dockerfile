# どんなdockerイメージを利用して構築をするか
FROM php:7.4-apache

# 設定ファイルをdockerコンテナ内のPHP、Apacheに読み込ませる
ADD php.ini /usr/local/etc/php/
Add htpasswd /etc/apache2/htpasswd
ADD 000-default.conf /etc/apache2/sites-available/
RUN rm /etc/apache2/sites-enabled/000-default.conf && ln -s /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-enabled/000-default.conf

# Composerのインストール
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

# ミドルウェアインストール
RUN apt-get update \
&& apt-get install -y \
git \
zip \
ssh \
unzip \
vim \
systemctl \
libpng-dev \
libpq-dev \
&& docker-php-ext-install pdo_mysql mysqli

# Laravelで必要になるmodRewriteを有効化する
RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite

RUN mkdir /root/.ssh
ADD ssh/authorized_keys /root/.ssh/
ADD ssh/sshd_config /etc/ssh/
RUN mkdir /run/sshd
RUN echo /usr/sbin/sshd > /etc/rc.local