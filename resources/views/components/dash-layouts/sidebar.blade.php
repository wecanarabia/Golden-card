<!--**********************************
            Sidebar start
        ***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li class="menu-title">Golden Card</li>
            <li><a href="{{ route('dash.home','today') }}" aria-expanded="false">
                    <div class="menu-icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.5 7.49999L10 1.66666L17.5 7.49999V16.6667C17.5 17.1087 17.3244 17.5326 17.0118 17.8452C16.6993 18.1577 16.2754 18.3333 15.8333 18.3333H4.16667C3.72464 18.3333 3.30072 18.1577 2.98816 17.8452C2.67559 17.5326 2.5 17.1087 2.5 16.6667V7.49999Z"
                                stroke="#888888" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7.5 18.3333V10H12.5V18.3333" stroke="#888888" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <span class="nav-text">Home</span>
                </a>

            </li>
            @can('view')
                <li><a href="{{ route('dash.services.show', ['service' => $service->slug]) }}" class=""
                        aria-expanded="false">
                        <div class="menu-icon">
                            <img class="img-thumbnail" style="width:22px" src="{{ asset($service->logo) }}">
                        </div>
                        <span class="nav-text">Marchant details</span>
                    </a>
                </li>

                <li><a href="{{ route('dash.branches.index') }}" class="" aria-expanded="false">
                        <div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                                fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M3 3h18v18H3zM21 9H3M21 15H3M12 3v18" />
                            </svg>
                        </div>
                        <span class="nav-text">Branches</span>
                    </a>
                </li>

                <li><a href="{{ route('dash.offers.index') }}" class="" aria-expanded="false">
                        <div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                                fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                <line x1="8" y1="12" x2="21" y2="12"></line>
                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                <line x1="3" y1="18" x2="3.01" y2="18"></line>
                            </svg>
                        </div>
                        <span class="nav-text">offers</span>
                    </a>
                </li>

                <li><a href="{{ route('dash.images.index') }}" class="" aria-expanded="false">
                        <div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                                fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" />
                                <circle cx="8.5" cy="8.5" r="1.5" />
                                <path d="M20.4 14.5L16 10 4 20" />
                            </svg>
                        </div>
                        <span class="nav-text">Images</span>
                    </a>
                </li>

                <li><a href="{{ route('dash.vouchers.index') }}" class="" aria-expanded="false">
                        <div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                                fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="10" cy="20.5" r="1" />
                                <circle cx="18" cy="20.5" r="1" />
                                <path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1" />
                            </svg>
                        </div>
                        <span class="nav-text">Vouchers</span>
                    </a>
                </li>

                <li @class(['mm-active'=>Request::is('dash/admins/*')||Request::is('dash/roles/*')])>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.986 14.0673C7.4407 14.0673 4.41309 14.6034 4.41309 16.7501C4.41309 18.8969 7.4215 19.4521 10.986 19.4521C14.5313 19.4521 17.5581 18.9152 17.5581 16.7693C17.5581 14.6234 14.5505 14.0673 10.986 14.0673Z"
                                    stroke="#888888" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.986 11.0054C13.3126 11.0054 15.1983 9.11881 15.1983 6.79223C15.1983 4.46564 13.3126 2.57993 10.986 2.57993C8.65944 2.57993 6.77285 4.46564 6.77285 6.79223C6.76499 9.11096 8.63849 10.9975 10.9563 11.0054H10.986Z"
                                    stroke="#888888" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <span class="nav-text">Admins & Permissions</span>
                    </a>
                    <ul aria-expanded="false" class="mm-collapse">
                        <li @class(['mm-active'=>Request::is('dash/admins/*')])
                        ><a @class(['mm-active'=>Request::is('dash/admins/*')]) href="{{ route('dash.admins.index') }}">Admins</a></li>

                        <li @class(['mm-active'=>Request::is('dash/roles/*')])
                        ><a @class(['mm-active'=>Request::is('dash/roles/*')]) href="{{ route('dash.roles.index') }}">Permissions</a></li>
                    </ul>
                </li>
            @endcan
    </div>
</div>

<!--**********************************
            Sidebar end
        ***********************************-->
