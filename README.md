## 1. Setup project
- Install PHP >= 7.1.3
  Require some extension
    * OpenSSL PHP Extension
    * PDO PHP Extension
    * Mbstring PHP Extension
    * Tokenizer PHP Extension
    * XML PHP Extension
    * Ctype PHP Extension
    * JSON PHP Extension
    * BCMath PHP Extension

- Install composer: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos

- Install Mysql

- Create a new empty database

- Unzip source code
 ```bash
 unzip new-feed-develop.zip
 ```

- Goto folder root source code

- Run command: 
```bash
composer install
```
- Create new .env file from .env.example
```bash
cp .env.example .env
```

- Use any editor to edit .env file (ex: vim editor)
Change below parameters to config database (note: db name is new database which created above step)
```bash
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

- Generate APP KEY: 
```bash
php artisan key:generate
```

- Clear cache config: 
```bash
php artisan config:cache
```

- Migrate database and seed example data: 
```bash
php artisan migrate --seed
```

Build success!

## 2. View CLI Mode
Use commands:
- Show list feed: `php artisan feed:list`

- Read feed by id: `php artisan feed:read [id]`

- Example: `php artisan feed:read 4`

- Read feed by url: `php artisan feed:read-url [url]`

Example: `php artisan feed:read-url https://vnexpress.net/rss/giai-tri.rss`
(note url must be existing in database)

- Add new feed in to database: `php artisan feed:create [title] [url]`

Example: `php artisan feed:create "Thoi su" https://vnexpress.net/rss/giai-tri.rss`

- Remove a feed from database: `php artisan feed:remove [id]`

Example: `php artisan feed:remove 6`


## 3. View Web browse Mode

Use command to start: `php artisan serve --port [PORT]`

Example: `php artisan serve --port 5555`

And then open Chrome via link http://127.0.0.1:5555

Login via user: thanhpd.test@localhost.com/secret

List feed: http://127.0.0.1:5555/feeds. From this screen, we can create new feed, view feed item, and delete feed
