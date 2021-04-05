# BearCosmetics

## Prerequisites
- php7.3fpm
- linux

## Installation
Using docker:
- Clone this project
- Setup local domain: 
`sudo -- sh -c "echo '127.0.0.1 local.domain.com' >> /etc/hosts"`
- Build images using docker-compose:
`docker-compose up  -build`
- Open container bash:
`docker-compose exec -u root php bash`
- In bash terminal:
* Set permissions:
```
cd /var/www/html/magento
find var generated vendor pub/static pub/media app/etc -type f -exec chmod g+w {} +
find var generated vendor pub/static pub/media app/etc -type d -exec chmod g+ws {} +
chown -R :www-data . 
chmod u+x bin/magento
```
* Install magento:
```
php bin/magento setup:install \
    --base-url=http://local.domain.com \
    --db-host=mysql \
    --db-name=magento \
    --db-user=root \
    --db-password=root \
    --backend-frontname=admin \
    --admin-firstname=admin \
    --admin-lastname=admin \
    --admin-email=admin@example.com \
    --admin-user=admin \
    --admin-password=admin123 \
    --language=en_US \
    --timezone=Asia/Ho_Chi_Minh \
    --use-rewrites=1
```
