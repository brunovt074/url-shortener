<x-app-layout>
    <x-slot name="header">
        <div class="index-header">
          My Saved Links
        </div>
        <div class="">
          <a class="btn btn-dark" href="{{ route('short.url')  }}">Home</a>
        </div>        
    </x-slot>
    <div class="max-w-6xl mx-auto mt-8">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                    <tr>
                      <th scope="col"
                       class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Id</th>
                      <th scope="col"
                       class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Original URL`</th>
                      <th scope="col"
                       class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Short URL</th>                      
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr></tr>
                    @foreach ($links as $link)
                    <tr>
                      <td class="px-6 py-4 whitespace-nowrap">{{ $link->id }}</td>
                      <td class="px-6 py-4 whitespace-nowrap">{{ $link->original_url }}</td>
                      <td class="px-6 py-4 whitespace-nowrap">{{ $link->short_url }}</td>                      
                    </tr>
                    @endforeach                    
                  </tbody>
                </table>
                <div class="m-2 p-2">Pagination</div>
              </div>
            </div>
          </div>          
    </div>
</x-app-layout>