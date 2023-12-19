<x-admin-layouts.admin-app>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li><h5 class="bc-title">{{ __('Add Partner') }}</h5></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{  __('Add Partner') }} </a></li>
            </ol>
            <a class="text-primary fs-13" href="{{ route('admin.services.index') }}" >{{  __('Partners') }}</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                <h4 class="heading mb-0"> {{ __('Add Partner') }}</h4>

                            <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
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
                                        <label for="exampleFormControlInputThird" class="form-label">Englis Description<span class="text-danger">*</span></label>
                                        <textarea id="exampleFormControlInputThird" class="form-txtarea form-control" rows="8" name="english_description">{{ old('english_description') }}</textarea>
                                        @error('english_description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-8 mb-3">
                                        <label for="exampleFormControlInputFourth" class="form-label">Arabic Description<span class="text-danger">*</span></label>
                                        <textarea id="exampleFormControlInputFourth" class="form-txtarea form-control" rows="8" name="arabic_description">{{ old('arabic_description') }}</textarea>
                                        @error('arabic_description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-8 mb-3">
                                        <label class="form-label">Code<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                                        @error('code')
                                        <div class="text-danger">{{ $message }}</div>
                                         @enderror
                                    </div>

                                    <div class="col-xl-8 mb-3">
                                        <label class="form-label">Email<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                         @enderror
                                    </div>

                                    <div class="col-xl-8 mb-3">
                                        <label class="form-label">Phone<span class="text-danger">*</span></label>
                                        <input type="phone" class="form-control" name="phone" value="{{ old('phone') }}">
                                        @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                         @enderror
                                    </div>

                                    <div class="col-xl-8 mb-3">
                                        <label for="exampleFormControlInputthird" class="form-label">Password<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="exampleFormControlInputthird" name="password" value="{{ old('password') }}">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-8 mb-3">
                                        <label class="form-label">Profit margin (%)<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="profit_margin" value="{{ old('profit_margin') }}">
                                        @error('profit_margin')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-8 mb-3">
                                        <label class="form-label">Classification<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="classification" value="{{ old('classification') }}">
                                        @error('classification')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-8 mb-3">
                                        <label for="exampleFormControlInputthird" class="form-label">IPAN</label>
                                        <input type="text" class="form-control" id="exampleFormControlInputthird" name="ipan" value="{{ old('ipan') }}">
                                        @error('ipan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-8 mb-3">
                                        <label class="form-label">Merchant Type<span class="text-danger">*</span></label>
                                        <select class="default-select form-control wide mb-3" name="category_id" id="category_id" tabindex="null">
                                            <option selected disabled>Choose merchant type</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
										</select>
                                        @error('category_id')
                                            <div class="text-danger">{{ $message }}</div>
                                         @enderror
                                    </div>

                                    <div id="cats-list" class="col-xl-8 mb-3">
                                        <label class="form-label">Subcategories<span class="text-danger">*</span></label>
                                        <div id="sub_id">
                                            @foreach ($subcategories as $subcategory)
                                                <input type="checkbox" class="form-input" value="{{ $subcategory->id }}" name="subcategories[]" @selected(in_array($subcategory->id,old( 'subcategories',[])))> {{ $subcategory->name }}<br>
                                            @endforeach
                                        </div>
                                    @error('subcategories')
                                    <div class="text-danger">{{ $message }}</div>
                                     @enderror
                                    </div>
                                    <div class="col-xl-8 mb-3">
                                        <label for="image" class="form-label">Logo<span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" name="logo" id="image">
                                        @error('logo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @can('all-services')
                                    <div class="col-xl-8 mb-3">
                                        <label class="form-label">Status<span class="text-danger">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="inactive" type="radio" name="status" value="0" @checked(old('status')==0)>
                                            <label class="form-check-label" for="inactive">
                                                InActive
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="active" type="radio" name="status" value="1" @checked(old('status')==1)>
                                            <label class="form-check-label" for="active">
                                                Active
                                            </label>
                                        </div>
                                        @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                         @enderror
                                    </div>
                                    @endcan
                                    <div class="col-xl-8 mb-3">
                                        <label for="addnote" class="form-label">Location</label><span class="text-danger">*</span></label>
                                        <input type="text" id="address-input" name="location" value="{{  old('location') }}" class="form-control map-input">
                                        <input type="hidden" name="lat" id="address-latitude" value="{{  old('lat',31.95659280141083) }}" />
                                        <input type="hidden" name="long" id="address-longitude" value="{{  old('long',35.91886795761721) }}" />
                                        <div id="address-map-container" style="width:100%;height:400px; ">
                                            <div style="width: 100%; height: 100%" id="address-map"></div>
                                        </div>
                                        @error('location')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                       </div>
                                    <div class="col-xl-8 mb-3">
                                        <button type="button" id="my-location" class="btn btn-info  me-1 float-end">My location</button>

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

            $('#category_id').change(function() {
                var categoryId = $(this).val();
                $.ajax({
                    url: 'sucats/' + categoryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var subcats = data.subcats;

                        // Populate the branches select box
                        $('#sub_id').html('');
                        $.each(subcats, function(index, value) {
                            $('#sub_id').append(' <input type="checkbox" class="form-input" name="subcategories[]" value="' + value.id + '"> ' + value["name"]["en"]+"<br>");
                        });
                    }
                });
            });

    </script>
    @endpush
</x-admin-layouts.admin-app>
