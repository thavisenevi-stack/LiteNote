<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Notes Books
        </h2>
    </x-slot>

   <button 
   onclick="noteBookModal.showModal()"
   class="px-4 py-2 bg-[#4b47d8] mt-5 ml-40 border border-transparent rounded-md font-bold text-s text-white uppercase tracking-widest hover:bg-[#dfdff3] hover:text-[#4b47d8] hover:border-[#4b47d8]">
    + New Notebook
    </button>
    
    <div class="py-12">
    @forelse ( $notebooks as $notebook )
        <div class="mx-auto mb-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">     
                    <h1 class="mb-2 text-xl font-bold text-black uppercase">{{ $notebook->name }}</h1>   
                    <h1 class="text-lg text-[#4b47d8] font-mono mb-2 hover:underline">
                        <a href="{{ asset('storage/' . $notebook->file) }}" target="_blank">
                            📄 {{ basename($notebook->file) }}
                        </a>
                    </h1>
                </div>
            </div>
        </div>  
    @empty
        
    @endforelse
    </div>

    @include('newNoteBookModal.newNoteBook')

</x-app-layout>