<div class="space-y-2">
    @forelse($items as $item)
        <div class="flex items-center justify-between rounded-lg bg-gray-50 p-3 dark:bg-gray-900">
            <span class="font-medium text-gray-700 dark:text-gray-300">
                {{ $item['dataElement'] ?? 'N/A' }}
            </span>
            <span class="rounded-full bg-blue-100 px-3 py-1 text-sm font-semibold text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                {{ $item['value'] ?? '-' }}
            </span>
        </div>
    @empty
        <p class="text-gray-500 dark:text-gray-400">Aucune donnée</p>
    @endforelse
</div>
