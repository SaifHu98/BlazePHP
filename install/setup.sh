#!/bin/bash
echo "Setting up BlazePHP Environment..."

# Composer install
if [ -f composer.json ]; then
  echo "Installing PHP dependencies..."
  composer install
fi

# Create environment file
cp config/env.example.php config/env.php

# Permissions
mkdir -p storage/logs
mkdir -p storage/queue
chmod -R 775 storage

echo "Setup complete. Run with: php -S localhost:8000 -t public" 