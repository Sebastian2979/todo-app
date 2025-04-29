<div
    class="flex items-center justify-between w-full p-5 mb-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center">
        <!-- Checkbox -->
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input
            type="checkbox"
            name="is_completed"
            onchange="this.form.submit()"
            {{ $task->is_completed ? 'checked' : '' }}
            class="w-8 h-8 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 focus:ring-2"
        >
    </form>
    </div>
    <div class="p-5">
        <div class="text-left">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $task->title}}</h5>
        </div>
        <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">
            {{ $task->description}}
        </p>
        <p>Fällig am: {{ $task->due_date }}</p>
    </div>
    <div class="flex items-center gap-2">
        <!-- Edit Button -->
        <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-600 hover:text-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 013.536 3.536L7 21H3v-4L16.732 3.732z" />
            </svg>
        </a>
        <!-- Delete Button -->
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Bist du sicher, dass du diese Aufgabe löschen willst?');" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3m5 0H6" />
                </svg>
            </button>
        </form>
    </div>
</div>