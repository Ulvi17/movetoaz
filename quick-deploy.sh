#!/bin/bash

echo "🚀 Quick Railway Deployment for Laravel Real Estate App"
echo "======================================================"

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Function to print colored output
print_status() {
    echo -e "${BLUE}[INFO]${NC} $1"
}

print_success() {
    echo -e "${GREEN}[SUCCESS]${NC} $1"
}

print_warning() {
    echo -e "${YELLOW}[WARNING]${NC} $1"
}

print_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

# Check if Railway CLI is installed
if ! command -v railway &> /dev/null; then
    print_status "Installing Railway CLI..."
    npm install -g @railway/cli
    if [ $? -ne 0 ]; then
        print_error "Failed to install Railway CLI"
        exit 1
    fi
    print_success "Railway CLI installed"
fi

# Check if logged in
print_status "Checking Railway login status..."
if ! railway whoami &> /dev/null; then
    print_status "Please login to Railway..."
    railway login
    if [ $? -ne 0 ]; then
        print_error "Failed to login to Railway"
        exit 1
    fi
fi

# Initialize Railway project if not already done
if [ ! -f ".railway" ]; then
    print_status "Initializing Railway project..."
    railway init
    if [ $? -ne 0 ]; then
        print_error "Failed to initialize Railway project"
        exit 1
    fi
fi

# Link to Railway project
print_status "Linking to Railway project..."
railway link
if [ $? -ne 0 ]; then
    print_error "Failed to link to Railway project"
    exit 1
fi

# Build frontend assets
print_status "Building frontend assets..."
npm run build
if [ $? -ne 0 ]; then
    print_error "Failed to build frontend assets"
    exit 1
fi
print_success "Frontend assets built"

# Deploy to Railway
print_status "Deploying to Railway..."
railway up --detach
if [ $? -ne 0 ]; then
    print_error "Failed to deploy to Railway"
    exit 1
fi
print_success "Deployed to Railway"

# Wait for deployment to complete
print_status "Waiting for deployment to complete..."
sleep 30

# Run database migrations
print_status "Running database migrations..."
railway run php artisan migrate --force
if [ $? -ne 0 ]; then
    print_warning "Database migrations failed - this might be normal if migrations are already up to date"
else
    print_success "Database migrations completed"
fi

# Clear and cache configuration
print_status "Clearing and caching configuration..."
railway run php artisan config:clear
railway run php artisan config:cache
railway run php artisan route:clear
railway run php artisan route:cache
railway run php artisan view:clear
railway run php artisan view:cache
print_success "Configuration cached"

# Get the Railway URL
print_status "Getting Railway URL..."
RAILWAY_URL=$(railway status --json | grep -o '"url":"[^"]*"' | cut -d'"' -f4)
if [ -n "$RAILWAY_URL" ]; then
    print_success "Your application is deployed at: $RAILWAY_URL"
else
    print_warning "Could not get Railway URL. Check with: railway status"
fi

echo ""
echo "🎉 Deployment completed!"
echo "📊 Check status: railway status"
echo "📝 View logs: railway logs"
echo "🌐 Open app: railway open"
echo ""
echo "⚠️  Don't forget to:"
echo "   1. Update APP_URL and APP_DOMAIN environment variables"
echo "   2. Update Bagira AI domain conditions in layout files"
echo "   3. Test the application thoroughly" 