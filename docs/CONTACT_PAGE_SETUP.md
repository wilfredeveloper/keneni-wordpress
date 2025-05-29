# Contact Page Setup Guide

## Overview

The Contact page has been successfully created with a modern, responsive design that includes:

- **Hero Section** with page title and description
- **Contact Information Cards** displaying location, phone, and email
- **Contact Form** with validation and security features
- **Map Section** with office hours
- **Transportation Information**
- **FAQ Section** for common questions

## Features

### 1. Contact Information Cards
Three responsive cards displaying:
- **Location**: Physical address with map icon
- **Phone**: Multiple contact numbers with phone icon
- **Email**: Different email addresses for various departments

### 2. Contact Form
- **Security**: WordPress nonce protection against CSRF attacks
- **Validation**: Client and server-side validation
- **Form Fields**:
  - Name (required)
  - Email (required, validated)
  - Phone (optional)
  - Subject dropdown (required)
  - Message (required)
- **Error Handling**: Displays validation errors
- **Success Message**: Confirms form submission
- **Form Persistence**: Retains user input on validation errors

### 3. Map and Office Hours
- Placeholder for interactive map
- Office hours display
- Professional styling

### 4. Additional Sections
- Transportation information
- FAQ section with common questions

## Customization

### Contact Information
Edit the contact details in `page-contact.php`:

```php
// Location Card
<p><strong>123 Education Street</strong></p>
<p>City, State 12345</p>
<p>Country</p>

// Phone Card
<p><strong>Main Office: +1 (123) 456-7890</strong></p>
<p>Admissions: +1 (123) 456-7891</p>

// Email Card
<p><strong>General Inquiries: info@schoolname.edu</strong></p>
<p>Admissions: admissions@schoolname.edu</p>
```

### Form Subjects
Modify the subject dropdown options in the form:

```php
<option value="general">General Inquiry</option>
<option value="admissions">Admissions</option>
<option value="academics">Academics</option>
<option value="support">Technical Support</option>
<option value="other">Other</option>
```

### Office Hours
Update the office hours in the template:

```php
<div class="hours-item">
    <span class="day">Monday - Friday</span>
    <span class="time">8:00 AM - 4:30 PM</span>
</div>
```

## Email Integration

To enable email functionality, uncomment and configure the email section in `page-contact.php`:

```php
// If no errors, process the form
if (empty($form_errors)) {
    $to = 'admin@yourschool.edu';
    $email_subject = 'Contact Form: ' . $subject;
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Phone: $phone\n";
    $email_message .= "Subject: $subject\n\n";
    $email_message .= "Message:\n$message";
    
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $name . ' <' . $email . '>',
        'Reply-To: ' . $email
    );
    
    $mail_sent = wp_mail($to, $email_subject, $email_message, $headers);
    
    if ($mail_sent) {
        $form_success = true;
    } else {
        $form_errors[] = 'Failed to send message. Please try again.';
    }
}
```

## Map Integration

To add a real map, replace the map placeholder with:

### Google Maps
```html
<iframe 
    src="https://www.google.com/maps/embed?pb=YOUR_EMBED_CODE" 
    width="100%" 
    height="300" 
    style="border:0;" 
    allowfullscreen="" 
    loading="lazy">
</iframe>
```

### OpenStreetMap
```html
<iframe 
    src="https://www.openstreetmap.org/export/embed.html?bbox=COORDINATES" 
    width="100%" 
    height="300" 
    style="border:0;">
</iframe>
```

## Styling

The contact page uses the theme's existing color scheme and styling patterns:

- **Primary Color**: #ff6b35 (orange gradient)
- **Background**: #f8f9fa (light gray)
- **Cards**: White with subtle shadows
- **Responsive**: Mobile-first design
- **Typography**: Consistent with theme fonts

## Responsive Design

The page is fully responsive with breakpoints:

- **Desktop**: 2-column layout for form and map
- **Tablet** (768px): Single column layout
- **Mobile** (480px): Optimized spacing and typography

## Security Features

- **Nonce Verification**: Prevents CSRF attacks
- **Input Sanitization**: All form inputs are sanitized
- **Email Validation**: Server-side email validation
- **XSS Protection**: Output escaping for all dynamic content

## Testing

To test the contact page:

1. Navigate to `/contact/` on your site
2. Fill out the form with various inputs
3. Test validation by submitting empty fields
4. Verify responsive design on different screen sizes
5. Check form submission and success messages

## Troubleshooting

### Page Not Found
- Ensure the page template is assigned correctly
- Go to Settings → Permalinks and click "Save Changes"
- Check that the page exists in WordPress admin

### Form Not Working
- Verify nonce is being generated correctly
- Check PHP error logs for validation issues
- Ensure form method is POST

### Styling Issues
- Clear any caching plugins
- Check that CSS is loading properly
- Verify no theme conflicts

## Next Steps

1. **Customize Content**: Update contact information with real details
2. **Add Map**: Integrate with Google Maps or OpenStreetMap
3. **Email Setup**: Configure email functionality
4. **Test Thoroughly**: Test all form scenarios
5. **Monitor**: Set up form submission monitoring

The contact page is now ready for use and can be further customized based on your specific needs.
