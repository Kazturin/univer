<div class="container mx-auto">
    <div wire:loading>
        Saving post...
    </div>
    <div class="grid grid-cols-1 gap-4 xl:grid-cols-6">
                <div class="xl:col-span-2 bg-white border rounded-lg shadow">
                    <ul class="py-2 px-4">
                        @foreach($groups as $key=>$group)
                            <li role="button" wire:click="selectGroup({{ $key }})" class="border-b my-2 pb-2">
                                <div>
                                    Поток:{{$group->groupname}}
                                </div>
                                <div>
                                    Группа:{{$group->group_name}}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
        <div class="xl:col-span-4">
            <div class="bg-white border rounded-lg shadow">
                <div x-data="{
            openTab: 1,
            activeClasses: 'border-l border-t border-r rounded-t text-blue-700',
            inactiveClasses: 'text-blue-500 hover:text-blue-700'
        }" class="p-6">
                    <ul class="flex border-b">
                        <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }" class="-mb-px mr-1">
                            <a href="#" :class="openTab === 1 ? activeClasses : inactiveClasses"
                               class="bg-white inline-block py-2 px-4 font-semibold">
                                СРО
                            </a>
                        </li>
                        <li @click="openTab = 2" :class="{ '-mb-px': openTab === 2 }" class="mr-1">
                            <!-- Set active class by using :class provided by Alpine -->
                            <a href="#" :class="openTab === 2 ? activeClasses : inactiveClasses"
                               class="bg-white inline-block py-2 px-4 font-semibold">
                                Журнал
                            </a>
                        </li>
                    </ul>
                    <div class="w-full">
                        <div x-show="openTab === 1">
                            @if($journal)
                                <ul class="flex my-4">
                                    @for ($i = 0; $i < $journal->weeks; $i++)
                                        <li role="button" wire:click="selectWeek({{ $i+1 }})" class="py-2 px-3 border border-purple-500 {{ $i+1==$current_week?'bg-purple-600 text-white':'bg-white text-purple-500' }} ">{{ $i+1 }}</li>
                                    @endfor
                                </ul>
                                {{--                            {{ $journal_detail }}--}}
                                <div class="font-bold mb-4">Электронный журнал № {{ $journal->c_jorn }}({{ $current_journal_detail->first()->d_start.' - '.$current_journal_detail->first()->d_end }})</div>
                                <div>
                                    <div class="w-full overflow-hidden rounded-lg shadow-lg border-t mb-5">
                                        <div class="w-full overflow-x-auto">
                                    <table class="w-full shadow-lg">
                                        <thead>
                                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            <th  class="px-4 py-3" rowspan="2">
                                                ФИО обучающегося
                                            </th>
                                            <th  class="px-4 py-3" rowspan="2">
                                                Текущая
                                            </th>
                                            @foreach($current_journal_detail as $j)
                                                @if($j->type<4 || $j->max!=0 )
                                                    <th  {{ $j->type<4?'colspan=2':'' }} class="text-center px-4 py-3">
                                                        {{ $j->type_str.'('.$j->max.')' }}
                                                    </th>
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            @foreach($current_journal_detail as $j)
                                                @if($j->type<4 )
                                                    <th class="text-center px-4 py-3">Просп</th>
                                                    <th class="text-center px-4 py-3">Оценка</th>
                                                @elseif($j->max!=0)
                                                    <th class="text-center px-4 py-3">Оценка</th>
                                                @endif
                                            @endforeach
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                        @foreach($students as $student)
                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="text-center px-4 py-3">
                                                    {{ $student->lastname }}
                                                </td>
                                                <td class="text-center px-4 py-3">
                                                    {{ $this->test($student->journalDetails[0]->c_stud) }}
                                                </td>
                                                @foreach($student->journalDetails as $jd)
                                                    @if($jd->type<4 )
                                                        <td class="text-center px-4 py-3">{{ $jd->posesh }}</td>
                                                        <td class="text-center px-4 py-3">
                                                            <input
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                                                type="number"
                                                                min="0" max="100"
                                                                wire:keydown.enter="setGrade({{ $jd->c_jorn_det }},$event.target.value)">
                                                        </td>
                                                    @elseif($jd->max!=0)
                                                        <td class="text-center px-4 py-3">
                                                            <input
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                                                type="number"
                                                                min="0"
                                                                max="100"
                                                                wire:keydown.enter="setGrade({{ $jd->c_jorn_det }},$event.target.value)">
                                                        </td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div>
                                    Журнал не найден ...
                                </div>
                            @endif
                        </div>
                        <div x-show="openTab === 2">
                            Пусто ...
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
</div>
