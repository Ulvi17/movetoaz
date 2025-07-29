# 🚀 Railway Deployment - Laravel Real Estate App

Your Laravel real estate application is now ready for Railway deployment! This guide will help you deploy your application with the Bagira AI integration.

## 📁 Files Created for Railway Deployment

### Configuration Files
- ✅ `railway.json` - Railway deployment configuration
- ✅ `Procfile` - Process definition for Railway
- ✅ `.dockerignore` - Files to exclude from Docker build
- ✅ `public/.htaccess` - Apache rewrite rules (already existed)

### Deployment Scripts
- ✅ `deploy-railway.sh` - Comprehensive deployment script
- ✅ `quick-deploy.sh` - One-command deployment script
- ✅ `DEPLOYMENT_CHECKLIST.md` - Step-by-step checklist
- ✅ `RAILWAY_DEPLOYMENT.md` - Detailed deployment guide

## 🚀 Quick Start (Recommended)

### Option 1: One-Command Deployment
```bash
# Make the script executable
chmod +x quick-deploy.sh

# Run the deployment
./quick-deploy.sh
```

### Option 2: Step-by-Step Deployment
```bash
# 1. Install Railway CLI
npm install -g @railway/cli

# 2. Login to Railway
railway login

# 3. Initialize project
railway init

# 4. Link to project
railway link

# 5. Add MySQL database
railway add

# 6. Build assets
npm run build

# 7. Deploy
railway up --detach

# 8. Run migrations
railway run php artisan migrate --force

# 9. Clear and cache
railway run php artisan config:clear
railway run php artisan config:cache
```

## ⚙️ Environment Variables

After deployment, set these environment variables:

```bash
# Production settings
railway variables set APP_ENV=production
railway variables set APP_DEBUG=false
railway variables set LOG_LEVEL=error

# App settings (replace with your actual Railway URL)
railway variables set APP_URL=https://your-app-name.railway.app
railway variables set APP_DOMAIN=your-app-name.railway.app

# Session and cache
railway variables set SESSION_DRIVER=database
railway variables set CACHE_STORE=database
railway variables set QUEUE_CONNECTION=database
railway variables set FILESYSTEM_DISK=local
```

## 🔧 Post-Deployment Configuration

### 1. Update Bagira AI Domain

After deployment, update the domain condition in these files:
- `resources/views/frontend/layouts/app.blade.php`
- `resources/views/frontend/layouts/headerscripts.blade.php`
- `resources/views/frontend/layouts/footerscripts.blade.php`

Change from:
```php
@if ($setting && $setting->domain == env('APP_DOMAIN'))
```

To your actual Railway domain:
```php
@if ($setting && $setting->domain == 'your-app-name.railway.app')
```

### 2. Import Database Data

If you need to import your existing database:

```bash
# Export your local database
mysqldump -u root realestate > database_backup.sql

# Import to Railway (you'll need to get the connection details)
railway run mysql -u $DB_USERNAME -p$DB_PASSWORD $DB_DATABASE < database_backup.sql
```

## 📊 Monitoring and Management

### Check Application Status
```bash
railway status
```

### View Logs
```bash
railway logs
```

### Access Application Shell
```bash
railway shell
```

### Open Application
```bash
railway open
```

## 🔍 Troubleshooting

### Common Issues and Solutions

#### 1. Database Connection Error
```bash
railway run php artisan migrate:status
railway run php artisan migrate --force
```

#### 2. Asset Loading Issues
```bash
railway run npm run build
```

#### 3. Cache Issues
```bash
railway run php artisan config:clear
railway run php artisan cache:clear
railway run php artisan view:clear
```

#### 4. Permission Issues
```bash
railway run php artisan storage:link
```

#### 5. Bagira AI Not Working
- Check if the domain condition is updated
- Verify the Railway URL is correct
- Check browser console for JavaScript errors

## 🌐 Domain and SSL

- **Railway URL**: Automatically provided (e.g., `https://your-app-name.railway.app`)
- **SSL Certificate**: Automatically provided by Railway
- **Custom Domain**: Can be added through Railway dashboard

## 🔒 Security Features

- ✅ Environment variables for sensitive data
- ✅ Automatic SSL certificates
- ✅ Database credentials managed by Railway
- ✅ No sensitive data in code
- ✅ Production-ready configuration

## 📈 Scaling

Railway automatically scales your application based on traffic. You can also manually scale:

```bash
railway scale web=2
```

## 🎯 Success Criteria

Your deployment is successful when:
- ✅ Website loads at Railway URL
- ✅ All pages are accessible
- ✅ Database connection works
- ✅ Bagira AI button appears and functions
- ✅ No errors in logs
- ✅ SSL certificate is active
- ✅ Performance is acceptable

## 📞 Support

- **Railway Documentation**: [docs.railway.app](https://docs.railway.app)
- **Railway Discord**: [discord.gg/railway](https://discord.gg/railway)
- **Laravel Documentation**: [laravel.com/docs](https://laravel.com/docs)

## 🎉 What's Included

Your Railway deployment includes:
- ✅ Laravel 11.9 application
- ✅ MySQL database
- ✅ Bagira AI voice assistant integration
- ✅ Real estate website functionality
- ✅ Multi-language support
- ✅ Admin panel
- ✅ File upload system
- ✅ Email functionality
- ✅ SSL certificates
- ✅ Automatic scaling

---

**Ready to deploy your real estate application with Bagira AI to Railway! 🚀** 