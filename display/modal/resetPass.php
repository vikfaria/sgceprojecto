<!--Modal-->
<div id="resetModal" class="modal" data-backdrop="false">
  <div class="row-col h-v">
    <div class="row-cell v-m">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
          	<h5 class="modal-title">Reset Da Senha do Usuario</h5>
          </div>
          <div class="modal-body text-center p-lg">
            <p>Tem a certeza que prentende limpar a senha do Usuario para a Senha padrao <b>1230</b>?</p>
			<div id="modal-loader1" style="display: none; text-align: center;">
				<img src="ajax-loader.gif">
			</div>
			 <!-- content will be load here -->                          
			<div id="dynamic-content1"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn danger p-x-md continuar" id="continuar" data-dismiss="modal">Continuar</button>
          </div>
        </div><!-- /.modal-content -->
      </div>
    </div>
  </div>
</div>
<!-- / .modal -->  