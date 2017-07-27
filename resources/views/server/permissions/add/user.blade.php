<!-- Admin Form Popup -->
<div id="modal-add-user" class="popup-basic popup-lg admin-form mfp-with-anim mfp-hide">
    <div class="panel">
        <div class="panel-heading">
              <span class="panel-title">
                <i class="fa fa-rocket"></i>Adicionar Usuário</span>
        </div>
        <!-- end .panel-heading section -->

        <form method="post" action="/" id="comment">
            <div class="panel-body p25">
                <div class="section row">
                    <div class="col-xs-7">
                        <label for="comment" class="field prepend-icon">
                            <textarea class="gui-textarea" id="comment" name="comment"
                                      placeholder="Username ou UUID"></textarea>
                            <label for="comment" class="field-icon">
                                <i class="fa fa-comments"></i>
                            </label>
                            <span class="input-footer">
                            Digite os usuários a serem adicionadas. Uma por linha</span>
                        </label>
                    </div>
                    <div class="col-xs-5">
                        {{-- <p class="text-muted">
                            <span class="fa fa-exclamation-circle text-warning fs15 pr5"></span> Escolha o grupo a adicionar
                        </p>

                        <hr class="alt short mv15">
--}}
                        <label class="field option">
                            <input type="checkbox" name="info">
                            <span class="checkbox mr10"></span> Ajudante
                        </label>
                        <br>
                        <label class="field option mt15">
                            <input type="checkbox" name="info">
                            <span class="checkbox mr10"></span> Moderador
                        </label>
                        <br>
                        <label class="field option mt15">
                            <input type="checkbox" name="info">
                            <span class="checkbox mr10"></span> Fundador
                        </label>

                    </div>
                    <!-- end section -->
                </div>
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