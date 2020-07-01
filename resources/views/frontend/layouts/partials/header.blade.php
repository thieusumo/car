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
                        @if(!isset($customer_composer))
                            <li><a class="text-uppercase" onclick="showModal('loginModal','registryModal')" href="javascript:void(0)">Đăng Nhập</a></li>
                            <li><a class="text-uppercase" onclick="showModal('registryModal','loginModal')" href="javascript:void(0)">Đăng kí</a></li>
                        @else
                            @php
                                $notification_nav = \App\Models\Notification::countNotificationCustomer();
                            @endphp
                            <li><a class=""  href="{{ route('frontend.chating') }}"><i class="fa fa-envelope-o text-white" aria-hidden="true"><sup class="text-danger">({{ \App\Models\Chat::count() }})</sup></i></a></li>
                            @if($notification_nav->count() == 0)
                                <li><a class=""  href="javascript:void(0)"><i class="fa fa-bell-o text-white" aria-hidden="true"><sup class="text-danger">({{ $notification_nav->count() }})</sup></i></a></li>
                            @else
                                <li>
                                    <label for="drop-4" class="toggle toogle-2"><i class="fa fa-bell-o text-white" aria-hidden="true"><sup class="text-danger">({{ $notification_nav->count() }})</sup></i><span class="fa fa-angle-down"
                                            aria-hidden="true"></span>
                                    </label>
                                    <a class="" href="javascript:void(0)"><i class="fa fa-bell-o text-white" aria-hidden="true"><sup class="text-danger">({{ $notification_nav->count() }})</sup></i><span class="fa fa-angle-down" aria-hidden="true"></span></a>
                                    <input type="checkbox" id="drop-4" />
                                    <ul>
                                        @foreach($notification_nav as $n)
                                        <li><a class="text-primary" href="{{ $n->href }}">{{ $n->content }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
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