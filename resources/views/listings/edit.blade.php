<x-app-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="w-full md:w-1/2 py-24 mx-auto">
            <div class="mb-4">
                <h2 class="text-2xl font-medium text-gray-900 title-font">
                    Edit Listing ({{ $listing->title }})
                </h2>
            </div>
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-200 text-red-800">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('listings.update', $listing->id) }}" method="post" enctype="multipart/form-data"
                class="bg-gray-100 p-4">
                @method('PUT')
                @csrf
                @guest
                    <div class="flex mb-4">
                        <div class="flex-1 mx-2">
                            <label for="email" class="block text-lg font-medium text-gray-700">Email Address</label>
                            <input
                                class="block mt-1 w-full rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                                id="email" type="email" name="email" value="{{ old('email', $listing->email) }}"
                                required autofocus />
                        </div>
                        <div class="flex-1 mx-2">
                            <label for="name" class="block text-lg font-medium text-gray-700">Full Name</label>
                            <input
                                class="block mt-1 w-full rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                                id="name" type="text" name="name" value="{{ old('name', $listing->name) }}"
                                required />
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <div class="flex-1 mx-2">
                            <label for="password" class="block text-lg font-medium text-gray-700">Password</label>
                            <input
                                class="block mt-1 w-full rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                                id="password" type="password" name="password" />
                        </div>
                        <div class="flex-1 mx-2">
                            <label for="password_confirmation" class="block text-lg font-medium text-gray-700">Confirm
                                Password</label>
                            <input
                                class="block mt-1 w-full rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                                id="password_confirmation" type="password" name="password_confirmation" />
                        </div>
                    </div>
                @endguest
                <div class="mb-4 mx-2">
                    <label for="title" class="block text-lg font-medium text-gray-700">Job Title</label>
                    <input id="title"
                        class="block mt-1 w-full rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        type="text" name="title" value="{{ old('title', $listing->title) }}" required />
                </div>
                <div class="mb-4 mx-2">
                    <label for="company" class="block text-lg font-medium text-gray-700">Company Name</label>
                    <input id="company"
                        class="block mt-1 w-full rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        type="text" name="company" value="{{ old('company', $listing->company) }}" required />
                </div>
                <div class="mb-4 mx-2">
                    <label for="logo" class="block text-lg font-medium text-gray-700">Company Logo</label>
                    <input id="logo" class="block mt-1 w-full" type="file" name="logo" />
                    @if ($listing->logo)
                        <img src="{{ asset('storage/' . $listing->logo) }}" alt="Current Logo" class="mt-2"
                            style="max-height: 100px;">
                    @endif
                </div>
                <div class="mb-4 mx-2">
                    <label for="location" class="block text-lg font-medium text-gray-700">Location (e.g Remote, United
                        States)</label>
                    <input id="location"
                        class="block mt-1 w-full rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        type="text" name="location" value="{{ old('location', $listing->location) }}" required />
                </div>
                <div class="mb-4 mx-2">
                    <label for="apply_link" class="block text-lg font-medium text-gray-700">Link to Apply</label>
                    <input id="apply_link"
                        class="block mt-1 w-full rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        type="text" name="apply_link" value="{{ old('apply_link', $listing->apply_link) }}"
                        required />
                </div>
                <div class="mb-4 mx-2">
                    <label for="tags" class="block text-lg font-medium text-gray-700">Tags (separate by
                        comma)</label>
                    <input id="tags"
                        class="block mt-1 w-full rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        type="text" name="tags"
                        value="{{ old('tags', $listing->tags->pluck('name')->implode(',')) }}" />
                </div>
                <div class="mb-4 mx-2">
                    <label for="content" class="block text-lg font-medium text-gray-700">Listing Content (markdown is
                        okay)</label>
                    <textarea id="content" rows="8"
                        class="rounded-md shadow-sm border-gray-300 focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50 block mt-1 w-full"
                        name="content">{{ old('content', strip_tags($listing->content)) }}</textarea>
                </div>
                <div class="mb-2 mx-2">
                    <button type="submit"
                        class="block w-full items-center bg-red-500 text-white border-0 py-2 focus:outline-none hover:bg-red-600 rounded text-base mt-4 md:mt-0">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
