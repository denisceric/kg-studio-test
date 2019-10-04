Laravel 6.0 application

Run:

    git clone https://github.com/denisceric/kg-studio-test.git
    cd kg-studio-test
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    php artisan db:seed
    php artisan serve
    php artisan queue:listen
    
To test the scheduler run:

    php artisan scheduler:run

Admin credentials:
    email: admin@example.com
    password: 12345678
