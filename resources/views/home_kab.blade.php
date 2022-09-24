@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <table>
                        <tr><th>Selamat Datang</th><th>:</th><td>{{ $user->name }}</td></tr>
                    </table>
                </div>
               <div class="card-header">
                    <a class="btn btn-info" href="{{url('home')}}">KLIK DISINI DATA API LAMBANG LOGO PROVINSI</a>
                    &nbsp;&nbsp;
                    <a class="btn btn-info" href="{{url('home_kab')}}">KLIK DISINI DATA API LAMBANG LOGO KABUPATEN</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Logo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataApiLambangKabupaten->lambang as $item)
                                <tr>
                                    <td>{{$item->index}}</td>
                                    <td>{{$item->title}}</td>
                                    <td><img src="{{$item->url}}"></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
@endsection
