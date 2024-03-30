FROM nginx:latest

COPY ./conf/nginx/hosts/nginx.local.conf /etc/nginx/conf.d/nginx.local.conf

WORKDIR /var/www/html

VOLUME /var/www/html

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]