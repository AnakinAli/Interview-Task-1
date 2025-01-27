# Project Setup and Development Guide

This document provides instructions for setting up, developing, and deploying the project. Follow these steps to ensure smooth configuration and execution.

---

## Admin User Command

### Description:

The command `php artisan admin:create` allows you to create an admin user with default or custom data.

### Usage:

- **Default Data**:

    ```bash
    php artisan admin:create
    ```

    - Name: `admin`
    - Email: `admin@admin.com`
    - Password: `secret`

- **Custom Data**:  
  Replace the placeholder values (`name`, `email`, and `password`) as needed:
    ```bash
    php artisan admin:create --name=<name> --email=<email> --password=<password>
    ```
    Example:
    ```bash
    php artisan admin:create --name=admin --email=admin@admin.com --password=64
    ```

---

## Building the Frontend

### Requirements:

Ensure you have **Node.js v22.12.0** and **nvm** installed.

### Steps to Build:

1. Switch to the required Node.js version:

    ```bash
    nvm use
    ```

    If not installed, install it using:

    ```bash
    nvm install 22.12.0
    ```

    More details: [nvm installation guide](https://github.com/nvm-sh/nvm).

2. Install dependencies and build:
    ```bash
    npm ci && npm run build
    ```

---

## Alternative Build Method

If you're using a normal Node.js environment:

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

## Notes

- Ensure your environment matches the specified versions and tools to avoid compatibility issues.
- Follow the [Vagrant](https://developer.hashicorp.com/vagrant) and [Docker](https://www.docker.com/) guidelines for further assistance with setting up virtualized environments.
