<x-dash-layouts.dash-app>

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="page-titles">
				<ol class="breadcrumb">
					<li><h5 class="bc-title">Home</h5></li>
					<li class="breadcrumb-item"><a href="javascript:void(0)">
						<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
						Home </a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
				</ol>
			</div>
			<div class="container-fluid">
				<div class="row">
                    <div class="col-xl-9 wid-100">
						<div class="row">
                    <div class="card-header border-0 pb-0 flex-wrap mb-2">
                        <h4 class="heading mb-0">Hi {{ auth()->user()->name }}</h4>
                        <ul class="nav nav-pills mix-chart-tab" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a href="{{ route('dash.home') }}" @class(["nav-link",
                                "active"=>\Illuminate\Support\Facades\Request::is("dash/")])>Today</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="{{ route('dash.home','week') }}" @class(["nav-link",
                                "active"=>\Illuminate\Support\Facades\Request::is("dash/week")])>Week</a>
                          </li>
                          <li class="nav-item" role="presentation">
                            <a href="{{ route('dash.home','month') }}" @class(["nav-link",
                            "active"=>\Illuminate\Support\Facades\Request::is("dash/month")])>Month</a>
                          </li>
                          <li class="nav-item" role="presentation">
                            <a href="{{ route('dash.home','year') }}" @class(["nav-link",
                            "active"=>\Illuminate\Support\Facades\Request::is("dash/year")])>Year</a>
                          </li>

                        </ul>
                    </div>
                        </div>
                    </div>
					<div class="col-xl-9 wid-100">
						<div class="row">
							<div class="col-xl-3 col-sm-6">
								<div class="card chart-grd same-card">
									<div class="card-body depostit-card p-0">
										<div class="depostit-card-media d-flex justify-content-between pb-0">
											<div>
												<h6>Total Branches</h6>
												<h3>{{ $data['branches']->count() }}</h3>
											</div>
											<div class="icon-box bg-primary-light">
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="M18.7 8l-5.1 5.2-2.8-2.7L7 14.3"/></svg>
											</div>
										</div>
										<div id="NewCustomers"></div>
									</div>
								</div>
							</div>

							<div class="col-xl-3 col-sm-6">
								<div class="card chart-grd same-card">
									<div class="card-body depostit-card p-0">
										<div class="depostit-card-media d-flex justify-content-between pb-0">
											<div>
												<h6>Total Offers</h6>
												<h3>{{ $data['offers']->count() }}</h3>
                                                <p>Active offers {{ $data['active_offers']->count() }}</p>
											</div>
											<div class="icon-box bg-danger-light">
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2V6l-3-4H6zM3.8 6h16.4M16 10a4 4 0 1 1-8 0"/></svg>
											</div>
										</div>
										<div id="NewExperience"></div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-sm-6 same-card">
								<div class="card">
									<div class="card-body depostit-card">
										<div class="depostit-card-media d-flex justify-content-between style-1">
											<div>
												<h6>Total Vouchers</h6>
												<h3>{{ $data['vouchers_count']->count() }}</h3>
                                                <p>Saving value {{ $data['saving_value'] }} JD</p>
											</div>
											<div class="icon-box bg-primary-light">
												<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M16.3787 1.875H15.625V1.25C15.625 1.08424 15.5592 0.925268 15.4419 0.808058C15.3247 0.690848 15.1658 0.625 15 0.625C14.8342 0.625 14.6753 0.690848 14.5581 0.808058C14.4408 0.925268 14.375 1.08424 14.375 1.25V1.875H10.625V1.25C10.625 1.08424 10.5592 0.925268 10.4419 0.808058C10.3247 0.690848 10.1658 0.625 10 0.625C9.83424 0.625 9.67527 0.690848 9.55806 0.808058C9.44085 0.925268 9.375 1.08424 9.375 1.25V1.875H5.625V1.25C5.625 1.08424 5.55915 0.925268 5.44194 0.808058C5.32473 0.690848 5.16576 0.625 5 0.625C4.83424 0.625 4.67527 0.690848 4.55806 0.808058C4.44085 0.925268 4.375 1.08424 4.375 1.25V1.875H3.62125C2.99266 1.87599 2.3901 2.12614 1.94562 2.57062C1.50114 3.0151 1.25099 3.61766 1.25 4.24625V17.0037C1.25099 17.6323 1.50114 18.2349 1.94562 18.6794C2.3901 19.1239 2.99266 19.374 3.62125 19.375H16.3787C17.0073 19.374 17.6099 19.1239 18.0544 18.6794C18.4989 18.2349 18.749 17.6323 18.75 17.0037V4.24625C18.749 3.61766 18.4989 3.0151 18.0544 2.57062C17.6099 2.12614 17.0073 1.87599 16.3787 1.875ZM17.5 17.0037C17.499 17.3008 17.3806 17.5854 17.1705 17.7955C16.9604 18.0056 16.6758 18.124 16.3787 18.125H3.62125C3.32418 18.124 3.03956 18.0056 2.8295 17.7955C2.61944 17.5854 2.50099 17.3008 2.5 17.0037V4.24625C2.50099 3.94918 2.61944 3.66456 2.8295 3.4545C3.03956 3.24444 3.32418 3.12599 3.62125 3.125H4.375V3.75C4.375 3.91576 4.44085 4.07473 4.55806 4.19194C4.67527 4.30915 4.83424 4.375 5 4.375C5.16576 4.375 5.32473 4.30915 5.44194 4.19194C5.55915 4.07473 5.625 3.91576 5.625 3.75V3.125H9.375V3.75C9.375 3.91576 9.44085 4.07473 9.55806 4.19194C9.67527 4.30915 9.83424 4.375 10 4.375C10.1658 4.375 10.3247 4.30915 10.4419 4.19194C10.5592 4.07473 10.625 3.91576 10.625 3.75V3.125H14.375V3.75C14.375 3.91576 14.4408 4.07473 14.5581 4.19194C14.6753 4.30915 14.8342 4.375 15 4.375C15.1658 4.375 15.3247 4.30915 15.4419 4.19194C15.5592 4.07473 15.625 3.91576 15.625 3.75V3.125H16.3787C16.6758 3.12599 16.9604 3.24444 17.1705 3.4545C17.3806 3.66456 17.499 3.94918 17.5 4.24625V17.0037Z" fill="var(--primary)"/>
													<path d="M7.68311 7.05812L6.24999 8.49125L5.44186 7.68312C5.38421 7.62343 5.31524 7.57581 5.23899 7.54306C5.16274 7.5103 5.08073 7.49306 4.99774 7.49234C4.91475 7.49162 4.83245 7.50743 4.75564 7.53886C4.67883 7.57028 4.60905 7.61669 4.55037 7.67537C4.49168 7.73406 4.44528 7.80384 4.41385 7.88065C4.38243 7.95746 4.36661 8.03976 4.36733 8.12275C4.36805 8.20573 4.3853 8.28775 4.41805 8.364C4.45081 8.44025 4.49842 8.50922 4.55811 8.56687L5.80811 9.81687C5.92532 9.93404 6.08426 9.99986 6.24999 9.99986C6.41572 9.99986 6.57466 9.93404 6.69186 9.81687L8.56686 7.94187C8.68071 7.82399 8.74371 7.66612 8.74229 7.50224C8.74086 7.33837 8.67513 7.18161 8.55925 7.06573C8.44337 6.94985 8.28661 6.88412 8.12274 6.8827C7.95887 6.88127 7.80099 6.94427 7.68311 7.05812Z" fill="var(--primary)"/>
													<path d="M15 8.125H10.625C10.4592 8.125 10.3003 8.19085 10.1831 8.30806C10.0658 8.42527 10 8.58424 10 8.75C10 8.91576 10.0658 9.07473 10.1831 9.19194C10.3003 9.30915 10.4592 9.375 10.625 9.375H15C15.1658 9.375 15.3247 9.30915 15.4419 9.19194C15.5592 9.07473 15.625 8.91576 15.625 8.75C15.625 8.58424 15.5592 8.42527 15.4419 8.30806C15.3247 8.19085 15.1658 8.125 15 8.125Z" fill="var(--primary)"/>
													<path d="M7.68311 12.6831L6.24999 14.1162L5.44186 13.3081C5.38421 13.2484 5.31524 13.2008 5.23899 13.1681C5.16274 13.1353 5.08073 13.1181 4.99774 13.1173C4.91475 13.1166 4.83245 13.1324 4.75564 13.1639C4.67883 13.1953 4.60905 13.2417 4.55037 13.3004C4.49168 13.3591 4.44528 13.4288 4.41385 13.5056C4.38243 13.5825 4.36661 13.6648 4.36733 13.7477C4.36805 13.8307 4.3853 13.9127 4.41805 13.989C4.45081 14.0653 4.49842 14.1342 4.55811 14.1919L5.80811 15.4419C5.92532 15.559 6.08426 15.6249 6.24999 15.6249C6.41572 15.6249 6.57466 15.559 6.69186 15.4419L8.56686 13.5669C8.68071 13.449 8.74371 13.2911 8.74229 13.1272C8.74086 12.9634 8.67513 12.8066 8.55925 12.6907C8.44337 12.5749 8.28661 12.5091 8.12274 12.5077C7.95887 12.5063 7.80099 12.5693 7.68311 12.6831Z" fill="var(--primary)"/>
													<path d="M15 13.75H10.625C10.4592 13.75 10.3003 13.8158 10.1831 13.9331C10.0658 14.0503 10 14.2092 10 14.375C10 14.5408 10.0658 14.6997 10.1831 14.8169C10.3003 14.9342 10.4592 15 10.625 15H15C15.1658 15 15.3247 14.9342 15.4419 14.8169C15.5592 14.6997 15.625 14.5408 15.625 14.375C15.625 14.2092 15.5592 14.0503 15.4419 13.9331C15.3247 13.8158 15.1658 13.75 15 13.75Z" fill="var(--primary)"/>
												</svg>

											</div>
										</div>

									</div>
								</div>
							</div>
                            <div class="col-xl-3 col-sm-6">
								<div class="card chart-grd same-card">
									<div class="card-body depostit-card p-0">
										<div class="depostit-card-media d-flex justify-content-between pb-0">
											<div>
												<h6>Pin code</h6>
												<h3>{{ $service->code }}</h3>
											</div>
											<div class="icon-box bg-primary-light">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#888" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg>											</div>
										</div>
										<div id="NewCustomers"></div>
									</div>
								</div>
							</div>

						</div>
					</div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="offcanvas-body">
                                        <div class="container-fluid">
                                            <x-admin-layouts.alerts />
                                            <div class="table-responsive active-projects manage-client">
                                                <div class="tbl-caption">
                                                    <h4 class="heading mb-0"> {{ __('Popular Offers') }}</h4>
                                                </div>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Title-En</th>
                                                            <th>Title-Ar</th>
                                                            <th>Start Data</th>
                                                            <th>End Data</th>
                                                            <th>Estimated Saving Value (JD)</th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($data['popular_offers'] as $offer)
                                                            <tr>

                                                                <td><span>{{ $offer->getTranslation('name', 'en') }}</span></td>
                                                                <td><span>{{ $offer->getTranslation('name', 'ar') }}</span></td>


                                                                <td>
                                                                    <span>{{ $offer->start_date}}</span>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $offer->end_date}}</span>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $offer->discount_value}}</span>
                                                                </td>




                                                            </tr>

                                                        @empty
                                                            <tr>
                                                                <th colspan="5">
                                                                    <h5 class="text-center">There is No data</h5>
                                                                </th>
                                                            </tr>
                                                        @endforelse

                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="offcanvas-body">
                                        <div class="container-fluid">
                                            {{-- <x-admin-layouts.alerts /> --}}
                                            <div class="table-responsive active-projects manage-client">
                                                <div class="tbl-caption">
                                                    <h4 class="heading mb-0"> {{ __('Vouchers') }}</h4>
                                                </div>

                                                <table class="table">

                                                                    <thead>
                                                                        <tr>

                                                                            <th>Code</th>
                                                                            <th>Offer</th>
                                                                            <th>User</th>
                                                                            <th>Branch</th>
                                                                            <th>Saving Value</th>
                                                                            <th>Date/Time</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @forelse ($data['vouchers'] as $code)
                                                                            <tr>
                                                                                <td>{{ $code->code }}</td>
                                                                                <td>
                                                                                    <a
                                                                                        href="{{ route('dash.offers.show', $code->offer->slug) }}"><span
                                                                                            class="text-secondary">{{ $code->offer->name }}</span></a>
                                                                                </td>
                                                                                <td>
                                                                                    <span>{{ $code->user->first_name }}</span>
                                                                                </td>
                                                                                <td>
                                                                                    <a
                                                                                        href="{{ route('dash.branches.show', $code->branch->slug) }}"><span
                                                                                            class="text-secondary">{{ $code->branch->name }}</span></a>
                                                                                </td>
                                                                                <td>{{ $code->offer->discount_value }}</td>
                                                                                <td>{{ $code->created_at }}</td>
                                                                                <td></td>

                                                                            </tr>

                                                                        @empty
                                                                            <tr>
                                                                                <th colspan="5">
                                                                                    <h5 class="text-center">There is No data
                                                                                    </h5>
                                                                                </th>
                                                                            </tr>
                                                                        @endforelse

                                                                    </tbody>

                                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</x-dash-layouts.dash-app>
