<x-slot:header>

  <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
    {{ __('Explore projects') }}
  </h2>

  <span class="flex-1"></span>

  <x-secondary-button
    x-on:click.prevent="$dispatch('open-modal', 'create-base-project')"
    x-data="">
    <x-tabler-plus class="h-4 w-4" />

    <span class="ml-2">
      New
    </span>
  </x-secondary-button>

</x-slot>

<div class="py-12">

  <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">

    <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">

      <div class="p-6 text-gray-900 dark:text-gray-100">

        {{-- start --}}

          <div class="flex flex-col items-start justify-between w-full p-4 lg:flex-row lg:p-8 lg:items-stretch">
            <div class="flex flex-col items-start w-full lg:w-1/3 lg:flex-row lg:items-center">
              <div class="flex items-center">
                <button class="p-2 text-gray-600 bg-gray-100 border border-transparent rounded cursor-pointer dark:text-gray-400 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" aria-label="Edit Table" role="button">
                  <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg1.svg" alt="Edit">
                  <img class="hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg1dark.svg" alt="Edit">
                </button>

                <button class="p-2 mx-2 text-gray-600 bg-gray-100 border border-transparent rounded cursor-pointer dark:text-gray-400 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" aria-label="table settings" role="button">
                  <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg2.svg" alt="settings">
                  <img class="hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg2dark.svg" alt="settings">
                </button>

                <button class="p-2 mr-2 text-gray-600 bg-gray-100 border border-transparent rounded cursor-pointer dark:text-gray-400 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" aria-label="Bookmark" role="button">
                  <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg3.svg" alt="Bookmark">
                  <img class="hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg3dark.svg" alt="Bookmark">
                </button>

                <button class="p-2 mr-2 text-gray-600 bg-gray-100 border border-transparent rounded cursor-pointer dark:text-gray-400 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" aria-label="copy table" role="button">
                  <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg4.svg" alt="">
                  <img class="hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg4dark.svg" alt="">
                </button>

                <button class="p-2 text-red-500 bg-gray-100 border border-transparent rounded cursor-pointer dark:bg-gray-700 dark:hover:bg-gray-600 hover:bg-gray-200 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" aria-label="delete table" role="button">
                  <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg5.svg" alt="delete">
                </button>
              </div>
            </div>

            <div class="flex flex-col items-start justify-end w-full lg:w-2/3 lg:flex-row lg:items-center">
              <div class="flex items-center py-3 border-gray-300 lg:border-r lg:py-0 lg:px-4">
                <p class="text-base text-gray-600 dark:text-gray-400" id="page-view">Viewing 1 - 20 of 60</p>

                <button class="ml-2 text-gray-600 border border-transparent rounded cursor-pointer dark:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 " onclick="pageView(false)" aria-label="Goto previous page " role="button">
                  <x-tabler-chevron-left />
                </button>

                <button class="text-gray-600 border border-transparent rounded cursor-pointer dark:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500" aria-label="goto next page" role="button" onclick="pageView(true)">
                  <x-tabler-chevron-right />
                </button>
              </div>

              <div class="flex items-center lg:ml-6">
                <button class="flex items-center h-8 px-5 text-sm text-indigo-700 font-semibold transition duration-150 ease-in-out bg-gray-200 border border-transparent rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 hover:bg-gray-300">
                  <x-tabler-printer />

                  <span class="ml-2">
                    Print
                  </span>
                </button>

                <button role="button" aria-label="add table" class="flex items-center justify-center w-8 h-8 ml-4 text-white transition duration-150 ease-in-out bg-indigo-700 border border-transparent rounded cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 hover:bg-indigo-600">
                  <x-tabler-plus />
                </button>
              </div>
            </div>
          </div>

          <div class="w-full overflow-x-scroll xl:overflow-x-hidden">
            <table class="min-w-full bg-white dark:bg-gray-800">
              <thead>
                <tr class="w-full h-16 py-8 border-b border-gray-300 dark:border-gray-600">

                  <th class="pl-8 pr-6 text-sm font-normal leading-4 tracking-normal text-left text-gray-600 dark:text-gray-400">
                    <input placeholder="check box" type="checkbox" class="relative w-5 h-5 bg-white border border-gray-400 rounded cursor-pointer dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400" onclick="checkAll(this)" />
                  </th>

                  <th role="columnheader" class="uppercase pr-6 text-sm font-medium leading-4 tracking-normal text-left text-gray-600 dark:text-gray-400">
                    Project Name
                  </th>

                  <th role="columnheader" class="uppercase pr-6 text-sm font-medium leading-4 tracking-normal text-left text-gray-600 dark:text-gray-400">
                    Client
                  </th>

                  <th role="columnheader" class="uppercase pr-6 text-sm font-medium leading-4 tracking-normal text-left text-gray-600 dark:text-gray-400">
                    Company Contact
                  </th>

                  <th class="pr-6 text-sm font-medium leading-4 tracking-normal text-left text-gray-600 dark:text-gray-400">
                    <div class="w-2 h-2 bg-indigo-400 rounded-full opacity-0"></div>
                  </th>

                  <td role="columnheader" class="uppercase pr-8 text-sm text-right font-medium leading-4 tracking-normal text-gray-600 dark:text-gray-400">
                    {{-- More --}}
                  </td>
                </tr>
              </thead>

              <tbody>

                @foreach ($projects as $project)

                  <tr class="h-16 border-b border-gray-300 dark:border-gray-600">
                    <td class="pl-8 pr-6 text-sm leading-4 tracking-normal text-left text-gray-800 whitespace-no-wrap dark:text-gray-100">
                      <input placeholder="check box" type="checkbox" class="relative w-5 h-5 bg-white border border-gray-400 rounded cursor-pointer dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400" onclick="tableInteract(this)" />
                    </td>

                    <td class="pr-6 text-sm leading-4 tracking-normal text-gray-800 whitespace-no-wrap dark:text-gray-100">
                      {{ $project->name }}
                    </td>

                    <td class="pr-6 text-sm leading-4 tracking-normal text-gray-800 whitespace-no-wrap dark:text-gray-100">
                      {{ $project->company->name }}
                    </td>

                    <td class="pr-6 whitespace-no-wrap">
                      <div class="flex items-center">
                        <div class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-200 shadow">
                          <x-tabler-user class="overflow-hidden h-7 w-7" />
                        </div>

                        <p class="ml-2 text-sm leading-4 tracking-normal text-gray-800 dark:text-gray-100">
                          {{ $project->contact->first_name . ' ' . $project->contact->last_name }}
                        </p>
                      </div>
                    </td>

                    <td class="pr-6">
                      <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                    </td>

                    <td
                      class="relative pr-8 text-right">
                      <div
                        x-data="{ open: false }">
                      <button @click="open = !open" aria-label="dropdown" role="button" class="text-gray-500 border border-transparent rounded cursor-pointer dropbtn focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400" aria-label="Options expandable" role="button">
                        <x-tabler-dots-vertical />
                      </button>

                      <div x-show="open" class="absolute left-0 z-10 hidden w-32 mt-1 -ml-12 shadow-md dropdown-content">
                        <ul class="py-1 bg-white rounded shadow dark:bg-gray-800">
                          <li class="px-3 py-3 text-sm font-normal leading-3 tracking-normal text-gray-600 cursor-pointer dark:text-gray-400 hover:bg-indigo-700 hover:text-white">Edit</li>
                          <li class="px-3 py-3 text-sm font-normal leading-3 tracking-normal text-gray-600 cursor-pointer dark:text-gray-400 hover:bg-indigo-700 hover:text-white">Delete</li>
                          <li class="px-3 py-3 text-sm font-normal leading-3 tracking-normal text-gray-600 cursor-pointer dark:text-gray-400 hover:bg-indigo-700 hover:text-white">Duplicate</li>
                        </ul>
                      </div>
                    </div>
                    </td>
                  </tr>

                @endforeach

              </tbody>
            </table>
          </div>

        {{-- end --}}

      </div>

    </div>

  </div>

</div>

<script>
  function dropdownFunction(element) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    let list = element.parentElement.parentElement.getElementsByClassName("dropdown-content")[0];
    for (i = 0; i < dropdowns.length; i++) {
      dropdowns[i].classList.add("hidden");
    }
    list.classList.toggle("hidden");
  }
  window.onclick = function(event) {
    if (!event.target.matches(".dropbtn")) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        openDropdown.classList.add("hidden");
      }
    }
  };

  function checkAll(element) {
    let rows = element.parentElement.parentElement.parentElement.nextElementSibling.children;
    for (var i = 0; i < rows.length; i++) {
      if (element.checked) {
        rows[i].classList.add("bg-gray-100");
        rows[i].classList.add("dark:bg-gray-700");
        let checkbox = rows[i].getElementsByTagName("input")[0];
        if (checkbox) {
          checkbox.checked = true;
        }
      } else {
        rows[i].classList.remove("bg-gray-100");
        rows[i].classList.remove("dark:bg-gray-700");
        let checkbox = rows[i].getElementsByTagName("input")[0];
        if (checkbox) {
          checkbox.checked = false;
        }
      }
    }
  }

  function tableInteract(element) {
    var single = element.parentElement.parentElement;
    single.classList.toggle("bg-gray-100");
    single.classList.toggle("dark:bg-gray-700");
  }
  let temp = 0;

  function pageView(val) {
    let text = document.getElementById("page-view");
    if (val) {
      if (temp === 2) {
        temp = 0;
      } else {
        temp = temp + 1;
      }
    } else if (temp !== 0) {
      temp = temp - 1;
    }
    switch (temp) {
      case 0:
        text.innerHTML = "Viewing 1 - 20 of 60";
        break;
      case 1:
        text.innerHTML = "Viewing 21 - 40 of 60";
        break;
      case 2:
        text.innerHTML = "Viewing 41 - 60 of 60";
      default:
    }
  }

</script>
