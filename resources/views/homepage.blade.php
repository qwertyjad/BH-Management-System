<x-guest-layout>


    <!-- Navigation Bar -->
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 mr-2" />
                <a class="font-bold text-xl color-green" href="{{url('/')}}">BoardingHouseMS</a>
            </div>
            <div class="flex items-center">
                <form id="preferencesForm" method="GET" action="{{ route('search') }}" class="flex items-center space-x-2">
                    <div class="relative flex-grow max-w-xs">
                        <input
                            type="text"
                            name="search"
                            placeholder="Search..."
                            class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-l-full focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400"
                        />
                        <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3" id="dropdownBgHoverButton" data-dropdown-toggle="dropdownBgHover">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-orange-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" />
                            </svg>
                        </button>
                    </div>

                    <div id="dropdownBgHover" class="z-10 hidden w-96 bg-white rounded-lg shadow-lg dark:bg-gray-700">
                        <ul class="p-4 space-y-4 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownBgHoverButton">
                            @foreach ($preferences->groupBy('category') as $category => $prefs)
                                <li>
                                    <span class="font-semibold text-gray-900 dark:text-gray-300">{{ ucfirst($category) }}</span>
                                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4 mt-2">
                                        @foreach ($prefs as $preference)
                                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <input id="preference-{{ $preference->id }}" name="preferences[]" type="checkbox" value="{{ $preference->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="preference-{{ $preference->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $preference->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>


                    <div>
                        <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded-full hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">Search</button>
                    </div>
                </form>


                <script>
                    // Handle dropdown toggle
                    document.getElementById('dropdownBgHoverButton').addEventListener('click', function() {
                        const dropdown = document.getElementById('dropdownBgHover');
                        dropdown.classList.toggle('hidden'); // Toggle dropdown visibility
                    });

                    // Optional: Close dropdown if clicked outside
                    window.addEventListener('click', function(event) {
                        const dropdown = document.getElementById('dropdownBgHover');
                        if (!event.target.closest('#dropdownBgHover') && !event.target.closest('#dropdownBgHoverButton')) {
                            dropdown.classList.add('hidden'); // Close dropdown
                        }
                    });
                </script>



                <a href="{{ route('/register-user') }}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-1 focus:outline-none focus:ring-green-300 font-bold rounded-full text-sm px-5 py-2.5 shadow-lg shadow-green-500/50 transition duration-200 ease-in-out ml-2">
                    Register
                </a>

                <a href="{{ route('welcome') }}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-1 focus:outline-none focus:ring-green-300 font-bold rounded-full text-sm px-5 py-2.5 shadow-lg shadow-green-500/50 transition duration-200 ease-in-out ml-2">
                    LogIn
                </a>
            </div>
        </div>
    </nav>


    <div class="flex p-5 container mx-auto">
        <!-- Sidebar -->
        <aside class="w-full md:w-64 bg-gray-200 border-r border-gray-300 p-4 hidden md:block rounded-lg shadow-md mx-auto">
            <h3 class="text-lg text-gray-800 font-bold mb-4 text-center">News & Updates</h3>
            <ul class="list-none p-0">
                <li class="mb-4">
                    <a href="#" class="text-green-600 hover:underline font-bold text-center">Latest Updates on Housing</a>
                    <p class="text-gray-600 text-sm mt-1 text-justify">Stay informed about the latest regulations and developments affecting housing in your area.</p>
                </li>
                <li class="mb-4">
                    <a href="#" class="text-green-600 hover:underline font-bold text-center">Tips for New Renters</a>
                    <p class="text-gray-600 text-sm mt-1 text-justify">Discover essential tips and tricks to make your renting experience smoother and hassle-free.</p>
                </li>
                <li class="mb-4">
                    <a href="#" class="text-green-600 hover:underline font-bold text-center">Community Events</a>
                    <p class="text-gray-600 text-sm mt-1 text-justify">Join us for exciting community events designed to bring neighbors together.</p>
                </li>
                <li class="mb-4">
                    <a href="#" class="text-green-600 hover:underline font-bold text-center">Understanding Your Lease</a>
                    <p class="text-gray-600 text-sm mt-1 text-justify">A comprehensive guide to understanding your rental agreement and what to look out for.</p>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 pl-5">
            <div class="flex flex-wrap gap-6 justify-center">
                @foreach($boardingHouses as $house)
                    <div class="w-92  max-w-sm h-92 border border-gray-300 rounded-lg overflow-hidden bg-white shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="flex justify-center"> <!-- Centering the image -->
                            @if($house->background_image)
                                <img src="{{ asset('storage/' . $house->background_image) }}"  alt="{{ $house->name }}" class="w-full h-48 object-cover">
                            @else
                                <img src="{{ asset('images/placeholder.png') }}" alt="Placeholder" class="w-full h-48 object-cover">
                            @endif
                        </div>
                        <div class="p-4">
                            <h5 class="text-lg font-bold text-gray-800">{{ $house->name }}</h5>
                            <p class="text-gray-600"><i>{{ $house->address }}</i></p>
                            <div class="flex flex-wrap gap-2 mt-2">
                                <div class="relative overflow-hidden whitespace-nowrap">
                                    <div class="flex space-x-4 animate-scroll">
                                        @foreach($house->preferences as $preference)
                                            <span class="bg-green-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full whitespace-nowrap">{{ $preference->name }}</span>
                                        @endforeach
                                        <!-- Duplicate the items to make the scroll loop seamless -->
                                        @foreach($house->preferences as $preference)
                                            <span class="bg-green-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full whitespace-nowrap">{{ $preference->name }}</span>
                                        @endforeach
                                    </div>
                                </div>

                                <style>
                                    /* Define the scroll animation */
                                    @keyframes scroll {
                                        0% { transform: translateX(0); }
                                        100% { transform: translateX(-100%); }
                                    }

                                    /* Apply animation to the scrolling container */
                                    .animate-scroll {
                                        animation: scroll 15s linear infinite;
                                    }
                                </style>

                            </div>


                            <label for="modal{{ $house->id }}" class="mt-3 block w-full bg-green-600 text-white py-2 rounded cursor-pointer hover:bg-green-700 transition-colors text-center">View Details</label>

                        </div>
                    </div>


                        <!-- Modal -->
                        <input type="checkbox" id="modal{{ $house->id }}" class="modal-toggle hidden">
                        <div class="modal fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center">
                            <div class="bg-white p-5 rounded-lg w-11/12 max-w-3xl overflow-hidden">
                                <div class="flex justify-between items-center">
                                    <h5 class="text-xl font-bold">{{ $house->name }} Details</h5>
                                    <label for="modal{{ $house->id }}" class="bg-transparent border-none text-xl cursor-pointer">&times;</label>
                                </div>

                                <!-- Carousel Container -->
                                <div class="relative mt-3 mb-4">
                                    <div class="overflow-hidden relative">
                                        <div class="carousel-container flex transition-transform duration-300" id="carousel{{ $house->id }}">
                                            @foreach ($house->rooms as $room)
                                                <div class="carousel-item w-full flex-shrink-0 flex flex-col items-center"> <!-- Center items -->
                                                    <div class="grid grid-cols-2 gap-4"> <!-- 2x2 Grid for images -->
                                                        @php
                                                            $images = [
                                                                $room->room_image_1,
                                                                $room->room_image_2,
                                                                $room->room_image_3,
                                                                $room->room_image_4,
                                                            ];
                                                        @endphp
                                                        @foreach ($images as $image)
                                                            <div class="flex justify-center"> <!-- Center image -->
                                                                <div class="w-80 h-52"> <!-- Increase width and height for a larger image container -->
                                                                    @if($image && file_exists(public_path('storage/' . $image))) <!-- Check if image exists -->
                                                                        <img src="{{ asset('storage/' . $image) }}" alt="{{ $room->name }}" class="w-full h-full object-cover rounded"> <!-- Adjust to full width and height -->
                                                                    @else <!-- Placeholder if no image -->
                                                                        <img src="{{ asset('images/y9DpT.jpg') }}" alt="Placeholder" class="w-full h-full object-cover rounded"> <!-- Adjust to full width and height -->
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <!-- Room Details and Button -->
                                                    <div class="relative w-full mt-2"> <!-- Relative positioning for button -->
                                                        <div class="flex flex-col text-left"> <!-- Flex column for room details -->
                                                            <h6 class="font-bold text-lg">Room {{ $room->name }}</h6>
                                                            <p class="mt-1"><strong>Price:</strong> ${{ $room->price }}</p>
                                                            <p><strong>Available:</strong> {{ !$room->is_occupied ? 'Yes' : 'No' }}</p>
                                                            <p><strong>Vacancy:</strong> {{ $room->capacity }}</p>
                                                            <p><strong>Capacity:</strong> {{ $room->vacancy }}</p>
                                                        </div>




                                                 <div>

                                              </div>


                                               @if (auth()->guard('web')->check())
                                               <a
                                               href="{{ route('user.room-details', $room->id) }}"
                                                class="absolute bottom-0 right-0 bg-green-700 text-white py-2 px-4 rounded hover:bg-green-800 transition-colors"

                                              >
                                                reserve Now
                                           </a>
                                               @else
                                               <a
                                               href="{{ route('login') }}"
                                                class="absolute bottom-0 right-0 bg-green-700 text-white py-2 px-4 rounded hover:bg-green-800 transition-colors"

                                              >
                                                reserve Now
                                           </a>
                                               @endif



                                                       <!-- Button at bottom right -->
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Navigation Controls -->
                                        @if ($house->rooms->count() > 1) <!-- Only show navigation buttons if there are multiple rooms -->
                                            <div class="absolute top-1/2 transform -translate-y-1/2 left-4">
                                                <button class="btn btn-circle bg-gray-800 text-white hover:bg-gray-600"
                                                    onclick="moveCarousel('{{ $house->id }}', -1)">❮</button> <!-- Previous Button -->
                                            </div>
                                            <div class="absolute top-1/2 transform -translate-y-1/2 right-4">
                                                <button class="btn btn-circle bg-gray-800 text-white hover:bg-gray-600"
                                                    onclick="moveCarousel('{{ $house->id }}', 1)">❯</button> <!-- Next Button -->
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </main>
    </div>

    <script>
        function moveCarousel(houseId, direction) {
            const carousel = document.getElementById('carousel' + houseId);
            const items = carousel.children;
            const itemCount = items.length;
            let index = 0;

            // Find current index
            for (let i = 0; i < itemCount; i++) {
                if (items[i].classList.contains('active')) {
                    index = i;
                    items[i].classList.remove('active');
                    break;
                }
            }

            // Update index based on direction
            index = (index + direction + itemCount) % itemCount;

            // Move carousel
            carousel.style.transform = `translateX(-${index * 100}%)`;
            items[index].classList.add('active');
        }
    </script>

</x-guest-layout>
