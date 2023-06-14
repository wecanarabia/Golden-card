<x-dash-layouts.dash-app>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li><h5 class="bc-title">{{ __('Add Role') }}</h5></li>
                <li class="breadcrumb-item"><a href="{{ route('dash.home') }}">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{  __('Add Role') }} </a></li>
            </ol>
            <a class="text-primary fs-13" href="{{ route('dash.roles.index') }}" >{{  __('Roles') }}</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                <h4 class="heading mb-0"> {{ __('Add Role') }}</h4>

                            <form method="POST" action="{{ route('dash.roles.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-8 mb-3">
                                        <label for="exampleFormControlInputfirst" class="form-label">Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleFormControlInputfirst" name="name" placeholder="Name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-8 mb-3">
                                        <label for="exampleFormControlInputsecond" class="form-label">Permissions<span class="text-danger">*</span></label>
                                        @foreach (config('global.service') as $name => $value)
                                        <div class="form-group col-sm-4">
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" name="permissions[]" id="check{{ $name }}" value="{{ $name }}" @checked(is_array(old('permissions')) && in_array($name,old('permissions')))>
                                                <label class="form-check-label" for="check{{ $name }}">{{ $value }}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                        @error('permissions')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>



                                    <div class="col-xl-8 mb-3">
                                        <input type="submit" class="btn btn-primary me-1" value='Save'>
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
    @push('javasc')
    <script>
        $('.form-check-input').on('click', function() {
            if ($(this).val() == 'child') {
                $('#cats-list').removeClass('d-none')
            }else if ($(this).val() == 'parent') {
                $('#cats-list').addClass('d-none')
            }
        })
    </script>
    @endpush
</x-dash-layouts.dash-app>
