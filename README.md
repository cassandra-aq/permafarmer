## Build locally
- clone repo
- create .env file (rename '.env.example' file to '.env')
- change APP_URL variable in .env doc and add your own localhost url (http://localhost/permafarmer/public if your repo name is permafarmer)
- clear cache : sudo php artisan config:cache
- run wepack : npm run watch
- go to your localhost repo url (http://localhost/permafarmer/public if your repo name is permafarmer)
