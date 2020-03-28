<aside id="menubar" class="menubar light">
  <div class="menubar-scroll">
    <div class="menubar-scroll-inner">
      <ul class="app-menu">
        <li class="has-submenu">
          <a href="javascript:void(0)" class="submenu-toggle">
            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Pages Management</span>
            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
          </a>
          <ul class="submenu">
            <li><a href="{{ url('/view-all-content') }}"><span class="menu-text">View All</span></a></li>
            <li><a href="{{ url('/add-new-page') }}"><span class="menu-text">Add New</span></a></li>
            <li><a href="{{ url('/media-module') }}"><span class="menu-text">Media</span></a></li>
            <li><a href="{{ url('/categories-module') }}"><span class="menu-text">Categories</span></a></li>
          </ul>
        </li>
      </ul><!-- .app-menu -->
    </div><!-- .menubar-scroll-inner -->
  </div><!-- .menubar-scroll -->
</aside>