<div class="space-y-6">
    @hasrole('Admin')
        @include('dashboard.admin')
    @endhasrole

    @hasrole('User')
        @include('dashboard.user')
    @endhasrole


    <!-- Recent Activity -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Recent Activity</h2>
        <div class="space-y-4">
            <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                <span class="text-gray-700 dark:text-gray-300">New user registered</span>
                <span class="ml-auto text-sm text-gray-500 dark:text-gray-400">2 minutes ago</span>
            </div>
            <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                <span class="text-gray-700 dark:text-gray-300">Product updated</span>
                <span class="ml-auto text-sm text-gray-500 dark:text-gray-400">5 minutes ago</span>
            </div>
            <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                <div class="w-2 h-2 bg-yellow-500 rounded-full mr-3"></div>
                <span class="text-gray-700 dark:text-gray-300">New order received</span>
                <span class="ml-auto text-sm text-gray-500 dark:text-gray-400">10 minutes ago</span>
            </div>
        </div>
    </div>
</div>
