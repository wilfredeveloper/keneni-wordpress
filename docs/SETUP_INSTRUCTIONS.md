# Quick Setup Guide for CBC School Modern Theme

## Option 1: Local by Flywheel (Easiest)

### Step 1: Download and Install Local
1. Go to https://localwp.com/
2. Download Local for your operating system
3. Install and open the application

### Step 2: Create New WordPress Site
1. Click "Create a new site"
2. Site name: "CBC School Demo"
3. Choose "Preferred" environment
4. Create admin user (remember credentials)
5. Click "Add Site"

### Step 3: Install Your Theme
1. Click "WP Admin" button to open WordPress dashboard
2. Login with your admin credentials
3. Go to **Appearance > Themes**
4. Click **Add New > Upload Theme**
5. Create a ZIP file of your theme folder and upload it
6. Click **Activate**

### Step 4: Set Up Your Site
1. Go to **Appearance > Customize**
2. Set up your hero section content
3. Go to **Appearance > Menus** to create navigation
4. Add some sample content

---

## Option 2: XAMPP (More Control)

### Step 1: Install XAMPP
1. Download from https://www.apachefriends.org/
2. Install XAMPP
3. Start Apache and MySQL from XAMPP Control Panel

### Step 2: Download WordPress
1. Download WordPress from https://wordpress.org/download/
2. Extract to `C:\xampp\htdocs\cbc-school\` (Windows) or `/Applications/XAMPP/htdocs/cbc-school/` (Mac)

### Step 3: Create Database
1. Open http://localhost/phpmyadmin
2. Click "New" to create database
3. Name it "cbc_school_db"
4. Click "Create"

### Step 4: Install WordPress
1. Visit http://localhost/cbc-school/
2. Follow WordPress installation:
   - Database name: cbc_school_db
   - Username: root
   - Password: (leave empty)
   - Host: localhost

### Step 5: Install Theme
1. Copy your theme folder to `htdocs/cbc-school/wp-content/themes/`
2. Login to WordPress admin
3. Go to Appearance > Themes
4. Activate "CBC School Modern"

---

## Option 3: Docker (Advanced Users)

### Create docker-compose.yml:
```yaml
version: '3.8'
services:
  wordpress:
    image: wordpress:latest
    ports:
      - "8080:80"
    environment:
      WORDPRESS_DB_HOST: db:3306
      WORDPRESS_DB_USER: wordpress
      WORDPRESS_DB_PASSWORD: wordpress
      WORDPRESS_DB_NAME: wordpress
    volumes:
      - ./:/var/www/html/wp-content/themes/cbc-school-modern
  
  db:
    image: mysql:5.7
    environment:
      MYSQL_DATABASE: wordpress
      MYSQL_USER: wordpress
      MYSQL_PASSWORD: wordpress
      MYSQL_ROOT_PASSWORD: rootpassword
```

### Run:
```bash
docker-compose up -d
```

Visit http://localhost:8080

---

## Quick Theme Installation Steps

### Method A: ZIP Upload
1. Create a ZIP file of your theme folder
2. In WordPress admin: Appearance > Themes > Add New > Upload Theme
3. Upload ZIP and activate

### Method B: Manual Copy
1. Copy theme folder to `/wp-content/themes/`
2. In WordPress admin: Appearance > Themes
3. Find and activate your theme

---

## Initial Theme Setup

### 1. Customize Hero Section
- Go to **Appearance > Customize > Hero Section**
- Set hero title: "Excellence in Education"
- Set subtitle: "Empowering Students Through CBC"
- Upload a hero image

### 2. Create Navigation Menu
- Go to **Appearance > Menus**
- Create new menu called "Primary Menu"
- Add pages: Home, About Us, Academics, Admissions, Student Life, Parents, News & Events, Contact
- Assign to "Primary Menu" location

### 3. Create Sample Pages
Create these pages with sample content:
- About Us
- Academics  
- Admissions
- Student Life
- Parents
- Contact

### 4. Add Sample Posts
- Create a few blog posts for news/events
- Add featured images to posts

### 5. Configure Widgets
- Go to **Appearance > Widgets**
- Set up footer widgets with school information

---

## Troubleshooting

### Theme Not Showing?
- Check that style.css has proper theme header
- Ensure all PHP files are present
- Check file permissions

### Styling Issues?
- Clear browser cache
- Check browser developer tools for CSS errors
- Ensure Google Fonts are loading

### JavaScript Not Working?
- Check browser console for errors
- Ensure jQuery is loaded
- Verify file paths in functions.php

---

## File Structure Check

Your theme should have these files:
```
cbc-school-modern/
├── style.css
├── functions.php
├── index.php
├── header.php
├── footer.php
├── front-page.php
├── page.php
├── single.php
├── archive.php
├── sidebar.php
├── 404.php
├── comments.php
├── searchform.php
├── screenshot.png
├── js/
│   └── main.js
└── README.md
```

---

## Next Steps After Setup

1. **Customize Content**: Replace placeholder text with your school's information
2. **Add Real Images**: Upload actual school photos
3. **Configure Contact Forms**: Set up contact forms for admissions
4. **SEO Setup**: Install Yoast SEO plugin
5. **Security**: Install security plugins
6. **Backup**: Set up regular backups

---

## Support

If you encounter issues:
1. Check WordPress debug logs
2. Deactivate plugins to test for conflicts
3. Switch to default theme to isolate theme issues
4. Check file permissions (755 for folders, 644 for files)

Happy developing! 🎓
