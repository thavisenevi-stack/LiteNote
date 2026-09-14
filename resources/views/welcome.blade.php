<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f7f7f8] overflow-x-hidden">

    <nav class="w-full bg-white">
        <div class="flex items-center justify-between px-4 py-3 mx-auto max-w-7xl md:py-4 md:px-0">
            <div>
                <img src="{{ asset('images/logo.png') }}" class="h-auto w-28 md:w-44 md:h-10" alt="logo">
            </div>

            <div class="flex gap-2">

                @if (Route::has('login'))
                    @auth
                        <a
                            href="{{ route('note.index') }}"
                            class="border border-[#bcbbef] bg-[#4b47d8]  text-white font-bold text-sm md:text-base px-3 py-2 md:p-3 rounded-lg transition-transform hover:-translate-y-1 hover:shadow-lg"
                        >
                            Notes
                        </a>

                    @else

                        <a
                            href="{{ route('login') }}"
                            class="border border-[#bcbbef] font-bold text-sm md:text-lg text-[#635ddc] px-3 py-2 md:p-3 rounded-lg transition-transform hover:-translate-y-1 hover:shadow-lg"
                        >
                            Log in
                        </a>


                        @if (Route::has('register'))

                            <a
                                href="{{ route('register') }}"
                                class="border border-[#bcbbef] bg-[#4b47d8] text-white font-bold text-sm md:text-base px-3 py-2 md:p-3 rounded-lg transition-transform hover:-translate-y-1  hover:shadow-lg"
                            >
                                Register
                            </a>

                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <section class="mt-10 md:mt-20 bg-[#f7f7f8] flex flex-col md:flex-row items-center justify-between gap-10 md:gap-5 max-w-7xl mx-auto px-5 md:px-0">

        <div class="w-full text-center md:w-auto md:text-left">

            <span class="inline-block bg-[#dfdff3] rounded-3xl px-3 py-2 text-[#4b47d8] text-xs md:text-sm font-bold" >
                Simple. Organized. Productive.
            </span>


            <h1 class="mt-5 text-4xl font-extrabold leading-tight sm:text-5xl md:text-6xl">
                Your Notes, <br>
                <span class="text-[#4b47d8]">
                    Anytime, Anywhere
                </span>
            </h1>


            <p class="mt-5 md:mt-8  text-base md:text-xl leading-7 md:leading-8 font-[500] text-slate-500">
                LiteNote is a simple and modern note-taking application
                <br class="hidden md:block">
                to help you capture ideas, stay organized, and get more done.
            </p>

            <div class="flex flex-wrap justify-center gap-3 md:justify-start mt-7 md:mt-8">

                <a
                    href="{{ route('register') }}"
                    class="border border-[#bcbbef] bg-[#4b47d8] text-white font-bold px-5 py-3 rounded-lg transition-transfor hover:-translate-y-1 hover:shadow-lg" >
                    Get Started
                </a>

                <a
                    href="#features"
                    class="border border-[#bcbbef] font-bold text-base md:text-lg text-[#635ddc] px-5 py-3 rounded-lg transition-transform hover:-translate-y-1 hover:shadow-lg" >
                    Learn More
                </a>

            </div>

        </div>

        <div class="flex justify-center w-full md:w-auto md:justify-end">

            <img
                src="{{ asset('images/hero.png') }}"
                class="w-full max-w-[500px] md:max-w-[700px] h-auto object-contain" alt="LiteNote Dashboard">
        </div>
    </section>

    <section id="f" class="mt-14 md:mt-20 bg-[#f7f7f8] flex flex-col md:flex-row items-start md:items-center justify-between gap-8 md:gap-5 max-w-7xl mx-auto px-5 md:px-0 pb-10" >

        <div class="flex items-center gap-5">
            <div class="shrink-0">
                <svg width="72" height="72" viewBox="0 0 72 72" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle
                        cx="36"
                        cy="36"
                        r="34"
                        fill="#dfdff3"
                    />
                    <path
                        d="M25 47L27.5 38.5L43.5 22.5C45 21 47.5 21 49 22.5L50.5 24C52 25.5 52 28 50.5 29.5L34.5 45.5L25 47Z"
                        fill="#4F46E5"
                    />
                    <path
                        d="M41 25L48 32"
                        stroke="#7C6CFF"
                        stroke-width="3"
                        stroke-linecap="round"
                    />
                    <path
                        d="M25 47L27.5 38.5L34.5 45.5L25 47Z"
                        fill="#3730A3"
                    />
                </svg>
            </div>

            <div>

                <h1 class="text-lg font-extrabold md:text-xl">
                    Create Notes
                </h1>

                <p class="text-sm md:text-base font-[500] text-slate-500">
                    Quickly create and save <br>
                    your notes.
                </p>
            </div>
        </div>

        <div class="flex items-center gap-5">

            <div class="shrink-0">
                <svg width="72" height="72" viewBox="0 0 72 72" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle
                        cx="36"
                        cy="36"
                        r="34"
                        fill="#dfdff3"
                    />
                    <path
                        d="M23 27C23 25.3 24.3 24 26 24H33L36 28H46C47.7 28 49 29.3 49 31V45C49 46.7 47.7 48 46 48H26C24.3 48 23 46.7 23 45V27Z"
                        fill="none"
                        stroke="#4F46E5"
                        stroke-width="3"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </div>

            <div>

                <h1 class="text-lg font-extrabold md:text-xl">
                    Stay Organized
                </h1>

                <p class="text-sm md:text-base font-[500] text-slate-500">
                    Keep all your notes in <br>
                    one place.
                </p>
            </div>
        </div>


        <div class="flex items-center gap-5">

            <div class="shrink-0">
                <svg width="72" height="72" viewBox="0 0 72 72" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle
                        cx="36"
                        cy="36"
                        r="34"
                        fill="#dfdff3"
                    />
                    <path
                        d="M27 22H40L47 29V49C47 50.7 45.7 52 44 52H27C25.3 52 24 50.7 24 49V25C24 23.3 25.3 22 27 22Z"
                        stroke="#4F46E5"
                        stroke-width="3"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M40 22V29H47"
                        stroke="#4F46E5"
                        stroke-width="3"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M29 39L33 43L41 35"
                        stroke="#4F46E5"
                        stroke-width="3"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </div>

            <div>

                <h1 class="text-lg font-extrabold md:text-xl">
                    Manage Notes
                </h1>

                <p class="text-sm md:text-base font-[500] text-slate-500">
                    Edit or move unwanted notes <br>
                    to Trash.
                </p>
            </div>
        </div>
    </section>
</body>

</html>