  <div class="mx-auto container bg-white dark:bg-gray-800 dark:bg-gray-800 shadow rounded">
    <div class="flex flex-col lg:flex-row p-4 lg:p-8 justify-between items-start lg:items-stretch w-full">
      <div class="w-full lg:w-1/3 flex flex-col lg:flex-row items-start lg:items-center">
        <div class="flex items-center">
          <button class="text-gray-600 dark:text-gray-400 p-2 border-transparent border bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" aria-label="Edit Table" role="button">
            <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg1.svg" alt="Edit">
            <img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg1dark.svg" alt="Edit">
          </button>
          <button class="text-gray-600 dark:text-gray-400 mx-2 p-2 border-transparent border bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" aria-label="table settings" role="button">
            <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg2.svg" alt="settings">
            <img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg2dark.svg" alt="settings">
          </button>
          <button class="text-gray-600 dark:text-gray-400 mr-2 p-2 border-transparent border bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" aria-label="Bookmark" role="button">
            <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg3.svg" alt="Bookmark">
            <img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg3dark.svg" alt="Bookmark">
          </button>
          <button class="text-gray-600 dark:text-gray-400 mr-2 p-2 border-transparent border bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" aria-label="copy table" role="button">
            <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg4.svg" alt="">
            <img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg4dark.svg" alt="">
          </button>
          <button class="text-red-500 p-2 border-transparent border bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" aria-label="delete table" role="button">
            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg5.svg" alt="delete">
          </button>
        </div>
      </div>
      <div class="w-full lg:w-2/3 flex flex-col lg:flex-row items-start lg:items-center justify-end">
        <div class="flex items-center lg:border-l lg:border-r border-gray-300 py-3 lg:py-0 lg:px-6">
          <p class="text-base text-gray-600 dark:text-gray-400" id="page-view">Viewing 1 - 20 of 60</p>
          <button class="text-gray-600 dark:text-gray-400 ml-2 border-transparent border cursor-pointer rounded focus:outline-none focus:ring-2 focus:ring-gray-500 " onclick="pageView(false)" aria-label="Goto previous page " role="button">
            <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg6.svg" alt="">
            <img class="dark:block hidden" src="../svgs/svg6dark.svg" alt="">
          </button>
          <button class="text-gray-600 dark:text-gray-400 border-transparent border rounded focus:outline-none focus:ring-2 focus:ring-gray-500 cursor-pointer" aria-label="goto next page" role="button" onclick="pageView(true)">
            <img class="transform rotate-180 dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg6.svg" alt="">
            <img class="transform rotate-180 dark:block hidden" src="../svgs/svg6dark.svg" alt="">
          </button>
        </div>
        <div class="flex items-center lg:border-r border-gray-300 pb-3 lg:pb-0 lg:px-6">
          <div class="relative w-32 z-10">
            <div class="pointer-events-none text-gray-600 dark:text-gray-400 absolute inset-0 m-auto mr-2 xl:mr-4 z-0 w-5 h-5">
              <img class="transform -rotate-90 dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg6.svg" alt="">
              <img class="transform -rotate-90 dark:block hidden" src="../svgs/svg6dark.svg" alt="">
            </div>

            <select aria-label="Selected tab" class="focus:outline-none border border-transparent focus:border-gray-800 focus:shadow-outline-gray text-base form-select block w-full py-2 px-2 xl:px-3 rounded text-gray-600 dark:text-gray-400 appearance-none bg-transparent">
              <option>List View</option>
              <option>Grid View</option>
            </select>
          </div>
        </div>

        <div class="lg:ml-6 flex items-center">
          <button class="bg-gray-200 transition duration-150 ease-in-out focus:outline-none border border-transparent focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 hover:bg-gray-300 rounded text-indigo-700 px-5 h-8 flex items-center text-sm">Download All</button>
          <button role="button" aria-label="add table" class="text-white ml-4 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 border border-transparent bg-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 w-8 h-8 rounded flex items-center justify-center">
            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg7.svg" alt="plus">
          </button>
        </div>
      </div>
    </div>
    <div class="w-full overflow-x-scroll xl:overflow-x-hidden">
      <table class="min-w-full bg-white dark:bg-gray-800">
        <thead>
          <tr class="w-full h-16 border-gray-300 border-b py-8">
            <th class="pl-8 text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">
              <input placeholder="check box" type="checkbox" class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white dark:bg-gray-800 focus:outline-none focus:outline-none focus:ring-2  focus:ring-gray-400" onclick="checkAll(this)" />
            </th>
            <th class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">
              <div class="text-gray-600 dark:text-gray-400 opacity-0 cursor-default relative w-10">
                <div class="absolute top-0 right-0 w-5 h-5 mr-2 -mt-1 rounded-full bg-indigo-700 text-white flex justify-center items-center text-xs">3</div>
                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg8.svg" alt="icon-tabler-file">
                <img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg8dark.svg" alt="icon-tabler-file">
              </div>
            </th>
            <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Invoice Number</th>
            <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Client</th>
            <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Company Contact</th>
            <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Amount</th>
            <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Date</th>
            <th class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">
              <div class="opacity-0 w-2 h-2 rounded-full bg-indigo-400"></div>
            </th>
            <td role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-8 text-left text-sm tracking-normal leading-4">More</td>
          </tr>
        </thead>
        <tbody>
          <tr class="h-24 border-gray-300 border-b">
            <td class="pl-8 pr-6 text-left whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
              <input placeholder="check box" type="checkbox" class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white dark:bg-gray-800 focus:outline-none focus:outline-none focus:ring-2  focus:ring-gray-400" onclick="tableInteract(this)" />
            </td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
              <div aria-label="documents" role="contentinfo" class="relative w-10 text-gray-600 dark:text-gray-400">
                <div class="absolute top-0 right-0 w-5 h-5 mr-2 -mt-1 rounded-full bg-indigo-700 text-white flex justify-center items-center text-xs">3</div>
                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg8.svg" alt="icon-tabler-file">
                <img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg8dark.svg" alt="icon-tabler-file">
              </div>
            </td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">#MC10023</td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">Toyota Motors</td>
            <td class="pr-6 whitespace-no-wrap">
              <div class="flex items-center">
                <div class="h-8 w-8">
                  <img src="https://tuk-cdn.s3.amazonaws.com/assets/components/advance_tables/at_1.png" alt="Display Avatar of Carrie Anthony" role="img" class="h-full w-full rounded-full overflow-hidden shadow" />
                </div>
                <p class="ml-2 text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-sm">Carrie Anthony</p>
              </div>
            </td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">$2,500</td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">02.03.20</td>
            <td class="pr-6">
              <div class="w-2 h-2 rounded-full bg-indigo-400"></div>
            </td>
            <td class="pr-8 relative">
              <button onclick="dropdownFunction(this)" aria-label="dropdown" role="button" class="dropbtn text-gray-500 rounded cursor-pointer border border-transparent  focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400">
                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg9.svg" alt="dropdown">
              </button>
              <div class="dropdown-content mt-1 absolute left-0 -ml-12 shadow-md z-10 hidden w-32">
                <ul class="bg-white dark:bg-gray-800 shadow rounded py-1">
                  <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Edit</li>
                  <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Delete</li>
                  <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Duplicate</li>
                </ul>
              </div>
            </td>
          </tr>
          <tr class="h-24 border-gray-300 border-b">
            <td class="pl-8 pr-6 text-left whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
              <input placeholder="check box" type="checkbox" class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white dark:bg-gray-800 focus:outline-none focus:outline-none focus:ring-2  focus:ring-gray-400" onclick="tableInteract(this)" />
            </td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
              <div class="text-gray-400 relative w-10">
                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg8.svg" alt="icon-tabler-file">
                <img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg8dark.svg" alt="icon-tabler-file">
              </div>
            </td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">#MC10023</td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">Toyota Motors</td>
            <td class="pr-6 whitespace-no-wrap">
              <div class="flex items-center">
                <div class="h-8 w-8">
                  <img src="https://tuk-cdn.s3.amazonaws.com/assets/components/advance_tables/at_2.png" alt="Display Avatar of Carrie Anthony" role="img" class="h-full w-full rounded-full overflow-hidden shadow" />
                </div>
                <p class="ml-2 text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-sm">Carrie Anthony</p>
              </div>
            </td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">$2,500</td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">02.03.20</td>
            <td class="pr-6">
              <div class="w-2 h-2 rounded-full bg-red-400"></div>
            </td>
            <td class="pr-8 relative">
              <button onclick="dropdownFunction(this)" aria-label="dropdown" role="button" class="dropbtn text-gray-500 rounded cursor-pointer border border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400" aria-label="Options expandable" role="button">
                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg9.svg" alt="dropdown">
              </button>
              <div class="dropdown-content mt-1 absolute left-0 -ml-12 shadow-md z-10 hidden w-32">
                <ul class="bg-white dark:bg-gray-800 shadow rounded py-1">
                  <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Edit</li>
                  <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Delete</li>
                  <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Duplicate</li>
                </ul>
              </div>
            </td>
          </tr>
          <tr class="h-24 border-gray-300 border-b">
            <td class="pl-8 pr-6 text-left whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
              <input placeholder="check box" type="checkbox" class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white dark:bg-gray-800 focus:outline-none focus:outline-none focus:ring-2  focus:ring-gray-400" onclick="tableInteract(this)" />
            </td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
              <div class="text-gray-400 relative w-10">
                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg8.svg" alt="icon-tabler-file">
                <img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg8dark.svg" alt="icon-tabler-file">
              </div>
            </td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">#MC10023</td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">Toyota Motors</td>
            <td class="pr-6 whitespace-no-wrap">
              <div class="flex items-center">
                <div class="h-8 w-8">
                  <img src="https://tuk-cdn.s3.amazonaws.com/assets/components/advance_tables/at_3.png" alt="Display Avatar of Carrie Anthony" role="img" class="h-full w-full rounded-full overflow-hidden shadow" />
                </div>
                <p class="ml-2 text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-sm">Carrie Anthony</p>
              </div>
            </td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">$2,500</td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">02.03.20</td>
            <td class="pr-6">
              <div class="w-2 h-2 rounded-full bg-indigo-400"></div>
            </td>
            <td class="pr-8 relative">
              <button onclick="dropdownFunction(this)" aria-label="dropdown" role="button" class="dropbtn text-gray-500 rounded cursor-pointer border border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400">
                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg9.svg" alt="dropdown">
              </button>
              <div class="dropdown-content mt-1 absolute left-0 -ml-12 shadow-md z-10 hidden w-32">
                <ul class="bg-white dark:bg-gray-800 shadow rounded py-1">
                  <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Edit</li>
                  <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Delete</li>
                  <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Duplicate</li>
                </ul>
              </div>
            </td>
          </tr>
          <tr class="h-24 border-gray-300 border-b">
            <td class="pl-8 pr-6 text-left whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
              <input placeholder="check box" type="checkbox" class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white dark:bg-gray-800 focus:outline-none  focus:ring-2  focus:ring-gray-400" onclick="tableInteract(this)" />
            </td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
              <div class="text-gray-400 relative w-10">
                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg8.svg" alt="icon-tabler-file">
                <img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg8dark.svg" alt="icon-tabler-file">
              </div>
            </td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">#MC10023</td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">Toyota Motors</td>
            <td class="pr-6 whitespace-no-wrap">
              <div class="flex items-center">
                <div class="h-8 w-8">
                  <img src="https://tuk-cdn.s3.amazonaws.com/assets/components/advance_tables/at_1.png" alt="Display Avatar of Carrie Anthony" role="img" class="h-full w-full rounded-full overflow-hidden shadow" />
                </div>
                <p class="ml-2 text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-sm">Carrie Anthony</p>
              </div>
            </td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">$2,500</td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">02.03.20</td>
            <td class="pr-6">
              <div class="w-2 h-2 rounded-full bg-indigo-400"></div>
            </td>
            <td class="pr-8 relative">
              <button onclick="dropdownFunction(this)" aria-label="dropdown" role="button" class="dropbtn text-gray-500 rounded cursor-pointer border border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ">
                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg9.svg" alt="dropdown">
              </button>
              <div class="dropdown-content mt-1 absolute left-0 -ml-12 shadow-md z-10 hidden w-32">
                <ul class="bg-white dark:bg-gray-800 shadow rounded py-1">
                  <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Edit</li>
                  <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Delete</li>
                  <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Duplicate</li>
                </ul>
              </div>
            </td>
          </tr>
          <tr class="h-24 border-gray-300 border-b">
            <td class="pl-8 pr-6 text-left whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
              <input placeholder="check box" type="checkbox" class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white dark:bg-gray-800 focus:outline-none focus:outline-none focus:ring-2  focus:ring-gray-400" onclick="tableInteract(this)" />
            </td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
              <div class="relative w-10">
                <div class="absolute top-0 right-0 w-5 h-5 mr-2 -mt-1 rounded-full bg-indigo-700 text-white flex justify-center items-center text-xs">1</div>
                <div class="text-gray-600 dark:text-gray-400">
                  <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg8.svg" alt="icon-tabler-file">
                  <img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg8dark.svg" alt="icon-tabler-file">
                </div>
              </div>
            </td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">#MC10023</td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">Toyota Motors</td>
            <td class="pr-6 whitespace-no-wrap">
              <div class="flex items-center">
                <div class="h-8 w-8">
                  <img src="https://tuk-cdn.s3.amazonaws.com/assets/components/advance_tables/at_2.png" alt="Display Avatar of Carrie Anthony" role="img" class="h-full w-full rounded-full overflow-hidden shadow" />
                </div>
                <p class="ml-2 text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-sm">Carrie Anthony</p>
              </div>
            </td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">$2,500</td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">02.03.20</td>
            <td class="pr-6">
              <div class="w-2 h-2 rounded-full bg-red-400"></div>
            </td>
            <td class="pr-8 relative">
              <button onclick="dropdownFunction(this)" aria-label="dropdown" role="button" class="dropbtn text-gray-500 rounded cursor-pointer border border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400">
                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg9.svg" alt="dropdown">
              </button>
              <div class="dropdown-content mt-1 absolute left-0 -ml-12 shadow-md z-10 hidden w-32">
                <ul class="bg-white dark:bg-gray-800 shadow rounded py-1">
                  <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Edit</li>
                  <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Delete</li>
                  <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Duplicate</li>
                </ul>
              </div>
            </td>
          </tr>
          <tr class="h-24 border-gray-300 border-b">
            <td class="pl-8 pr-6 text-left whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
              <input placeholder="check box" type="checkbox" class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white dark:bg-gray-800 focus:outline-none focus:outline-none focus:ring-2  focus:ring-gray-400" onclick="tableInteract(this)" />
            </td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
              <div class="relative w-10">
                <div class="absolute top-0 right-0 w-5 h-5 mr-2 -mt-1 rounded-full bg-indigo-700 text-white flex justify-center items-center text-xs">5</div>
                <div class="text-gray-600 dark:text-gray-400">
                  <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg8.svg" alt="icon-tabler-file">
                  <img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg8dark.svg" alt="icon-tabler-file">
                </div>
              </div>
            </td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">#MC10023</td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">Toyota Motors</td>
            <td class="pr-6 whitespace-no-wrap">
              <div class="flex items-center">
                <div class="h-8 w-8">
                  <img src="https://tuk-cdn.s3.amazonaws.com/assets/components/advance_tables/at_3.png" alt="Display Avatar of Carrie Anthony" role="img" class="h-full w-full rounded-full overflow-hidden shadow" />
                </div>
                <p class="ml-2 text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-sm">Carrie Anthony</p>
              </div>
            </td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">$2,500</td>
            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">02.03.20</td>
            <td class="pr-6">
              <div class="w-2 h-2 rounded-full bg-gray-600"></div>
            </td>
            <td class="pr-8 relative">
              <button onclick="dropdownFunction(this)" aria-label="dropdown" role="button" class="dropbtn text-gray-500 rounded cursor-pointer border border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400">
                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg9.svg" alt="dropdown">
              </button>
              <div class="dropdown-content mt-1 absolute left-0 -ml-12 shadow-md z-10 hidden w-32">
                <ul class="bg-white dark:bg-gray-800 shadow rounded py-1">
                  <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Edit</li>
                  <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Delete</li>
                  <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Duplicate</li>
                </ul>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
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