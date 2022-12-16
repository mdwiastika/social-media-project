@extends('admin.layout.app')
@section('content')
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">{{ $title }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <h4>Table</h4>
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">
                                            <form Active="#">
                                                <div class="search_field">
                                                    <input type="text" placeholder="Search content here...">
                                                </div>
                                                <button type="submit"> <i class="ti-search"></i> </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="add_button ms-2">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#registeruser"
                                            class="btn_1">Add New User</a>
                                    </div>
                                </div>
                            </div>
                            <div class="QA_table mb_30">

                                <table class="table lms_table_active ">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama User</th>
                                            <th scope="col">Gambar Banding</th>
                                            <th scope="col">Alasan Banding</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="banding_body">
                                        @foreach ($bandings as $key => $banding)
                                        <tr id="trbanding{{ $banding->id }}">
                                            <th scope="row"> <a href="#" class="question_content"> {{ ($key+1) }}</a>
                                            </th>
                                            <td>{{ $banding->user->name }}</td>
                                            <td><img src="/storage/{{ $banding->image }}" width="100" alt=""></td>
                                            <td>
                                                {{ $banding->alasan_banding }}
                                            </td>
                                            <td id="form_active{{ $banding->id }}">
                                                <form onsubmit="form_des_banding(event)">
                                                    <input type="hidden" name="id_banding" id="id_banding" value="{{ $banding->id }}">
                                                    @csrf
                                                    <input type="hidden" value="{{ $banding->id }}">
                                                    <button type="submit" class="btn btn-danger rounded-pill text-white">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
            </div>
        </div>
    </div>
    <script>
        async function form_des_banding(e){
            e.preventDefault();
            const token = document.querySelector('[name=_token]').value;
            const banding_body = document.getElementById('banding_body');
            const id_banding = e.target.children[0].value;
            const single_banding = document.getElementById(`trbanding${id_banding}`);
            const fetching_data = await fetch(`http://127.0.0.1:8000/admin/table/bandings/${id_banding}`, {
                method: 'DELETE',
                headers:{
                   'X-CSRF-TOKEN':token,
                }
            })
            const result = await fetching_data.json();
            if (result) {
                banding_body.removeChild(single_banding);
            }
        }
    </script>
@endsection
