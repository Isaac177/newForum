<div>
    <div class="overflow-hidden border-b border-gray-200">
        @if(!$notifications->isEmpty())
        <table class="min-w-full">
            <thead class="bg-blue-500">
            <tr>
                <x-table.head>Message</x-table.head>
                <x-table.head>Date</x-table.head>
                <x-table.head class="text-center">Action</x-table.head>
            </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 divide-solid">
            @foreach($notifications as $notification)
                <tr>
                    <x-table.data>
                        <div>
                            <a href="{{ route('replies.replyAble', [$notification->data['replyAble_id'],
                                $notification->data['replyAble_type']]) }}">
                                {{ $notification->data['message'] }}
                                {{$notification->data['replyAble_subject']}}
                            </a>
                        </div>
                    </x-table.data>
                    <x-table.data>
                        <div>
                            {{$notification->created_at->diffForHumans()}}
                        </div>
                    </x-table.data>
                    <x-table.data>
                        <button wire:click="markAsRead('{{-$notification->id}}')">
                            {{__('Mark as read')}}
                        </button>
                    </x-table.data>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <div class="p-4 text-center text-gray-500">
                No notifications found.
            </div>
        @endif
    </div>
</div>
