<x-admin-layouts.admin-app>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li><h5 class="bc-title">{{ $service->name }}</h5></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $service->name }} </a></li>
            </ol>

            <a class="text-primary fs-13" href="{{ route('admin.services.index') }}" >{{  __('Services') }}</a>

        </div>

        <div class="container-fluid">

                       <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                    <div>
                                        <a class="btn btn-info my-2 float-end" href="{{ route('admin.partners.branch-create',$service->id) }}">+ Add Branch</a>
                                        <a class="btn btn-info my-2 float-end" href="{{ route('admin.partners.images-create',$service->id) }}">+ Add Images</a>
                                        <a class="btn btn-info my-2 float-end" href="{{ route('admin.partners.offer-create',$service->id) }}">+ Add Offer</a>
                                        <a class="btn btn-info my-2 float-end" href="{{ route('admin.partners.vouchers',$service->id) }}" >{{  __('Vouchers') }}</a>
                                    </div>
                                <x-admin-layouts.alerts />
                                <h4 class="heading mb-5"> {{ $service->name }}</h4>

                                    <p class="mb-3"><strong>English title : </strong> {{ $service->getTranslation('name', 'en') }}</p>
                                    <p class="mb-3"><strong>Arabic Title : </strong> {{ $service->getTranslation('name', 'ar') }}</p>
                                    <p class="mb-3"><strong>English Description : </strong> {{ $service->getTranslation('description', 'en') }}</p>
                                    <p class="mb-3"><strong>Arabic Description : </strong> {{ $service->getTranslation('description', 'ar') }}</p>
                                    <p class="mb-3"><strong>Code :</strong> {{ $service->code }}</p>
                                    <p class="mb-3"><strong>Email :</strong> {{ $service->email }}</p>
                                    <p class="mb-3"><strong>Phone :</strong> {{ $service->phone }}</p>
                                    <p class="mb-3"><strong>Status :</strong> {{ $service->status==1?'Active':'InActive' }}</p>
                                    <p class="mb-3"><strong>Admin :</strong> {{ $service?->admin?->name}}</p>
                                    <p class="mb-3"><strong>Profit margin : </strong> {{ $service->profit_margin }}%</p>
                                    <p class="mb-3"><strong>Profits : </strong> {{ $profits }}</p>
                                    <p class="mb-3"><strong>IPAN : </strong> {{ $service->ipan }}</p>
                                    <p class="mb-3"><strong>Location : </strong> {{ $service->location }}</p>
                                    <p class="mb-3"><strong>Latitude :</strong> {{ $service->lat }}</p>
                                    <p class="mb-3"><strong>Longitude :</strong> {{ $service->long }}</p>
                                    <p class="mb-3"><strong>Classification :</strong> {{ $service->classification }}</p>
                                    <p class="mb-3"><strong>Merchant Type :</strong> <a href="{{ route('admin.categories.show', $service?->subcategories()?->first()->category->id) }}">
                                        {{ $service?->subcategories()?->first()->category->name }}</a></p>
                                    <p class="mb-3"><strong>Created At :</strong> {{ $service?->created_at }}</p>

                                    <img class="card-img-bottom img-thumbnail mb-3" style="width: 500px" src="{{ asset( $service->logo ) }}" alt="{{ $service->name }}">

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
                                    <x-admin-layouts.alerts />
                                    <div class="table-responsive active-projects manage-client">
                                        <div class="tbl-caption">
                                            <h4 class="heading mb-0"> {{ __('Branches') }}</h4>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>English Name</th>
                                                    <th>Arabic Name</th>
                                                    <th>Location</th>


                                                    <th>actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($service->branches as $branch)
                                                    <tr>

                                                        <td><span>{{ $branch->getTranslation('name', 'en') }}</span></td>

                                                        <td>
                                                            <span>{{ $branch->getTranslation('name', 'ar')}}</span>
                                                        </td>

                                                        <td>
                                                            <span>{{ $branch->location}}</span>
                                                        </td>


                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn btn-success light sharp"
                                                                    data-bs-toggle="dropdown">
                                                                    <svg width="20px" height="20px"
                                                                        viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1"
                                                                            fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0"
                                                                                width="24" height="24" />
                                                                            <circle fill="#000000" cx="5"
                                                                                cy="12" r="2" />
                                                                            <circle fill="#000000" cx="12"
                                                                                cy="12" r="2" />
                                                                            <circle fill="#000000" cx="19"
                                                                                cy="12" r="2" />
                                                                        </g>
                                                                    </svg>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admin.branches.edit', $branch->id) }}">Edit</a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admin.branches.show', $branch->id) }}">Show</a>

                                                                </div>
                                                            </div>
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
                                    <div class="table-responsive active-projects manage-client">
                                        <div class="tbl-caption">
                                            <h4 class="heading mb-0"> {{ __('Offers') }}</h4>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>English Name</th>
                                                    <th>End Data</th>
                                                    <th>Discount Value</th>
                                                    <th>Status</th>


                                                    <th>actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($service->offers as $offer)
                                                    <tr>

                                                        <td><span>{{ $offer->getTranslation('name', 'en') }}</span></td>


                                                        <td>
                                                            <span>{{ $offer->end_date}}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $offer->discount_value}}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $offer->status==1?'Active':'InActive' }}</span>
                                                        </td>


                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn btn-success light sharp"
                                                                    data-bs-toggle="dropdown">
                                                                    <svg width="20px" height="20px"
                                                                        viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1"
                                                                            fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0"
                                                                                width="24" height="24" />
                                                                            <circle fill="#000000" cx="5"
                                                                                cy="12" r="2" />
                                                                            <circle fill="#000000" cx="12"
                                                                                cy="12" r="2" />
                                                                            <circle fill="#000000" cx="19"
                                                                                cy="12" r="2" />
                                                                        </g>
                                                                    </svg>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admin.offers.edit', $offer->id) }}">Edit</a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admin.offers.show', $offer->id) }}">Show</a>

                                                                </div>
                                                            </div>
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
                                    <div class="table-responsive active-projects manage-client">
                                        <div class="tbl-caption">
                                            <h4 class="heading mb-0"> {{ __('Service Images') }}</h4>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>


                                                    <th>actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($service->images as $image)
                                                    <tr>

                                                        <td><span><img src="{{ asset($image->image) }}" width="150" alt=""></span></td>


                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn btn-success light sharp"
                                                                    data-bs-toggle="dropdown">
                                                                    <svg width="20px" height="20px"
                                                                        viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1"
                                                                            fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0"
                                                                                width="24" height="24" />
                                                                            <circle fill="#000000" cx="5"
                                                                                cy="12" r="2" />
                                                                            <circle fill="#000000" cx="12"
                                                                                cy="12" r="2" />
                                                                            <circle fill="#000000" cx="19"
                                                                                cy="12" r="2" />
                                                                        </g>
                                                                    </svg>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admin.service-images.edit', $image->id) }}">Edit</a>
                                                                                                                                   </div>
                                                            </div>
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

            @can('categories')
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                    <div class="table-responsive active-projects manage-client">
                                        <div class="tbl-caption">
                                            <h4 class="heading mb-0"> {{ __('Subcategories') }}</h4>
                                        </div>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="Preview" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="card-body pt-0">
                                                    <div class="table-responsive">
                                                        <table id="example" class="display table"
                                                            style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name-En</th>
                                                                    <th>Name-Ar</th>
                                                                    <th>Category</th>


                                                                    <th>actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($service->subcategories as $subcategory)
                                                                    <tr>

                                                                        <td><span>{{ $subcategory->getTranslation('name', 'en') }}</span>
                                                                        </td>
                                                                        <td>
                                                                            <span>{{ $subcategory->getTranslation('name', 'ar') }}</span>
                                                                        </td>
                                                                        <td>
                                                                            <span><a href="{{ route('admin.categories.show', $subcategory->category->id) }}">{{ $subcategory->category->name }}</a></span>
                                                                        </td>


                                                                        <td>
                                                                            <div class="dropdown">
                                                                                <button type="button"
                                                                                    class="btn btn-success light sharp"
                                                                                    data-bs-toggle="dropdown">
                                                                                    <svg width="20px" height="20px"
                                                                                        viewBox="0 0 24 24"
                                                                                        version="1.1">
                                                                                        <g stroke="none"
                                                                                            stroke-width="1"
                                                                                            fill="none"
                                                                                            fill-rule="evenodd">
                                                                                            <rect x="0"
                                                                                                y="0"
                                                                                                width="24"
                                                                                                height="24" />
                                                                                            <circle fill="#000000"
                                                                                                cx="5"
                                                                                                cy="12"
                                                                                                r="2" />
                                                                                            <circle fill="#000000"
                                                                                                cx="12"
                                                                                                cy="12"
                                                                                                r="2" />
                                                                                            <circle fill="#000000"
                                                                                                cx="19"
                                                                                                cy="12"
                                                                                                r="2" />
                                                                                        </g>
                                                                                    </svg>
                                                                                </button>
                                                                                <div class="dropdown-menu">
                                                                                    <a class="dropdown-item"
                                                                                        href="{{ route('admin.subcategories.edit', $subcategory->id) }}">Edit</a>
                                                                                    <a class="dropdown-item"
                                                                                        href="{{ route('admin.subcategories.show', $subcategory->id) }}">Show</a>
                                                                                                                                                                    </div>
                                                                            </div>
                                                                        </td>
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
                </div>
            </div>
            @endcan
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
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="Preview" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="card-body pt-0">
                                                    <div class="table-responsive">
                                                        <table id="example" class="display table"
                                                            style="min-width: 845px">
                                                            <thead>
                                                                <tr>

                                                                    <th>Code</th>
                                                                    <th>Offer</th>
                                                                    <th>User</th>
                                                                    <th>Branch</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($vouchers as $code)
                                                                    <tr>
                                                                        <td>{{ $code->code }}</td>
                                                                        <td>
                                                                            @if ($code->offer)


                                                                            <a
                                                                                href="{{ route('admin.offers.show', $code->offer->id) }}"><span
                                                                                    class="text-secondary">{{ $code->offer->name }}</span></a>
                                                                                    @endif
                                                                        </td>
                                                                        <td>

                                                                            @if($code->user)
                                                                            <a
                                                                                href="{{ route('admin.users.show', $code->user->id) }}">
                                                                                <span>{{ $code->user->first_name }}</span></a>
                                                                                @endif
                                                                        </td>
                                                                        <td>
                                                                            @if ($code->branch)

                                                                            <a
                                                                                href="{{ route('admin.branches.show', $code->branch->id) }}"><span
                                                                                    class="text-secondary">{{ $code->branch->name }}</span></a>
                                                                                   @endif

                                                                        </td>
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
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Content body end
    ***********************************-->

</x-admin-layouts.admin-app>
