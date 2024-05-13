<section class="text-gray-600 font-poppins body-font border-b border-gray-100">
    <div class="container mx-auto flex flex-col px-5 pt-16 pb-8 justify-center items-center">
        <div class="w-full md:w-2/3 flex flex-col items-center text-center">
            <div class=" bg-red-200 py-1 px-2 mb-4 w-8/12 rounded-3xl">
                <h1 class="title-font sm:text-4xl text-3xl font-medium text-gray-900 w-full">
                    Premier
                    careers in the
                    field</h1>
            </div>
            <p class="mb-8 leading-relaxed font-normal">Whether you're seeking a career change or simply exploring your
                options,
                we've curated an extensive collection of available positions across various companies and locations for
                you to peruse.</p>
            <form class="flex w-full justify-center items-end" action="{{ route('listings.index') }}" method="get">
                <div class="relative mr-4 w-full lg:w-1/2 text-left">
                    <input type="text" id="search-bar" name="search-bar" value="{{ request()->get('search-bar') }}"
                        class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-red-200 focus:bg-transparent border border-gray-300 focus:border-red-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <button
                    class="inline-flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg">Search</button>
            </form>
            <p class="text-sm mt-2 text-gray-500 mb-8 w-full">vue and node, react native, js full stack</p>
        </div>
    </div>
</section>
