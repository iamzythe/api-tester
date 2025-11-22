# API Tester

<div align="center">

![API Tester Logo](https://img.shields.io/badge/API%20Tester-Professional%20API%20Testing%20Tool-blue?style=for-the-badge&logo=data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTggOWwzIDMtMyAzbTUgMGgzTTUgMjBoMTRhMiAyIDAgMDAyLTJWNmEyIDIgMCAwMC0yLTJINWEyIDIgMCAwMC0yIDJ2MTJhMiAyIDAgMDAyIDJ6IiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPC9zdmc+)

[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-blue.svg)](https://php.net/)
[![Slim Framework](https://img.shields.io/badge/Slim-3.x-green.svg)](https://www.slimframework.com/)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC.svg)](https://tailwindcss.com/)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![GitHub Sponsors](https://img.shields.io/badge/Sponsor-GitHub%20Sponsors-blue?logo=github)](https://github.com/sponsors/iamzythe)
[![Ko-fi](https://img.shields.io/badge/Support-Ko--fi-red?logo=kofi)](https://ko-fi.com/iamzythe)
[![Buy Me a Coffee](https://img.shields.io/badge/Buy%20Me%20a%20Coffee-yellow?logo=buy-me-a-coffee)](https://buymeacoffee.com/zytheinfo3)

**A professional, web-based API testing tool built with PHP Slim Framework and Tailwind CSS**

[🚀 Live Demo](#-demo) • [📖 Documentation](#-documentation) • [🔧 Installation](#-installation) • [🤝 Contributing](#-contributing)

</div>

---

## 📋 Table of Contents

- [✨ Features](#-features)
- [🚀 Demo](#-demo)
- [📋 Requirements](#-requirements)
- [🔧 Installation](#-installation)
- [🛠️ Usage](#️-usage)
- [🔧 API Reference](#-api-reference)
- [🐛 Troubleshooting](#-troubleshooting)
- [📁 Project Structure](#-project-structure)
- [🚀 Development](#-development)
- [🤝 Contributing](#-contributing)
- [📄 License](#-license)
- [🙏 Acknowledgments](#-acknowledgments)
- [💝 Support the Project](#-support-the-project)
- [📞 Support](#-support)

---

## ✨ Features

<div align="center">

### 🎯 Core Features

| Feature | Description |
|---------|-------------|
| **🔄 HTTP Methods** | Full support for GET, POST, PUT, DELETE, PATCH |
| **📝 Request Builder** | Intuitive interface for building API requests |
| **📊 Response Viewer** | Formatted JSON responses with syntax highlighting |
| **💾 Request History** | Automatic URL history with quick access |
| **🔖 Saved Requests** | Save and manage frequently used API configurations |
| **🎨 Themes** | Light/Dark mode with automatic persistence |

### 🔧 Advanced Features

| Feature | Description |
|---------|-------------|
| **🌐 CORS Bypass** | Built-in proxy for testing local APIs |
| **🔀 Parameter Modes** | Toggle between request body and URL parameters |
| **📋 Custom Headers** | JSON-validated custom headers support |
| **🔄 Auto-URL Encoding** | Automatic encoding of special characters |
| **📱 Responsive Design** | Works perfectly on desktop and mobile |
| **⚡ Real-time Feedback** | Loading states and error handling |

### 🎨 UI/UX Features

- **Modern Interface**: Clean, professional design with Tailwind CSS
- **Intuitive Controls**: Easy-to-use forms and toggles
- **Visual Feedback**: Loading spinners and status indicators
- **Keyboard Friendly**: Full keyboard navigation support
- **Accessibility**: WCAG compliant design patterns

</div>

---

## 🚀 Demo

<div align="center">

### Screenshots

<table>
  <tr>
    <td><img src="https://i.imgur.com/kGz192F.png" alt="Light Mode" width="400"/></td>
    <td><img src="https://i.imgur.com/coaWYZr.png" alt="Dark Mode" width="400"/></td>
  </tr>
  <tr>
    <td align="center"><strong>Light Mode</strong></td>
    <td align="center"><strong>Dark Mode</strong></td>
  </tr>
</table>

### Live Demo

🌐 **[Try API Tester Live](https://api-tester.zythe.pro)**

*Test real APIs with our hosted demo instance*

</div>

---

## 📋 Requirements

### System Requirements

- **PHP**: 7.4 or higher
- **Web Server**: Nginx, Apache, or any PHP-compatible server
- **Composer**: PHP dependency manager
- **Modern Browser**: Chrome 90+, Firefox 88+, Safari 14+, Edge 90+

### PHP Extensions

```bash
# Required extensions
php-mbstring    # Multibyte string support
php-json        # JSON handling
php-curl        # HTTP requests (optional, for advanced features)
```

### Browser Support

- ✅ Chrome/Chromium (recommended)
- ✅ Firefox
- ✅ Safari
- ✅ Microsoft Edge
- ✅ Mobile browsers (iOS Safari, Chrome Mobile)

---

## 🔧 Installation

### Quick Start (Development)

```bash
# Clone the repository
git clone https://github.com/iamzythe/api-tester.git
cd api-tester

# 2. Install PHP dependencies
composer install

# 3. Start the development server
php -S localhost:8000 -t public

# 4. Open in browser
# http://localhost:8000
```

### Production Deployment

#### Option 1: Nginx

```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /path/to/api-tester/public;
    index index.php;

    # Security headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;

    location / {
        try_files $uri $uri/ /index.php$is_args$args;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
    }

    location ~ /\. {
        deny all;
    }
}
```

#### Option 2: Apache (.htaccess)

```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ index.php [QSA,L]

# Security headers
<IfModule mod_headers.c>
    Header always set X-Frame-Options SAMEORIGIN
    Header always set X-Content-Type-Options nosniff
    Header always set X-XSS-Protection "1; mode=block"
</IfModule>
```
#### Option 3: aaPanel (linux)
1. Log in to your aaPanel dashboard.
2. Navigate to the "Websites" section and click on "Add Site".
3. Fill in the domain name, select the PHP version (7.4 or higher), and set the root directory to the `public` folder of the API Tester project.
4. After creating the site, go to the "File" section and upload the API Tester files to the server.
5. Set the appropriate file permissions for the API Tester directory.
6. Open .user.ini file in public folder and set the following configurations:
```
open_basedir=/path/to/wwwroot/your-site-base/:/tmp/
```

#### Option 4: Docker

```dockerfile
FROM php:8.1-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    nginx \
    composer \
    curl

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port
EXPOSE 80

# Start command
CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]
```

### File Permissions

```bash
# Set proper ownership
chown -R www-data:www-data /path/to/api-tester/

# Set proper permissions
chmod -R 755 /path/to/api-tester/
chmod -R 775 /path/to/api-tester/storage/  # If you add file uploads
```

---

## 🛠️ Usage

### Basic API Testing

1. **Enter API Endpoint**: Input your API URL in the URL field
2. **Select Method**: Choose HTTP method (GET, POST, PUT, DELETE, PATCH)
3. **Add Headers**: Include authentication or custom headers in JSON format
4. **Configure Body**: Add request body for POST/PUT/PATCH requests
5. **Send Request**: Click "Send Request" to execute
6. **View Response**: See formatted response with status codes and headers

### Advanced Features

#### Saved Requests

```javascript
// Save a request configuration
const requestConfig = {
  name: "Get User Profile",
  url: "https://api.example.com/users/123",
  method: "GET",
  headers: {"Authorization": "Bearer token"},
  body: "",
  isUrlParamsMode: false
};
```

#### URL Parameters Mode

```json
// JSON input
{
  "userId": 123,
  "action": "view & edit",
  "filters": ["active", "verified"]
}

// Becomes URL encoded
?userId=123&action=view+%26+edit&filters=%5B%22active%22%2C%22verified%22%5D
```

#### Local API Testing

```bash
# Automatic proxy for local APIs
Input:  http://127.0.0.1:19082/api/users
Proxied: http://your-domain.com/proxy/api/users
```

### Keyboard Shortcuts

- `Ctrl+Enter` / `Cmd+Enter`: Send request
- `Ctrl+S` / `Cmd+S`: Save current request
- `Ctrl+L` / `Cmd+L`: Clear response
- `Tab`: Navigate between form fields

---

## 🔧 API Reference

### Endpoints

#### GET `/api/status`
Returns API tester status information.

**Response:**
```json
{
  "status": "ok",
  "version": "1.1.0",
  "timestamp": "2025-11-22T10:00:00Z"
}
```

#### POST `/proxy/*`
Proxies requests to local APIs to bypass CORS.

**Usage:**
```
POST /proxy/api/endpoint
```

**Headers:**
- `X-Target-Host`: Override default proxy target (optional)

### Request/Response Format

#### Request Object
```typescript
interface ApiRequest {
  url: string;
  method: 'GET' | 'POST' | 'PUT' | 'DELETE' | 'PATCH';
  headers?: Record<string, string>;
  body?: string;
  timeout?: number;
}
```

#### Response Object
```typescript
interface ApiResponse {
  status: number;
  statusText: string;
  headers: Record<string, string>;
  data: any;
  responseTime: number;
}
```

---

## 🐛 Troubleshooting

### Common Issues

#### 500 Internal Server Error

**Symptoms:** White page or "Internal Server Error"

**Solutions:**
```bash
# Check PHP error logs
tail -f /var/log/php8.1-fpm.log

# Verify file permissions
ls -la /path/to/api-tester/

# Test PHP syntax
php -l public/index.php
php -l views/index.php

# Check PHP extensions
php -m | grep -E "(mbstring|json|curl)"
```

#### 404 Not Found

**Symptoms:** Page not found errors

**Causes:**
- Incorrect web server configuration
- Missing URL rewriting
- Wrong document root

**Solutions:**
- Verify Nginx/Apache configuration
- Ensure `public/` is document root
- Check `.htaccess` file permissions

#### CORS Issues

**Symptoms:** "Failed to fetch" errors

**Solutions:**
- Use the built-in proxy for local APIs
- Configure CORS headers on your API server
- Use browser extensions for development

#### JavaScript Errors

**Symptoms:** Features not working, console errors

**Debug Steps:**
1. Open browser developer tools (F12)
2. Check Console tab for errors
3. Verify JavaScript is not blocked
4. Clear browser cache and cookies

### Performance Issues

#### Slow Response Times

**Optimization Tips:**
- Enable PHP OPcache
- Use CDN for static assets
- Implement caching headers
- Monitor server resources

#### Large Response Handling

**Best Practices:**
- Implement pagination for large datasets
- Use streaming for big responses
- Set appropriate timeouts
- Monitor memory usage

### Development Issues

#### Composer Issues

```bash
# Clear composer cache
composer clear-cache

# Update dependencies
composer update

# Reinstall vendor directory
rm -rf vendor/
composer install
```

---

## 📁 Project Structure

```
api-tester/
├── 📁 public/                 # Web root directory
│   └── 📄 index.php          # Slim Framework entry point
├── 📁 views/                  # Template files
│   └── 📄 index.php          # Main application interface
├── 📁 vendor/                # Composer dependencies (auto-generated)
├── 📄 composer.json          # PHP dependencies configuration
├── 📄 composer.lock          # Dependency lock file
├── 📄 README.md              # Project documentation
├── 📄 .gitignore             # Git ignore rules
└── 📄 LICENSE                # MIT License
```

### File Descriptions

| File/Directory | Purpose |
|----------------|---------|
| `public/index.php` | Main application entry point with Slim routes |
| `views/index.php` | HTML interface with embedded JavaScript |
| `composer.json` | PHP dependencies and project metadata |
| `vendor/` | Third-party PHP packages (Slim, etc.) |

---

## 🚀 Development

### Local Development Setup

```bash
# Clone repository
git clone https://github.com/iamzythe/api-tester.git
cd api-tester

# Install dependencies
composer install

# Start development server
php -S localhost:8000 -t public

# Open in browser
open http://localhost:8000
```

### Testing

```bash
# Run PHP tests (if implemented)
composer test

# Manual testing
curl -X GET http://localhost:8000/api/status

# Browser testing
# Open http://localhost:8000 and test API calls
```

### Building for Production

```bash
# Install production dependencies only
composer install --no-dev --optimize-autoloader

# Generate optimized autoloader
composer dump-autoload --optimize

# Set production environment
export APP_ENV=production
```

### Code Quality

```bash
# Run PHP CodeSniffer
composer run phpcs

# Fix code style issues
composer run phpcbf

# Run static analysis
composer run phpstan
```

---

## 🤝 Contributing

We welcome contributions! Please see our [Contributing Guide](CONTRIBUTING.md) for details.

### Development Workflow

1. **Fork** the repository
2. **Clone** your fork: `git clone https://github.com/iamzythe/api-tester.git`
3. **Create** a feature branch: `git checkout -b feature/amazing-feature`
4. **Make** your changes and add tests
5. **Commit** your changes: `git commit -m 'Add amazing feature'`
6. **Push** to the branch: `git push origin feature/amazing-feature`
7. **Open** a Pull Request

### Guidelines

- Follow PSR-12 coding standards
- Write tests for new features
- Update documentation as needed
- Keep commits atomic and descriptive
- Use conventional commit messages

### Code of Conduct

This project follows a code of conduct to ensure a welcoming environment for all contributors. By participating, you agree to uphold this code.

---

## 📄 License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

```
MIT License

Copyright (c) 2025 API Tester

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

---

## 🙏 Acknowledgments

### Technologies Used

- **[Slim Framework](https://www.slimframework.com/)** - PHP micro-framework
- **[Tailwind CSS](https://tailwindcss.com/)** - Utility-first CSS framework
- **[Inter Font](https://rsms.me/inter/)** - Beautiful, highly readable font
- **[Heroicons](https://heroicons.com/)** - Beautiful hand-crafted SVG icons

### Inspiration

- **Postman** - Industry-standard API testing tool
- **Insomnia** - Modern API client
- **Hoppscotch** - Open-source API testing platform

### Contributors

<a href="https://github.com/iamzythe/api-tester/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=iamzythe/api-tester" />
</a>

---

## 💝 Support the Project

If you find API Tester helpful, consider supporting the project! Your support helps maintain and improve this open-source tool.

### Ways to Support

#### 💰 Financial Support

- **[GitHub Sponsors](https://github.com/sponsors/iamzythe)** - Monthly sponsorship
- **[Ko-fi](https://ko-fi.com/iamzythe)** - One-time donations
- **[Buy Me a Coffee](https://www.buymeacoffee.com/iamzythe)** - Support with coffee ☕

#### 🤝 Other Ways to Help

- **⭐ Star the repository** - Show your support and help others discover the project
- **🐛 Report bugs** - Help improve the tool by reporting issues
- **💡 Suggest features** - Share your ideas for new functionality
- **📖 Improve documentation** - Help make the docs better
- **🔄 Contribute code** - Submit pull requests with improvements

#### 📢 Spread the Word

Share API Tester with your network:
- Tweet about it [@iamzythe](https://twitter.com/iamzythe)
- Write a blog post or tutorial
- Mention it in your project's README

### Supporters

<a href="https://github.com/iamzythe/api-tester/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=iamzythe/api-tester" />
</a>

---

## 📞 Support

### Getting Help

If you need help or have questions:

1. 📖 **Documentation**: Check this README and our [Wiki](https://github.com/iamzythe/api-tester/wiki)
2. 🔍 **Search Issues**: [GitHub Issues](https://github.com/iamzythe/api-tester/issues)
3. 💬 **Discussions**: [GitHub Discussions](https://github.com/iamzythe/api-tester/discussions)
4. 🐛 **Bug Reports**: [Open an Issue](https://github.com/iamzythe/api-tester/issues/new?template=bug_report.md)
5. 💡 **Feature Requests**: [Open an Issue](https://github.com/iamzythe/api-tester/issues/new?template=feature_request.md)

### Community

- **GitHub**: [github.com/iamzythe/api-tester](https://github.com/iamzythe/api-tester)
- **Twitter**: [@iamzythe](https://twitter.com/iamzythe) (if applicable)
- **Discord**: [Join our community](https://discord.gg/your-invite) (if applicable)

### Security

If you discover a security vulnerability, please email security@tester.zythe instead of opening a public issue.

---

<div align="center">

**Built with ❤️ using PHP Slim Framework and Tailwind CSS**

⭐ **Star this repository** if you find it helpful!

[☕ Support the project](https://github.com/sponsors/iamzythe) • [📖 Documentation](#-documentation) • [🚀 Live Demo](#-demo)

[⬆️ Back to Top](#api-tester)

</div>