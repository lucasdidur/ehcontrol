@extends('template')

@section('stylesheet')
        <!-- Vendor CSS -->
<link rel="stylesheet" type="text/css" href="/vendor/plugins/magnific/magnific-popup.css">

@stop

@section('scripts')
        <!-- Page Plugins -->
<script src="/vendor/plugins/magnific/jquery.magnific-popup.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function () {

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

        setupModal('#animation-switcher', '#modal-form', 'mfp-with-fade');
    });
</script>

@stop

@section('content_class', 'table-layout')

@section('content')
        <!-- begin: .tray-center -->
<div class="tray tray-center">

    <div class="panel panel-primary panel-border top mt20 mb35">
        <div class="panel-heading">
            <span class="panel-title hidden-xs">Servidores</span>
        </div>
        <div class="panel-body pn">
            <div class="table-responsive">
                <table class="table admin-form theme-warning tc-checkbox-1 fs13">
                    <thead>
                    <tr class="bg-light">
                        <th class="text-center">ID</th>
                        <th>Nome</th>
                        <th class="text-center">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="">#1</td>
                        <td class="">Servidor Survival</td>
                        <td class="text-right">
                            <div class="btn-group text-right">
                                <button type="button" class="btn btn-info br2 btn-xs fs12 dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false"> Editar
                                    <span class="caret ml5"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="#">Edit</a>
                                    </li>
                                    <li>
                                        <a href="#">Delete</a>
                                    </li>
                                    <li>
                                        <a href="#">Archive</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
        <div class="panel-footer">
            <div class="text-right">
                <button id="animation-switcher" class="btn btn-primary">Adicionar Servidor</button>
            </div>
        </div>
    </div>

    <div class="panel panel-primary panel-border top mt20 mb35">
        <div class="panel-heading">
            <span class="panel-title hidden-xs">Painel de Controle</span>
        </div>
        <div class="panel-body bg-light dark">
            <form class="admin-form">
                <div class="section row mb10">
                    <label for="business-name" class="field-label col-md-3 text-center">URL da API: </label>

                    <div class="col-md-9">
                        <label for="business-name" class="field prepend-icon">
                            <input type="text" name="business-name" id="business-name" class="gui-input" >
                        </label>
                    </div>
                </div>
                <div class="section row mb10">
                    <label for="business-phone" class="field-label col-md-3 text-center">Nome de Usuário: </label>

                    <div class="col-md-9">
                        <label for="business-phone" class="field prepend-icon">
                            <input type="text" name="business-phone" id="business-phone" class="gui-input" >
                        </label>
                    </div>
                </div>

                <div class="section row mb10">
                    <label for="business-phone" class="field-label col-md-3 text-center">Chave: </label>

                    <div class="col-md-9">
                        <label for="business-phone" class="field prepend-icon">
                            <input type="text" name="business-phone" id="business-phone" class="gui-input" >
                        </label>
                    </div>
                </div>

                <div class="section row mbn">
                    <div class="col-sm-8">
                    </div>
                    <div class="col-sm-4">
                        <p class="text-right">
                            <button class="btn btn-primary" type="button">Salvar</button>
                        </p>
                    </div>
                </div>
            </form>

        </div>
    </div>

    @include('settings.modal.add_server')
</div>


<!-- begin: .tray-right -->
<aside class="tray tray-right tray290" data-tray-height="match">
    <form class="admin-form">
        <!-- menu quick links -->
        <div class="admin-form">

            <h4> Opções</h4>

            <hr class="short">

            <h5>
                <small>Painel de Controle</small>
            </h5>
            <div class="section">
                <label class="field select">
                    <select id="filter-customers" name="system-control">
                        <option value="multicraft" selected="selected">Multicraft</option>
                    </select>
                    <i class="arrow double"></i>
                </label>
            </div>

            <div class="section">
                <label class="field option ml15">
                    <input type="checkbox" name="info" checked>
                    <span class="checkbox"></span>
                    <span class="text-muted">Mostrar adicionados</span>
                </label>
            </div>

            <h5>
                <small>Sistema de Bans</small>
            </h5>
            <div class="section">
                <label class="field select">
                    <select id="filter-customers" name="system-ban">
                        <option value="banmanager" selected="selected">BanManager</option>
                    </select>
                    <i class="arrow double"></i>
                </label>
            </div>

            <div class="section row mbn">
                <div class="col-sm-8">
                </div>
                <div class="col-sm-4">
                    <p class="text-right">
                        <button class="btn btn-primary" type="button">Salvar</button>
                    </p>
                </div>
            </div>
        </div>
    </form>
</aside>
<!-- end: .tray-right -->

@stop

@section('scripts')
        <!-- FileUpload JS -->
{!!Html::script('vendor/plugins/fileupload/fileupload.js')!!}
{!!Html::script('vendor/plugins/holder/holder.min.js')!!}


        <!-- Tagmanager JS -->
{!!Html::script('vendor/plugins/tagsinput/tagsinput.min.js')!!}


<script>
    // Init TagsInput plugin
    $("input#tagsinput").tagsinput({
        tagClass: function (item) {
            return 'label bg-primary';
        }
    });
</script>
@stop