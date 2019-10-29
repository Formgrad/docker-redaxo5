#!/bin/bash
set -eo pipefail

MYSQL_CMD="mysql -u root -p$DB_ENV_MYSQL_ROOT_PASSWORD -h db"
MYSQL_DB="$MYSQL_CMD $DB_ENV_MYSQL_DATABASE"
DB_DUMP="/src/etc/initdb.sql"

mkdir -p /var/www/html/redaxo/data/core/
php /src/etc/config.yml.php > /var/www/html/redaxo/data/core/config.yml

echo -n "Waiting for mysql..."
while ! $MYSQL_CMD -e ";" ; do
    sleep .5
done
echo "connected."
echo

if [[ -z $($MYSQL_DB -e "SHOW TABLES;") ]]; then
    echo 'REDAXO Database not installed, installing'
    $MYSQL_DB < $DB_DUMP
else
    echo 'REDAXO Database already installed'
fi
