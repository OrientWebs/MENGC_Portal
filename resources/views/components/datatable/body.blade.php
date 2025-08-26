@props(['function' => []])

<div x-data x-init="// run on initial page reveal
const run = () => {
    const box = $refs.tableBox;
    box.classList.remove('table-float-run');
    void box.offsetWidth; // reflow
    box.classList.add('table-float-run');
};
document.addEventListener('page:revealed', run);
// also run once on load
run();" class="shadow-md bg-white dark:bg-gray-800 rounded-lg ">

    <!-- Responsive wrapper -->
    <div class="overflow-visible">
        <table x-ref="tableBox" class="min-w-full text-sm text-left text-gray-600 dark:text-gray-300">
            <!-- Header Slot (thead) -->
            <thead class="bg-gray-100 dark:bg-gray-900 text-gray-700 dark:text-gray-300 uppercase">
                {{ $header }}
            </thead>

            <!-- Body Slot (tbody) -->
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800">
                {{ $body }}
            </tbody>
        </table>
    </div>

    <!-- Loading Overlay (for in-place table actions like pagination/search) -->
    <div wire:loading
        wire:target="search, gotoPage, previousPage, nextPage, filterDate, navigate, prePage, {{ implode(',', $function) }}"
        class="absolute inset-0 bg-white/70 dark:bg-gray-900/70 flex justify-center items-center z-10">
        <div class="flex flex-col items-center">
            <svg class="animate-spin h-8 w-8 text-primary-600" viewBox="0 0 24 24" fill="none">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.38 0 0 5.38 0 12h4z"></path>
            </svg>
            <span class="mt-2 text-gray-700 dark:text-gray-200 text-sm font-medium">Loading…</span>
        </div>
    </div>
</div>
