# 🚀 Railway Deployment Guide

This guide will help you deploy your Laravel real estate application to Railway.

## 📋 Prerequisites

1. **GitHub Account** - Your code should be in a GitHub repository
2. **Railway Account** - Sign up at [railway.app](https://railway.app)
3. **Node.js** - For running the deployment script

## 🛠️ Quick Deployment

### Option 1: Automated Deployment (Recommended)

```bash
# Make the deployment script executable
chmod +x deploy-railway.sh

# Run the automated deployment
./deploy-railway.sh
```

### Option 2: Manual Deployment

Follow these steps manually:

## 📝 Step-by-Step Manual Deployment

### Step 1: Install Railway CLI

```bash
npm install -g @railway/cli
```

### Step 2: Login to Railway

```bash
railway login
```

### Step 3: Initialize Railway Project

```bash
railway init
```

### Step 4: Link to Railway Project

```bash
railway link
```

### Step 5: Add MySQL Database

```bash
railway add
# Select "MySQL" from the options
```

### Step 6: Set Environment Variables

```bash
railway variables set APP_ENV=production
railway variables set APP_DEBUG=false
railway variables set LOG_LEVEL=error
railway variables set SESSION_DRIVER=database
railway variables set CACHE_STORE=database
railway variables set QUEUE_CONNECTION=database
railway variables set FILESYSTEM_DISK=local
```

### Step 7: Build Frontend Assets

```bash
npm run build
```

### Step 8: Deploy to Railway

```bash
railway up --detach
```

### Step 9: Run Database Migrations

```bash
railway run php artisan migrate --force
```

### Step 10: Clear and Cache Configuration

```bash
railway run php artisan config:clear
railway run php artisan config:cache
railway run php artisan route:clear
railway run php artisan route:cache
railway run php artisan view:clear
railway run php artisan view:cache
```

## 🔧 Configuration Files Created

The following files have been created for Railway deployment:

- `railway.json` - Railway deployment configuration
- `Procfile` - Process definition for Railway
- `.dockerignore` - Files to exclude from Docker build
- `deploy-railway.sh` - Automated deployment script

## 🌐 Access Your Application

After deployment, your application will be available at:
- **Railway URL**: `https://your-app-name.railway.app`
- **Custom Domain**: You can add custom domains through Railway dashboard

## 📊 Monitoring and Management

### Check Deployment Status
```bash
railway status
```

### View Logs
```bash
railway logs
```

### Access Shell
```bash
railway shell
```

### Redeploy
```bash
railway up --detach
```

## 🔍 Troubleshooting

### Common Issues

1. **Database Connection Error**
   ```bash
   railway run php artisan migrate --force
   ```

2. **Asset Loading Issues**
   ```bash
   railway run npm run build
   ```

3. **Permission Issues**
   ```bash
   railway run php artisan storage:link
   ```

4. **Cache Issues**
   ```bash
   railway run php artisan config:clear
   railway run php artisan cache:clear
   ```

### Environment Variables

Check your environment variables:
```bash
railway variables
```

### Database Connection

Railway automatically provides these database variables:
- `DB_HOST`
- `DB_PORT`
- `DB_DATABASE`
- `DB_USERNAME`
- `DB_PASSWORD`

## 🔒 Security Notes

- All sensitive data is stored as Railway environment variables
- Database credentials are automatically managed by Railway
- SSL certificates are automatically provided
- No sensitive data is committed to the repository

## 📈 Scaling

Railway automatically scales your application based on traffic. You can also manually scale:

```bash
railway scale web=2
```

## 🎯 Next Steps

1. **Add Custom Domain** - Through Railway dashboard
2. **Set Up Monitoring** - Railway provides built-in monitoring
3. **Configure CI/CD** - Connect your GitHub repository for automatic deployments
4. **Add SSL Certificate** - Automatically provided by Railway

## 📞 Support

- **Railway Documentation**: [docs.railway.app](https://docs.railway.app)
- **Railway Discord**: [discord.gg/railway](https://discord.gg/railway)
- **Laravel Documentation**: [laravel.com/docs](https://laravel.com/docs)

---

**Happy Deploying! 🚀** 