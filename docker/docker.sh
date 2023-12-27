php bin/console doctrine:migrations:diff
php bin/console d:m:m --no-interaction
php bin/console app:create-admin user@mail.com user password
exec apache2-foreground