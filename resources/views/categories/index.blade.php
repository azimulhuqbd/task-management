<x-layout>
    <x-section class="mt-8">
        <a href="{{ route('create_category') }}" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
            {{ __('Add New Category') }}
        </a>

        <table class="mt-8 border-collapse table-auto w-full">
            <thead class="bg-slate-200">
                <tr>
                    <th class="border border-slate-300 p-3">Name</th>
                    <th class="border border-slate-300 p-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(!$category_list->isEmpty())
                    @foreach($category_list as $category)
                        <tr>
                            <td class="border border-slate-300 p-3 text-center">{{ $category->name }}</td>
                            <td class="flex justify-center border-r border-b border-slate-300 p-3">
                                <a href="/categories/{{ $category->id }}/edit" class="bg-orange-400 text-white rounded py-2 px-4 hover:bg-orange-500">
                                    {{ __('Edit') }}
                                </a>
                                <x-form method="DELETE" action="/categories/{{ $category->id }}" onsubmit="return confirm('Do you really want to delete this category?');">
                                    <button type="submit" class="ml-2 bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500">
                                        {{ __('Delete') }}
                                    </button>
                                </x-form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border border-slate-300">
                        <td class="p-3 col-span-2 text-center">
                            {{ __('Ops!!! There is nothing to show here.') }}
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </x-section>
</x-layout>
