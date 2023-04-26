@extends('layouts.admin')

@section('content')

    <div>
        <a href="{{ route('post.create') }}">Create post</a>
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Posts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Posts</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Posts</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            Title
                        </th>
                        <th style="width: 30%">
                            Likes
                        </th>
                        <th>
                            Created by
                        </th>
                        <th style="width: 8%" class="text-center">
                            Status
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($posts) != 0)
                        @foreach($posts as $post)
                            <tr id="block_{{ $post->id }}">
                                <td>
                                    {{ $post->id }}
                                </td>
                                <td>
                                    <a>
                                        {{ $post->title }}
                                    </a>
                                    <br/>
                                    <small>
                                        Created {{ $post->created_at }}
                                    </small>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        {{ $post->likes }}
                                    </ul>
                                </td>
                                <td class="project_progress">

                                    <small>

                                    </small>
                                </td>
                                <td class="project-state">
                                    @if($post->is_published == 1)
                                        <span class="badge badge-success">published</span>
                                    @else
                                        <span class="badge badge-danger">no published</span>
                                    @endif
                                </td>
                                <td class="project-actions text-right" style="font-size: 12px;">
                                    <a class="btn btn-primary btn-sm" href="{{ route('post.show', $post->id) }}">
                                        📁 View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ route('post.edit', $post->id) }}">
                                        ✏ Edit
                                    </a>
                                    <form id="{{ $post->id }}" style="display: inline;">
                                        <input type="submit" class="btn btn-danger btn-sm" value="🗑️ Delete">
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    @else
                        <div>
                            <span>Нет постов</span>
                        </div>
                    @endif
                </table>
            </div>
            <br>
            <div style="margin-left: 15px;">
                {{ $posts->withQueryString()->links() }}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
<div class="message">

</div>
@endsection
@section('script')
    <script>
        $("form").on("submit", function(e){
            e.preventDefault();
            const id = $(this).attr('id');
            let url = '{{ route("post.destroy", ":id") }}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data){
                    $('#block_'+id).fadeOut();
                }
            });
        });
    </script>
@endsection
