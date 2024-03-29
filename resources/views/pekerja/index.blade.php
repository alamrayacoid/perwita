@extends('main')

@section('title', 'Data Pekerja')

@section('extra_styles')

    <style>
        .popover-navigation [data-role="next"] {
            display: none;
        }

        .popover-navigation [data-role="end"] {
            display: none;
        }

        table.dataTable tbody td {
            vertical-align: middle;
        }

        table.dataTables_filter label input.form-control{
            text-transform: uppercase;
        }
    </style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Data Pekerja</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/') }}">Home</a>
            </li>
            <li>
                Manajemen Pekerja
            </li>
            <li class="active">
                <strong>Data Pekerja</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox-title">
        <h5>Data Pekerja</h5>
        <button style="float: right; margin-top: -7px;" class="btn btn-outline btn-primary btn-flat btn-sm" type="button"
                aria-hidden="true" onclick="tambah()"><i class="fa fa-plus"></i>&nbsp;Tambah
        </button>
    </div>
    <div class="ibox">
        <div class="ibox-content">
            <div class="row m-b-lg">
                <div class="col-md-12">
                    @if(Session::has('sukses'))
                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <strong>{{ Session::get('sukses') }}</strong>
                        </div>
                    @elseif(Session::has('gagal'))
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <strong>{{ Session::get('gagal') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="col-md-12" style="margin: 10px 0px 20px 0px;">
                </div>
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1"> Pekerja Aktif</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2"> Calon Pekerja</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-3"> Pekerja non-Aktif</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                <table id="pekerja" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 22%;">Nama</th>
                                        <th style="width: 15%;">NIK</th>
                                        <th style="width: 5%;">Jk</th>
                                        <th style="width: 15%;">No Telp.</th>
                                        <th style="width: 25%;">Alamat</th>
                                        <th style="width: 5%;">Status</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <table id="calon-pekerja" class="table table-bordered table-striped"
                                       style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th style="width: 22%;">Nama</th>
                                        <th style="width: 5%;">Jk</th>
                                        <th style="width: 15%;">No Telp.</th>
                                        <th style="width: 25%;">Alamat</th>
                                        <th style="width: 5%;">Status</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane">
                            <div class="panel-body">
                                <table id="pekerja-non" class="table table-bordered table-striped"
                                       style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th style="width: 22%;">Nama</th>
                                        <th style="width: 15%;">NIK</th>
                                        <th style="width: 5%;">Jk</th>
                                        <th style="width: 15%;">No Telp.</th>
                                        <th style="width: 25%;">Alamat</th>
                                        <th style="width: 5%;">Status</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <p><strong>NB:</strong> Pencarian data gunakan huruf kapital</p>
                </div>

                <div class="modal inmodal" id="modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content animated fadeIn">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                            class="sr-only">Close</span></button>
                                <i class="fa fa-user modal-icon"></i>
                                <h4 class="modal-title">Detail Pekerja</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row col-md-12">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Nama Pekerja </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="p_name"></h3>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Nama Ibu </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="p_momname">: -</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>No NIK </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="p_nik">: -</h3>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>No NIK Mitra </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="p_nik_mitra">: -</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>No KPJ </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="p_kpj_no">: -</h3>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Jenis Kelamin </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="p_sex">: -</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Nama Mitra </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="m_name">: -</h3>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Tempat Lahir </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="p_birthplace">: -</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Nama Divisi </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="md_name">: -</h3>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Tanggal Lahir </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="p_birthdate">: -</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Tanggal Seleksi </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="mp_selection_date">: -</h3>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Alamat </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="p_address">: -</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Tanggal Masuk Kerja </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="mp_workin_date">: -</h3>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>No Hp </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="p_hp">: -</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Tanggal Awal Kontrak </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="mc_date">: -</h3>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>No KTP </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="p_ktp">: -</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Tanggal Kontrak Berakhir </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="mc_expired">: -</h3>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Tanggal Berlaku KTP </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="b_ktp">: -</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Sisa Waktu Kontrak </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="sisa_kontrak">: -</h3>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Pendidikan </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h3 style="font-weight:normal;" id="p_education">: -</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <h3>&nbsp</h3>
                                </div>
                                <div class="row col-md-12">
                                    <h3 style="font-style: italic; color: blue">Daftar Foto</h3>
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>KTP </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6 text-center">
                                            <button type="button" class="btn btn-info btn-sm" id="btnKtp">
                                                <i class="fa fa-eye">&nbsp;</i>
                                                Lihat
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" id="btnKtpP">
                                                <i class="fa fa-print">&nbsp;</i>
                                                Cetak
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Ijazah </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6 text-center">
                                            <button type="button" class="btn btn-info btn-sm" id="btnIjazah">
                                                <i class="fa fa-eye">&nbsp;</i>
                                                Lihat
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" id="btnIjazahP">
                                                <i class="fa fa-print">&nbsp;</i>
                                                Cetak
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>SKCK </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6 text-center">
                                            <button type="button" class="btn btn-info btn-sm" id="btnSkck">
                                                <i class="fa fa-eye">&nbsp;</i>
                                                Lihat
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" id="btnSkckP">
                                                <i class="fa fa-print">&nbsp;</i>
                                                Cetak
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Medical </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6 text-center">
                                            <button type="button" class="btn btn-info btn-sm" id="btnMedical">
                                                <i class="fa fa-eye">&nbsp;</i>
                                                Lihat
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" id="btnMedicalP">
                                                <i class="fa fa-print">&nbsp;</i>
                                                Cetak
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>KK </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6 text-center">
                                            <button type="button" class="btn btn-info btn-sm" id="btnKk">
                                                <i class="fa fa-eye">&nbsp;</i>
                                                Lihat
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" id="btnKkP">
                                                <i class="fa fa-print">&nbsp;</i>
                                                Cetak
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Rekening Dapan </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6 text-center">
                                            <button type="button" class="btn btn-info btn-sm" id="btnRekening">
                                                <i class="fa fa-eye">&nbsp;</i>
                                                Lihat
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" id="btnRekeningP">
                                                <i class="fa fa-print">&nbsp;</i>
                                                Cetak
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>BPJS </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6 text-center">
                                            <button type="button" class="btn btn-info btn-sm" id="btnBpjs">
                                                <i class="fa fa-eye">&nbsp;</i>
                                                Lihat
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" id="btnBpjsP">
                                                <i class="fa fa-print">&nbsp;</i>
                                                Cetak
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>RBH </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6 text-center">
                                            <button type="button" class="btn btn-info btn-sm" id="btnRbh">
                                                <i class="fa fa-eye">&nbsp;</i>
                                                Lihat
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" id="btnRbhP">
                                                <i class="fa fa-print">&nbsp;</i>
                                                Cetak
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>Rekening Payroll </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6 text-center">
                                            <button type="button" class="btn btn-info btn-sm" id="btnRekPayroll">
                                                <i class="fa fa-eye">&nbsp;</i>
                                                Lihat
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" id="btnRekPayrollP">
                                                <i class="fa fa-print">&nbsp;</i>
                                                Cetak
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>PKWT </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6 text-center">
                                            <button type="button" class="btn btn-info btn-sm" id="btnPkwt">
                                                <i class="fa fa-eye">&nbsp;</i>
                                                Lihat
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" id="btnPkwtP">
                                                <i class="fa fa-print">&nbsp;</i>
                                                Cetak
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <div class="col-sm-6 col-md-6">
                                            <h3>SK </h3>
                                        </div>
                                        <div class="col-sm-6 col-md-6 text-center">
                                            <button type="button" class="btn btn-info btn-sm" id="btnSk">
                                                <i class="fa fa-eye">&nbsp;</i>
                                                Lihat
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" id="btnSkP">
                                                <i class="fa fa-print">&nbsp;</i>
                                                Cetak
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <h3>&nbsp</h3>
                                </div>
                                <div class="row col-md-12">
                                    <h3 style="font-style: italic; color: blue">History Pekerja</h3>
                                </div>
                                <form class="form-horizontal">
                                    <table id="tabel_detail"
                                           class="table table-bordered table-striped tabel_detail">

                                    </table>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-white btn-md" data-dismiss="modal">Close</a>
                                </div>
                                <button type="button" id="printbtn" class="btn btn-primary" onclick="print()" name="button"><i class="fa fa-print">&nbsp;</i>Print</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content animated fadeIn">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <i class="fa fa-sign-out modal-icon"></i>
                  <h4 class="modal-title">Resign</h4>
                  <small class="font-bold">Pekerja mengajukan untuk resign</small>
              </div>
              <div class="modal-body">
                  <h3 class="namabarang"></h3>
                  <form class="form-horizontal">
                      <div class="form-dinamis">
                          <div class="form-group getkonten0">
                              <label class="col-sm-2 control-label" for="keteranganresign">Keterangan</label>
                              <div class="col-sm-10 selectukuran0">
                                  <input type="text" name="keterangan" id="keteranganresign" class="form-control" placeholder="Keterangan Resign" title="Keterangan Resign">
                              </div>
                          </div>
                          <div class="form-group getkonten1">
                              <label class="col-sm-2 control-label" for="tgl-resign">Tanggal</label>
                              <div class="col-sm-5">
                                  <input type="text" name="tanggal" id="tgl-resign" class="form-control" style="text-align: center;">
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                  <button onclick="simpanresign()" id="simpanbtn" class="btn btn-primary" type="button">Simpan</button>
              </div>
          </div>
      </div>
  </div>


@endsection

@section('extra_scripts')
    <script type="text/javascript">
        var table;
        var tablenon;
        var tablecalon;

        $('#tgl-resign').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        }).datepicker("setDate", "0");

        $(document).ready(function () {
            setTimeout(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                table = $("#pekerja").DataTable({
                    "search": {
                        "caseInsensitive": true
                    },
                    processing: true,
                    serverSide: true,
                    "ajax": {
                        "url": "{{ url('manajemen-pekerja/data-pekerja/table') }}",
                        "type": "post"
                    },
                    columns: [
                        {data: 'p_name', name: 'p_name'},
                        {data: 'p_nip', name: 'p_nip'},
                        {data: 'p_sex', name: 'p_sex'},
                        {data: 'p_hp', name: 'p_hp'},
                        {data: 'p_address', name: 'p_address'},
                        {data: 'pm_status', name: 'pm_status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ],
                    responsive: true,
                    "pageLength": 10,
                    "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
                    //"scrollY": '50vh',
                    //"scrollCollapse": true,
                    "language": dataTableLanguage,
                });
                $('#pekerja').css('width', '100%').dataTable().fnAdjustColumnSizing();
            }, 1500);

            setTimeout(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                tablenon = $("#pekerja-non").DataTable({
                    "search": {
                        "caseInsensitive": true
                    },
                    processing: true,
                    serverSide: true,
                    "ajax": {
                        "url": "{{ url('manajemen-pekerja/data-pekerja/tablenon') }}",
                        "type": "POST"
                    },
                    columns: [
                    {data: 'p_name', name: 'p_name'},
                    {data: 'p_nip', name: 'p_nip'},
                    {data: 'p_sex', name: 'p_sex'},
                    {data: 'p_hp', name: 'p_hp'},
                    {data: 'p_address', name: 'p_address'},
                    {data: 'pm_status', name: 'pm_status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                    ],
                    responsive: true,
                    "pageLength": 10,
                    "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
                    //"scrollY": '50vh',
                    //"scrollCollapse": true,
                    "language": dataTableLanguage,
                });
                $('#pekerja-non').css('width', '100%').dataTable().fnAdjustColumnSizing();
            }, 3500);

            setTimeout(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                tablecalon = $("#calon-pekerja").DataTable({
                    "search": {
                        "caseInsensitive": true
                    },
                    processing: true,
                    serverSide: true,
                    "ajax": {
                        "url": "{{ url('manajemen-pekerja/data-pekerja/tablecalon') }}",
                        "type": "POST"
                    },
                    columns: [
                    {data: 'p_name', name: 'p_name'},
                    {data: 'p_sex', name: 'p_sex'},
                    {data: 'p_hp', name: 'p_hp'},
                    {data: 'p_address', name: 'p_address'},
                    {data: 'pm_status', name: 'pm_status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                    ],
                    responsive: true,
                    "pageLength": 10,
                    "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
                    //"scrollY": '50vh',
                    //"scrollCollapse": true,
                    "language": dataTableLanguage,
                });
                $('#calon-pekerja').css('width', '100%').dataTable().fnAdjustColumnSizing();
            }, 2500);
        });

        function openImage(urlImage) {
            if (urlImage == '' || urlImage == null) {
                alert('Foto belum diupload !');
                return false;
            }
            let newUrl = baseUrl + '/' + urlImage;
            window.open(newUrl, '_blank');
        }
        function printImage(id, type) {
            window.open('{{ url("/manajemen-pekerja/data-pekerja/print-foto") }}' + '/' + id + '/' + type, 'Cetak Foto');
        }


      function tambah() {
          window.location.href = baseUrl + '/manajemen-pekerja/data-pekerja/tambah';
      }


      function hapus(id) {
          swal({
                  title: "Konfirmasi",
                  text: "Apakah anda yakin ingin menghapus data Pegawai?",
                  type: "warning",
                  showCancelButton: true,
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true,
              },
              function () {
                  swal.close();
                  waitingDialog.show();
                  setTimeout(function () {
                      $.ajax({
                          url: baseUrl + '/manajemen-pekerja/data-pekerja/hapus/' + id,
                          type: 'get',
                          timeout: 10000,
                          success: function (response) {
                              waitingDialog.hide();
                              if (response.status == 'berhasil') {
                                  swal({
                                      title: "Data Dihapus",
                                      text: "Data berhasil dihapus",
                                      type: "success",
                                      showConfirmButton: false,
                                      timer: 900
                                  });
                                  table.draw();
                                  tablenon.draw();
                                  tablecalon.draw();
                              }
                          }, error: function (x, e) {
                              waitingDialog.hide();
                              var message;
                              if (x.status == 0) {
                                  message = 'ups !! gagal menghubungi server, harap cek kembali koneksi internet anda';
                              } else if (x.status == 404) {
                                  message = 'ups !! Halaman yang diminta tidak dapat ditampilkan.';
                              } else if (x.status == 500) {
                                  message = 'ups !! Server sedang mengalami gangguan. harap coba lagi nanti';
                              } else if (e == 'parsererror') {
                                  message = 'Error.\nParsing JSON Request failed.';
                              } else if (e == 'timeout') {
                                  message = 'Request Time out. Harap coba lagi nanti';
                              } else {
                                  message = 'Unknow Error.\n' + x.responseText;
                              }
                              waitingDialog.hide();
                              throwLoadError(message);
                              //formReset("store");
                          }
                      })
                  }, 2000);

              });


      }

      function detail(id) {
          var id = id;
          $('#printbtn').attr('onclick','print('+id+')')
          $.ajax({
              data: {id: id},
              type: "GET",
              url: baseUrl + "/manajemen-pekerja/data-pekerja/detail",
              dataType: 'json',
              success: function (data) {

                  var p_nik, p_nip, p_nip_mitra, p_name, p_sex, p_birthplace, p_birthdate, p_address, p_hp;
                  var p_ktp, b_ktp, p_education, p_momname, p_kpj_no, m_name, md_name, mp_selection_date;
                  var mp_workin_date, mc_date, mc_expired, sisa_kontrak;

                  $.each(data, function (i, n) {

                      p_nip = n.p_nip;
                      p_nip_mitra = n.p_nip_mitra;
                      p_nik = n.p_nik;
                      p_name = n.p_name;
                      p_sex = n.p_sex;
                      p_birthplace = n.p_birthplace;
                      p_birthdate = n.p_birthdate;
                      p_address = n.p_address;
                      p_hp = n.p_hp;
                      p_ktp = n.p_ktp;

                      if (n.p_ktp_seumurhidup == "Y") {
                          b_ktp = "Seumur Hidup";
                      } else {
                          b_ktp = n.p_ktp_expired;
                      }

                      p_education = n.p_education;
                      p_momname = n.p_momname;
                      p_kpj_no = n.p_kpj_no;
                      m_name = n.m_name;
                      md_name = n.md_name;
                      mp_selection_date = n.mp_selection_date;
                      mp_workin_date = n.mp_workin_date;
                      mc_date = n.mc_date;
                      mc_expired = n.mc_expired;
                      sisa_kontrak = n.sisa_kontrak;

                  });

                  if (typeof sisa_kontrak == 'undefined' || sisa_kontrak == undefined || sisa_kontrak == '' || sisa_kontrak == null) {
                      sisa_kontrak = "-";
                  }
                  if (p_nip == undefined) {
                      p_nip = "-";
                  }
                  if (p_nip_mitra == undefined) {
                      p_nip_mitra = "-";
                  }
                  if (p_nik == undefined) {
                      p_nik = "-";
                  }
                  if (p_name == undefined) {
                      p_name = "-";
                  }
                  if (p_sex == undefined) {
                      p_sex = "-";
                  }
                  if (p_birthplace == undefined) {
                      p_birthplace = "-";
                  }
                  if (p_birthdate == undefined) {
                      p_birthdate = "-";
                  }
                  if (p_address == undefined) {
                      p_address = "-";
                  }
                  if (p_hp == undefined) {
                      p_hp = "-";
                  }
                  if (p_ktp == undefined) {
                      p_ktp = "-";
                  }
                  if (b_ktp == undefined) {
                      b_ktp = "-";
                  }
                  if (p_education == undefined) {
                      p_education = "-";
                  }
                  if (p_momname == undefined) {
                      p_momname = "-";
                  }
                  if (p_kpj_no == undefined) {
                      p_kpj_no = "-";
                  }
                  if (m_name == undefined) {
                      m_name = "-";
                  }
                  if (md_name == undefined) {
                      md_name = "-";
                  }
                  if (mp_selection_date == undefined) {
                      mp_selection_date = "-";
                  }
                  if (mp_workin_date == undefined) {
                      mp_workin_date = "-";
                  }
                  if (mc_date == undefined) {
                      mc_date = "-";
                  }
                  if (mc_expired == undefined) {
                      mc_expired = "-";
                  }
                  if (mc_date == "-" || mc_expired == "-") {
                      sisa_kontrak = "-";
                  }

                  $('#p_nik_mitra').html(p_nip_mitra);
                  $('#p_nik').html(p_nip);
                  $('#p_name').html(p_name);
                  $('#p_sex').html(p_sex);
                  $('#p_birthplace').html(p_birthplace);
                  $('#p_birthdate').html(p_birthdate);
                  $('#p_address').html(p_address);
                  $('#p_hp').html(p_hp);
                  $('#p_ktp').html(p_ktp);
                  $('#b_ktp').html(b_ktp);
                  $('#p_education').html(p_education);
                  $('#p_momname').html(p_momname);
                  $('#p_kpj_no').html(p_kpj_no);
                  $('#m_name').html(m_name);
                  $('#md_name').html(md_name);
                  $('#mp_selection_date').html(mp_selection_date);
                  $('#mp_workin_date').html(mp_workin_date);
                  $('#mc_date').html(mc_date);
                  $('#mc_expired').html(mc_expired);
                  $('#sisa_kontrak').html(sisa_kontrak);

                  $('#btnKtp').off();
                  $('#btnKtpP').off();
                  $('#btnIjazah').off();
                  $('#btnIjazahP').off();
                  $('#btnSkck').off();
                  $('#btnSkckP').off();
                  $('#btnMedical').off();
                  $('#btnMedicalP').off();
                  $('#btnKk').off();
                  $('#btnKkP').off();
                  $('#btnRekening').off();
                  $('#btnRekeningP').off();
                  $('#btnBpjs').off();
                  $('#btnBpjsP').off();
                  $('#btnRbh').off();
                  $('#btnRbhP').off();
                  $('#btnRekPayroll').off();
                  $('#btnRekPayrollP').off();
                  $('#btnPkwt').off();
                  $('#btnPkwtP').off();
                  $('#btnSk').off();
                  $('#btnSkP').off();

                  // open image in new tab
                  $('#btnKtp').on('click', function() {
                      openImage(data[0].p_img_ktp);
                  });
                  $('#btnKtpP').on('click', function() {
                      printImage(id, 'ktp');
                  });
                  $('#btnIjazah').on('click', function() {
                      openImage(data[0].p_img_ijazah)
                  });
                  $('#btnIjazahP').on('click', function() {
                      printImage(id, 'ijazah');
                  });
                  $('#btnSkck').on('click', function() {
                      openImage(data[0].p_img_skck);
                  });
                  $('#btnSkckP').on('click', function() {
                      printImage(id, 'skck');
                  });
                  $('#btnMedical').on('click', function() {
                      openImage(data[0].p_img_medical);
                  });
                  $('#btnMedicalP').on('click', function() {
                      printImage(id, 'medical');
                  });
                  $('#btnKk').on('click', function() {
                      openImage(data[0].p_img_kk);
                  });
                  $('#btnKkP').on('click', function() {
                      printImage(id, 'kk');
                  });
                  $('#btnRekening').on('click', function() {
                      openImage(data[0].p_img_rekening);
                  });
                  $('#btnRekeningP').on('click', function() {
                      printImage(id, 'rekening');
                  });
                  $('#btnBpjs').on('click', function() {
                      openImage(data[0].p_img_bpjs);
                  });
                  $('#btnBpjsP').on('click', function() {
                      printImage(id, 'bpjs');
                  });
                  $('#btnRbh').on('click', function() {
                      openImage(data[0].p_img_rbh);
                  });
                  $('#btnRbhP').on('click', function() {
                      printImage(id, 'rbh');
                  });
                  $('#btnRekPayroll').on('click', function() {
                      openImage(data[0].p_img_rekpayroll);
                  });
                  $('#btnRekPayrollP').on('click', function() {
                      printImage(id, 'rekpayroll');
                  });
                  $('#btnPkwt').on('click', function() {
                      openImage(data[0].p_img_pkwt);
                  });
                  $('#btnPkwtP').on('click', function() {
                      printImage(id, 'pkwt');
                  });
                  $('#btnSk').on('click', function() {
                      openImage(data[0].p_img_sk);
                  });
                  $('#btnSkP').on('click', function() {
                      printImage(id, 'sk');
                  });


              }
          })

          $.ajax({
              data: {id: id},
              type: "GET",
              url: baseUrl + "/manajemen-pekerja/data-pekerja/detail-mutasi",
              dataType: 'json',
              success: function (data) {
                  var pekerja_mutasi = '<thead>'
                      + '<tr>'
                      + '<th style="text-align : center;"> TANGGAL </th>'
                      + '<th style="text-align : center;"> MITRA</th>'
                      + '<th style="text-align : center;"> DIVISI</th>'
                      + '<th style="text-align : center;"> KET</th>'
                      + '<th style="text-align : center;"> NO REFF</th>'
                      + '<th style="text-align : center;"> STATUS</th>'
                      + '</tr>'
                      + '</thead>'
                      + '<tbody>';

                  $.each(data, function (i, n) {

                    if (n.pm_reff == null) {
                      var pm_reff = '-';
                    } else {
                      pm_reff = n.pm_reff;
                    }

                    if (n.pm_note == null) {
                      var pm_note = '-';
                    } else {
                      pm_note = n.pm_note;
                    }

                    if (n.pm_detail == 'Resign') {
                      pekerja_mutasi = pekerja_mutasi + '<tr>'
                          + '<td>' + n.pm_date + '</td>'
                          + '<td>' + n.m_name + '</td>'
                          + '<td>' + n.md_name + '</td>'
                          + '<td>' + n.pm_note + '</td>'
                          + '<td>' + pm_reff + '</td>'
                          + '<td>' + pm_note + '</td>'
                          + '</tr>';
                    } else {
                      pekerja_mutasi = pekerja_mutasi + '<tr>'
                          + '<td>' + n.pm_date + '</td>'
                          + '<td>' + n.m_name + '</td>'
                          + '<td>' + n.md_name + '</td>'
                          + '<td>' + n.pm_detail + '</td>'
                          + '<td>' + pm_reff + '</td>'
                          + '<td>' + pm_note + '</td>'
                          + '</tr>';
                    }
                  });
                  pekerja_mutasi = pekerja_mutasi + '</tbody';
                  $('#tabel_detail').html(pekerja_mutasi);
              }

          })

          $("#modal-detail").modal("show");
      }

      function resign(id){
          $('#myModal').modal('show');
          $('#simpanbtn').attr('onclick', 'simpanresign('+id+')');
      }

      function simpanresign(id){
        var keterangan = $('#keteranganresign').val();
        var tanggal = $('#tgl-resign').val();
        $.ajax({
          type: 'get',
          data: {id:id, keterangan:keterangan, tanggal: tanggal},
          dataType: 'json',
          url: baseUrl + '/manajemen-pekerja/data-pekerja/resign',
          success : function(result){
            if (result.status == 'berhasil') {
              swal({
                  title: "Berhasil Disimpan",
                  text: "Data berhasil Disimpan",
                  type: "success",
                  showConfirmButton: false,
                  timer: 900
              });
              $('#myModal').modal('hide');
            } else {
                swal({
                  title: "Gagal",
                  text: "Data gagal disimpan",
                  type: "danger",
                  showConfirmButton: false,
                  timer: 900
              });
              $('#myModal').modal('hide');
            }
            location.reload();
          }
        })
      }

      function print(id){
            window.open(baseUrl + '/approvalpelamar/print?id='+id, "", "width=500,height=500");
      }


  </script>
@endsection
