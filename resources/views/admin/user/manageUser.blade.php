<x-admin-app-layout>
    <body class="bg-gray-50 dark:bg-gray-800 font-sans">
        <div class="container mx-auto p-4">

            <!-- Success and Error Messages -->
            @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-2 mb-4 rounded text-xs">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-2 mb-4 rounded text-xs">
                {{ session('error') }}
            </div>
            @endif

            <div class="container pt-2">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Manage User") }}
                    </div>
                </div>

                <!-- Flexbox Layout for Form and Table -->
                <div class="flex gap-6 pt-6">
                    <!-- Form Section with 40% width -->
                    <div class="w-full lg:w-2/5 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm">
                        <form action="{{  route('admin.user.store') }}" method="POST">
                            @csrf
                            <h1 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">User Management</h1>
                            <div class="space-y-2">
                                <!-- Category Name and Icon Name in the same line -->
                                <div class="grid grid-cols-2 gap-4">
                                    <!-- Category Name -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">User Name *</label>
                                        <input type="text" name="username"
                                            class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded text-xs dark:bg-gray-700 dark:text-gray-100"
                                            placeholder="Enter User name" required>
                                    </div>
            
                                    <!-- Icon Name -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Fullname *</label>
                                        <input type="text" name="name"
                                            class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded text-xs dark:bg-gray-700 dark:text-gray-100"
                                            placeholder="Enter the name">
                                    </div>
                                </div>
            
                                <!-- Password -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Password *</label>
                                    <input type="password" name="password" 
                                    class="w-full px-2 py-1 border border-gray-300
                                     dark:border-gray-600 rounded text-xs dark:bg-gray-700 dark:text-gray-100" 
                                     placeholder="Enter the password">

                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Confirm Password *</label>
                                    <input type="password" name="password_confirmation" 
                                    class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded text-xs
                                     dark:bg-gray-700 dark:text-gray-100" placeholder="Confirm the password">

                                </div>
            
                                <!-- Email and Contact in the same line -->
                                <div class="grid grid-cols-2 gap-4">
                                    <!-- Email -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                                        <input type="text" name="email"
                                            class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded text-xs dark:bg-gray-700 dark:text-gray-100"
                                            placeholder="Enter Email">
                                    </div>
            
                                    <!-- Contact -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Contact</label>
                                        <input type="text" name="contact"
                                            class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded text-xs dark:bg-gray-700 dark:text-gray-100"
                                            placeholder="Enter Contact">
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Address</label>
                                    <input type="text" name="address"
                                        class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded text-xs dark:bg-gray-700 dark:text-gray-100"
                                        placeholder="Enter Address">
                                </div>
                            </div>
                            

                            <!-- Form Buttons -->
                            <div class="mt-4 flex gap-2">
                                <button type="submit"
                                    class="px-3 py-1 bg-blue-600 text-white rounded text-xs hover:bg-blue-700">Save</button>
                                <button type="reset"
                                    class="px-3 py-1 bg-gray-300 text-gray-700 rounded text-xs hover:bg-gray-400">Reset</button>
                            </div>
                        </form>
                    </div>

                    <!-- Table Section with 60% width -->
                    <div class="w-full lg:w-3/5 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-3">USER LIST</h2>

                        <!-- Entries Filter -->
                        <div class="mb-3">
                            <label class="text-xs text-gray-700 dark:text-gray-300">Show
                                <select class="px-1 py-1 border border-gray-300 dark:border-gray-600 rounded text-xs dark:bg-gray-700 dark:text-gray-100">
                                    <option>5</option>
                                    <option>10</option>
                                    <option>15</option>
                                </select>
                                entries
                            </label>
                        </div>

                        <!-- Table Container with Fixed Height -->
                        <div class="overflow-y-auto" style="max-height: 400px;">
                            <table class="w-full text-left border-collapse text-xs">
                                <thead>
                                    <tr class="bg-gray-100 dark:bg-gray-700">
                                        <th class="px-3 py-2 font-medium text-gray-700 dark:text-gray-100 border">User name</th>
                                        <th class="px-3 py-2 font-medium text-gray-700 dark:text-gray-100 border">Fullname</th>
                                        <th class="px-3 py-2 font-medium text-gray-700 dark:text-gray-100 border">Email</th>
                                        <th class="px-3 py-2 font-medium text-gray-700 dark:text-gray-100 border">Address</th>
                                        <th class="px-3 py-2 font-medium text-gray-700 dark:text-gray-100 border">Contact</th>
                                        <th class="px-3 py-2 font-medium text-gray-700 dark:text-gray-100 border">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users  as $index => $user )
                                    <tr class="hover:bg-gray-700 ">
                                        <td class="px-3 py-2 text-gray-700 dark:text-gray-100 border">{{ $user->username }}</td>
                                        <td class="px-3 py-2 text-gray-700 dark:text-gray-100 border">{{ $user->name }}</td>
                                        <td class="px-3 py-2 text-gray-700 dark:text-gray-100 border">{{ $user->email }}</td>
                                        <td class="px-3 py-2 text-gray-700 dark:text-gray-100 border">{{ $user->address }}</td>
                                        <td class="px-3 py-2 text-gray-700 dark:text-gray-100 border">{{ $user->contact }}</td>
                                        <td class="px-3 py-2 text-gray-700 dark:text-gray-100 border">
                                            <a href="#"
                                                class="text-blue-600 hover:text-blue-800">Edit</a>
                                            <form action="{{ route('admin.user.store', $user->id) }}"
                                                method="POST" class="inline"
                                                onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-800 ml-2">Delete</button>
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
                                Showing {{ $users ->firstItem() }} to {{ $users ->lastItem() }} of {{
                                $users ->total() }} entries
                            </div>
                            <div class="flex gap-1">
                                {{ $users ->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
</x-admin-app-layout>
