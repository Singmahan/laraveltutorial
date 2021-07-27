@extends('user.master')
@section('title','Welcome Homepage')
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
                <h1 align="center">แสดงข้อมูลจากฐานข้อมูล</h1>
                <div>
                    <a href="{{ route('user.create')}}" class="btn btn-success btn-sm">เพิ่มข้อมูล</a>
                    <a href="{{ route('user.search')}}" class="btn btn-primary btn-sm">ค้นหาข้อมูล</a>
                </div><br>
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success')}}</p>
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                      <tr align="center">
                        <th>ID</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>แก้ไขข้อมูล</th>
                        <th>ลบข้อมูล</th>
                        <th>PDF</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $row)
                      <tr align="center">
                            <td>{{ $row['id']}}</td>
                            <td>{{ $row['fname']}}</td>
                            <td>{{ $row['lname']}}</td>
                            <td><a href="{{ action('UsersController@edit', $row['id']) }}" class="btn btn-success btn-sm">แก้ไขข้อมูล</a></td>

                            <td>
                                <form action="{{ action('UsersController@destroy', $row['id']) }}" method="POST" class="delete_form">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-sm">ลบข้อมูล</button>
                                </form>
                            </td>
                            <td><a href="{{ action('UsersController@downloadPDF', $row['id']) }}" class="btn btn-primary btn-sm">PDF</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{-- แบ่งหน้า --}}
                  {{ $users -> links()}}
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){ $('.delete_form').on('submit', function(){
            if(confirm("คุณต้องการลบข้อมูลหรือไม่ ?")){
                return true;
            }
            else{
                return false;
              }
            });
        });
    </script>
@endsection
