<x-dash-layouts.dash-app>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li>
                    <h5 class="bc-title">{{ $service->name }}</h5>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('dash.home','today') }}">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z"
                                stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $service->name }} </a></li>
            </ol>
            @can('control')
                <a class="text-primary fs-13" href="{{ route('dash.services.edit', ['service' => $service->slug]) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="#888888" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path>
                        <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                    </svg>
                </a>
            @endcan
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <!-- Nav tabs -->
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home1"><i
                                        class="la la-address-card me-2"></i> General</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#contact1"><i
                                        class="la la-phone me-2"></i> Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#message1"><i
                                        class="la la-wallet me-2"></i>Bank</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="home1" role="tabpanel">
                                <div class="pt-4">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <div class="offcanvas-body">
                                                <div class="container-fluid">
                                                    <h4 class="heading mb-5"> {{ $service->name }}</h4>

                                                    <p class="mb-3"><strong>English title : </strong>
                                                        {{ $service->getTranslation('name', 'en') }}</p>
                                                    <p class="mb-3"><strong>Arabic Title : </strong>
                                                        {{ $service->getTranslation('name', 'ar') }}</p>
                                                    <p class="mb-3"><strong>English Description : </strong>
                                                        {{ $service->getTranslation('description', 'en') }}</p>
                                                    <p class="mb-3"><strong>Arabic Description : </strong>
                                                        {{ $service->getTranslation('description', 'ar') }}</p>
                                                    <p class="mb-3"><strong>Merchant Type : </strong>
                                                        {{ $service?->subcategories()?->first()?->category?->name }}</p>
                                                    <p class="mb-3"><strong>Code :</strong> {{ $service->code }}</p>
                                                    <img class="card-img-bottom img-thumbnail mb-3" style="width: 500px"
                                                        src="{{ asset($service->logo) }}"
                                                        alt="{{ $service->name }}">

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="contact1">
                                <div class="pt-4">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <div class="offcanvas-body">
                                                <div class="container-fluid">
                                                    <h4 class="heading mb-5"> {{ $service->name }}</h4>

                                                    <p class="mb-3"><strong>Email :</strong> {{ $service->email }}
                                                    </p>
                                                    <p class="mb-3"><strong>Phone :</strong> {{ $service->phone }}
                                                    </p>
                                                    <p class="mb-3"><strong>First Contact :</strong>
                                                        {{ $service->first_contact }}</p>
                                                    <p class="mb-3"><strong>Second Contact :</strong>
                                                        {{ $service->second_contact }}</p>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="message1">
                                <div class="pt-4">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <div class="offcanvas-body">
                                                <div class="container-fluid">
                                                    <h4 class="heading mb-5"> {{ $service->name }}</h4>

                                                    <p class="mb-3"><strong>Ipan : </strong> {{ $service->ipan }}</p>

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

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                    <div class="table-responsive active-projects manage-client">
                                        <div class="tbl-caption">
                                            <h4 class="heading mb-0"> {{ __('Branches') }}</h4>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>English Name</th>
                                                    <th>Arabic Name</th>
                                                    <th>Area</th>


                                                    <th>actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($service->branches as $branch)
                                                    <tr>

                                                        <td><span>{{ $branch->getTranslation('name', 'en') }}</span>
                                                        </td>

                                                        <td>
                                                            <span>{{ $branch->getTranslation('name', 'ar') }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $branch->area->name }}</span>
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
                                                                        href="{{ route('dash.branches.edit', $branch->slug) }}">Edit</a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('dash.branches.show', $branch->slug) }}">Show</a>

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
                                                    <th>Arabic Name</th>
                                                    <th>End Data</th>
                                                    <th>Discount Value</th>


                                                    <th>actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($service->offers as $offer)
                                                    <tr>

                                                        <td><span>{{ $offer->getTranslation('name', 'en') }}</span>
                                                        </td>
                                                        <td><span>{{ $offer->getTranslation('name', 'ar') }}</span>
                                                        </td>


                                                        <td>
                                                            <span>{{ $offer->end_date }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $offer->discount_value }}</span>
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
                                                                        href="{{ route('dash.offers.edit', $offer->slug) }}">Edit</a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('dash.offers.show', $offer->slug) }}">Show</a>

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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($service->images as $image)
                                                    <tr>
                                                        <td><span><img src="{{ asset($image->image) }}"
                                                                    width="150" alt=""></span></td>
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
                                    <x-admin-layouts.alerts />
                                    <div class="table-responsive active-projects manage-client">
                                        <div class="tbl-caption">
                                            <h4 class="heading mb-0"> {{ __('partner Sub Types') }}</h4>
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

</x-dash-layouts.dash-app>
