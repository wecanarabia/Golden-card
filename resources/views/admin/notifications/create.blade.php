<x-admin-layouts.admin-app>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li><h5 class="bc-title">{{ __('Add Notification') }}</h5></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{  __('Add Notification') }} </a></li>
            </ol>
            <a class="text-primary fs-13" href="{{ route('admin.notifications.index') }}" >{{  __('Notifications') }}</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                <h4 class="heading mb-0"> {{ __('Add Notification') }}</h4>

                            <form method="POST" action="{{ route('admin.notifications.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-8 mb-3">
                                        <label for="exampleFormControlInputfirst" class="form-label">English Title<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleFormControlInputfirst" name="english_title" placeholder="English Title" value="{{ old('english_title') }}">
                                        @error('english_title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-8 mb-3">
                                        <label for="exampleFormControlInputsecond" class="form-label">Arabic Title<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleFormControlInputsecond" name="arabic_title" placeholder="Arabic Title" value="{{ old('arabic_title') }}">
                                        @error('arabic_title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-8 mb-3">
                                        <label class="form-label">English Body<span class="text-danger">*</span></label>
                                        <div class="card-body custom-ekeditor">
                                            <textarea class="form-txtarea form-control" rows="8" name="english_body">{{ old('english_body') }}</textarea>
                                        </div>
                                        @error('english_body')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-8 mb-3">
                                        <label class="form-label">Arabic Body<span class="text-danger">*</span></label>
                                        <div class="card-body custom-ekeditor">

                                        <textarea class="form-txtarea form-control" rows="8" name="arabic_body">{{ old('arabic_body') }}</textarea>
                                        </div>
                                        @error('arabic_body')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>



                                    <div class="col-xl-8 mb-3">
                                        <label class="form-label">Sending Times<span class="text-danger">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="onetime" type="radio" name="sending_times" value="One Time" @checked(old('sending_times')=='One Time') checked>
                                            <label class="form-check-label" for="onetime">
                                                One Time
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="multibletimes" type="radio" name="sending_times" value="Multible Times" @checked(old('sending_times')=='Multible Times')>
                                            <label class="form-check-label" for="multibletimes">
                                                Multible Times
                                            </label>
                                        </div>
                                        @error('sending_times')
                                        <div class="text-danger">{{ $message }}</div>
                                         @enderror
                                    </div>

                                    <div id="shedualing" class="d-none">
                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputsecond" class="form-label">Sending Time<span class="text-danger">*</span></label>
                                            <input type="datetime-local" class="form-control" id="exampleFormControlInputsecond" name="date_time" value="{{ old('date_time') }}">
                                            @error('date_time')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-8 mb-3">
                                            <label class="form-label">Number Of Times<span class="text-danger">*</span></label>
                                            <input type="number" min="1" value="1" class="form-control" name="number_of_times" value="{{ old('number_of_times') }}">
                                            @error('number_of_times')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-8 mb-3">
                                            <label class="form-label">Schedule Time (In Hours)<span class="text-danger">*</span></label>
                                            <input type="number"  min="1" value="1" class="form-control" name="scheduale_time" value="{{ old('scheduale_time') }}">
                                            @error('scheduale_time')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
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
            if ($(this).val() == 'One Time') {
                $('#shedualing').addClass('d-none')

            }else if ($(this).val() == 'Multible Times') {
                $('#shedualing').removeClass('d-none')
            }
        })
    </script>
    @endpush
</x-admin-layouts.admin-app>
