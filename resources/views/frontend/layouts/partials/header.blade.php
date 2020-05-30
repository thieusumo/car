 <!-- header -->
    <header>
        <div class="header d-lg-flex justify-content-between align-items-center px-sm-2 px-1">
            <!-- logo -->
            <div id="logo">
                <h1><a href="{{ route('home') }}">Xe</a></h1>
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
                            <li><a class=""  href="javascript:void(0)"><i class="fa fa-bell-o text-white" aria-hidden="true"><sup class="text-danger">(0)</sup></i></a></li>
                            <li>
                                <label for="drop-3" class="toggle toogle-2">{{ $customer_composer->name }}<span class="fa fa-angle-down"
                                        aria-hidden="true"></span>
                                </label>
                                <a class="" href="javascript:void(0)"><span class="fa fa-user-o text-white"></span><span class="text-warning customer_name"> {{ $customer_composer->name }}</span><span class="fa fa-angle-down" aria-hidden="true"></span></a>
                                <input type="checkbox" id="drop-3" />
                                <ul>
                                    <li><a class="text-primary" href="{{ route('frontend.logout') }}">Đăng Xuất</a></li>
                                </ul>
                            </li>
                            
                        @endif
                    </ul>
                </nav>
            </div>
            <!-- //nav -->
        </div>
    </header>
    <!-- //header -->