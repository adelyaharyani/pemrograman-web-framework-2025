<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-5">
                        <h2 class="mb-5 text-2xl font-bold">Create New Product</h2>
                        <x-auth-session-status class="mb-4" :status="session('success')" />
                        
                        <form action="{{ route('product-store') }}" method="POST" class="space-y-4">
                            @csrf <!-- Laravel CSRF protection -->

                            <div class="form-group">
                                <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                                <input type="text" id="product_name" name="product_name" value="{{ old('product_name') }}"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('product_name') border-red-500 @enderror"
                                    required>
                                @error('product_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="unit" class="block text-sm font-medium text-gray-700">Unit</label>
                                <select id="unit" name="unit"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('unit') border-red-500 @enderror"
                                    required>
                                    <option value="" disabled selected>Select a unit</option>
                                    <option value="kg" {{ old('unit') == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                                    <option value="ltr" {{ old('unit') == 'ltr' ? 'selected' : '' }}>Liter (ltr)</option>
                                    <option value="pcs" {{ old('unit') == 'pcs' ? 'selected' : '' }}>Pieces (pcs)</option>
                                    <option value="box" {{ old('unit') == 'box' ? 'selected' : '' }}>Box</option>
                                </select>
                                @error('unit')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                                <input type="text" id="type" name="type" value="{{ old('type') }}"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('type') border-red-500 @enderror"
                                    required>
                                @error('type')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="information" class="block text-sm font-medium text-gray-700">Information</label>
                                <textarea id="information" name="information" rows="3"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('information') border-red-500 @enderror">{{ old('information') }}</textarea>
                                @error('information')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="qty" class="block text-sm font-medium text-gray-700">Quantity</label>
                                <input type="number" id="qty" name="qty" value="{{ old('qty') }}" min="0" step="1"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('qty') border-red-500 @enderror"
                                    required>
                                @error('qty')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="producer" class="block text-sm font-medium text-gray-700">Producer</label>
                                <input type="text" id="producer" name="producer" value="{{ old('producer') }}"
                                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('producer') border-red-500 @enderror"
                                    required>
                                @error('producer')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-black bg-blue-500 border border-blue rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Submit
                            </button>
                        </form>
                    </div>

                    @vite('resources/js/app.js') <!-- Include Vite's JS assets -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>