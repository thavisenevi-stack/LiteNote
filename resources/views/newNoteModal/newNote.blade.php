<dialog id="newNoteModal" class="w-full max-w-lg p-5 rounded-lg shadow-xl backdrop:bg-black/40">
    <div class="flex justify-end mb-4">
        <button onclick="newNoteModal.close()">
            <svg width="24px" height="24px" viewBox="-235.52 -235.52 983.04 983.04" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                <g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-235.52" y="-235.52" width="983.04" height="983.04" rx="491.52" fill="#deddda" strokewidth="0">
                </rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> 
                <title>cancel</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="work-case" fill="#241f31" transform="translate(91.520000, 91.520000)"> 
                <polygon id="Close" points="328.96 30.2933333 298.666667 1.42108547e-14 164.48 134.4 30.2933333 1.42108547e-14 1.42108547e-14 30.2933333 134.4 164.48 1.42108547e-14 298.666667 30.2933333 328.96 164.48 194.56 298.666667 328.96 328.96 298.666667 194.56 164.48"> 
                </polygon> </g> </g> </g>
            </svg>
        </button>
        
    </div>
    <form action="{{ route('note.store')}}" method="POST">
        @csrf
        <x-text-input class="w-full" name="title" placeholder="Note Title" value="{{ @old('title') }}" ></x-text-input>
        @error('title')
            <div  class="text-red-600">{{ $message }}</div>
        @enderror
        <x-textarea class="w-full mt-6" rows="8" name="text" placeholder="Type Your Note">{{ @old('text')  }}</x-textarea>
        @error('text')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
        <select name="notebook" class="w-full mt-4 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="" selected disabled>-- Select the notebook --</option>
            @foreach ( $notebooks as $notebook )
                <option value="{{ $notebook->notebook_id }}">{{ $notebook->name }}</option>
            @endforeach
        </select>
        <x-primary-button class="flex justify-end mt-6">Save Note</x-primary-button>
    </form>
    @if ($errors->any())
    <script> 
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('newNoteModal').showModal();
        });
    </script>
    @endif
    
</dialog>