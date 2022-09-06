#<a href="#" target="_blank">GIGUS</a>

This is an organisational management system for gigs.

This is a single page laravel application built with vue and Inertia. To install the project, please use the steps below

1. Copy and clone this source code on your device.
2. Generate the `.env` file from `.env.example` and setup database connection
3. On your terminal, cd into the project and run 
```
composer install
npm install
php artisan key:generate
php artisan migrate --seed
npm run dev
```
4. Next, check the Seeder and your db table for user credentials to login.
5. Uncomment the update and delete methods code blocks in GigObserver to enable job queueing.
6. Set up your mail configuration
7. Run
```
php artisan queue:work
```

7. If you're not using laravel valet, run
```
php artisan serve
```

You can now begin to use the application from your localhost.
