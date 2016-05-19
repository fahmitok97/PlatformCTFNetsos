# PlatformCTFNetsos

```
┏━╸┏━┓┏━┓╺┳╸┏┓╻╻┏━╸╻ ╻╺┳╸┏━╸╺┳╸┏━╸
┣╸ ┃ ┃┣┳┛ ┃ ┃┗┫┃┃╺┓┣━┫ ┃ ┃   ┃ ┣╸ 
╹  ┗━┛╹┗╸ ╹ ╹ ╹╹┗━┛╹ ╹ ╹ ┗━╸ ╹ ╹  
```

A Platform for Jeopardy-style Capture the Flag contests.

## Features
- Persistent contests
- Top scoreboard
- Admin page

## Installation
```bash
# install dependencies
composer install
# copy and edit .env
cp .env.example .env
# add database
mysql
# generate app key
php artisan key:generate
# migration and seeder
php artisan migrate --seed
# serve
php artisan serve
```
