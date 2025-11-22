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
            <!-- Saved Requests Section -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-8">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                        <svg class="w-5 h-5 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        Saved Requests
                    </h2>
                    <button id="toggleSavedRequests" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">
                        <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <div id="savedRequestsContainer" class="hidden">
                    <div id="savedRequestsList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Saved requests will be populated here -->
                    </div>
                    <div id="noSavedRequests" class="text-center py-8 text-gray-500 dark:text-gray-400">
                        <svg class="w-12 h-12 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        No saved requests yet. Save your first request to get started!
                    </div>
                </div>
            </div>

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
                            <div class="flex items-center justify-between mb-2">
                                <label for="body" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Request (for POST/PUT/PATCH)</label>
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Query</span>
                                    <button id="bodyModeToggle" type="button" class="relative inline-flex h-6 w-11 items-center rounded-full bg-gray-200 dark:bg-gray-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                        <span id="bodyModeToggleKnob" class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-1"></span>
                                    </button>
                                </div>
                            </div>
                            <textarea id="body" rows="6" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 font-mono text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" placeholder='{"name": "John Doe", "email": "john@example.com"}'></textarea>
                            <p id="bodyHelpText" class="mt-1 text-sm text-gray-500 dark:text-gray-400">Enter JSON data to send in the request body</p>
                        </div>

                        <div class="flex space-x-4">
                            <button type="submit" class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 transform hover:scale-105 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-lg">
                                <span id="sendButtonText">Send Request</span>
                                <svg id="loadingSpinner" class="w-5 h-5 inline ml-2 animate-spin hidden" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </button>
                            <button type="button" id="saveRequestBtn" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 shadow-lg">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                </svg>
                                Save Request
                            </button>
                        </div>
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

        // Body Mode Toggle functionality
        const bodyModeToggle = document.getElementById('bodyModeToggle');
        const bodyModeToggleKnob = document.getElementById('bodyModeToggleKnob');
        const bodyTextarea = document.getElementById('body');
        const bodyHelpText = document.getElementById('bodyHelpText');
        let isUrlParamsMode = false;

        // Saved Requests functionality
        const saveRequestBtn = document.getElementById('saveRequestBtn');
        const toggleSavedRequests = document.getElementById('toggleSavedRequests');
        const savedRequestsContainer = document.getElementById('savedRequestsContainer');
        const savedRequestsList = document.getElementById('savedRequestsList');
        const noSavedRequests = document.getElementById('noSavedRequests');

        // Function to get saved requests from localStorage
        function getSavedRequests() {
            const requests = localStorage.getItem('savedRequests');
            return requests ? JSON.parse(requests) : [];
        }

        // Function to save requests to localStorage
        function saveRequestsToStorage(requests) {
            localStorage.setItem('savedRequests', JSON.stringify(requests));
        }

        // Function to render saved requests
        function renderSavedRequests() {
            const requests = getSavedRequests();
            savedRequestsList.innerHTML = '';

            if (requests.length === 0) {
                noSavedRequests.classList.remove('hidden');
                savedRequestsList.classList.add('hidden');
                return;
            }

            noSavedRequests.classList.add('hidden');
            savedRequestsList.classList.remove('hidden');

            requests.forEach((request, index) => {
                const requestCard = document.createElement('div');
                requestCard.className = 'bg-gray-50 dark:bg-gray-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600 hover:shadow-md transition-shadow';

                const methodColor = {
                    'GET': 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
                    'POST': 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
                    'PUT': 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
                    'DELETE': 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
                    'PATCH': 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200'
                };

                requestCard.innerHTML = `
                    <div class="flex items-start justify-between mb-2">
                        <h3 class="font-medium text-gray-900 dark:text-white truncate flex-1 mr-2" title="${request.name}">${request.name}</h3>
                        <button class="delete-request text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 p-1" data-index="${index}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="px-2 py-1 text-xs font-medium rounded ${methodColor[request.method] || 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200'}">${request.method}</span>
                        <span class="text-sm text-gray-600 dark:text-gray-400 truncate" title="${request.url}">${request.url}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-500 dark:text-gray-400">${new Date(request.timestamp).toLocaleString()}</span>
                        <button class="load-request px-3 py-1 text-sm bg-blue-500 hover:bg-blue-600 text-white rounded transition-colors" data-index="${index}">Load</button>
                    </div>
                `;

                savedRequestsList.appendChild(requestCard);
            });

            // Add event listeners for delete and load buttons
            document.querySelectorAll('.delete-request').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const index = parseInt(btn.dataset.index);
                    deleteSavedRequest(index);
                });
            });

            document.querySelectorAll('.load-request').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const index = parseInt(btn.dataset.index);
                    loadSavedRequest(index);
                });
            });
        }

        // Function to save current request
        function saveCurrentRequest() {
            const url = urlInput.value.trim();
            if (!url) {
                alert('Please enter a URL before saving.');
                return;
            }

            const requestName = prompt('Enter a name for this request:');
            if (!requestName || !requestName.trim()) {
                return;
            }

            const requestData = {
                name: requestName.trim(),
                url: url,
                method: document.getElementById('method').value,
                headers: document.getElementById('headers').value,
                body: document.getElementById('body').value,
                isUrlParamsMode: isUrlParamsMode,
                timestamp: new Date().toISOString()
            };

            const requests = getSavedRequests();
            requests.unshift(requestData); // Add to beginning
            saveRequestsToStorage(requests);
            renderSavedRequests();

            // Show success message
            alert(`Request "${requestName}" saved successfully!`);
        }

        // Function to delete a saved request
        function deleteSavedRequest(index) {
            if (confirm('Are you sure you want to delete this saved request?')) {
                const requests = getSavedRequests();
                requests.splice(index, 1);
                saveRequestsToStorage(requests);
                renderSavedRequests();
            }
        }

        // Function to load a saved request
        function loadSavedRequest(index) {
            const requests = getSavedRequests();
            const request = requests[index];

            if (request) {
                urlInput.value = request.url;
                document.getElementById('method').value = request.method;
                document.getElementById('headers').value = request.headers;
                document.getElementById('body').value = request.body;
                isUrlParamsMode = request.isUrlParamsMode || false;
                updateBodyModeUI();

                // Scroll to the form
                document.getElementById('apiForm').scrollIntoView({ behavior: 'smooth' });
            }
        }

        // Event listeners
        saveRequestBtn.addEventListener('click', saveCurrentRequest);
        toggleSavedRequests.addEventListener('click', () => {
            const isHidden = savedRequestsContainer.classList.contains('hidden');
            savedRequestsContainer.classList.toggle('hidden');
            toggleSavedRequests.querySelector('svg').style.transform = isHidden ? 'rotate(180deg)' : 'rotate(0deg)';
        });

        // Initialize saved requests display
        renderSavedRequests();

        // Function to update body mode UI
        function updateBodyModeUI() {
            if (isUrlParamsMode) {
                bodyModeToggle.classList.add('bg-blue-500');
                bodyModeToggle.classList.remove('bg-gray-200', 'dark:bg-gray-700');
                bodyModeToggleKnob.classList.add('translate-x-6');
                bodyModeToggleKnob.classList.remove('translate-x-1');
                bodyTextarea.placeholder = '{"userId": 123, "action": "view"}';
                bodyHelpText.textContent = 'Enter JSON data to append as URL query parameters';
            } else {
                bodyModeToggle.classList.remove('bg-blue-500');
                bodyModeToggle.classList.add('bg-gray-200', 'dark:bg-gray-700');
                bodyModeToggleKnob.classList.remove('translate-x-6');
                bodyModeToggleKnob.classList.add('translate-x-1');
                bodyTextarea.placeholder = '{"name": "John Doe", "email": "john@example.com"}';
                bodyHelpText.textContent = 'Enter JSON data to send in the request body';
            }
        }

        // Toggle body mode
        bodyModeToggle.addEventListener('click', () => {
            isUrlParamsMode = !isUrlParamsMode;
            updateBodyModeUI();
        });

        // Initialize body mode UI
        updateBodyModeUI();

        // API form functionality
        document.getElementById('apiForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const url = document.getElementById('url').value;
            const method = document.getElementById('method').value;
            const headersText = document.getElementById('headers').value;
            const bodyText = document.getElementById('body').value;
            const sendButtonText = document.getElementById('sendButtonText');
            const loadingSpinner = document.getElementById('loadingSpinner');

            let requestUrl = url;
            let requestBody = null;
            let queryParams = {};

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

            // Handle body/URL params mode
            if (bodyText) {
                try {
                    const bodyData = JSON.parse(bodyText);

                    if (isUrlParamsMode) {
                        // Convert JSON to query parameters
                        queryParams = bodyData;
                    } else if (['POST', 'PUT', 'PATCH'].includes(method)) {
                        // Send as request body
                        requestBody = bodyText;
                    }
                } catch (err) {
                    alert('Invalid JSON in body/params');
                    return;
                }
            }

            // Build URL with query parameters if in URL params mode
            if (isUrlParamsMode && Object.keys(queryParams).length > 0) {
                const urlObj = new URL(requestUrl);
                Object.keys(queryParams).forEach(key => {
                    urlObj.searchParams.append(key, queryParams[key]);
                });
                requestUrl = urlObj.toString();
            }

            const responseDiv = document.getElementById('response');
            responseDiv.innerHTML = '<div class="text-blue-600 dark:text-blue-400">Sending request...</div>';
            sendButtonText.textContent = 'Sending...';
            loadingSpinner.classList.remove('hidden');

            try {
                // Use proxy for local API requests to avoid CORS
                if (requestUrl.startsWith('http://127.0.0.1:19082/')) {
                    requestUrl = '/proxy' + requestUrl.replace('http://127.0.0.1:19082', '');
                } else if (requestUrl.startsWith('http://localhost:19082/')) {
                    requestUrl = '/proxy' + requestUrl.replace('http://localhost:19082', '');
                }

                const response = await fetch(requestUrl, {
                    method: method,
                    headers: headers,
                    body: requestBody
                });

                const responseText = await response.text();
                let formattedResponse = `HTTP ${response.status} ${response.statusText}\n\n`;

                // Show the final URL used (especially useful for URL params mode)
                if (isUrlParamsMode && Object.keys(queryParams).length > 0) {
                    formattedResponse += `Final URL: ${requestUrl}\n\n`;
                }

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