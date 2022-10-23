<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Categories: Create') }}
        </h2>
    </x-slot>

    <section class="mx-6">
        <div class="p-8">
            <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="space-y-8">
                    <div>
                        <label for="name" value="{{ __('Name') }}" >Name</label>
                        <input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus />
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Image:</strong>
                                <input type="file" name="image" class="form-control" placeholder="image">
                            </div>
                        </div>
                        <x-form.error for="name" />
                    </div>
                    <x-buttons.primary>
                        {{ __('Create') }}
                    </x-buttons.primary>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
