<div class="relative overflow-hidden bg-white dark:bg-gray-900">
  <!-- Decorative background image and gradient -->
  <div aria-hidden="true" class="absolute inset-0">
    <img src="{{ asset('images/hero-bg.jpg') }}" alt="" class="h-full w-full object-cover object-center">
    <div class="absolute inset-0 bg-gradient-to-r from-indigo-900/90 to-purple-900/90 mix-blend-multiply"></div>
  </div>

  <div class="relative">
    <div class="max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
      <div class="md:ml-auto md:w-1/2 md:pl-10">
        <h1 class="text-4xl font-bold tracking-tight text-white sm:text-5xl lg:text-6xl">
          {{ $title ?? 'Transform Your Brand\'s Visibility' }}
        </h1>
        <p class="mt-6 max-w-md text-lg text-indigo-100">
          {{ $description ?? 'Strategic billboard locations that capture millions of views daily across Malawi and Zambia.' }}
        </p>

        @if(isset($showSearch) && $showSearch)
          <div class="mt-10">
            <div class="bg-white/10 backdrop-blur-md rounded-lg p-4">
              <form action="{{ route('billboards') }}" method="GET" class="flex gap-4">
                <div class="flex-1">
                  <label for="location" class="sr-only">Location</label>
                  <select id="location" name="city" class="block w-full rounded-md border-0 bg-white/5 py-3 px-4 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <option value="">Select Location</option>
                    @foreach($cities ?? [] as $city)
                      <option value="{{ $city }}">{{ $city }}</option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" class="flex-none rounded-md bg-indigo-500 py-3 px-4 text-base font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                  Search
                </button>
              </form>
            </div>
          </div>
        @endif

        <div class="mt-8 flex space-x-4">
          {{ $actions ?? '' }}
        </div>
      </div>
    </div>
  </div>

  <!-- Stats -->
  <div class="relative bg-gradient-to-b from-transparent to-indigo-900/50 backdrop-blur-sm">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
      <dl class="grid grid-cols-1 gap-y-8 sm:grid-cols-2 lg:grid-cols-4 text-center">
        @foreach($stats ?? [] as $stat)
          <div>
            <dt class="text-base font-normal text-indigo-100">{{ $stat['label'] }}</dt>
            <dd class="mt-2 text-3xl font-bold tracking-tight text-white">{{ $stat['value'] }}</dd>
          </div>
        @endforeach
      </dl>
    </div>
  </div>
</div>
