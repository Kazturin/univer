 <div class="flex flex-col sm:flex-row w-full">
        <div class="flex-basis shrink-0">
            <img class="block w-48 rounded-md mx-auto mb-2" src="data:image/jpeg;base64,{{$manager->decanphoto}}" alt="person">
        </div>
        <div class="flex flex-col grow">
            <h1 class="font-ptserif text-xl text-center">{{ app()->getLocale()=='en' ? $manager->decanlastnameen.' '.$manager->decanfirsnameen : $manager->decanlastname.' '.$manager->decanfirsname.' '.$manager->decanpatronymic  }}</h1>
            <span class="mt-3 text-md text-center text-sky-900 font-semibold"> {{ __('site.dean') }}</span>
            <ul class="px-7 font-montserrat_regular">
                <li class="flex flex-row text-sky-800 my-4">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                        </svg>
                    </div>
                    <span class="text-sm mx-2 text-black">{{$manager->decanregal}}</span>
                </li>
                <li class="flex flex-row text-sky-800 my-4">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <span class="text-sm mx-2 text-black">{{$manager->phone}}</span>
                </li>
                <li class="flex flex-row text-sky-800 my-4">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </div>
                    <span class="text-sm mx-2 text-black">{{$manager->email}}</span>
                </li>
{{--                <li class="flex flex-row text-sky-800 my-4">--}}
{{--                    <div>--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                    <span class="text-sm mx-2 text-black"></span>--}}
{{--                </li>--}}
            </ul>
        </div>
 </div>
