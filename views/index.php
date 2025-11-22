<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Tester - Professional API Testing Tool</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        'mono': ['JetBrains Mono', 'Fira Code', 'monospace'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .code-block {
            font-family: 'JetBrains Mono', 'Fira Code', monospace;
            font-size: 0.875rem;
            line-height: 1.5;
        }
    </style>
</head>
<body class="font-sans bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen transition-colors">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h1 class="text-xl font-semibold text-gray-900 dark:text-white">API Tester</h1>
                    </div>
                    <button id="themeToggle" class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                        <svg id="sunIcon" class="w-5 h-5 hidden text-gray-600 dark:text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd" />
                        </svg>
                        <svg id="moonIcon" class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                        </svg>
                    </button>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Request Panel -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h2 class="text-lg font-semibold mb-6 text-gray-900 dark:text-white flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                        Request Configuration
                    </h2>

                    <form id="apiForm" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="md:col-span-2 relative">
                                <label for="url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">API Endpoint URL</label>
                                <div class="relative">
                                    <input type="text" id="url" class="w-full px-3 py-2 pr-10 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" placeholder="https://api.example.com/v1/users" required>
                                    <button id="historyToggle" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div id="historyDropdown" class="absolute z-10 w-full mt-1 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-lg hidden max-h-60 overflow-y-auto">
                                    <div id="historyList" class="py-1">
                                        <!-- History items will be populated here -->
                                    </div>
                                    <div class="border-t border-gray-200 dark:border-gray-600 px-3 py-2">
                                        <button id="clearHistory" class="text-sm text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">Clear History</button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="method" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Method</label>
                                <select id="method" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                    <option value="GET">GET</option>
                                    <option value="POST">POST</option>
                                    <option value="PUT">PUT</option>
                                    <option value="DELETE">DELETE</option>
                                    <option value="PATCH">PATCH</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="headers" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Headers (JSON)</label>
                            <textarea id="headers" rows="4" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 font-mono text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" placeholder='{"Authorization": "Bearer token", "Content-Type": "application/json"}'></textarea>
                        </div>

                        <div>
                            <label for="body" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Request Body (for POST/PUT/PATCH)</label>
                            <textarea id="body" rows="6" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 font-mono text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" placeholder='{"name": "John Doe", "email": "john@example.com"}'></textarea>
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 transform hover:scale-105 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-lg">
                            <span id="sendButtonText">Send Request</span>
                            <svg id="loadingSpinner" class="w-5 h-5 inline ml-2 animate-spin hidden" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Response Panel -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h2 class="text-lg font-semibold mb-6 text-gray-900 dark:text-white flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Response
                    </h2>

                    <div id="response" class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-600 rounded-lg p-4 min-h-[400px] code-block text-gray-800 dark:text-gray-200 overflow-auto">
                        <div class="text-gray-500 dark:text-gray-400 italic">Response will appear here...</div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Theme toggle functionality
        const themeToggle = document.getElementById('themeToggle');
        const sunIcon = document.getElementById('sunIcon');
        const moonIcon = document.getElementById('moonIcon');
        const html = document.documentElement;

        // Function to set cookie
        function setCookie(name, value, days) {
            const d = new Date();
            d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
            document.cookie = name + "=" + value + ";expires=" + d.toUTCString() + ";path=/";
        }

        // Function to get cookie
        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }

        // Load theme from cookie
        const savedTheme = getCookie('theme');
        if (savedTheme === 'dark') {
            html.classList.add('dark');
            sunIcon.classList.remove('hidden');
            moonIcon.classList.add('hidden');
        } else {
            html.classList.remove('dark');
            sunIcon.classList.add('hidden');
            moonIcon.classList.remove('hidden');
        }

        // Toggle theme
        themeToggle.addEventListener('click', () => {
            const isDark = html.classList.toggle('dark');
            if (isDark) {
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
                setCookie('theme', 'dark', 3650); // 10 years
            } else {
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
                setCookie('theme', 'light', 3650);
            }
        });

        // URL History functionality
        const urlInput = document.getElementById('url');
        const historyToggle = document.getElementById('historyToggle');
        const historyDropdown = document.getElementById('historyDropdown');
        const historyList = document.getElementById('historyList');
        const clearHistoryBtn = document.getElementById('clearHistory');

        // Get URL history from localStorage
        function getUrlHistory() {
            const history = localStorage.getItem('apiUrlHistory');
            return history ? JSON.parse(history) : [];
        }

        // Save URL history to localStorage
        function saveUrlHistory(history) {
            localStorage.setItem('apiUrlHistory', JSON.stringify(history));
        }

        // Add URL to history
        function addUrlToHistory(url) {
            if (!url.trim()) return;

            let history = getUrlHistory();
            // Remove if already exists
            history = history.filter(item => item !== url);
            // Add to beginning
            history.unshift(url);
            // Keep only last 20 items
            history = history.slice(0, 20);
            saveUrlHistory(history);
            renderHistoryDropdown();
        }

        // Render history dropdown
        function renderHistoryDropdown() {
            const history = getUrlHistory();
            historyList.innerHTML = '';

            if (history.length === 0) {
                historyList.innerHTML = '<div class="px-3 py-2 text-sm text-gray-500 dark:text-gray-400">No history yet</div>';
                return;
            }

            history.forEach(url => {
                const item = document.createElement('button');
                item.className = 'w-full px-3 py-2 text-left text-sm hover:bg-gray-100 dark:hover:bg-gray-600 text-gray-900 dark:text-gray-100 truncate';
                item.textContent = url;
                item.addEventListener('click', () => {
                    urlInput.value = url;
                    historyDropdown.classList.add('hidden');
                    urlInput.focus();
                });
                historyList.appendChild(item);
            });
        }

        // Toggle history dropdown
        historyToggle.addEventListener('click', (e) => {
            e.preventDefault();
            historyDropdown.classList.toggle('hidden');
            if (!historyDropdown.classList.contains('hidden')) {
                renderHistoryDropdown();
            }
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!historyToggle.contains(e.target) && !historyDropdown.contains(e.target)) {
                historyDropdown.classList.add('hidden');
            }
        });

        // Clear history
        clearHistoryBtn.addEventListener('click', () => {
            localStorage.removeItem('apiUrlHistory');
            renderHistoryDropdown();
        });

        // API form functionality
        document.getElementById('apiForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const url = document.getElementById('url').value;
            const method = document.getElementById('method').value;
            const headersText = document.getElementById('headers').value;
            const bodyText = document.getElementById('body').value;
            const sendButtonText = document.getElementById('sendButtonText');
            const loadingSpinner = document.getElementById('loadingSpinner');

            // Add URL to history
            addUrlToHistory(url);

            let headers = {};
            if (headersText) {
                try {
                    headers = JSON.parse(headersText);
                } catch (err) {
                    alert('Invalid JSON in headers');
                    return;
                }
            }

            let body = null;
            if (bodyText && ['POST', 'PUT', 'PATCH'].includes(method)) {
                body = bodyText;
            }

            const responseDiv = document.getElementById('response');
            responseDiv.innerHTML = '<div class="text-blue-600 dark:text-blue-400">Sending request...</div>';
            sendButtonText.textContent = 'Sending...';
            loadingSpinner.classList.remove('hidden');

            try {
                let requestUrl = url;

                // Use proxy for local API requests to avoid CORS
                if (url.startsWith('http://127.0.0.1:19082/')) {
                    requestUrl = '/proxy' + url.replace('http://127.0.0.1:19082', '');
                } else if (url.startsWith('http://localhost:19082/')) {
                    requestUrl = '/proxy' + url.replace('http://localhost:19082', '');
                }

                const response = await fetch(requestUrl, {
                    method: method,
                    headers: headers,
                    body: body
                });

                const responseText = await response.text();
                let formattedResponse = `HTTP ${response.status} ${response.statusText}\n\n`;

                // Try to format JSON
                try {
                    const jsonData = JSON.parse(responseText);
                    formattedResponse += JSON.stringify(jsonData, null, 2);
                } catch {
                    formattedResponse += responseText;
                }

                responseDiv.innerHTML = `<pre class="whitespace-pre-wrap break-words">${formattedResponse}</pre>`;
            } catch (error) {
                responseDiv.innerHTML = `<div class="text-red-600 dark:text-red-400">Error: ${error.message}</div>`;
            } finally {
                sendButtonText.textContent = 'Send Request';
                loadingSpinner.classList.add('hidden');
            }
        });
    </script>
</body>
</html>