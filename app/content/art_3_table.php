<!--<div id="toolbar">
    <select class="form-control">
        <option value="">Export Basic</option>
        <option value="all">Export All</option>
        <option value="selected">Export Selected</option>
    </select>
</div>-->

<div id="filter-bar"></div>
<!--<button id="buttonModal" class="btn btn-default">getSelections</button>-->
<table id="gridTable" data-toggle="table"
	data-classes="table table-hover table-no-bordered"
	data-url="php/your.php?nm=<?php echo $nm; ?>" 
	
	data-sort-name="ref"	
	data-sort-order="ref"

	data-show-toggle="true"
	data-show-columns="true"
	data-checkbox-header="false"
	data-click-to-select="true"
	data-maintain-selected="true"
	

	data-show-filter="true"
	data-toolbar="#filter-bar"	
	
	data-pagination="true"
	data-page-size="10"
	data-show-pagination-switch="true"

	data-show-export="true"
    data-export-data-type="all"

	data-detail-view="true"
	data-detail-formatter="detailFormatter"
	data-id-field="ref"

	data-search="true"
	data-trim-on-search="false"
	>
	<thead>
		<tr>
			<th data-field="state" data-sortable="true" data-visible='true' data-checkbox="true" data-formatter="stateFormatter"></th>
			<th data-field="ref" data-sortable="true" data-visible='false' >Referência</th>
			<th data-field="design" data-sortable="true" data-visible='true' >Descrição</th>
			<th data-field="material" data-sortable="true" data-visible='true' >Material</th>
			<th data-field="acabamento" data-sortable="true" data-visible='true'>Acabamento</th>
			<th data-field="diametro" data-sortable="true" data-visible='false'>Dia</th>
			<th data-field="comprimento" data-sortable="true" data-visible='false'>Com</th>
			<th data-field="qtdcx" data-sortable="true" data-visible='true'>Qtd/cx</th>
			<th data-field="peso" data-sortable="true" data-visible='false'>Peso</th>
			<th data-field="uni" data-sortable="true" data-visible='false'>Uni</th>
			<th data-field="stock" data-sortable="true" data-visible='true' data-formatter="stockFormatter" >Stock</th>
		</tr>
	</thead>
</table>