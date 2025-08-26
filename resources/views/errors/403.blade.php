<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Access Forbidden</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&family=Open+Sans:wght@400;500&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'heading': ['Work Sans', 'sans-serif'],
                        'body': ['Open Sans', 'sans-serif'],
                    },
                    colors: {
                        primary: '#374151',
                        accent: '#6366f1',
                        'gray-50': '#f9fafb',
                        'gray-100': '#f3f4f6',
                        'gray-600': '#4b5563',
                        'gray-800': '#1f2937',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 font-body min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full" x-data="{
        showDetails: false,
        copied: false,
        copyEmail() {
            navigator.clipboard.writeText('admin@company.com');
            this.copied = true;
            setTimeout(() => this.copied = false, 2000);
        }
    }">
        <!-- Main Error Card -->
        <div
            class="bg-white rounded-2xl shadow-lg p-8 text-center transform transition-all duration-300 hover:shadow-xl">
            <!-- Error Icon -->
            <div
                class="mx-auto w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mb-6 transform transition-transform duration-300 hover:scale-110">
                <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m0 0v2m0-2h2m-2 0H10m2-5V9m0 0V7m0 2h2m-2 0H10M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
            </div>

            <!-- Error Code -->
            <h1 class="font-heading font-bold text-6xl text-primary mb-2 tracking-tight">403</h1>

            <!-- Error Title -->
            <h2 class="font-heading font-semibold text-2xl text-gray-800 mb-4">Access Forbidden</h2>

            <!-- Error Description -->
            <p class="text-gray-600 mb-6 leading-relaxed">
                You don't have permission to access this resource. This could be due to insufficient privileges or
                restricted content.
            </p>

            <!-- Action Buttons -->
            <div class="space-y-3">
                <!-- Primary Action -->
                <button @click="copyEmail()"
                    class="w-full bg-accent hover:bg-indigo-700 text-white font-medium py-3 px-6 rounded-lg transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-accent focus:ring-offset-2"
                    :class="{ 'bg-green-600 hover:bg-green-700': copied }">
                    <span x-show="!copied" class="flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        Contact Administrator
                    </span>
                    <span x-show="copied" class="flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Email Copied!
                    </span>
                </button>

                <!-- Secondary Action -->
                <button onclick="history.back()"
                    class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-3 px-6 rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">
                    Go Back
                </button>

                <!-- Toggle Details -->
                <button @click="showDetails = !showDetails"
                    class="text-accent hover:text-indigo-700 font-medium text-sm transition-colors duration-200 focus:outline-none">
                    <span x-text="showDetails ? 'Hide Details' : 'Show Details'"></span>
                </button>
            </div>
        </div>

        <!-- Details Panel -->
        <div x-show="showDetails" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-4"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform translate-y-4" class="mt-4 bg-white rounded-xl shadow-md p-6">
            <h3 class="font-heading font-semibold text-lg text-gray-800 mb-3">Possible Reasons:</h3>
            <ul class="text-gray-600 space-y-2 text-sm">
                <li class="flex items-start gap-2">
                    <span class="text-accent mt-1">•</span>
                    <span>You are not logged in or your session has expired</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-accent mt-1">•</span>
                    <span>Your account doesn't have sufficient privileges</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-accent mt-1">•</span>
                    <span>The resource is restricted to certain user groups</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-accent mt-1">•</span>
                    <span>IP address or location-based restrictions apply</span>
                </li>
            </ul>

            <div class="mt-4 pt-4 border-t border-gray-100">
                <p class="text-xs text-gray-500">
                    <strong>Need help?</strong> Contact our administrator at
                    <span class="text-accent font-medium">admin@company.com</span>
                    or call <span class="text-accent font-medium">(555) 123-4567</span>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
