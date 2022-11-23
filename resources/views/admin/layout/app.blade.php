<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset('/admin-tem/img/logo.png') }}" type="image/png">
    <script src="{{ asset('/admin-tem/js/jquery1-3.4.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/admin-tem/css/bootstrap1.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('/admin-tem/vendors/themefy_icon/themify-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('/admin-tem/vendors/niceselect/css/nice-select.css') }}" />

    <link rel="stylesheet" href="{{ asset('/admin-tem/vendors/owl_carousel/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin-tem/vendors/gijgo/gijgo.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('/admin-tem/vendors/font_awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin-tem/vendors/tagsinput/tagsinput.css') }}" />

    <link rel="stylesheet" href="{{ asset('/admin-tem/vendors/datepicker/date-picker.css') }}" />

    <link rel="stylesheet" href="{{ asset('/admin-tem/vendors/scroll/scrollable.css') }}" />

    <link rel="stylesheet" href="{{ asset('/admin-tem/vendors/datatable/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin-tem/vendors/datatable/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin-tem/vendors/datatable/css/buttons.dataTables.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('/admin-tem/vendors/text_editor/summernote-bs4.css') }}" />

    <link rel="stylesheet" href="{{ asset('/admin-tem/vendors/morris/morris.css') }}">

    <link rel="stylesheet" href="{{ asset('/admin-tem/vendors/material_icon/material-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('/admin-tem/css/metisMenu.css') }}">

    <link rel="stylesheet" href="{{ asset('/admin-tem/css/style1.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin-tem/css/colors/default.css') }}" id="colorSkinCSS">
    <link rel="stylesheet" href="{{ asset('/admin-tem/plugins/toastr/toastr.min.css') }}">
    <style>
        .dashboard-active {
            color: darkorange;
        }

        .dropdown-list-color-active {
            color: red;
        }
    </style>

</head>

<body class="crm_body_bg">

    @include('admin.partials.sidebar')

    <section class="main_content dashboard_part large_header_bg">

        @include('admin.partials.header')

        <div class="main_content_iner ">
            @yield('content')
        </div>

        @include('admin.partials.footer')
    </section>
    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>



    {{-- Modal untuk table user --}}
    {{-- @if ($act == 'tableuser')
    @foreach ($users as $user)    
    <div class="modal fade bd-example-modal-lg" id="showuser{{ $user->id }}" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="modal-content cs_modal">
                        <div class="modal-header bg-info justify-content-center">
                            <h5 class="modal-title text_white">Detail User</h5>
                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="">
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Full Name" value="{{ $user->name }}" disabled>
                                </div>
                                <div class="">
                                    <input type="text" class="form-control" name="username"
                                        placeholder="Username" value="{{ $user->username }}" disabled>
                                </div>
                                <div class="">
                                    <input type="text" class="form-control" placeholder="Enter email"
                                        name="email" value="{{ $user->email }}" disabled>
                                </div>
                                <div class="">
                                    <input type="text" class="form-control" placeholder="status"
                                        name="status" value="{{ $user->status }}" disabled>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="edituser{{ $user->id }}" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="modal-content cs_modal">
                        <div class="modal-header bg-warning justify-content-center">
                            <h5 class="modal-title text_white">Update User</h5>
                            <button type="button" class="btn-close text_white bg-light" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('update-user', $user->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="">
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Full Name" value="{{ $user->name }}">
                                </div>
                                <div class="">
                                    <input type="text" class="form-control" name="username"
                                        placeholder="Username" value="{{ $user->username }}">
                                </div>
                                <div class="">
                                    <input type="text" class="form-control" placeholder="Enter email"
                                        name="email" value="{{ $user->email }}">
                                </div>
                                <div class="">
                                    <input type="password" class="form-control" placeholder="isi jika ingin mengganti password"
                                        name="password" value="">
                                </div>
                                <button type="submit" class="btn_1 bg-warning border-0 full_width text-center">
                                    Update</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach

        <div class="modal fade bd-example-modal-lg" id="registeruser" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">

                        <div class="modal-content cs_modal">
                            <div class="modal-header bg-success justify-content-center">
                                <h5 class="modal-title text_white">Create New User</h5>
                                <button type="button" class="btn-close text_white bg-light" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('store-user') }}" method="POST">
                                    @csrf
                                    <div class="">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Full Name" required>
                                    </div>
                                    <div class="">
                                        <input type="text" class="form-control" name="username"
                                            placeholder="Username" required>
                                    </div>
                                    <div class="">
                                        <input type="text" class="form-control" placeholder="Enter email"
                                            name="email" required>
                                    </div>
                                    <div class="">
                                        <input type="password" class="form-control" placeholder="Password"
                                            name="password" required>
                                    </div>
                                    <button type="submit" class="btn_1 bg-success border-0 full_width text-center">
                                        Tambah</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif --}}
        {{-- Modal untuk table kas masuk --}}
    {{-- @if ($act == 'tablekasmasuk')
    @foreach ($kass as $kas)    
    <div class="modal fade bd-example-modal-lg" id="showkasmasuk{{ $kas->id_kas }}" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="modal-content cs_modal">
                        <div class="modal-header bg-info justify-content-center">
                            <h5 class="modal-title text_white">Detail Kas</h5>
                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                @csrf
                                <div class="">
                                    <input type="text" class="form-control" name="jenis"
                                        placeholder="Jenis Pemasukan" value="{{ $kas->jenis }}" required disabled>
                                </div>
                                <div class="">
                                    <input type="number" class="form-control" name="nominal"
                                        placeholder="Nominal" value="{{ $kas->nominal }}" required disabled>
                                </div>
                                <div class="">
                                    <input type="datetime-local" class="form-control" name="tanggal_kas"
                                        placeholder="Nominal" required value="{{ $kas->tanggal_kas }}" disabled>
                                </div>
                                <div class="">
                                   <select name="user_id" id="" class="form-select pt-2 mb-3 shadow-none text-secondary border-1">
                                    <option value="none" class="text-secondary">-- Pilih User --</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $kas->user_id ? 'selected' :'' }} class="text-secondary">{{ $user->name }}</option>
                                    @endforeach
                                   </select>
                                </div>
                                <div class="">
                                    <textarea name="keterangan" class="form-control" id="" cols="30" rows="10" placeholder="Keterangan (optional)" disabled>{{ $kas->keterangan }}</textarea>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="editkasmasuk{{ $kas->id_kas }}" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="modal-content cs_modal">
                        <div class="modal-header bg-warning justify-content-center">
                            <h5 class="modal-title text_white">Update User</h5>
                            <button type="button" class="btn-close text_white bg-light" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('update-kas-masuk', $kas->id_kas) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="">
                                    <input type="text" class="form-control" name="jenis"
                                        placeholder="Jenis Pemasukan" value="{{ $kas->jenis }}" required>
                                </div>
                                <div class="">
                                    <input type="number" class="form-control" name="nominal"
                                        placeholder="Nominal" value="{{ $kas->nominal }}" required>
                                </div>
                                <div class="">
                                    <input type="datetime-local" class="form-control" name="tanggal_kas"
                                        placeholder="Nominal" value="{{ $kas->tanggal_kas }}" required>
                                </div>
                                <div class="">
                                   <select name="user_id" id="" class="form-select pt-2 mb-3 shadow-none text-secondary border-1">
                                    <option value="none" class="text-secondary">-- Pilih User --</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $kas->user_id ? 'selected' : '' }} class="text-secondary">{{ $user->name }}</option>
                                    @endforeach
                                   </select>
                                </div>
                                <div class="">
                                    <textarea name="keterangan" class="form-control" id="" cols="30" rows="10" placeholder="Keterangan (optional)">{{ $kas->keterangan }}</textarea>
                                </div>
                                <button type="submit" class="btn_1 bg-warning border-0 full_width text-center">
                                    Update</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach

        <div class="modal fade bd-example-modal-lg" id="kasmasuk" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">

                        <div class="modal-content cs_modal">
                            <div class="modal-header bg-success justify-content-center">
                                <h5 class="modal-title text_white">Tambah Kas</h5>
                                <button type="button" class="btn-close text_white bg-light" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('store-kas-masuk') }}" method="POST">
                                    @csrf
                                    <div class="">
                                        <input type="text" class="form-control" name="jenis"
                                            placeholder="Jenis Pemasukan" required>
                                    </div>
                                    <div class="">
                                        <input type="number" class="form-control" name="nominal"
                                            placeholder="Nominal" required>
                                    </div>
                                    <div class="">
                                        <input type="datetime-local" class="form-control" name="tanggal_kas"
                                            placeholder="Nominal" required>
                                    </div>
                                    <div class="">
                                       <select name="user_id" id="" class="form-select pt-2 mb-3 shadow-none text-secondary border-1">
                                        <option value="none" class="text-secondary">-- Pilih User --</option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}" class="text-secondary">{{ $user->name }}</option>
                                        @endforeach
                                       </select>
                                    </div>
                                    <div class="">
                                        <textarea name="keterangan" class="form-control" id="" cols="30" rows="10" placeholder="Keterangan (optional)"></textarea>
                                    </div>
                                    <button type="submit" class="btn_1 bg-success border-0 full_width text-center">
                                        Tambah</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif --}}

    {{-- Modal untuk table kas keluar --}}
    {{-- @if ($act == 'tablekaskeluar')
    @foreach ($kass as $kas)    
    <div class="modal fade bd-example-modal-lg" id="showkaskeluar{{ $kas->id_kas }}" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="modal-content cs_modal">
                        <div class="modal-header bg-info justify-content-center">
                            <h5 class="modal-title text_white">Detail Kas</h5>
                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                @csrf
                                <div class="">
                                    <input type="text" class="form-control" name="jenis"
                                        placeholder="Jenis Pemasukan" value="{{ $kas->jenis }}" required disabled>
                                </div>
                                <div class="">
                                    <input type="number" class="form-control" name="nominal"
                                        placeholder="Nominal" value="{{ $kas->nominal }}" required disabled>
                                </div>
                                <div class="">
                                    <input type="datetime-local" class="form-control" name="tanggal_kas"
                                        placeholder="Nominal" required value="{{ $kas->tanggal_kas }}" disabled>
                                </div>
                                <div class="">
                                   <select name="user_id" id="" class="form-select pt-2 mb-3 shadow-none text-secondary border-1">
                                    <option value="none" class="text-secondary">-- Pilih User --</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $kas->user_id ? 'selected' :'' }} class="text-secondary">{{ $user->name }}</option>
                                    @endforeach
                                   </select>
                                </div>
                                <div class="">
                                    <textarea name="keterangan" class="form-control" id="" cols="30" rows="10" placeholder="Keterangan (optional)" disabled>{{ $kas->keterangan }}</textarea>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="editkaskeluar{{ $kas->id_kas }}" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="modal-content cs_modal">
                        <div class="modal-header bg-warning justify-content-center">
                            <h5 class="modal-title text_white">Update User</h5>
                            <button type="button" class="btn-close text_white bg-light" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('update-kas-keluar', $kas->id_kas) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="kas_keluar_old" value="{{ $kas->nominal }}">
                                <div class="">
                                    <input type="text" class="form-control" name="jenis"
                                        placeholder="Jenis Pemasukan" value="{{ $kas->jenis }}" required>
                                </div>
                                <div class="">
                                    <input type="number" class="form-control" name="nominal"
                                        placeholder="Nominal" value="{{ $kas->nominal }}" required>
                                </div>
                                <div class="">
                                    <input type="datetime-local" class="form-control" name="tanggal_kas"
                                        placeholder="Nominal" value="{{ $kas->tanggal_kas }}" required>
                                </div>
                                <div class="">
                                   <select name="user_id" id="" class="form-select pt-2 mb-3 shadow-none text-secondary border-1">
                                    <option value="none" class="text-secondary">-- Pilih User --</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $kas->user_id ? 'selected' : '' }} class="text-secondary">{{ $user->name }}</option>
                                    @endforeach
                                   </select>
                                </div>
                                <div class="">
                                    <textarea name="keterangan" class="form-control" id="" cols="30" rows="10" placeholder="Keterangan (optional)">{{ $kas->keterangan }}</textarea>
                                </div>
                                <button type="submit" class="btn_1 bg-warning border-0 full_width text-center">
                                    Update</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach

        <div class="modal fade bd-example-modal-lg" id="kasmasuk" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">

                        <div class="modal-content cs_modal">
                            <div class="modal-header bg-success justify-content-center">
                                <h5 class="modal-title text_white">Tambah Kas Keluar</h5>
                                <button type="button" class="btn-close text_white bg-light" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('store-kas-keluar') }}" method="POST">
                                    @csrf
                                    <div class="">
                                        <input type="text" class="form-control" name="jenis"
                                            placeholder="Jenis Pemasukan" required>
                                    </div>
                                    <div class="">
                                        <input type="number" class="form-control" name="nominal"
                                            placeholder="Nominal" required>
                                    </div>
                                    <div class="">
                                        <input type="datetime-local" class="form-control" name="tanggal_kas"
                                            placeholder="Nominal" required>
                                    </div>
                                    <div class="">
                                       <select name="user_id" id="" class="form-select pt-2 mb-3 shadow-none text-secondary border-1">
                                        <option value="none" class="text-secondary">-- Pilih User --</option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}" class="text-secondary">{{ $user->name }}</option>
                                        @endforeach
                                       </select>
                                    </div>
                                    <div class="">
                                        <textarea name="keterangan" class="form-control" id="" cols="30" rows="10" placeholder="Keterangan (optional)"></textarea>
                                    </div>
                                    <button type="submit" class="btn_1 bg-success border-0 full_width text-center">
                                        Tambah</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif --}}




    




    

    <script src="{{ asset('/admin-tem/js/popper1.min.js') }}"></script>

    <script src="{{ asset('/admin-tem/js/bootstrap1.min.js') }}"></script>

    <script src="{{ asset('/admin-tem/js/metisMenu.js') }}"></script>

    <script src="{{ asset('/admin-tem/vendors/count_up/jquery.waypoints.min.js') }}"></script>

    <script src="{{ asset('/admin-tem/vendors/chartlist/Chart.min.js') }}"></script>

    <script src="{{ asset('/admin-tem/vendors/count_up/jquery.counterup.min.js') }}"></script>

    <script src="{{ asset('/admin-tem/vendors/niceselect/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ asset('/admin-tem/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('/admin-tem/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/admin-tem/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/admin-tem/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/admin-tem/vendors/datatable/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('/admin-tem/vendors/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('/admin-tem/vendors/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/admin-tem/vendors/datatable/js/vfs_fonts.js') }}>"></script>
    <script src="{{ asset('/admin-tem/vendors/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/admin-tem/vendors/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/admin-tem/js/chart.min.js') }}"></script>

    <script src="{{ asset('/admin-tem/vendors/progressbar/jquery.barfiller.js') }}"></script>

    <script src="{{ asset('/admin-tem/vendors/tagsinput/tagsinput.js') }}"></script>

    <script src="{{ asset('/admin-tem/vendors/text_editor/summernote-bs4.js') }}"></script>
    <script src="{{ asset('/admin-tem/vendors/am_chart/amcharts.js') }}"></script>

    <script src="{{ asset('/admin-tem/vendors/scroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/admin-tem/vendors/scroll/scrollable-custom.js') }}"></script>
    <script src="{{ asset('/admin-tem/vendors/chart_am/core.js') }}"></script>
    <script src="{{ asset('/admin-tem/vendors/chart_am/charts.js') }}"></script>
    <script src="{{ asset('/admin-tem/vendors/chart_am/animated.js') }}"></script>
    <script src="{{ asset('/admin-tem/vendors/chart_am/kelly.js') }}"></script>
    <script src="{{ asset('/admin-tem/vendors/chart_am/chart-custom.js') }}"></script>

    <script src="{{ asset('/admin-tem/js/custom.js') }}"></script>
    <script src="{{ asset('/admin-tem/plugins/toastr/toastr.min.js') }}"></script>
    <script>
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        })
        @if(Session::has('status'))
              @if(Session::get('status') == 'success')
                  toastr.success(`{{ Session::get('message') }}`)
              @else
              toastr.error(`{{ Session::get('message') }}`)
              @endif
          @endif
      </script>
      <script>
      </script>
</body>

</html>
