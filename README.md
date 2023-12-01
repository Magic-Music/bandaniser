# Bandaniser
## An organiser for band members

### Track member availability, gig status and details


### Install Bandaniser on your local machine

#### Prerequisites
- PHP 8.1 or above
- Composer
- Node

#### Get the code
- Clone the repository
- Checkout git develop branch if required 

#### Install dependencies
- Run composer install
- Run npm install

#### Prepare the database
- Create mysql database for Bandaniser
- Duplicate .env.development or .env.production to .env
- Add database credentials to .env
- Run php artisan migrate

#### Finishing up
- Run php artisan key:generate
- Run php artisan ide-helper:models

#### To run Bandaniser on your local machine
- In a terminal type `./run`
- In your browser, open http://127.0.0.1:8000
- To shut down, hit ctrl-c. 
