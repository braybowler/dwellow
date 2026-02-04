## Run Locally

1) Install dependencies using: `composer install`

2) Create a .env file with: `cp .env.example .env`

3) Generate an app key with: `php artisan key:generate`

4) Populate .env vars:

```
DB_USERNAME=
DB_PASSWORD=
```

5) Start development containers with: `sail up -d`

6) Run `sail artisan migrate:fresh` to seed the database

7) run `sail artisan optimize:clear` to clear cached bootstrap files

