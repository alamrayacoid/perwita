@extends('main')

@section('title', 'dashboard')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-7">
        <h2>>Laporan Periode Arus Kas</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/') }}">Home</a>
            </li>
            <li>
                <a>Data Master</a>
            </li>
            <li class="active">
                <strong>>Laporan Periode Arus Kas</strong>
            </li>
        </ol>
    </div>
</div>




<div class="wrapper wrapper-content animated fadeInRight no-padding">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">                            
                    <h5>Laporan Periode Arus Kas 2017</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <h4>Operating Cash Flow</h4>
                    <table class="table table-bordered " id="ocf">
                        <thead>
                            <tr>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Periode / Jenis</th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Januari </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Februari </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Maret </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">April </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Mei </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Juni </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Juli </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Agustus </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">September </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Oktober </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">November </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Desember </th>
                            </tr>
                        </thead>
                        <tbody>                            
                            @foreach($ocf as $ocf)
                            <tr>                                
                                <td>{{ $ocf->tr_name}}</td>                                
                                <td class="text-right">{{ number_format($ocf->bln1,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($ocf->bln2,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($ocf->bln3,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($ocf->bln4,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($ocf->bln5,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($ocf->bln6,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($ocf->bln7,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($ocf->bln8,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($ocf->bln9,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($ocf->bln10,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($ocf->bln11,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($ocf->bln12,2,',','.') }}</td>
                            </tr>
                            @endforeach    
                                <th style="border-top: solid 2px #000000">Total</th>                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($ocf_total1,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($ocf_total2,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($ocf_total3,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($ocf_total4,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($ocf_total5,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($ocf_total6,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($ocf_total7,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($ocf_total8,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($ocf_total9,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($ocf_total10,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($ocf_total11,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($ocf_total12,2,',','.') }}</th>                                                                
                        </tbody>
                    </table>
                    
                    <h4>Financial Cash Flow</h4>
                    <table class="table table-bordered " id="fcf">
                        <thead>
                            <tr>
                                <td class="text-right" style="background-color:#000000; color: #ffffff;font-size:12px;">Periode / Jenis</th>
                                <td class="text-right" style="background-color:#000000; color: #ffffff;font-size:12px;">Januari </th>
                                <td class="text-right" style="background-color:#000000; color: #ffffff;font-size:12px;">Februari </th>
                                <td class="text-right" style="background-color:#000000; color: #ffffff;font-size:12px;">Maret </th>
                                <td class="text-right" style="background-color:#000000; color: #ffffff;font-size:12px;">April </th>
                                <td class="text-right" style="background-color:#000000; color: #ffffff;font-size:12px;">Mei </th>
                                <td class="text-right" style="background-color:#000000; color: #ffffff;font-size:12px;">Juni </th>
                                <td class="text-right" style="background-color:#000000; color: #ffffff;font-size:12px;">Juli </th>
                                <td class="text-right" style="background-color:#000000; color: #ffffff;font-size:12px;">Agustus </th>
                                <td class="text-right" style="background-color:#000000; color: #ffffff;font-size:12px;">September </th>
                                <td class="text-right" style="background-color:#000000; color: #ffffff;font-size:12px;">Oktober </th>
                                <td class="text-right" style="background-color:#000000; color: #ffffff;font-size:12px;">November </th>
                                <td class="text-right" style="background-color:#000000; color: #ffffff;font-size:12px;">Desember </th>
                            </tr>
                        </thead>
                        <tbody>                            
                            @foreach($fcf as $fcf)
                            <tr>                                
                                <td class="text-right">{{ $ocf->tr_name}}</td>                                
                                <td class="text-right">{{ number_format($fcf->bln1,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($fcf->bln2,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($fcf->bln3,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($fcf->bln4,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($fcf->bln5,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($fcf->bln6,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($fcf->bln7,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($fcf->bln8,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($fcf->bln9,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($fcf->bln10,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($fcf->bln11,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($fcf->bln12,2,',','.') }}</td>
                            </tr>
                            @endforeach                            
                                <th style="border-top: solid 2px #000000">Total</th>                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($fcf_total1,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($fcf_total2,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($fcf_total3,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($fcf_total4,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($fcf_total5,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($fcf_total6,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($fcf_total7,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($fcf_total8,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($fcf_total9,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($fcf_total10,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($fcf_total11,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($fcf_total12,2,',','.') }}</th>                                                                
                        </tbody>
                    </table>
                    
                    <h4>Investing Cash Flow</h4>
                    <table class="table table-bordered " id="icf">
                        <thead>
                            <tr>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Periode / Jenis</th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Januari </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Februari </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Maret </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">April </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Mei </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Juni </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Juli </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Agustus </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">September </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Oktober </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">November </th>
                                <th style="background-color:#000000; color: #ffffff;font-size:12px;">Desember </th>
                            </tr>
                        </thead>
                        <tbody>                            
                            @foreach($icf as $icf)
                            <tr>                                
                                <td>{{ $ocf->tr_name}}</td>                                
                                <td class="text-right">{{ number_format($icf->bln1,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($icf->bln2,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($icf->bln3,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($icf->bln4,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($icf->bln5,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($icf->bln6,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($icf->bln7,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($icf->bln8,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($icf->bln9,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($icf->bln10,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($icf->bln11,2,',','.') }}</td>
                                <td class="text-right">{{ number_format($icf->bln12,2,',','.') }}</td>
                            </tr>
                            @endforeach                            
                                <th style="border-top: solid 2px #000000">Total</th>                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($icf_total1,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($icf_total2,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($icf_total3,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($icf_total4,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($icf_total5,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($icf_total6,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($icf_total7,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($icf_total8,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($icf_total9,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($icf_total10,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($icf_total11,2,',','.') }}</th>                                                                
                                <th style="border-top: solid 2px #000000" class="text-right">{{ number_format($icf_total12,2,',','.') }}</th>                                                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="padding-bottom: 30px"></div>

@endsection


@section('extra_scripts')
<script type="text/javascript">
//    $('#ocf').dataTable({
//        responsive: true,
//        "language": dataTableLanguage,
//    });
//
//    $('#fcf').dataTable({
//        responsive: true,
//        "language": dataTableLanguage,
//    });
//    $('#icf').dataTable({
//        responsive: true,
//        "language": dataTableLanguage,
//    });
</script>
@endsection


