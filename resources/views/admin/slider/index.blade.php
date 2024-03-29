<x-admin-layouts.admin-app>
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li>
                    <h5 class="bc-title">{{ __('Slider Images') }}</h5>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z"
                                stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Slider Images') }} </a></li>
            </ol>
            <a class="text-primary fs-13" href="{{ route('admin.slider.create') }}">+ Add Slider Image</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                    <x-admin-layouts.alerts />
                                    <div class="table-responsive active-projects manage-client">
                                        <div class="tbl-caption">
                                            <h4 class="heading mb-0"> {{ __('Slider Images') }}</h4>
                                        </div>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="Preview" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="card-body pt-0">
                                                    <div class="table-responsive">
                                                        <table id="example" class="display table"
                                                            style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th>Order</th>

                                                                    <th>Image</th>
                                                                    <th>Partner</th>
                                                                    <th>Sort</th>


                                                                    <th>actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($data as $image)
                                                                    <tr>
                                                                        <td><span>{{ $image->order }}</span></td>
                                                                        <td><span><img src="{{ asset($image->image) }}"
                                                                                    width="150"
                                                                                    alt=""></span></td>
                                                                        @if (!empty($image->service))
                                                                            <td><span><a
                                                                                        href="{{ route('admin.services.show', $image->service->id) }}">{{ $image->service->name }}</a></span>
                                                                            </td>
                                                                        @else
                                                                            <td>No Partner</td>
                                                                        @endif
                                                                        <td class="align-center">
                                                                            @if ($data->count()>1)

                                                                            <a
                                                                                href="{{ route('admin.slider.sort', ['id' => $image->id, 'direction' => 'up']) }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="22" height="22"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="#000" stroke-width="1"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <path d="M12 19V6M5 12l7-7 7 7" />
                                                                                </svg>
                                                                            </a>
                                                                            <a
                                                                                href="{{ route('admin.slider.sort', ['id' => $image->id, 'direction' => 'down']) }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="22" height="22"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="#000" stroke-width="1"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <path d="M12 5v13M5 12l7 7 7-7" />
                                                                                </svg>
                                                                            </a>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <div class="dropdown">
                                                                                <button type="button"
                                                                                    class="btn btn-success light sharp"
                                                                                    data-bs-toggle="dropdown">
                                                                                    <svg width="20px" height="20px"
                                                                                        viewBox="0 0 24 24"
                                                                                        version="1.1">
                                                                                        <g stroke="none"
                                                                                            stroke-width="1"
                                                                                            fill="none"
                                                                                            fill-rule="evenodd">
                                                                                            <rect x="0"
                                                                                                y="0"
                                                                                                width="24"
                                                                                                height="24" />
                                                                                            <circle fill="#000000"
                                                                                                cx="5"
                                                                                                cy="12"
                                                                                                r="2" />
                                                                                            <circle fill="#000000"
                                                                                                cx="12"
                                                                                                cy="12"
                                                                                                r="2" />
                                                                                            <circle fill="#000000"
                                                                                                cx="19"
                                                                                                cy="12"
                                                                                                r="2" />
                                                                                        </g>
                                                                                    </svg>
                                                                                </button>
                                                                                <div class="dropdown-menu">
                                                                                    <a class="dropdown-item"
                                                                                        href="{{ route('admin.slider.edit', $image->id) }}">Edit</a>
                                                                                    <button class="dropdown-item"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#deleteModal"
                                                                                        data-id="{{ $image->id }}"
                                                                                        data-name="{{ asset($image->image) }}">Delete</button>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                @empty
                                                                    <tr>
                                                                        <th colspan="5">
                                                                            <h5 class="text-center">There is No data
                                                                            </h5>
                                                                        </th>
                                                                    </tr>
                                                                @endforelse

                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Slider Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.slider.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    @csrf
                    <div class="modal-body">
                        <p>Are you sure to delete?</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <img class="img-thumbnail" width="200px" name="name" id="name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>



    @push('javasc')
        <script>
            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var name = button.data('name')
                var modal = $(this)
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #name').attr('src', name);
            })
        </script>
    @endpush
</x-admin-layouts.admin-app>
