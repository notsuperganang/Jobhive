<x-app-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-12 mx-auto">
            <div class="mb-12 flex items-center">
                <h2 class="text-2xl font-medium text-gray-900 title-font px-4">
                    Your listings ({{ $listings->count() }})
                </h2>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="ml-3 text-red-500">Sign Out</button>
                </form>
            </div>
            <div class="-my-6">
                @foreach ($listings as $listing)
                    <div href="{{ route('listings.show', $listing->slug) }}"
                        class="py-6 px-4 flex flex-wrap md:flex-nowrap justify-between border-b border-gray-100 {{ $listing->is_highlighted ? 'bg-red-50 hover:bg-red-100' : 'bg-white hover:bg-gray-100' }}">
                        <div class="md:w-16 md:mb-0 mb-6 mr-4 flex-shrink-0 flex flex-col">
                            <img src="/storage/{{ $listing->logo }}" class="w-16 h-16 rounded-full object-cover">
                        </div>
                        <div class="md:w-1/2 mr-2 flex flex-col space justify-center">
                            <h2 class="text-xl font-bold text-gray-900 title-font mb-1">{{ $listing->title }}</h2>
                            <p class="leading-relaxed text-gray-900">{{ $listing->company }} &mdash; <span
                                    class="text-gray-600">{{ $listing->location }}</span></p>
                        </div>
                        <div class="md:flex-grow mr-8 mt-2 flex items-center justify-start">
                            @foreach ($listing->tags as $tag)
                                <span
                                    class="inline-block mr-2 tracking-wide text-red-500 text-xs font-medium title-font py-0.5 px-1.5 border border-red-500">{{ strtoupper($tag->name) }}</span>
                            @endforeach
                        </div>
                        <div>
                            <span class="md:flex-grow flex flex-col items-end justify-center">
                                <span>{{ $listing->created_at->diffForHumans() }}</span>
                                <span><strong class="text-bold">{{ $listing->clicks()->count() }}</strong> Apply Button
                                    Clicks</span>
                            </span>
                        </div>
                        <div class="pl-4">
                            <a type="submit" href="{{ route('listings.edit', $listing->id) }}" class="">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                            <!-- Form konfirmasi penghapusan -->
                            <form action="{{ route('listings.destroy', $listing->id) }}" method="POST" class="pt-2">
                                @csrf
                                @method('DELETE')
                                <!-- Atribut onclick untuk konfirmasi penghapusan -->
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this listing?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
