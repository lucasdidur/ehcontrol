<!-- Admin Form Popup -->
<div id="modal-form" class="popup-basic popup-lg admin-form mfp-with-anim mfp-hide">
    <div class="panel">
        <div class="panel-heading">
              <span class="panel-title">
                <i class="fa fa-rocket"></i>Adicionar Servidor</span>
        </div>
        <!-- end .panel-heading section -->

        <form method="post" action="/" id="comment">
            <div class="panel-body p25">
                <div class="section">
                    <label for="firstname" class="field prepend-icon">
                        <input type="text" name="firstname" id="firstname" class="gui-input" placeholder="Nome Servidor">
                        <label for="firstname" class="field-icon">
                            <i class="fa fa-user"></i>
                        </label>
                    </label>
                    <!-- end section -->
                </div>
                <!-- end section row section -->

                <div class="section row">
                    <div class="col-md-6">
                        <label for="email" class="field prepend-icon">
                            <input type="email" name="email" id="email" class="gui-input" placeholder="ID BungeeCord">
                            <label for="email" class="field-icon">
                                <i class="fa fa-envelope"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <div class="col-md-6">
                        <label for="website" class="field prepend-icon">
                            <input type="url" name="website" id="lastname" class="gui-input" placeholder="ID Multicraft">
                            <label for="website" class="field-icon">
                                <i class="fa fa-globe"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                </div>
                <!-- end section row section -->

                <div class="section-divider mb40" id="spy1">
                    <span>Banco de Dados</span>
                </div>

                <div class="section row">
                    <div class="col-md-6">
                        <label for="email" class="field prepend-icon">
                            <input type="email" name="email" id="email" class="gui-input" placeholder="Host">
                            <label for="email" class="field-icon">
                                <i class="fa fa-envelope"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <div class="col-md-6">
                        <label for="website" class="field prepend-icon">
                            <input type="url" name="website" id="lastname" class="gui-input" placeholder="Database">
                            <label for="website" class="field-icon">
                                <i class="fa fa-globe"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                </div>
                <!-- end section row section -->

                <div class="section row">
                    <div class="col-md-6">
                        <label for="email" class="field prepend-icon">
                            <input type="email" name="email" id="email" class="gui-input" placeholder="Nome de Usuário">
                            <label for="email" class="field-icon">
                                <i class="fa fa-envelope"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <div class="col-md-6">
                        <label for="website" class="field prepend-icon">
                            <input type="url" name="website" id="lastname" class="gui-input" placeholder="Senha">
                            <label for="website" class="field-icon">
                                <i class="fa fa-globe"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                </div>
                <!-- end section row section -->

            </div>
            <!-- end .form-body section -->

            <div class="panel-footer">
                <div class="text-right">
                    <button type="submit" class="button btn-primary">Adicionar Servidor</button>
                </div>
            </div>
            <!-- end .form-footer section -->
        </form>
    </div>
    <!-- end: .panel -->
</div>
<!-- end: .admin-form -->