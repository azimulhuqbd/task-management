<x-layout>
    <x-section>
        <x-form method="POST" action="{{ route('save_category') }}">
            <h3 class="mb-6 bg-gray-200 border-b border-gray-100 p-2">{{ __('Add New Category') }}</h3>
            <div class="mb-6">
                <label for="category" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Category Name:') }}</label>
                <input type="text" id="category" name="category_name" class="border border-gray-200 p-2 w-full" value="{{ old('category_name') }}" placeholder="{{ __('Enter Category Name') }}">
            </div>
            <div class="mb-6">
                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                    {{ __('Submit') }}
                </button>
            </div>
        </x-form>
        @if ($errors->any())
            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </x-section>
</x-layout>
