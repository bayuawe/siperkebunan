# Plantation Management System - With CRUD Generator

A web-based plantation management system built with CodeIgniter 4, designed to track and manage tree inventory and production data.

## Features

- Authentication & Authorization
- User Management
- Menu Management with auto-create controller and view file
- Tree Inventory Management
- Production Tracking
- Dashboard with Statistical Overview
- Responsive Design

## Server Requirements

- PHP version 8.0 or higher
- Required PHP Extensions:
  - [intl](http://php.net/manual/en/intl.requirements.php)
  - [libcurl](http://php.net/manual/en/curl.requirements.php) (if using HTTP\CURLRequest)
  - [mbstring](http://php.net/manual/en/mbstring.installation.php)
  - [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
  - json (enabled by default)
  - xml (enabled by default)

## Installation

1. Clone the repository:

```bash
git clone <repository-url>
cd <project-directory>
```

2. Install dependencies:
```bash
composer update
```

3. Set up the environment:
- Copy `env` to `.env` and configure your:
  - Base URL
  - Database settings
  - Other environment-specific settings

4. Initialize the database:
```bash
php spark db:create        # Create database schema
php spark migrate         # Run database migrations
php spark db:seed users   # Seed default users
php spark key:generate    # Generate encryption key
```

5. Start the development server:
```bash
php spark serve
```

## Database Structure

The system uses two main tables:

1. `tree` - Stores tree inventory data:
   - ID Pohon (Tree ID)
   - Tahun Tanam (Planting Year)
   - Jenis Bibit (Seedling Type)

2. `production` - Tracks production data:
   - ID Produksi (Production ID)
   - Tanggal Panen (Harvest Date)
   - Various production metrics (fruit count, mature fruit, flower counts, etc.)

## Testing

The project includes a testing setup using PHPUnit. To run tests:

```bash
composer test
```

For detailed testing information, see [tests/README.md](tests/README.md).

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- Built with [CodeIgniter 4](https://codeigniter.com/)
- Uses [Bootstrap](https://getbootstrap.com/) for UI components
- Icons by [Font Awesome](https://fontawesome.com/)
