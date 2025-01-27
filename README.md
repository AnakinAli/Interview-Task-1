# Project Setup and Development Guide

This document provides instructions for setting up the project. Follow these steps to ensure smooth configuration and execution.

---

## Admin User Command

### Description:

The command `php artisan admin:create` allows you to create an admin user with default or custom data.

### Usage:

- **Default Data**:

    ```bash
    php artisan admin:create
    ```

    The default user will be created with the following data:

    - Name: `admin`
    - Email: `admin@admin.com`
    - Password: `secret`

- **Custom Data**:  
  You can provide custom values for the name, email, and password using the following syntax:

    ```bash
    php artisan admin:create --name=<name> --email=<email> --password=<password>
    ```

    Example:

    ```bash
    php artisan admin:create --name=admin --email=admin@admin.com --password=secret
    ```

---

## Building the Frontend

### Requirements:

Ensure you have **Node.js v22.12.0** or **nvm** installed.

### Steps to Build:

1. **Switch to the required Node.js version**:

    If you have `nvm` installed, use the following command to switch to the correct version:

    ```bash
    nvm use
    ```

    If `nvm` is not installed, install it using:

    ```bash
    nvm install 22.12.0
    ```

    For further details, visit the [nvm installation guide](https://github.com/nvm-sh/nvm).

2. **Install dependencies and build**:

    To install the required dependencies and build the project, run:

    ```bash
    npm ci && npm run build
    ```

---

## Alternative Build Method

If you're using a standard Node.js environment without `nvm`, run the following commands:

```bash
npm ci && npm run build
```

---

## Development Environment

### Locally Developed Using:

- **Vagrant Image**:  
  [Apps for Skywalker Vagrant Base](https://portal.cloud.hashicorp.com/vagrant/discover/appsforskywalker/base)

### Docker Image for GitHub Actions:

- **Docker Image**:  
  [PHP 8.3 Mongo Base](https://hub.docker.com/repository/docker/appsforskywalker/php-8.3-mongo-base/general)

---

## Additional Notes

- Ensure your environment matches the specified versions and tools to avoid compatibility issues.
- To load the database with initial data, run:

    ```bash
    php artisan db:seed
    ```

- There are tests written in [Pest](https://pestphp.com/) to validate the application's logic.
- In the `.env.example` file, the `BOX_INITIAL_COUNT` is preset to `9`.

---

## Tools and Versions:

- **Node.js**: v22.12.0
- **TailwindCSS**: v4.0
- **PHP**: 8.3 with MongoDB support
- **Vagrant** and **Docker**: For environment setup
