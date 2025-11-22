# API Tester

A professional web-based API testing tool built with PHP Slim Framework and Tailwind CSS. Perfect for testing REST APIs, debugging endpoints, and managing API requests with a clean, modern interface.

## 🚀 Features

- **Professional UI**: Clean, responsive interface with Tailwind CSS styling
- **Light/Dark Mode**: Automatic theme switching with cookie persistence
- **URL History**: Store and quickly access previously tested API endpoints (up to 20 URLs)
- **HTTP Methods**: Support for GET, POST, PUT, DELETE, and PATCH requests
- **Headers Support**: Custom headers with JSON validation
- **Request Body**: Support for JSON payloads in POST/PUT/PATCH requests
- **Response Formatting**: Automatic JSON pretty-printing for better readability
- **Loading States**: Visual feedback during API calls
- **Error Handling**: Comprehensive error display and validation
- **Responsive Design**: Works seamlessly on desktop and mobile devices

## 📋 Requirements

- **PHP**: 7.4 or higher
- **Web Server**: Nginx or Apache with URL rewriting
- **Composer**: PHP dependency manager
- **Modern Browser**: Chrome, Firefox, Safari, or Edge (latest versions)

### PHP Extensions
- `mbstring`
- `json`
- `curl` (optional, for advanced features)

## 🛠️ Installation

### 1. Clone or Download
```bash
git clone <your-repo-url>
cd php_api
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Configure Web Server

#### Nginx Configuration
```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /path/to/php_api/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php$is_args$args;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
    }

    location ~ /\. {
        deny all;
    }
}
```

#### Apache Configuration (.htaccess)
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ index.php [QSA,L]
```

### 4. Set Permissions
```bash
# Set proper ownership
chown -R www-data:www-data /path/to/php_api/

# Set proper permissions
chmod -R 755 /path/to/php_api/
```

### 5. Access the Application
Open your browser and navigate to `http://your-domain.com`

## 🔧 Usage

### Basic API Testing
1. Enter your API endpoint URL in the "API Endpoint URL" field
2. Select the HTTP method (GET, POST, PUT, DELETE, PATCH)
3. Add any required headers in JSON format
4. For POST/PUT/PATCH requests, add your request body
5. Click "Send Request" to execute the API call
6. View the formatted response in the right panel

### URL History
- Click the dropdown arrow next to the URL field to view previously tested endpoints
- Click any URL to populate the input field
- History is automatically saved in your browser's localStorage

### Theme Switching
- Click the sun/moon icon in the header to toggle between light and dark modes
- Your preference is saved and remembered across sessions

## 🐛 Troubleshooting

### 500 Internal Server Error

**Common Causes:**
- Incorrect file permissions
- Missing PHP extensions
- Slim Framework version conflicts
- View file inclusion issues

**Solutions:**
```bash
# Check file permissions
ls -la /path/to/php_api/

# Verify PHP extensions
php -m | grep -E "(mbstring|json)"

# Check PHP error logs
tail -f /var/log/php7.4-fpm.log

# Test PHP syntax
php -l public/index.php
php -l views/index.php
```

### 404 Not Found

**Common Causes:**
- Incorrect Nginx/Apache configuration
- Missing URL rewriting rules
- Wrong document root path

**Solutions:**
- Verify your web server configuration matches the examples above
- Ensure the `public` directory is set as document root
- Check that URL rewriting is enabled

### API Requests Not Working

**Common Causes:**
- CORS issues
- Invalid JSON in headers/body
- Network connectivity problems

**Solutions:**
- Check browser console for CORS errors
- Validate JSON syntax in headers and request body
- Test with a simple GET request first
- Verify API endpoint is accessible

### Theme Not Persisting

**Common Causes:**
- Cookies disabled in browser
- JavaScript errors

**Solutions:**
- Enable cookies in your browser
- Clear browser cache and cookies
- Check browser console for JavaScript errors

### Performance Issues

**Common Causes:**
- Large response payloads
- Slow API endpoints
- Browser resource limitations

**Solutions:**
- Limit response sizes for testing
- Use pagination for large datasets
- Clear browser cache regularly
- Monitor network tab in browser dev tools

## 📁 Project Structure

```
php_api/
├── public/
│   └── index.php          # Slim Framework entry point
├── views/
│   └── index.php          # Main API tester interface
├── vendor/                # Composer dependencies
├── composer.json          # PHP dependencies
├── composer.lock          # Dependency lock file
└── README.md             # This file
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 🆘 Support

If you encounter any issues or have questions:

1. Check the troubleshooting section above
2. Review the browser console for JavaScript errors
3. Check web server error logs
4. Open an issue on GitHub with detailed information

## 🔄 Updates

- **v1.0.0**: Initial release with basic API testing functionality
- Professional UI with Tailwind CSS
- URL history and theme persistence
- Comprehensive error handling

---

**Built with ❤️ using PHP Slim Framework and Tailwind CSS**