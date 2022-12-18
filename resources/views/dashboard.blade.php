<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{--<x-jet-welcome />--}}
                    <div class="w-full lg:w-1/2 px-4 py-4 bg-white rounded-lg shadow-lg">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Recent Discussions</h2>
                        <div class="border-b border-gray-200 pb-4 mb-4">
                            <div class="flex items-center justify-between px-4 py-2">
                                <h3 class="text-lg font-bold text-gray-800">What are the best study habits?</h3>
                                <p class="text-sm text-gray-600">2 hours ago</p>
                            </div>
                            <p class="text-sm text-gray-800 px-4 py-2">I'm having trouble staying focused while studying and was wondering if anyone has any tips for developing good study habits?</p>
                        </div>
                        <div class="border-b border-gray-200 pb-4 mb-4">
                            <div class="flex items-center justify-between px-4 py-2">
                                <h3 class="text-lg font-bold text-gray-800">What are the best textbooks for biology?</h3>
                                <p class="text-sm text-gray-600">4 hours ago</p>
                            </div>
                            <p class="text-sm text-gray-800 px-4 py-2">I'm taking a biology course next semester and was wondering if anyone has any recommendations for good textbooks to use?</p>
                        </div>
                        <div class="border-b border-gray-200 pb-4 mb-4">
                            <div class="flex items-center justify-between px-4 py-2">
                                <h3 class="text-lg font-bold text-gray-800">How to handle online classes?</h3>
                                <p class="text-sm text-gray-600">6 hours ago</p>
                            </div>
                            <p class="text-sm text-gray-800 px-4 py-2">With the current pandemic, a lot of classes are being held online. Any tips for how to stay focused and motivated during online classes?</p>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 px-4 py-4 bg-white rounded-lg shadow-lg">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Upcoming Events</h2>
                        <div class="border-b border-gray-200 pb-4 mb-4">
                            <div class="flex items-center justify-between px-4 py-2">
                                <h3 class="text-lg font-bold text-gray-800">Career Fair</h3>
                                <p class="text-sm text-gray-600">Next week</p>
                            </div>
                            <p class="text-sm text-gray-800 px-4 py-2">There will be a career fair on campus next week with various companies in attendance. Be
                                sure to dress professionally and bring plenty of resumes!</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</x-app-layout>
