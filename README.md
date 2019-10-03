#kg-studio-test

https://github.com/denisceric/kg-studio-test.git

Run:

    git clone https://github.com/denisceric/kg-studio-test.git
    cd kg-studio-test
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    php artisan serve
    
To test the scheduler run:

    php artisan scheduler:run
