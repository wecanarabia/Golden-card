<x-dash-layouts.dash-app>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li><h5 class="bc-title">{{ __('Edit Offer') }}</h5></li>
                <li class="breadcrumb-item"><a href="{{ route('dash.home') }}">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{  __('Edit Offer') }} </a></li>
            </ol>
            @can('view')
            <a class="text-primary fs-13" href="{{ route('dash.offers.index') }}" >{{  __('Offers') }}</a>
            @endcan
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                <h4 class="heading mb-0"> {{ __('Edit Offer') }}</h4>

                            <form method="POST" action="{{ route("dash.offers.update",$offer->slug) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                        <input name="id" type="hidden" value="{{ $offer->id }}">
                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputfirst" class="form-label">Title-En<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="exampleFormControlInputfirst" name="english_name" placeholder="English Name" value="{{ old('english_name',$offer->getTranslation('name','en')) }}">
                                            @error('english_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputsecond" class="form-label">Title-Ar<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="exampleFormControlInputsecond" name="arabic_name" placeholder="Arabic Name" value="{{ old('arabic_name',$offer->getTranslation('name','ar')) }}">
                                            @error('arabic_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputThird" class="form-label">Englis Description<span class="text-danger">*</span></label>
                                            <textarea id="exampleFormControlInputThird" class="form-txtarea form-control" rows="8" name="english_description">{{ old('english_description',$offer->getTranslation('description','en')) }}</textarea>
                                            @error('english_description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputFourth" class="form-label">Arabic Description<span class="text-danger">*</span></label>
                                            <textarea id="exampleFormControlInputFourth" class="form-txtarea form-control" rows="8" name="arabic_description">{{ old('arabic_description',$offer->getTranslation('description','ar')) }}</textarea>
                                            @error('arabic_description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label class="form-label">Discount Text<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="discount_text" value="{{ old('discount_text',$offer->discount_text) }}">
                                            @error('discount_text')
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
                                            <label for="exampleFormControlInputfirst" class="form-label">Start Date<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="exampleFormControlInputfirst" name="start_date" value="{{ old('start_date',$offer->start_date) }}">
                                            @error('start_date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-8 mb-3">
                                            <label for="exampleFormControlInputfirst" class="form-label">End Date<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="exampleFormControlInputfirst" name="end_date" value="{{ old('end_date',$offer->end_date) }}">
                                            @error('end_date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div id="cats-list" class="col-xl-8 mb-3">
                                            <label class="form-label">Tags this offer<span class="text-danger">*</span></label>
                                        <div class="dropdown bootstrap-select show-tick default-select form-control wide">
                                            <select name="tags[]" multiple="" class="default-select form-control wide" tabindex="null">
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}" @selected(in_array($tag->id,old('tags',$offer?->tags?->pluck('id')->toArray())))>{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        @error('tags')
                                        <div class="text-danger">{{ $message }}</div>
                                         @enderror
                                        </div>

                                        <div id="cats-list" class="col-xl-8 mb-3">
                                            <label class="form-label">Branches<span class="text-danger">*</span></label>
                                        <div class="dropdown bootstrap-select show-tick default-select form-control wide">
                                            <select name="branches[]" multiple="" class="default-select form-control wide" tabindex="null">
                                                @foreach ($branches as $branch)
                                                    <option value="{{ $branch->id }}" @selected(in_array($branch->id,old('branches',$offer?->branches?->pluck('id')->toArray())))>{{ $branch->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @error('branches')
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
