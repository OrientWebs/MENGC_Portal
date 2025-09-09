<div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">PE လက်မှတ်အမျိုးအစားအလိုက် လျှောက်လွှာများ
        လက်ခံဆောင်ရွက်ခြင်း</h2>

    <div
        class="h-48 overflow-y-auto border p-4 rounded bg-gray-50 dark:bg-gray-900 text-sm text-gray-700 dark:text-gray-300">
        @foreach ($terms as $term)
            <p class="whitespace-pre-line">
                {{ $term->description }}
            </p>
        @endforeach
    </div>

    <div class="flex items-start justify-between mt-6">
        <div class="flex items-center">
            <input id="accepted" type="checkbox" wire:model.live="accepted"
                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
            <label for="accepted" class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                I accept the terms and conditions
            </label>
        </div>

        <a href="{{ asset('terms.pdf') }}" target="_blank"
            class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline dark:text-blue-400">
            📄 View Full Terms (PDF)
        </a>
    </div>

    {{-- Term and Conditions PDF file --}}

    <button wire:click="proceed"
        class="mt-6 w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition disabled:opacity-50"
        @disabled(!$accepted)>
        Proceed to Registration
    </button>
</div>
