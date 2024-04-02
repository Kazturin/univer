@extends("layouts.app")

@section("wrapper")
    <!--start page wrapper -->
    <div>
            <div class="mb-3">
                <x-breadcrumbs class="mt-2"  :links="[['label'=>'Навигация']]"></x-breadcrumbs>

                <div class="flex justify-between">
                    <h2
                        class="mb-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
                    >
                        Навигация
                    </h2>
                    <div>
                        <a href="{{route('navigation.create')}}" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
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
                <div class="w-full overflow-hidden rounded-lg shadow-lg border-t mb-5">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap shadow-lg">
                        <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                        >
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Parent</th>
                            <th class="px-4 py-3">Url</th>
                            <th class="px-4 py-3">Sort</th>
                            <th class="px-4 py-3">Updated at</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody
                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                        >
                        @foreach($navigations as $nav)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">{{ $nav->name_kz }}</td>
                                <td class="px-4 py-3"> {{ $nav->parent_id }} </td>
                                <td class="px-4 py-3"> {{ $nav->url }} </td>
                                <td class="px-4 py-3"> {{ $nav->sort }} </td>
                                <td class="px-4 py-3"> {{ $nav->updated_at }}</td>
                                <td class="flex items-center space-x-4 text-sm">
                                    <a href="{{ route('navigation.edit', $nav->id) }}"
                                       class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                       aria-label="Edit"
                                       title="{{ __('button.edit') }}"
                                    >
                                        <svg
                                            class="w-5 h-5"
                                            aria-hidden="true"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                        >
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                            ></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('navigation.destroy',$nav->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button
                                            onclick="return confirm('Удалить?')"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete"
                                            title="{{ __('button.delete') }}"
                                        >
                                            <svg
                                                class="w-5 h-5"
                                                aria-hidden="true"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"
                                                ></path>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
@endsection

