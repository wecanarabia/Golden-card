<x-admin-layouts.admin-app>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li><h5 class="bc-title">{{ __('Add Category') }}</h5></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{  __('Add Category') }} </a></li>
            </ol>
            <a class="text-primary fs-13" href="{{ route('admin.categories.index') }}" >{{  __('Categories') }}</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                <h4 class="heading mb-0"> {{ __('Add Category') }}</h4>

                            <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-8 mb-3">
                                        <label for="exampleFormControlInputfirst" class="form-label">English Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleFormControlInputfirst" name="english_name" placeholder="English Name" value="{{ old('english_name') }}">
                                        @error('english_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-8 mb-3">
                                        <label for="exampleFormControlInputsecond" class="form-label">Arabic Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleFormControlInputsecond" name="arabic_name" placeholder="Arabic Name" value="{{ old('arabic_name') }}">
                                        @error('arabic_name')
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
                                        <label class="form-label">Type<span class="text-danger">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="parent" type="radio" name="type" value="parent" checked>
                                            <label class="form-check-label" for="parent">
                                                Parent
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="child" type="radio" name="type" value="child">
                                            <label class="form-check-label" for="child">
                                                Child
                                            </label>
                                        </div>
                                    </div>

                                    <div id="cats-list" class="col-xl-8 mb-3 d-none">
                                        <label class="form-label">Parent Category<span class="text-danger">*</span></label>
                                        <select class="default-select form-control wide mb-3" name="parent_id" tabindex="null">
                                            <option selected disabled>Select Parent Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @selected(old('parent_id')==$category->id)>{{ $category->name }}</option>
                                            @endforeach
										</select>
                                        @error('parent_id')
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
</x-admin-layouts.admin-app>
