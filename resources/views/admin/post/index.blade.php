@extends('layouts.backend.app')

@section('title', 'Post')

@push('css')

<!-- JQuery DataTable Css -->


@endpush

@section('content')
<div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">
                        All Posts
                      <a href="{{ route('admin.post.create') }}" class="btn btn-primary btn-round pull-right">
                            <i class="material-icons">add</i> Add New Post
                        </a>
                    </h4>
              </div>
              <div class="card-body">
                  <div class="toolbar">
                      <!--        Here you can write extra buttons/actions for the toolbar              -->
                  </div>
                  <div class="material-datatables">
                      <table id="datatables" class="table table-striped table-no-bordered table-hover"
                          cellspacing="0" width="100%" style="width:100%">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Title</th>
                                  <th>Author</th>
                                  <th><i class="material-icons">visibility</i></th>
                                  <th>Is Approved</th>
                                  <th>status</th>
                                  <th>Crated At</th>
                                  <th>Update At</th>
                                  <th class="text-center">Actions</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <th>No</th>
                                  <th>Title</th>
                                  <th>Author</th>
                                  <th><i class="material-icons">visibility</i></th>
                                  <th>Is Approved</th>
                                  <th>status</th>
                                  <th>Crated At</th>
                                  <th>Update At</th>
                                  <th class="text-center">Actions</th>
                              </tr>
                          </tfoot>
                          <tbody>
                            @foreach($posts as $key=>$post)
                              <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ str_limit($post->title, '10') }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->view_count }}</td>
                                <td>
                                  @if($post->is_approved == true)
                                    <span class="badge badge-pill badge-success">Approved</span>
                                  @else
                                    <span class="badge badge-pill badge-warning">Pending</span>
                                  @endif
                                </td>
                                <td>
                                  @if($post->status == true)
                                    <span class="badge badge-pill badge-success">Published</span>
                                  @else
                                    <span class="badge badge-pill badge-warning">Pending</span>
                                  @endif
                                </td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
                                <td class="text-center">
                                  <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i></a>
                                  <a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>
                                    @csrf
                                    @method('DELETE')
                                  </form>
                                </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
              <!-- end content-->
          </div>
          <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
  </div>
  <!-- end row -->
</div>
@endsection

@push('js')
 <script>
        $(document).ready(function () {
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }
            });

            var table = $('#datatable').DataTable();

            // Edit record
            table.on('click', '.edit', function () {
                $tr = $(this).closest('tr');
                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function (e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function () {
                alert('You clicked on Like button');
            });
        });
    </script>
@endpush
