@extends('frontend.app3')
@push('css')
    
@endpush
@section('content')
<div class="row">
    <div class="col-md-8">
        <!-- /.box-header -->
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                <img src="https://sipjaki.banjarmasinkota.go.id/assets/img/slide/WhatsApp_Image_2020-11-30_at_13_43_37.jpeg" alt="First slide" style="max-height:400px; min-height:400px; width:900px">

                <div class="carousel-caption">
                    First Slide
                </div>
                </div>
                <div class="item">
                <img src="https://sipjaki.banjarmasinkota.go.id/assets/img/slide/download1.jpg" alt="Second slide" style="max-height:400px; min-height:400px; width:900px">

                <div class="carousel-caption">
                    Second Slide
                </div>
                </div>
                <div class="item">
                <img src="https://sipjaki.banjarmasinkota.go.id/assets/img/slide/kota-banjarmasin.jpg" alt="Third slide" style="max-height:400px; min-height:400px; width:900px">

                <div class="carousel-caption">
                    Third Slide
                </div>
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="fa fa-angle-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="fa fa-angle-right"></span>
            </a>
            </div>
            
        <!-- /.box-body -->
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4">
            <div class="alert alert-danger alert-dismissible">
                <h4><i class="icon fa fa-info"></i> PENGUMUMAN</h4>
                <ul>
                    @foreach ($pengumuman as $item)
                        <li>{{$item->isi}}</li>
                    @endforeach
                    
                </ul>
        </div>
        <!-- /.box-body -->
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<br/>
<h3><strong>BERITA TERKINI</strong></h3>
<div class="row">
    @foreach ($data1 as $item)
        
    <div class="col-md-4">
        <div class="box box-widget widget-user">

            <div class="box-header with-border">
                <div class="user-block">
                  <img class="img-circle" src="/assets/dist/img/user1-128x128.jpg" alt="User Image">
                  <span class="username"><a href="#" style="color: rgb(125, 123, 123)">Di Posting Oleh Admin</a></span>
                  <span class="description">{{\Carbon\Carbon::parse($item->created_at)->format('d M Y H:i:s')}}
                  </span>
                </div>
                
            </div>
            <!-- Add the bg color to the header using any of the bg-* classes -->
            @if ($item->gambar == null)
            <div class="widget-user-header bg-black" style="background: url('https://system.mas-kargo.co.id/upload/foto_penerima/no.jpg') center center; height:200px; background-size:100% 100%;">
            @else
            <div class="widget-user-header bg-black" style="background: url('/storage/gambar/{{$item->gambar}}') center center; height:200px; background-size:100% 100%;">
            @endif
            </div>
            
            <div class="box-body">
                <div class="row">
                  <div class="col-sm-12">
                      <span class="text-secondary text-bold" style="font-size: 18px;font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif"><a href="/berita/{{$item->id}}/{{$item->slug}}" class="text-muted">{{$item->judul}}</a></span><br/> 
                      <span>
                        
                      </span>
                  </div>
                  <!-- /.col -->
                </div>
            <!-- /.row -->
            </div>
            
        </div>
    </div>
    @endforeach
    
</div>
<div class="row">
    
    @foreach ($data2 as $item)
        
    <div class="col-md-4">
        <div class="box box-widget widget-user">
            
            <div class="box-header with-border">
                <div class="user-block">
                  <img class="img-circle" src="/assets/dist/img/user1-128x128.jpg" alt="User Image">
                  <span class="username"><a href="#" style="color: rgb(125, 123, 123)">Di Posting Oleh Admin</a></span>
                  <span class="description">{{\Carbon\Carbon::parse($item->created_at)->format('d M Y H:i:s')}}</span>
                </div>
                
            </div>

            @if ($item->gambar == null)
            <div class="widget-user-header bg-black" style="background: url('https://system.mas-kargo.co.id/upload/foto_penerima/no.jpg') center center; height:200px; background-size:100% 100%;">
            @else
            <div class="widget-user-header bg-black" style="background: url('/storage/gambar/{{$item->gambar}}') center center; height:200px; background-size:100% 100%;">
            @endif
            </div>
            
            
            <div class="box-body">
                <div class="row">
                  <div class="col-sm-12">
                      <span class="text-secondary text-bold" style="font-size: 18px;font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif"><a href="/berita/{{$item->id}}/{{$item->slug}}" class="text-muted">{{$item->judul}}</a></span><br/>
                      <span>

                      </span>
                  </div>
                  <!-- /.col -->
                </div>
            <!-- /.row -->
            </div>
        </div>
    </div>
    @endforeach
    
</div>

<h3><strong>AGENDA</strong></h3>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-warning">
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Hari, Tanggal</th>
                <th>Waktu</th>
                <th>Tempat</th>
                <th>Acara</th>
                <th>Penanggung Jawab</th>
                <th>Keterangan</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($agenda as $key => $item)
                <tr>
                    <td class="text-center">{{1 + $key}}</td>
                    <td>{{\Carbon\Carbon::parse($item->tanggal)->translatedFormat('l')}}, {{\Carbon\Carbon::parse($item->tanggal)->format('d M Y')}}</td>
                    <td>{{$item->waktu}} WITA</td>
                    <td>{{$item->tempat}} </td>
                    <td>{{$item->acara}} </td>
                    <td>{{$item->pj_agenda}} </td>
                    <td>{{$item->keterangan}} </td>
                    
                </tr>
                @endforeach
            </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    
@endpush