## Fee calculator API
It's a simple fees calculator using laravel 11 API

# How to use?
    We have a basic api route api/feePercentages you will pass 3 attributes 
        - fee_preset_id
        - service_id
        - threshold_id
    
    Also we have all CRUD operations for 
       - FeePresets
       - Services
       - Thresholds


# Install The Environment
- git clone https://github.com/ScaleAcc/Backend.git
- composer install --ignore-platform-reqs
- cp .env.example .env
- php artisan key:generate
- create your DB and name it in .env
- php artisan migrate
- php artisan db:seed
