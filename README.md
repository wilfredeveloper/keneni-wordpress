# CBC School Modern WordPress Theme

A modern, responsive WordPress theme designed specifically for educational institutions implementing the Competency-Based Curriculum (CBC) in Kenya.

## 🏗️ Professional Theme Structure

This theme follows WordPress development best practices with a clean, organized folder structure:

```
cbc-school-modern/
├── style.css                    # Main theme stylesheet (required in root)
├── functions.php                # Main functions file
├── index.php                    # Main template file
├── header.php                   # Header template
├── footer.php                   # Footer template
├── front-page.php              # Homepage template
├── searchform.php              # Search form template
├── assets/                      # All theme assets
│   ├── css/                     # Future CSS organization
│   ├── js/                      # JavaScript files
│   │   ├── main.js             # Core functionality
│   │   └── components/         # Component-specific JS
│   │       ├── carousel.js     # Hero carousel
│   │       ├── mobile-menu.js  # Mobile menu
│   │       └── notice-board.js # Notice board
│   ├── images/                  # Theme images
│   └── fonts/                   # Custom fonts
├── template-parts/              # Reusable template parts
│   ├── header/                  # Header components
│   ├── footer/                  # Footer components
│   ├── content/                 # Content templates
│   └── forms/                   # Form templates
├── inc/                         # Include files
│   ├── customizer.php          # Customizer settings
│   ├── custom-post-types.php   # Custom post types
│   ├── widgets.php             # Custom widgets
│   ├── admin.php               # Admin functionality
│   └── helpers.php             # Helper functions
├── page-templates/              # Custom page templates
│   └── page-news-events.php   # News & Events template
└── docs/                        # Documentation
    ├── SETUP_INSTRUCTIONS.md
    ├── ACTIVATION_INSTRUCTIONS.md
    ├── TROUBLESHOOTING.md
    └── NEWS_EVENTS_SETUP.md
```

## ✨ Features

- **Modern Design**: Clean, professional layout with contemporary styling
- **Responsive**: Fully responsive design that works on all devices
- **CBC-Focused**: Tailored for Kenyan educational institutions
- **Modular Architecture**: Organized code structure for maintainability
- **Component-Based JS**: Separate JavaScript components for better organization
- **Template Parts**: Reusable template components
- **Customizable**: Extensive customizer options for easy configuration
- **Performance Optimized**: Fast loading and SEO-friendly
- **Accessibility**: Built with accessibility best practices

## 🚀 Installation

1. Download the theme files
2. Upload to your WordPress site's `/wp-content/themes/` directory
3. Activate the theme from WordPress admin
4. Configure the theme through Appearance > Customize

## 🎨 Customization

The theme includes extensive customization options accessible through the WordPress Customizer:

- Hero section content and images
- Notice board settings
- Vision section content
- Key highlights
- School information and contact details
- Navigation menus
- Footer content

## 🛠️ Development

This theme is built with modern web technologies and follows WordPress coding standards.

### Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher

### Local Development

Use the included Docker setup for local development:

```bash
docker-compose up -d
```

Access your site at `http://localhost:8081`

### Theme Structure Benefits

- **Maintainable**: Organized code structure makes updates easier
- **Scalable**: Easy to add new components and features
- **Professional**: Follows senior developer standards
- **Export-Ready**: Can be easily packaged as a distributable theme

## 📱 JavaScript Components

The theme uses modular JavaScript components:

- **Carousel**: Hero image carousel with touch/swipe support
- **Mobile Menu**: Responsive navigation with accessibility features
- **Notice Board**: Collapsible notice board with smooth animations

## 🎯 Custom Post Types

- **Events**: School events with date, time, and location
- **Staff**: Staff members with positions and departments

## 📖 Documentation

Comprehensive documentation is available in the `docs/` folder:

- Setup instructions
- Activation guide
- Troubleshooting
- News & Events setup

## 🔧 Support

For support and documentation, please refer to the included documentation files in the `docs/` folder.

## 📄 License

This theme is licensed under the GPL v2 or later.
