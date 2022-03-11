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
            Company : {{ $company->name }}</h3>

          <div class="flex flex-col mt-8">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
              <div
                class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                  <thead>
                    <tr>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        TVA</th>
                      <th
                        class="px-12 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        {{ $company->vat_number }}</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    <tr>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Type</th>
                      <th
                        class="px-12 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        {{ $company->category }}</th>
                    </tr>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="flex flex-col mt-8">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
              <div
                class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                  <thead>
                    <tr>
                      <h4
                        class="px-6 py-3 border-b border-gray-200 bg-gray-700 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">
                        Contact Persons</h4>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Name</th>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Phone</th>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Email</th>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                      </th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                    </tr>
                  </thead>
                  @foreach ($company->contacts as $contact)
                    <tbody class="bg-white">
                      <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <div class="flex items-center">

                            <div class="text-sm leading-5 text-gray-500"> {{ $contact->firstname }}
                              {{ $contact->lastname }}</div>

                          </div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

                          <div class="text-sm leading-5 text-gray-500">{{ $contact->phone_number }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <span class="text-sm leading-5 text-gray-500">{{ $contact->email }}</span>
                        </td>

                        <td
                          class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                        </td>

                        <td
                          class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900"></a>
                        </td>
                      </tr>
                    </tbody>
                  @endforeach
                </table>
              </div>
            </div>
          </div>

          <div class="flex flex-col mt-8">

            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
              <div
                class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                  <thead>
                    <tr>
                      <h4
                        class="px-6 py-3 border-b border-gray-200 bg-gray-700 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">
                        Factures</h4>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Invoice Number</th>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Date</th>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Contact Person</th>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                      </th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                    </tr>
                  </thead>

                  @foreach ($company->contacts as $contact)
                    @foreach ($contact->invoices as $invoice)
                      <tbody class="bg-white">
                        <tr>
                          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="flex items-center">


                              <div class="text-sm leading-5 text-gray-500">{{ $invoice->invoice_number }}</div>

                            </div>
                          </td>

                          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

                            <div class="text-sm leading-5 text-gray-500">{{ $invoice->created_at->format('d/m/Y') }}
                            </div>
                          </td>

                          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <span class="text-sm leading-5 text-gray-500"> {{ $invoice->contact->firstname }}
                              {{ $invoice->contact->lastname }}</span>
                          </td>

                          <td
                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                          </td>

                          <td
                            class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900"></a>
                          </td>
                        </tr>
                      </tbody>
                    @endforeach
                  @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  </div>
</body>

</html>
