<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Source+Sans+Pro:wght@400;600&display=swap"
        rel="stylesheet">
    <style>
        .font-heading {
            font-family: 'Playfair Display', serif;
        }

        .font-body {
            font-family: 'Source Sans Pro', sans-serif;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out;
        }

        .animate-slide-up {
            animation: slideUp 0.6s ease-out;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="bg-white font-body min-h-screen flex flex-col">
    <div class="flex-1 flex items-center justify-center px-4 py-8" x-data="{
        searchQuery: '',
        showSearchResults: false,
        searchResults: [
            { title: 'Home Page', url: '/', description: 'Return to our homepage' },
            { title: 'About Us', url: '/about', description: 'Learn more about our company' },
            { title: 'Contact', url: '/contact', description: 'Get in touch with us' },
            { title: 'Services', url: '/services', description: 'Explore our services' }
        ],
        filteredResults() {
            if (!this.searchQuery) return [];
            return this.searchResults.filter(item =>
                item.title.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                item.description.toLowerCase().includes(this.searchQuery.toLowerCase())
            );
        },
        copyEmail() {
            navigator.clipboard.writeText('admin@example.com');
            this.$refs.copyButton.textContent = 'Copied!';
            setTimeout(() => {
                this.$refs.copyButton.textContent = 'Copy Email';
            }, 2000);
        }
    }">
        <div class="max-w-2xl mx-auto text-center">
            <!-- Animated Header -->
            <div class="animate-fade-in mb-8">
                <div class="text-gray-800 text-8xl font-heading font-bold mb-4 animate-float">
                    404
                </div>
                <h1 class="text-4xl font-heading font-bold text-gray-800 mb-4">
                    Oops! Page Not Found
                </h1>
                <p class="text-lg text-gray-600 mb-8">
                    The page you're looking for seems to have wandered off into the digital wilderness.
                    Don't worry, we'll help you find your way back!
                </p>
            </div>

            <!-- Illustration Area -->
            <div class="animate-slide-up mb-8">
                <div class="w-64 h-64 mx-auto mb-8 bg-slate-100 rounded-full flex items-center justify-center hover:bg-slate-200 transition-colors duration-300 cursor-pointer"
                    @mouseenter="$el.style.transform = 'scale(1.05)'" @mouseleave="$el.style.transform = 'scale(1)'">
                    <svg class="w-32 h-32 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                        </path>
                    </svg>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="animate-slide-up mb-8 relative">
                <div class="relative">
                    <input type="text" x-model="searchQuery" @input="showSearchResults = searchQuery.length > 0"
                        @focus="showSearchResults = searchQuery.length > 0"
                        @blur="setTimeout(() => showSearchResults = false, 200)" placeholder="Search for content..."
                        class="w-full px-6 py-4 text-lg border-2 border-slate-200 rounded-lg focus:border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-200 transition-all duration-300">
                    <svg class="absolute right-4 top-1/2 transform -translate-y-1/2 w-6 h-6 text-gray-400"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>

                <!-- Search Results Dropdown -->
                <div x-show="showSearchResults && filteredResults().length > 0"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    class="absolute top-full left-0 right-0 mt-2 bg-white border border-slate-200 rounded-lg shadow-lg z-10">
                    <template x-for="result in filteredResults()" :key="result.url">
                        <a :href="result.url"
                            class="block px-4 py-3 hover:bg-slate-50 border-b border-slate-100 last:border-b-0">
                            <div class="font-semibold text-gray-800" x-text="result.title"></div>
                            <div class="text-sm text-gray-600" x-text="result.description"></div>
                        </a>
                    </template>
                </div>
            </div>

            <!-- Navigation Options -->
            <div class="animate-slide-up mb-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <a href="/"
                        class="bg-purple-500 hover:bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        🏠 Home
                    </a>
                    <a href="/about"
                        class="bg-gray-800 hover:bg-gray-900 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        ℹ️ About Us
                    </a>
                    <a href="/contact"
                        class="bg-gray-800 hover:bg-gray-900 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        📞 Contact
                    </a>
                    <a href="/sitemap"
                        class="bg-gray-800 hover:bg-gray-900 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        🗺️ Site Map
                    </a>
                </div>
            </div>

            <!-- Help Section -->
            <div class="animate-slide-up bg-slate-50 rounded-lg p-6 mb-8">
                <h3 class="text-xl font-heading font-bold text-gray-800 mb-4">Need Help?</h3>
                <p class="text-gray-600 mb-4">
                    If you believe this is an error or you were expecting to find content here, please contact our
                    support team.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="mailto:admin@example.com"
                        class="text-purple-500 hover:text-purple-600 font-semibold transition-colors duration-300">
                        📧 admin@example.com
                    </a>
                    <button x-ref="copyButton" @click="copyEmail()"
                        class="bg-purple-100 hover:bg-purple-200 text-purple-700 px-4 py-2 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                        Copy Email
                    </button>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="animate-slide-up">
                <details class="bg-white border border-slate-200 rounded-lg overflow-hidden">
                    <summary
                        class="px-6 py-4 bg-slate-50 cursor-pointer hover:bg-slate-100 transition-colors duration-300 font-semibold text-gray-800">
                        🔍 What might have happened?
                    </summary>
                    <div class="px-6 py-4 text-left">
                        <ul class="space-y-2 text-gray-600">
                            <li>• The page URL might have been mistyped</li>
                            <li>• The page may have been moved or deleted</li>
                            <li>• The link you followed might be outdated</li>
                            <li>• You might not have permission to access this page</li>
                            <li>• There could be a temporary server issue</li>
                        </ul>
                    </div>
                </details>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-slate-100 py-6 mt-8">
        <div class="max-w-2xl mx-auto text-center px-4">
            <p class="text-gray-600 mb-4">Stay connected with us</p>
            <div class="flex justify-center space-x-6">
                <a href="#" class="text-gray-500 hover:text-purple-500 transition-colors duration-300">
                    <span class="sr-only">Twitter</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                        </path>
                    </svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-purple-500 transition-colors duration-300">
                    <span class="sr-only">LinkedIn</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z">
                        </path>
                    </svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-purple-500 transition-colors duration-300">
                    <span class="sr-only">GitHub</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z">
                        </path>
                    </svg>
                </a>
            </div>
            <p class="text-sm text-gray-500 mt-4">© 2025 OrientWebs. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
