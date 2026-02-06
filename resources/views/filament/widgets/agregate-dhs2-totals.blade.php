<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    @foreach($totals as $key => $value)
        <div class="rounded-lg bg-white p-4 shadow">
            <div class="text-sm text-gray-500">{{ $key }}</div>
            <div class="mt-2 text-2xl font-semibold">{{ number_format($value) }}</div>
        </div>
    @endforeach
</div>
