#!/bin/bash

echo "🚀 Starting Railway Deployment for Laravel Application"

# Check if Railway CLI is installed
if ! command -v railway &> /dev/null; then
    echo "❌ Railway CLI not found. Installing..."
    npm install -g @railway/cli
fi

# Login to Railway (if not already logged in)
echo "🔐 Logging into Railway..."
railway login

# Initialize Railway project (if not already initialized)
if [ ! -f ".railway" ]; then
    echo "📁 Initializing Railway project..."
    railway init
fi

# Link to Railway project
echo "🔗 Linking to Railway project..."
railway link

# Add MySQL database if not exists
echo "🗄️ Adding MySQL database..."
railway add

# Set environment variables
echo "⚙️ Setting environment variables..."
railway variables set APP_ENV=production
railway variables set APP_DEBUG=false
railway variables set LOG_LEVEL=error
railway variables set SESSION_DRIVER=database
railway variables set CACHE_STORE=database
railway variables set QUEUE_CONNECTION=database
railway variables set FILESYSTEM_DISK=local

# Build frontend assets
echo "🔨 Building frontend assets..."
npm run build

# Deploy to Railway
echo "🚀 Deploying to Railway..."
railway up --detach

# Wait for deployment to complete
echo "⏳ Waiting for deployment to complete..."
sleep 30

# Run database migrations
echo "🗄️ Running database migrations..."
railway run php artisan migrate --force

# Clear and cache config
echo "🧹 Clearing and caching configuration..."
railway run php artisan config:clear
railway run php artisan config:cache
railway run php artisan route:clear
railway run php artisan route:cache
railway run php artisan view:clear
railway run php artisan view:cache

echo "✅ Deployment completed!"
echo "🌐 Your application should be available at the Railway URL"
echo "📊 Check deployment status with: railway status"
echo "📝 View logs with: railway logs" 