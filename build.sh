#!/usr/bin/env bash
set -e

echo "🚀 Starting build..."

# Install PHP dependencies
echo "📦 Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

# Install Node dependencies  
echo "📦 Installing Node dependencies..."
npm ci

# Build assets
echo "🎨 Building assets..."
npm run build

# Create storage directories
echo "📁 Creating storage directories..."
mkdir -p storage/framework/{sessions,views,cache}
mkdir -p storage/logs
chmod -R 775 storage bootstrap/cache

# Cache config
echo "⚡ Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations
echo "🗄️  Running migrations..."
php artisan migrate --force --seed

echo "✅ Build complete!"



