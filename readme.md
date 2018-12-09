                
                                              Description
After you clone this project, do the following:

```bash                      
# go into the project
cd client

# create a .env file
cp .env.example .env

# install composer dependencies
composer update

# generate a key for your application
php artisan key:generate

# run migration and seeds 
php artisan migrate 
php artisan db:seed 

#generate jwt secret 
pphp artisan jwt:secret

# install npm dependencies
npm install
npm install --save validate.js vue-resource vue-router vuex
 
# run webpack and watch for changes
npm run watch
```


