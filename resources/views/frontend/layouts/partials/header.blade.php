 <!-- header -->
    <header>
        <div class="header d-lg-flex justify-content-between align-items-center py-2 px-sm-2 px-1">
            <!-- logo -->
            <div id="logo">
                <h1><a href="index.html">Xe</a></h1>
            </div>
            <!-- //logo -->
            <!-- nav -->
            <div class="nav_w3ls ml-lg-5">
                <nav>
                    <label for="drop" class="toggle menu-mobile">
                        <i class="fa fa-bars " aria-hidden="true"></i>
                    </label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu">
                        {!! \App\Models\Menu::getMenu()!!}
                        @if(!$customer_composer)
                            <li><a class="text-uppercase" onclick="showModal('loginModal','registryModal')" href="javascript:void(0)">Đăng Nhập</a></li>
                            <li><a class="text-uppercase" onclick="showModal('registryModal','loginModal')" href="javascript:void(0)">Đăng kí</a></li>
                        @else
                            <li><a class="text-uppercase"  href="javascript:void(0)"><span class="customer_name">{{ $customer_composer->name }}</span></a></li>
                            <li><a class="text-uppercase"  href="{{ route('frontend.logout') }}">Logout</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
            <!-- //nav -->
        </div>
    </header>
    <!-- //header -->