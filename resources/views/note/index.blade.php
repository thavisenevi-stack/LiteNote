<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ request()->routeIs('note.index') ? 'Notes' : 'Trash' }}
        </h2>
    </x-slot>


   @if (request()->routeIs('note.index') )
    <button class="px-4 py-2 bg-[#4b47d8] mt-5 ml-40 border border-transparent rounded-md font-bold text-s text-white uppercase tracking-widest hover:bg-[#dfdff3] hover:text-[#4b47d8] hover:border-[#4b47d8]"
    onclick="newNoteModal.showModal()">
    + New Note
    </button>
   @endif

    <div class="py-12">
        @forelse ( $notes as $note )
            <div class="mx-auto mb-6 max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">     
                            <h1 class="text-2xl text-[#4b47d8] font-black mb-2">
                            <a 
                            @if (request()->routeIs('note.index') )
                            href="{{ route('notes.show', $note) }}"
                            @else
                            href="{{ route('trashed.show', $note) }}"
                            @endif
                            class="hover:underline">{{ $note->title }}
                            </a>
                            </h1>
                            <p class="text-lg ">{{ Str::limit($note->text, 100, '.....') }}</p>
                            <span>{{ $note->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>   
        @empty
        @if (request()->routeIs('note.index') )
        <div class="mx-auto mb-6 max-w-7xl sm:px-6 lg:px-8">
            <p class="p-5 overflow-hidden bg-white shadow-sm sm:rounded-lg">Note not yet created.</p>
        </div>
        @else
         <div class="mx-auto mb-6 max-w-7xl sm:px-6 lg:px-8">
            <p class="p-5 overflow-hidden bg-white shadow-sm sm:rounded-lg">No Deleted Notes.</p>
        </div>
        @endif
            
        @endforelse ($notes as  $note)

        <div class="mx-auto mt-6 mb-6 max-w-7xl sm:px-6 lg:px-8">
                {{ $notes->links('vendor.pagination.tailwind') }}
        </div>
    </div>

    @include('newNoteModal.newNote');  
</x-app-layout>