docker compose up


in backend container insert these commands

copy .env.example .env

CLIENT_WEB_ID=
CLIENT_WEB_SECRET=

CLIENT_MOBILE_ID=
CLIENT_MOBILE_SECRET=


NEWSAPI_API_KEY=
THEGUARDIAN_API_KEY=
NYTIMES_API_KEY=


php artisan passport:client --password

php artisan passport:client --password

copy these values and enter in .env
enter api keys
Add the domain to the Hosts file: /etc/hosts
127.0.0.1  apiato.test
127.0.0.1  api.apiato.test
127.0.0.1  admin.apiato.test

php artisan config:clear


echo "Migrating the database..."
php artisan migrate --seed

