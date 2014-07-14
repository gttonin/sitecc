jQuery(document).ready(function($) {

	/**
	 * Coloca um calendário em cada campo de data usado nos formulários
	 * do plugin.
	 *
	 * Usa o plugin DateTimePicker para isso.
	 */
	$(".datahora").datetimepicker({
		format:'d/m/Y H:i',
		mask: true,
		lang:'pt_br',
		i18n:{
			pt_br: {
				months:[
					'Janeiro','Fevereiro','Março','Abril',
					'Maio','Junho','Julho','Agosto',
					'Setembro','Outubro','Novembro','Dezembro',
				],
				dayOfWeek:[
					"Seg", "Ter", "Qua", "Qui", 
					"Sex", "Sab", "Dom",
				]
			}
		},
	});
})