# API Tester

A professional web-based API testing tool built with PHP Slim Framework and Tailwind CSS. Perfect for testing REST APIs, debugging endpoints, and managing API requests with a clean, modern interface.

## 🚀 Features

- **Professional UI**: Clean, responsive interface with Tailwind CSS styling
- **Light/Dark Mode**: Automatic theme switching with cookie persistence
- **URL History**: Store and quickly access previously tested API endpoints (up to 20 URLs)
- **HTTP Methods**: Support for GET, POST, PUT, DELETE, and PATCH requests
- **Headers Support**: Custom headers with JSON validation
- **Flexible Body Handling**: Toggle between request body and URL query parameters
- **JSON Parameter Conversion**: Automatic conversion of JSON to URL-encoded query strings
- **Loading States**: Visual feedback during API calls
- **Local API Testing**: Built-in proxy to test local APIs without CORS issues
- **CORS Bypass**: Automatic proxy routing for localhost API endpoints

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

### Local API Testing
The tool includes a built-in proxy to test local APIs running on your server without CORS issues:

1. For APIs running on `http://127.0.0.1:19082/`, simply enter the full URL
2. The tool automatically routes these requests through the proxy
3. No CORS configuration needed on your backend API

**Example:**
- Enter: `http://127.0.0.1:19082/api/users`
- The tool proxies it through: `http://your-domain.com/proxy/api/users`

### Request Body vs URL Parameters

The tool supports two modes for sending data:

#### Request Body Mode (Default)
- Data is sent in the HTTP request body
- Works with POST, PUT, PATCH methods
- JSON data is sent as-is in the body

#### URL Parameters Mode
- Toggle the "URL Params" switch next to the Request Body field
- JSON data is converted to URL query parameters
- **Automatic URL Encoding**: Special characters are properly encoded
- Works with any HTTP method
- Example: `{"userId": 123, "action": "view & edit"}` becomes `?userId=123&action=view+%26+edit`

**When to use URL Params mode:**
- Testing GET requests with parameters
- APIs that expect query parameters instead of body data
- Debugging parameter encoding
- **URL Preview**: The response shows the final encoded URL used

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

### CORS Issues with Local APIs

**Problem:** "Failed to fetch" error when testing local APIs

**Solution:** The tool includes automatic proxy routing for local APIs:
- URLs starting with `http://127.0.0.1:19082/` are automatically proxied
- URLs starting with `http://localhost:19082/` are also supported
- No additional configuration needed

**Manual Proxy Usage:**
If you need to proxy other local services, you can use:
```
http://your-domain.com/proxy/path/to/endpoint
```

This proxies to: `http://127.0.0.1:19082/path/to/endpoint`

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