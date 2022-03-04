@include('partials.head')

<body>
  <div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
      <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
        class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

      @include('partials.navbar')

      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-8">
          <h3
            class="px-6 py-3 border-b border-gray-200 bg-gray-700 text-center text-3xl leading-4 font-medium text-white uppercase tracking-wider sm:rounded-lg">
            Create New Company</h3>
          <div class="flex flex-col mt-8">
            <div class="flex flex-col mt-2">
              <div class="flex justify-center items-center w-full">
                <div class="w-1/2 bg-gray-700 sm:rounded-lg shadow-2xl p-8 m-4">
                  <h1 class="block w-full text-center text-gray-800 text-2xl font-bold mb-6"></h1>
                  <form action="/" method="post">
                    <div class="flex flex-col mb-4">
                      <label class="mb-2 font-bold text-lg text-white" for="first_name">Company Name</label>
                      <input class="border py-2 px-3 text-grey-800" type="text" name="name" id="compan">
                    </div>
                    <div class="flex flex-col mb-4">
                      <label class="mb-2 font-bold text-lg text-white" for="phone">Country</label>
                      <input class="border py-2 px-3 text-grey-800" type="phone" name="country" id="country">
                    </div>
                    <div class="flex flex-col mb-4">
                      <label class="mb-2 font-bold text-lg text-white" for="last_name">TVA Number</label>
                      <input class="border py-2 px-3 text-grey-800" type="text" name="tva_number" id="tva_number">
                    </div>
                    <div class="flex flex-col mb-4">
                      <label class="mb-2 font-bold text-lg text-white" for="Select">Company Type</label>
                      <select class="border py-2 px-3 text-grey-800">
                        <option>Supplier</option>
                        <option>Client</option>
                      </select>
                    </div>
                    <div class="col-span-2 text-right">
                      <button
                        class="py-3 px-6 bg-green-500 text-white font-bold w-full sm:w-32 hover:bg-green-600 sm:rounded-lg">
                        Submit
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
      </main>
    </div>
  </div>
  </div>
</body>

</html>
