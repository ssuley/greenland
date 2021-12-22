@extends('layouts.app')

@section('content')

        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
    <div class="panel panel-info">
    <div class="panel-heading ">
        <div class="panel-title " ><i>user Information</i></div>
    </div>
    <div class="panel-body ">
      <div class="table-responsive">          
<table id="website_staff" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

             @foreach($accounts as $account)
                <tr>
                    
                  <td>
                    {{ $account->first_name }}
                  </td>
                  <td>
                    {{ $account->last_name }}
                  </td>
                  <td>
                    {{ $account->staff_gender }}
                  </td>
                <td>
                    {{ $account->email }}
                  </td>
                  <td>
                    {{ $account->phone }}
                  </td>
                  <td>
                    {{ $account->name }}
                  </td>
                  <td>
                   <a href="{{ route('edit-account',$account->account_id) }}" title="Edit User"><i class="fa fa-edit"></i></a>
                        {{-- <form action="" method="post" class="pull-right">
                        @csrf
                        @method('delete')
                        <a type="submit" onclick="Javasrcrip:return window.confirm('Are you sure! You want to delete ')" class=" waves-light " title="delete">
                        <i class="fa fa-trash-o text-danger"></i>
                        </a>
                        </form> --}}
                  </td>
                  @endforeach
                </tr>


            </tbody>
            <div class="cleafix"></div>
            <tfoot>
              <tr>

              </tr>
            </tfoot>
          </table>
</div>
</div>
</div>
                </div>
            </div>
        </div>
   
@endsection
