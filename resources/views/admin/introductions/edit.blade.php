<x-admin-layouts.admin-app>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li><h5 class="bc-title">{{ __('Edit Introduction') }}</h5></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{  __('Edit Introduction') }} </a></li>
            </ol>
            <a class="text-primary fs-13" href="{{ route('admin.introductions.index') }}" >{{  __('Introductions') }}</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                <h4 class="heading mb-0"> {{ __('Edit Introduction') }}</h4>

                            <form method="POST" action="{{ route("admin.introductions.update",$introduction->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                        <input name="id" type="hidden" value="{{ $introduction->id }}">
                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputfirst" class="form-label">English Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="exampleFormControlInputfirst" name="english_title" placeholder="English Title" value="{{ $introduction->getTranslation('title', 'en')??  old('english_title') }}">
                                            @error('english_title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputsecond" class="form-label">Arabic Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="exampleFormControlInputsecond" name="arabic_title" placeholder="Arabic Title" value="{{ $introduction->getTranslation('title', 'ar')??old('arabic_title') }}">
                                            @error('arabic_title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputfirst" class="form-label">English Second Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="exampleFormControlInputfirst" name="english_second_title" placeholder="English Second Title" value="{{ old('english_second_title',$introduction->getTranslation('second_title', 'en')) }}">
                                            @error('english_second_title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputsecond" class="form-label">Arabic Second Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="exampleFormControlInputsecond" name="arabic_second_title" placeholder="Arabic Second Title" value="{{ old('arabic_second_title',$introduction->getTranslation('second_title', 'ar')) }}">
                                            @error('arabic_second_title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputThird" class="form-label">English Body<span class="text-danger">*</span></label>
                                            <textarea id="exampleFormControlInputThird" class="form-txtarea form-control" rows="8" name="english_body">{{ $introduction->getTranslation('body', 'en')??old('english_body') }}</textarea>
                                            @error('english_body')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputFourth" class="form-label">Arabic Body<span class="text-danger">*</span></label>
                                            <textarea id="exampleFormControlInputFourth" class="form-txtarea form-control" rows="8" name="arabic_body">{{ $introduction->getTranslation('body', 'ar')??old('arabic_body') }}</textarea>
                                            @error('arabic_body')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-8 mb-3">
                                            <label for="image" class="form-label">Image<span class="text-danger">*</span></label>
                                            <input class="form-control" type="file" name="image" id="image">
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    <div class="col-xl-8 mb-3">
                                        <input type="submit" class="btn btn-primary me-1" value='Update '>
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
