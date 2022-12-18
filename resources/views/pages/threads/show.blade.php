
{{--@livewire('reply.update', ['reply' => $reply])--}}

<x-guest-layout>
    <main class="grid grid-cols-4 gap-8 mt-8 wrapper">
        <x-partials.sidenav />
        <section class="flex flex-col col-span-3 gap-y-4">
            <x-alerts.main />
            <small class="text-sm text-gray-400">Thread->{{$category->name}}>{{$thread->title}}</small>

            <article class="p-5 bg-white shadow" style="background: #01365a; border-radius: 6px">
                <div class="grid grid-cols-8">

                    {{-- Avatar --}}
                    <div class="col-span-1 text-white">
                        <x-user.avatar :user="$thread->author()" />
                    </div>

                    {{-- Thread --}}
                    <div class="col-span-7 space-y-6">
                        <div class="space-y-3">
                            <h2 class="text-xl tracking-wide hover:text-blue-400 text-green-400">
                                {{ $thread->title() }}
                            </h2>
                            <div class="text-white">
                                {!! $thread->body() !!}
                            </div>
                        </div>

                        <div class="flex justify-between">

                            {{-- Likes --}}
                            <div class="flex space-x-5 text-white">
                                <livewire:like-thread :thread="$thread" />

                                <div class="flex items-center space-x-2">
                                    <x-heroicon-o-eye class="w-4 h-4 text-blue-400" />
                                    <span class="text-xs text-white">{{ views($thread)->count() }}</span>
                                </div>
                            </div>

                            {{-- Views --}}

                            {{-- Date Posted --}}
                            <div class="flex items-center text-xs text-white">
                                <x-heroicon-o-clock class="w-4 h-4 mr-1" />
                                Posted: {{ $thread->created_at->diffForHumans() }}
                            </div>


                            {{-- Reply --}}
                            <a href="" class="flex items-center space-x-2 text-white">
                                <x-heroicon-o-reply class="w-5 h-5" />
                                <span class="text-sm">Reply</span>
                            </a>
                        </div>
                    </div>
                </div>
            </article>
            <div class='mt-6 space-y-5'>
                <h2 class='text-xl font-bold'>Replies</h2>
                <hr>
                @foreach($thread->replies() as $reply)
                    @livewire('reply.update', ['reply' => $reply])
                    <livewire:reply.update :reply="$reply" :key="$reply->id()" />
                    <div
                        class="flex flex-col p-5 bg-white shadow"
                        wire:key="{{ $reply->id() }}"
                    >
                        <p class="text-gray-500">
                            {!! $reply->body !!}
                        </p>
                    </div>
                @endforeach
            </div>
            @auth
            <div class="p-5 space-y-4 shadow" style="background: #01365a; border-radius: 6px">
                <h2 class="text-gray-500">Post a reply</h2>
                <x-form action="{{route(
                    'replies.store', $thread->slug)}}" method="POST">
                    @csrf
                    <div>
                        <x-trix name="body" styling="bg-gray-100 shadow-inner h-40"/>
                        <x-form.error for="body" />
                        <input type="hidden" name="replyAble_id" value="{{ $thread->id }}">
                        <input type="hidden" name="replyAble_type" value="threads">
{{--                        <input name="text" type="text" />--}}
                    </div>

                    <div class="flex justify-end mt-4">
                        <x-buttons.primary class="justify-self-end">
                            {{ __('Reply') }}
                        </x-buttons.primary>
                    </div>
                </x-form>
            </div>
            @else
            <div class="p-5 space-y-4 shadow" style="background: #01365a; border-radius: 6px">
                <h2 class="text-white">Post a reply</h2>
                <p class="text-white">
                    Please
                    <a href="{{ route('login') }}" class="text-blue-400">sign in</a>
                    to post a reply.
                </p>
            </div>
            @endauth
        </section>
    </main>
</x-guest-layout>
