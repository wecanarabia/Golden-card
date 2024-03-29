<x-admin-layouts.admin-app>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li><h5 class="bc-title">{{ $subscription->enterprise_name }}</h5></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $subscription->enterprise_name }} </a></li>
            </ol>
            <a class="text-primary fs-13" href="{{ route('admin.enterprises.index') }}" >{{  __('Enterprise Subscriptions') }}</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                <h4 class="heading mb-5"> {{ $subscription->enterprise_name }}</h4>

                                    <p class="mb-3"><strong>Start Date : </strong> {{ $subscription->start_date }}</p>
                                    <p class="mb-3"><strong>End Date : </strong> {{ $subscription->end_date }}</p>
                                    <p class="mb-3"><strong>Number Of Users : </strong> {{ $subscription->num_of_users }}</p>
                                    <p class="mb-3"><strong>Enterprise Name : </strong> {{ $subscription->enterprise_name }}</p>
                                    <p class="mb-3"><strong>Total Active Copones : </strong> {{ $actives->count() }}</p>
                                    <p class="mb-3"><strong>Total InActive Copones : </strong> {{ $InActives->count() }}</p>
                                    <p class="mb-3"><strong>Status :</strong> {{ $subscription->status==1?'Active':'InActive' }}</p>
                                    <p class="mb-3"><strong>Date OF Activation :</strong> {{ $subscription->date_of_activation}}</p>

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
                                            <h4 class="heading mb-0"> {{ __('Enterprise Used Copones') }}</h4>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>

                                                    <th>User</th>
                                                    <th>Code</th>
                                                    <th>Usage Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($actives as $copone)
                                                    <tr>

                                                        {{-- <td><span>{{ $copone->start_date }}</span></td>
                                                        <td>
                                                            <span>{{ $copone->end_date }}</span>
                                                        </td> --}}

                                                        <td>
                                                            @if(!empty($copone->user))


                                                            <a href="{{ route("admin.users.show", $copone->user->id) }}"><span class="text-secondary">{{ $copone->user->first_name }}</span></a>
                                                            @endif
                                                        </td>
                                                        <td>{{ $copone->code}}</td>
                                                        <td>{{ $copone->updated_at}}</td>
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
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                    {{-- <x-admin-layouts.alerts /> --}}
                                    <div class="table-responsive active-projects manage-client">
                                        <div class="tbl-caption">
                                            <h4 class="heading mb-0"> {{ __('Enterprise Active Copones') }}</h4>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>

                                                    <th>User</th>
                                                    <th>Code</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($InActives as $copone)
                                                    <tr>

                                                        {{-- <td><span>{{ $copone->start_date }}</span></td>
                                                        <td>
                                                            <span>{{ $copone->end_date }}</span>
                                                        </td> --}}

                                                        <td>
                                                            @if(!empty($copone->user))


                                                            <a href="{{ route("admin.users.show", $copone->user->id) }}"><span class="text-secondary">{{ $copone->user->first_name }}</span></a>
                                                            @endif
                                                        </td>
                                                        <td>{{ $copone->code}}</td>
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

</x-admin-layouts.admin-app>
