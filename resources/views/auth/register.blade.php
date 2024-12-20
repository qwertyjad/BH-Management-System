<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-green-100 via-green-200 to-green-400 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
     
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16 bg-gray-100 dark:bg-gray-800 rounded-lg shadow-lg">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white"><strong>Boarding House Seeker Registration</strong></h2>
            <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <span class="text-red-500">NOTE:</span> Please fill out all required fields (*).
                    </label>
<br>

                    </div>
            <form method="POST" action="{{ route('/auth/register-user') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                    {{-- profile image --}}
                    <div class="sm:col-span-2">
                        <label for="profile_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile Picture*</label>
                        <input type="file" name="profile_image" id="profile_image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{old('profile_image')}}"

                      >
                        <x-input-error :messages="$errors->get('profile_image')" class="mt-2" />
                    </div>
<!-- First Name -->
<div class="w-full">
    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name*</label>
    <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('first_name') }}" required>
    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
</div>

<!-- Middle Initial -->
<div class="w-full">
    <label for="middle_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Initial</label>
    <input type="text" name="middle_name" id="middle_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('middle_initial') }}" maxlength="1">
    <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
</div>


<!-- Last Name -->
<div class="w-full">
    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name*</label>
    <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('last_name') }}" required>
    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
</div>

<div class="w-full">
    <label for="suffix" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">suffix *</label>
    <select id="suffix" name="suffix" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
        <option value="" disabled>Suffix</option>
        <option value="Jr" {{ old('suffix') == 'Jr' ? 'selected' : '' }}>Jr</option>
        <option value="Sr" {{ old('suffix') == 'Sr' ? 'selected' : '' }}>Sr</option>
        <option value="III" {{ old('suffix') == 'III' ? 'selected' : '' }}>III</option>
        <option value="" {{ old('suffix') == '' ? 'selected' : '' }}>N/A</option>
    </select>
    <x-input-error :messages="$errors->get('suffix')" class="mt-2" />
</div>




                    <!-- Email Address -->
                    <div class="sm:col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email*</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{old('email')}}" required autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Age -->
                    <div class="w-full">
                        <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age*</label>
                        <input type="number" name="age" id="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{old('age')}}" required>
                        <x-input-error :messages="$errors->get('age')" class="mt-2" />
                    </div>

                    <!-- Gender -->
                    <div class="w-full">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender *</label>
                        <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Select Gender</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="prefer_not_to_say" {{ old('gender') == 'prefer_not_to_say' ? 'selected' : '' }}>Prefer not to say</option>
                        </select>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>

                    <!-- Mobile Number -->
                    <div class="w-full">
                        <label for="mobile_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile Number*</label>
                        <input type="tel" name="mobile_number" id="mobile_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{old('mobile_number')}}" required>
                        <x-input-error :messages="$errors->get('mobile_number')" class="mt-2" />
                    </div>

                    {{-- parent --}}

                    <div class="w-full">
                        <label for="parent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Parent/Guardian*</label>
                        <input type="text" name="parent" id="parent" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{old('parent')}}" required>
                        <x-input-error :messages="$errors->get('parent')" class="mt-2" />
                    </div>

                    <!-- Student Status -->
                    <div class="w-full">
                        <label for="is_student" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Are you a student of BiPSU?*</label>
                        <select id="is_student" name="is_student" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" disabled>Select</option>
                            <option value="true" {{ old('is_student') == 'true' ? 'selected' : '' }}>Yes</option>
                            <option value="false" {{ old('is_student') == 'false' ? 'selected' : '' }}>No</option>
                        </select>
                        <x-input-error :messages="$errors->get('is_student')" class="mt-2" />
                    </div>

                    {{-- program --}}
                    <div class="w-full">
                        <label for="program_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program*</label>
                        <select id="program_id" name="program_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Select Program</option>
                            @foreach ($programs as $program)
                                <option value="{{$program->id}}">{{$program->program_name}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('is_student')" class="mt-2" />
                    </div>


                    <div class="w-full">
                        <label for="region" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Region*</label>
                        <select id="region" name="region_code" class="region-dropdown bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Select Region</option>
                            @foreach($regions as $region)
                                <option value="{{ $region->region_code }}">{{ $region->region_description }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('region_code')" class="mt-2" />
                    </div>

                    <!-- Province Dropdown -->
                    <div class="w-full">
                        <label for="province" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Province*</label>
                        <select id="province" name="province_code" class="province-dropdown bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Select Province</option>
                        </select>
                        <x-input-error :messages="$errors->get('province_code')" class="mt-2" />
                    </div>

                    <!-- City Dropdown -->
                    <div class="w-full">
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City/Municipality*</label>
                        <select id="city" name="city_municipality_code" class="city-dropdown bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Select City/Municipality</option>
                        </select>
                        <x-input-error :messages="$errors->get('city_municipality_code')" class="mt-2" />
                    </div>

                    <!-- Barangay Dropdown -->
                    <div class="w-full">
                        <label for="barangay" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barangay*</label>
                        <select id="barangay" name="barangay_code" class="barangay-dropdown bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Select Barangay</option>
                        </select>
                        <x-input-error :messages="$errors->get('barangay_code')" class="mt-2" />
                    </div>



                    <!-- Password -->
                    <div class="w-full">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password*</label>
                        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="w-full">
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password*</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <span class="text-red-500 mt-10">NOTE:</span> Password must be atleast 8 characters.
                            </label>
                    </div>

                </div>

                <!-- Action Buttons (Aligned Together) -->
                <div class="mt-6 flex justify-left space-x-4">
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-green-600 rounded-lg focus:ring-4 focus:ring-green-300 dark:focus:ring-green-900 hover:bg-green-700 transition-colors">
                        Register
                    </button>
                    <a href="{{ url('/') }}" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Function to dynamically load dropdown options
        function loadOptions(url, targetDropdown) {
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    targetDropdown.innerHTML = '<option value="">Select</option>';
                    data.forEach(item => {
                        targetDropdown.innerHTML += `<option value="${item.id}">${item.description}</option>`;
                    });
                })
                .catch(error => console.error('Error:', error));
        }

        // Region to Province
        document.getElementById('region').addEventListener('change', function() {
            const regionId = this.value;
            const provinceDropdown = document.getElementById('province');
            const cityDropdown = document.getElementById('city');
            const barangayDropdown = document.getElementById('barangay');

            // Reset subsequent dropdowns
            provinceDropdown.innerHTML = '<option value="">Select Province</option>';
            cityDropdown.innerHTML = '<option value="">Select City</option>';
            barangayDropdown.innerHTML = '<option value="">Select Barangay</option>';

            if (regionId) {
                loadOptions(`/provinces/${regionId}`, provinceDropdown);
            }
        });

        // Province to City
        document.getElementById('province').addEventListener('change', function() {
            const provinceId = this.value;
            const cityDropdown = document.getElementById('city');
            const barangayDropdown = document.getElementById('barangay');

            // Reset city and barangay dropdowns
            cityDropdown.innerHTML = '<option value="">Select City</option>';
            barangayDropdown.innerHTML = '<option value="">Select Barangay</option>';

            if (provinceId) {
                loadOptions(`/cities/${provinceId}`, cityDropdown);
            }
        });

        // City to Barangay
        document.getElementById('city').addEventListener('change', function() {
            const cityId = this.value;
            const barangayDropdown = document.getElementById('barangay');

            // Reset barangay dropdown
            barangayDropdown.innerHTML = '<option value="">Select Barangay</option>';

            if (cityId) {
                loadOptions(`/barangays/${cityId}`, barangayDropdown);
            }
        });

        // Handle disabling the program dropdown based on student status
        document.getElementById('is_student').addEventListener('change', function() {
            const programDropdown = document.getElementById('program_id');
            const isStudent = this.value;

            if (isStudent === 'false') {
                programDropdown.disabled = true;
            } else {
                programDropdown.disabled = false;
            }
        });
    </script>

    </x-guest-layout>
