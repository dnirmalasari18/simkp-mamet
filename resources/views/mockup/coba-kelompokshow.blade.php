@extends('template.master')

@section('page-title')
Detail Kelompok
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block">
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col col-md-4"><label class=" form-control-label"><strong>Jenis Pengajuan</strong></label></div>
                                <p style="color:#212529">Kerja Praktik</p>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-4"><label class=" form-control-label"><strong>Peserta</strong></label></div>
                                <p style="color:#212529">05111640000115 - Dewi Ayu N <br> 05111640000129 - Frandita Adhitama</p>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-4"><label class=" form-control-label"><strong>Bukti Penerimaan</strong></label></div>
                                <p style="color:#212529">
                                    <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#scrollmodalUploadBukti"style="line-height:1;border-radius:3px;">Upload</button>
                                    <button type="submit" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#scrollmodalLihatBukti"style="line-height:1;border-radius:3px;">Lihat</button>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col col-md-4"><label class=" form-control-label"><strong>Status</strong></label></div>
                                <p style="color:#212529">Created<br>
                                    <span style="display:block;">
                                        <button type="submit" class="btn btn-secondary btn-sm"  data-toggle="modal" data-target="#scrollmodalStatus"style="line-height:1;border-radius:3px;">Update</button>
                                    </span>
                                </p>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-4"><label class=" form-control-label"><strong>Dosen Pembimbing</strong></label></div>
                                <p style="color:#212529">-<br>
                                    <span style="display:block;">
                                        <button type="submit" class="btn btn-secondary btn-sm"  data-toggle="modal" data-target="#scrollmodalDosbing"style="line-height:1;border-radius:3px;">Update</button>
                                    </span>
                                </p>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-4"><label class=" form-control-label"><strong>Nilai</strong></label></div>
                                <p style="color:#212529">
                                    <button type="submit" class="btn btn-primary btn-sm"data-toggle="modal" data-target="#scrollmodalNilaiLihat" style="line-height:1;border-radius:3px;">Lihat</button>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12" style="background-color:#212529; height:1px;"></div>
                        <div class="col-md-4" style="margin-top:10px;">
                            <div class="form-group">
                                <label><strong>Perusahaan</strong></label>
                                <p style="color:#212529">Surabaya</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Jenis Bisnis</strong></label>
                                <p style="color:#212529">Surabaya</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Profil</strong></label>
                                <div style="height:8em;width:20em;padding:0.5em;margin:0.5em;border:1px solid black;overflow:auto;">
                                    But I must explain to you how all this mistaken idea of denouncing
                                    pleasure and praising pain was born and I will give you a complete account
                                    of the system, and expound the actual teachings of the great explorer of
                                    the truth, the master-builder of human happiness. No one rejects,
                                    dislikes, or avoids pleasure itself, because it is pleasure, but because
                                    those who do not know how to pursue pleasure rationally encounter
                                    consequences that are extremely painful. Nor again is there anyone who
                                    loves or pursues or desires to obtain pain of itself, because it is pain,
                                    but because occasionally circumstances occur in which toil and pain can
                                    procure him some great pleasure. To take a trivial example, which of us
                                    ever undertakes laborious physical exercise, except to obtain some
                                    advantage from it? But who has any right to find fault with a man who
                                    chooses to enjoy a pleasure that has no annoying consequences, or one who
                                    avoids a pain that produces no resultant pleasure?
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-4" style="margin-top:10px;">
                            <div class="form-group">
                                <label><strong>Kota</strong></label>
                                <p style="color:#212529">Surabaya</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Kode Pos</strong></label>
                                <p style="color:#212529">60115</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Telp Kantor</strong></label>
                                <p style="color:#212529">Surabaya</p>
                            </div>
                        </div>
                        <div class="col-md-4"  style="margin-top:10px;">
                            <div class="form-group">
                                <label><strong>Tanggal Mulai</strong></label>
                                <p style="color:#212529">Surabaya</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Tanggal Berakhir</strong></label>
                                <p style="color:#212529">Surabaya</p>
                            </div>
                        </div>
                        <div class="col-md-12" style="background-color:#212529; height:1px;"></div>
                        <div class="col-md-12" style="margin-top:10px;">
                            <label><strong>Log KP</strong></label>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#scrollmodalLogTambah" style="float:right;margin-bottom:10px;" >
                                Tambah Log
                            </button>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th  style="vertical-align:middle; width:150px;">Tanggal Upload</th>
                                        <th  style="vertical-align:middle;">Judul Log</th>
                                        <th  style="vertical-align:middle;width:150px;"><center>File</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="vertical-align:middle;">27/09/2019</td>
                                        <td style="vertical-align:middle;">dsadsadadas</td>
                                        <td>
                                            <center>
                                                <span style="display:block; padding-block:5px; ">
                                                    <button type="submit" class="btn btn-secondary btn-sm" style="border-radius:3px;">Download</button>
                                                </span>
                                            </center>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom:15px;">
                <div class="col-lg-12" >
                    <button type="button" class="btn btn-danger"  style="float:right;" >
                        Hapus Pengajuan
                    </button>
                </div>
            </div>
    </div><!-- .animated -->
</div><!-- .content -->
<div class="modal fade" id="scrollmodalUploadBukti" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Update Bukti Penerimaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col col-md-5"><label for="postal-code" class=" form-control-label"><strong>Bukti Penerimaan </strong></label></div>
                    <input type="file" id="fileAdd"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="scrollmodalLihatBukti" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Lihat Bukti Penerimaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                suatu gambar
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="scrollmodalStatus" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Update Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                    <div class="col-12 col-md-9">
                        <select name="select" id="select" class="form-control">
                            <option value=""></option>
                            <option value="1">Progress</option>
                            <option value="2">Rejected</option>
                            <option value="3">Denied</option>
                            <option value="3">Finished</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="scrollmodalDosbing" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Pilih Dosbing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                    <div class="col-12 col-md-9">
                        <select name="select" id="select" class="form-control">
                            <option value=""></option>
                            <option value="1">Progress</option>
                            <option value="2">Rejected</option>
                            <option value="3">Denied</option>
                            <option value="3">Finished</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="scrollmodalNilaiLihat" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Nilai KP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#scrollmodalNilaiUbah" style="float:right;margin-bottom:10px;" >
                    Ubah
                </button>
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th  style="vertical-align:middle">NRP</th>
                            <th  style="vertical-align:middle">Nama</th>
                            <th style="vertical-align:middle"><center>Nilai 1</center></th>
                            <th style="vertical-align:middle"><center>Nilai 2</center></th>
                            <th style="vertical-align:middle"><center>Nilai 3</center></th>
                            <th style="vertical-align:middle"><center>Nilai 4</center></th>
                            <th style="vertical-align:middle"><center>NA</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="vertical-align:middle">05111640000115</td>
                            <td style="vertical-align:middle">Dewi Ayu N</td>
                            <td style="vertical-align:middle"><center>90</center></td>
                            <td style="vertical-align:middle"><center>90</center></td>
                            <td style="vertical-align:middle"><center>90</center></td>
                            <td style="vertical-align:middle"><center>90</center></td>
                            <td style="vertical-align:middle"><center>90</center></td>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle">05111640000129</td>
                            <td style="vertical-align:middle">Frandita Adhitama</td>
                            <td style="vertical-align:middle"><center>90</center></td>
                            <td style="vertical-align:middle"><center>90</center></td>
                            <td style="vertical-align:middle"><center>90</center></td>
                            <td style="vertical-align:middle"><center>90</center></td>
                            <td style="vertical-align:middle"><center>90</center></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="scrollmodalNilaiUbah" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Nilai Ubah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="row form-group"style="margin-bottom:0px;">
                        <div class="col-md-2"><p >05111640000115</p></div>
                        <div class="col-md-8"><p >Dewi Ayu Nirmalasari</p></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2"><input type="text" id="text-input" name="text-input" placeholder="N1" class="form-control"></div>
                        <div class="col-md-2"><input type="text" id="text-input" name="text-input" placeholder="N2" class="form-control"></div>
                        <div class="col-md-2"><input type="text" id="text-input" name="text-input" placeholder="N3" class="form-control"></div>
                        <div class="col-md-2"><input type="text" id="text-input" name="text-input" placeholder="N4" class="form-control"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row form-group"style="margin-bottom:0px;">
                        <div class="col-md-2"><p >05111640000129</p></div>
                        <div class="col-md-8"><p >Frandita Adhitama</p></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2"><input type="text" id="text-input" name="text-input" placeholder="N1" class="form-control"></div>
                        <div class="col-md-2"><input type="text" id="text-input" name="text-input" placeholder="N2" class="form-control"></div>
                        <div class="col-md-2"><input type="text" id="text-input" name="text-input" placeholder="N3" class="form-control"></div>
                        <div class="col-md-2"><input type="text" id="text-input" name="text-input" placeholder="N4" class="form-control"></div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="scrollmodalLogTambah" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Log Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col col-md-5"><label for="postal-code" class=" form-control-label"><strong>Judul Log</strong></label></div>
                </div>
                <div class="form-group">
                    <textarea name="textarea-input" id="textarea-input" rows="2" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <div class="col col-md-5"><label for="postal-code" class=" form-control-label"><strong>Dokumen </strong></label></div>
                    <input type="file" id="fileAdd"/>
                    <small class="form-text text-muted">Format .doc</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection


@section('additional-js')

@endsection