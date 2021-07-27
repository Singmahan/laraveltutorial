@extends('user.master')
@section('title','Welcome Search')
@section('content')
<style>
    .container{
        font-family: 'Sarabun', sans-serif;
    }
</style>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br><br>
                <h1 align="center">Search System Ajax</h1>
                <div align="right"><a href="{{ route('user.create')}}" class="btn btn-success btn-sm">เพิ่มข้อมูล</a></div><br>
                <div class="form-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="ค้นห้าข้อมูล"><br>
                    <h3 align="center">จำนวนข้อมูลที่มีทั้งหมด : <span id="total_records"></span> รายการ</h3>
                </div>
                <table class="table table-striped">
                    <thead>
                      <tr align="center">
                        <th>ID</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            fetch_data();
        });
        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_data(query);
            // console.log(query);
        });
            function fetch_data(query ='')
                {
                    $.ajax({
                    url:"{{ route('user.action')}}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }
    </script>
@endsection
