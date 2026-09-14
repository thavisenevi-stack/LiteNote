<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#4b47d8] border border-transparent rounded-md font-bold text-s text-white uppercase tracking-widest hover:bg-[#dfdff3] hover:text-[#4b47d8] hover:border-[#4b47d8]']) }}>
    {{ $slot }}
</button>
