# News & Events Page Setup Instructions

## Overview
I've created a custom News & Events page template that matches the design in your provided image. The page includes:

- Hero section with title, subtitle, and featured image
- Latest News section with 3 news cards
- Upcoming Events section with 3 event cards  
- Academic Calendar section with 3 calendar items
- Newsletter subscription section
- Responsive design for mobile devices

## Files Created/Modified

### 1. New Template File
- `page-news-events.php` - Custom page template for News & Events

### 2. Updated Styles
- `style.css` - Added comprehensive styling for the News & Events page including:
  - Hero section styling
  - News/Events card layouts
  - Newsletter section
  - Mobile responsive design

## How to Set Up the News & Events Page

### Step 1: Create the Page in WordPress Admin
1. Log into your WordPress admin dashboard
2. Go to **Pages > Add New**
3. Set the page title as "News & Events"
4. Set the page slug as "news-events" (this will make the URL `/news-events/`)
5. In the **Page Attributes** section on the right, select **"News & Events Page"** as the template
6. You can leave the content area empty as the template handles all the content
7. Click **Publish**

### Step 2: Update Navigation Menu
1. Go to **Appearance > Menus**
2. Find your primary menu
3. Add the new "News & Events" page to the menu
4. Position it where you want it in the navigation
5. Save the menu

### Step 3: Test the Page
1. Visit your website
2. Navigate to the News & Events page using the menu or by going to `/news-events/`
3. The page should display with the new design matching your provided image

## Customization Options

### Changing Content
To modify the news items, events, or calendar entries:
1. Edit the `page-news-events.php` file
2. Update the content in the respective sections
3. Change images by replacing the Unsplash URLs with your own images

### Adding Dynamic Content
To make the content dynamic (pulling from WordPress posts/events):
1. The template can be modified to pull from:
   - Regular WordPress posts for news
   - Custom post type "events" for events
   - Custom fields for calendar items

### Styling Modifications
All styles are in `style.css` under the "News & Events Page Styles" section. You can:
- Change colors by modifying the CSS variables
- Adjust spacing and layout
- Modify the card designs
- Update the hero section background

## Features Included

### Design Elements
- ✅ Hero section with gradient background and featured image
- ✅ Three main content sections (News, Events, Calendar)
- ✅ Card-based layout for content items
- ✅ Newsletter subscription section
- ✅ Responsive mobile design
- ✅ Hover effects and animations
- ✅ Consistent branding with theme colors

### Content Structure
- ✅ News items with dates, categories, and descriptions
- ✅ Event listings with upcoming dates
- ✅ Academic calendar with important dates
- ✅ Call-to-action buttons for each item
- ✅ "View More Archives" functionality

### Technical Features
- ✅ WordPress template system integration
- ✅ SEO-friendly structure
- ✅ Accessibility considerations
- ✅ Cross-browser compatibility
- ✅ Mobile-first responsive design

## Next Steps

1. **Create the WordPress page** using the instructions above
2. **Test the page** to ensure it displays correctly
3. **Customize content** by editing the template file with your actual news and events
4. **Add real images** by replacing the placeholder Unsplash URLs
5. **Set up dynamic content** if you want to pull from WordPress posts/events

## Support

If you need to make any modifications or have questions about the implementation, the main files to work with are:
- `page-news-events.php` - For content and structure changes
- `style.css` - For design and layout modifications

The page is designed to be easily maintainable and follows WordPress best practices for custom page templates.
