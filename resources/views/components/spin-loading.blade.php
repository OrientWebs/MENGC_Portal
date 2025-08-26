  @props(['target' => ''])
  <span wire:loading wire:target="{{ $target }}" class="absolute right-2 top-2 text-gray-500 dark:text-gray-300">
      <i class="fa-solid fa-spinner animate-spin"></i>
  </span>
