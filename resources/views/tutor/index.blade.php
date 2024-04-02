@extends("layouts.app")

@section("wrapper")

    <div class="mb-3">
        <x-breadcrumbs class="mt-2" :links="[['label'=>'ППС и сотрудники']]"></x-breadcrumbs>

        <div class="flex justify-between">
            <h2
                class="mb-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
                ППС и сотрудники
            </h2>
            <div>
                <a href="{{route('tutor.create')}}" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    {{ __('button.add') }}
                    <span class="ml-2" aria-hidden="true">+</span>
                </a>
            </div>
        </div>
    </div>

                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                    @if(session()->get('success'))
                        <div class="font-regular relative block w-full rounded-lg bg-green-500 p-4 mb-4 text-base leading-5 text-white opacity-100"
                             data-dismissible="alert">
                            <div class="mr-12">{{ session()->get('success') }}</div>
                            <div class="absolute top-2.5 right-3 w-max rounded-lg transition-all hover:bg-white hover:bg-opacity-20"
                                 data-dismissible-target="alert">
                                <button role="button" class="w-max rounded-lg p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </button>
                            </div>
                        </div>
                    @endif
                    <div>
                        <livewire:tutors-table/>
                    </div>
                </div>
@endsection

