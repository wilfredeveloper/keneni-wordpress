# CBC School Modern Theme - Testing Guide

## 🧪 Complete Testing Instructions

This guide provides comprehensive testing instructions for the reorganized WordPress theme structure.

## Prerequisites

1. **Docker Environment**: Ensure Docker and Docker Compose are installed
2. **Theme Files**: All reorganized theme files are in place
3. **Browser**: Modern web browser for testing

## 🚀 Starting the Development Environment

### 1. Start Docker Services

```bash
# Navigate to the theme directory
cd /path/to/keneni-wordpress

# Start the Docker environment
docker-compose up -d

# Check if services are running
docker-compose ps
```

### 2. Access the Site

- **Frontend**: http://localhost:8081
- **WordPress Admin**: http://localhost:8081/wp-admin
- **Default Credentials**: admin/admin (if previously set up)

## 🔍 Theme Testing Checklist

### ✅ 1. Theme Activation

- [ ] Navigate to WordPress Admin → Appearance → Themes
- [ ] Verify "CBC School Modern" theme is available
- [ ] Activate the theme successfully
- [ ] No PHP errors or warnings displayed
- [ ] Theme screenshot displays correctly

### ✅ 2. Asset Loading Verification

#### JavaScript Components
- [ ] **Main JS**: Check browser console for `assets/js/main.js` loading
- [ ] **Carousel Component**: Verify `assets/js/components/carousel.js` loads
- [ ] **Mobile Menu Component**: Verify `assets/js/components/mobile-menu.js` loads
- [ ] **Notice Board Component**: Verify `assets/js/components/notice-board.js` loads
- [ ] **No JS Errors**: Check browser console for JavaScript errors

#### CSS Loading
- [ ] **Main Stylesheet**: Verify `style.css` loads from theme root
- [ ] **Google Fonts**: Check that Inter font family loads correctly
- [ ] **Responsive Design**: Test on different screen sizes

### ✅ 3. Template Parts Functionality

#### Header Components
- [ ] **Navigation**: Main menu displays and functions correctly
- [ ] **Mobile Menu**: Hamburger menu appears on mobile devices
- [ ] **Mobile Menu Toggle**: Click/tap functionality works
- [ ] **Logo Area**: Custom logo displays if set

#### Footer Components
- [ ] **Footer Widgets**: Widget areas display correctly
- [ ] **Default Content**: Fallback content shows when no widgets are set
- [ ] **Copyright Section**: Copyright information displays
- [ ] **Footer Links**: Navigation links work properly

#### Content Components
- [ ] **Hero Section**: Displays with customizer content
- [ ] **Notice Board**: Shows and toggles correctly
- [ ] **Post Cards**: Display properly in news sections

### ✅ 4. Hero Carousel Testing

#### Basic Functionality
- [ ] **Image Display**: Hero images display correctly
- [ ] **Fallback Images**: Default images show when no custom images set
- [ ] **Navigation Dots**: Carousel dots appear and function
- [ ] **Auto-advance**: Slides change automatically every 5 seconds
- [ ] **Pause on Hover**: Carousel pauses when hovering

#### Interactive Features
- [ ] **Dot Navigation**: Clicking dots changes slides
- [ ] **Keyboard Navigation**: Arrow keys control slides
- [ ] **Touch/Swipe**: Mobile swipe gestures work (test on mobile device)
- [ ] **Accessibility**: Screen reader compatibility

### ✅ 5. Mobile Menu Testing

#### Responsive Behavior
- [ ] **Breakpoint**: Menu switches to mobile version at 768px
- [ ] **Toggle Button**: Hamburger icon displays correctly
- [ ] **Menu Animation**: Smooth open/close animations
- [ ] **Overlay**: Menu overlay covers content when open

#### Accessibility
- [ ] **ARIA Attributes**: Proper aria-expanded states
- [ ] **Keyboard Navigation**: Tab navigation works
- [ ] **Focus Management**: Focus moves to menu when opened
- [ ] **Escape Key**: ESC key closes menu

### ✅ 6. Notice Board Testing

#### Display and Interaction
- [ ] **Content Display**: Notice items show correctly
- [ ] **Toggle Functionality**: Expand/collapse works
- [ ] **Icon Animation**: Toggle icon rotates appropriately
- [ ] **Smooth Animation**: Content slides smoothly

#### Mobile Behavior
- [ ] **Auto-collapse**: Collapses when scrolling on mobile
- [ ] **Touch Interaction**: Touch gestures work properly
- [ ] **Responsive Layout**: Adapts to different screen sizes

### ✅ 7. Custom Post Types

#### Events Post Type
- [ ] **Admin Interface**: Events appear in WordPress admin
- [ ] **Custom Fields**: Event date, time, location fields work
- [ ] **Archive Page**: `/events/` page displays correctly
- [ ] **Single Event**: Individual event pages work

#### Staff Post Type
- [ ] **Admin Interface**: Staff members appear in admin
- [ ] **Custom Fields**: Position, department, contact fields work
- [ ] **Archive Page**: `/staff/` page displays correctly
- [ ] **Single Staff**: Individual staff pages work

### ✅ 8. News & Events Page

#### Custom Template
- [ ] **Page Access**: `/news-events/` URL works
- [ ] **Template Loading**: Custom template loads from `page-templates/`
- [ ] **Content Display**: Events and news display correctly
- [ ] **Responsive Design**: Works on all devices

### ✅ 9. Customizer Integration

#### Hero Section
- [ ] **Title/Subtitle**: Text changes reflect on frontend
- [ ] **Description**: Content updates properly
- [ ] **Button Text/URLs**: Links work correctly
- [ ] **Images**: Hero carousel images update

#### Notice Board
- [ ] **Enable/Disable**: Toggle works correctly
- [ ] **Title**: Notice board title updates
- [ ] **Notice Items**: Individual notices update
- [ ] **Dates/Links**: Notice metadata works

#### Vision Section
- [ ] **Content Updates**: All text fields update frontend
- [ ] **Button Links**: CTA buttons work correctly
- [ ] **Image Upload**: Vision image displays

### ✅ 10. Performance Testing

#### Loading Speed
- [ ] **Initial Load**: Page loads within 3 seconds
- [ ] **Asset Optimization**: CSS/JS files load efficiently
- [ ] **Image Loading**: Images load without blocking
- [ ] **No 404 Errors**: All assets load successfully

#### Browser Compatibility
- [ ] **Chrome**: Full functionality works
- [ ] **Firefox**: All features operational
- [ ] **Safari**: Complete compatibility
- [ ] **Edge**: No issues detected
- [ ] **Mobile Browsers**: iOS Safari, Chrome Mobile work

## 🐛 Common Issues and Solutions

### JavaScript Not Loading
```bash
# Check file paths in browser developer tools
# Verify functions.php enqueue statements
# Check for PHP errors in WordPress debug log
```

### Template Parts Not Displaying
```bash
# Verify file paths in get_template_part() calls
# Check file permissions
# Ensure proper PHP opening/closing tags
```

### Customizer Settings Not Saving
```bash
# Check for PHP errors
# Verify customizer.php is properly included
# Test with default WordPress theme first
```

### Mobile Menu Not Working
```bash
# Check JavaScript console for errors
# Verify mobile-menu.js is loading
# Test CSS media queries
```

## 📊 Testing Results Template

```
## Testing Results - [Date]

### Environment
- WordPress Version: 
- PHP Version: 
- Browser: 
- Device: 

### Results
- [ ] Theme Activation: PASS/FAIL
- [ ] Asset Loading: PASS/FAIL
- [ ] Template Parts: PASS/FAIL
- [ ] Hero Carousel: PASS/FAIL
- [ ] Mobile Menu: PASS/FAIL
- [ ] Notice Board: PASS/FAIL
- [ ] Custom Post Types: PASS/FAIL
- [ ] News & Events Page: PASS/FAIL
- [ ] Customizer: PASS/FAIL
- [ ] Performance: PASS/FAIL

### Issues Found
1. [Issue description]
2. [Issue description]

### Notes
[Additional observations]
```

## 🎯 Success Criteria

The theme reorganization is successful when:

1. ✅ All JavaScript components load and function correctly
2. ✅ Template parts display proper content
3. ✅ Hero carousel works with touch/keyboard/mouse interaction
4. ✅ Mobile menu provides full navigation functionality
5. ✅ Notice board toggles and displays content properly
6. ✅ Custom post types function in admin and frontend
7. ✅ News & Events page loads from correct template location
8. ✅ Customizer settings update frontend content
9. ✅ No PHP errors or JavaScript console errors
10. ✅ Theme can be packaged and distributed as a zip file

## 📦 Export Testing

To test theme export readiness:

```bash
# Create theme zip
./create-theme-zip.sh

# Test installation on fresh WordPress site
# Verify all functionality works after installation
```

---

**Note**: This testing guide ensures the reorganized theme structure maintains all functionality while providing better code organization and maintainability.
