@props([
  'options' => [],
  'placeholder' =>'Pick your poison'
])

<div x-data="{
  selectOpen: false,
  selectedItem: '',
  placeholder: {{ json_encode($placeholder) }},
  selectableItems: {{ json_encode($options) }},
  selectableItemActive: null,
  selectId: $id('select'),
  selectKeydownValue: '',
  selectKeydownTimeout: 1000,
  selectKeydownClearTimeout: null,
  selectDropdownPosition: 'bottom',

  selectableItemIsActive(item) {
    return this.selectableItemActive && this.selectableItemActive.id==item.id;
  },

  selectableItemActiveNext(){
    let index = this.selectableItems.indexOf(this.selectableItemActive);

    if(index < this.selectableItems.length-1){
      this.selectableItemActive = this.selectableItems[index+1];
      this.selectScrollToActiveItem();
    }
  },

  selectableItemActivePrevious(){
    let index = this.selectableItems.indexOf(this.selectableItemActive);

    if(index > 0){
      this.selectableItemActive = this.selectableItems[index-1];
      this.selectScrollToActiveItem();
    }
  },

  selectScrollToActiveItem(){
    if(this.selectableItemActive){
      activeElement = document.getElementById(this.selectableItemActive.id + '-' + this.selectId)
      newScrollPos = (activeElement.offsetTop + activeElement.offsetHeight) - this.$refs.selectableItemsList.offsetHeight;
      if(newScrollPos > 0){
        this.$refs.selectableItemsList.scrollTop=newScrollPos;
      } else {
        this.$refs.selectableItemsList.scrollTop=0;
      }
    }
  },

  selectKeydown(event) {
    if (event.keyCode >= 65 && event.keyCode <= 90) {
      this.selectKeydownValue += event.key;
      selectedItemBestMatch = this.selectItemsFindBestMatch();

      if(selectedItemBestMatch){
        if(this.selectOpen){
          this.selectableItemActive = selectedItemBestMatch;
          this.selectScrollToActiveItem();
        } else {
          this.selectedItem = this.selectableItemActive = selectedItemBestMatch;
        }
      }

      if(this.selectKeydownValue != ''){
        clearTimeout(this.selectKeydownClearTimeout);
        this.selectKeydownClearTimeout = setTimeout(() => {
          this.selectKeydownValue = '';
        }, this.selectKeydownTimeout);
      }
    }
  },

  selectItemsFindBestMatch() {
    typedValue = this.selectKeydownValue.toLowerCase();
    var bestMatch = null;
    var bestMatchIndex = -1;

    for (var i = 0; i < this.selectableItems.length; i++) {
      var title = this.selectableItems[i].option.toLowerCase();
      var index = title.indexOf(typedValue);

      if (index > -1 && (bestMatchIndex == -1 || index < bestMatchIndex) && !this.selectableItems[i].disabled) {
        bestMatch = this.selectableItems[i];
        bestMatchIndex = index;
      }
    }

    return bestMatch;
  },

  selectPositionUpdate() {
    selectDropdownBottomPos = this.$refs.selectButton.getBoundingClientRect().top + this.$refs.selectButton.offsetHeight + parseInt(window.getComputedStyle(this.$refs.selectableItemsList).maxHeight);

    if(window.innerHeight < selectDropdownBottomPos){
      this.selectDropdownPosition = 'top';
    } else {
      this.selectDropdownPosition = 'bottom';
    }
  }
  }"
  x-init="
    $watch('selectOpen', function(){
      if(!selectedItem){
        selectableItemActive=selectableItems[0];
      } else {
        selectableItemActive=selectedItem;
      }

      setTimeout(function(){
        selectScrollToActiveItem();
      }, 10);

      selectPositionUpdate();
      window.addEventListener('resize', (event) => { selectPositionUpdate(); });
    });
  "
  @keydown.escape="if(selectOpen){ selectOpen=false; }"
  @keydown.down="if(selectOpen){ selectableItemActiveNext(); } else { selectOpen=true; } event.preventDefault();"
  @keydown.up="if(selectOpen){ selectableItemActivePrevious(); } else { selectOpen=true; } event.preventDefault();"
  @keydown.enter="selectedItem=selectableItemActive; selectOpen=false;"
  @keydown="selectKeydown($event);"
  class="relative w-full"
  x-modelable="selectedItem"
  {{ $attributes }}>

  <button
    type="button"
    x-ref="selectButton" @click="selectOpen=!selectOpen"
    :class="{ 'focus:ring-1 focus:ring-offset-1 focus:ring-indigo-500' : !selectOpen }"
    class="relative min-h-[38px] flex items-center justify-between w-full py-2.5 pl-3 pr-10 dark:border-gray-700 text-left bg-white dark:bg-gray-900 dark:text-gray-500 border rounded-md shadow-sm cursor-default focus:outline-none text-sm">
    <span
      x-text="selectedItem ? selectedItem.option : '{{ $placeholder }}'"
      class="truncate"
      :class="selectedItem?.option ? 'dark:text-gray-300 text-gray-800' : ''">
      {{ $placeholder }}
    </span>

    <x-tabler-selector
      class="absolute inset-y-0 right-0 flex items-center h-full pr-2 text-gray-400 pointer-events-none" />
  </button>

  <ul
    x-show="selectOpen"
    x-ref="selectableItemsList"
    @click.away="selectOpen = false"
    x-transition:enter="transition ease-out duration-50"
    x-transition:enter-start="opacity-0 -translate-y-1"
    x-transition:enter-end="opacity-100"
    :class="{ 'bottom-1.5 mb-10' : selectDropdownPosition == 'top', 'top-1.5 mt-10' : selectDropdownPosition == 'bottom' }"
    class="absolute w-full py-1 overflow-auto text-sm bg-white rounded-md shadow-md dark:bg-gray-900 dark:text-gray-300 max-h-56 ring-1 ring-black ring-opacity-5 focus:outline-none"
    x-cloak>
    <template x-for="item in selectableItems" :key="item.id">
      <li
        @click="selectedItem=item; selectOpen=false; $refs.selectButton.focus();"
        :id="item.id + '-' + selectId"
        :data-disabled="item.disabled"
        :class="{ 'bg-neutral-100 text-gray-900' : selectableItemIsActive(item), '' : !selectableItemIsActive(item) }"
        @mousemove="selectableItemActive=item"
        class="relative flex items-center h-full hover:bg-gray-200 dark:hover:bg-gray-800 py-2 pl-8 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 select-none data-[disabled]:opacity-50 data-[disabled]:pointer-events-none">
        <x-tabler-check x-show="selectedItem?.id === item.id" class="absolute left-0 w-4 h-4 ml-2 stroke-current text-neutral-400" />
        <span class="block font-medium truncate" x-text="item.option"></span>
      </li>
    </template>
  </ul>

  </div>
