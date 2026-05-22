# Copyteque Website

A professional website for Copyteque - a cyber services and office supplies business in Bungoma, Kenya, owned by Moses Wanjala Laisa.

## 🌟 Features

- **Responsive Design**: Works perfectly on desktop, tablet, and mobile devices
- **Modern UI/UX**: Clean, professional design with smooth animations
- **Contact Form**: Functional email contact form with fallback options
- **Service Showcase**: Comprehensive display of cyber services and office supplies
- **Location Integration**: Google Maps integration and detailed location info
- **Performance Optimized**: Fast loading with optimized images and code

## 📁 Project Structure

```
files/
├── index.html          # Main website file
├── style.css           # All styling and responsive design
├── script.js           # JavaScript functionality and interactions
├── send-email.php      # Primary email handler (JSON-based)
├── simple-email.php    # Fallback email handler (form POST)
├── contact_log.txt     # Email attempt logs (auto-generated)
├── README.md           # This documentation file
└── image/              # Website images
    ├── WhatsApp Image 2026-05-19 at 5.19.31 PM.jpeg    # Logo
    ├── WhatsApp Image 2026-05-19 at 5.19.31 PM (1).jpeg
    └── WhatsApp Image 2026-05-22 at 2.29.21 PM.jpeg    # Owner photo
```

## 🚀 Getting Started

### Prerequisites
- Web server with PHP support (Apache, Nginx, etc.)
- PHP 7.0 or higher
- Mail function enabled on server

### Installation

1. **Upload Files**: Upload all files to your web server's public directory
2. **Set Permissions**: Ensure PHP files have execute permissions
3. **Configure Email**: Update email settings in PHP files if needed
4. **Test Contact Form**: Submit a test message to verify email functionality

### Local Development

1. **Clone/Download** the project files
2. **Start Local Server**:
   ```bash
   # Using PHP built-in server
   php -S localhost:8000
   
   # Or using Python
   python -m http.server 8000
   ```
3. **Open Browser**: Navigate to `http://localhost:8000`

## 📧 Email Configuration

The contact form uses two email handlers for maximum compatibility:

### Primary Handler (`send-email.php`)
- JSON-based API
- Enhanced error handling
- Detailed logging
- HTML email format

### Fallback Handler (`simple-email.php`)
- Simple form POST
- Basic text email
- Maximum server compatibility

### Email Settings
- **Recipient**: `laisamoses@gmail.com`
- **From**: `noreply@[your-domain]`
- **Subject**: "New Inquiry from Copyteque Website"

### Troubleshooting Email Issues

If emails aren't sending:

1. **Check Server Logs**: Look for PHP errors in server logs
2. **Verify Mail Function**: Ensure `mail()` function is enabled
3. **Contact Host**: Ask hosting provider about mail configuration
4. **Check Spam**: Emails might be going to spam folder
5. **Review Logs**: Check `contact_log.txt` for attempt records

## 🎨 Customization

### Colors
The website uses a professional color scheme:
- Primary: `#2563eb` (Blue)
- Secondary: `#1e40af` (Dark Blue)
- Accent: `#f59e0b` (Orange)
- Text: `#1f2937` (Dark Gray)

### Fonts
- Headings: Playfair Display
- Body: DM Sans

### Sections
1. **Hero**: Main banner with call-to-action
2. **About**: Owner information and business highlights
3. **Services**: Cyber services grid
4. **Supplies**: Office supplies catalog
5. **Location**: Map and contact details
6. **Contact**: Contact form and information

## 📱 Responsive Breakpoints

- **Mobile**: < 768px
- **Tablet**: 768px - 1024px
- **Desktop**: > 1024px

## 🔧 Technical Details

### Technologies Used
- **HTML5**: Semantic markup
- **CSS3**: Modern styling with Flexbox/Grid
- **JavaScript**: ES6+ features
- **PHP**: Server-side email handling

### Browser Support
- Chrome 60+
- Firefox 60+
- Safari 12+
- Edge 79+

### Performance Features
- Optimized images
- Minified CSS/JS (in production)
- Lazy loading for images
- Efficient animations

## 📞 Business Information

**Copyteque**
- **Owner**: Moses Wanjala Laisa
- **Location**: Opposite Christ the King Cathedral, Bungoma Town, Kenya
- **Phone**: +254 726 699 120
- **Email**: laisamoses@gmail.com
- **Hours**: 
  - Monday-Saturday: 7:30 AM - 8:00 PM
  - Sunday: 10:00 AM - 5:00 PM

## 🛠️ Maintenance

### Regular Tasks
- Monitor `contact_log.txt` for form submissions
- Check email delivery to Moses
- Update business information as needed
- Backup website files regularly

### Updates
- Keep PHP version updated
- Monitor for security patches
- Update contact information when needed

## 🐛 Common Issues

### Contact Form Not Working
1. Check PHP mail configuration
2. Verify file permissions
3. Review server error logs
4. Test with simple-email.php fallback

### Images Not Loading
1. Check file paths in HTML
2. Verify image file permissions
3. Ensure proper file extensions

### Mobile Display Issues
1. Test on actual devices
2. Check viewport meta tag
3. Verify responsive CSS rules

## 📄 License

This website is proprietary software created for Copyteque business. All rights reserved.

## 👨‍💻 Developer

**Website Developer**: Myles Munroe
- Created professional website for Copyteque
- Implemented responsive design and email functionality
- Optimized for performance and user experience

## 📞 Support

For technical support or website modifications, contact the developer or Moses Wanjala Laisa directly.

---

**Last Updated**: January 2025
**Version**: 1.0.0