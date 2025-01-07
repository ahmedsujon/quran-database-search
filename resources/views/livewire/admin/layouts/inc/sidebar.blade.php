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
                                <i class="bx bxs-data"></i>
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
                                <i class="bx bx-data"></i>
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
                                class="has-arrow waves-effect {{ request()->is('admin/contents/data') || request()->is('admin/contents/data/*') ? 'active_menu' : '' }}">
                                <i class="bx bxs-data"></i>
                                <span key="t-multi-level">Main Menu</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                @if (is_permitted('manage_admins'))
                                    {{-- <li>
                                        <a href="{{ route('admin.contentsImports') }}" key="t-level-1-1"
                                            class="{{ request()->is('admin/word/topics/imports') ? 'active_sub_menu' : '' }}">Import
                                            Data</a>
                                    </li> --}}
                                    <li>
                                        <a href="{{ route('admin.contentsData') }}" key="t-level-1-1"
                                            class="{{ request()->is('admin/word/topics/data') ? 'active_sub_menu' : '' }}">List
                                            Of
                                            Menu</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if (is_permitted('manage_admins'))
                        <li>
                            <a href="javascript: void(0);"
                                class="has-arrow waves-effect {{ request()->is('admin/word/topics/imports') || request()->is('admin/word/topics/imports/*') ? 'active_menu' : '' }}">
                                <i class="bx bx-data"></i>
                                <span key="t-multi-level">Word Or Topics</span>
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
                </ul>
            </div>
        </div>
    </div>
</div>
