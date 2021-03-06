@extends('layouts.backend.app')

@section('title', 'Category')

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
                        All Categories
                        <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-round pull-right">
                            <i class="material-icons">add</i> Add New Category
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
                                  <th>Name</th>
                                  <th>Post Count</th>
                                  <th>Crated At</th>
                                  <th>Update At</th>
                                  <th class="text-center">Actions</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <th>No</th>
                                  <th>Name</th>
                                  <th>Post Count</th>
                                  <th>Crated At</th>
                                  <th>Update At</th>
                                  <th class="text-center">Actions</th>
                              </tr>
                          </tfoot>
                          <tbody>
                            @foreach($categories as $key=>$category)
                              <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <th>{{ $category->posts->count() }}</th>
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td class="text-center">
                                  <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i></a>
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
