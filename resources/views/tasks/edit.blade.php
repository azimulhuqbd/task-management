<x-layout>
    <x-section>
        <x-form method="PUT" action="/tasks/{{ $task->id }}">
            <h3 class="mb-6 bg-gray-200 border-b border-gray-100 p-2">{{ __('Edit Task') }}</h3>
            <div class="mb-3">
                <label for="task_name" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Task Name:') }}</label>
                <input type="text" id="task_name" name="task_name" class="border border-gray-200 p-2 w-full" value="{{ $task->name }}" placeholder="{{ __('Enter Task Name') }}">
            </div>
            <div class="mb-3">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="task_category">
                    {{ __('Task Category:') }}
                </label>
                <div class="relative">
                    <select id="task_category" name="task_category" class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="">{{ __('*--- Select A Category ---*') }}</option>
                        @foreach($categories_list as $category)
                            <option value="{{ $category->id }}" {{ $task->category_id==$category->id ? 'selected': '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="task_details" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Task Details:') }}</label>
                <textarea name="task_details" id="task_details" cols="30" rows="5" class="border border-gray-200 p-2 w-full" placeholder="{{ __('Enter Task Details') }}">{{ $task->details }}</textarea>
            </div>
            <div class="mb-3">
                <label for="task_deadline" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Task Deadline:') }}</label>
                <input type="date" id="task_deadline" name="task_deadline" class="border border-gray-200 p-2 w-56" value="{{ $task->deadline }}">
            </div>
            <div class="mb-5">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="task_status">
                    {{ __('Task Status:') }}
                </label>
                <div class="relative">
                    <select name="task_status" id="task_status" class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="">{{ __('*--- Select A Status ---*') }}</option>
                        @foreach($task_status as $key => $status)
                            <option value="{{ $key }}" {{ $task->status==$key ? 'selected': '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                    {{ __('Update') }}
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
