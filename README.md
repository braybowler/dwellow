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

10) run `sail artisan shield:setup` with the following answers:
    11) Yes
    12) No
    13) Yes
    14) super-admin
    15) Yes
    16) Yes
    17) Policies & Permissions
    18) Yes
    19) Input the user ID for 'Admin User'

