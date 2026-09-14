<dialog id='noteBookModal' class="w-full max-w-lg rounded-md shadow-lg backdrop:bg-black/40">
    <div class="p-5">
        <div class="flex justify-end mb-3">
            <button onclick="noteBookModal.close()">
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
        <form action="{{ route('notebooks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-text-input placeholder="Notebook Name" name='book'></x-text-input>
            <div class="flex justify-between mt-4">
                <input type="file" name="file" required class="w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500">
                <x-primary-button>Save</x-primary-button>
            </div>
        </form>
    </div>
    
</dialog>