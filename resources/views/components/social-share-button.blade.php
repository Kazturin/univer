<div class="p-4">
    <div class="p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>
                <h2 class="mb-2 text-xl font-semibold text-center text-gray-700">{{ __('site.share') }}</h2>
{{--                <div class="flex flex-wrap justify-center gap-2">--}}
{{--                    <a href="https://www.facebook.com/sharer.php?url={{ urlencode($url) }}&text={{ urlencode($text) }}" target="_blank" rel="noopener">--}}
{{--                        <button class="bg-blue-500 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded">--}}
{{--                            <svg class="w-5 h-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" /></svg>--}}
{{--                        </button>--}}
{{--                    </a>--}}
{{--                    <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text={{ urlencode($text) }}" target="_blank" rel="noopener">--}}
{{--                        <button class="bg-blue-400 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded">--}}
{{--                            <svg class="w-5 h-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" /></svg>--}}
{{--                        </button>--}}
{{--                    </a>--}}
{{--                    <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text={{ urlencode($text) }}" target="_blank" rel="noopener">--}}
{{--                         <button class="bg-blue-400 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded">--}}
{{--                             <svg class="w-5 h-5 fill-current" viewBox="0 0 256 256" id="IconChangeColor" height="36" width="36"><rect width="256" height="256" fill="none"></rect><path d="M88,134.9,177.9,214a8,8,0,0,0,13.1-4.2L228.6,45.6a8,8,0,0,0-10.7-9.2L33.3,108.9c-7.4,2.9-6.4,13.7,1.4,15.3Z" fill="#ffffff" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8" id="mainIconPathAttribute"></path><line x1="88" y1="134.9" x2="224.1" y2="36.6" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"></line><path d="M132.9,174.4l-31.2,31.2A8,8,0,0,1,88,200V134.9" fill="#ffffff" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8" id="mainIconPathAttribute"></path></svg>--}}
{{--                         </button>--}}
{{--                    </a>--}}
{{--                </div>--}}
                <ul class="flex justify-center space-x-6">
                    <li>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}" target="_blank" rel="noopener" class="text-gray-700 hover:text-blue-500">
                            <img src="https://cdn.icon-icons.com/icons2/836/PNG/512/Facebook_icon-icons.com_66805.png" alt="Facebook" class="w-8 h-8">
                        </a>
                    </li>
                    <li>
                        <a href="http://twitter.com/share?url={{ urlencode($url) }}&text={{ urlencode($text) }}" class="text-gray-700 hover:text-blue-500">
                            <img src="/img/icons/twitter.png" alt="Twitter" class="w-8 h-8">
                        </a>
                    </li>
                    <li>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($text) }}" class="text-gray-700 hover:text-green-500">
                            <img src="/img/icons/whatsapp.png" alt="WhatsApp" class="w-8 h-8">
                        </a>
                    </li>
                    <li>
                        <a href="https://telegram.me/share/url?url={{ urlencode($url) }}&text={{ urlencode($text) }}" class="text-gray-700 hover:text-blue-400">
                            <img src="/img/icons/telegram.png" alt="Telegram" class="w-8 h-8">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


