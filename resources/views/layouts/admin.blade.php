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
            Admin</h3>
          <br><br>
          <div class="container mx-auto bg-white rounded-lg shadow-lg">
            <div class="md:h-20 py-20 md:py-0 flex justify-center items-center">
              <div class="md:space-x-20 space-y-10 md:space-y-0">
                <a href="/newinvoice"
                  class="py-3 px-6 text-white rounded-lg bg-gray-700 shadow-lg block md:inline-block hover:bg-gray-500">New
                  Invoice</a>
                <a href="/newcontact"
                  class="py-3 px-6 text-white rounded-lg bg-gray-700 shadow-lg block md:inline-block hover:bg-gray-500">New
                  Contact</a>
                <a href="/newcompany"
                  class="py-3 px-6 text-white rounded-lg bg-gray-700 shadow-lg block md:inline-block hover:bg-gray-500">New
                  Company</a>
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
                        Last Invoices</h4>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Invoice Number</th>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Dates</th>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Company</th>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                      </th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                    </tr>
                  </thead>
                  @foreach ($invoices as $invoice)
                    <tbody class="bg-white">
                      <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <div class="flex items-center">
                            <div class="text-sm leading-5 text-gray-500"><a
                                href="/detailinvoice/{{ $invoice->id }}">{{ $invoice->invoice_number }}</a></div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

                          <div class="text-sm leading-5 text-gray-500">{{ $invoice->created_at->format('d/m/Y') }}
                          </div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <span class="text-sm leading-5 text-gray-500">{{ $invoice->contact->company->name }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <a href="/editinvoice/{{ $invoice->id }}"><span class="text-sm leading-5 text-gray-500"><svg
                                xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="blue" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg></span></a>

                        <td
                          class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                          <form action="editinvoice/delete/{{ $invoice->id }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                fill="none" viewBox="0 0 24 24" stroke="red" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                              </svg></button>
                          </form>
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
                        Last Contacts</h4>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Name</th>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Phone</th>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        E-mail</th>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Company</th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                      </th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                    </tr>
                  </thead>
                  @foreach ($contacts as $contact)
                    <tbody class="bg-white">
                      <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <div class="flex items-center">
                            <div class="text-sm leading-5 text-gray-500"><a
                                href="/detailcontact/{{ $contact->id }}">{{ $contact->firstname }}
                                {{ $contact->lastname }}</a></div>
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
                          {{ $contact->company->name }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <a href="/editcontact/{{ $contact->id }}"><span
                              class="text-sm leading-5 text-gray-500"><svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="blue" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg></span></a>
                        </td>
                        <td
                          class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                          <form action="editcontact/delete/{{ $contact->id }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                fill="none" viewBox="0 0 24 24" stroke="red" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                              </svg></button>
                          </form>
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
                        Last Companies</h4>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Name</th>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        TVA</th>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Country</th>
                      <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Type</th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>

                    </tr>
                  </thead>
                  @foreach ($companies as $company)
                    <tbody class="bg-white">
                      <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <div class="flex items-center">
                            <div class="text-sm leading-5 text-gray-500"><a
                                href="/detailcompany/{{ $company->id }}">{{ $company->name }}</a></div>
                          </div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

                          <div class="text-sm leading-5 text-gray-500">{{ $company->vat_number }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <span class="text-sm leading-5 text-gray-500">{{ $company->country }}</span>
                        </td>

                        <td
                          class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                          {{ $company->category }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <a href="/editcompany/{{ $company->id }}"><span
                              class="text-sm leading-5 text-gray-500"><svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="blue" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg></span></a>
                        </td>

                        <td
                          class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                          <form action="editcompany/delete/{{ $company->id }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                fill="none" viewBox="0 0 24 24" stroke="red" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                              </svg></button>
                          </form>
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
        </div>
      </main>
    </div>
  </div>
  </div>
  @include('sweetalert::alert')
</body>

</html>
