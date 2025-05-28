# Local by Flywheel Troubleshooting Guide

## MySQL Error: "Unable to provision site"

This error typically occurs due to MySQL service conflicts or port issues.

### Solution 1: Restart Local Services
1. **Stop the site** in Local
2. **Quit Local completely**
3. **Restart Local**
4. **Start the site again**

### Solution 2: Check for Port Conflicts
1. Open Terminal/Command Prompt
2. Check if MySQL is running elsewhere:
   ```bash
   # On Mac/Linux:
   sudo lsof -i :3306
   
   # On Windows:
   netstat -an | findstr :3306
   ```
3. If MySQL is running elsewhere, stop it:
   ```bash
   # On Mac:
   sudo brew services stop mysql
   
   # On Ubuntu:
   sudo service mysql stop
   
   # On Windows:
   net stop mysql
   ```

### Solution 3: Change MySQL Port in Local
1. In Local, click on your site
2. Go to **Database** tab
3. Click **Change Port**
4. Use port `3307` instead of `3306`
5. Restart the site

### Solution 4: Reset Local Environment
1. **Delete the problematic site** in Local
2. **Create a new site** with different settings:
   - Use **Custom** environment instead of Preferred
   - Choose **nginx** instead of Apache
   - Use **MySQL 5.7** instead of 8.0

### Solution 5: Alternative - Use XAMPP Instead

If Local continues to have issues, try XAMPP:

#### XAMPP Setup (More Reliable)
1. **Download XAMPP**: https://www.apachefriends.org/
2. **Install and start Apache + MySQL**
3. **Download WordPress**: https://wordpress.org/download/
4. **Extract to**: `xampp/htdocs/cbc-school/`
5. **Create database**: http://localhost/phpmyadmin
6. **Install WordPress**: http://localhost/cbc-school/

### Solution 6: Docker Alternative (Most Reliable)

Use the docker-compose.yml file I created:

```bash
# In your theme directory:
docker-compose up -d

# Wait 2 minutes, then visit:
# http://localhost:8080
```

## Quick WordPress Setup with XAMPP

### Step 1: Install XAMPP
- Download from https://www.apachefriends.org/
- Install and open XAMPP Control Panel
- Start **Apache** and **MySQL** services

### Step 2: Download WordPress
- Go to https://wordpress.org/download/
- Extract WordPress to `C:\xampp\htdocs\cbc-school\` (Windows)
- Or `/Applications/XAMPP/htdocs/cbc-school/` (Mac)

### Step 3: Create Database
- Open http://localhost/phpmyadmin
- Click **New** to create database
- Name: `cbc_school_db`
- Click **Create**

### Step 4: Install WordPress
- Visit http://localhost/cbc-school/
- WordPress installation wizard will start
- Database settings:
  - Database name: `cbc_school_db`
  - Username: `root`
  - Password: (leave empty)
  - Database host: `localhost`

### Step 5: Install Your Theme
- Login to WordPress admin
- Go to **Appearance > Themes > Add New > Upload Theme**
- Upload the `cbc-school-modern.zip` file
- Activate the theme

## Alternative: Online Demo

If local setup is problematic, you can also:

### Option A: WordPress.com
1. Create free account at WordPress.com
2. Upload theme (requires paid plan)

### Option B: InstaWP (Free Online WordPress)
1. Go to https://instawp.com/
2. Create free temporary WordPress site
3. Upload your theme

### Option C: Local Development with Valet (Mac only)
```bash
# Install Laravel Valet
composer global require laravel/valet
valet install

# In your WordPress directory:
valet link cbc-school
valet secure cbc-school  # Optional HTTPS

# Visit: https://cbc-school.test
```

## Most Reliable Method: XAMPP

Based on the error you're seeing, I recommend switching to **XAMPP** as it's more stable:

1. **Uninstall/quit Local** (it's conflicting with MySQL)
2. **Install XAMPP**
3. **Follow the XAMPP steps above**
4. **Upload your theme ZIP file**

This should resolve the MySQL provisioning error and get your theme running smoothly.

## Need Help?

If you continue having issues:
1. Try the Docker method (most reliable)
2. Use XAMPP instead of Local
3. Check if other MySQL services are running
4. Restart your computer to clear any port conflicts

The theme is ready - it's just a matter of getting the local environment working properly! 🚀
