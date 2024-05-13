<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
</style>

<header class="text-gray-600 body-font border-b border-gray-100">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a href="{{ route('listings.index') }}"
            class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <img src="{{ asset('storage/JobHive-Logo.png') }}" alt="JobHive Logo" class="w-20 h-20 rounded-full">
            <span class="ml-3 text-xl font-poppins font-bold">Job<span class=" text-red-500">Hive</span></span>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            @guest <!-- Jika pengguna belum login -->
                <a href="{{ route('login') }}" class="mr-5 font-poppins font-medium hover:text-gray-900">Employers</a>
            @else
                <!-- Jika pengguna sudah login -->
                <a href="dashboard" class="mr-5 font-poppins font-medium hover:text-gray-900">{{ Auth::user()->name }}</a>
            @endguest
        </nav>
        <a href="{{ route('listings.create') }}"
            class="inline-flex items-center bg-red-500 text-white font-poppins font-normal border-0 py-1 px-3 focus:outline-none hover:bg-red-800 rounded text-base mt-4 md:mt-0">Post
            Job
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</header>
