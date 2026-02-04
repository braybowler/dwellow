## Run Locally

1) Install PHP and Laravel dependencies using: `composer install`
2) Install JS dependencies using: `npm install`
3) Run: `npm run build` once

4) Create a .env file with: `cp .env.example .env`

5) Generate an app key with: `php artisan key:generate`

6) Populate .env vars:

```
DB_USERNAME=
DB_PASSWORD=
```

7) Start development containers with: `sail up -d`

8) Run `sail artisan migrate:fresh` to seed the database

9) run `sail artisan optimize:clear` to clear cached bootstrap files

