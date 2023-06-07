
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
					<li class="menu-title">Golden Card</li>
					<li><a class="has-arrow " href="{{ route('admin.dashboard') }}" aria-expanded="false">
						<div class="menu-icon">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M2.5 7.49999L10 1.66666L17.5 7.49999V16.6667C17.5 17.1087 17.3244 17.5326 17.0118 17.8452C16.6993 18.1577 16.2754 18.3333 15.8333 18.3333H4.16667C3.72464 18.3333 3.30072 18.1577 2.98816 17.8452C2.67559 17.5326 2.5 17.1087 2.5 16.6667V7.49999Z" stroke="#888888" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M7.5 18.3333V10H12.5V18.3333" stroke="#888888" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</div>
						<span class="nav-text">Dashboard</span>
						</a>

					</li>

                    @can('pages')
                    <li><a href="{{ route('admin.pages.index') }}" class="" aria-expanded="false">
                        <div class="menu-icon">
							<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M14.4065 14.8714H7.78821" stroke="#888888" stroke-linecap="round" stroke-linejoin="round"></path>
								<path d="M14.4065 11.0338H7.78821" stroke="#888888" stroke-linecap="round" stroke-linejoin="round"></path>
								<path d="M10.3137 7.2051H7.78827" stroke="#888888" stroke-linecap="round" stroke-linejoin="round"></path>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M14.5829 2.52066C14.5829 2.52066 7.54563 2.52433 7.53463 2.52433C5.00463 2.53991 3.43805 4.20458 3.43805 6.74374V15.1734C3.43805 17.7254 5.01655 19.3965 7.56855 19.3965C7.56855 19.3965 14.6049 19.3937 14.6168 19.3937C17.1468 19.3782 18.7143 17.7126 18.7143 15.1734V6.74374C18.7143 4.19174 17.1349 2.52066 14.5829 2.52066Z" stroke="#888888" stroke-linecap="round" stroke-linejoin="round"></path>
							</svg>
						</div>
							<span class="nav-text">Pages</span>
						</a>
					</li>
                    @endcan
                    @can('introductions')
					<li><a href="{{ route('admin.introductions.index') }}" class="" aria-expanded="false">
						<div class="menu-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M2.75 5.95833C2.75 3.55189 2.77577 2.75 5.95833 2.75C9.1409 2.75 9.16667 3.55189 9.16667 5.95833C9.16667 8.36478 9.17682 9.16667 5.95833 9.16667C2.73985 9.16667 2.75 8.36478 2.75 5.95833Z" stroke="#888888" stroke-linecap="round" stroke-linejoin="round"></path>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M12.8333 5.95833C12.8333 3.55189 12.8591 2.75 16.0416 2.75C19.2242 2.75 19.25 3.55189 19.25 5.95833C19.25 8.36478 19.2601 9.16667 16.0416 9.16667C12.8232 9.16667 12.8333 8.36478 12.8333 5.95833Z" stroke="#888888" stroke-linecap="round" stroke-linejoin="round"></path>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M2.75 16.0417C2.75 13.6352 2.77577 12.8333 5.95833 12.8333C9.1409 12.8333 9.16667 13.6352 9.16667 16.0417C9.16667 18.4481 9.17682 19.25 5.95833 19.25C2.73985 19.25 2.75 18.4481 2.75 16.0417Z" stroke="#888888" stroke-linecap="round" stroke-linejoin="round"></path>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M12.8333 16.0417C12.8333 13.6352 12.8591 12.8333 16.0416 12.8333C19.2242 12.8333 19.25 13.6352 19.25 16.0417C19.25 18.4481 19.2601 19.25 16.0416 19.25C12.8232 19.25 12.8333 18.4481 12.8333 16.0417Z" stroke="#888888" stroke-linecap="round" stroke-linejoin="round"></path>
							</svg>
						</div>
							<span class="nav-text">Introductions</span>
						</a>
					</li>
                    @endcan
                    @if(Auth::user()?->can('admins')||Auth::user()?->can('roles'))
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
						<div class="menu-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M10.986 14.0673C7.4407 14.0673 4.41309 14.6034 4.41309 16.7501C4.41309 18.8969 7.4215 19.4521 10.986 19.4521C14.5313 19.4521 17.5581 18.9152 17.5581 16.7693C17.5581 14.6234 14.5505 14.0673 10.986 14.0673Z" stroke="#888888" stroke-linecap="round" stroke-linejoin="round"></path>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M10.986 11.0054C13.3126 11.0054 15.1983 9.11881 15.1983 6.79223C15.1983 4.46564 13.3126 2.57993 10.986 2.57993C8.65944 2.57993 6.77285 4.46564 6.77285 6.79223C6.76499 9.11096 8.63849 10.9975 10.9563 11.0054H10.986Z" stroke="#888888" stroke-linecap="round" stroke-linejoin="round"></path>
							</svg>
						</div>
						<span class="nav-text">Admins & Permissions</span>
						</a>
                        <ul aria-expanded="false" class="mm-collapse">
                            @can('admins')
                            <li><a href="{{ route('admin.admins.index') }}">Admins</a></li>
                            @endcan
                            @can('roles')
                            <li><a href="{{ route('admin.roles.index') }}">Permissions</a></li>
                            @endcan
                        </ul>
					</li>
                    @endif
                    @can('users')
                    <li><a href="{{ route('admin.users.index') }}" class="" aria-expanded="false">
						<div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3"/><circle cx="12" cy="10" r="3"/><circle cx="12" cy="12" r="10"/></svg>
						</div>
						<span class="nav-text">Users</span>
						</a>
					</li>
                    @endcan
                    @can('slider')
					<li><a href="{{ route('admin.slider.index') }}" class="" href="javascript:void(0);" aria-expanded="false">
						<div class="menu-icon">

                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>						</div>
						<span class="nav-text">Slider</span>
						</a>

					</li>
                    @endcan
                    @can('areas')
                    <li><a href="{{ route('admin.areas.index') }}" class="" href="javascript:void(0);" aria-expanded="false">
						<div class="menu-icon">

                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s-8-4.5-8-11.8A8 8 0 0 1 12 2a8 8 0 0 1 8 8.2c0 7.3-8 11.8-8 11.8z"/><circle cx="12" cy="10" r="3"/></svg>						</div>
						<span class="nav-text">Areas</span>
						</a>

					</li>
                    @endcan
                    @can('categories')
                    <li><a href="{{ route('admin.categories.index') }}" class="" href="javascript:void(0);" aria-expanded="false">
						<div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg></div>
						<span class="nav-text">Categories</span>
						</a>

					</li>
                    @endcan
                    @can('services')
                    <li>
                        <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
						<div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M21 12H3M12 3v18"/></svg>
                        </div>
                            <span class="nav-text">Services</span>
						</a>
                        <ul aria-expanded="false" class="mm-collapse">
							<li><a href="{{ route('admin.services.index') }}">Services</a></li>
							<li><a href="{{ route('admin.service-images.index') }}">Images</a></li>
							<li><a href="{{ route('admin.branches.index') }}">Branches</a></li>
							<li><a href="{{ route('admin.offers.index') }}">Offers</a></li>
							<li><a href="{{ route('admin.vouchers.index') }}">Vouchers</a></li>
                        </ul>

					</li>
                    @endcan
                    @can('plans')
                    <li><a href="{{ route('admin.plans.index') }}" class="" href="javascript:void(0);" aria-expanded="false">
						<div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>						<span class="nav-text">Plans</span>
						</div>
                        </a>

					</li>
                    @endcan
                    @can('subscriptions')
                    <li><a href="{{ route('admin.subscriptions.index') }}" class="" aria-expanded="false">
						<div class="menu-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M8.79222 13.9396C12.1738 13.9396 15.0641 14.452 15.0641 16.4989C15.0641 18.5458 12.1931 19.0729 8.79222 19.0729C5.40972 19.0729 2.52039 18.5651 2.52039 16.5172C2.52039 14.4694 5.39047 13.9396 8.79222 13.9396Z" stroke="#888888" stroke-linecap="round" stroke-linejoin="round"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M8.79223 11.0182C6.57206 11.0182 4.77173 9.21874 4.77173 6.99857C4.77173 4.7784 6.57206 2.97898 8.79223 2.97898C11.0115 2.97898 12.8118 4.7784 12.8118 6.99857C12.8201 9.21049 11.0326 11.0099 8.82064 11.0182H8.79223Z" stroke="#888888" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M15.1095 9.9748C16.5771 9.76855 17.7073 8.50905 17.7101 6.98464C17.7101 5.48222 16.6147 4.23555 15.1782 3.99997" stroke="#888888" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M17.0458 13.5045C18.4675 13.7163 19.4603 14.2149 19.4603 15.2416C19.4603 15.9483 18.9928 16.4067 18.2374 16.6936" stroke="#888888" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</div>
							<span class="nav-text">Subscriptions</span>
						</a>
					</li>
                    @endcan
                    @can('user-codes')
                    <li>
                        <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2V6l-3-4H6zM3.8 6h16.4M16 10a4 4 0 1 1-8 0"/></svg>
                            </div>
                            <span class="nav-text">Individual Codes</span>
						</a>
                        <ul aria-expanded="false" class="mm-collapse">
							<li><a href="{{ route('admin.promo-codes.index') }}">Promo Codes</a></li>
							<li><a href="{{ route('admin.user-codes.index') }}">User Codes</a></li>

                        </ul>
					</li>
                    @endcan
                    @can('enterprises')
                    <li>
                        <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <div class="menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M21.5 12H16c-.7 2-2 3-4 3s-3.3-1-4-3H2.5"/><path d="M5.5 5.1L2 12v6c0 1.1.9 2 2 2h16a2 2 0 002-2v-6l-3.4-6.9A2 2 0 0016.8 4H7.2a2 2 0 00-1.8 1.1z"/></svg>
                            </div>
                            <span class="nav-text">Enterprise</span>
						</a>
                        <ul aria-expanded="false" class="mm-collapse">
							<li><a href="{{ route('admin.enterprises.index') }}">Subscriptions</a></li>
							<li><a href="{{ route('admin.enterprise-copones.index') }}">Copones</a></li>

                        </ul>
					</li>
                    @endcan
                    @can('tags')
                    <li><a href="{{ route('admin.tags.index') }}" class="" href="javascript:void(0);" aria-expanded="false">
						<div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>                        </div>
						<span class="nav-text">Tags</span>
						</a>

					</li>
                    @endcan
                    @can('features')
                    <li><a href="{{ route('admin.features.index') }}" class="" href="javascript:void(0);" aria-expanded="false">
						<div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>                         </div>
						<span class="nav-text">Features</span>
						</a>

					</li>
                    @endcan
                    @can('notifications')
                    <li><a href="{{ route('admin.notifications.index') }}" class="" href="javascript:void(0);" aria-expanded="false">
						<div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path></svg>                                              </div>
						<span class="nav-text">Notifications</span>
						</a>

					</li>
                    @endcan
			</div>
        </div>

        <!--**********************************
            Sidebar end
        ***********************************-->
