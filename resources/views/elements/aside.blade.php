<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <video class="styles_thumbnail___2I_B styles_video__td2wc" aria-label="Jet Admin" width="64" height="64"
                poster="https://ph-files.imgix.net/d3d11dd1-1678-4979-ad5b-98167e259c70.gif?auto=compress&amp;codec=mozjpeg&amp;cs=strip&amp;fm=webp&amp;w=64&amp;h=64&amp;fit=max&amp;frame=1&amp;dpr=2"
                muted="" loop="" disableremoteplayback="" disablepictureinpicture="" playsinline=""
                preload="none">
                <source
                    src="https://ph-files.imgix.net/d3d11dd1-1678-4979-ad5b-98167e259c70.gif?fm=webm&amp;w=64&amp;h=64&amp;crop=max&amp;dpr=2#t=0.001"
                    type="video/webm">
                <source
                    src="https://ph-files.imgix.net/d3d11dd1-1678-4979-ad5b-98167e259c70.gif?fm=mp4&amp;w=64&amp;h=64&amp;crop=max&amp;dpr=2#t=0.001"
                    type="video/mp4">
            </video>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Brain</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::is('*dashboard*') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Trang Chủ</div>
            </a>
        </li>
        @if (Auth::user()->isAdmin == true)
            <li class="menu-item {{ Request::is('*account*') ? 'active' : '' }}">
                <a href="{{ route('show-account') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-user-account"></i>
                    <div data-i18n="Analytics">Quản Lý Tài Khoản</div>
                </a>
            </li>
        @endif
        <li class="menu-item {{ Request::is('*question*') ? 'active' : '' }}">
            <a href="{{ route('show-question') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-brain"></i>
                <div data-i18n="Analytics">Quản Lý Câu Hỏi</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('*news*') ? 'active' : '' }}">
            <a href="{{ route('show-news') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="Analytics">Quản Lý Tin Tức</div>
            </a>
        </li>
    </ul>
</aside>
