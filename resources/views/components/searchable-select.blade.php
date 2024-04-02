@props(['items', 'key', 'value', 'fieldName'])
<div class="p-10 bg-gray-700 text-white">
    <div class="relative text-black" x-data="selectmenu(datalist())" @click.away="close()">
        <input type="text" x-model="selectedkey" name="{{ $fieldName }}" id="{{ $fieldName }}" class="hidden">
        <span class="inline-block w-full rounded-md shadow-sm"
              @click="toggle(); $nextTick(() => $refs.filterinput.focus());">
        <button type="button"
            class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md cursor-default focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
            <span class="block truncate" x-text="selectedlabel ?? 'Please Select'"></span>

            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                    <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round" />
                </svg>
            </span>
        </button>
    </span>

        <div x-show="state" class="absolute z-10 w-full mt-1 bg-white rounded-md shadow-lg p-2">
            <input type="text" class="w-full rounded-md py-1 px-2 mb-1 border border-gray-400" x-model="filter" x-ref="filterinput">
            <ul
                class="py-1 overflow-auto text-base leading-6 rounded-md shadow-xs max-h-60 focus:outline-none sm:text-sm sm:leading-5">

                <template x-for="(value, key) in getlist()" :key="key">

                    <li @click="select(value[selectValue], value[selectKey])" :class="{'bg-gray-100': isselected(value[selectKey])}"
                        class="relative py-1 pl-3 mb-1 text-gray-900 select-none pr-9 hover:bg-gray-100 cursor-pointer rounded-md">
                        <span x-text="value[selectValue]" class="block font-normal truncate"></span>

                        <span x-show="isselected(value[selectKey])"
                              class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-700">
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                  clip-rule="evenodd" />
                        </svg>
                    </span>
                    </li>
                </template>
            </ul>
        </div>
    </div>
</div>

@push('search-scripts')
    <script>
            const selectKey = {{ Illuminate\Support\Js::from($key) }};
            const selectValue = {{ Illuminate\Support\Js::from($value) }};

         //   alert(selectValue);

            function selectmenu(datalist){
                return {
                    state: false,
                    filter: '',
                    list: datalist,
                    selectedkey: null,
                    selectedlabel: null,
                    toggle: function() {
                        this.state = !this.state;
                        this.filter = '';
                    },
                    close: function(){
                        this.state = false;
                    },
                    select: function(value, key){
                        if(this.selectedkey == key){
                            this.selectedlabel = null;
                            this.selectedkey = null;
                        }else{
                            this.selectedlabel = value;
                            this.selectedkey = key;
                            this.state = false;
                        }
                    },
                    isselected: function(key){
                        return this.selectedkey == key;
                    },
                    getlist: function(){
                        if(this.filter == ''){
                            return this.list;
                        }
                        var filtered = this.list.filter(item => {
                            return item[selectValue].toLowerCase().includes(this.filter.toLowerCase())
                        });
                        return filtered;
                    }
                };
            }

            function datalist(){
                return  {{ Illuminate\Support\Js::from($items) }};
            }

    </script>
@endpush
