<div>
    <div class="grid grid-cols-2 gap-2">
        <div class="flex space-x-4">
            <select wire:model.live="facultyId" name="facultyId" class="flex-initial shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" aria-label="Select faculty">
                <option selected>Факультет</option>
                @foreach($faculties as $faculty)
                    <option value={{ $faculty->FacultyID }}>{{ $faculty->facultyNameKZ }}</option>
                @endforeach
            </select>
            <select wire:model.live="cafedraId" class="flex-initial shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" aria-label="Select cafedra">
                <option selected>Кафедра</option>
                @foreach($cafedras as $cafedra)
                    <option value={{ $cafedra->cafedraID }}>{{ $cafedra->cafedraNameKZ }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex space-x-4">
            <select wire:model.live="status" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" aria-label="Select status">
                <option value=0 {{$status==0 ? 'selected' : ''}}>Работает</option>
                <option value=1 {{$status==1 ? 'selected' : ''}}>Уволен</option>
            </select>
            <div class="col-xl-6">
                <input wire:model.live.debounce.300ms="search" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" name="search" placeholder="Поиск ...">
            </div>
        </div>
    </div>
    <div class="my-2">
        <select wire:model.live="departmentid" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" aria-label="Select faculty">
            <option selected>Структура</option>
            @foreach($departments as $d)
                <option value={{ $d->id }}>{{ $d->nameru }}</option>
            @endforeach
        </select>
    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-lg border-t mb-5">
        <div class="w-full overflow-x-auto">
            <table id="teachersTable" class="w-full whitespace-no-wrap shadow-lg">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Фамилия</th>
                    <th class="px-4 py-3">Имя</th>
                    <th class="px-4 py-3">Отчество</th>
                    <th class="px-4 py-3">Принят</th>
                    <th class="px-4 py-3">Действия</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach($teachers as $teacher)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">{{ $teacher->TutorID }}</td>
                        <td class="px-4 py-3">{{ $teacher->lastname }}</td>
                        <td class="px-4 py-3"> {{ $teacher->firstname }} </td>
                        <td class="px-4 py-3">{{ $teacher->patronymic }}</td>
                        <td class="px-4 py-3">{{ $teacher->StartDate }}</td>
                        <td class="flex items-center">
                            <a href="{{ route('tutor.edit', $teacher->TutorID) }}"
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
                            <a href="{{ route('tutor.show', $teacher->TutorID) }}" title="Смотреть">
                                <i class="lni lni-eye me-1 font-24 text-info"></i>
                            </a>
                            <a href="{{ route('tutor-qualification.index', ['tutor_id' => $teacher->TutorID]) }}" title="Повышения квалификаций">
                                <i class="lni lni-bar-chart me-1 font-24 text-info"></i>
                            </a>
                            <a href="{{ route('tutor-award.index', ['tutor_id' => $teacher->TutorID]) }}" title="Награды">
                                <i class="lni lni-star-empty me-1 font-22 text-info"></i>
                            </a>
                            <form action="{{ route('tutor.destroy',$teacher->TutorID) }}" method="post">
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
        <div class="p-4">
            {{ $teachers->links() }}
        </div>
    </div>

</div>

