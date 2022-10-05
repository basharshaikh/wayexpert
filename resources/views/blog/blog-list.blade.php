<x-layout>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8 flex justify-between">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                Blog Manager
            </h1>

            <a href="/blog/add-new" class=" py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Add new</a>
        </div>
    </header>
    <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($blogs->isEmpty())
                @foreach($blogs as $blog)
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        {{$blog->title}}
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/blog/{{$blog->id}}/edit">Edit</a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <form method="POST" action="/blog/{{$blog->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="border-gray-300">
                  <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <p class="text-center">No Listings Found</p>
                  </td>
                </tr>
                @endunless
            </tbody>
        </table>
    </div>
    
    <!-- {!! $blogs[2]->description !!} -->
    </main>
</x-layout>