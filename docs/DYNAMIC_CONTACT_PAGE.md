# Dynamic Contact Page Setup Guide

## Overview

The Contact page has been made fully dynamic and editable through WordPress admin interface. You can now edit all content including hero section, contact information, office hours, transportation details, and FAQ items directly from the WordPress admin without touching any code.

## How to Edit Contact Page Content

### 1. Access the Contact Page Editor

1. Log into your WordPress admin dashboard
2. Go to **Pages** → **All Pages**
3. Find and click on the **Contact** page to edit it
4. You'll see several new meta boxes below the main content editor:
   - **Hero Section**
   - **Contact Information**
   - **Office Hours & Transportation**
   - **FAQ Section**

### 2. Hero Section

Edit the main title and description that appears at the top of the contact page:

- **Hero Title**: The main heading (default: "Contact Us")
- **Hero Description**: The subtitle text below the title

### 3. Contact Information

Manage all contact details displayed in the three information cards:

#### Location Information
- **Location Title**: Title for the location card (default: "Our Location")
- **Street Address**: Your school's street address
- **City, State/Province**: City and state/province information
- **Country**: Country name

#### Phone Numbers
- **Main Office**: Primary phone number
- **Admissions**: Admissions department phone
- **Fax**: Fax number

#### Email Addresses
- **General Inquiries**: Main contact email
- **Admissions**: Admissions department email
- **Support**: Technical support email

### 4. Office Hours & Transportation

#### Office Hours
- **Monday - Friday**: Operating hours for weekdays
- **Saturday**: Saturday operating hours
- **Sunday**: Sunday operating hours (or "Closed")

#### Transportation Information
- **Transportation Details**: Detailed information about how to reach your school by public transportation

### 5. FAQ Section

Manage up to 4 frequently asked questions:

- **FAQ Item 1-4**: Each item has:
  - **Question**: The question text
  - **Answer**: The answer text

## Features

### ✅ Fully Dynamic Content
- All text content is editable through WordPress admin
- No need to edit template files
- Changes are immediate upon saving

### ✅ Fallback System
- Default content is provided for all fields
- If a field is empty, sensible defaults are used
- Page remains functional even with missing data

### ✅ Security
- All input is properly sanitized
- WordPress nonce protection against CSRF attacks
- Proper escaping of output data

### ✅ User-Friendly Interface
- Organized into logical sections with clear labels
- Standard WordPress form fields
- Intuitive editing experience

## Content Management Tips

### Best Practices

1. **Keep Content Current**: Regularly update contact information, especially phone numbers and email addresses
2. **Office Hours**: Update office hours for holidays and special schedules
3. **FAQ Relevance**: Keep FAQ items relevant to common inquiries you receive
4. **Transportation Updates**: Update transportation information when routes change

### Content Guidelines

1. **Hero Title**: Keep it short and clear (recommended: 1-5 words)
2. **Hero Description**: Brief and welcoming (recommended: 1-2 sentences)
3. **Contact Details**: Ensure all information is accurate and up-to-date
4. **FAQ Answers**: Keep answers concise but informative

## Technical Details

### Meta Fields Used

The following meta fields store the contact page content:

#### Hero Section
- `contact_hero_title`
- `contact_hero_description`

#### Location
- `contact_location_title`
- `contact_location_address`
- `contact_location_city`
- `contact_location_country`

#### Phone Numbers
- `contact_phone_main`
- `contact_phone_admissions`
- `contact_phone_fax`

#### Email Addresses
- `contact_email_general`
- `contact_email_admissions`
- `contact_email_support`

#### Office Hours
- `contact_hours_mon_fri`
- `contact_hours_saturday`
- `contact_hours_sunday`

#### Transportation
- `contact_transportation_info`

#### FAQ Items (1-4)
- `contact_faq_1_question`, `contact_faq_1_answer`
- `contact_faq_2_question`, `contact_faq_2_answer`
- `contact_faq_3_question`, `contact_faq_3_answer`
- `contact_faq_4_question`, `contact_faq_4_answer`

### Helper Functions

Two helper functions are available for developers:

```php
// Get any contact meta field with fallback
cbc_school_get_contact_meta($field_name, $default);

// Get all FAQ items as an array
cbc_school_get_contact_faqs();
```

## Troubleshooting

### Meta Boxes Not Showing

1. Make sure you're editing the correct Contact page (slug: 'contact')
2. Check that the page template is set to "Contact Page"
3. Verify the page exists and is published

### Changes Not Appearing

1. Clear any caching plugins
2. Check that you clicked "Update" to save the page
3. Verify you're viewing the correct page on the frontend

### Default Content Appearing

- This is normal behavior when fields are empty
- Fill in the meta box fields to replace default content
- Save the page after making changes

## Support

If you encounter any issues with the dynamic contact page functionality, please check:

1. WordPress admin error logs
2. Theme error logs
3. Browser console for JavaScript errors
4. Contact your developer for custom modifications

---

**Note**: The contact form functionality remains unchanged and continues to work as before. Only the static content sections have been made dynamic.
