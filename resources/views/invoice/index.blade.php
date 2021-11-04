    @extends('layouts.app')
    @section('css')
    <!-- DataTables CSS -->
    <link href="{{ asset('vendor/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('vendor/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">
    @endsection

    @section('content')
                <div class="col-lg-12">
                <h1 class="page-header">Invoice List</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="panel panel-default">
                <div class="panel-heading">
                DataTables Advanced Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Invoice No.</th>
                            <th>Created Date</th>
                            <th>Customer Name</th>
                            <th>Proforma Invoice</th>
                            <th>Schedule Price</th>
                            <th>Tax Invoice</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $count=1; ?>
                    @foreach($invoices as $invoice)
                    <tr >
                    <td>{{ $count++ }}</td>
                    <td>{{ $invoice->created_at }}</td>
                    <td>{{ $invoice->companyName }}</td>

                    <td><a href="{{route('invoice-pdf',$invoice->invoice_id)}}" title="Al-Amin Invoice"><i class="glyphicon glyphicon-print"></i></a>
                    </td>

                    <td><a href="{{route('schedule-pdf',$invoice->invoice_id)}}" title="Al-Amin Invoice"><i class="glyphicon glyphicon-print"></i></a>
                    </td>

                    <td><a href="{{route('recipient-pdf',$invoice->invoice_id)}}" title="Al-Amin Invoice"><i class="glyphicon glyphicon-print"></i></a>
                    <td>
                    <a href="{{route('edit-greenland-invoice',$invoice->invoice_id)}}" title="Edit"><i class="fa fa-edit"></i></a>
                    <form action="{{route('delete-greenland-invoice',$invoice->invoice_id)}}" method="post" class="pull-right">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="Javasrcrip:return window.confirm('Are you sure! You want to delete ')" class=" waves-light " style="border: none;" title="delete">
                    <i class="fa fa-trash-o text-danger"></i>
                    </button>
                    </form>
                    </td>
                </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
    @endsection

    @section('script')

    <!-- DataTables JavaScript -->
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script>
    $(document).ready(function() {
    $('#dataTables-example').DataTable({
    responsive: true
    });
    });
    </script>
    @endsection