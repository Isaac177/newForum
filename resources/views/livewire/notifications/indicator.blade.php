
<a href="#" class="relative w-8">
    @if($hasNotifications)
    <div class="relative flex items-center justify-center w-6 h-6">
        <span class="absolute inline-flex w-full h-full bg-blue-400 rounded-full opacity-75 animate-ping"> </span>
            <span class="relative inline-flew w-4 h-4 text-blue-400 rounded-full">
                <x-zondicon-notifications-outline />
            </span>
    </div>

    <span class="absolute inline-flex items-center
    justify-center w-3 h-3 text-xs font-bold text-white bg-red-500 rounded-full -top-1 -right-1">
        <livewire:notifications.count />
    </span>
    @else
    <div class="relative flex items-center justify-center w-6 h-6">
        <span class="absolute inline-flex items-center
            justify-center w-3 h-3 text-xs font-bold text-white bg-red-500 rounded-full -top-1 -right-1">
        <livewire:notifications.count />
        </span>
        <span class="relative inline-flew w-4 h-4 text-blue-400 rounded-full">
            <x-zondicon-notifications-outline />
        </span>
    </div>
    @endif
</a>

