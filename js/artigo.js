$(document).ready(function(){

	//Add Inactive Class To All Accordion Headers
	$('.accordion-header').toggleClass('inactive-header');

	//Set The Accordion Content Width
	var contentwidth = $('.accordion-header').width();
	$('.accordion-content').css({'width' : contentwidth });

	var headerwidth;

	function explode(){
		$('#side-produto').removeClass('width-five');
		$('#main-produto').removeClass('width-ninety');
		$('#side-produto').removeClass('col-md-1');
		$('#main-produto').removeClass('col-md-11');
		$('#side-produto').addClass('col-md-8');
		$('#main-produto').addClass('col-md-4');
	}

	function implode(){
		$('#side-produto').addClass('width-five');
		$('#main-produto').addClass('width-ninety'); 
		$('#side-produto').removeClass('col-md-8');
		$('#main-produto').removeClass('col-md-4');
		$('#side-produto').addClass('col-md-1');
		$('#main-produto').addClass('col-md-11');
	}
	function implode_title(){
		$('.titulo-catalogo').hide(); 
	}
	function explode_title(){
		$('.titulo-catalogo').show();
	}

	function explode_content(){
		$('.active-header').next().slideToggle().toggleClass('open-content');
	}

	

	var clickNumber = 0,
    clicksAllowed = true;


	// Optimalisation: Store the references outside the event handler:
	var $window = $(window);
	//var $pane = $('#pane1');

	function checkWidth() {
	    var windowsize = $window.width();
	    headerwidth = $('.accordion-header').width();
	    //alert(headerwidth);
	    if (windowsize > 991 ) {
	    	if(headerwidth < 100){
       			$('#side-produto').addClass('width-five anime');
				$('#main-produto').addClass('width-ninety anime');
				$('.titulo-catalogo').hide();
			}
			$('#side-produto').removeClass('tablet');
			$('#main-produto').removeClass('tablet');
	    }
	    if(windowsize < 992){
	    	$('#side-produto').removeClass('width-five anime');
			$('#main-produto').removeClass('width-ninety anime');
			$('#side-produto').addClass('tablet');
			$('#main-produto').addClass('tablet');
			$('.titulo-catalogo').show();
	    }
	}
	// Execute on load
	checkWidth();
	// Bind event listener
	$(window).resize(checkWidth);

	var dynamicJSON,storedArray,counterDuplicates, counter;
	//$.removeCookie('cart');

	$('#erase-cart').click(function () {
		dynamicJSON = '';
		if($.cookie('cart') != undefined){
			$.removeCookie('cart');
		}
		$('#modalTable-table').bootstrapTable('removeAll');
        
	});

	$('#buttonAddCart').click(function () {
		dynamicJSON = $('#gridTable').bootstrapTable('getSelections');

		if(jQuery.isEmptyObject(dynamicJSON)){
			$.alert("Nenhum artigo selecionado",{autoClose: true,closeTime: 2000,withTime: false,type: 'danger',
				position: ['center', [-0.42, 0]],title: false,close: '',speed: 'normal',isOnly: true,minTop: 100,
			});
		}else{
			counterDuplicates = 0;
			counter = Object.keys(dynamicJSON).length;

			if($.cookie('cart') != undefined){
				storedArray = JSON.parse($.cookie('cart'));
			    $.each(dynamicJSON,function(index,object){
			    	//Check if item is already on cart
			    	if($.grep(storedArray, function(e){ return e.ref == object.ref; }) == 0){
			    		storedArray.push(object);
					}else{
						counterDuplicates++;
					}
			    });
			   	
			   	counter -= counterDuplicates;

			    if(counter > 0){
				    $.alert(counter + "  artigos novos adicionados",{autoClose: true,closeTime: 1000,withTime: false,type: 'success',
						position: ['center', [-0.42, 0]],title: false,close: '',speed: 'normal',isOnly: false,minTop: 180,
						onShow: function () {$('#gridTable').bootstrapTable('uncheckAll');}
					});
				}
				if(counterDuplicates){
					$.alert(counterDuplicates + "  artigos repetidos",{autoClose: true,closeTime: 1000,withTime: false,type: 'warning',
						position: ['center', [-0.42, 0]],title: false,close: '',speed: 'normal',isOnly: false,minTop: 250,
						onShow: function () {$('#gridTable').bootstrapTable('uncheckAll');}
					});
				}
			}else{
				$.alert(counter + "  artigos novos adicionados",{autoClose: true,closeTime: 1000,withTime: false,type: 'success',
					position: ['center', [-0.42, 0]],title: false,close: '',speed: 'normal',isOnly: false,minTop: 180,
					onShow: function () {$('#gridTable').bootstrapTable('uncheckAll');}
				});
			}

			$.cookie('cart',JSON.stringify(storedArray));
			$('#gridTable').bootstrapTable('uncheckAll');
		}
	});

	$('#buttonModal').click(function () {

		dynamicJSON = JSON.parse($.cookie('cart'));

		$('#modalTable-table').bootstrapTable('load', {
            data: dynamicJSON
        });

    });

    $('#modalTable').on('shown.bs.modal', function () {
		$('#modalTable-table').bootstrapTable('resetView');
	});


	replacer = function(key, value){
		if (key == "material" 
		 || key == "acabamento" 
		 || key == "diametro" 
		 || key == "comprimento" 
		 || key == "qtdcx" 
		 || key == "peso"
		 || key == "uni"
		 || key == "stock"
		 || key == "state") {
		    return undefined;
		}
		return value;
	}

	var OBJ, sendOBJ,sendJSON, dadosJSON;

	$(".inputQtd").focusout(function(){
		var qtd;
		qtd = $(this).val();
        $('#modalTable-table').bootstrapTable('updateRow', {
	        index: index,
	        row: {
	            qtd: qtd
	        }
    	});
    	OBJ = $('#modalTable-table').bootstrapTable('getData');
    	$.cookie('cart',JSON.stringify(OBJ));
    });

	$('#modalTable').on('hidden.bs.modal', function () {
	  	var qtd;
	  	var index=0;
		$.each( $('input[name="qtdnum"]'),function(){
		    qtd = $(this).val();
		      $('#modalTable-table').bootstrapTable('updateRow', {
	            index: index,
	            row: {
	                qtd: qtd
	            }
		    	});
		      index++;
	    });
		OBJ = $('#modalTable-table').bootstrapTable('getData');
		$.cookie('cart',JSON.stringify(OBJ));
		//alert(JSON.stringify(OBJ));
	})
	

	$('#send-modal').click(function () {
	    var index=0;
	    var qtd;
	    var dados={};

	    dados.nome = $('#nome').val();
	    dados.empresa = $('#empresa').val();
	    dados.contribuinte = $('#contribuinte').val();
	    dados.email = $('#email').val();

	    $.each( $('input[name="qtdnum"]'),function(){
	    qtd = $(this).val();
	      $('#modalTable-table').bootstrapTable('updateRow', {
            index: index,
            row: {
                qtd: qtd
            }
	    	});
	      index++;
	    });

		OBJ = $('#modalTable-table').bootstrapTable('getData');
		sendJSON = JSON.stringify(OBJ,replacer);
		dadosJSON = JSON.stringify(dados);

		sendOBJ = $.parseJSON(sendJSON);

		//alert(JSON.stringify(sendOBJ));
		//alert(dadosJSON);


		/*Launch modal table for client information*/
		$.ajax({
            type: "POST",
            url: "send_orcamento.php",
            //dataType: 'json',
            data: { dados: dados, json:sendOBJ},
            success: 
	            function(data){
	                alert(data);
	            },
	        error:function(exception){alert('Exception:'+ exception);}
        });

       	dynamicJSON = '';
		if($.cookie('cart') != undefined){
			$.removeCookie('cart');
		}
		$('#modalTable-table').bootstrapTable('removeAll');

    });
	

	// The Accordion Effect
	$('.accordion-header').click(function () {
		if($(window).width()>991){
			if(clicksAllowed){
				clicksAllowed = false;//Disbale Click for 0.8sec
				headerwidth = $('.accordion-header').width();

				if(headerwidth < 100){
					$('html, body').animate({scrollTop: $('.accordion-header').offset().top - 54}, 200);
					explode();
					if($(this).is('.inactive-header')) {
						$('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
						$(this).toggleClass('active-header').toggleClass('inactive-header');
						setTimeout(explode_title,200);
						setTimeout(explode_content,200);
					}
				}else{
					if($(this).is('.inactive-header')) {
						$('html, body').animate({scrollTop: $('.accordion-header').offset().top - 54}, 200);
						$('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
						$(this).toggleClass('active-header').toggleClass('inactive-header');
						$(this).next().slideToggle().toggleClass('open-content');
						$('.titulo-catalogo').show();
					}
					else {
						$('html, body').animate({scrollTop: $('.accordion-header').offset().top - 180}, 1000);
						setTimeout(implode_title,200);
						setTimeout(implode, 200);
						$(this).toggleClass('active-header').toggleClass('inactive-header');
						$(this).next().slideToggle().toggleClass('open-content');			
					}
				}
				setTimeout(function() {
	                clicksAllowed = true; //Enable click after 0.8sec
	    		}, 350);
				
			}
		}else{
			$('html, body').animate({scrollTop: $('.accordion-header').offset().top}, 0);
			if($(this).is('.inactive-header')) {
				$('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
				$(this).toggleClass('active-header').toggleClass('inactive-header');
				$(this).next().slideToggle().toggleClass('open-content');
			}
			else {
				$(this).toggleClass('active-header').toggleClass('inactive-header');
				$(this).next().slideToggle().toggleClass('open-content');			
			}
		}
	});

	return false;
});

//Bootstrap Table
	$('[data-toggle=offcanvas]').click(function() {
	  	$(this).toggleClass('visible-xs text-center');
	    $(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
	    $('.row-offcanvas').toggleClass('active');
	    $('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
	    $('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
	    $('#btnShow').toggle();
	});

	$('#gridTable').bootstrapTable({data: jsonData,search:true,showColumns:true,showToggle:true,});
    

    $('#filter-bar').bootstrapTableFilter({
            filters:[
                {
                    field: 'ref',    // field identifier
                    label: 'Referência',    // filter label
                    type: 'range'   // filter type
                },
                {
                    field: 'design',
                    label: 'Descrição',
                    type: 'search',
                    enabled: true   // filter is visible by default
                },
                {
                    field: 'material',
                    label: 'Material',
                    type: 'select',
                    values: [
                        {id: 'ROLE_ANONYMOUS', label: 'Anonymous'},
                        {id: 'ROLE_USER', label: 'User'},
                        {id: 'ROLE_ADMIN', label: 'Admin'}
                    ],
                },
                {
                    field: 'acabamento',
                    label: 'Acabamento',
                    type: 'search'
                },
                {
                    field: 'diametro',
                    label: 'Diametro',
                    type: 'ajaxSelect',
                    source: 'http://example.com/get-cities.php'
                }
            ],
            connectTo:'#gridTable',
			onSubmit: function() {
                var data = $('#filter-bar').bootstrapTableFilter('getData');
                console.log(data);
            }
	});
	function stateFormatter(value, row, index) {
		if(row.stock < 0){return {disabled: true}}
		return value;
	}
	function stockFormatter(value, row, index) {
		switch(row.stock) {
			case 'A':
				return '<img src="img/green.svg" align="middle" width="22" height="22">';
			case 'B':
				return '<img src="img/yellow.svg" align="middle" width="22" height="22">';
			case 'C':
				return '<img src="img/grey.svg" align="middle" width="22" height="22">';
			default:
				return value;			
		} 
	}

	function detailFormatter(index, row) {
        var html = [];
        $.each(row, function (key, value) {
            html.push('<p><b>' + key + ':</b> ' + value + '</p>');
        });
        return html.join('');
    }

    function qtdFormatter(value, row, index) {
		return '<input type="number" name="qtdnum" placeholder="" class="inputQtd" value="' + value +'" tabindex="1">';
	}  
	
	
 


 	




	


