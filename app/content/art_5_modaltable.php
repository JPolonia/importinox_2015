<!-- 1rd modal -->
<div class="modal fade" id="modalTable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pedir Orçamento</h4>
            </div>
            <div class="modal-body" style="padding:0px;">
                <table id="modalTable-table"
                        data-classes="table table-hover table-no-bordered"
                        data-toggle="table"
                        data-striped="true"
                        data-height="399"
                        data-url=""
                        data-detail-view="true"
                        data-detail-formatter="detailFormatter"
                        data-id-field="ref"
                        >
                    <thead>
                    <tr>
                        <th data-field="ref" data-sortable="true" data-visible="false" data-valign="middle" >Referência</th>
                        <th data-field="design" data-sortable="true" data-visible="true" data-valign="middle"   data-width="80%">Descrição</th>
                        <th data-field="qtd" data-visible="true" data-formatter="qtdFormatter" id="columnQtt" data-valign="middle" data-halign="center" data-align="right">Quantidade</th>
                        <th data-field="operate"  data-events= "operateEvents" data-formatter="operateFormatter"    data-valign="middle" data-align="right"></th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer"> 
               <button tabindex="4" id="erase-cart" class="btn btn-danger"  class="btn" style="float: left;">Limpar</button>
                <!--<button id="buttonModal" type="submit" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalTable"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></button>-->
                <a tabindex="3" href="#" class="btn btn-info" data-dismiss="modal" class="btn">voltar</a>
                <a tabindex="2" data-toggle="modal" href="#myModal2" data-dismiss="modal" class="btn btn-default">&nbsp;Proximo&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
                <!--<button id="send-modal" type="submit" class="btn btn-default" data-dismiss="modal">Enviar</button>-->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- 2 modal -->
<div class="modal fade rotate" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h2 class="modal-title">Dados</h2>
            </div>
            <div class="container"></div>
            <div class="modal-body">
                <form role="form">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="first_name" id="nome" class="form-control input-lg" placeholder="Nome" tabindex="1">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="last_name" id="empresa" class="form-control input-lg" placeholder="Empresa" tabindex="2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                 <input type="text" name="display_name" id="contribuinte" class="form-control input-lg" placeholder="Contribuinte" tabindex="3">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
                            </div>
                        </div>
                    </div>
        
                </form>
            </div>
            <div class="modal-footer">  
                <a data-toggle="modal" href="#modalTable" class="btn btn-info" data-dismiss="modal" class="btn">voltar</a>
                <a href="#" class="btn btn-success" id="send-modal" data-dismiss="modal">&nbsp;Enviar&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-send" aria-hidden="true"></span></a>
            </div>
        </div>
    </div>
</div>
