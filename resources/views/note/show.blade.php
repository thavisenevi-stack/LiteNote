<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ !$note->trashed()  ? 'Notes' : 'Trash' }}
        </h2>
    </x-slot>
    
    <div class="p-5 py-12">
            <div>
                @if( !$note->trashed())
                <div class="flex flex-col gap-5 px-4 mx-auto my-5 sm:flex-row sm:items-center sm:justify-between max-w-7xl sm:px-6 lg:px-8">
                    <div class="flex flex-col gap-2 sm:flex-row sm:gap-10 sm:px-6 lg:px-8" >
                        <p><span class="font-semibold">Created: </span>{{ $note->created_at->diffForHumans() }}</p>
                        <p><span class="font-semibold">Last Changed: </span>{{ $note->updated_at->diffForHumans() }}</p>
                    </div>
                    <div class="flex gap-3">
                        <x-secondary-button class="justify-center w-full sm:w-auto"><a href="{{ route('note.edit', $note) }}">Edit Button</a></x-secondary-button>
                        <form action="{{ route('note.destroy', $note) }}" method="POST" class="w-full sm:w-auto">
                        @method('delete')
                        @csrf
                            <button type="submit"  class="inline-flex items-center justify-center w-full px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-red-700 border border-gray-300 rounded-md shadow-sm sm:w-auto hover:bg-red-100 hover:text-red-700"
                            onclick="confirmDelete(event, this.form)">
                                Move to trash
                            </button>
                        </form>
                    </div>
                </div>

                @else
                <div class="flex flex-col gap-5 px-4 mx-auto my-5 sm:flex-row sm:items-center sm:justify-between max-w-7xl sm:px-6 lg:px-8">
                    <div  class="flex flex-col gap-2 sm:flex-row sm:gap-10">
                        <p><span class="font-semibold">Deleted: </span>{{ $note->deleted_at->diffForHumans() }}</p>
                    </div>
                    <div class="flex gap-3">
                        <form action="{{ route('trashed.update', $note) }}" method="POST">
                        @method('put')
                        @csrf
                            <button type="submit" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-700 border border-gray-300 rounded-md shadow-sm hover:bg-gray-100 hover:text-gray-700">
                                Restore Note
                            </button>
                        </form>

                        <form action="{{ route('trashed.destroy', $note) }}" method="POST">
                        @method('delete')
                        @csrf
                            <button type="submit" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-red-700 border border-gray-300 rounded-md shadow-sm hover:bg-red-100 hover:text-red-700"
                            onclick="return confirm('Are you sure? You wish to delete this note permanently')">
                                Delete Forever
                            </button>
                        </form>
                    </div>
                </div>
                @endif
                
                <div class="px-4 mx-auto overflow-hidden bg-white shadow-sm sm:rounded-lg max-w-7xl sm:px-6 lg:px-8">
                    <div class="p-6 text-gray-900">     
                        <h1 class="text-2xl text-[#4b47d8] font-black mb-2">
                        {{ $note->title }}
                        </h1>
                        <p class="text-lg break-words">{{ $note->text }}</p>
                        <p><a href="{{ route('notebooks.index') }}" class="text-lg text-blue-500 underline">{{ $note->notebook?->name ?? 'No notebook selected' }}</a></p>
                    </div>
                </div>
            </div>  
    </div>

    <script>
    function confirmDelete(event, form) {
        event.preventDefault();

        Swal.fire({
            title: "Are you sure?",
            text: "You want to move this note to trash",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel"
        }).then((result) => {

            if (result.isConfirmed) {
                form.submit();
            }

        });
    }
</script>
        
</x-app-layout>