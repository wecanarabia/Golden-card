<x-admin-layouts.admin-app>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li><h5 class="bc-title">{{ __('Edit Service Image') }}</h5></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.home','today') }}">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{  __('Edit Service Image') }} </a></li>
            </ol>
            @can('view')
            <a class="text-primary fs-13" href="{{ route('admin.service-images.index') }}" >{{  __('Service Image') }}</a>
            @endcan
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                <h4 class="heading mb-0"> {{ __('Edit Service Image') }}</h4>
                                <x-admin-layouts.alerts />

                            <form method="POST" action="{{ route("admin.service-images.update",$image->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                        <input name="id" type="hidden" value="{{$image->id }}">

                                        <div class="col-xl-8 mb-3">
                                            <label for="image" class="form-label">Image<span class="text-danger">*</span></label>
                                            <input class="form-control" type="file" name="image" id="image">
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-8 mb-3">
                                            <label class="form-label">Service<span class="text-danger">*</span></label>
                                            <select class="default-select form-control wide mb-3" name="service_id" tabindex="null">
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}" @selected(old('service_id',$image->service_id)==$service->id)>{{ $service->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('service_id')
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
