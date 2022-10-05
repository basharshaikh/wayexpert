<x-layout>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8 flex justify-between">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                Add New Blog
            </h1>
        </div>
    </header>
    <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form method="post" action="/blog/add-new-blog" enctype="multipart/form-data">
            @csrf
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <!-- fields -->
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <!-- title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input value="{{old('title')}}" type="text" name="title" id="title" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md border"
                        />
                    </div>
                    <!-- featured images -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Featured Image</label>
                        <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                          <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                              <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                              <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>Upload a file</span>
                                <input id="file-upload" name="featured_image" type="file" class="sr-only">
                              </label>
                              <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 6MB</p>
                          </div>
                        </div>
                    </div>
                    <!-- description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">
                        Description
                        </label>
                        <div class="mt-1">
                            <textarea id="description" name="description" rows="3" class="p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{old('description')}}</textarea>
                            @error('description')
                            <p class="text-red-500 text-xs m-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- tags -->
                    <div>
                        <label for="tag" class="block text-sm font-medium text-gray-700">Tags</label>
                        <small class="text-gray-400">Add Some comma separted tags</small>
                        <input type="text" name="tag" id="tag" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md " placeholder="technology, future, news" value="{{old('tag')}}"
                        />
                        @error('tag')
                        <p class="text-red-500 text-xs m-1">{{$message}}</p>
                        @enderror
                    </div>
                    <!-- status -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                        <input
                            id="status"
                            name="status"
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                        />
                        @error('status')
                        <p class="text-red-500 text-xs m-1">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="ml-3 text-sm">
                        <label for="status" class="font-medium text-gray-700"
                            >Active</label
                        >
                        </div>
                    </div>
                </div>

                <!-- submit -->
                <div class="px-4 py-3 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                </div>
            </div>
        </form>
    </div>
    </main>
</x-layout>