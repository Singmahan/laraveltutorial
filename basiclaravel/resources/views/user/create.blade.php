@extends('user.master')
@section('title','เพิ่มข้อมูลผู้ใช้งานระบบ')
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
                <h1 align="center">เพิ่มข้อมูลผู้ใช้งานระบบ</h1><br>

                {{-- check error  --}}
                {{-- กรณีที่ทำผิดพลาด --}}
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>@foreach ($errors -> all as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                    {{-- กรณีที่ทำสำเร็จ --}}
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success')}}</p>
                    </div>
                @endif

                <form action="{{url('user')}}" method="POST" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" name="fname" class="form-control" placeholder="ชื่อ">
                    </div>
                    <div class="form-group">
                        <input type="text" name="lname" class="form-control" placeholder="นามสกุล">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="บันทึก" class="btn btn-success btn-sm">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
