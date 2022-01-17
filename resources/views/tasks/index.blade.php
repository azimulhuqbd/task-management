<x-layout>
    <x-section class="mt-8">
        <a href="{{ route('create_task') }}" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
            {{ __('Add New Task') }}
        </a>

        <table class="mt-8 border-collapse table-auto w-full">
            <thead class="bg-slate-200">
            <tr>
                <th class="border border-slate-300 p-3">{{ __('Name') }}</th>
                <th class="border border-slate-300 p-3">{{ __('Details') }}</th>
                <th class="border border-slate-300 p-3">{{ __('Category') }}</th>
                <th class="border border-slate-300 p-3">{{ __('Deadline') }}</th>
                <th class="border border-slate-300 p-3">{{ __('Status') }}</th>
                <th class="border border-slate-300 p-3">{{ __('Action') }}</th>
            </tr>
            </thead>
            <tbody>
            @if(!$tasks->isEmpty())
                @foreach($tasks as $task)
                    <tr>
                        <td class="border border-slate-300 p-3 text-center">{{ $task->name }}</td>
                        <td class="border border-slate-300 p-3 text-center">{{ $task->details }}</td>
                        <td class="border border-slate-300 p-3 text-center">{{ $task->category->name }}</td>
                        <td class="border border-slate-300 p-3 text-center">{{ $task->deadline }}</td>
                        <td class="border border-slate-300 p-3 text-center">{{ \App\Enums\TaskStatus::getDescription($task->status) }}</td>
                        <td class="flex justify-center border-r border-b border-slate-300 p-3">
                            <a href="/tasks/{{ $task->id }}/edit" class="bg-orange-400 text-white rounded py-2 px-4 hover:bg-orange-500">
                                {{ __('Edit') }}
                            </a>
                            <x-form method="DELETE" action="/tasks/{{ $task->id }}" onsubmit="return confirm('Do you really want to delete this category?');">
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
