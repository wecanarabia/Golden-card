<x-dash-layouts.dash-app>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li><h5 class="bc-title">{{ $service->name }}</h5></li>
                <li class="breadcrumb-item"><a href="{{ route('dash.home') }}">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{  $service->name }} </a></li>
            </ol>
            <a class="text-primary fs-13" href="{{ route('dash.services.show',['service'=>$service->slug]) }}" >
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
            </a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                <h4 class="heading mb-0"> {{ $service->name }}</h4>

                            <form method="POST" action="{{ route("dash.services.update",$service->slug) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                        <input name="id" type="hidden" value="{{ $service->id }}">
                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputfirst" class="form-label">English Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="exampleFormControlInputfirst" name="english_name" placeholder="English Name" value="{{ old('english_name',$service->getTranslation('name','en')) }}">
                                            @error('english_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputsecond" class="form-label">Arabic Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="exampleFormControlInputsecond" name="arabic_name" placeholder="Arabic Name" value="{{ old('arabic_name',$service->getTranslation('name','ar')) }}">
                                            @error('arabic_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputThird" class="form-label">Englis Description<span class="text-danger">*</span></label>
                                            <textarea id="exampleFormControlInputThird" class="form-txtarea form-control" rows="8" name="english_description">{{ old('english_description',$service->getTranslation('description','en')) }}</textarea>
                                            @error('english_description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputFourth" class="form-label">Arabic Description<span class="text-danger">*</span></label>
                                            <textarea id="exampleFormControlInputFourth" class="form-txtarea form-control" rows="8" name="arabic_description">{{ old('arabic_description',$service->getTranslation('description','ar')) }}</textarea>
                                            @error('arabic_description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label class="form-label">Code<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="code" value="{{ old('code',$service->code) }}">
                                            @error('code')
                                            <div class="text-danger">{{ $message }}</div>
                                             @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label class="form-label">Email<span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email',$service->email) }}">
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                             @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label class="form-label">Phone<span class="text-danger">*</span></label>
                                            <input type="phone" class="form-control" name="phone" value="{{ old('phone',$service->phone) }}">
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
                                            <label for="exampleFormControlInputthird" class="form-label">Ipan<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="exampleFormControlInputthird" name="ipan" value="{{ old('ipan',$service->ipan) }}">
                                            @error('ipan')
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
                                        <div class="col-xl-8 mb-3">
                                            <label for="addnote" class="form-label">Location</label><span class="text-danger">*</span></label>
                                            <input type="text" id="address-input" name="location" value="{{  old('location',$service->location) }}" class="form-control map-input">
                                            <input type="hidden" name="lat" id="address-latitude" value="{{  old('lat',$service->lat) }}" />
                                            <input type="hidden" name="long" id="address-longitude" value="{{  old('long',$service->long) }}" />
                                            <div id="address-map-container" style="width:100%;height:400px; ">
                                                <div style="width: 100%; height: 100%" id="address-map"></div>
                                            </div>
                                            @error('location')
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

</x-dash-layouts.dash-app>