<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Internal Server Error</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --background: #ffffff;
            --foreground: #1f2937;
            --card: #f8fafc;
            --card-foreground: #1f2937;
            --primary: #374151;
            --primary-foreground: #ffffff;
            --secondary: #6366f1;
            --secondary-foreground: #ffffff;
            --muted: #f8fafc;
            --muted-foreground: #1f2937;
            --accent: #6366f1;
            --accent-foreground: #ffffff;
            --border: #e5e7eb;
            --ring: rgba(99, 102, 241, 0.5);
            --radius: 0.5rem;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--background);
            color: var(--foreground);
        }

        .server-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
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

        .status-indicator {
            animation: blink 1.5s linear infinite;
        }

        @keyframes blink {

            0%,
            50% {
                opacity: 1;
            }

            51%,
            100% {
                opacity: 0.3;
            }
        }

        .bg-primary {
            background-color: var(--primary);
        }

        .text-primary {
            color: var(--primary);
        }

        .bg-secondary {
            background-color: var(--secondary);
        }

        .text-secondary {
            color: var(--secondary);
        }

        .bg-accent {
            background-color: var(--accent);
        }

        .text-accent {
            color: var(--accent);
        }

        .bg-card {
            background-color: var(--card);
        }

        .text-card-foreground {
            color: var(--card-foreground);
        }

        .bg-muted {
            background-color: var(--muted);
        }

        .text-muted-foreground {
            color: var(--muted-foreground);
        }

        .border-border {
            border-color: var(--border);
        }

        .btn-primary {
            background-color: var(--primary);
            color: var(--primary-foreground);
            border-radius: var(--radius);
        }

        .btn-secondary {
            background-color: var(--secondary);
            color: var(--secondary-foreground);
            border-radius: var(--radius);
        }

        .btn-accent {
            background-color: var(--accent);
            color: var(--accent-foreground);
            border-radius: var(--radius);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">
    <div class="max-w-2xl mx-auto text-center" x-data="{
        showDetails: false,
        estimatedTime: 15,
        currentTime: new Date().toLocaleTimeString(),
        init() {
            setInterval(() => {
                this.currentTime = new Date().toLocaleTimeString();
                if (this.estimatedTime > 0) {
                    this.estimatedTime--;
                }
            }, 60000);
        }
    }">
        <!-- Server Icon with Animation -->
        <div class="mb-8 flex justify-center">
            <div class="relative">
                <svg class="w-24 h-24 text-primary server-pulse" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M4 2h16a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 8h16a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2zm0 8h16a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2z" />
                    <circle cx="6" cy="5" r="1" />
                    <circle cx="6" cy="13" r="1" />
                    <circle cx="6" cy="21" r="1" />
                </svg>
                <!-- Status indicator -->
                <div
                    class="absolute -top-2 -right-2 w-6 h-6 bg-yellow-500 rounded-full status-indicator flex items-center justify-center">
                    <div class="w-3 h-3 bg-white rounded-full"></div>
                </div>
            </div>
        </div>

        <!-- Main Error Message -->
        <div class="mb-8">
            <h1 class="text-4xl md:text-5xl font-bold text-primary mb-4 float-animation">
                Oops! Something went wrong
            </h1>
            <p class="text-lg text-muted-foreground mb-6 leading-relaxed">
                Our team is aware of the issue and is working to resolve it as quickly as possible.
                We apologize for any inconvenience this may cause.
            </p>
        </div>

        <!-- Status Update Section -->
        <div class="bg-card border border-border rounded-lg p-6 mb-8 shadow-sm">
            <div class="flex items-center justify-center mb-4">
                <div class="flex items-center space-x-2">
                    <div class="w-3 h-3 bg-yellow-500 rounded-full animate-pulse"></div>
                    <span class="text-sm font-medium text-card-foreground">System Status: Under Maintenance</span>
                </div>
            </div>

            <div class="text-sm text-muted-foreground mb-4">
                <p>Current time: <span x-text="currentTime" class="font-medium"></span></p>
                <p>Estimated resolution time: <span x-text="estimatedTime" class="font-medium text-accent"></span>
                    minutes</p>
            </div>

            <div class="w-full bg-muted rounded-full h-2 mb-4">
                <div class="bg-accent h-2 rounded-full animate-pulse" style="width: 65%"></div>
            </div>

            <p class="text-xs text-muted-foreground">
                Progress: Investigating and implementing fix...
            </p>
        </div>

        <!-- Helpful Alternatives -->
        <div class="mb-8">
            <h2 class="text-xl font-bold text-primary mb-6">What can you do in the meantime?</h2>
            <div class="grid md:grid-cols-3 gap-4">
                <a href="/"
                    class="btn-primary px-6 py-3 rounded-lg font-medium hover:opacity-90 transition-opacity duration-200 block">
                    Go to Homepage
                </a>
                <a href="/support"
                    class="btn-secondary px-6 py-3 rounded-lg font-medium hover:opacity-90 transition-opacity duration-200 block">
                    Contact Support
                </a>
                <a href="/status"
                    class="btn-accent px-6 py-3 rounded-lg font-medium hover:opacity-90 transition-opacity duration-200 block">
                    System Status
                </a>
            </div>
        </div>

        <!-- Additional Information -->
        <div class="mb-8">
            <button @click="showDetails = !showDetails"
                class="text-accent hover:text-secondary transition-colors duration-200 font-medium text-sm flex items-center mx-auto space-x-2">
                <span>Technical Details</span>
                <svg class="w-4 h-4 transform transition-transform duration-200"
                    :class="showDetails ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <div x-show="showDetails" x-transition class="mt-4 bg-muted rounded-lg p-4 text-left text-sm">
                <div class="space-y-2 text-muted-foreground">
                    <p><strong>Error Code:</strong> HTTP 500</p>
                    <p><strong>Timestamp:</strong> <span x-text="new Date().toISOString()"></span></p>
                    <p><strong>Server:</strong> Production Server #3</p>
                    <p><strong>Issue Type:</strong> Internal Server Error</p>
                    <p class="pt-2 border-t border-border">
                        <strong>What happened:</strong> Our server encountered an unexpected condition that prevented it
                        from fulfilling your request. This is typically a temporary issue that our engineering team
                        resolves quickly.
                    </p>
                </div>
            </div>
        </div>

        <!-- Footer Message -->
        <div class="text-center">
            <p class="text-muted-foreground text-sm mb-4">
                Thank you for your patience while we work to restore normal service.
            </p>
            <div class="flex justify-center space-x-6 text-xs text-muted-foreground">
                <a href="/contact" class="hover:text-accent transition-colors duration-200">Contact Us</a>
                <a href="" class="hover:text-accent transition-colors duration-200">@OrientWebs</a>
                <a href="/help" class="hover:text-accent transition-colors duration-200">Help Center</a>
            </div>
        </div>
    </div>
</body>

</html>
