<x-app-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="w-full md:w-1/2 py-24 mx-auto ">
            <div class="mb-4">
                <h2 class="text-2xl font-medium text-gray-900 title-font">
                    Create a new listing ($99)
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
            <form action="{{ route('listings.store') }}" id="payment_form" method="post" enctype="multipart/form-data"
                class="bg-gray-100 p-4">
                @guest
                    <div class="flex mb-4">
                        <div class="flex-1 mx-2">
                            <label for="email" class="block text-lg font-medium text-gray-700">Email Address</label>
                            <input
                                class="block mt-1 w-full rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                id="email" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                        <div class="flex-1 mx-2">
                            <label for="name" class="block text-lg font-medium text-gray-700">Full Name</label>
                            <input
                                class="block mt-1 w-full rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                id="name" type="text" name="name" :value="old('name')" required />
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <div class="flex-1 mx-2">
                            <label for="password" class="block text-lg font-medium text-gray-700">Password</label>
                            <input
                                class="block mt-1 w-full rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                id="password" type="password" name="password" required />
                        </div>
                        <div class="flex-1 mx-2">
                            <label for="password_confirmation" class="block text-lg font-medium text-gray-700">Confirm
                                Password</label>
                            <input
                                class="block mt-1 w-full rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                id="password_confirmation" type="password" name="password_confirmation" required />
                        </div>
                    </div>
                @endguest
                <div class="mb-4 mx-2">
                    <label for="title" class="block text-lg font-medium text-gray-700">Job Title</label>
                    <input id="title"
                        class="block mt-1 w-full rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        type="text" name="title" required />
                </div>
                <div class="mb-4 mx-2">
                    <label for="company" class="block text-lg font-medium text-gray-700">Company Name</label>
                    <input id="company"
                        class="block mt-1 w-full rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        type="text" name="company" required />
                </div>
                <div class="mb-4 mx-2">
                    <label for="logo" class="block text-lg font-medium text-gray-700">Company Logo</label>
                    <input id="logo" class="block mt-1 w-full" type="file" name="logo" />
                </div>
                <div class="mb-4 mx-2">
                    <label for="location" class="block text-lg font-medium text-gray-700">Location (e.g Remote, United
                        States)</label>
                    <input id="location" class="block mt-1 w-full" type="text" name="location" required />
                </div>
                <div class="mb-4 mx-2">
                    <label for="apply_link" class="block text-lg font-medium text-gray-700">Link to Apply</label>
                    <input id="apply_link" class="block mt-1 w-full" type="text" name="apply_link" required />
                </div>
                <div class="mb-4 mx-2">
                    <label for="tags" class="block text-lg font-medium text-gray-700">Tags (separate by
                        comma)</label>
                    <input id="tags" class="block mt-1 w-full" type="text" name="tags" />
                </div>
                <div class="mb-4 mx-2">
                    <label for="content" class="block text-lg font-medium text-gray-700">Listing Content (markdown is
                        okay)</label>
                    <textarea id="content" rows="8"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                        name="content"></textarea>
                </div>
                <div class="mb-4 mx-2">
                    <label for="is_highlighted" class="inline-flex items-center font-medium text-sm text-gray-700">
                        <input type="checkbox" id="is_highlighted" name="is_highlighted" value="yes"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50">
                        <span class="ml-2">Highlight this post (extra $19)</span>
                    </label>
                </div>
                <div class="mb-6 mx-2">
                    <div id="card-element"></div>
                </div>
                <div class="mb-2 mx-2">
                    @csrf
                    <input type="hidden" id="payment_method_id" name="payment_method_id" value="">
                    <button type="submit" id="form_submit"
                        class="block w-full items-center bg-indigo-500 text-white border-0 py-2 focus::outline-none hoer:bg-indigo-600 rounded text-base mt-4 md:mt-0">Pay
                        + Continue</button>
                </div>
            </form>
        </div>
    </section>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{ env('STRIPE_KEY') }}");
        const elements = stripe.elements();
        const cardElement = elements.create('card', {
            classes: {
                base: 'StripeElement rounded-md shadow-sm bg-white px-2 py-3 border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full'
            }
        });

        cardElement.mount('#card-element');

        document.getElementById('form_submit').addEventListener('click', async (e) => {
            // prevent the submission of the form immediately
            e.preventDefault();

            const {
                paymentMethod,
                error
            } = await stripe.createPaymentMethod(
                'card', cardElement, {}
            );

            if (error) {
                alert(error.message);
            } else {
                // card is ok, create payment method id and submit form
                document.getElementById('payment_method_id').value = paymentMethod.id;
                document.getElementById('payment_form').submit();
            }
        })
    </script>
</x-app-layout>
