<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
           Edit Notes
        </h2>
    </x-slot>

     <div class="p-5 py-12">
        <div class="mx-auto mb-6 max-w-7xl sm:px-6 lg:px-8">    
            <form action="{{ route('note.update', $note) }}" method="POST">
                @method('put')
                @csrf
                
                <x-text-input class="w-full" name="title" placeholder="Note Title" value="{{ $note->title  }}" ></x-text-input>

                <x-textarea class="w-full mt-6" rows="8" name="text" placeholder="Type Your Note" value="{{ $note->text }}"></x-textarea>

                <select name="notebook" class="w-full mt-4 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="" selected disabled>Select the notebook</option>
                    @foreach ( $notebooks as $notebook )
                        <option value="{{ $notebook->notebook_id }}">
                            @if ($notebook->notebook_id === $note->notebook_notebook_id)
                                selected
                            @endif
                            {{ $notebook->name }}</option>
                    @endforeach
                </select>
                
                <x-primary-button class="flex justify-end mt-6">Save Note</x-primary-button>

            </form>
        </div>
     </div>

</x-app-layout>