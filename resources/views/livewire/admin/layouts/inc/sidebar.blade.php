<div>
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" key="t-menu">Menu</li>

                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="waves-effect {{ request()->is('admin/dashboard') ? 'active_menu' : '' }}">
                            <i class="bx bx-grid-alt"></i>
                            <span key="t-dashboard">Dashboard</span>
                        </a>
                    </li>

                    @if (is_permitted('manage_admins'))
                        <li>
                            <a href="javascript: void(0);"
                                class="has-arrow waves-effect {{ request()->is('admin/quran') || request()->is('admin/quran/*') ? 'active_menu' : '' }}">
                                <i class="bx bx-group"></i>
                                <span key="t-multi-level">Quran Data</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                @if (is_permitted('manage_admins'))
                                    <li>
                                        <a href="{{ route('admin.quranImports') }}" key="t-level-1-1"
                                            class="{{ request()->is('admin/quran/imports') ? 'active_sub_menu' : '' }}">Import
                                            Data</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.quranData') }}" key="t-level-1-1"
                                            class="{{ request()->is('admin/quran/data') ? 'active_sub_menu' : '' }}">List
                                            Of Data</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if (is_permitted('manage_admins'))
                        <li>
                            <a href="javascript: void(0);"
                                class="has-arrow waves-effect {{ request()->is('admin/hadith') || request()->is('admin/hadith/*') ? 'active_menu' : '' }}">
                                <i class="bx bx-group"></i>
                                <span key="t-multi-level">Hadith</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                @if (is_permitted('manage_admins'))
                                    <li>
                                        <a href="{{ route('admin.hadithImports') }}" key="t-level-1-1"
                                            class="{{ request()->is('admin/hadith/imports') ? 'active_sub_menu' : '' }}">Import
                                            Data</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.hadithData') }}" key="t-level-1-1"
                                            class="{{ request()->is('admin/hadith/data') ? 'active_sub_menu' : '' }}">List
                                            Of Data</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if (is_permitted('manage_admins'))
                        <li>
                            <a href="javascript: void(0);"
                                class="has-arrow waves-effect {{ request()->is('admin/word/topics') || request()->is('admin/word/topics/*') ? 'active_menu' : '' }}">
                                <i class="bx bx-group"></i>
                                <span key="t-multi-level">Contents</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                @if (is_permitted('manage_admins'))
                                    <li>
                                        <a href="{{ route('admin.wordImports') }}" key="t-level-1-1"
                                            class="{{ request()->is('admin/word/topics/imports') ? 'active_sub_menu' : '' }}">Import
                                            Data</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.wordTopicsData') }}" key="t-level-1-1"
                                            class="{{ request()->is('admin/word/topics/data') ? 'active_sub_menu' : '' }}">List
                                            Of
                                            Data</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if (is_permitted('manage_admins'))
                        <li>
                            <a href="javascript: void(0);"
                                class="has-arrow waves-effect {{ request()->is('admin/contents') || request()->is('admin/contents/*') ? 'active_menu' : '' }}">
                                <i class="bx bx-group"></i>
                                <span key="t-multi-level">Word Or Topics</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                @if (is_permitted('manage_admins'))
                                    <li>
                                        <a href="{{ route('admin.contentsImports') }}" key="t-level-1-1"
                                            class="{{ request()->is('admin/contents/imports') ? 'active_sub_menu' : '' }}">Import
                                            Data</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.contentsData') }}" key="t-level-1-1"
                                            class="{{ request()->is('admin/contents/data') ? 'active_sub_menu' : '' }}">List
                                            Of Data</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif


                    @if (is_permitted('manage_admins'))
                        <li>
                            <a href="javascript: void(0);"
                                class="has-arrow waves-effect {{ request()->is('admin/all-admins') || request()->is('admin/all-admins/*') ? 'active_menu' : '' }}">
                                <i class="bx bx-group"></i>
                                <span key="t-multi-level">Admins</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                @if (is_permitted('manage_admins'))
                                    <li>
                                        <a href="{{ route('admin.allAdmins') }}" key="t-level-1-1"
                                            class="{{ request()->is('admin/all-admins') ? 'active_sub_menu' : '' }}">All
                                            Admins</a>
                                    </li>
                                @endif

                                @if (is_permitted('manage_roles_permissions'))
                                    <li>
                                        <a href="{{ route('admin.adminRolePermissions') }}" key="t-level-1-1"
                                            class="{{ request()->is('admin/all-admins/role-permissions') ? 'active_sub_menu' : '' }}">Roles
                                            & Permissions</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if (is_permitted('manage_users'))
                        <li>
                            <a href="javascript: void(0);"
                                class="has-arrow waves-effect {{ request()->is('admin/all-users') || request()->is('admin/all-users/*') ? 'active_menu' : '' }}">
                                <i class="bx bx-group"></i>
                                <span key="t-multi-level">Users</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                @if (is_permitted('manage_users'))
                                    <li>
                                        <a href="{{ route('admin.allUsers') }}" key="t-level-1-1"
                                            class="{{ request()->is('admin/all-users') ? 'active_sub_menu' : '' }}">All
                                            Users</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if (is_permitted('manage_settings'))
                        <li>
                            <a href="javascript: void(0);"
                                class="has-arrow waves-effect {{ request()->is('admin/settings') || request()->is('admin/settings/*') ? 'active_menu' : '' }}">
                                <i class="bx bx-cog"></i>
                                <span key="t-multi-level">Settings</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                @if (is_permitted('manage_console'))
                                    <li>
                                        <a href="{{ route('admin.console') }}" key="t-level-1-1"
                                            class="{{ request()->is('admin/settings/console') ? 'active_sub_menu' : '' }}">Console</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    {{-- <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active_menu' : '' }}">
                            <i class="bx bx-box"></i>
                            <span key="t-multi-level">Products</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="{{ route('admin.allProducts') }}" key="t-level-1-1" class="{{ request()->is('admin/products/all') ? 'active_sub_menu' : '' }}">All Products</a></li>
                            <li><a href="{{ route('admin.categories') }}" key="t-level-1-1" class="{{ request()->is('admin/products/categories') ? 'active_sub_menu' : '' }}">Categories</a></li>
                        </ul>
                    </li> --}}


                    {{-- <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-share-alt"></i>
                            <span key="t-multi-level">Multi Level</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="javascript: void(0);" key="t-level-1-1">Level 1.1</a></li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2">Level 1.2</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="javascript: void(0);" key="t-level-2-1">Level 2.1</a></li>
                                    <li><a href="javascript: void(0);" key="t-level-2-2">Level 2.2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}

                </ul>
            </div>

        </div>
    </div>
</div>
