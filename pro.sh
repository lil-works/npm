php bin/console generate:doctrine:entities AppBundle
php bin/console doctrine:schema:update --force
php bin/console assets:install --symlink
php bin/console assetic:dump


