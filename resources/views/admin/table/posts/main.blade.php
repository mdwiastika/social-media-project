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
                                            <th scope="col">Content</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $key => $post)
                                        <tr>
                                            <th scope="row"> <a href="#" class="question_content"> {{ ($key+1) }}</a>
                                            </th>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->content }}</td>
                                            <td>
                                                {{ $post->content }}
                                            </td>
                                            <td id="form_active{{ $post->id }}">
                                                @if ($post->active == 'true')
                                                <form onsubmit="change_status(event)">
                                                    @csrf
                                                    <input type="hidden" value="{{ $post->id }}">
                                                    <button type="submit" class="btn btn-success rounded-pill text-white">Aktif</button>
                                                </form>
                                                @else
                                                <form onsubmit="change_status(event)">
                                                    @csrf
                                                    <input type="hidden" value="{{ $post->id }}">
                                                    <button type="submit" class="btn btn-danger rounded-pill text-white">Non Aktif</button>
                                                </form>
                                                @endif
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
        function change_status(e){
            e.preventDefault();
            e.target.children[2].style.cursor = 'wait';
            let _token = $('input[name="_token"]').val();
            let post = e.target.children[1].value;
            let url = `{{ route('change-post-status', ':mypost') }}`;
            url = url.replace(':mypost', post);
            console.log(url);
            $.ajax({
                url: url,
                type: "POST",
                data:{
                    _token:_token,
                    post:post,
                }, success: function (response) { 
                    $('#form_active'+response.post.id).load('/admin/table/posts ' +'#form_active'+response.post.id);
                    console.log('okee');
                 }, error: function (err) { 
                    console.log('error');
                    console.log(err);
                  }
            });
        }
    </script>
@endsection
