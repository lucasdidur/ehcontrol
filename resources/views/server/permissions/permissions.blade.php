@extends('template')

@section('stylesheet')
        <!-- Datatables CSS -->
{!!Html::style('vendor/plugins/datatables/media/css/dataTables.bootstrap.css')!!}
        <!-- Datatables Editor Addon CSS -->
{!!Html::style('vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css')!!}
        <!-- Datatables ColReorder Addon CSS -->
{!!Html::style('vendor/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css')!!}
@stop

@include('server.partials.top_bar')
@section('content_class', 'table-layout')


@section('content')

        <!-- begin: .tray-left -->
<aside class="tray tray-left tray290" data-tray-height="match">
        <form class="admin-form">
            <label class="field select">
                <select id="filter-customers" name="system-control">
                    <option value="group" selected="selected">Grupos</option>
                    <option value="users">Usuarios</option>
                </select>
                <i class="arrow double"></i>
            </label>
        </form>
        <br>
        <div class="text-center">
            <button id="animation-switcher" class="btn btn-system w250">Adicionar Permissão</button>
        </div>
    <div id="nav-spy">
        <ul class="nav tray-nav tray-nav-border" data-smoothscroll="-145" data-spy="affix" data-offset-top="105">
            @foreach($groups as $group)
            <li >
                <a href="#{{$group}}">{{$group}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</aside>
<!-- end: .tray-left -->


<!-- begin: .tray-center -->
<div class="tray tray-center">
    <div>
        <div class="panel-body pn">
            <form class="form-horizontal">
                <table class="table admin-form mn" id="datatable2" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Permissão</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>{{$permission['node']}}</td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button type="button" permission-id="{{$permission['id']}}" action="remove-permission" class="btn btn-danger btn-xs">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <!-- end: .tray-center -->
</div>
@include("server.permissions.add.permission")
@stop



@section('scripts')
        <!-- Datatables -->
{!!Html::script('vendor/plugins/datatables/media/js/jquery.dataTables.js')!!}
        <!-- Datatables Tabletools addon -->
{!!Html::script('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')!!}
        <!-- Datatables ColReorder addon -->
{!!Html::script('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')!!}
        <!-- Datatables Bootstrap Modifications  -->
{!!Html::script('vendor/plugins/datatables/media/js/dataTables.bootstrap.js')!!}
        <!-- Page Plugins -->
{!!Html::script('vendor/plugins/magnific/jquery.magnific-popup.js')!!}

<script>

    function getPosts(page) {
        $.ajax({
            url : '?page=' + page,
            dataType: 'json',
        }).done(function (data) {
            $('.posts').html(data);
            location.hash = page;
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }

    jQuery(document).ready(function () {
        $(".select2-single").select2();

        setupModal('#animation-switcher', '#modal-add-permission', 'mfp-with-fade');
    });

    $('#datatable2').dataTable({
        "aoColumnDefs": [{
            'bSortable': false,
            'aTargets': [-1]
        }],
        "iDisplayLength": 15,
        "aLengthMenu": [
            [15, 25, 50, -1],
            [15, 25, 50, "Todos"]
        ],
        "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
        "oTableTools": {
            "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
        },
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.10/i18n/Portuguese-Brasil.json"
        }
    });

    function setupModal(inicialize, element, animation) {
        $(inicialize).on('click', function () {

            // Inline Admin-Form example
            $.magnificPopup.open({
                removalDelay: 500, //delay removal by X to allow out-animation,
                items: {
                    src: element
                },
                // overflowY: 'hidden', //
                callbacks: {
                    beforeOpen: function (e) {
                        this.st.mainClass = animation;
                    }
                },
                midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
            });

        });
    }

</script>
@stop


