<div class="flex items-center justify-between p-4 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <!-- Linke Seite: Checkbox + Titel + Due Date -->
    <div class="flex items-center gap-4">
        <!-- Checkbox Toggle Completed or Not -->
        <form action="{{ route('tasks.toggle', $task->id) }}" method="POST" id="toggle-form-{{ $task->id }}">
            @csrf
            @method('PATCH')
            <input type="checkbox" name="is_completed"
                class="w-8 h-8 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 focus:ring-2"
                onchange="document.getElementById('toggle-form-{{ $task->id }}').submit();" {{ $task->is_completed ? 'checked' : '' }}>
        </form>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
        </form>
        <!-- Task Details -->
        <div class="flex flex-col">
            <!-- Titel -->
            <span
                class="{{ $task->is_completed ? 'line-through text-gray-400' : 'text-gray-900 dark:text-white' }} font-medium">
                {{ $task->title }}
            </span>
            <!-- Description -->
            <span
                class="{{ $task->is_completed ? 'line-through text-gray-400' : 'text-gray-900 dark:text-white' }} font-thin">
                {{ $task->description }}
            </span>
            <!-- Fälligkeitsdatum -->
            <span class="text-sm text-gray-500 dark:text-gray-400">
                Fällig: {{ \Carbon\Carbon::parse($task->due_date)->format('d.m.Y H:i') }}
            </span>
        </div>
    </div>

    <!-- Rechte Seite: Editieren & Löschen -->
    <div class="flex items-center gap-3">
        <!-- Edit Button -->
        <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-600 hover:text-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 013.536 3.536L7 21H3v-4L16.732 3.732z" />
            </svg>
        </a>

        <!-- Delete Button -->
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
            onsubmit="return confirm('Bist du sicher, dass du diese Aufgabe löschen willst?');" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3m5 0H6" />
                </svg>
            </button>
        </form>
    </div>
</div>