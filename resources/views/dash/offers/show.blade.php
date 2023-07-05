<x-dash-layouts.dash-app>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li><h5 class="bc-title">{{ $offer->name }}</h5></li>
                <li class="breadcrumb-item"><a href="{{ route('dash.home') }}">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $offer->name }} </a></li>
            </ol>
            @can('view')
            <a class="text-primary fs-13" href="{{ route('dash.offers.index') }}" >{{  __('Offers') }}</a>
            @endcan
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                <h4 class="heading mb-5"> {{ $offer->name }}</h4>

                                    <p class="mb-3"><strong>Title-En : </strong> {{ $offer->getTranslation('name', 'en') }}</p>
                                    <p class="mb-3"><strong>Title-Ar : </strong> {{ $offer->getTranslation('name', 'ar') }}</p>
                                    <p class="mb-3"><strong>English Description : </strong> {{ $offer->getTranslation('description', 'en') }}</p>
                                    <p class="mb-3"><strong>Arabic Description : </strong> {{ $offer->getTranslation('description', 'ar') }}</p>
                                    <p class="mb-3"><strong>Estimated Saving Value (JD) :</strong> {{ $offer->discount_value }}</p>
                                    <p class="mb-3"><strong>Discount Text :</strong> {{ $offer->discount_text }}</p>
                                    <p class="mb-3"><strong>Start Date :</strong> {{ $offer->start_date }}</p>
                                    <p class="mb-3"><strong>End Date :</strong> {{ $offer->end_date }}</p>
                                    <p class="mb-3"><strong>Use Times :</strong> {{ $offer->use_times }}</p>
                                    <img class="card-img-bottom img-thumbnail mb-3" style="width: 500px" src="{{ asset( $offer->image ) }}" alt="{{ $offer->name }}">

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
                                            <h4 class="heading mb-0"> {{ __('Tags this offer') }}</h4>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>English Name</th>
                                                    <th>Arabic Name</th>



                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($offer->tags as $tag)
                                                    <tr>

                                                        <td><span>{{ $tag->getTranslation('name', 'en') }}</span></td>

                                                        <td>
                                                            <span>{{ $tag->getTranslation('name', 'ar')}}</span>
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
                                                @forelse ($offer->branches as $branch)
                                                    <tr>

                                                        <td><span>{{ $branch->getTranslation('name', 'en') }}</span></td>

                                                        <td>
                                                            <span>{{ $branch->getTranslation('name', 'ar')}}</span>
                                                        </td>

                                                        <td>
                                                            <span>{{ $branch->area->name}}</span>
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
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($offer->vouchers as $code)
                                                    <tr>
                                                        <td>{{ $code->code }}</td>
                                                        <td>
                                                            <a href="{{ route("dash.offers.show", $code->offer->slug) }}"><span class="text-secondary">{{ $code->offer->name }}</span></a>
                                                        </td>
                                                        <td>
                                                            <span>{{ $code->user->first_name }}</span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route("dash.branches.show", $code->branch->slug) }}"><span class="text-secondary">{{ $code->branch->name }}</span></a>
                                                        </td>
                                                        <td></td>

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
        </div>


    </div>

    <!--**********************************
        Content body end
    ***********************************-->

</x-dash-layouts.dash-app>
