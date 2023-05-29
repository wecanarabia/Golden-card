<x-admin-layouts.admin-app>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li><h5 class="bc-title">{{ __('Edit Plan') }}</h5></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{  __('Edit Plan') }} </a></li>
            </ol>
            <a class="text-primary fs-13" href="{{ route('admin.plans.index') }}" >{{  __('Plans') }}</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                <h4 class="heading mb-0"> {{ __('Edit Plan') }}</h4>

                            <form method="POST" action="{{ route("admin.plans.update",$plan->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                        <input name="id" type="hidden" value="{{ $plan->id }}">
                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputfirst" class="form-label">English Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="exampleFormControlInputfirst" name="english_name" placeholder="English Name" value="{{ old('english_name',$plan->getTranslation('name','en')) }}">
                                            @error('english_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputsecond" class="form-label">Arabic Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="exampleFormControlInputsecond" name="arabic_name" placeholder="Arabic Name" value="{{ old('arabic_name',$plan->getTranslation('name','ar')) }}">
                                            @error('arabic_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputThird" class="form-label">Englis Details<span class="text-danger">*</span></label>
                                            <textarea id="exampleFormControlInputThird" class="form-txtarea form-control" rows="8" name="english_details">{{ old('english_details',$plan->getTranslation('details','en')) }}</textarea>
                                            @error('english_details')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputFourth" class="form-label">Arabic Details<span class="text-danger">*</span></label>
                                            <textarea id="exampleFormControlInputFourth" class="form-txtarea form-control" rows="8" name="arabic_details">{{ old('arabic_details',$plan->getTranslation('details','ar')) }}</textarea>
                                            @error('arabic_details')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label class="form-label">Period In Days<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="period" value="{{ old('period',$plan->period) }}">
                                            @error('period')
                                            <div class="text-danger">{{ $message }}</div>
                                             @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label class="form-label">Price<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="price" value="{{ old('price',$plan->price) }}">
                                            @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                             @enderror
                                        </div>


                                    <div class="col-xl-8 mb-3">
                                        <input type="submit" class="btn btn-primary me-1" value='Update Subscription'>
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
