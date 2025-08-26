<div class="rounded-lg shadow-lg bg-white dark:bg-gray-800">
    <!-- Search and Filters -->
    <div>
        <x-datatable.header>
            {{ $tableHeader ?? '' }}
        </x-datatable.header>
    </div>

    <!-- Datatable -->
    <div class="relative">
        {{ $tableBody }}
    </div>
</div>
