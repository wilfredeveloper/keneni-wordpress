# Live Development Workflow Guide

## 🚀 Your Development Environment is Now Set Up!

With the updated Docker configuration, you can now edit your theme files locally and see changes instantly.

## 📁 File Structure for Development

Your current directory structure:
```
your-project/
├── style.css           ← Edit this for CSS changes
├── functions.php       ← Edit this for PHP functionality
├── header.php          ← Edit this for header changes
├── footer.php          ← Edit this for footer changes
├── front-page.php      ← Edit this for homepage layout
├── js/main.js          ← Edit this for JavaScript
├── docker-compose.yml  ← Docker configuration
└── ... (other theme files)
```

## 🔄 Live Development Workflow

### 1. Start Your Development Environment
```bash
# Start containers
docker-compose up -d

# Check status
docker-compose ps
```

### 2. Access Your Site
- **Frontend**: http://localhost:8080
- **WordPress Admin**: http://localhost:8080/wp-admin

### 3. Make Changes and See Results Instantly

#### CSS Changes (Instant Preview):
1. Open `style.css` in your code editor
2. Make changes (e.g., change colors, fonts, layouts)
3. Save the file
4. Refresh your browser → Changes appear immediately!

#### PHP Changes (Instant Preview):
1. Edit any `.php` file (header.php, functions.php, etc.)
2. Save the file
3. Refresh your browser → Changes appear immediately!

#### JavaScript Changes (Instant Preview):
1. Edit `js/main.js`
2. Save the file
3. Refresh your browser → Changes appear immediately!

## 🛠️ Development Tools & Tips

### Browser Developer Tools
- **Chrome/Firefox**: Press F12 to open developer tools
- **Inspect Element**: Right-click any element to inspect and modify CSS live
- **Console**: Check for JavaScript errors
- **Network Tab**: Monitor loading times

### Code Editor Recommendations
- **VS Code**: Free, excellent for web development
- **PHPStorm**: Professional PHP IDE
- **Sublime Text**: Lightweight and fast

### Useful Browser Extensions
- **WordPress Developer Tools**: For WordPress-specific debugging
- **Web Developer**: Toolbar with useful development tools
- **ColorZilla**: Color picker and gradient generator

## 🎨 Common Development Tasks

### Changing Colors
Edit `style.css` and modify color values:
```css
/* Change primary color from orange to blue */
:root {
    --primary-color: #007cba; /* Was #ff6b35 */
}
```

### Modifying Layout
Edit template files like `front-page.php`:
```php
<!-- Add a new section -->
<section class="new-section">
    <div class="container">
        <h2>New Section</h2>
        <p>Your content here</p>
    </div>
</section>
```

### Adding New Functionality
Edit `functions.php`:
```php
// Add new custom post type
function add_testimonials_post_type() {
    register_post_type('testimonials', array(
        'labels' => array('name' => 'Testimonials'),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail')
    ));
}
add_action('init', 'add_testimonials_post_type');
```

## 🔍 Debugging

### WordPress Debug Mode
Debug mode is already enabled in your Docker setup. Check logs:
```bash
# View WordPress logs
docker-compose logs wordpress

# View real-time logs
docker-compose logs -f wordpress
```

### Common Issues & Solutions

#### Changes Not Showing?
1. **Hard refresh**: Ctrl+F5 (Windows) or Cmd+Shift+R (Mac)
2. **Clear browser cache**: Developer tools → Network → Disable cache
3. **Check file permissions**: Ensure files are saved properly

#### CSS Not Loading?
1. Check browser console for 404 errors
2. Verify file paths in `functions.php`
3. Clear any caching plugins

#### PHP Errors?
1. Check Docker logs: `docker-compose logs wordpress`
2. Look for syntax errors in your PHP files
3. Enable WordPress debug mode (already enabled)

## 📱 Testing Responsive Design

### Browser Developer Tools
1. Open developer tools (F12)
2. Click device toolbar icon
3. Test different screen sizes:
   - Mobile: 375px width
   - Tablet: 768px width
   - Desktop: 1200px+ width

### Real Device Testing
- Test on actual phones/tablets
- Use browser's device simulation
- Check touch interactions

## 🚀 Advanced Development

### Using Browser Sync (Optional)
For automatic browser refresh on file changes:

1. Install Node.js
2. Install browser-sync: `npm install -g browser-sync`
3. Run: `browser-sync start --proxy "localhost:8080" --files "**/*.css, **/*.php, **/*.js"`

### Version Control with Git
```bash
# Initialize git repository
git init

# Add files
git add .

# Commit changes
git commit -m "Initial theme setup"

# Create branches for features
git checkout -b new-feature
```

## 🎯 Quick Development Commands

```bash
# Start development environment
docker-compose up -d

# Stop environment
docker-compose down

# View logs
docker-compose logs -f

# Restart WordPress container
docker-compose restart wordpress

# Access WordPress container shell
docker-compose exec wordpress bash
```

## 📝 Development Checklist

### Before Making Changes:
- [ ] Backup your current working version
- [ ] Create a git commit of current state
- [ ] Test current functionality

### While Developing:
- [ ] Save files frequently
- [ ] Test in multiple browsers
- [ ] Check mobile responsiveness
- [ ] Monitor browser console for errors

### After Changes:
- [ ] Test all functionality
- [ ] Validate HTML/CSS
- [ ] Check accessibility
- [ ] Commit changes to git

## 🎉 You're Ready to Develop!

Your live development environment is now set up. Any changes you make to your theme files will be reflected immediately when you refresh your browser.

Happy coding! 🚀
