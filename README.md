# Municipalities in Nitra region

## Requirements
- PHP >= 8.2
- Composer
- npm
- MySQL

## Installation

### 1. Clone the repository
```bash
git clone git@github.com:Matte478/municipalities-in-nitra-region.git
```

### 2. Install composer dependencies
```bash
cd municipalities-in-nitra-region
composer install
```

### 3. Set up `.env` file
```bash
cp .env.example .env
php artisan key:generate
```
Open the `.env` file and fill in the variables:
- URL of the APP
- database connection
- queue connection to `database`
- `GOOGLE_GEOCODE_API_KEY` - API key of a Google APP that has the Geocoding API enabled

### 4. Create a database structure
```bash
php artisan migrate
```

### 5. Create a symbolic link from source directory `storage/app/public` to target directory `public/storage`
```bash
php artisan storage:link
```

### 6. Start a queue worker
Local development:
```bash
php artisan queue:work
```

Production: You can use [Supervisor](https://laravel.com/docs/11.x/queues#supervisor-configuration)

### 7. Install npm dependencies and build front-end assets

```
npm install
npm run build
```

## Import data
### 1. Import cities and municipalities located in Nitra
```bash
php artisan data:import
```

### 2. Geolocate all cities based on their address
After successfully importing the data from the previous step and completing the processing in the queue, run this command:
```bash
php artisan data:geocode
```

## Usage

After a successful installation, you will see a simple homepage that contains the input field for searching for a city / municipality in the Nitra region. The search includes an autocomplete function, which is activated after entering at least three characters. After selecting the city from the suggested options, you will be redirected to the page of that city, which contains basic information about the city and its geographic coordinates.
