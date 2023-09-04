<x-admin-layouts.admin-app>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li><h5 class="bc-title">{{ __('Edit Enterprise Subscription') }}</h5></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{  __('Edit Enterprise Subscription') }} </a></li>
            </ol>
            <a class="text-primary fs-13" href="{{ route('admin.enterprises.index') }}" >{{  __('Enterprise Subscriptions') }}</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                <h4 class="heading mb-0"> {{ __('Edit Enterprise Subscription') }}</h4>

                            <form method="POST" action="{{ route("admin.enterprises.update",$subscription->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                        <input name="id" type="hidden" value="{{ $subscription->id }}">
                                        <div class="row">
                                            <div class="col-xl-8 mb-3">
                                                <label for="exampleFormControlInputfirst" class="form-label">Start Date<span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="exampleFormControlInputfirst" name="start_date" value="{{ old('start_date',$subscription->start_date) }}">
                                                @error('start_date')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-xl-8 mb-3">
                                                <label for="exampleFormControlInputfirst" class="form-label">End Date<span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="exampleFormControlInputfirst" name="end_date" value="{{ old('end_date',$subscription->end_date) }}">
                                                @error('end_date')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-xl-8 mb-3">
                                                <label class="form-label">Status<span class="text-danger">*</span></label>
                                                <div class="form-check">
                                                    <input class="form-check-input" id="inactive" type="radio" name="status" value="0" @checked(old('status',$subscription->status)==0)>
                                                    <label class="form-check-label" for="inactive">
                                                        InActive
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="active" name="status" value="1" @checked(old('status',$subscription->status)==1)>
                                                    <label class="form-check-label" for="active">
                                                        Active
                                                    </label>
                                                </div>
                                                @error('status')
                                                <div class="text-danger">{{ $message }}</div>
                                                 @enderror
                                            </div>



                                       






                                    <div class="col-xl-8 mb-3">
                                        <input type="submit" class="btn btn-primary me-1" value='Update'>
                                    </div>


                                </div>

                            </form>

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
