@php
  $appSidebarClass = !empty($appSidebarTransparent) ? 'app-sidebar-transparent' : '';
  $appSidebarAttr = !empty($appSidebarLight) ? '' : ' data-bs-theme=dark';
  $getMenu = App\Helpers\GetSettings::getMenu();
  $currentUrl = Request::path() != '/' ? '/' . Request::path() : '/'; // Get the current path
@endphp

<!-- BEGIN #sidebar -->
<div id="sidebar" class="app-sidebar {{ $appSidebarClass }}" {{ $appSidebarAttr }}>
  <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
    <div class="menu">
      @if (!$appSidebarSearch)
        <div class="menu-profile">
          <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile"
            data-target="#appSidebarProfileMenu">
            <div class="menu-profile-cover with-shadow"></div>

            <img src="{{ asset('img/' . Auth::user()->img) }}" alt=""
              class="menu-profile-image menu-profile-image-icon bg-gray-900 text-gray-600 object-fit-cover">
            <div class="menu-profile-info">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1">{{ Auth::user()->name }}</div>
                <div class="menu-caret ms-auto"></div>
              </div>
              <small>{{ Auth::user()->role->role_name }}</small>
            </div>
          </a>
        </div>
        <div id="appSidebarProfileMenu" class="collapse">
          <div class="menu-item pt-5px">
            <a href="/profile" class="menu-link">
              <div class="menu-icon"><i class="fa fa-user"></i></div>
              <div class="menu-text">Profile</div>
            </a>
          </div>
          {{-- <div class="menu-item pt-5px">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-icon"><i class="fa fa-cog"></i></div>
                            <div class="menu-text">Settings</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
                            <div class="menu-text">Send Feedback</div>
                        </a>
                    </div>
                    <div class="menu-item pb-5px">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-icon"><i class="fa fa-question-circle"></i></div>
                            <div class="menu-text">Help</div>
                        </a>
                    </div> --}}
          <div class="menu-divider m-0"></div>
        </div>
      @endif

      @if ($appSidebarSearch)
        <div class="menu-search mb-n3">
          <input type="text" class="form-control" placeholder="Sidebar menu filter..." data-sidebar-search="true" />
        </div>
      @endif

      <div class="menu-header">Navigation</div>



      @php
        function renderSubMenu($menuArray, $currentUrl)
        {
            $html = '';

            foreach ($menuArray as $menu) {
                $hasSub = !empty($menu['sub_menu']);
                $active =
                    Str::startsWith($currentUrl, $menu['url']) ||
                    ($hasSub && checkSubMenuActive($menu['sub_menu'], $currentUrl));

                $childHtml = '';
                if ($hasSub) {
                    $childHtml =
                        '<div class="menu-submenu">' . renderSubMenu($menu['sub_menu'], $currentUrl) . '</div>';
                }

                $html .=
                    '
            <div class="menu-item ' .
                    ($hasSub ? 'has-sub' : '') .
                    ' ' .
                    ($active ? 'active' : '') .
                    '">
                <a href="' .
                    $menu['url'] .
                    '" class="menu-link">
                    ' .
                    (!empty($menu['icon'])
                        ? '<div class="menu-icon"><i class="' . $menu['icon'] . '"></i></div>'
                        : '') .
                    '
                    ' .
                    (!empty($menu['title']) ? '<div class="menu-text">' . $menu['title'] . '</div>' : '') .
                    '
                    ' .
                    ($hasSub ? '<div class="menu-caret"></div>' : '') .
                    '
                </a>
                ' .
                    $childHtml .
                    '
            </div>';
            }

            return $html;
        }

        function checkSubMenuActive($subMenu, $currentUrl)
        {
            foreach ($subMenu as $m) {
                if (
                    Str::startsWith($currentUrl, $m['url']) ||
                    (!empty($m['sub_menu']) && checkSubMenuActive($m['sub_menu'], $currentUrl))
                ) {
                    return true;
                }
            }
            return false;
        }

        // Langsung render menu yang sudah nested dari controller
        echo renderSubMenu($getMenu, $currentUrl);
      @endphp


      <!-- BEGIN minify-button -->
      <div class="menu-item d-flex">
        <a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i
            class="fa fa-angle-double-left"></i></a>
      </div>
      <!-- END minify-button -->

    </div>
  </div>
</div>

<div class="app-sidebar-bg" {{ $appSidebarAttr }}></div>
<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a>
</div>
<!-- END #sidebar -->
