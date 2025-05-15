# Laravel Training Project

This project was originally created as part of my On-the-Job Training (OJT) at Snapp Ventures Inc. I've enhanced and improved upon the original training activity to create a more comprehensive web application. chouss

## About the Project

This is a Laravel-based web application project built with modern web development practices. While it started as a training exercise, it has been expanded to include additional features and improvements beyond the original scope.

## Requirements

- PHP >= 8.2
- Composer
- Node.js & NPM
- SQLite (or your preferred database)
- XAMPP (or similar local server stack like WAMP, MAMP)
  - Apache
  - MySQL (if not using SQLite)
  - PHP

## Installation

1. Clone the repository:
```bash
git clone https://github.com/naksusen/Training.git
cd Training
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install NPM dependencies:
```bash
npm install
```

4. Create environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Create database:
```bash
touch database/database.sqlite
```

7. Run migrations:
```bash
php artisan migrate
```

8. Start the development server:
```bash
# Option 1: Using Laravel's built-in server
php artisan serve

# Option 2: Using XAMPP
# 1. Start XAMPP Control Panel
# 2. Start Apache and MySQL services
# 3. Place the project in htdocs folder (optional)
# 4. Access via http://localhost/Training/public
```

9. In a separate terminal, start Vite development server:
```bash
npm run dev
```

## Development

- The application uses Laravel 11.x with Vite for asset bundling
- Frontend assets are located in `resources/` directory
- Backend routes are defined in `routes/` directory
- Database migrations are in `database/migrations/`
- Models are located in `app/Models/`
- Controllers are in `app/Http/Controllers/`

## Testing

Run the test suite using:

```bash
php artisan test
```

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request
