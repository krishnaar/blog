@extends('layouts.backend.app')

@section('title', 'Comment')

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
                        All Comments
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
                                  <th class="text-center">Comments Info</th>
                                  <th class="text-center">Post Info</th>
                                  <th class="text-center">Actions</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <th class="text-center">Comments Info</th>
                                  <th class="text-center">Post Info</th>
                                  <th class="text-center">Actions</th>
                              </tr>
                          </tfoot>
                          <tbody>
                              @foreach($comments as $key=>$comment)
                              <tr>
                                <td>
                                  <div class="img-container">
                                    <img src="{{ Storage::disk('public')->url('profile/'.$comment->user->image) }}" alt="...">
                                  </div>
                                </td>
                                <td class="td-name">
                                  <a href="#jacket" target="_blank" href="{{ route('post.details', $comment->post->slug.'#comments') }}">{{ $comment->comment }}</a>
                                  <br />
                                  <small>by {{ $comment->user->name }} on {{ $comment->created_at->diffForHumans() }}</small>
                                </td>
                                <td>{{ $tag->name }}</td>
                                <th>{{ $tag->posts->count() }}</th>
                                <td>{{ $tag->created_at }}</td>
                                <td>{{ $tag->updated_at }}</td>
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
