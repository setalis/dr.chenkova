<x-layouts.main>
    <div class="mb-6">
        <a href="{{ route_locale('book') }}" class="text-blue-600 hover:text-blue-800 font-medium">
            ← Back
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Order a print book</h1>

        <p class="text-gray-700 dark:text-gray-300 mb-6">
        You are purchasing the print version of the book.

        Delivery within Georgia — free of charge.

        <p class="text-gray-700 dark:text-gray-300 mb-6">
        Delivery outside Georgia is calculated individually depending on the country and delivery method.
        </p>
        <p class="text-gray-700 dark:text-gray-300 mb-6">
            Please provide your address in the order form — after placing the order we will contact you and clarify the international delivery cost.
        </p>
        <p class="text-gray-700 dark:text-gray-300 mb-6">
        Estimated delivery cost to a pick-up point: 
        
        <ul>
            <li>Poland — 7–12€</li>
            <li>Germany — 20–23€</li>
            <li>Spain — 4–6€</li>
            <li>Ukraine — 10€</li>
        </ul>
        </p>
        <p class="text-gray-700 dark:text-gray-300 font-bold mt-6 mb-6">
        Contact details:
        </p>

        <form action="{{ route_locale('book-order.store') }}" method="POST" 
              x-data="{
                  messenger: '',
                  
                  get contactLabel() {
                      if (this.messenger === 'telegram' || this.messenger === 'instagram') {
                            return 'Username';
                      } else if (this.messenger === 'whatsapp') {
                          return 'Phone number';
                      }
                      return 'Contact details';
                  },
                  
                  get contactPlaceholder() {
                      if (this.messenger === 'telegram') {
                          return '@username';
                      } else if (this.messenger === 'instagram') {
                          return '@username';
                      } else if (this.messenger === 'whatsapp') {
                          return '+380501234567';
                      }
                      return '';
                  }
              }">
            @csrf

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Name <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       value="{{ old('name') }}"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md 
                              bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror"
                       required>
                @error('name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Messenger <span class="text-red-500">*</span>
                </label>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="radio" 
                               name="messenger" 
                               value="telegram"
                               x-model="messenger"
                               class="mr-2 text-blue-600 focus:ring-blue-500 @error('messenger') border-red-500 @enderror"
                               required>
                        <span class="text-gray-700 dark:text-gray-300">Telegram</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" 
                               name="messenger" 
                               value="instagram"
                               x-model="messenger"
                               class="mr-2 text-blue-600 focus:ring-blue-500 @error('messenger') border-red-500 @enderror"
                               required>
                        <span class="text-gray-700 dark:text-gray-300">Instagram</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" 
                               name="messenger" 
                               value="whatsapp"
                               x-model="messenger"
                               class="mr-2 text-blue-600 focus:ring-blue-500 @error('messenger') border-red-500 @enderror"
                               required>
                        <span class="text-gray-700 dark:text-gray-300">WhatsApp</span>
                    </label>
                </div>
                @error('messenger')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6" x-show="messenger">
                <label for="contact" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    <span x-text="contactLabel"></span> <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="contact" 
                       id="contact" 
                       value="{{ old('contact') }}"
                       x-bind:placeholder="contactPlaceholder"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md 
                              bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('contact') border-red-500 @enderror"
                       required>
                @error('contact')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-4">
                    Delivery address <span class="text-red-500">*</span>
                </label>
                
                <div class="mb-4">
                    <label for="country" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Country <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="country" 
                           id="country" 
                           value="{{ old('country') }}"
                           class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md 
                                  bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                  focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('country') border-red-500 @enderror"
                           required>
                    @error('country')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        City <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="city" 
                           id="city" 
                           value="{{ old('city') }}"
                           class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md 
                                  bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                  focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('city') border-red-500 @enderror"
                           required>
                    @error('city')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="region" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Region
                    </label>
                    <input type="text" 
                           name="region" 
                           id="region" 
                           value="{{ old('region') }}"
                           class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md 
                                  bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                  focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('region') border-red-500 @enderror">
                    @error('region')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="address_1" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Address 1 <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="address_1" 
                           id="address_1" 
                           value="{{ old('address_1') }}"
                           class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md 
                                  bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                  focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('address_1') border-red-500 @enderror"
                           required>
                    @error('address_1')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="address_2" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Address 2
                    </label>
                    <input type="text" 
                           name="address_2" 
                           id="address_2" 
                           value="{{ old('address_2') }}"
                           class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md 
                                  bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                  focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('address_2') border-red-500 @enderror">
                    @error('address_2')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="zip" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        ZIP code <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="zip" 
                           id="zip" 
                           value="{{ old('zip') }}"
                           class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md 
                                  bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                  focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('zip') border-red-500 @enderror"
                           required>
                    @error('zip')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Phone number <span class="text-red-500">*</span>
                    </label>
                    <input type="tel" 
                           name="phone" 
                           id="phone" 
                           value="{{ old('phone') }}"
                           class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md 
                                  bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                  focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('phone') border-red-500 @enderror"
                           placeholder="+380501234567"
                           required>
                    @error('phone')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            @error('payment')
                <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-md">
                    <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                </div>
            @enderror

            <x-privacy-checkbox />

            <div class="flex gap-4">
                <button type="submit" 
                        class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-medium">
                    Proceed to payment
                </button>
                <a href="{{ route_locale('book') }}" 
                   class="px-6 py-3 bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-white rounded-md hover:bg-gray-400 dark:hover:bg-gray-500 font-medium">
                    Cancel
                </a>
            </div>
        </form>
    </div>
    </x-layouts.main>
