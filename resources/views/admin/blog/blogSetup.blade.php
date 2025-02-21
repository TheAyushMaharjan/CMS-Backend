<x-admin-app-layout>
    <body class="bg-gray-50 dark:bg-gray-800 font-sans">
        <div class="container mx-auto p-4">

            <!-- Success and Error Messages -->
            @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-2 mb-4 rounded text-xs">
                {{ session('success') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-2 mb-4 rounded text-xs">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="container pt-2">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("MANAGE CATEGORY") }}
                    </div>
                </div>

                <!-- Flexbox Layout for Form and Table -->
                <div class="flex gap-6 pt-6">
                    <!-- Category Management Form Table (left side) -->
                    <div class="w-full lg:w-2/5 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm">
                        <form action="{{ route('admin.blog.store') }}" method="POST">
                            @csrf
                            <div class="space-y-2">
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Category Name *</label>
                                    <input type="text" name="category_name" class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded text-xs dark:bg-gray-700 dark:text-gray-100" placeholder="Enter Category Name" required>
                                </div>
                        
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Icon Name *</label>
                                    <input type="text" name="icon_name" class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded text-xs dark:bg-gray-700 dark:text-gray-100" placeholder="Enter Icon Name (e.g., fa fa-icon)" required>
                                </div>
                        
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                                    <textarea name="description" class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded text-xs dark:bg-gray-700 dark:text-gray-100" placeholder="Enter Description"></textarea>
                                </div>
                        
                                 <!-- Toggle Switch for Publish -->
                                 <div class="flex items-center space-x-2">
                                    <label for="toggle_published" class="text-xs font-medium text-gray-700 dark:text-gray-300">Publish *</label>
                                    
                                    <!-- Hidden Input Field to Submit Value -->
                                    <input type="hidden" name="is_published" id="is_published" value="0">
                                    
                                    <!-- Custom Toggle Switch -->
                                    <label for="toggle_published" class="relative inline-block w-10 h-5">
                                        <input type="checkbox" id="toggle_published" class="sr-only peer">
                                        <div class="w-10 h-5 bg-gray-300 dark:bg-gray-600 rounded-full peer-checked:bg-green-500 transition-all"></div>
                                        <div class="absolute left-1 top-0.5 w-4 h-4 bg-white dark:bg-gray-300 rounded-full transition-all peer-checked:left-5"></div>
                                    </label>
                                </div>
                        
                                <div class="mt-4 flex gap-2">
                                    <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded text-xs hover:bg-blue-700">Save</button>
                                    <button type="reset" class="px-3 py-1 bg-gray-300 text-gray-700 rounded text-xs hover:bg-gray-400">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Category List Table (right side) -->
                    <div class="w-full lg:w-6/5 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm">
                        <table class="w-full">
                            <thead>
                                <th class="text-gray-700 dark:text-gray-100 text-xm font-medium py-2">Category List</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="overflow-y-auto max-h-96">
                                            <table class="w-full text-left border-collapse text-xs border border-gray-300 dark:border-gray-600">
                                                <thead>
                                                    <tr class="bg-gray-100 dark:bg-gray-700">
                                                        <th class="px-3 py-2 font-medium text-gray-700 dark:text-gray-100 border">Category Name</th>
                                                        <th class="px-3 py-2 font-medium text-gray-700 dark:text-gray-100 border">Icon Name</th>
                                                        <th class="px-3 py-2 font-medium text-gray-700 dark:text-gray-100 border">Description</th>
                                                        <th class="px-3 py-2 font-medium text-gray-700 dark:text-gray-100 border">Status</th>
                                                        <th class="px-3 py-2 font-medium text-gray-700 dark:text-gray-100 border">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($blogs as $category)
                                                        <tr class="hover:bg-gray-200 dark:hover:bg-gray-600 border-b">
                                                            <td class="px-3 py-2 text-gray-700 dark:text-gray-100 border">{{ $category->category_name }}</td>
                                                            <td class="px-3 py-2 text-gray-700 dark:text-gray-100 border">{{ $category->icon_name }}</td>
                                                            <td class="px-3 py-2 text-gray-700 dark:text-gray-100 border">{{ $category->description }}</td>
                                                            <td class="px-3 py-2 text-gray-700 dark:text-gray-100 border">
                                                                <span class="text-xs font-semibold {{ $category->is_published ? 'text-green-500' : 'text-red-500' }}">
                                                                    {{ $category->is_published ? 'Published' : 'Draft' }}
                                                                </span>
                                                            </td>
                                                            <td class="px-3 py-2 text-gray-700 dark:text-gray-100 border flex items-center space-x-2">
                                                                <a href="#" class="text-blue-600 hover:text-blue-800">Edit</a>
                                                                <form action="{{ route('admin.blog.destroy', $category->id) }}" method="POST" class="inline" 
                                                                      onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    
                                        <!-- Pagination -->
                                        <div class="mt-4 flex justify-between items-center text-xs">
                                            <div class="text-gray-700 dark:text-gray-300">
                                                Showing {{ $blogs->firstItem() }} to {{ $blogs->lastItem() }} of {{ $blogs->total() }} entries
                                            </div>
                                            <div class="flex gap-1">
                                                {{ $blogs->links() }}
                                            </div>
                                        </div>
                                    </td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </body>
</x-admin-app-layout>
<script>
    document.getElementById('toggle_published').addEventListener('change', function () {
    document.getElementById('is_published').value = this.checked ? 1 : 0;
});

</script>