<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Added items-center to align vertically -->
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>
            </div>

            <!-- Right-aligned Navigation Links -->
            <div class="hidden sm:flex sm:items-center sm:space-x-8">
                <!-- Dashboard Link -->

                <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>

                <!-- User Management Dropdown -->
                <x-nav-dropdown :active="request()->routeIs('content.*')">
                    <x-slot name="trigger">
                        {{ __('User Management') }}
                    </x-slot>
                    <x-nav-link :href="route('admin.user.manageUser')" :active="request()->routeIs('admin.user.manageUser')">
                        {{ __('Manage User') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.user.managePermission')" :active="request()->routeIs('admin.user.managePermission')">
                        {{ __('Manage Permission') }}
                    </x-nav-link>
                </x-nav-dropdown>
                

                <!-- blog Management Dropdown -->
                <x-nav-dropdown :active="request()->routeIs('content.*')">
                    <x-slot name="trigger">
                        {{ __('Blog Management') }}
                    </x-slot>
                    <x-nav-link :href="route('admin.blog.blogCategory')" :active="request()->routeIs('admin.blog.blogCategory')">
                        {{ __('Blog Categories') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.blog.blogSetup')" :active="request()->routeIs('admin.blog.blogSetup')">
                        {{ __('Blog Setup') }}
                    </x-nav-link>
                </x-nav-dropdown>

                <!-- Media Management Dropdown -->
                <x-nav-dropdown :active="request()->routeIs('media.*')">
                    <x-slot name="trigger">
                        {{ __('Media Management') }}
                    </x-slot>
                    <x-nav-link :href="route('admin.media.gallerySetup')" :active="request()->routeIs('admin.media.gallerySetup')">
                        {{ __('Gallery Category Setup') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.media.preview')" :active="request()->routeIs('admin.media.preview')">
                        {{ __('Preview') }}
                    </x-nav-link>
                </x-nav-dropdown>

                <!-- Setting Dropdown -->
                <x-nav-dropdown :active="request()->routeIs('content.*')">
                    <x-slot name="trigger">
                        {{ __('Setting') }}
                    </x-slot>
                    <x-nav-link :href="route('admin.setting.headerSetting')" :active="request()->routeIs('admin.setting.headerSetting')">
                        {{ __('Header Content Setup') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.setting.footerSetting')" :active="request()->routeIs('admin.setting.footerSetting')">
                        {{ __('Footer Setup') }}
                    </x-nav-link>
                </x-nav-dropdown>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('admin.profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('admin.logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('admin.profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('admin.logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>