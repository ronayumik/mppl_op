@extends('layouts.boxed')

@section('title')
    Nilai
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Nilai</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('mark/create') }}" class="btn btn-primary" title="Tambah">
                    <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah
                </a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar Nilai</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-hover table-bordered" id="table-event">
                            <thead>
                            <tr>
                                <th class="col-md-1 text-center">
                                    #
                                </th>
                                <th class="col-md-3 text-center">
                                    Kegiatan
                                </th>
                                <th class="col-md-3 text-center">
                                    File Nilai
                                </th>
                                <th class="col-md-1 text-center">
                                    Menu
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;?>
                            <tr>
                                @foreach($activities as $act)
                                    <td class="text-center">{{ $i++ }}</td>

                                    <td>
                                            {{ $act->name }}
                                    </td>

                                    <td class="text-center">
                                        @if(isset($act->path_file))
                                             <a href="{{ url('/'.$act->path_file) }}"> <span class="label label-success">Sudah Diupload, klik untuk unduh</span> </a>
                                        @else
                                            <span class="label label-danger">Belum Diupload</span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <a href="" class="btn btn-primary btn-xs"title="Sunting"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=""><span class="glyphicon glyphicon-remove"></span></button>

                                        <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Hapus Nilai</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin menghapus ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        <a href="{{ route('mark.destroy', $act->id) }}">
                                                            <button type="button" class="btn btn-primary">Ok!!</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('foot')

    <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script event="text/javascript">
        $(document).ready(function(){
//              pagination
            $('#table-event').DataTable({
                "paging": true,
                "searching": true
            });
            $('#flash-overlay-modal').modal();
        });
    </script>
@endsection
