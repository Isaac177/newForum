@if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
@isset($user)
<button
        class="flex flex-col items-center text-sm transition border-2
        border-transparent rounded-full focus:outline-none
        focus:border-gray-400">
     {{--<img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />--}}
    <img {{$attributes->merge(['class' => 'object-cover w-16 h-16 rounded'])}}
            src="{{ $user->profile_photo_url }}"
            alt="{{ $user->name }}"/>
    <span class="mt-2 text-xs font-semibold text-gray-600">{{ $user->name }}</span>
</button>
    <span class="text-xs text-gray-500">{{$user->name()}}</span>
@else
<span class="inline-flex rounded">
    <button
            type="button"
            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4
            text-gray-400 transition bg-white border border-transparent rounded-md
            hover:text-gray-700 focus:outline-none">
        {{ Auth::user()->name() }}
    </button>
</span>
@endisset
@endif

