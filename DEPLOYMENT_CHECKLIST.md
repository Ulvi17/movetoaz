# ✅ Railway Deployment Checklist

## 📋 Pre-Deployment Checklist

### ✅ Project Setup
- [x] Laravel application is working locally
- [x] Database migrations are ready
- [x] Frontend assets are built (`npm run build`)
- [x] All environment variables are configured
- [x] Bagira AI integration is working

### ✅ Railway Configuration Files
- [x] `railway.json` - Railway deployment configuration
- [x] `Procfile` - Process definition for Railway
- [x] `.dockerignore` - Files to exclude from Docker build
- [x] `deploy-railway.sh` - Automated deployment script
- [x] `public/.htaccess` - Apache rewrite rules

### ✅ Environment Variables to Set
```bash
# Production settings
railway variables set APP_ENV=production
railway variables set APP_DEBUG=false
railway variables set LOG_LEVEL=error

# Database settings (auto-set by Railway)
# DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD

# Session and cache
railway variables set SESSION_DRIVER=database
railway variables set CACHE_STORE=database
railway variables set QUEUE_CONNECTION=database
railway variables set FILESYSTEM_DISK=local

# App settings
railway variables set APP_URL=https://your-railway-app.railway.app
railway variables set APP_DOMAIN=your-railway-app.railway.app
```

## 🚀 Deployment Steps

### Step 1: Install Railway CLI
```bash
npm install -g @railway/cli
```

### Step 2: Login and Initialize
```bash
railway login
railway init
railway link
```

### Step 3: Add Database
```bash
railway add
# Select "MySQL" from the options
```

### Step 4: Set Environment Variables
```bash
# Run the commands from the checklist above
```

### Step 5: Build and Deploy
```bash
npm run build
railway up --detach
```

### Step 6: Run Migrations
```bash
railway run php artisan migrate --force
```

### Step 7: Clear and Cache
```bash
railway run php artisan config:clear
railway run php artisan config:cache
railway run php artisan route:clear
railway run php artisan route:cache
railway run php artisan view:clear
railway run php artisan view:cache
```

## 🔍 Post-Deployment Verification

### ✅ Check Application
- [ ] Website loads without errors
- [ ] All pages are accessible
- [ ] Images and assets load correctly
- [ ] Database connection works
- [ ] Bagira AI button appears and works
- [ ] Forms submit correctly

### ✅ Check Logs
```bash
railway logs
```

### ✅ Check Status
```bash
railway status
```

## 🛠️ Troubleshooting Commands

### Database Issues
```bash
railway run php artisan migrate:status
railway run php artisan migrate --force
```

### Cache Issues
```bash
railway run php artisan config:clear
railway run php artisan cache:clear
railway run php artisan view:clear
```

### Asset Issues
```bash
railway run npm run build
```

### Permission Issues
```bash
railway run php artisan storage:link
```

## 🌐 Domain Configuration

### Update Bagira AI Domain
After deployment, update the domain condition in:
- `resources/views/frontend/layouts/app.blade.php`
- `resources/views/frontend/layouts/headerscripts.blade.php`
- `resources/views/frontend/layouts/footerscripts.blade.php`

Change from:
```php
@if ($setting && $setting->domain == env('APP_DOMAIN'))
```

To your actual Railway domain:
```php
@if ($setting && $setting->domain == 'your-railway-app.railway.app')
```

## 📊 Monitoring

### Check Application Health
```bash
railway status
```

### View Real-time Logs
```bash
railway logs --follow
```

### Access Application Shell
```bash
railway shell
```

## 🔒 Security Checklist

- [ ] APP_DEBUG=false
- [ ] LOG_LEVEL=error
- [ ] No sensitive data in code
- [ ] Environment variables set
- [ ] SSL certificate active
- [ ] Database credentials secure

## 🎯 Success Criteria

✅ **Deployment Successful When:**
- Website loads at Railway URL
- All pages accessible
- Database working
- Bagira AI functional
- No errors in logs
- SSL certificate active
- Performance acceptable

---

**Ready to Deploy! 🚀** 