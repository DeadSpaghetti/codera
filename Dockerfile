FROM debian:stable
RUN apt-get -y update && apt-get -y upgrade && apt-get -y dist-upgrade
RUN apt-get -y install apache2 php7.0
ADD . /var/www/html/
EXPOSE 8080
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

